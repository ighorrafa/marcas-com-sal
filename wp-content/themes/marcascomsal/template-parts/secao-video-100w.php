<div class="container content-block">
    <?php
        $video_html = get_sub_field( "video" );
        $video_html = str_replace('src=','loading="lazy" src=',$video_html);
        echo $video_html;
    ?>
    <?php if ( get_sub_field('texto') ) { ?>
    <div class="content-block-full-text editor-content">
        <?php the_sub_field('texto'); ?>
    </div>
    <?php } ?>
</div>