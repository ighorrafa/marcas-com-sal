<div class="container content-block lg:flex lg:flex-wrap">
    <div class="swiper-cols swiper-container w-full">

        <div class="swiper-wrapper">

            <?php if ( get_sub_field('imagem_um') && get_sub_field('imagem_um_mobile') ) { ?>
                <div class="swiper-slide">
                <?php mcs_img_tag_generate( get_sub_field('imagem_um'), 'full', 'mxlg:hide w-full' ); ?>
                <?php mcs_img_tag_generate( get_sub_field('imagem_um_mobile'), 'full', 'lg:hide w-full' ); ?>
                </div>
            <?php } ?>

            <?php if ( get_sub_field('imagem_dois') && get_sub_field('imagem_dois_mobile') ) { ?>
                <div class="swiper-slide">
                <?php mcs_img_tag_generate( get_sub_field('imagem_dois'), 'full', 'mxlg:hide w-full' ); ?>
                <?php mcs_img_tag_generate( get_sub_field('imagem_dois_mobile'), 'full', 'lg:hide w-full' ); ?>
                </div>
            <?php } ?>

            <?php if ( get_sub_field('imagem_tres') && get_sub_field('imagem_tres_mobile') ) { ?>
                <div class="swiper-slide">
                <?php mcs_img_tag_generate( get_sub_field('imagem_tres'), 'full', 'mxlg:hide w-full' ); ?>
                <?php mcs_img_tag_generate( get_sub_field('imagem_tres_mobile'), 'full', 'lg:hide w-full' ); ?>
                </div>
            <?php } ?>

        </div>
        <!-- /.swiper-wrapper -->
        <div class="swiper-button-prev lg:hide"></div>
        <div class="swiper-button-next lg:hide"></div>

    </div>
    <!-- /.swiper-cols -->
    <?php if ( get_sub_field('texto') ) { ?>
    <div class="w-full content-block-full-text editor-content">
        <?php the_sub_field('texto'); ?>
    </div>
    <?php } ?>

</div>