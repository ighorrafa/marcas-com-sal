<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Marcas com Sal
 * @since Marcas com Sal 1.0
 */

get_header();

?>

<div class="container page-content">

    <?php while ( have_posts() ): the_post(); ?>
        <article <?php post_class('py-[10vh]'); ?>>
            <h1 class="text-black font-sans-light mxlg:text-[52px] lg:text-[72px] leading-[1.11em] page-title"><?php the_title(); ?></h1>
            <div class="text-black mt-[5vh] font-sans text-[16px] editor-content">
                <?php the_content(); ?>
            </div>
            <!-- /.editor-content -->
        </article>
    <?php endwhile; // while ( have_posts() ): ?>

</div>
<!-- /.page-content -->


<?php get_footer(); ?>