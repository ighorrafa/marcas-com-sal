<div class="container content-block">
    <div class="swiper-container swiper-full swiper">
            <div class="swiper-wrapper">
        <?php
        while ( have_rows('carrossel_100vw_swiper') ) {
            the_row();
        ?>
        <div class="swiper-slide">
        <?php
        if( get_row_layout() == 'imagem' && get_sub_field('swiper_imagem') && get_sub_field('swiper_imagem_mobile') ):
        ?>
            <figure>
                <?php mcs_img_tag_generate( get_sub_field('swiper_imagem'), 'projeto-cover', 'mxlg:hide w-full' ); ?>
                <?php mcs_img_tag_generate( get_sub_field('swiper_imagem_mobile'), 'projeto-cover-mobile', 'lg:hide w-full' ); ?>
            </figure>
        <?php
        elseif( get_row_layout() == 'video' ): 
        ?>
            <div>
            <?php
                if ( get_sub_field( "swiper_video" ) ) {
                    $video_html = get_sub_field( "swiper_video" );
                    $video_html = str_replace('src=','loading="lazy" src=',$video_html);
                    echo $video_html;
                }
            ?>
            </div>
        <?php
        endif;
        
        ?>
        </div>
        <?php
        }
        ?>
            </div>
            <!-- /.swiper-wrapper -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
    </div>
    <!-- /.swiper -->
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
<!-- /.container content-block -->