<?php

/**
 * Archive for 'Projeto' CPT
 *
 * @package WordPress
 * @subpackage Marcas com Sal
 * @since Marcas com Sal 1.0
 */

get_header();

?>

<?php if (function_exists("get_field") && get_field("projetos_titulo", 'option')) { ?>
    <section id="banner-primary">
        <div class="image-cover desk background-black bg-black"></div>
        <div class="heading">
            <div class="container pt-22vh pb-15vh">
                <div class="lg:max-w-[50%] text-[16px] mxlg:text-[20px] lg:text-[18px] leading-[1.58em] text-white"><?php the_field("projetos_titulo", 'option'); ?></div>
                <h1 class="lg:max-w-[50%] text-white mxlg:typography-h2 lg:typography-h1 page-title"><?php the_field('sub_titulo', 'option'); ?></h1>
            </div>
        </div>
    </section>
    <!-- /.container -->
<?php } ?>

<div class="container projects-list mxlg:pb-[80px] lg:pb-[75px]">

    <?php
    if (have_posts()) {
        while (have_posts()) : the_post();
    ?>
            <article <?php post_class('projects-list-item'); ?>>
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
        endwhile; // ( have_posts() ):
    } else {
        ?>
        <p class="font-sans-medium text-[24px] py-[10vh]"><?php esc_attr_e('Desculpe, nenhum projeto encontrado.', 'mcs'); ?></p>
    <?php
    }
    ?>

</div>
<!-- /.projects-list -->

<?php if (function_exists("get_field") && have_rows("segmento", 'option')) { ?>

    <div class="clients-list bg-cinza-claro">

        <div class="container text-black typography-h4 mxlg:pt-[50px] mxlg:pb-[25px] lg:py-[80px]">
            <h3 class="typography-h4"><?php esc_attr_e('Nossos clientes', 'mcs'); ?></h3>

            <div class="mxlg:mt-[40px] lg:mt-[80px] list">

                <?php while (have_rows("segmento", 'option')) : the_row(); ?>
                    <article class="row lg:flex mxlg:mb-[24px] lg:pb-[40px]">

                        <?php if (get_sub_field('nome_do_segmento')) { ?>
                            <h4 class="text-lilas-evolv typography-client-category lg:w-[22.32vw] lg:mr-[14px] lg:pb-[42px] lg:border-b-1 lg:border-solid lg:border-[#C2C2C2]"><?php the_sub_field('nome_do_segmento'); ?></h4>
                        <?php } ?>

                        <?php if (have_rows('clientes', 'option')) { ?>
                            <ul class="clients flex mxlg:mt-[12px] lg:flex-1 flex-wrap lg:ml-[14px] mxlg:pb-[16px] lg:pb-[42px] border-b-1 border-solid border-[#C2C2C2]">

                                <?php while (have_rows('clientes', 'option')) : the_row(); ?>
                                    <?php if (get_sub_field('nome_do_cliente')) { ?>
                                        <li class="lg:flex mxlg:w-[50%] lg:w-[33.33%] mxlg:mb-[10px] lg:mb-[5px] pr-[20px]">
                                            <?php if (get_sub_field('link_cliente')) { ?>
                                                <a class="text-black typography-client-name link-external" href="<?php the_sub_field('link_cliente') ?>">
                                                <?php } else { ?>
                                                    <span class="text-black typography-client-name">
                                                    <?php } ?>
                                                    <?php the_sub_field('nome_do_cliente');  ?>
                                                    <?php if (get_sub_field('link_cliente')) { ?>
                                                </a>
                                            <?php } else { ?>
                                                </span>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                <?php endwhile; ?>

                            </ul>
                        <?php } ?>

                    </article>
                <?php endwhile; ?>

            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.clients-list -->

<?php } // if ( function_exists("get_field") && have_rows("segmento") ) { 
?>

<?php get_footer(); ?>