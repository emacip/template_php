<!-- ## post start ## -->
<article id="post-<?php the_ID(); ?>" <?php post_class( array('post') ); ?>>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-xs-12 col-sm-offset-1 post-container">
                <!-- ## post-entry start ## -->
                <div class="row post-entry">
                    <!-- ## title start ## -->
                    <div class="col-sm-12">
                        <?php get_template_part('includes/post-formats/post-title'); ?>
                    </div>
                    <!-- ## title end ## -->
                    <?php get_template_part('includes/post-formats/post-content'); ?>
                </div>
                <!-- ## post-entry end ## -->
            </div>
        </div>
    </div>
</article>
<!-- ## post end ## -->