<?php

/**
 * Home template
 *
 * @package WordPress
 * @subpackage Marcas com Sal
 * @since Marcas com Sal 1.0
 */

get_header();
?>

<?php
$projetos_car_arr = array(
    'post_type' => 'mcsprojeto',
    'posts_per_page' => 5,
    'meta_query' => array(
        array(
            'key'     => 'carousel_home',
            'value'   => '1',
            'compare' => 'LIKE',
        ),
    ),
    'orderby' => 'rand'
);

$projetos_car_qry = new WP_Query($projetos_car_arr);
if (function_exists('get_field') && $projetos_car_qry->have_posts()) :
    $projetos_car_ids = array();
?>
    <div class="swiper-cover swiper-container">
        <div class="swiper-wrapper">
            <?php
            while ($projetos_car_qry->have_posts()) {
                $projetos_car_qry->the_post();
                if (get_field('carousel_imagem') && get_field('carousel_imagem_mobile')) {
                    array_push($projetos_car_ids, get_the_ID());
            ?>
                    <div class="swiper-slide">
                        <a href="<?php the_permalink(); ?>">
                            <figure>
                                <?php mcs_img_tag_generate(get_field("carousel_imagem"), 'projeto-cover', 'mxlg:hide w-full', false); ?>
                                <?php mcs_img_tag_generate(get_field("carousel_imagem_mobile"), 'projeto-cover-mobile', 'lg:hide w-full', false); ?>
                            </figure>
                            <?php if (get_field('carousel_texto')) { ?>
                                <p <?php if (get_field('carousel_texto_cor')) echo 'style="color:' . get_field("carousel_texto_cor") . ';"' ?> class="absolute typography-h1 mxlg:w-[80vw] lg:w-[40vw] mxlg:left-[24px] lg:left-[45px] top-[50%] -translate-y-[50%]"><?php the_field('carousel_texto'); ?></p>
                            <?php } ?>
                            <div class="absolute mxlg:left-[24px] lg:left-[45px] mxlg:bottom-[30px] lg:bottom-[30px] lg:max-w-[600px] text-white project-name">
                                <p><strong class="font-sans-medium"><?php the_title(); ?></strong><?php if (get_field('descricao')) { ?> <span class="desc"><span class="sep">—</span> <?php the_field('descricao'); ?><?php } ?></span></p>
                            </div>
                        </a>
                    </div>
                    <!-- /.swiper-slide -->
                <?php
                }
                ?>

            <?php
            }
            ?>
        </div>
        <!-- /.swiper-wrapper -->
        <div class="swiper-pagination"></div>
    </div>
<?php
endif;
wp_reset_postdata();
?>

<article class="container pt-[120px] text-center">
    <div class="lg:w-[50%] mx-auto">
        <h2 class="font-sans-medium text-black mxlg:leading-[1.375em] lg:leading-[1.16em] text-[16px] lg:text-[24px]"><?php the_field('dst3_texto') ?></h2>
        <?php $link3 = get_field('dst3_link') ?>
        <a class="link-external link-home no-underline font-sans-medium mxlg:mt-[12px] lg:mt-[16px] lg:text-[17px] text-black" href="<?php echo $link3['url']; ?>"><?php echo $link3['title']; ?></a>
    </div>
</article>

<?php if (function_exists("get_field") && get_field("dst1_titulo") && get_field("dst1_texto")) { ?>
    <article class="container pt-[120px] mxlg:pb-[90px] lg:pb-[50px] lg:flex">
        <div class="lg:w-[33.33vw]">
            <h2 class="font-sans-medium text-black mxlg:leading-[1.375em] lg:leading-[1.16em] mxlg:text-[32px] lg:text-[48px]"><?php the_field("dst1_titulo"); ?></h2>
        </div>
        <div class="mxlg:mt-[40px] lg:w-[41.66vw] lg:mr-[8.33vw] lg:ml-auto">
            <div class="mxlg:text-[16px] lg:text-[17px] leading-[1.58em] text-black">
                <?php the_field("dst1_texto"); ?>
                <?php if (get_field('dst1_link')) {
                    $link1 = get_field('dst1_link'); ?>
                    <a class="link-external link-home no-underline font-sans-medium mxlg:mt-[12px] lg:mt-[16px]" <?php if ('_blank' == $link1['target']) {
                                                                                                                        echo 'target="_blank"';
                                                                                                                    } ?> href="<?php echo $link1['url']; ?>"><?php echo $link1['title']; ?></a>
                <?php } ?>
            </div>
        </div>
    </article>
<?php } // if ( function_exists("get_field") && get_field("dst1_titulo") && get_field("dst1_texto") ) { 
?>

<?php
$projetos_dst_arr = array(
    'post_type' => 'mcsprojeto',
    'posts_per_page' => 1,
    'meta_query' => array(
        array(
            'key'     => 'peso_projeto',
            'value'   => 'um',
            'compare' => 'LIKE',
        ),
    ),
    'orderby' => 'rand',
    'post__not_in' => array($projetos_car_ids[0])
);

$projetos_dst_qry = new WP_Query($projetos_dst_arr);
if (function_exists('get_field') && $projetos_dst_qry->have_posts()) :
    $projetos_dst_ids = array();
