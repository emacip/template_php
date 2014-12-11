<?php
    // set $content_width variable of WordPress
    if ( ! isset( $content_width ) )
	    $content_width = 720;

    // variable to set a global variable for full width page or blog
    global $fullWidth;
    $fullWidth = false;

    // set the Global variable content_width for the images
    function inafx_content_width() {
        if ( is_attachment() && wp_attachment_is_image() ) {
            $GLOBALS['content_width'] = 720;
        }
    }
    add_action( 'template_redirect', 'inafx_content_width' );
    
    // set the excerpt length
    if( ! function_exists('inafx_set_excerpt_length')) {
        function inafx_set_excerpt_length($length) {
            return inafx_theme_option( 'opt_excerpt_words_limit' );
        }
        add_filter('excerpt_length', 'inafx_set_excerpt_length');
    }

    // replace [...] with ...  as a postfix to the excerpt
    if( ! function_exists('inafx_excerpt_more')) {
        function inafx_excerpt_more( $excerpt ) {
	        str_replace( '[...]', '...', $excerpt );
        }
        add_filter('wp_trim_excerpt', 'inafx_excerpt_more');
    }

    // fix unwanted HTML tags added to the shortcodes
    if( !function_exists('inafx_fix_shortcodes') ) {
	    function inafx_fix_shortcodes($content){   
            $content = force_balance_tags($content);
		    $array = array (
                '<p></p>'   => '',
			    '<br />'    => '', 
			    '<br>'      => '', 
			    '</br>'     => '',
			    '<p>['      => '[', 
			    ']</p>'     => ']', 
			    ']<br />'   => ']'
		    );
		    $content = strtr($content, $array);
		    return $content;
	    }
	    add_filter('the_content', 'inafx_fix_shortcodes', 7, 1 );
    }

    // update wp_title filter to load customized page titles
    add_filter( 'wp_title', 'inafx_wp_title_for_home' );
    function inafx_wp_title_for_home( $title ) {

        if( empty( $title ) && ( is_home() || is_front_page() ) ) {
            return get_bloginfo( 'name' ). ' | ' . get_bloginfo( 'description' );
        }
        elseif (is_day()) {return get_the_date('F j, Y'); }
        elseif (is_month()) {return get_the_date('F, Y'); }
        elseif (is_year()) {return get_the_date('Y'); }
        return $title;
    }
    
    // method to load the templates for meta information of posts
    // such as entry post-format icon, sticky icon, author, published date, tags, comments, view and likes
    if ( ! function_exists( 'inafx_entry_meta' ) ) :
        function inafx_entry_meta() {
            inafx_post_format_icon();

            inafx_entry_sticky();
    
            inafx_entry_author();
    
            inafx_entry_categories();
       
            inafx_entry_date();

            inafx_entry_tags();
    
            inafx_entry_comments();

            inafx_entry_views();

            inafx_entry_likes();
        }
    endif;

    // returns meta sticky icon template for the post
    if ( ! function_exists( 'inafx_entry_sticky' ) ) :
        function inafx_entry_sticky(){
            if ( inafx_theme_option( 'opt_show_post_meta' ) != 0 ) :
                if ( is_sticky() && is_home() && ! is_paged() )
                    echo '<span class="meta"><span class="fa fa-thumb-tack"></span></span>';        
            endif;
        }
    endif;

    // returns meta author name template for the post
    if ( ! function_exists( 'inafx_entry_author' ) ) :
        function inafx_entry_author(){
            if ( inafx_theme_option( 'opt_show_post_meta' ) != 0 ) :
                if ( inafx_theme_option( 'opt_show_post_author' ) != 0 ) :
                    printf( '<span class="meta"> <span class="fa fa-user"></span> %4$s <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></span>',
                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                        esc_attr( sprintf( 'View all posts by %s', get_the_author_meta( 'display_name' ) ) ),
                        get_the_author_meta( 'display_name' ),
                        inafx_theme_option( 'opt_post_author_text' )
                    );        
                endif;
            endif;
        }
    endif;

    // echo meta categories list template for the post
    if ( ! function_exists( 'inafx_entry_categories' ) ) :
        function inafx_entry_categories() {
            if ( inafx_theme_option( 'opt_show_post_meta' ) != 0 ) :
                if ( inafx_theme_option( 'opt_show_post_categories' ) != 0 ) :
                    $categories_list = get_the_category_list( ', ' );
    
                    if ( $categories_list ) {
                        echo '<span class="meta"><span class="fa fa-folder-open-o"></span><span class="categories-links">' . $categories_list . '</span></span>';
                    }
                endif;
            endif;
        }
    endif;

    // returns meta categories list template for the post
    if ( ! function_exists( 'inafx_get_entry_categories' ) ) :
        function inafx_get_entry_categories() {
            $categories_list = get_the_category_list( ', ' );
    
            if ( $categories_list ) {
                return '<span class="meta"><span class="fa fa-folder-open-o"></span><span class="categories-links">' . $categories_list . '</span></span>';
            }
        }
    endif;

    // returns meta published date template for the post
    if ( ! function_exists( 'inafx_entry_date' ) ) :
        function inafx_entry_date() {
            if ( inafx_theme_option( 'opt_show_post_meta' ) != 0 ) :
                if ( inafx_theme_option( 'opt_show_post_date_published' ) != 0 ) :
                    $date_format = inafx_theme_option( 'opt_post_date_format' );
                    if ( has_post_format( array( 'chat', 'status' ) ) )
                        $format_prefix = '%2$s';
                    else
                        $format_prefix = '%2$s';
    
                    $date = sprintf( '<span class="meta"> <span class="fa fa-calendar"></span><span class="date"><time class="entry-date" datetime="%3$s">%1$s</time></span></span>',
                        esc_attr( get_the_date( $date_format ) ),
                        esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) ),
                        esc_html( get_the_date( 'c' ) )
                    );
    
                    echo $date;
                endif;
            endif;
        }
    endif;

    // returns meta tags list template for the post
    if ( ! function_exists( 'inafx_entry_tags' ) ) :
        function inafx_entry_tags(){
            if ( inafx_theme_option( 'opt_show_post_meta' ) != 0 ) :
                if ( inafx_theme_option( 'opt_show_post_tags' ) != 0 ) :
                    $tag_list = get_the_tag_list( '', '');
                    if ( $tag_list ) {
                        echo '<span class="tags-links">' . $tag_list . '</span>';
                    }
                endif;
            endif;
        }
    endif;

    // returns meta comments count template for the post
    if ( ! function_exists( 'inafx_entry_comments' ) ) :
        function inafx_entry_comments(){
            if ( inafx_theme_option( 'opt_show_post_meta' ) != 0 ) :
                if ( inafx_theme_option( 'opt_show_post_comments_meta' ) != 0 ) :
                    if( comments_open() ) {
                        echo '<span class="meta"><span class="fa fa-comments"></span>';
                        comments_popup_link('0', '1', '%', '');
                        echo '</span>';
                    }
                endif;
            endif;
        }
    endif;

    // returns meta views count template for the post
    if ( ! function_exists( 'inafx_entry_views' ) ) :
        function inafx_entry_views(){
            if ( inafx_theme_option( 'opt_show_post_meta' ) != 0 ) :
                echo '<span class="meta"><span class="fa fa-eye"></span>';
                echo inafx_get_post_views( get_the_ID() );
                echo '</span>';
            endif;
        }
    endif;

    // returns meta likes count template for the post
    if ( ! function_exists( 'inafx_entry_likes' ) ) :
        function inafx_entry_likes(){
            if ( inafx_theme_option( 'opt_show_post_meta' ) != 0 ) :
                inafx_likes();
            endif;
        }
    endif;

    // echo meta format icon template for the post
    if ( ! function_exists( 'inafx_post_format_icon' ) ) :
        function inafx_post_format_icon(){
            if ( inafx_theme_option( 'opt_show_post_meta' ) != 0 ) :
                if ( inafx_theme_option( 'opt_show_post_format_icon' ) != 0 ) :
                    $format = get_post_format();
                    switch ( $format ) {
                        case 'aside':
                            echo '<span class="meta"><span class="fa fa-file-text fa-2x"></span></span>';
                            break;
                        case 'gallery':
                            echo '<span class="meta"><span class="fa fa-camera fa-2x"></span></span>';
                            break;
                        case 'video':
                            echo '<span class="meta"><span class="fa fa-film fa-2x"></span></span>';
                            break;
                        case 'quote':
                            echo '<span class="meta"><span class="fa fa-quote-left fa-2x"></span></span>';
                            break;
                        case 'audio':
                            echo '<span class="meta"><span class="glyphicon glyphicon-music fa-2x"></span></span>';
                            break;
                        case 'image':
                            echo '<span class="meta"><span class="fa fa-photo fa-2x"></span></span>';
                            break;
                        case 'link':
                            echo '<span class="meta"><span class="glyphicon glyphicon-link fa-2x"></span></span>';
                            break;
                        default:
                            echo '<span class="meta"><span class="fa fa-file-text-o fa-2x"></span></span>';
                            break;
                    }
                endif;
            endif;
        }
    endif;

    // returns post views count
    if ( ! function_exists( 'inafx_get_post_views' ) ) :
	    function inafx_get_post_views( $postID ){
		    return (get_post_meta($postID, 'inafx_post_views_count', true) == '') ? "0" : get_post_meta($postID, 'inafx_post_views_count', true);
	    }
    endif; 

    // saves post views count
    if ( ! function_exists( 'inafx_set_post_views' ) ) :
	    function inafx_set_post_views( $postID ){
		    $count_key = 'inafx_post_views_count';
		    $count = get_post_meta($postID, $count_key, true);
		    if($count==''){
			    $count = 1;
		    }else{
			    $count++;
		    }
		    update_post_meta($postID, $count_key, $count);
	    }       
    endif; 

    // returns meta format icon template for the post
    if ( ! function_exists( 'inafx_get_post_format_icon' ) ) :
        function inafx_get_post_format_icon(){
            $format = get_post_format();
            switch ( $format ) {
                case 'aside':
                    return '<span class="meta"><span class="fa fa-file-text fa-2x"></span></span>';
                    break;
                case 'gallery':
                    return '<span class="meta"><span class="fa fa-camera fa-2x"></span></span>';
                    break;
                case 'video':
                    return '<span class="meta"><span class="fa fa-film fa-2x"></span></span>';
                    break;
                case 'quote':
                    return '<span class="meta"><span class="fa fa-quote-left fa-2x"></span></span>';
                    break;
                case 'audio':
                    return '<span class="meta"><span class="glyphicon glyphicon-music fa-2x"></span></span>';
                    break;
                case 'image':
                    return '<span class="meta"><span class="fa fa-photo fa-2x"></span></span>';
                    break;
                case 'link':
                    return '<span class="meta"><span class="glyphicon glyphicon-link fa-2x"></span></span>';
                    break;
                default:
                    return '<span class="meta"><span class="fa fa-file-text-o fa-2x"></span></span>';
                    break;
            }
        }
    endif;

    // modifies html template of categories posts count
    if ( ! function_exists( 'categories_postcount_filter' ) ) :
        function categories_postcount_filter ( $links ) {
           $links = str_replace('(', '<span class="post-count">', $links);
           $links = str_replace(')', '</span>', $links);
           return $links;
        }
        add_filter('wp_list_categories','categories_postcount_filter');
    endif;

    // modifies html template of archives posts count
    if ( ! function_exists( 'archives_postcount_filter' ) ) :
        function archives_postcount_filter ( $links ) {
            $link_exists = strpos($links, '</a>');
            if ($link_exists !== false) {
                $links = str_replace('(', '<span class="post-count">', $links);
                $links = str_replace(')', '</span>', $links);
            }
            return $links;
        }
        add_filter('get_archives_link', 'archives_postcount_filter');
    endif;

    // returns HTML template for numbered page links for the blog
    if ( ! function_exists( 'inafx_paging_nav' ) ) :
        function inafx_paging_nav() {
            global $wp_query, $post;
            $big = 99999999;
            $pages = paginate_links(array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'total' => $wp_query->max_num_pages,
                'current' => max(1, get_query_var('paged')),
                'show_all' => false,
                'end_size' => 2,
                'mid_size' => 3,
                'prev_next' => true,
                'prev_text' => theme_locals( 'previous' ),
                'next_text' => theme_locals( 'next' ),
                'type' => 'array'
            ));
            if (count($pages) > 0) {
                echo '<nav class="navigation post-navigation container" role="navigation">';
                echo '<div class="nav-links row">';
                echo '<div class="col-sm-10 col-sm-offset-1 col-xs-12 page-links">';
                echo '<div class="row">';
                echo '<div class="col-sm-12">';
                echo '<ul class="pagination pagination-sm">';
                foreach($pages as &$item){
                    $class = (strpos($item, 'current') !== false) ? ' class="active"' : '';
                    echo '<li'.$class.'>'.str_replace('/page/1','',str_replace('?paged=1','', $item)).'</li>';
                }
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</nav>';
            }
        }
    endif;
    
    // returns HTML template for next/previous post title links
    if ( ! function_exists( 'inafx_post_nav' ) ) :
        function inafx_post_nav() {
            global $post;
            // Don't print empty markup if there's nowhere to navigate.
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );
            if ( ! $next && ! $previous )
                return;
