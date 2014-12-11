<?php 
 /*
 * Load Featured Image of Post with Zoom Box effects
 */ 
?>
<?php if ( !is_attachment() ) : ?>
    <?php $format = get_post_format(); ?>
    <?php if( has_post_thumbnail() ) : ?>
        <?php
            $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() ); 
            $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );    
            global $fullWidth;
            $post_thumbnail = aq_resize( $post_thumbnail_url, 1140, '', true, true, true);
        ?>
        <?php 
            if( ( 'quote' == $format ) || ( 'link' == $format ) ) : 
                echo $post_thumbnail;
            else :
        ?>
        <div class="entry-bg" style="background-image: url('<?php echo $post_thumbnail; ?>');">
            <div class="entry-overlay">
            </div>
        </div>
            <?php endif; ?>
        <?php endif; ?>
<?php else : ?>
    <?php if( has_post_thumbnail() ) : ?>
        <?php
            $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() ); 
            $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );    
            global $fullWidth;
            $post_thumbnail = aq_resize( $post_thumbnail_url, 1140, '', true, true, true);
        ?>
    <div class="entry-bg" style="background-image: url('<?php echo $post_thumbnail; ?>');">
        <div class="entry-overlay">
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>