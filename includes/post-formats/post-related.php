<?php
    
    /*
    * Load Related Posts Widget
    */ 
?>
<?php if ( inafx_theme_option( 'opt_show_related_posts' ) != 0 ) : ?>
<?php
    global $post;
    $args = array();
    $default = array(
        'post_type' => get_post_type($post),
        'class' => 'widget widget_related_posts',
        'class_list' => '',
        'class_list_item' => '',
        'display_title' => true,
        'display_link' => true,
        'display_thumbnail' => true,
        'width_thumbnail' => 800,
        'height_thumbnail' => 600,
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        'posts_count' => inafx_theme_option( 'opt_related_posts_count' )
    );
    extract(array_merge($default, $args));
    
    $post_tags = wp_get_post_terms($post->ID, $post_type.'_tag', array("fields" => "slugs"));
    $tags_type = $post_type=='post' ? 'tag' : $post_type.'_tag' ;
    $blog_related = inafx_theme_option( 'opt_related_posts_title' );
    if ($post_tags && !is_wp_error($post_tags)) {
        $args = array(
            "$tags_type" => implode(',', $post_tags),
            'post_status' => 'publish',
            'posts_per_page' => $posts_count,
            'ignore_sticky_posts' => 1,
            'post__not_in' => array($post->ID),
            'post_type' => $post_type
            );
    
        query_posts($args);
        if ( have_posts() ) {
?>
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <div class="row">
                <div class="col-sm-12 related-posts-container">
                    <div class="<?php echo $class; ?>">
                        <!-- ## related-posts start ## -->
                        <aside id="related-posts">
                            <?php echo $before_title . $blog_related . $after_title; ?>
                            <div class="clearfix"></div>
                            <ul class="row clearfix <?php echo $class_list_item; ?>">
                                <?php
                                    $loop = 1;
                                    while( have_posts() ) {
                                        the_post();
                                        $thumb   = has_post_thumbnail() ? get_post_thumbnail_id() : INAFX_PARENT_URL.'/assets/images/empty_thumb.gif';
                                        $blank_img = stripos($thumb, 'empty_thumb.gif');
                                        $img_url = $blank_img ? $thumb : wp_get_attachment_url( $thumb, 'full');
                                        $image   = $blank_img ? $thumb : aq_resize($img_url, $width_thumbnail, $height_thumbnail, true, true, true) or $img_url;
                                ?>
                                <li class="<?php echo $class_list_item; ?>">
                                    <div class="col-md-4 col-sm-6 related-item">
                                        <article class="post">
                                            <?php
                                                if ( $display_thumbnail ) {
                                            ?>
                                            <div class="zoom-box">
                                                <figure>
                                                    <img class="img-responsive" alt="<?php the_title(); ?>" src="<?php echo $image; ?>" />
                                                </figure>
                                                <span class="zoom-mask">
                                                    <span class="zoom">
                                                        <a class="related-post-link" href="<?php echo $image; ?>" title="<?php the_title(); ?>">
                                                            <span class="fa-stack fa-2x">
                                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                                <i class="fa fa-search fa-stack-1x"></i>
                                                            </span>
                                                        </a>
                                                    </span>
                                                </span>
                                            </div>
                                            <?php
                                                }
                                            
                                                if( $display_link ) {
                                            ?>
                                            <h4><a href="<?php echo the_permalink() ?>"><?php the_title(); ?></a></h4>
                                            <?php   } ?>
                                            <div class="clearfix"></div>
                                        </article>
                                    </div>
                                </li>
                                <?php
                                    if ($loop % 3 == 0) {
                                ?>
                                <li class="clearfix"></li>
                                <?php
                                        }
                                        $loop++;
                                    }
                                ?>
                            </ul>
                        </aside>
                        <!-- ## related-posts end ## -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        }
        wp_reset_query();
    }
?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#related-posts .zoom-box .zoom > a.related-post-link').swipebox();
    });
</script>
<?php endif; ?>