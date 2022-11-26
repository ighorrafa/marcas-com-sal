<div class="container content-block lg:flex">
    <?php if ( get_sub_field('texto') ) { ?>
        <div class="lg:flex lg:flex-col lg:justify-center lg:pl-[7.65vw] lg:w-[50%] lg:pr-[calc(15vw+14px)] editor-content">
        <?php the_sub_field('texto'); ?>
        </div>
    <?php } ?>
    <?php if ( get_sub_field('imagem_um') && get_sub_field('imagem_um_mobile') ) { ?>
        <div class="mxlg:mt-[80px] lg:w-[50%] lg:pl-[14px]">
        <?php mcs_img_tag_generate( get_sub_field('imagem_um'), 'full', 'mxlg:hide w-full' ); ?>
        <?php mcs_img_tag_generate( get_sub_field('imagem_um_mobile'), 'full', 'lg:hide w-full' ); ?>
        </div>
    <?php } ?>
</div>