<?php
    /*
    * Loop to Load Posts by Author
    */ 
?>
<?php
    get_template_part( 'static/static-author-bio' );
?>
<?php
    if (have_posts()) : while (have_posts()) : the_post();
    $format = get_post_format(); 
    
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
    endwhile; else:
?>
<?php get_template_part( 'includes/post-formats/notfound' ); ?>
<?php
    endif;
?>
<?php
    get_template_part( 'includes/post-formats/post-nav' );
?>