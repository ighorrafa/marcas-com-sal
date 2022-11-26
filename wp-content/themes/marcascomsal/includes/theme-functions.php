<?php
/**
 * Funções do tema
 *
 * @package WordPress
 * @subpackage Marcas com Sal
 * @since Marcas com Sal 1.0
 */

// PEGA O LINK DA PAGINA PELO SLUG
if ( ! function_exists( 'mcs_get_page_link_by_slug' ) ):

function mcs_get_page_link_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if ($page) :
    return get_permalink( $page->ID );
  else :
    return "#";
  endif;
}

endif; // if ( ! function_exists( 'mcs_get_page_link_by_slug' ) ) {

// Pega o ID usando WPML
if ( ! function_exists( 'mcs_theme_get_id_wpml' ) ):

function mcs_theme_get_id_wpml( $idnumber, $element_type = 'page' ) {

    // Initialize the permalink value
    if ( ! isset($idnumber) ) return false;
    
    $newid = $idnumber;
    
    if ( function_exists('icl_object_id') ) {
        $newid = apply_filters( 'wpml_object_id', $idnumber, $element_type, TRUE );
    }

    return $newid;
}

endif; // if ( ! function_exists( 'mcs_theme_get_id_wpml' ) ) {

// Pega o permalink pelo titulo - usando WPML
// http://tommcfarlin.com/get-permalink-by-slug/
if ( ! function_exists( 'mcs_theme_get_permalink_by_title' ) ):

function mcs_theme_get_permalink_by_title( $title ) {

    // Initialize the permalink value
    $permalink = null;

    // Try to get the page by the incoming title
    $page = get_page_by_title( strtolower( $title ) );
    if ( function_exists('icl_object_id') ) {
        $page = icl_object_id( $page->ID, 'page', FALSE, ICL_LANGUAGE_CODE );
    }

    // If the page exists, then let's get its permalink
    if( null != $page ) {
        $permalink = get_permalink( $page );
    } // end if

    return $permalink;

}

endif; // if ( ! function_exists( 'mcs_theme_get_permalink_by_title' ) ) {

// Pega o permalink pelo titulo - usando WPML
// http://tommcfarlin.com/get-permalink-by-slug/
if ( ! function_exists( 'mcs_theme_get_permalink_by_title_print' ) ):

function mcs_theme_get_permalink_by_title_print( $title ) {

    // Initialize the permalink value
    $permalink = null;

    // Try to get the page by the incoming title
    $page = get_page_by_title( strtolower( $title ) );

    // If the page exists, then let's get its permalink
    if ( null != $page ) {
        $permalink = icl_link_to_element( $page->ID, 'page' , __( $title ) );
    } // end if
}
endif; // if ( ! function_exists( 'mcs_theme_get_permalink_by_title_print' ) ) {

if ( ! function_exists( 'mcs_paging_nav' ) ):
function mcs_paging_nav( $totalPages = '' ) {

    if ( $totalPages != '' ) {
        $postsMaxNumPage = $totalPages;
    } else {
        $postsMaxNumPage = $GLOBALS['wp_query']->max_num_pages;
    }

    // Don't print empty markup if there's only one page.
    if ( $postsMaxNumPage < 2 ) {
        return;
    }

    $bigNumber = 999999999;
    $pageNumber = 1;

    if ( get_query_var('paged') ) {
        $pageNumber = get_query_var('paged');
    }

    ?>

    <nav class="pagination-wrapper container">
        
        <div class="pagination">

    <?php
        echo paginate_links( array(
            'base' => str_replace( $bigNumber, '%#%', esc_url( get_pagenum_link( $bigNumber ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $postsMaxNumPage,
            'prev_text'    => __('&lt;'),
            'next_text'    => __('&gt;')
          ) );

    ?>

        </div>

    </nav> <!-- .pagination-wrapper container -->
    <?php

} // mcs_paging_nav()
endif; // if ( ! function_exists( 'mcs_paging_nav' ) ):

if ( ! function_exists( 'mcs_img_tag_generate' ) ):

function mcs_img_tag_generate( $img, $size = 'full', $imgClass = '', $lazyLoad = true, $style = '', $attr = '' ) {

    if ( ! isset($img) || '' == $img ) return false;

    if ( strpos( $img['mime_type'], 'gif' ) > -1 ) {
    ?>
        <img <?php if ( $lazyLoad ) { ?>loading="lazy"<?php } ?> src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>" width="<?php echo $img['width'] ?>" height="<?php echo $img['height'] ?>" class="<?php echo $imgClass ?>" style="<?php echo $style; ?>">
    <?php
    } else {
        if ( $lazyLoad ) {
            echo wp_get_attachment_image( $img['ID'], $size, '', array( 'class' => $imgClass, 'loading' => 'lazy', 'style' => $style, $attr => '' ) );
        } else {
            echo wp_get_attachment_image( $img['ID'], $size, '', array( 'class' => $imgClass, 'loading' => 'eager', 'style' => $style, $attr => '' ) );
        }
    }
}

endif; // if ( ! function_exists( 'mcs_img_tag_generate' ) ) {