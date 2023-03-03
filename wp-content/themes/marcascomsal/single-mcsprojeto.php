<?php

/**
 * 'Projeto' CPT Single
 *
 * @package WordPress
 * @subpackage Marcas com Sal
 * @since Marcas com Sal 1.0
 */

get_header();

$project_id = get_the_ID();

?>

<?php if (function_exists("get_field") && get_field("cover")) { ?>

    <?php if ('imagem' == get_field("cover") && get_field("cover_imagem") && get_field("cover_imagem_mobile")) { ?>
        <figure>
            <?php mcs_img_tag_generate(get_field("cover_imagem"), 'projeto-cover', 'mxlg:hide w-full', false); ?>
            <?php mcs_img_tag_generate(get_field("cover_imagem_mobile"), 'projeto-cover-mobile', 'lg:hide w-full', false); ?>
        </figure>
    <?php } ?>

    <?php if ('video' == get_field("cover") && get_field("cover_video")) { ?>
        <div>
            <?php the_field("cover_video"); ?>
        </div>
    <?php } ?>

    <?php if ('carrossel' == get_field("cover") && have_rows("cover_swiper")) { ?>
        <div class="swiper-container swiper-cover swiper">
            <div class="swiper-wrapper">
                <?php
                $swiper_slide = 0;
                while (have_rows('cover_swiper')) {
                    the_row();
                    $swiper_slide++;
                ?>
                    <div class="swiper-slide">
                        <?php
                        if (get_row_layout() == 'imagem' && get_sub_field('swiper_imagem') && get_sub_field('swiper_imagem_mobile')) :
                        ?>
                            <figure>
                                <?php $lazy_load = true;
                                if ($swiper_slide == 1) {
                                    $lazy_load = false;
                                } ?>
                                <?php mcs_img_tag_generate(get_sub_field('swiper_imagem'), 'projeto-cover', 'mxlg:hide w-full', $lazy_load); ?>
                                <?php mcs_img_tag_generate(get_sub_field('swiper_imagem_mobile'), 'projeto-cover-mobile', 'lg:hide w-full', $lazy_load); ?>
                            </figure>
                        <?php
                        elseif (get_row_layout() == 'video') :
                            $video_html = get_sub_field("swiper_video");
                            if (1 != $swiper_slide) {
                                $video_html = str_replace('src=', 'loading="lazy" src=', $video_html);
                            }
                        ?>
                            <div>
                                <?php echo $video_html; ?>
                            </div>
                        <?php
                        endif;

                        ?>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- /.swiper-wrapper -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <!-- /.swiper -->
    <?php } ?>

<?php }  ?>

<div class="blocks">

    <div class="container content-block lg:flex">
        <div class="lg:w-[36vw]">
            <?php if (function_exists("get_field") && get_field("ano")) { ?>
                <p class="mxlg:text-[12px] font-sans-medium lg:typography-button-label text-lilas-evolv"><?php the_field('ano'); ?></p>
            <?php } ?>
            <h1 class="typography-h3 text-lilas-evolv"><?php the_title(); ?></h1>
            <?php if (function_exists("get_field") && get_field("descricao")) { ?>
                <p class="font-sans-light text-black leading-[1.1875em] mxlg:text-[36px] lg:text-[48px]"><?php the_field('descricao'); ?></p>
            <?php } ?>
            <?php if (function_exists("have_rows") && have_rows("entregas")) { ?>
                <ul class="flex flex-wrap text-black mxlg:text-[12px] mxlg:leading-[1.58em] lg:text-[14px] mxlg:mt-[20px] lg:mt-[30px] ml-[-10px]">
                    <?php
                    while (have_rows("entregas")) {
                        the_row();
                        if (get_sub_field('nome')) {
                    ?>
                            <li class="w-[50%] mb-[1px] pr-[10px] pl-[10px]"><?php the_sub_field('nome'); ?></li>
                    <?php
                        }
                    } ?>
                </ul>
            <?php } ?>
        </div>
        <?php if (function_exists("get_field") && get_field("descritivo_longo")) { ?>
            <div class="text-black mxlg:mt-[80px] lg:mt-[30px] lg:ml-auto lg:w-[43.3vw] mxlg:text-[16px] lg:text-[19px] leading-[1.52em] editor-content">
                <?php the_field("descritivo_longo"); ?>
            </div>
        <?php } ?>
    </div>

    <?php
    if (function_exists('have_rows') && have_rows('secoes')) {

        while (have_rows('secoes')) : the_row();

            // Imagem 100%
            if ('imagem_100w' == get_row_layout() && get_sub_field('imagem') && get_sub_field('imagem_mobile')) {
                include('template-parts/secao-imagem-100w.php');
            }

            // Video 100%
            if ('video_100w' == get_row_layout() && get_sub_field('video')) {
                include('template-parts/secao-video-100w.php');
            }

            // Carrossel 100%
            if ('carrossel_100vw' == get_row_layout() && get_sub_field('carrossel_100vw_swiper')) {
                include('template-parts/secao-carrossel-100w.php');
            }

            // Imagens - 2 colunas
            if ('imagem_2col' == get_row_layout()) {
                include('template-parts/secao-imagem-2col.php');
            }

            // Texto - 2 colunas
            if ('texto_2col' == get_row_layout()) {
                include('template-parts/secao-texto-2col.php');
            }

            // Texto - 2 colunas
            if ('imagem_2col_maior_menor' == get_row_layout()) {
                include('template-parts/secao-imagem-2col-maior-menor.php');
            }

            // Texto - 2 colunas
            if ('imagem_2col_menor_maior' == get_row_layout()) {
                include('template-parts/secao-imagem-2col-menor-maior.php');
            }

            // Texto - 3 colunas
            if ('imagem_3col' == get_row_layout()) {
                include('template-parts/secao-imagem-3col.php');
            }

            // Texto - Imagem - 2 colunas
            if ('texto_imagem_2col' == get_row_layout()) {
                include('template-parts/secao-texto-imagem-2col.php');
            }

            // Imagem e Texto - 2 colunas
            if ('imagem_texto_2col' == get_row_layout()) {
                include('template-parts/secao-imagem-texto-2col.php');
            }

            // Texto - Vídeo - 2 colunas
            if ('texto_video_2col' == get_row_layout()) {
                include('template-parts/secao-texto-video-2col.php');
            }

            // Vídeo - Texto - 2 colunas
            if ('texto_video_2col' == get_row_layout()) {
                include('template-parts/secao-video-texto-2col.php');
            }

            // Texto - Imagem - 2 colunas
            if ('imagem_full_e_texto' == get_row_layout()) {
                include('template-parts/secao-imagem-full-texto.php');
            }

            // Prêmios
            if ('texto_2col_premios' == get_row_layout()) {
                include('template-parts/secao-texto-2col-premios.php');
            }

        endwhile;
    } // if ( function_exists('have_rows') && have_rows('secoes') ) {
    ?>

</div>

<?php
$related_query = new WP_Query(array(
    'orderby' => 'rand',
    'posts_per_page' => 2,
    'post_type' => 'mcsprojeto',
    'post' => array($project_id)
));
if ($related_query->have_posts()) :
?>
    <section class="container content-block mxlg:mb-[80px] lg:mb-[120px] posts-related">
        <h2 class="lg:text-[63px] mxlg:text-[36px] text-black leading-[1.14em] mxlg:mb-[24px] lg:mb-[80px]"><?php esc_attr_e('Veja também', 'mcs'); ?></h2>
        <div class="lg:flex lg:ml-[-14px]">
            <?php
            while ($related_query->have_posts()) : $related_query->the_post();
            ?>
                <article class="mxlg:first:mb-[55px] lg:px-[14px] lg:w-[50%]">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('projeto-thumb', array('class' => 'w-full')); ?>
                        <?php endif; ?>
                        <h2 class="text-black typography-case-thumbnail"><?php the_title(); ?></h2>
                        <?php if (function_exists("get_field") && get_field("descricao")) { ?>
                            <p class="typography-project-description"><?php the_field('descricao'); ?></p>
                        <?php } ?>
                    </a>
                </article>
            <?php
            endwhile;
            ?>
        </div>
    </section>
<?php
endif;
wp_reset_postdata();
?>

<?php get_footer(); ?>