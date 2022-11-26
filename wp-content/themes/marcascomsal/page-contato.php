<?php
/**
 * Template name: Contato
 *
 * @package WordPress
 * @subpackage Marcas com Sal
 * @since Marcas com Sal 1.0
 */

get_header();

?>

<section class="bg-lilas-evolv container text-white page-contato-header">

    <div class="lg:flex lg:items-end">
        <?php if ( function_exists("get_field") && get_field("texto_inicial") ) { ?>
            <h1 class="lg:w-[25vw] leading-[1.03em] mxlg:text-[44px] lg:text-[52px] page-title lg:pr-[15px]"><?php the_field('texto_inicial'); ?></h1>
        <?php } ?>
        <div class="mxlg:mt-[9vh] lg:ml-auto mxlg:text-[16px] lg:text-[18px] leading-[1.5em] lg:flex lg:w-[50%] lg:mr-[8.33%] lg:pl-[15px]">
            
            <?php if ( function_exists("get_field") && get_field("endereco_completo") ) { ?>
                <div class="lg:w-[25vw] lg:pr-[14px]">
                    <?php the_field('endereco_completo'); ?>
                </div>
            <?php } ?>
            
            <?php if ( function_exists("get_field") && get_field("telefone") || get_field("email") ) { ?>
                <div class="mxlg:mt-[20px] lg:w-[25vw] lg:pl-[14px]">
                    <?php if ( function_exists("get_field") && get_field("telefone") ) { ?>
                    <p>
                        <a href="tel:<?php the_field('telefone'); ?>"><?php the_field('telefone'); ?></a>
                    </p>
                    <?php } ?>
                    <?php if ( function_exists("get_field") && get_field("email") ) { ?>
                    <p>
                        <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
                    </p>
                    <?php } ?>
                </div>
            <?php } ?>
            

        </div>
    </div>
</section>
<!-- /.bg-lilas-evolv -->


<?php if ( function_exists("get_field") && get_field("mapa") ) { ?>
    <figure class="mxlg:relative mxlg:min-h-[350px] mxlg:h-[60vh] mxlg:overflow-hidden">
        <?php if ( function_exists("get_field") && get_field("googlemaps") ) { ?>
        <a href="<?php the_field('googlemaps'); ?>">
        <?php } ?>
        <?php mcs_img_tag_generate( get_field('mapa'), 'full', 'mxlg:absolute mxlg:top-[50%] mxlg:left-[50%] mxlg:-translate-x-[50%] mxlg:-translate-y-[50%] mxlg:h-[100%] mxlg:max-w-[none] mxlg:w-auto lg:w-full' ); ?>
        <?php if ( function_exists("get_field") && get_field("googlemaps") ) { ?>
        </a>
        <?php } ?>
    </figure>
<?php } ?>

<section class="mxlg:py-[80px] lg:px-45 mxlg:px-24 form-wrapper mx-auto max-w-[715px] lg:my-[14vh]">
    <h2 class="text-black mxlg:text-[36px] mxlg:mb-[40px] lg:mb-[6.66vh] lg:text-[35px] leading-[1.5em]"><?php esc_attr_e('Escreva pra gente','mcs'); ?></h2>
    <?php echo do_shortcode('[contact-form-7 id="182" title="Formulário de contato"]'); ?>
</section>
<!-- /.container -->

<?php get_footer(); ?>