<?php

/**
 * Configurações do tema
 *
 * @package WordPress
 * @subpackage Marcas com Sal
 * @since Marcas com Sal 1.0
 */

if (!isset($content_width)) $content_width = 940;

if (!function_exists('public_url')) :

    function public_url()
    {

        // if ( 'production' == AMBIENT_VAR_DEF ) {
        //     return get_bloginfo('template_directory') . '/public/min/';
        // } else {
        return get_bloginfo('template_directory') . '/public/';
        // }
    }

endif; // if ( ! function_exists( 'public_url' ) {

if (!function_exists('assets_url')) :

    function assets_url()
    {
        return get_bloginfo('template_directory') . '/public/';
    }

endif; // if ( ! function_exists( 'assets_url' ) {

/** 
 ** Setup inicial do tema
 **/

if (!function_exists('mcs_setup_inicial')) :

    function mcs_setup_inicial()
    {
        /*
     * Inicia a traducao
     */
        load_theme_textdomain('mcs', get_template_directory() . '/languages');

        /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
        add_theme_support('title-tag');

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Cabeçalho', 'mcs'),
            'social-network' => __('Redes sociais', 'mcs'),
        ));

        /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */
        add_editor_style('assets/css/editor-style.css');

        /*
     * Seta os tamanhos das imagens
     */
        add_theme_support('post-thumbnails');
        add_image_size('projeto-thumb', 960, 500, false); // width, height, crop
        add_image_size('projeto-cover', 1920, 900, false); // width, height, crop
        add_image_size('projeto-cover-mobile', 750, 1120, false); // width, height, crop
        add_image_size('projeto-imagem-full', 1740, 980, false); // width, height, crop
        add_image_size('projeto-imagem-full-mobile', 1740, 980, false); // width, height, crop
    }
endif; // if ( ! function_exists( 'mcs_setup_inicial' ) ) {
add_action('after_setup_theme', 'mcs_setup_inicial');

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since Marcas com Sal 1.0
 */
function mcs_scripts_styles()
{
    global $wp_styles;
    global $post;

    $cssVer = '1.0.4';
    $jsVer = '1.0.5';

    /*
     * Carrega os CSS's comuns
     */
    wp_enqueue_style('global-mcs-style', public_url() . 'css/global.css', '', $cssVer);

    wp_enqueue_style('new-mcs-style', public_url() . 'css/styles.css', '', $cssVer);

    /*
     * Adiciona o jQuery
     */
    // wp_enqueue_script('jquery');

    /*
     * Adiciona o Plugins.js
     */
    // wp_register_script( 'plugins-mcs-scripts', public_url() . 'js/plugins.js', array('jquery'), $jsVer, true );
    // wp_enqueue_script( 'plugins-mcs-scripts' );

    /*
     * Adiciona o global.js
     */
    wp_register_script('global-mcs-scripts', public_url() . 'js/global.js', '', $jsVer, true);
    wp_enqueue_script('global-mcs-scripts');

    /*
     * Adiciona o swiper.js
     */
    if (is_front_page() || is_singular('mcsprojeto') || is_page_template('template-como-fazemos.php')) {

        wp_register_script('swiper-mcs-scripts', public_url() . 'js/plugins/swiperjs/swiper-bundle.min.js', '', $jsVer, true);
        wp_enqueue_script('swiper-mcs-scripts');
    }

    /*
     * Adiciona o home.js
     */
    if (is_front_page()) {

        wp_register_script('home-mcs-scripts', public_url() . 'js/home.js', '', $jsVer, true);
        wp_enqueue_script('home-mcs-scripts');
    }

    /*
     * Adiciona o project.js
     */
    if (is_singular('mcsprojeto')) {

        wp_register_script('project-mcs-scripts', public_url() . 'js/project.js', '', $jsVer, true);
        wp_enqueue_script('project-mcs-scripts');
    }

    /*
     * Adiciona o como-fazemos.js
     */
    if (is_page_template('template-como-fazemos.php')) {

        wp_register_script('como-fazemos-mcs-scripts', public_url() . 'js/como-fazemos.js', '', $jsVer, true);
        wp_enqueue_script('como-fazemos-mcs-scripts');
    }

    // Remove jQuery e Gutenberg CSS
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);

        // wp_dequeue_style('wp-block-library');
        // wp_dequeue_style('wp-block-library-theme');
        // wp_dequeue_style('wc-block-style');

        if (!is_page('Contato')) {
            wp_dequeue_script('contact-form-7');
            wp_dequeue_style('contact-form-7');
        }
    }
} // function mcs_scripts_styles() {

add_action('wp_enqueue_scripts', 'mcs_scripts_styles');

/*
 * ACF Options Page
 */

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'Segmentos e Clientes',
        'menu_title'    => 'Segmentos e Clientes',
        'menu_slug'     => 'segmentos-clientes',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
} // if ( function_exists('acf_add_options_page') ) {

/*
 * Enable automatic updates using Git
 */
add_filter('automatic_updates_is_vcs_checkout', '__return_false', 1);


// Move Yoast box to bottom
if (!function_exists('mcs_yoasttobottom')) {
    function mcs_yoasttobottom()
    {
        return 'low';
    }
    add_filter('wpseo_metabox_prio', 'mcs_yoasttobottom');
} // if ( ! function_exists('mcs_yoasttobottom') ) {

// Change the Admin Login Logo
// https://codex.wordpress.org/Customizing_the_Login_Form
if (!function_exists('mcs_my_login_logo')) {
    function mcs_my_login_logo()
    { ?>
        <style type="text/css">
            #login h1 a {
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/public/images/global/logo-simbolo.png) center center no-repeat;
                width: 100%;
                height: 80px;
                background-size: 100% auto;
                margin-bottom: 10px;
            }
        </style>
<?php }
    add_action('login_enqueue_scripts', 'mcs_my_login_logo');
} // if ( ! function_exists('mcs_my_login_logo') ) {

if (!function_exists('mcs_login_custom_link')) {
    function mcs_login_custom_link()
    {
        return get_bloginfo('url');
    }
    add_filter('login_headerurl', 'mcs_login_custom_link');
} // if ( ! function_exists('mcs_login_custom_link') ) {

if (!function_exists('mcs_login_title_on_logo')) {
    function mcs_login_title_on_logo()
    {
        return get_bloginfo('name');
    }
    add_filter('login_headertitle', 'mcs_login_title_on_logo');
} // if ( ! function_exists('mcs_login_title_on_logo') ) {

// Allow SVG through WordPress Media Uploader
// https://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader/
function regwp_cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'regwp_cc_mime_types');

// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);

//Remove Gutenberg Block Library CSS from loading on the frontend
function mcs_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'mcs_remove_wp_block_library_css', 100);

// Remove Jetpack CSS
add_filter('jetpack_sharing_counts', '__return_false', 99);
add_filter('jetpack_implode_frontend_css', '__return_false', 99);

/**
 * Disable the emoji's
 */
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

        $urls = array_diff($urls, array($emoji_svg_url));
    }

    return $urls;
}

function mcs_remove_menus()
{
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
    remove_menu_page('tools.php');
}

add_action('admin_menu', 'mcs_remove_menus');

// PEGA EMBED DO VIDEO A PARTIR DA URL DO YOUTUBE
function getYoutubeEmbedFromUrl($url)
{
    preg_match("/^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/|shorts\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/", $url, $matches);
    $video_id = $matches[1];
    $iframe_url = "https://www.youtube.com/embed/" . $video_id . "?&autoplay=1&mute=1&playsinline=1";
    return $iframe_url;
}
