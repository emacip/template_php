<?php 
 /*
 * Load Breadcrumb Links Template
 */ 
?>
<?php
    if( !is_home() ) {
        the_breadcrumb();
    }
?>