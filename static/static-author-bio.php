<?php
    if( inafx_theme_option( 'opt_show_author_bio' ) != 0 ) :
        // load author-bio template
        get_template_part( 'author-bio' );
    endif;
?>