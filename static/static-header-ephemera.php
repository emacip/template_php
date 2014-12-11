<?php 
 /*
 * Load Header Ephemera Posts Cycle According to Selected Options. 
 * Options:
 * 1. Masonry Grid
 * 2. Slideshow
 */ 
?>
<?php if( is_home() || is_front_page() ) : ?>
<?php if( inafx_theme_option( 'opt_header_ephemera_enabled' ) != 0 ) : ?>
<!-- ## header-ephemera start ## -->
<div id="header-ephemera">
    <?php
                    
        $posts_array        = inafx_theme_option( 'opt_header_ephemera_posts' );
        $categories_array   = inafx_theme_option( 'opt_header_ephemera_categories' );
        $tags_array         = inafx_theme_option( 'opt_header_ephemera_tags' );

        if( is_array($posts_array) && count( $posts_array ) > 0 ) {
            $posts_array        = !empty($posts_array[0]) ? explode( ",", $posts_array[0] ) : '';
        }
        else {
            $posts_array = '';
        }

        $gallery_items      = inafx_theme_option( 'opt_header_ephemera_items' );
        $tags_count         = inafx_theme_option( 'opt_header_ephemera_tags_count' );
        $categories_count   = inafx_theme_option( 'opt_header_ephemera_categories_count' );

        if( $gallery_items == 'posts' ) {
            $categories_array = '';
            $tags_array = '';
            $args = array(
                'posts_per_page'    => -1,
                'no_found_rows'     => true,
                'post_status'       => 'publish',
                'orderby'           => 'post__in',
                'meta_key'          => '_thumbnail_id',
                'has_password'      => false,
                'post__not_in'      => get_option( 'sticky_posts' ),
                'post__in'          => $posts_array
            );
        }
        elseif( $gallery_items == 'categories' ) {
            $posts_array = '';
            $tags_array = '';
            $args = array(
                'posts_per_page'    => $categories_count,
                'no_found_rows'     => true,
                'post_status'       => 'publish',
                'meta_key'          => '_thumbnail_id',
                'has_password'      => false,
                'post__not_in'      => get_option( 'sticky_posts' ),
                'category__in'      => $categories_array
            );
        }
        elseif( $gallery_items == 'tags' ) {
            $categories_array = '';
            $posts_array = '';
            $args = array(
                'posts_per_page'    => $tags_count,
                'no_found_rows'     => true,
                'post_status'       => 'publish',
                'meta_key'          => '_thumbnail_id',
                'has_password'      => false,
                'post__not_in'      => get_option( 'sticky_posts' ),
                'tag__in'          => $tags_array
            );
        }

                 
        $fetch_posts = new WP_Query($args);
                   
        $attachment_size     = apply_filters( 'inafx_attachment_size', array( 720, 720 ) );
                    
        $gallery_format = inafx_theme_option( 'opt_header_ephemera_style' );
        $gallery_interval = inafx_theme_option( 'opt_header_ephemera_slideshow_interval' );
                    
        $post_gallery_id = 'post-header-gallery';
        if( 'slideshow-1' == $gallery_format ) {
            $carousel = '<div id="' . $post_gallery_id . '" class="owl-carousel">';
            $index = 0;
            while ($fetch_posts->have_posts()) : $fetch_posts->the_post();
                $post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id() );
                $post_thumbnail = aq_resize( $post_thumbnail_url, 1140, 550, true, true, true );
                $carousel .= '<div class="item" style="background: url(\'' .$post_thumbnail. '\') no-repeat center top; background-size: cover; height: 350px;">';
                $carousel .= '<div class="carousel-overlay">';
                $carousel .= '</div>';
                $carousel .= '<div class="entry-type">';
                $carousel .= inafx_get_post_format_icon();
                $carousel .= '</div>';
                $carousel .= '<div class="entry-meta-data">';
                $carousel .= '<div class="entry-title">';
                $carousel .= '<a href="'.get_the_permalink().'">';
                $carousel .= get_the_title();
                $carousel .= '</a>';
                $carousel .= '<span class="line"></span>';
                $carousel .= '</div>';
                $carousel .= '<div class="entry-meta">';
                $carousel .= inafx_get_entry_categories(); 
                $carousel .= '</div>';
                $carousel .= '<div class="entry-meta-desc">';
                $excerpt   = get_the_content(); 
                $carousel .= my_string_limit_words($excerpt, 20);
                $carousel .= '<a href="'.get_the_permalink().'" class="btn btn-default btn-sm">';
                $carousel .= inafx_theme_option( 'opt_readmore_button_text' );
                $carousel .= '</a>';
                $carousel .= '</div>';
                $carousel .= '</div>';
                $carousel .= '</div>';
                $index++;
            endwhile;
            $carousel .= '</div>';
                    
            echo $carousel;

            $script = '<script type="text/javascript">';
            $script .= 'jQuery(document).ready(function () {';
            $script .= 'jQuery("#'.$post_gallery_id.'").owlCarousel({';
            $script .= '    autoPlay: '.$gallery_interval.',';
            $script .= '    items: 3,';
            $script .= '    itemsDesktop: [1199, 3],';
            $script .= '    itemsDesktopSmall: [979, 2],';
            $script .= '    itemsTablet: [768, 1],';
            $script .= '    itemsMobile: [479, 1]';
            $script .= '});';
            $script .= '});';
            $script .= '</script>';
                    
            echo $script;
        }
        else if( 'slideshow-2' == $gallery_format ) {
            $carousel = '<div id="' . $post_gallery_id . '" class="carousel slide" data-ride="carousel" data-interval="'. $gallery_interval .'">';
                    
            $carousel .= '<div class="carousel-inner">';
            $index = 0;
            while ($fetch_posts->have_posts()) : $fetch_posts->the_post();
                $post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id() );
                $post_thumbnail = aq_resize( $post_thumbnail_url, 1140, 550, true, true, true );
                $carousel .= '<div class="item'. (($index == 0) ? ' active' : '') . '" style="background: url(\'' .$post_thumbnail. '\') no-repeat center top; background-size: cover; height: 550px;">';
                $carousel .= '<div class="carousel-overlay">';
                $carousel .= '</div>';
                $carousel .= '<div class="carousel-caption">';
                $carousel .= '<h3><a href="'.get_the_permalink().'">';
                $carousel .= get_the_title();
                $carousel .= '</a></h3>';
                $carousel .= '<a href="'.get_the_permalink().'" class="btn btn-default btn-lg hidden-sm hidden-xs">';
                $carousel .= inafx_theme_option( 'opt_readmore_button_text' );
                $carousel .= '</a>';
                $carousel .= '</div>';
                $carousel .= '</div>';
                $index++;
            endwhile;
            $carousel .= '</div>';
                    
            $carousel .= '<a class="left carousel-control" href="#' . $post_gallery_id . '" data-slide="prev">';
            $carousel .= '<span class="glyphicon glyphicon-chevron-left"></span>';
            $carousel .= '</a>';
            $carousel .= '<a class="right carousel-control" href="#' . $post_gallery_id . '" data-slide="next">';
            $carousel .= '<span class="glyphicon glyphicon-chevron-right"></span>';
            $carousel .= '</a>';
            $carousel .= '</div>';
                    
            echo $carousel;
        }
    ?>
</div>
<!-- ## header-ephemera end ## -->
<?php endif; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>