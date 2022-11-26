<div class="container content-block lg:flex">

    <?php if ( get_sub_field('video') ) { ?>
        <div class="lg:w-[50%] lg:pr-[14px]">
            <?php
            $video_html = get_sub_field( "video" );
            $video_html = str_replace('src=','loading="lazy" src=',$video_html);
            echo $video_html;
            ?>
        </div>
    <?php } ?>

    <?php if ( get_sub_field('texto') ) { ?>
        <div class="mxlg:mt-[20px] lg:flex lg:flex-col lg:justify-center lg:pl-[7.65vw] lg:w-[50%] lg:pr-[calc(15vw+14px)] editor-content">
        <?php the_sub_field('texto'); ?>
        </div>
    <?php } ?>
</div>