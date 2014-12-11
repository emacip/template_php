<!-- ## post start ## -->
<article id="post-<?php the_ID(); ?>" <?php post_class( array('post') ); ?>>
    <?php get_template_part('includes/post-formats/post-thumb'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-xs-12 col-sm-offset-1 entry-meta-part">
                <?php get_template_part('includes/post-formats/entry-author'); ?>
                <span class="meta-post-type">
                    <span class="arrow"></span>
                    <?php get_template_part('includes/post-formats/entry-type'); ?>
                </span>
            </div>
            <div class="col-sm-10 col-xs-12 col-sm-offset-1 post-container">
                <!-- ## post-entry start ## -->
                <div class="row post-entry">
                    <!-- ## title start ## -->
                    <div class="col-sm-12">
                        <?php get_template_part('includes/post-formats/post-title'); ?>
                    </div>
                    <!-- ## title end ## -->
                    <!-- ## entry-meta start ## -->
                    <div class="col-sm-12 entry-meta">
                        <?php get_template_part('includes/post-formats/entry-sticky'); ?>
                        <?php get_template_part('includes/post-formats/entry-date'); ?>
                        <?php get_template_part('includes/post-formats/entry-comments'); ?>
                        <?php get_template_part('includes/post-formats/entry-categories'); ?>
                    </div>
                    <!-- ## entry-meta end ## -->
                    <?php get_template_part('includes/post-formats/post-content'); ?>
                    <?php get_template_part('includes/post-formats/entry-tags'); ?>
                </div>
                <!-- ## post-entry end ## -->
                <?php get_template_part( 'includes/post-formats/social-buttons'); ?>
            </div>
        </div>
    </div>
</article>
<!-- ## post end ## -->