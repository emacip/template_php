<?php 
 /*
 * Loop to Load Single Page
 */ 
?>
<?php
    if (have_posts()) : while (have_posts()) : the_post();
        get_template_part( 'includes/post-formats/page' );
    endwhile; else:
?>
<?php 
    endif;
?>
<?php if (!is_home() && !is_front_page()) : ?>
<?php
    get_template_part( 'includes/post-formats/post-nav' );
?>
<?php
    get_template_part( 'includes/post-formats/post-comments' );
?>
<?php endif; ?>