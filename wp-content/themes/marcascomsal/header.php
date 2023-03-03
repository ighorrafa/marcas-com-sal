<?php

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Marcas com Sal
 * @since Marcas com Sal 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> data-is-mobile="<?php echo wp_is_mobile(); ?>">

<head>
    <style>
        @font-face {
            font-family: 'anothergrotesk';
            src: url('<?php echo public_url(); ?>fonts/anothergrotesk-regular-webfont.woff2') format('woff2'),
                url('<?php echo public_url(); ?>fonts/anothergrotesk-regular-webfont.woff') format('woff');
            font-weight: normal;
            font-display: swap;
            font-style: normal;

        }

        @font-face {
            font-family: 'anothergrotesksemibold';
            src: url('<?php echo public_url(); ?>fonts/anothergrotesk-semibold-webfont.woff2') format('woff2'),
                url('<?php echo public_url(); ?>fonts/anothergrotesk-semibold-webfont.woff') format('woff');
            font-weight: normal;
            font-display: swap;
            font-style: normal;

        }

        @font-face {
            font-family: 'anothergroteskmedium';
            src: url('<?php echo public_url(); ?>fonts/anothergrotesk-medium-webfont.woff2') format('woff2'),
                url('<?php echo public_url(); ?>fonts/anothergrotesk-medium-webfont.woff') format('woff');
            font-weight: normal;
            font-display: swap;
            font-style: normal;

        }
    </style>

    <?php
    // Google Analytics - código de monitoramento
    if (!is_user_logged_in() && 'production' == AMBIENT_VAR_DEF) {
    ?>

    <?php
    } // if ( ! is_user_logged_in() && 'production' == AMBIENT_VAR_DEF ) {
    ?>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <meta content="telephone=no" name="format-detection">

    <?php include('includes/atf-preload-image.php'); ?>

    <?php wp_head(); ?>

</head>

<?php
$body_class = 'bg-white text-cinza-medio font-sans';
if (function_exists("get_field") && is_singular('mcsprojeto') && 'branco' == get_field("cor_do_cabecalho")) {
    $body_class .= ' header-invert';
}
if (is_page_template('page-contato.php') || is_page_template('template-como-fazemos.php') || is_archive('projetos')) {
    $body_class .= ' header-invert';
}
?>

<body <?php body_class($body_class); ?> data-is-mobile="<?php echo wp_is_mobile(); ?>">

    <div id="top"></div>

    <div id="page">

        <header class="fixed z-[9000] top-0 left-0 w-100% flex container lg:py-30 mxlg:py-40 mxlg:items-center site-header">

            <a class="site-logo" href="<?php bloginfo('url'); ?>"><img class="site-logo-image" src="<?php echo public_url(); ?>images/logo-sal.svg" width="60" height="25" alt="Marcas com Sal"></a>

            <button tabindex="-1" class="lg:hide btn-toggle-menu-mobile" type="button" role="button" aria-label="<?php esc_attr_e('Abrir o menu principal', 'mcs'); ?>"></button>
            <div data-label="<?php esc_attr_e('Menu', 'mcs'); ?>" class="lg:ml-auto lg:flex mxlg:pt-[22vh] mxlg:pb-[5vh] mxlg:px-24 lg:items-center site-header-mobile">

                <?php if (has_nav_menu('primary')) : ?>
                    <nav id="site-navigation-primary" class="lg:uppercase" role="navigation" aria-label="<?php esc_attr_e('Menu principal', 'mcs'); ?>">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'lg:flex',
                            'container'     => '',
                        ));
                        ?>
                    </nav>
                <?php endif; ?>

                <?php if (has_nav_menu('social-network')) : ?>
                    <div id="site-navigation-social" class="lg:hide" role="navigation" aria-label="<?php esc_attr_e('Nossas redes sociais', 'mcs'); ?>">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'social-network',
                            'menu_class'     => '',
                            'container'     => '',
                        ));
                        ?>
                    </div>
                <?php endif; ?>

            </div>

        </header>
        <!-- /.site-header -->