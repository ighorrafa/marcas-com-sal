<div class="container content-block lg:flex lg:flex-wrap">
    <?php if ( get_sub_field('imagem_um') && get_sub_field('imagem_um_mobile') ) { ?>
        <div class="lg:w-[66.954%] lg:pr-[14px]">
        <?php mcs_img_tag_generate( get_sub_field('imagem_um'), 'full', 'mxlg:hide w-full' ); ?>
        <?php mcs_img_tag_generate( get_sub_field('imagem_um_mobile'), 'full', 'lg:hide w-full' ); ?>
        </div>
    <?php } ?>
    <?php if ( get_sub_field('imagem_dois') && get_sub_field('imagem_dois_mobile') ) { ?>
        <div class="mxlg:mt-[16px] lg:w-[33.046%] lg:pl-[14px]">
        <?php mcs_img_tag_generate( get_sub_field('imagem_dois'), 'full', 'mxlg:hide w-full' ); ?>
        <?php mcs_img_tag_generate( get_sub_field('imagem_dois_mobile'), 'full', 'lg:hide w-full' ); ?>
        </div>
    <?php } ?>
    <?php if ( get_sub_field('texto') ) { ?>
    <div class="w-full content-block-full-text editor-content">
        <?php the_sub_field('texto'); ?>
    </div>
    <?php } ?>
</div>