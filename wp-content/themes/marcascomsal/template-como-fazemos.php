<?php
// Template Name: Como Fazemos

get_header();
?>

<section id="banner-primary">
    <div class="image-cover desk background-black bg-black"></div>
    <div class="heading">
        <div class="container">
            <h1 class="lg:max-w-[50%] text-white pt-22vh pb-15vh mxlg:typography-h2 lg:typography-h1 page-title"><?php the_field('title'); ?></h1>
            <div class="lg:max-w-[50%] text-[16px] mxlg:text-[20px] lg:text-[18px] leading-[1.58em] text-white"><?php the_field('description'); ?></div>
        </div>
    </div>
</section>
<?php if (have_rows('carousel')) : ?>
    <section id="carousel">
        <div class="container">
            <h6 class="font-sans-medium"><?php the_field('sub_title_1') ?></h6>
            <div class="swiper swiper-phrases">
                <div class="swiper-wrapper">
                    <?php while (have_rows('carousel')) : the_row(); ?>
                        <div class="swiper-slide">
                            <h1 class="font-sans-medium"><?php the_sub_field('label') ?></h1>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
<?php endif; ?>
<section id="entregas">
    <div class="container">
        <h6 class="font-sans-medium"><?php the_field('sub_title_2') ?></h6>
        <div class="lg:flex">
            <?php if (have_rows('colunas')) :
                while (have_rows('colunas')) : the_row(); ?>
                    <div class="lg:w-[25vw] col">
                        <h3><?php the_sub_field('title'); ?></h3>
                        <?php the_sub_field('description'); ?>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>
<section class="container text-white bg-lilas-evolv mxlg:py-[90px]" id="cta">
    <h3><?php the_field('cta_title', 557); ?></h3>
    <a href="<?php the_field('button_link', 557) ?>" class="btn-theme"><?php the_field('button_label', 557) ?></a>
</section>

<?php get_footer(); ?>