?>
    <div class="container">
        <?php
        while ($projetos_dst_qry->have_posts()) {
            $projetos_dst_qry->the_post();
            array_push($projetos_dst_ids, get_the_ID());
        ?>
            <article <?php post_class('mxlg:mb-[40px] lg:mb-[60px] projects-list-item'); ?>>
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <figure class="mb-[12px]">
                            <?php the_post_thumbnail('projeto-thumb', array('class' => 'w-full')); ?>
                        </figure>
                    <?php endif; ?>
                    <h2 class="text-black typography-case-thumbnail"><?php the_title(); ?></h2>
                    <?php if (function_exists("get_field") && get_field("descricao")) { ?>
                        <p class="typography-project-description"><?php the_field('descricao'); ?></p>
                    <?php } ?>
                </a>
            </article>
        <?php
        }
        ?>
    </div>
<?php
endif; // if ( function_exists( 'get_field' ) && $projetos_dst_qry->have_posts() ):
wp_reset_postdata();
?>

<?php
$projetos_dst2_arr = array(
    'post_type' => 'mcsprojeto',
    'posts_per_page' => 2,
    'meta_query' => array(
        array(
            'key'     => 'peso_projeto',
            'value'   => 'dois',
            'compare' => 'LIKE',
        ),
    ),
    'orderby' => 'rand'
);

$projetos_dst2_qry = new WP_Query($projetos_dst2_arr);
if (function_exists('get_field') && $projetos_dst2_qry->have_posts()) :
    $projetos_dst2_ids = array();
?>
    <div class="container lg:flex">
        <?php
        while ($projetos_dst2_qry->have_posts()) {
            $projetos_dst2_qry->the_post();
            array_push($projetos_dst2_ids, get_the_ID());
        ?>
            <article <?php post_class('lg:w-[50%] lg:first:pr-[14px] lg:last:pl-[14px] mxlg:mb-[40px] lg:mb-[60px] projects-list-item'); ?>>
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <figure class="mb-[12px]">
                            <?php the_post_thumbnail('projeto-thumb', array('class' => 'w-full')); ?>
                        </figure>
                    <?php endif; ?>
                    <h2 class="text-black typography-case-thumbnail"><?php the_title(); ?></h2>
                    <?php if (function_exists("get_field") && get_field("descricao")) { ?>
                        <p class="typography-project-description"><?php the_field('descricao'); ?></p>
                    <?php } ?>
                </a>
            </article>
        <?php
        }
        ?>
    </div>
<?php
endif; // if ( function_exists( 'get_field' ) && $projetos_dst2_qry->have_posts() ):
wp_reset_postdata();
?>


<?php
$projetos_dst3_arr = array(
    'post_type' => 'mcsprojeto',
    'posts_per_page' => 1,
    'meta_query' => array(
        array(
            'key'     => 'peso_projeto',
            'value'   => 'um',
            'compare' => 'LIKE',
        ),
    ),
    'orderby' => 'rand',
    'post__not_in' => array($projetos_car_ids[0], $projetos_dst_ids[0])
);

$projetos_dst3_qry = new WP_Query($projetos_dst3_arr);
if (function_exists('get_field') && $projetos_dst3_qry->have_posts()) :
?>
    <div class="container">
        <?php
        while ($projetos_dst3_qry->have_posts()) {
            $projetos_dst3_qry->the_post();
        ?>
            <article <?php post_class('mxlg:mb-[40px] lg:mb-[60px] projects-list-item'); ?>>
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <figure class="mb-[12px]">
                            <?php the_post_thumbnail('projeto-thumb', array('class' => 'w-full')); ?>
                        </figure>
                    <?php endif; ?>
                    <h2 class="text-black typography-case-thumbnail"><?php the_title(); ?></h2>
                    <?php if (function_exists("get_field") && get_field("descricao")) { ?>
                        <p class="typography-project-description"><?php the_field('descricao'); ?></p>
                    <?php } ?>
                </a>
            </article>
        <?php
        }
        ?>
    </div>
<?php
endif; // if ( function_exists( 'get_field' ) && $projetos_dst3_qry->have_posts() ):
wp_reset_postdata();
?>

<?php if (function_exists("get_field") && get_field("dst2_titulo")) { ?>
    <article class="container text-white bg-lilas-evolv text-center" id="takes-desk">
        <h2 class="font-sans-medium mxlg:leading-[1.375em] lg:leading-[1.16em] mxlg:text-[32px] lg:text-[48px]"><?php the_field("dst2_titulo"); ?></h2>
        <p class="typography-project-description"><?php the_field("dst2_descricao"); ?></p>
        <div class="lg:flex">
            <?php if (have_rows('colunas')) :
                while (have_rows('colunas')) : the_row(); ?>
                    <div class="lg:w-[33.33vw] col px-5">
                        <h3><?php the_sub_field('title'); ?></h3>
                        <p><?php the_sub_field('description'); ?></p>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </article>
    <?php if (wp_is_mobile()) : ?>
        <article class="container text-white bg-lilas-evolv text-center" id="takes-mobile">
            <h2 class="font-sans-medium mxlg:leading-[1.375em] lg:leading-[1.16em] mxlg:text-[32px] lg:text-[48px]"><?php the_field("dst2_titulo"); ?></h2>
            <p class="typography-project-description"><?php the_field("dst2_descricao"); ?></p>
            <div class="accordion-wrapper">
                <?php if (have_rows('colunas')) :
                    while (have_rows('colunas')) : the_row(); ?>
                        <button class="accordion"><?php the_sub_field('title'); ?></button>
                        <div class="panel">
                            <p class="typography-project-description"><?php the_sub_field('description'); ?></p>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>
        </article>
    <?php endif; ?>
<?php } // if ( function_exists("get_field") && get_field("dst1_titulo") && get_field("dst1_texto") ) { 
?>

<?php get_footer(); ?>