<?php 
 /*
 * Load Posts/Pages Navigation System.
 * Posts Navigation System has 2 Options:
 * 1. Next/Previous Links
 * 2. Numbered Paging Link
 */ 
?>
<?php
    if( is_singular() ) {
        if( is_page() ) {
            inafx_page_nav();
        } else {
            inafx_post_nav();            
        }
    } else {
        if ( inafx_theme_option( 'opt_blog_pagination_type' ) == 'numbers' ) :
            inafx_paging_nav();
        elseif ( inafx_theme_option( 'opt_blog_pagination_type' ) == 'links' ) :
            inafx_postings_nav();
        endif;
    }
?>
