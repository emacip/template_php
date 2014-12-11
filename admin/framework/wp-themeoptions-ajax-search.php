<?php
    if ( !class_exists('wp_themeoptions_ajax_search') ) {
        /**
        * Class Name: class wp_themeoptions_ajax_search 
        * Description: It contains a function that returns json format of postings returned by WP_Query.
        * Author: INA Brains
        */
        class wp_themeoptions_ajax_search {
    
            /**
            * Search posts by keyword or post ids
            *
            * @see search_posts()
            *
            * @return  echo json string of posts returned by WP_Query.
            */
            public function search_posts() {
                $q = isset($_GET["q"]) ? $_GET["q"] : '';
                $page_limit = isset($_GET["page_limit"]) ? $_GET["page_limit"] : -1;
                $ids = isset($_GET["posts"]) ? $_GET["posts"] : '';
                if( !empty( $ids ) ) {
                    $ids = explode( ",", $ids );
                } else {
                    $ids = array();
                }
    
                $posts = new WP_Query( 
                    array(
                        's'                     => $q,
                        'post_type'             => 'post',
                        'post_status'           => 'published',
                        'posts_per_page'        => $page_limit,
                        'post__in'              => $ids, 
                        'orderby'               => 'post__in'
                    )
                );
    
                $json = array();
    
                while ($posts->have_posts()) : $posts->the_post();
                    $json[] = array( 'id' => get_the_ID(), 'text' => html_entity_decode( get_the_title() ) );
                endwhile;
    
                echo json_encode( $json );
            }
        }
    }
    header('Content-Type: application/json', TRUE);
    $wp_themeoptions_ajax_search = new wp_themeoptions_ajax_search();
    $wp_themeoptions_ajax_search->search_posts();
    wp_die();
?>