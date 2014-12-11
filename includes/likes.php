<?php
    /*
    * Clas Name: InafxLikes
    * Description: It contains functions to create voting system for posts. It enables to like the posts by site visitors.
    * Author: INA Brains
    */ 
    class InafxLikes {
        /*
        * default constructor of the InafxLikes class to add few required actions.
        *
        * @see __construct
        */
        function __construct() 
        {	
           add_action('wp_enqueue_scripts', array(&$this, 'inafx_likes_scripts'));
           add_filter('body_class', array(&$this, 'body_class'));
           add_action('wp_ajax_inafx-likes', array(&$this, 'inafx_likes_callback'));
           add_action('wp_ajax_nopriv_inafx-likes', array(&$this, 'inafx_likes_callback'));
        }
    
        /*
        * Enqueue the jQuery scripts and CSS required for the plugin.
        *
        * @see InafxLikes::inafx_likes_scripts()
        */
        function inafx_likes_scripts()
        {
            wp_enqueue_style( 'inafx-likes', INAFX_CHILD_URL . '/assets/css/inafx-likes.css' );
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'inafx-likes', INAFX_CHILD_URL . '/assets/js/app.postlikes.js', array( 'jquery' ) );
    
            wp_localize_script('inafx-likes', 'inafx', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            ));
            wp_localize_script('inafx-likes', 'inafx_likes', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            ));
        }
    
        /*
        * Setup post meta information to add its likes parameter
        *
        * @see InafxLikes::setup_likes( $post_id )
        *
        * @param  integer $post_id to pass the post id for creating its meta field.
        */
        function setup_likes( $post_id ) 
        {
            if( !is_numeric($post_id) ) return;
    
            add_post_meta($post_id, '_inafx_likes', '0', true);
        }

        /*
        * Callback method to save the post likes.
        *
        * @see InafxLikes::inafx_likes_callback( $post_id )
        *
        * @param  integer $post_id to pass the post id for saving its meta value.
        */
        function inafx_likes_callback($post_id) 
        {
            if( isset($_POST['likes_id']) ) {
                $post_id = str_replace('inafx-likes-', '', $_POST['likes_id']);
                echo $this->like_this($post_id, '', '', '', 'update');
            } else {
                $post_id = str_replace('inafx-likes-', '', $_POST['post_id']);
                echo $this->like_this($post_id, '', '', '', 'get');
            }
            exit;
        }

        /*
        * Method to get and update the post likes.
        *
        * @see InafxLikes::like_this( $post_id, $zero_postfix = false, $one_postfix = false, $more_postfix = false, $action = 'get' )
        *
        * @param  integer $post_id to pass the post id for saving or retrieving its meta value.
        * @param  boolean $zero_postfix Optional. It adds postfix to the value message when value is 0.
        * @param  boolean $one_postfix Optional. It adds postfix to the value message when value is 1.
        * @param  boolean $more_postfix Optional. It adds postfix to the value message when value is greater than 1.
        * @param  string $action to pass the action name as get/update to retrieve or update the meta information.
        */
        function like_this( $post_id, $zero_postfix = false, $one_postfix = false, $more_postfix = false, $action = 'get' ) 
        {
            if( !is_numeric( $post_id ) ) return;
    
            switch($action) {
    
                case 'get':
                    $likes = get_post_meta($post_id, '_inafx_likes', true);
                    if( !$likes ){
                        $likes = 0;
                        add_post_meta($post_id, '_inafx_likes', $likes, true);
                    }
    
                    if( $likes == 0 ) { $postfix = $zero_postfix; }
                    elseif( $likes == 1 ) { $postfix = $one_postfix; }
                    else { $postfix = $more_postfix; }
    
                    return '<span class="inafx-likes-count">'. $likes .'</span> <span class="inafx-likes-postfix">'. $postfix .'</span>';
                    break;
    
                case 'update':
                    $likes = get_post_meta($post_id, '_inafx_likes', true);
                    if( isset($_COOKIE['inafx_likes_'. $post_id]) ) return $likes;
    
                    $likes++;
                    update_post_meta($post_id, '_inafx_likes', $likes);
                    setcookie('inafx_likes_'. $post_id, $post_id, time()*20, '/');
    
                    if( $likes == 0 ) { $postfix = $zero_postfix; }
                    elseif( $likes == 1 ) { $postfix = $one_postfix; }
                    else { $postfix = $more_postfix; }
    
                    return '<span class="inafx-likes-count">'. $likes .'</span> <span class="inafx-likes-postfix">'. $postfix .'</span>';
                    break;
            }
        }

        /*
        * It generates a template to display post likes meta information on the page.
        *
        * @see InafxLikes::do_likes()
        *
        * @return  string as HTML template to display the likes.
        */
        function do_likes()
        {
            global $post;
    
            $output = $this->like_this($post->ID, '', '', '');
    
            $class = 'inafx-likes';
            $title = theme_locals( 'like_this' );
            if( isset($_COOKIE['inafx_likes_'. $post->ID]) ){
                $class = 'inafx-likes active';
                $title = theme_locals( 'already_like_this' );
            }
    
            return '<span class="meta"><a href="#" class="'. $class .'" id="inafx-likes-'. $post->ID .'" title="'. $title .'">' . $output . '</a></span>';
        }
    
        /*
        * Appends a CSS class name to the array of body CSS classes.
        *
        * @see InafxLikes::body_class( $classes )
        *
        * @param  array $classes as an array of body CSS classes.
        * @return  array appended by adding 'ajax-inafx-like' custom CSS class.
        */
        function body_class($classes) {
            $classes[] = 'ajax-inafx-likes';
            return $classes;
        }
    }
    
    global $inafx_likes;
    $inafx_likes = new InafxLikes();
    function inafx_likes()
    {
        global $inafx_likes;
        echo $inafx_likes->do_likes(); 	
    }
?>
