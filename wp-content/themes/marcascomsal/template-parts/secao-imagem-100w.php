<div class="container content-block">
    <?php mcs_img_tag_generate( get_sub_field('imagem'), 'projeto-imagem-full', 'mxlg:hide w-full' ); ?>
    <?php mcs_img_tag_generate( get_sub_field('imagem_mobile'), 'projeto-imagem-full-mobile', 'lg:hide w-full' ); ?>
    <?php
    if ( get_sub_field('texto') ) {
    ?>
    <div class="content-block-full-text editor-content">
        <?php the_sub_field('texto'); ?>
    </div>
    <?php
    }
    ?>
</div>