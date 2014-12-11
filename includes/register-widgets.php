<?php
/**
 * Loads up all the widgets defined by this theme. Note that this function will not work for versions of WordPress 2.7 or lower
 *
 */
function inafx_load_widgets() {
	$widget_files = array(
        'MY_TabbedPosts_Widget'    => 'my-tabbed-posts.php',
		'My_SocialNetworks_Widget' => 'my-social-widget.php',
		'MY_Ad_125x125_Widget'     => 'my-ad125-widget.php',
        'MY_Ad_300_Widget'         => 'my-ad300-widget.php',
        'MY_Twitter_Widget'        => 'my-twitter-widget.php',
		'MY_Flickr_Widget'         => 'my-flickr-widget.php',
		'MY_Instagram_Widget'      => 'my-instagram-widget.php',
	);
	foreach ( $widget_files as $class_name => $file_name ) {
        if ( file_exists( INAFX_PARENT_DIR . '/includes/widgets/' . $file_name ) ) {
            $widget_dir = INAFX_PARENT_DIR . '/includes/widgets/' . $file_name;
		    include_once ( $widget_dir );
		    if ( class_exists( $class_name ) ) {
			    register_widget( $class_name );
		    }
        }
	}
}
add_action( 'widgets_init', 'inafx_load_widgets' );
?>