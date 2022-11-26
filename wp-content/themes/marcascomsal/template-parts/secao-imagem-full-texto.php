<div class="container content-block lg:flex lg:flex-wrap">
    <?php if ( get_sub_field('imagem_um') && get_sub_field('imagem_um_mobile') ) { ?>
        <figure class="w-full">
            <?php mcs_img_tag_generate( get_sub_field('imagem_um'), 'full', 'mxlg:hide w-full' ); ?>
            <?php mcs_img_tag_generate( get_sub_field('imagem_um_mobile'), 'full', 'lg:hide w-full' ); ?>
        </figure>
    <?php } ?>
    <?php if ( get_sub_field('texto') ) { ?>
        <div class="mxlg:mt-[20px] lg:mt-[40px] lg:w-[50%] lg:ml-auto content-block-col-text editor-content">
        <?php the_sub_field('texto'); ?>
        </div>
    <?php } ?>
</div>