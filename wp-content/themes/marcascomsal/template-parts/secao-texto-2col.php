<div class="container content-block lg:flex">
    <?php if ( get_sub_field('texto_em_destaque') ) { ?>
        <div class="lg:flex lg:flex-col lg:justify-center lg:pl-[7.65vw] lg:w-[50%] lg:pr-[calc(15vw+14px)] editor-content">
            <?php the_sub_field('texto_em_destaque'); ?>
        </div>
    <?php } ?>
    <?php if ( get_sub_field('texto_maior') ) { ?>
        <div class="mxlg:mt-[16px] lg:w-[50%] lg:pl-[14px] mxlg:mt-[20px] content-block-col-text editor-content">
            <?php the_sub_field('texto_maior'); ?>
        </div>
    <?php } ?>
</div>