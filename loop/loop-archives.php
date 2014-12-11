<?php
    /*
    * Loop to Load Archives Based on Different Criteria:
    * 1. Recent Posts
    * 2. Archives by Month
    * 3. Archives by Year
    * 4. Archives by Category
    * 5. Archives by Tag
    * 6. Archives by Author
    */ 
?>
<?php
    if (have_posts()) : while (have_posts()) : the_post();
?>
<!-- ## page start ## -->
<article id="page-<?php the_ID(); ?>" <?php post_class( array('page') ); ?>>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-xs-12 col-sm-offset-1 post-container">
                <!-- ## post-entry start ## -->
                <div class="row post-entry">
                    <!-- ## title start ## -->
                    <div class="col-sm-12">
                        <?php get_template_part('includes/post-formats/post-title'); ?>
                    </div>
                    <!-- ## title end ## -->
                    <!-- ## entry-content start ## -->
                    <div class="col-sm-12 entry-content">
                        <?php
                            the_content();
                        ?>
                    </div>
                    <!-- ## entry-content end ## -->
                    <!-- ## recent posts start ## -->
                    <div class="col-sm-12">
                        <h4><?php echo theme_locals( 'archives_recent_posts' ); ?></h4>
                        <div class="list-fa list-fa-check-circle color">
                            <ul>
                                <?php
                                    $posts_archive = get_posts('numberposts=10');
                                    foreach($posts_archive as $post) :
                                ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- ## recent posts end ## -->
                    <!-- ## archives by month start ## -->
                    <div class="col-sm-12">
                        <h4><?php echo theme_locals( 'archives_by_month' ); ?></h4>
                        <div class="list-fa list-fa-calendar color">
                            <ul>
                                <?php wp_get_archives('type=monthly'); ?>
                            </ul>
                        </div>
                    </div>
                    <!-- ## archives by month end ## -->
                    <!-- ## archives by year start ## -->
                    <div class="col-sm-12">
                        <h4><?php echo theme_locals( 'archives_by_year' ); ?></h4>
                        <div class="list-fa list-fa-calendar color">
                            <ul>
                                <?php wp_get_archives('type=yearly'); ?>
                            </ul>
                        </div>
                    </div>
                    <!-- ## archives by year end ## -->
                    <!-- ## archives by category start ## -->
                    <div class="col-sm-12">
                        <h4><?php echo theme_locals( 'archives_by_category' ); ?></h4>
                        <div class="list-fa list-fa-folder-open color">
                            <ul>
                                <?php wp_list_categories( 'title_li=' ); ?>
                            </ul>
                        </div>
                    </div>
                    <!-- ## archives by category end ## -->
                    <!-- ## archives by tag start ## -->
                    <div class="col-sm-12">
                        <h4><?php echo theme_locals( 'archives_by_tag' ); ?></h4>
                        <div class="list-fa list-fa-tag color">
                            <?php
                                wp_tag_cloud( array('format' => 'list', 'taxonomay' => 'post_tag', 'smallest' => '18', 'largest' => '18', 'unit' => 'px' ) ); 
                            ?>
                        </div>
                    </div>
                    <!-- ## archives by tag end ## -->
                    <!-- ## archives by author start ## -->
                    <div class="col-sm-12">
                        <h4><?php echo theme_locals( 'archives_by_author' ); ?></h4>
                        <div class="list-fa list-fa-user color">
                            <ul>
                                <?php
                                    $blogusers = get_users( array( 'fields' => array( 'ID', 'display_name' ) ) );
                                    foreach ( $blogusers as $user ) {
                                ?>
                                <li>
                                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_html( $user->display_name ); ?>">
                                        <?php echo esc_html( $user->display_name ); ?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- ## archives by author end ## -->
                </div>
                <!-- ## post-entry end ## -->
            </div>
        </div>
    </div>
</article>
<!-- ## page end ## -->
<?php
    endwhile;
    endif;
?>