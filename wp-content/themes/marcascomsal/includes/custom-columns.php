<?php

/**
 * Colunas de admin customizadas
 *
 * @package WordPress
 * @subpackage Marcas com Sal
 * @since Marcas com Sal 1.0
 */

/**
 * Custom columns for Destaques
 */

// add_filter( 'manage_posts_columns', 'mcs_managing_my_posts_columns', 10, 2 );

if ( ! function_exists('mcs_managing_my_posts_columns') ):

function mcs_managing_my_posts_columns( $columns, $post_type ) {
    switch ( $post_type ) {
      
        case 'bannershome':
            $new_columns = array();
            foreach( $columns as $key => $value ) {
                $new_columns[ $key ] = $value;

                if ( $key == 'title' )
                    $new_columns[ 'banner_imagem' ] = 'Imagem';

            }

        return $new_columns;

   }

   return $columns;

} // function mcs_managing_my_posts_columns( $columns, $post_type ) {

endif;

if ( ! function_exists('mcs_populating_my_posts_columns_bannershome') ):

function mcs_populating_my_posts_columns_bannershome( $column_name, $post_id ) {
    switch( $column_name ) {
        
        case 'banner_imagem':

            if ( function_exists('get_field') && get_field('banner_imagem', $post_id)) {
                $bannerimagem = get_field('banner_imagem', $post_id);
                $bannerimagem = $bannerimagem['sizes'];
                $bannerimagem = $bannerimagem['thumb-edicoes'];
            }

            if ( isset( $bannerimagem ) && $bannerimagem != '' ) {
                echo '<div id="banner_imagem-' . $post_id . '"><img src="' . $bannerimagem . '" /></div>';
            }
            break;

   }

} // function mcs_populating_my_posts_columns_bannershome( $column_name, $post_id ) {

endif; // if ( ! function_exists('mcs_populating_my_posts_columns_bannershome') ):

// add_action( 'manage_bannershome_posts_custom_column', 'mcs_populating_my_posts_columns_bannershome', 10, 2 );