<?php 
 /*
 * Load Page Titles Which Appear Above Breadcrumbs
 */ 
?>
<?php
    if( is_home() || is_front_page() ) {
        if( inafx_theme_option( 'opt_show_homepage_titles' ) == 0 ) {
            return;
        }
    }

    if ( inafx_theme_option( 'opt_show_page_titles' ) != 0 ) :
        $class = ( inafx_theme_option( 'opt_show_page_titles' ) == 0 ) ? '' : ( ( is_home() || is_front_page() ) ? ' class="is-home"' : '' );
        echo '<div id="page-header"'.$class.'>';
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-sm-10 col-sm-offset-1 col-xs-12">';
        echo '<h1 class="page-title">';
        if (is_category() || is_single()) {
            if (is_single()) {
                echo the_title('', '', FALSE);
            }
            else{
                echo get_the_category_by_ID( get_query_var('cat') );
            }
        } elseif (is_page()) {
                echo the_title('', '', FALSE);
        }
        elseif(is_home()){
            echo  inafx_theme_option( 'opt_blog_home_title' );
        }
        elseif (is_tag()) {echo single_tag_title(); }
        elseif (is_day()) {echo get_the_date('F j, Y');}
        elseif (is_month()) {echo get_the_date('F, Y');}
        elseif (is_year()) {echo get_the_date('Y'); }
        elseif (is_author()) { $author = get_userdata( get_query_var('author') ); echo $author->display_name; }
        elseif (is_search()) {echo 'Search';}
        elseif (is_404()) {echo '404';}
        elseif (is_tax()) {echo single_cat_title('', false); }
        echo '</h1>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    else :
        if( inafx_theme_option( 'opt_show_homepage_titles' ) != 0 ) {
            if( is_home() || is_front_page() ) {
                $class = ' class="is-home"';
                echo '<div id="page-header"'.$class.'>';
                echo '<div class="container">';
                echo '<div class="row">';
                echo '<div class="col-sm-10 col-sm-offset-1 col-xs-12">';
                echo '<h1 class="page-title">';
                echo  inafx_theme_option( 'opt_blog_home_title' );
                echo '</h1>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    endif;
?>

