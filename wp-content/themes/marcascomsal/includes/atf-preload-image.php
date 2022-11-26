<?php
/*
 * Preload above the fold images
 */

global $post;
$post_id = $post->ID;

if ( function_exists('get_field') ) {

  if ( is_singular('mcsprojeto') && get_field("cover", $post_id) ) {

    if ( 'imagem' == get_field("cover",$post_id) && get_field("cover_imagem",$post_id) && get_field("cover_imagem_mobile",$post_id) ) {
      $banner_desktop = get_field("cover_imagem",$post_id);
      $banner_mobile = get_field("cover_imagem_mobile",$post_id);
    ?>
      <link rel="preload" as="image" href="<?php echo $banner_desktop['url']; ?>" imagesrcset="<?php echo wp_get_attachment_image_srcset( $banner_desktop['ID'] ) ;?>">
      <link rel="preload" as="image" href="<?php echo $banner_mobile['url']; ?>" imagesrcset="<?php echo wp_get_attachment_image_srcset( $banner_mobile['ID'] ) ;?>">
    <?php
    }

    if ( 'carrossel' == get_field("cover",$post_id) && have_rows("cover_swiper",$post_id) ) {

      $swiper_slide = 0;
      while ( have_rows('cover_swiper', $post_id) ) {
        the_row(); $swiper_slide++;
        if ( 1 == $swiper_slide ) {
          
          if ( get_row_layout() == 'imagem' && get_sub_field('swiper_imagem') && get_sub_field('swiper_imagem_mobile') ) {

          $banner_desktop = get_sub_field("swiper_imagem",$post_id);
          $banner_mobile = get_sub_field("swiper_imagem_mobile",$post_id);
        ?>
          <link rel="preload" as="image" href="<?php echo $banner_desktop['url']; ?>" imagesrcset="<?php echo wp_get_attachment_image_srcset( $banner_desktop['ID'] ) ;?>">
          <link rel="preload" as="image" href="<?php echo $banner_mobile['url']; ?>" imagesrcset="<?php echo wp_get_attachment_image_srcset( $banner_mobile['ID'] ) ;?>">
        <?php
          }
        }

      }

    }

  }
}

?>