<?php
    // function to enqueue required CSS files and jQuery scripts to the theme
    function inafx_enqueue_styles(){
        if( is_rtl() ) {
            wp_enqueue_style('bootstrap-rtl', INAFX_CHILD_URL . '/assets/css/bootstrap-rtl.css');
        }
        wp_enqueue_style('styles', INAFX_CHILD_URL . '/assets/less/styles.css');
        wp_enqueue_style('list-styles', INAFX_CHILD_URL . '/assets/less/fa-list.css');                
        wp_enqueue_style('justifiedGallery.min', INAFX_CHILD_URL . '/assets/css/justifiedGallery.min.css');
        wp_enqueue_style('swipebox', INAFX_CHILD_URL . '/assets/js/swipebox/swipebox.css');
        wp_enqueue_style('owl-carousel', INAFX_CHILD_URL . '/assets/js/owl-carousel/owl.carousel.css');
        wp_enqueue_style('owl-transitions', INAFX_CHILD_URL . '/assets/js/owl-carousel/owl.transitions.css');
        wp_enqueue_style('dropmenu', INAFX_CHILD_URL . '/assets/less/dropmenu.css');
        wp_enqueue_style('custom-styles', INAFX_CHILD_URL . '/assets/css/custom.css');
        if( is_rtl() ) {
            wp_enqueue_style('rtl-styles', INAFX_CHILD_URL . '/assets/less/rtl.css');
        }
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-2.1.1', INAFX_CHILD_URL . '/assets/js/jquery-2.1.1.min.js', array('jquery'), '2.1.1', true );
        wp_enqueue_script( 'bootstrap', INAFX_CHILD_URL . '/assets/js/bootstrap.min.js', array('jquery'), '3.1.1', true );
        wp_enqueue_script( 'jquery-effects-core' );
        wp_enqueue_script( 'jquery-effects-bounce' );
        wp_enqueue_script( 'jquery-justifiedGallery-min-ui', INAFX_CHILD_URL . '/assets/js/jquery.justifiedGallery.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'jquery-swipebox-min', INAFX_CHILD_URL . '/assets/js/swipebox/jquery.swipebox.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'jquery-flickr-min', INAFX_CHILD_URL . '/assets/js/jflickrfeed.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'jquery-flickr-cycle', INAFX_CHILD_URL . '/assets/js/cycle/jquery.cycle.all.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'jquery-detect-mobile', INAFX_CHILD_URL . '/assets/js/detectmobilebrowser.js', array('jquery'), '', true );
        wp_enqueue_script( 'jquery-nicescroll', INAFX_CHILD_URL . '/assets/js/jquery.nicescroll.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'twitter-fetcher', INAFX_CHILD_URL . '/assets/js/twitterFetcher_v10_min.js', array('jquery'), '', true );
        wp_enqueue_script( 'jquery-owl-carousel', INAFX_CHILD_URL . '/assets/js/owl-carousel/owl.carousel.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'jquery-sidr', INAFX_CHILD_URL . '/assets/js/jquery.sidr.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'jquery-masonry' );
        wp_enqueue_script( 'app-ui', INAFX_CHILD_URL . '/assets/js/app.ui.js', array('jquery'), '', true );
    }
    add_action( 'wp_enqueue_scripts', 'inafx_enqueue_styles' );
    
    // function to enqueue required CSS files and jQuery scripts to the admin section of theme
    function inafx_admin_js($hook) {
        if ($hook == 'post.php' || $hook == 'post-new.php') {
            wp_enqueue_script('inafx-admin', INAFX_CHILD_URL . '/admin/assets/js/jquery.admin.js', array('jquery') );	
        }
    
        if ( isset( $_GET["page"] ) ) {
            if( $_GET["page"] == 'inafx_options' ) {
                wp_enqueue_script('inafx-admin-options', INAFX_CHILD_URL . '/admin/assets/js/jquery.options.js', array('jquery') );	
            }
        }
        wp_enqueue_style('admin', INAFX_CHILD_URL . '/admin/assets/css/admin.css');
        wp_enqueue_style('jquery-ui-min', INAFX_CHILD_URL . '/admin/assets/smoothness/jquery-ui.min.css');
        wp_enqueue_style('jquery-ui-theme', INAFX_CHILD_URL . '/admin/assets/smoothness/jquery.ui.theme.css');
        wp_enqueue_style('admin-fonts', INAFX_CHILD_URL . '/assets/css/font-awesome.min.css');
    }
    add_action('admin_enqueue_scripts', 'inafx_admin_js', 10, 1);
?>