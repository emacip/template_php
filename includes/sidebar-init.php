<?php
/**
 * Registers sidebar areas for the theme.
 *
 */    
?>
<?php
    function inafx_widgets_init() {
        register_sidebar( array(
            'name'          => theme_locals( 'content_sidebar_name' ),
            'id'            => 'sidebar-1',
            'description'   => theme_locals( 'content_sidebar_description' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
            'name'          => theme_locals( 'page_sidebar_name' ),
            'id'            => 'sidebar-2',
            'description'   => theme_locals( 'page_sidebar_description' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
            'name'          => theme_locals( 'footer_sidebar_name' ),
            'id'            => 'sidebar-3',
            'description'   => theme_locals( 'footer_sidebar_description' ),
            'before_widget' => '<div class="col-md-4 col-sm-6 col-xs-12 widget-masonry"><aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside></div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }
    add_action( 'widgets_init', 'inafx_widgets_init' );
?>