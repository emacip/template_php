<?php 
 /*
 * Load post gallery based on selected options. 
 * Options:
 * 1. Masonry Grid
 * 2. Slideshow
 */ 
?>
<?php
    $attachment_size     = apply_filters( 'inafx_attachment_size', array( 980, 980 ) );
    
    $gallery_format = get_post_meta(get_the_ID(), 'inafx_gallery_format', true);
    $gallery_targetheight = get_post_meta(get_the_ID(), 'inafx_gallery_targetheight', true);
    $gallery_margins = get_post_meta(get_the_ID(), 'inafx_gallery_margins', true);

    $post_gallery_id = 'post-gallery-' . get_the_ID();

    if( 'grid' == $gallery_format ) {
        echo '<div id="' . $post_gallery_id . '">';
        foreach( $attachments as &$attachment ) {
	        printf( '<a href="%1$s" title="%2$s"><img class="img-responsive" src="%1$s" alt="%2$s" /></a>',
		        wp_get_attachment_image_src( $attachment->ID, $attachment_size )[0],
                $attachment->post_title
	        );
        }
        echo '</div>';

        $script = '<script type="text/javascript">';
        $script .= 'jQuery(document).ready(function () {';
        $script .= 'jQuery(\'#' . $post_gallery_id . '\').justifiedGallery({';
        $script .= ' rowHeight: ' . $gallery_targetheight . ',';
        $script .= ' fixedHeight: false,';
        $script .= ' lastRow: \'justify\',';
        $script .= ' margins: ' . $gallery_margins . ',';
        $script .= ' randomize: false,';
        $script .= ' captions: false,';
        $script .= ' sizeRangeSuffixes: {\'lt100\':\'\', \'lt240\':\'\', \'lt320\':\'\', \'lt500\':\'\', \'lt640\':\'\', \'lt1024\':\'\'}';
        $script .= '}).on(\'jg.complete\', function () {';
	    $script .= '$(\'#' . $post_gallery_id . ' a\').swipebox();';
        $script .= '});';
        $script .= '});';
        $script .= '</script>';

        echo $script;
    }
    else {
        $carousel = '<div id="' . $post_gallery_id . '" class="carousel slide" data-ride="carousel">';
        $carousel .= '<ol class="carousel-indicators">';
        for( $index = 0; $index < count($attachments); $index++  ) {
            $carousel .= '<li data-target="#' . $post_gallery_id . '" data-slide-to="' . $index . '"'. (($index == 0) ? ' class="active"' : '') . '></li>';
        }
        $carousel .= '</ol>';

        $carousel .= '<div class="carousel-inner">';
        for( $index = 0; $index < count($attachments); $index++  ) {
            $post_thumbnail_url = wp_get_attachment_url( $attachments[$index]->ID );
            global $fullWidth;
            $post_thumbnail = aq_resize( $post_thumbnail_url, 1140, 550, true, true, true );
            $carousel .= '<div class="item'. (($index == 0) ? ' active' : '') . '">';
            $carousel .= '<img src="' . $post_thumbnail . '" alt="' . $attachments[$index]->post_title . '">';
            $carousel .= '</div>';
        }
        $carousel .= '</div>';

        $carousel .= '<a class="left carousel-control" href="#' . $post_gallery_id . '" data-slide="prev">';
        $carousel .= '<span class="glyphicon glyphicon-chevron-left"></span>';
        $carousel .= '</a>';
        $carousel .= '<a class="right carousel-control" href="#' . $post_gallery_id . '" data-slide="next">';
        $carousel .= '<span class="glyphicon glyphicon-chevron-right"></span>';
        $carousel .= '</a>';
        $carousel .= '</div>';

        echo $carousel;
    }
?>