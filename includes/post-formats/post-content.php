<?php
    $format = get_post_format();
    if( !is_singular() ) :
?>
<!-- ## entry-content start ## -->
<div class="col-sm-12 entry-content">
<?php
    if ( inafx_theme_option( 'opt_show_full_post' ) == 0 ) :
        if (has_excerpt()) {
            $excerpt = get_the_excerpt();
            echo my_string_limit_words($excerpt, inafx_theme_option( 'opt_excerpt_words_limit' ));
        } else {
            $content = get_the_content();
            echo my_string_limit_words($content, inafx_theme_option( 'opt_excerpt_words_limit' ));
        }
    else :
        if (has_excerpt()) {
            the_excerpt();
        } else {
            the_content();
        }
    endif;
?>
</div>
<!-- ## entry-content end ## -->
<?php if ( 'aside' != $format ) : ?>
<?php if ( inafx_theme_option( 'opt_show_full_post' ) == 0 ) : ?>
<?php if ( inafx_theme_option( 'opt_show_readmore_button' ) == 1 ) : ?>
<!-- ## entry-continue link start ## -->
<div class="col-sm-12 entry-continue">
    <a href="<?php the_permalink() ?>" class="btn btn-default">
        <?php echo inafx_theme_option( 'opt_readmore_button_text' ); ?>
    </a>
</div>
<!-- ## entry-continue link end ## -->
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php
    get_template_part( 'includes/post-formats/post-edit' );
?>
<?php else : ?>
<!-- ## entry-content start ## -->
<div class="col-sm-12 entry-content">
<?php
    the_content();
?>
<?php
     wp_link_pages( array( 'before' => '<p class="link-pages">Pages: ', 'after' => '</p>', 'pagelink' => '<span>%</span>' ) );
?>
</div>
<!-- ## entry-content end ## -->
<?php
    get_template_part( 'includes/post-formats/post-edit' );
?>
<?php
    endif;
?>