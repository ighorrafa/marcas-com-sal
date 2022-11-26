<?php

/**
 * Registro de post types e taxonomies
 *
 * @package WordPress
 * @subpackage Marcas com Sal
 * @since Marcas com Sal 1.0
 */

if ( ! function_exists('mcs_theme_register_custom') ):

function mcs_theme_register_custom() {

    // Cria novo formato de post 'Projetos'
    register_post_type(
        'mcsprojeto',
        array(
            'labels' => array(
                'name' => __( 'Projetos' ),
                'menu_name' => __('Projetos'),
                'singular_name' => __( 'Projeto' ),
                'add_new' => __('Adicionar novo'),
                'add_new_item' => __('Adicionar novo projeto'),
                'edit_item' => __('Editar projeto'),
                'new_item' => __('Novo projeto'),
                'all_items' => __('Projetos cadastrados'),
                'view_item' => __('Ver projeto'),
                'search_items' => __('Procurar projeto'),
                'not_found' =>  __('Nenhum projeto encontrado'),
                'not_found_in_trash' => __('Nenhum projeto foi encontrado na lixeira'),
                'parent_item_colon' => ''
            ),
            'public' => true,
            'has_archive' => 'projetos',
            'capability_type' => 'post',
            'menu_position' => 20,
            'supports' => array('title', 'thumbnail'),
            'rewrite' => array('slug' => 'projeto','with_front' => false),
    ));

} // mcs_theme_register_custom()

endif; // if ( ! function_exists('mcs_theme_register_custom') ):

add_action( 'init' , 'mcs_theme_register_custom' , 0 );