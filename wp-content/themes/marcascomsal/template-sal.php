<?php
// Template Name: A Sal

get_header();
?>

<section id="banner-primary">
    <?php if (get_field('tipo_de_banner') == 'Video') : ?>
        <div class="video-cover"></div>
    <?php elseif (get_field('tipo_de_banner') == 'Imagem') : ?>
        <div class="image-cover desk" style="background-image: url(<?php echo wp_get_attachment_image_url(get_field('image_desk'), 'full') ?> )"></div>
        <div class="image-cover mobile" style="background-image: url(<?php echo wp_get_attachment_image_url(get_field('image_mobile'), 'full') ?> )"></div>
    <?php endif; ?>
    <div class="heading">
        <div class="container">
            <h1 class="col-lg-7 text-black mxlg:py-[23vh] lg:py-[22.78vh] mxlg:typography-h2 lg:typography-h1 page-title"><?php the_field('title'); ?></h1>
            <div class="col-lg-4 text-[16px] mxlg:text-[20px] lg:text-[18px] leading-[1.58em] text-black"><?php the_field('description'); ?></div>
        </div>
    </div>
</section>
<section id="us">
    <div class="container">
        <?php the_field('us') ?>
    </div>
</section>
<secition id="tempero">
    <div class="container">
        <h6><?php the_field('text') ?></h6>
        <div class="lg:flex">
            <?php if (have_rows('coluna')) :
                while (have_rows('coluna')) : the_row(); ?>
                    <div class="lg:w-[33.33vw] col">
                        <h3><?php the_sub_field('title'); ?></h3>
                        <?php the_sub_field('description'); ?>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</secition>
<section class="container text-white bg-lilas-evolv lg:py-[80px] mxlg:py-[90px]" id="cta">
    <h3><?php the_field('cta_title'); ?></h3>
    <a href="<?php the_field('button_link') ?>" class="btn-theme"><?php the_field('button_label') ?></a>
</section>

<?php get_footer(); ?>