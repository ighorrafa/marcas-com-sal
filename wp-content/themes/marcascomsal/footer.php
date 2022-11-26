<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Marcas com Sal
 * @since Marcas com Sal 1.0
 */
?>

    <footer class="bg-black text-white mxlg:pt-[75px] mxlg:pb-[15px] mxlg:text-center lg:py-[60px] site-footer">

        <div class="container lg:flex">
            <div class="lg:w-[49vw] lg:pr-[20px]">
                <a href="<?php bloginfo('url'); ?>"><img class="invert mxlg:mx-auto" src="<?php echo public_url(); ?>images/logo-sal.svg" width="60" height="25" alt="Marcas com Sal"></a>
                <p class="mxlg:hide text-[#8E8E8E] lg:mt-[50px] typography-button-label">&copy; <?php echo date('Y'); ?> <?php esc_attr_e('Marcas com Sal','mcs'); ?></p>
            </div>
            <div class="lg:w-[49vw] lg:pl-[20px] mxlg:mt-[75px]">
                <?php if ( has_nav_menu( 'social-network' ) ) : ?>
                    <div id="site-navigation-social-footer" role="navigation" aria-label="<?php esc_attr_e( 'Nossas redes sociais', 'mcs' ); ?>">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'social-network',
                                'menu_class'     => 'site-navigation-social lg:flex',
                                'container'     => '',
                            ) );
                        ?>
                    </div>
                <?php endif; ?>
                <div class="lg:mt-[50px] lg:flex typography-footer-text mxlg:mt-[45px]">
                    <?php if ( function_exists("get_field") && get_page_by_path('contato') && get_field("endereco_rodape", get_page_by_path('contato')->ID ) ) { ?>
                    <div class="lg:w-[23.42vw] lg:pr-[20px]">
                        <?php the_field("endereco_rodape", get_page_by_path('contato')->ID ); ?>
                        <?php if ( get_field("telefone", get_page_by_path('contato')->ID ) ) { ?>
                            <a href="tel:<?php the_field("telefone", get_page_by_path('contato')->ID ); ?>"><?php the_field("telefone", get_page_by_path('contato')->ID ); ?></a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php if ( function_exists("get_field") && get_page_by_path('contato') && get_field("email", get_page_by_path('contato')->ID ) ) { ?>
                    <div class="mxlg:mt-[25px]"><?php the_field("email", get_page_by_path('contato')->ID ); ?></div>
                    <?php } ?>
                </div>
            </div>
            <p class="mxlg:mt-[100px] lg:hide text-[#8E8E8E] lg:mt-[50px] typography-button-label">&copy; <?php echo date('Y'); ?> <?php esc_attr_e('Marcas com Sal','mcs'); ?></p>
        </div>
        <!-- /.container -->
        
    </footer>
    <!-- /.site-footer -->

</div>
<!-- /#page -->

<style>
    @font-face {
    font-family: 'flamaregular';
    src: url('<?php echo public_url(); ?>fonts/flama_regular-webfont.woff2') format('woff2'),
         url('<?php echo public_url(); ?>fonts/flama_regular-webfont.woff') format('woff');
    font-weight: normal;
    font-display: swap;
    font-style: normal;

}

@font-face {
    font-family: 'flamalightregular';
    src: url('<?php echo public_url(); ?>fonts/flamalight_regular-webfont.woff2') format('woff2'),
         url('<?php echo public_url(); ?>fonts/flamalight_regular-webfont.woff') format('woff');
    font-weight: normal;
    font-display: swap;
    font-style: normal;

}
@font-face {
    font-family: 'flamamediumregular';
    src: url('<?php echo public_url(); ?>fonts/flamamedium_regular-webfont.woff2') format('woff2'),
         url('<?php echo public_url(); ?>fonts/flamamedium_regular-webfont.woff') format('woff');
    font-weight: normal;
    font-display: swap;
    font-style: normal;

}
</style>

<?php wp_footer(); ?>

</body>
</html>
