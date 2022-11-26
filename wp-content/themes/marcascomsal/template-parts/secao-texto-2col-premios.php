<div class="container content-block lg:flex">
    <?php if ( get_sub_field('texto_em_destaque') ) { ?>
        <div class="lg:w-[50%] lg:pr-[14px] editor-content block-links-external">
            <?php the_sub_field('texto_em_destaque'); ?>
        </div>
    <?php } ?>
    <?php if ( get_sub_field('premios') ) { $premios = get_sub_field('premios'); ?>
        <div class="mxlg:mt-[30px] lg:w-[50%] lg:pl-[14px]">

            <?php foreach ( $premios as $premio ) { ?>
            <div class="lg:flex mt-[30px] first:mt-[0]">
                <?php if ( $premio['selo_do_premio'] ) { ?>
                <div class="lg:w-[100px] lg:flex lg:items-center lg:justify-center lg:pr-[15px]">
                    <?php mcs_img_tag_generate( $premio['selo_do_premio'], 'full' ); ?>
                </div>
                <?php } ?>
                <?php if ( $premio['texto_premio'] ) { ?>
                <div class="mxlg:mt-[15px] lg:w-[50%] lg:pl-[15px] editor-content block-links-external">
                    <?php echo $premio['texto_premio']; ?>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>