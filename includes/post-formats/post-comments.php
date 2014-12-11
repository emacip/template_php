<?php 
 /*
 * Load Single Post Comments Template
 */ 
?>
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
<?php
    if( is_singular() ) {
        comments_template('', true);
    }
?>