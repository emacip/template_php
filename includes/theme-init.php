<?php
    // function to setup theme support features, thumbnail sizes and nav menu locations
    if ( ! function_exists( 'inafx_setup' ) ) :
        function inafx_setup() {
            add_theme_support( 'post-thumbnails' );

            add_theme_support( 'automatic-feed-links' );

            add_theme_support( 'html5', array(
                'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
            ) );

            add_theme_support( 'post-formats', array(
                'image', 'quote', 'link', 'gallery', 'audio', 'video', 'aside'
            ) );

		    add_theme_support( 'menus' );
		    if ( function_exists( 'register_nav_menus' ) ) {
			    register_nav_menus(
				    array(
					    'header_menu' => "Header Menu"
				    )
			    );
		    }

            add_theme_support( 'custom-header' );
            add_theme_support( 'custom-background' );

            // removed features already provided via option framework
            remove_theme_support( 'custom-header' );
            remove_theme_support( 'custom-background' );

            add_filter( 'use_default_gallery_style', '__return_false' );
        }
    endif;
    add_action( 'after_setup_theme', 'inafx_setup' );
?>
