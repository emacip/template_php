<?php
    if ( post_password_required() )
        return;
?>
<?php if ( have_comments() ) : ?>
<div class="container">
    <div class="row">
        <!-- ## comments start ## -->
        <div id="comments" class="comments-area col-sm-10 col-sm-offset-1 col-xs-12">
            <!-- ## comments-title start ## -->
            <h2 class="comments-title">
                <?php
                    echo '<span class="fa fa-comments"></span> ';
                    printf( _n( '1 %1$s', '%3$s %2$s', get_comments_number()  ),
                        theme_locals( 'comment' ),
                        theme_locals( 'comments' ),
                        number_format_i18n( get_comments_number() ) );
                ?>
            </h2>
            <!-- ## comments-title end ## -->
            <!-- ## comments-list start ## -->
            <ul class="comment-list media-list">
                <?php
                    wp_list_comments( array(
                        'style'       => 'ul',
                        'short_ping'  => true,
                        'avatar_size' => 45,
                        'callback'    => 'inafx_comment',
                        'type'        => 'comment'
                    ) );
                ?>
            </ul>
            <!-- ## comments-list end ## -->
            <?php
                if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
                    $prev_comments_label = strtolower( theme_locals( 'previous' ) . ' ' . theme_locals( 'comments' ) );
                    $next_comments_label = strtolower( theme_locals( 'next' ) . ' ' . theme_locals( 'comments' ) );
            ?>
            <!-- ## comment-navigation start ## -->
            <nav class="navigation comment-navigation" role="navigation">
                <!-- ## nav-links start ## -->
                <div class="nav-links row">
                    <!-- ## pager start ## -->
                    <ul class="pager">
                        <!-- ## previous link ## -->
                        <li class="previous col-sm-6">
                            <?php previous_comments_link( '<span class="meta-nav fa fa-arrow-left "></span> <span class="meta-nav-text">'. $prev_comments_label .'</span>' ); ?>
                        </li>
                        <!-- ## next link ## -->
                        <li class="next col-sm-6">
                            <?php next_comments_link( '<span class="meta-nav-text">'. $next_comments_label .'</span> <span class="meta-nav fa fa-arrow-right"></span>' ); ?>
                        </li>
                    </ul>
                    <!-- ## pager end ## -->
                </div>
                <!-- ## nav-links end ## -->
            </nav>
            <!-- ## comment-navigation end ## -->
            <?php endif; ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- ## comments end ## -->
</div>
<?php else : // if no comments or comments are closed ?>
<?php if ( comments_open() ) : ?>
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <p class="no-comments"><?php echo theme_locals( 'no_comments' ); ?></p>
        </div>
    </div>
</div>
<?php else : ?>
<?php if( !is_page()) : ?>
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <p class="no-comments"><?php echo theme_locals( 'closed_comments' ); ?></p>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<div class="container">
    <div class="row">
        <!-- ## comments-reply-form start ## -->
        <div id="comments-reply-form" class="comments-area col-sm-10 col-sm-offset-1 col-xs-12">
            <?php
                inafx_comment_form(); 
            ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- ## comments-reply-form end ## -->
</div>
<?php endif; ?>