?>
<!-- ## post-navigation start ## -->
<nav class="navigation post-navigation container" role="navigation">
    <!-- ## nav-links start ## -->
    <div class="nav-links row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12 page-links">
            <div class="row">
                <div class="col-sm-12">
                    <!-- ## pager start ## -->
                    <ul class="pager">
                        <!-- ## previous link ## -->
                        <li class="previous">
                            <?php previous_post_link( '%link', '<span class="meta-nav fa fa-arrow-left "></span> <span class="meta-nav-text">%title</span>' ); ?>
                        </li>
                        <!-- ## next link ## -->
                        <li class="next">
                            <?php next_post_link( '%link', '<span class="meta-nav-text">%title</span> <span class="meta-nav fa fa-arrow-right"></span>' ); ?>
                        </li>
                    </ul>
                    <!-- ## pager end ## -->
                </div>
            </div>
        </div>
    </div>
    <!-- ## nav-links end ## -->
</nav>
<!-- ## post-navigation end ## -->
<?php
        }
    endif;

    // returns HTML template for next/previous links for blog
    if ( ! function_exists( 'inafx_postings_nav' ) ) :
        function inafx_postings_nav() {
            global $post;
            // Don't print empty markup if there's nowhere to navigate.
            $previous = get_previous_posts_link();
            $next     = get_next_posts_link();
            if ( ! $next && ! $previous )
                return;

            $prev_posts_label = strtolower( theme_locals( 'previous' ) . ' ' . theme_locals( 'posts' ) );
            $next_posts_label = strtolower( theme_locals( 'next' ) . ' ' . theme_locals( 'posts' ) );
?>
<!-- ## postings-navigation start ## -->
<nav class="navigation postings-navigation container" role="navigation">
    <!-- ## nav-links start ## -->
    <div class="nav-links row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12 page-links">
            <div class="row">
                <div class="col-sm-12">
                    <!-- ## pager start ## -->
                    <ul class="pager">
                        <!-- ## previous link ## -->
                        <li class="previous">
                            <?php previous_posts_link( '<span class="meta-nav fa fa-arrow-left "></span> <span class="meta-nav-text">'. $prev_posts_label .'</span>' ); ?>
                        </li>
                        <!-- ## next link ## -->
                        <li class="next">
                            <?php next_posts_link( '<span class="meta-nav-text">'. $next_posts_label .'</span> <span class="meta-nav fa fa-arrow-right"></span>' ); ?>
                        </li>
                    </ul>
                    <!-- ## pager end ## -->
                </div>
            </div>
        </div>
    </div>
    <!-- ## nav-links end ## -->
</nav>
<!-- ## postings-navigation end ## -->
<?php
        }
    endif;

    // returns HTML template for next/previous page links
    if ( ! function_exists( 'inafx_page_nav' ) ) :
        function inafx_page_nav() {
            global $post;
            // Don't print empty markup if there's nowhere to navigate.
            $previous = get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );
            if ( ! $next && ! $previous )
                return;

            $prev_page_label = strtolower( theme_locals( 'previous' ) . ' ' . theme_locals( 'page' ) );
            $next_page_label = strtolower( theme_locals( 'next' ) . ' ' . theme_locals( 'page' ) );
