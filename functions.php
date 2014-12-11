<?php
    // Setup Directory Paths for Parent/Child Theme.
    @define( 'INAFX_PARENT_DIR', get_template_directory() );
    @define( 'INAFX_CHILD_DIR', get_stylesheet_directory() );
    
    // Setup Directory URI for Parent/Child Theme.
    @define( 'INAFX_PARENT_URL', get_template_directory_uri() );
    @define( 'INAFX_CHILD_URL', get_stylesheet_directory_uri() );

    // Setup Theme Name and Text Domain.
    @define( 'INAFX_CURRENT_THEME', 'baseblog');
    @define( 'INAFX_THEME_DOMAIN', 'baseblog');

    // Setup options prefix + slug
    @define( 'INAFX_OPTIONS_SLUG_PREFIX', 'inafx_options');

    // Do not change the following sequence of required files.
    // load languages for text domain of theme.
    load_theme_textdomain( INAFX_THEME_DOMAIN, INAFX_PARENT_DIR . '/languages' );
	include_once( INAFX_PARENT_DIR . '/includes/locals.php' );

    // load theme options.
    require_once( INAFX_PARENT_DIR  . '/admin/framework/admin-init.php' );   
    
    // load dropdown menu custom wp navwalker class.
    require_once( INAFX_PARENT_DIR  . '/includes/wp_bootstrap_navwalker.php' );

    // load custom functions.
    include_once( INAFX_CHILD_DIR  . '/includes/custom-functions.php' );
	
    // load theme scripts and stylesheets.
	require_once( INAFX_PARENT_DIR  . '/includes/theme-scripts.php' );

    // load post likes class.
    require_once( INAFX_PARENT_DIR  . '/includes/likes.php' );

    // initialize theme sidebars.
	require_once( INAFX_PARENT_DIR  . '/includes/sidebar-init.php' );

    // register theme widgets.
    require_once( INAFX_PARENT_DIR  . '/includes/register-widgets.php' );

    // load display widgets class to control the widget visibility on different pages.
    require_once( INAFX_PARENT_DIR  . '/includes/widgets/display-widgets.php' );

    // initialize theme support, thumbnail sizes and nav menu locations.
	require_once( INAFX_PARENT_DIR  . '/includes/theme-init.php' );
	
    // load important theme functions.
	require_once( INAFX_PARENT_DIR  . '/includes/theme-functions.php' );

    // load author social meta info.
    require_once( INAFX_PARENT_DIR  . '/admin/author/author-social.php' );

    // load aq_resizer class that enables to generate the thumbnails on the fly.
    require_once( INAFX_PARENT_DIR  . '/includes/aq_resizer.php' );

    // load custom meta box templates for the posts
	include_once( INAFX_PARENT_DIR . '/includes/theme-postmeta.php' );

    // load methods to unattach the media files from the posts.
    require_once( INAFX_PARENT_DIR . '/includes/unattach.php' );

    // initialize the tinymce plugin for shortocdes.
    require_once( INAFX_PARENT_DIR . '/admin/shortcodes/tinymce/tinymce-plugin.php' );

    // load all shortcodes
    require_once( INAFX_PARENT_DIR . '/admin/shortcodes/shortcodes.php' );

    // get theme option value by option name
    if( !function_exists('inafx_theme_option') ) {
        function inafx_theme_option( $option_name ) {
            global $inafx_options_var;
            $inafx_options = get_option($inafx_options_var);

            if ( isset( $inafx_options[$option_name] ) ) 
                return $inafx_options[$option_name];
            else
                return false;
        }
    }

    // create client side accessible theme variables and ajax url.
    if( !function_exists('inafx_theme_vars') ) {
        function inafx_theme_vars() {
          $niceScroll   = inafx_theme_option( 'opt_enable_nicescroll' );
          $stickyHeader = inafx_theme_option( 'opt_header_type' );
          global $inafx_options_var;
          //$inafx_options = get_option($inafx_options_var);
          $inafx_theme_js_vars = array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'niceScroll' => $niceScroll,
                'stickyHeader' => $stickyHeader,
                'isRTL' => is_rtl(),
                'themePath' => get_template_directory_uri(),
                'themeName' => INAFX_CURRENT_THEME,
                'inafx_options_var' => $inafx_options_var
            );
          wp_enqueue_script('jquery');
          wp_localize_script('jquery', 'inafx_theme', $inafx_theme_js_vars );
        } 
        add_action('wp', 'inafx_theme_vars');
        add_action('admin_init', 'inafx_theme_vars');
    }

    // hook to load ajax callback method for contact form.
    if( !function_exists('inafx_hook_contact_form') ) {
        function inafx_hook_contact_form(){
            require_once( INAFX_PARENT_DIR . '/includes/contact.php' );
        }
        add_action( 'wp_ajax_inafx_hook_contact_form', 'inafx_hook_contact_form' );
        add_action( 'wp_ajax_nopriv_inafx_hook_contact_form', 'inafx_hook_contact_form' );
    }

    // hook to load ajax callback method for searching posts.
    if( !function_exists('inafx_hook_themeoptions_ajax_search') ) {
        function inafx_hook_themeoptions_ajax_search(){
            require_once( INAFX_PARENT_DIR . '/admin/framework/wp-themeoptions-ajax-search.php' );
        }
        add_action( 'wp_ajax_inafx_hook_themeoptions_ajax_search', 'inafx_hook_themeoptions_ajax_search' );
        add_action( 'wp_ajax_nopriv_inafx_hook_themeoptions_ajax_search', 'inafx_hook_themeoptions_ajax_search' );
    }

    // set html content type for sending HTML formatted contact mail.
    if( !function_exists('set_html_content_type') ) {
        function set_html_content_type()
        {
	        return 'text/html';
        }
    }

    // load custom styles for WP Editor
    if( !function_exists('inafx_add_editor_styles') ) {
        function inafx_add_editor_styles() {
            add_editor_style( 'custom-editor-style.css' );
        }
        add_action( 'init', 'inafx_add_editor_styles' );
    }

    // enable shortcodes in default Text Widget of WordPress.
    add_filter('widget_text', 'do_shortcode');

    if( !function_exists('post_hasthumbnail_class') ) {
        function post_hasthumbnail_class( $classes ) {
	        global $post;
		    $classes[] = ( '' != get_the_post_thumbnail() ) ? '' : 'no-thumbnail';
	        return $classes;
        }
        add_filter( 'post_class', 'post_hasthumbnail_class' );
    }

    // returns HTML template for Breadcrumb links
    if( !function_exists('the_breadcrumb') ) {
        function the_breadcrumb() {
            if ( inafx_theme_option( 'opt_show_breadcrumbs' ) != 0 ) :
                $class = ( inafx_theme_option( 'opt_show_page_titles' ) == 0 ) ? ' class="no-title"' : '';
                if (!is_front_page()) {
                    echo '<div id="breadcrumbs"'.$class.'>';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-10 col-sm-offset-1 col-xs-12">';
                    echo '<ul class="breadcrumb">';
                    echo '<li><a href="';
                    echo home_url( '/' );
                    echo '">';
                    echo theme_locals( 'home' );
                    echo '</a></li>';
                    if (is_category() || is_single()) {
                        if( has_category() ) {
                            echo '<li class="active">';
                            if (is_single()) {
                                echo the_category(' &bull; ');
                                echo '</li>';
                            }
                            else{
                                echo single_cat_title( '', false );
                            }
                        }
                    } elseif (is_page()) {
                        global $post;
                        if($post->post_parent){
                            $anc = get_post_ancestors( $post->ID );
                 
                            foreach ( $anc as $ancestor ) {
                                $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>';
                            }
                            echo $output;
                        }
                        //echo '<li class="active" title="'.get_the_title().'"> '.get_the_title().'</li>';
                    }
                    elseif (is_tag()) {echo'<li class="active">'. theme_locals( 'tag' ) .'</li>';}
                    elseif (is_day() || is_month() || is_year()) {echo'<li class="active">'. theme_locals( 'archive' ) .'</li>';}
                    elseif (is_author()) {echo'<li class="active">'. theme_locals( 'author' ) .'</li>';}
                    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo '<li class="active">'. theme_locals( 'blog_archives' ) .'</li>';}
                    elseif (is_search()) {echo'<li class="active">'. sprintf( theme_locals( 'search_results_for' ), get_search_query() ) .'</li>';}
                    elseif (is_404()) {echo'<li class="active">'. theme_locals( 'page_not_found' ) .'</li>';}
                    elseif (is_tax()) {echo'<li class="active">'.single_cat_title('', false).'</li>';}
                    echo '</ul>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            endif;
        }
    }

    // loads HTML template for attachments such as featured image, audio file or video file.
    if ( ! function_exists( 'inafx_attachment' ) ) :
        function inafx_attachment() {
	        $attachment_size     = apply_filters( 'inafx_attachment_size', array( 720, 720 ) );

            $mime_type = strtolower(get_post_mime_type());

            if (strpos( $mime_type, 'image' ) !== false) {
	            printf( '<figure><img class="img-responsive" src="%1$s" alt="%2$s" /></figure>',
		            wp_get_attachment_image_src( get_the_ID(), $attachment_size )[0],
                    get_the_title()
	            );
            }
            else if (strpos( $mime_type, 'audio' ) !== false) {
                $shortcode ='[audio src="%s"][/audio]';
                echo do_shortcode(sprintf($shortcode, wp_get_attachment_url( get_the_ID() )));
            }
            else if (strpos( $mime_type, 'video' ) !== false) {
                $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
                $shortcode ='[video src="%1$s" poster="%2$s"][/video]';
                echo do_shortcode(sprintf($shortcode, wp_get_attachment_url( get_the_ID() ), $post_thumbnail_url ));
            }
        }
    endif;

    // loads HTML template for post attachments such as quote, link, image gallery, audio or video file.
    if ( ! function_exists( 'inafx_the_attachment' ) ) :
        function inafx_the_attachment() {
            $format = strtolower(get_post_format());
            if( 'quote' == $format ) {
                $quote = get_post_meta(get_the_ID(), 'inafx_quote', true);
                $author_quote = get_post_meta(get_the_ID(), 'inafx_author_quote', true);
                $output = '';
                if( !empty($quote) ) {
                    $output .= '<blockquote>';
                    $output .= '<p>';
                    $output .= $quote;
                    $output .= '</p>';
                    if( !empty($author_quote) ) {
                        $output .= '<footer><cite>';
                        $output .= $author_quote;
                        $output .= '</cite></footer>';
                    }
                    $output .= '</blockquote>';
                    echo $output;
                }
            }
            if( 'link' == $format ) {
                $link_url = get_post_meta(get_the_ID(), 'inafx_link_url', true);
                $link_text = get_post_meta(get_the_ID(), 'inafx_link_text', true);
                $output = '';
                if( !empty($link_url) ) {
                    $output .= '%2$s';
                    printf($output, $link_url, $link_text);
                }                
            }
            if( ( 'gallery' == $format ) || ( 'audio' == $format ) || ( 'video' == $format )) {
               
                if( 'gallery' == $format ) {
	                $attachments = get_posts( array(
		                'post_parent'    => get_the_ID(),
		                'numberposts'    => -1,
		                'post_status'    => 'inherit',
		                'post_type'      => 'attachment',
                        'post_mime_type' => 'image',
		                'order'          => 'ASC',
		                'orderby'        => 'menu_order ID',
	                ) );

                    include( INAFX_PARENT_DIR . '/includes/post-formats/post-gallery.php' );
                }
                elseif( 'audio' == $format ) {
                    $audio_embed = get_post_meta(get_the_ID(), 'inafx_audio_embed', true);
                    
                    if( !empty( $audio_embed ) ) {
                        // check for soundcloud's large/mini player based on visual parameter values true/false
                        $visual = strpos( $audio_embed, 'visual=true' );
                        if( $visual != false ) {
                            echo '<div class="responsive-wrapper">';
                        } else{
                            echo '<div class="soundcloud-wrapper">';    
                        }
                        echo stripslashes( htmlspecialchars_decode( $audio_embed ) );
                        echo '</div>';
                    }
                    else {

	                    $attachments = get_posts( array(
		                    'post_parent'    => get_the_ID(),
		                    'numberposts'    => -1,
		                    'post_status'    => 'inherit',
		                    'post_type'      => 'attachment',
                            'post_mime_type' => 'audio',
		                    'order'          => 'ASC',
		                    'orderby'        => 'menu_order ID',
	                    ) );

                        if( count($attachments) > 1 ) {
                            foreach( $attachments as &$attachment ) {
                                $tracks_array[] = $attachment->ID;
                            }
                            $tracks = implode(', ', $tracks_array);
                            $shortcode = '[playlist tracks="%s"][/playlist]';
                            echo do_shortcode( sprintf( $shortcode, $tracks ) );
                        }
                        elseif( count($attachments) == 1 ) {
                            $attachment = $attachments[0];
                            $shortcode ='[audio src="%s" preload="metadata"][/audio]';
                            echo do_shortcode(sprintf($shortcode, wp_get_attachment_url( $attachment->ID )));   
                        }
                    }
                }
                elseif( 'video' == $format ) {
                    $video_embed = get_post_meta(get_the_ID(), 'inafx_video_embed', true);
                    if( !empty( $video_embed ) ) {
                        $video = apply_filters('the_content', "[embed]" . $video_embed . "[/embed]");
                        $matched = preg_match('/src=["\'](?P<src>[^"\'<>]+)["\']/', $video, $matches, 0);
                        if( 1 === $matched ) {
                            echo '<div class="responsive-video-wrapper">';
                            echo str_replace( $matches[0], substr( $matches[0], 0, strlen( $matches[0] ) - 1 ) . inafx_detect_video_source( $video_embed ) . '"', $video );
                            echo '</div>';
                        }
                    }
                    else {
	                    $attachments = get_posts( array(
		                    'post_parent'    => get_the_ID(),
		                    'numberposts'    => -1,
		                    'post_status'    => 'inherit',
		                    'post_type'      => 'attachment',
                            'post_mime_type' => 'video',
		                    'order'          => 'ASC',
		                    'orderby'        => 'menu_order ID',
	                    ) );

                        foreach( $attachments as &$attachment ) {
                            $post_thumbnail_id = get_post_thumbnail_id( $attachment->ID );
                            $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
                            $shortcode ='[video src="%1$s" poster="%2$s"][/video]';
                            echo do_shortcode(sprintf($shortcode, wp_get_attachment_url( $attachment->ID ), $post_thumbnail_url ));
                            break;
                        }
                    }
                }
            }
        }
    endif;

    // detect embed video source to update their parameters.
    if ( ! function_exists( 'inafx_detect_video_source' ) ) :
        function inafx_detect_video_source( $video_embed ){
           $youtube = strpos( $video_embed, 'youtu');
           $vimeo   = strpos( $video_embed, 'vimeo');
           $soundcloud = strpos( $video_embed, 'soundcloud');
           $theme_base_color = ( ( inafx_theme_option( 'opt_theme_preset_type' ) == 'preset' ) ? inafx_theme_option( 'opt_theme_preset_color' ) : inafx_theme_option( 'opt_theme_custom_color' ) );
           $theme_base_color = str_replace( '#', '', $theme_base_color);
           if( $vimeo != false ) {
               return '?title=0&amp;byline=0&amp;portrait=0&amp;color='.$theme_base_color;
           }
           elseif( $youtube != false ) {
               return '';
           }
           else {
               return '&amp;color='.$theme_base_color;
           }
        }
    endif;

    add_filter('upload_mimes', 'custom_upload_mimes');
    function custom_upload_mimes ( $existing_mimes=array() ) {
        // add your extension to the mimes array as below
        $existing_mimes['zip'] = 'application/zip';
        $existing_mimes['gz'] = 'application/x-gzip';
        return $existing_mimes;
    }
?>