<?php 
 /*
 * Load Sticky Post Based on Post-Format Template
 */ 
?>
<?php
    $format = get_post_format(); 

    if ($format == '') {
        get_template_part( 'includes/post-formats/standard' );
    }
    else {
        get_template_part( 'includes/post-formats/'.$format );
    }
    
?>