?>
<!-- ## page-navigation start ## -->
<nav class="navigation page-navigation container" role="navigation">
    <!-- ## nav-links start ## -->
    <div class="nav-links row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12 page-links">
            <div class="row">
                <div class="col-sm-12">
                    <!-- ## pager start ## -->
                    <ul class="pager">
                        <!-- ## previous link ## -->
                        <li class="previous">
                            <?php previous_post_link( '%link', '<span class="meta-nav fa fa-arrow-left "></span> <span class="meta-nav-text">'. $prev_page_label .'</span>' ); ?>
                        </li>
                        <!-- ## next link ## -->
                        <li class="next">
                            <?php next_post_link( '%link', '<span class="meta-nav-text">'. $next_page_label .'</span> <span class="meta-nav fa fa-arrow-right"></span>' ); ?>
                        </li>
                    </ul>
                    <!-- ## pager end ## -->
                </div>
            </div>
        </div>
    </div>
    <!-- ## nav-links end ## -->
</nav>
<!-- ## page-navigation end ## -->
<?php
        }
    endif;

    // The excerpt based on words
    function my_string_limit_words($string = false, $word_limit){
        // if no content, fail
        if($string == false)
        return false;
 
        //strip shortcodes & tags
        $string = strip_shortcodes($string);
        $string = strip_tags($string);
        $excerpt_length = $word_limit;
        $words = explode(' ', $string, $excerpt_length + 1);
 
        //if the content is longer than the limit
        if(count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '...', '');
        endif;
        $string = implode(' ', $words);
        $string = '<p>' . $string . '</p>';
 
        // Make sure to return the content
        return $string;
    }

    // The excerpt based on character
    function my_string_limit_char($excerpt, $substr=0){
	    $string = strip_tags(str_replace('...', '...', $excerpt));
	    if ( $substr > 0 ) {
		    $string = substr($string, 0, $substr);
	    }
	    return $string;
    }

    // Generates a random string
    function generate_random($length){
	    srand((double)microtime()*1000000 );
	    $random_id = "";
	    $char_list = "abcdefghijklmnopqrstuvwxyz";
	    for( $i = 0; $i < $length; $i++ ) {
		    $random_id .= substr($char_list,(rand()%(strlen($char_list))), 1);
	    }
	    return $random_id;
    }

    // Remove Empty Paragraphs
    add_filter('the_content', 'shortcode_empty_paragraph_fix');
    function shortcode_empty_paragraph_fix($content) {
	    $array = array (
			    '<p>['    => '[',
			    ']</p>'   => ']',
			    ']<br />' => ']'
	    );
	    $content = strtr($content, $array);
	    return $content;
    }

    // Add Thumb Column
    if ( !function_exists('inafx_add_thumb_column') && function_exists('add_theme_support') ) {
	    // for post and page
	    add_theme_support('post-thumbnails', array( 'post', 'page' ) );
	    function inafx_add_thumb_column($cols) {
	        $cols['thumbnail'] = theme_locals( 'thumbnail' );
	        return $cols;
        }

        function inafx_add_thumb_value($column_name, $post_id) {
	        $width = (int) 35;
	        $height = (int) 35;
	        if ( 'thumbnail' == $column_name ) {
		        // thumbnail of WP 2.9
		        $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
		        // image from gallery
		        $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
		        if ($thumbnail_id)
			        $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
		        elseif ($attachments) {
			        foreach ( $attachments as $attachment_id => $attachment ) {
				        $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
			        }
		        }
		        if ( isset($thumb) && $thumb ) {
			        echo $thumb;
		        } else {
			        echo theme_locals( 'none' );
		        }
	        }
        }
        // for posts
        add_filter( 'manage_posts_columns', 'inafx_add_thumb_column' );
        add_action( 'manage_posts_custom_column', 'inafx_add_thumb_value', 10, 2 );
        // for pages
        add_filter( 'manage_pages_columns', 'inafx_add_thumb_column' );
        add_action( 'manage_pages_custom_column', 'inafx_add_thumb_value', 10, 2 );
    }

    // returns HTML template for WordPress Comments Form
    if ( ! function_exists( 'inafx_comment_form' ) ) :
        function inafx_comment_form(){
            $commenter = wp_get_current_commenter();
            $req = get_option( 'require_name_email' );
            $aria_req = ( $req ? " aria-required='true'" : '' );
            $user = wp_get_current_user();
            $user_identity = $user->display_name;
            $comment_form_fields = array(
                'author' => 
                '<div class="form-group col-sm-5 comment-form-author">' .
                    '<div class="form-group">' .
                        '<input id="author" name="author" type="text"' . 
                        ' class="form-control" placeholder="'. theme_locals( 'enter_name' ) .'"' .
                        ' value="' . esc_attr( $commenter['comment_author'] ) .
                        '" size="30"' . $aria_req . ' />' .
                    '</div>' .
                '</div>'
                ,

                'email' =>
                '<div class="form-group col-sm-5 col-sm-offset-2 comment-form-email">' .
                    '<div class="form-group">' .
                        '<input id="email" name="email" type="text"' . 
                        ' class="form-control" placeholder="'. theme_locals( 'enter_email' ) .'"' .
                        ' value="' . esc_attr(  $commenter['comment_author_email'] ) .
                        '" size="30"' . $aria_req . ' />' .
                    '</div>' .
                '</div>'
                ,
            );

            $comment_form_args = array(
                'title_reply'       => theme_locals( 'comments_form_title' ),

                'comment_notes_before' => '<p>'. theme_locals( 'comments_form_notes' ) .'</p>',

                'label_submit'      => theme_locals( 'comments_form_submit' ),

                'fields' => $comment_form_fields,

                'comment_field' =>  
                '<div class="form-group col-sm-12 comment-form-comment">' .
                    '<div class="form-group">' .
                        '<textarea id="comment" name="comment" rows="8"' .
                        ' class="form-control" placeholder="'. theme_locals( 'enter_comment' ) .'"' .
                        ' aria-required="true">' .
                        '</textarea>' .
                    '</div>' .
                '</div>',

                'comment_notes_after' => '',

                'logged_in_as' =>
                '<p class="logged-in-as">' . sprintf( theme_locals( 'comment_logged_in_as' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',

                'must_log_in' =>
                '<p class="must-log-in">' .  sprintf( theme_locals( 'comment_must_login' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>'

            );

            echo '<div class="row">';
                echo '<div class="col-sm-12">';
                comment_form($comment_form_args); 
                echo '<div class="clearfix"></div>';
                echo '</div>';
            echo '</div>';
        }
    endif;

    // returns HTML template for comments/discussion threads under the post or page.
    if ( ! function_exists( 'inafx_comment' ) ) :
        function inafx_comment($comment, $args, $depth) {
	        $GLOBALS['comment'] = $comment;
	        extract($args, EXTR_SKIP);

	        if ( 'div' == $args['style'] ) {
		        $tag = 'div';
		        $add_below = 'comment';
	        } else {
		        $tag = 'li';
		        $add_below = 'div-comment';
	        }

?>
<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? 'media' : 'media parent') ?> id="comment-<?php comment_ID() ?>">
    <div class="pull-left">
        <span class="media-object">
            <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </span>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body media-body">
    <?php endif; ?>
        <div class="comment-author vcard">
            <?php printf( '<cite class="fn%2$s">%1$s</cite>', get_comment_author(), ((get_comment_author() == get_the_author()) ? ' original-author' : '') ); ?>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
        <small class="comment-awaiting-moderation"><?php echo theme_locals( 'comment_moderation_awaited' ); ?></small>
        <br />
        <?php endif; ?>
        <div class="comment-meta commentmetadata">
            <?php printf( '%1$s at %2$s', get_comment_date(),  get_comment_time()); ?> 
            <?php edit_comment_link( '(' . theme_locals( 'edit' ) . ')', '  ', '' ); ?>
            <?php comment_reply_link( 
                        array_merge( $args, 
                            array(
                                'add_below' => $add_below, 
                                'depth' => $depth, 
                                'max_depth' => $args['max_depth'],
                                'reply_text' => theme_locals( 'reply' ),
                                'login_text' => theme_locals( 'reply_login_text' )
                            )
                         ) 
                   ); ?>
        </div>
        <div class="comment-content">
            <?php comment_text() ?>
        </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <div class="clearfix"></div>
<?php
        }
    endif;
?>