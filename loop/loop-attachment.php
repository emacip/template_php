<?php 
 /*
 * Loop to Load Attachment
 */ 
?>
<?php
    if (have_posts()) : while (have_posts()) : the_post();
        get_template_part( 'includes/post-formats/attachment' );
    endwhile; else:
?>
<?php 
    endif; 
?>
<?php
    get_template_part( 'static/static-author-bio' );
?>
<?php
    get_template_part( 'includes/post-formats/post-nav' );
?>
<?php
    get_template_part( 'includes/post-formats/post-related' );
?>
<?php
    get_template_part( 'includes/post-formats/post-comments' );
?>