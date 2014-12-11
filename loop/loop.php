<?php
    
    /*
    * Loop to Load Posts Based on their Formats
    */ 
?>
<?php
    if (have_posts()) : while (have_posts()) : the_post();
        $format = get_post_format(); 
        $post_type = get_post_type();
        if( $post_type != 'page' ) {
            if( !is_sticky() ) {
                if ($format == '') {
                    get_template_part( 'includes/post-formats/standard' );
                }
                else {
                    get_template_part( 'includes/post-formats/'.$format );
                }
            } else {
                get_template_part( 'includes/post-formats/sticky' );
            }
        }
        else {
            get_template_part( 'includes/post-formats/page' );
        }
    endwhile; else:
?>
<?php get_template_part( 'includes/post-formats/notfound' ); ?>
<?php endif; ?>
<?php
    get_template_part( 'includes/post-formats/post-nav' );
?>
        