<?php
    /**
     * Custom Widget for displaying tabbed posts
     *
     * Displays Recent Posts and Popular Posts tab
    */    
    class MY_TabbedPosts_Widget extends WP_Widget {
    
        function MY_TabbedPosts_Widget() {
            $widget_ops = array(
                'classname'   => 'widget_tabbed_posts',
                'description' => theme_locals( 'widget_tabbed_desc' ),
                );
            $control_ops = array( 'id_base' => 'tabbed-posts-widget' );
            $this->WP_Widget( 'tabbed-posts-widget', theme_locals( 'widget_tabbed_title' ), $widget_ops, $control_ops );
        }
    
        function widget( $args, $instance ) {
            $posts_count            = apply_filters('widget_title', empty($instance['posts_count']) ? 5 : $instance['posts_count']);
            $recent_posts_tab       = $instance['recent_posts_tab'];
            $popular_posts_tab      = $instance['popular_posts_tab'];
            extract( $args );
    
            echo $before_widget;
            $random = generate_random(10);
?>
<ul class="nav nav-pills nav-justified" id="tabbed-posts-widget-<?php echo $random; ?>">
    <li class="active"><a href="#recent-posts-<?php echo $random; ?>" data-toggle="tab"><?php echo $recent_posts_tab; ?></a></li>
    <li><a href="#popular-posts-<?php echo $random; ?>" data-toggle="tab"><?php echo $popular_posts_tab; ?></a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade in active" id="recent-posts-<?php echo $random; ?>">
        <div class="row">
            <div class="col-sm-12">
        <?php
            $recent_posts = new WP_Query( array(
                'order'             => 'DESC',
                'posts_per_page'    => $posts_count,
                'no_found_rows'     => true,
                'post_status'       => 'publish',
                'post__not_in'      => get_option( 'sticky_posts' ),
                'meta_key'          => '_thumbnail_id',
                'has_password'      => false,
				'tax_query'         => array(
					array(
					'taxonomy'      => 'post_format',
					'field'         => 'slug',
					'terms'         => array(
								       'post-format-quote',
								       'post-format-link',
								       'post-format-video',
                                       'post-format-aside',
                                       'post-format-audio'
							           ),
					'operator'      => 'NOT IN',
				    ),
				)
            ));
            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                load_tabbed_widget_post();
            endwhile; 
               wp_reset_query();    
        ?>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="popular-posts-<?php echo $random; ?>">
        <div class="row">
            <div class="col-sm-12">
        <?php
            $popular_posts = new WP_Query( array(
                'order'             => 'DESC',
                'posts_per_page'    => $posts_count,
                'no_found_rows'     => true,
                'post_status'       => 'publish',
                'post__not_in'      => get_option( 'sticky_posts' ),
                'meta_key'          => '_thumbnail_id',
                'orderby'           => 'comment_count',
                'has_password'      => false,
				'tax_query'         => array(
					array(
					'taxonomy'      => 'post_format',
					'field'         => 'slug',
					'terms'         => array(
								       'post-format-quote',
								       'post-format-link',
								       'post-format-video',
                                       'post-format-aside',
                                       'post-format-audio'
							           ),
					'operator'      => 'NOT IN',
				    ),
                 )
            ));
            while ($popular_posts->have_posts()) : $popular_posts->the_post();
                load_tabbed_widget_post();
            endwhile; 
               wp_reset_query();    
        ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () { 
        jQuery('#recent-posts-<?php echo $random; ?> .zoom-box .zoom > a.tabbed-post-link').swipebox({
            beforeOpen: function () { 
                unload_sidr();
            }
        });
        jQuery('#popular-posts-<?php echo $random; ?> .zoom-box .zoom > a.tabbed-post-link').swipebox({
            beforeOpen: function () { 
                unload_sidr();
            }
        });
    });
</script>
<?php
        echo $after_widget;
    }
    
    function update( $new_instance, $old_instance ) {
        return $new_instance;
    }
    
    function form( $instance ) {
        $defaults = array(
            'title'                     => theme_locals( 'widget_tabbed_posts_title' ),
            'posts_count'               => 5,
            'recent_posts_tab'          => theme_locals( 'widget_tabbed_recentposts_title' ),
            'popular_posts_tab'         => theme_locals( 'widget_tabbed_popularposts_title' ),
        );
        $instance = wp_parse_args( (array) $instance, $defaults );
?>
<p>
    <label for="<?php echo $this->get_field_id( 'recent_posts_tab' ); ?>"><?php echo theme_locals( 'widget_tabbed_recentposts_label' ); ?></label>
    <input type="text" id="<?php echo $this->get_field_id( 'recent_posts_tab' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'recent_posts_tab' ); ?>" value="<?php echo $instance['recent_posts_tab']; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'popular_posts_tab' ); ?>"><?php echo theme_locals( 'widget_tabbed_popularposts_label' ); ?></label>
    <input type="text" id="<?php echo $this->get_field_id( 'popular_posts_tab' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'popular_posts_tab' ); ?>" value="<?php echo $instance['popular_posts_tab']; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'posts_count' ); ?>"><?php echo theme_locals( 'widget_tabbed_postscount_label' ); ?></label>
    <input type="text" id="<?php echo $this->get_field_id( 'posts_count' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'posts_count' ); ?>" value="<?php echo $instance['posts_count']; ?>" />
</p>
<?php
        }
    }
    
    function load_tabbed_widget_post() {
?>
<article <?php post_class('post'); ?>>
<?php
    the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
?>
<?php
    $images = array();
    $galleries = get_post_galleries( get_the_ID(), false );
    if ( isset( $galleries[0]['ids'] ) ) :
        $images = explode( ',', $galleries[0]['ids'] );
    endif;

    if ( ! $images ) :
        $images = get_posts( array(
            'fields'         => 'ids',
            'numberposts'    => -1,
            'order'          => 'ASC',
            'orderby'        => 'menu_order',
            'post_mime_type' => 'image',
            'post_parent'    => get_the_ID(),
            'post_type'      => 'attachment',
        ) );
    endif;

    $total_images = count( $images );
    $post_thumbnail = '';
    $post_thumbnail_url = '';

    if ( has_post_thumbnail() ) :
        $image = get_post_thumbnail_id();
        $post_thumbnail_url = wp_get_attachment_url( $image );
        $post_thumbnail = aq_resize( $post_thumbnail_url, 800, 600, true, true, true );
    elseif ( $total_images > 0 ) :
        $image          = array_shift( $images );
        $post_thumbnail_url = wp_get_attachment_url( $image );
        $post_thumbnail = aq_resize( $post_thumbnail_url, 800, 600, true, true, true );
    endif;
                
    if ( ! empty ( $post_thumbnail ) ) :
?>
<div class="zoom-box">
    <figure>
        <img class="img-responsive" alt="<?php the_title(); ?>" src="<?php echo $post_thumbnail; ?>" />
    </figure>
    <span class="zoom-mask">
        <span class="zoom">
            <a class="tabbed-post-link" href="<?php echo $post_thumbnail_url; ?>" title="<?php the_title(); ?>">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-search fa-stack-1x"></i>
                </span>
            </a>
            <a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>">
                <span class="fa-stack fa-2x">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-link fa-stack-1x"></i>
                </span>
            </a>
        </span>
    </span>
</div>
<?php   endif; ?>
</article>
<?php
    }
?>