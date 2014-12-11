<?php
// shortcode for adding spacer
if( !function_exists('spacer_shortcode') ) {
    function spacer_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
        ), $atts ) );

        $classes = array();

        $classes[0] = 'single-space';

        $class = implode(" ", $classes);

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $html = '<div class="'.$class.'">';
        $html .= '</div>';

        return force_balance_tags($html);        
    }
    add_shortcode( 'spacer', 'spacer_shortcode' );
}

// shortcode for adding infobox
if( !function_exists('infobox_shortcode') ) {
    function infobox_shortcode($atts, $content = null, $shortcode){
        extract( shortcode_atts( array(
            'title' => ''
        ), $atts ) ); 

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $classes = array();

        $classes[] = 'info-box';

        $class = implode(' ', $classes);

        $html = '<div class="' . $class . '">';
        $html .= '<h4>';
        $html .= $title;
        $html .= '</h4>';
        $html .= '<p>';
        $html .= do_shortcode($content);
        $html .= '</p>';
        $html .= '</div>';

        return force_balance_tags($html);
    }
    add_shortcode( 'info_box', 'infobox_shortcode' );
}


// shortcode for adding alertbox
if( !function_exists('alertbox_shortcode') ) {
    function alertbox_shortcode($atts, $content = null, $shortcode){
        extract( shortcode_atts( array(
            'style' => '',
            'close' => ''   
        ), $atts ) ); 

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $classes = array();

        $classes[] = 'alert';
        $classes[] = $style;
        if($close == 'yes') {
            $classes[] = 'alert-dismissible';
        }
        $class = implode(' ', $classes);
        
        $dom = new DOMDocument();
        $dom->loadHTML( do_shortcode($content) );
        $links = $dom->getElementsByTagName( 'a' );
        if( $links->length > 0 ) {
            foreach ($links as $link) {
                $link->setAttribute('class', 'alert-link');
            }
            $content = str_replace( array('<body>', '</body>'), '', $dom->saveHTML( $dom->getElementsByTagName('body')->item(0) ) );
        }
        else {
            $content = do_shortcode($content);
        }
        $html = '<div class="' . $class . '" roles="alert">';
        if($close == 'yes') {
            $html .= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
        }
        $html .= $content;
        $html .= '</div>';

        return force_balance_tags($html);
    }
    add_shortcode( 'alert_box', 'alertbox_shortcode' );
}

// shortcode for adding progressbar
if( !function_exists('progressbar_shortcode') ) {
    function progressbar_shortcode($atts, $content = null, $shortcode){
        extract( shortcode_atts( array(
            'value' => '',
            'label' => '',
            'style' => ''
        ), $atts ) ); 

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $classes = array();

        $classes[] = 'progress';
        if( $style == 'striped' ) {
            $classes[] = 'progress-striped';
        }
        elseif ( $style == 'animated' ) {
            $classes[] = 'progress-striped';
            $classes[] = 'active';
        }

        $class = implode(' ', $classes);

        $html = '<div class="progress-wrapper">';
        $html .= '<div class="progress-label">';
        $html .= $label;
        $html .= '</div>';
        $html .= '<div class="'. $class .'">';
        $html .= '<div class="progress-bar" role="progressbar" ';
        $html .= 'aria-valuenow="'.$value.'" aria-valuemin="0" aria-valuemax="100" ';
        $html .= 'style="width: '.$value.'%;">';
        $html .= $value.'%';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        return force_balance_tags($html);
    }
    add_shortcode( 'progressbar', 'progressbar_shortcode' );
}

// shortcode for adding button
if( !function_exists('button_shortcode') ) {
    function button_shortcode($atts, $content = null, $shortcode){
        extract( shortcode_atts( array(
            'text'  => '',
            'link'  => '',
            'style'  => '',
            'size'  => '',
            'target'  => '',
            'display'  => '',
            'icon'  => ''
        ), $atts ) ); 

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $classes = array();
        $classes[] = 'btn';
        $classes[] = $style;
        if ( !empty( $size ) ) {
            $classes[] = $size;
        }
        if ( !empty( $display ) ) {
            $classes[] = $display;
        }

        $class = implode(' ', $classes);

        $icon_html = '<i class="'.$icon.'"></i>';

        if( empty( $link ) ) {
            $html = '<button type="button" class="'.$class.'">';
            if( !empty( $icon ) ) {
                $html .= $icon_html;
            }
            $html .= $text;
            $html .= '</button>';
        }
        else {
            $html = '<a href="'.$link.'" target="'.$target.'" class="'.$class.'">';
            if( !empty( $icon ) ) {
                $html .= $icon_html;
            }
            $html .= $text;
            $html .= '</a>';
        }
        return force_balance_tags($html);
    }
    add_shortcode( 'button', 'button_shortcode' );
}

// shortcode for adding label
if( !function_exists('label_shortcode') ) {
    function label_shortcode($atts, $content = null, $shortcode){
        extract( shortcode_atts( array(
            'text'  => '',
            'style' => ''
        ), $atts ) ); 

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $classes = array();
        $classes[] = "label";
        $classes[] = $style;

        $class = implode(' ', $classes);

        $html  = '<span class="' . $class . '">';
        $html .= $text;
        $html .= '</span>';

        return force_balance_tags($html);
    }
    add_shortcode( 'label', 'label_shortcode' );
}

// shortcode for adding icon
if( !function_exists('icon_shortcode') ) {
    function icon_shortcode($atts, $content = null, $shortcode){
        extract( shortcode_atts( array(
            'icon'  => '',
            'align' => '',
            'size' => '',
            'color' => ''
        ), $atts ) ); 

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $classes = array();
        $classes[] = 'icons';
        $classes[] = $icon;
        $classes[] = $align;
        $classes[] = $size;

        $class = implode(' ', $classes);

        $style = ( !empty( $color ) ? ' style="color: '.$color.'"' : '');

        $html  = '<span class="' . $class . '"'.$style.'></span>';

        return force_balance_tags($html);
    }
    add_shortcode( 'icon', 'icon_shortcode' );
}

// shortcode for adding accordions
global $accordion_unique_id, $accordion_panel_count;
$accordion_unique_id    =   rand();
$accordion_panel_count  =   1;
if( !function_exists('accordions_shortcode') ) {
    function accordions_shortcode($atts, $content = null, $shortcode){
        extract( shortcode_atts( array(
            'title'    => '',
            'active'   => ''
        ), $atts ) ); 

        global $accordion_unique_id, $accordion_panel_count;

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $accordion_id       = 'accordion_'.$accordion_unique_id;

        if( $shortcode == 'accordions' ) {
            $html  = '<div id="'.$accordion_id.'" class="accordion panel-group">';
            $html .= do_shortcode( $content );
            $html .= '</div>';
            $accordion_unique_id++;
            $accordion_panel_count  =   1;
        }
        else {
            $accordion_panel_id = 'accordion_panel_'.$accordion_unique_id.'_'.$accordion_panel_count;
            $collapsed = ( ( $active == 'yes' ) ? '' : ' collapsed' );
            $in = ( ( $active == 'yes' ) ? ' in' : '' );
            $html   = '<div class="panel panel-default">';
            $html  .= '<div class="panel-heading'.$collapsed.'" data-toggle="collapse" data-parent="#'.$accordion_id.'" data-target="#'.$accordion_panel_id.'">';
            $html  .= '<h4 class="panel-title">';
            $html  .= '<a href="#_"><i class="fa fa-minus"></i><i class="fa fa-plus"></i>';
            $html  .= $title;
            $html  .= '</a>';
            $html  .= '</h4>';
            $html  .= '</div>';
            $html  .= '<div id="'.$accordion_panel_id.'" class="panel-collapse collapse'.$in.'">';
            $html  .= '<div class="panel-body">';
            $html  .= do_shortcode( $content );
            $html  .= '</div>';
            $html  .= '</div>';
            $html  .= '</div>';
            $accordion_panel_count++;
        }
        return force_balance_tags($html);
    }
}

// method to initialize accordions shortcode
if( !function_exists('accordions_shortcode_init') ) {
    function accordions_shortcode_init() {
        add_shortcode( 'accordion', 'accordions_shortcode' );
        add_shortcode( 'accordions', 'accordions_shortcode' );
    }
    add_action('init','accordions_shortcode_init');
}

// shortcode for adding tabs
if( !function_exists('tabs_shortcode') ) {
    function tabs_shortcode($atts, $content = null, $shortcode){       
    	extract( shortcode_atts( array(
            'active' => ''
    	), $atts ) );  

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $tab_unique_id = rand();

        $tab_id       = 'tab_'.$tab_unique_id;
        $active_tab = ( !empty( $active ) ? $active : 'tab1' );

        $tabs_content = array();
        
        $html = '<div id="#'.$tab_id.'" class="tabs">';
        $html .= '<ul class="nav nav-tabs">';        
        foreach($atts as $key => $value) {
            if( $key != 'active' ) {
                $tab_content_id = $key.'-'.$tab_unique_id;
                $class = ( $active_tab == $key ? ' class="active"' : '' );
                $html .= '<li'.$class.'>';
                $html .= '<a href="#'.$tab_content_id.'" role="tab" data-toggle="tab">';
                $html .= $value;
                $html .= '</a>';
                $html .= '</li>';
                $result = preg_match( "/\[$key\](.*)\[\/$key\]/i", do_shortcode( $content ), $tab_content );
                if( $result ) {
                    $tabs_content[$key] = $tab_content[1];
                }
            }
        }
        $html .= '</ul>';
        $html .= '<div class="tab-content">';
        
        foreach($atts as $key => $value) {
            if( $key != 'active' ) {
                $tab_content_id = $key.'-'.$tab_unique_id;
                $class = ( $active_tab == $key ? ' in active' : '' );
                $html .= '<div class="tab-pane fade'.$class.'" id="'.$tab_content_id.'">';
                $html .= $tabs_content[$key];
                $html .= '</div>';
            }
        }
        $html .= '</div>';
        $html .= '</div>';
        return force_balance_tags($html);
    }
    add_shortcode( 'tabs', 'tabs_shortcode' );
}

// shortcode for adding googlemap
if( !function_exists('googlemap_shortcode') ) {
    function googlemap_shortcode($atts, $content = null){
    	    extract( shortcode_atts( array(
                'longitude' => '',
                'latitude' => '',
                'zoom' => 14,
                'shade' => '',
                'saturation' => '',
                'marker' => ''
       	    ), $atts ) );  

           $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

           $marker = empty($marker) ? INAFX_PARENT_URL . '/assets/images/map-marker.png' : $marker;
           $html = '<div class="map-container">';
           $html .= '<div class="responsive-wrapper">';
           $html .= '<div class="map-canvas" ';
           $html .= 'data-longitude="'.$longitude.'" ';
           $html .= 'data-latitude="'.$latitude.'" ';
           $html .= 'data-zoom="'.$zoom.'" ';
           $html .= 'data-marker="'.$marker.'" ';
           $html .= 'data-saturation="'.$saturation.'" ';
           $html .= 'data-shade="'.$shade.'">';
           $html .= '</div>';
           $html .= '<div class="map-info">';
           $html .= do_shortcode($content);
           $html .= '</div>';
           $html .= '</div>';
           $html .= '</div>';

           wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=' . inafx_theme_option( 'opt_google_api_key' ) . '&sensor=false&no-cache='.date("YmdHis"), array( 'jquery' ), '', true );

           return force_balance_tags($html);            
    }
    add_shortcode( 'gmap', 'googlemap_shortcode' );
}

// shortcode for embedding media files
if( !function_exists('embed_shortcode') ) {
    function embed_shortcode($atts, $content = null){
        extract( shortcode_atts( array(
            'file' => '',
            'style' => '',
            'width' => '',
            'height' => '',
            'soundcloud_visual' => ''
        ), $atts ) );  

        if( $style == 'fixed' ) {
            $style = ' class="media-wrapper"';
            $embed = ' width="'.$width.'" height="'.$height.'"';
        }
        else {
            $style = ' class="responsive-wrapper"';
            $embed = '';
            if ( $soundcloud_visual == 'false' ) {
                $style = ' class="soundcloud-wrapper"';    
            }
        }

        $html = '<div'.$style.'>';
        $media = apply_filters('the_content', "[embed".$embed."]" . $file . "[/embed]");
        $matched = preg_match('/src=["\'](?P<src>[^"\'<>]+)["\']/', $media, $matches, 0);
        if( 1 === $matched ) {
            $media = str_replace( $matches[0], substr( $matches[0], 0, strlen( $matches[0] ) - 1 ) . inafx_detect_video_source( $file ) . '"', $media);
            $media = str_replace( array( 'visual=true', 'visual=false' ), 'visual='.$soundcloud_visual, $media);
        }
        $html .= $media;
        $html .= '</div>';


        return force_balance_tags($html);            
    }
    add_shortcode( 'embed_media', 'embed_shortcode' );
}

// shortcode for adding contact form
if( !function_exists('contactform_shortcode') ) {
    function contactform_shortcode($atts){
        extract( shortcode_atts( array(
            'name_label' => 'Name: ',
            'name_placeholder' => 'Name',
            'email_label' => 'E-mail: ',
            'email_placeholder' => 'E-mail ID',
            'message_label' => 'Message: ',
            'message_placeholder' => 'Message',
            'captcha_placeholder' => 'Are you human?',
            'button_text' => 'send'
        ), $atts ) ); 

        $suf = '-'.rand();

        // <!--## contact form start ##-->
        $html = '<form name="form-contact-us'.$suf.'" class="contact-form" id="form-contact-us'.$suf.'" data-suf="'.$suf.'">';

        $html .= '<div class="col-sm-12" id="contact-form-message'.$suf.'"></div>';

        $html .= '<div class="row">';
        
        $html .= '<div class="col-sm-6">';
        $html .= '<div class="form-group">';
        $html .= '<label for="txtName'.$suf.'">'.$name_label.'</label>';
        $html .= '<input type="text" placeholder="'.$name_placeholder.'" ';
        $html .= 'class="form-control required" id="txtName'.$suf.'" name="txtName'.$suf.'" />';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="col-sm-6">';
        $html .= '<div class="form-group">';
        $html .= '<label for="txtEmail'.$suf.'">'.$email_label.'</label>';
        $html .= '<input type="text" placeholder="'.$email_placeholder.'" ';
        $html .= 'class="form-control required email" id="txtEmail'.$suf.'" name="txtEmail'.$suf.'" />';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '<div class="clearfix"></div>';
        $html .= '</div>';

        $html .= '<div class="form-group">';
        $html .= '<label for="txtMessage'.$suf.'">'.$message_label.'</label>';
        $html .= '<textarea placeholder="'.$message_placeholder.'" class="form-control required" ';
        $html .= 'id="txtMessage'.$suf.'" name="txtMessage'.$suf.'" rows="10"></textarea>';
        $html .= '</div>';

        $html .= '<div class="form-group">';
        $html .= '<label for="txtCaptcha'.$suf.'"></label>';
        $html .= '<input type="text" class="form-control required captcha validate-equalTo" ';
        $html .= 'placeholder="'.$captcha_placeholder.'" id="txtCaptcha'.$suf.'" name="txtCaptcha'.$suf.'" />';
        $html .= '</div>';

        $html .= '<div class="form-group">';
        $html .= '<button type="button" id="btn-Send'.$suf.'" class="btn btn-lg btn-default">';
        $html .= $button_text;
        $html .= '</button>';
        $html .= '</div>';
        
        $html .= '</form>';
        // <!--## contact form end ##-->

        wp_enqueue_script( 'jquery-validate', INAFX_PARENT_URL . '/assets/js/jquery.validate.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'app-contact', INAFX_PARENT_URL . '/assets/js/app.contact.js', array( 'jquery' ), '', true );

        return force_balance_tags($html);            
    }
    add_shortcode( 'contactform', 'contactform_shortcode' );
}

// shortcode for adding full width image with description and zoom effect
if( !function_exists('fullwidthimage_shortcode') ) {
    function fullwidthimage_shortcode($atts, $content = null){
        extract( shortcode_atts( array(
            'photourl' => '',
            'zoomeffect' => 'true',
            'align_center' => 'true',
            'padding'   => 'double',
            'url'   => ''
        ), $atts ) );  

        $classes = array();

        $classes[0] = $align_center == 'true' ? 'text-center' : 'no-align';

        $class = implode(" ", $classes);

        if( $zoomeffect == 'true' ) {
            $html = '<div class="full-width-image '.$class.'">';
            $html .= '<div class="zoom-box">';
            $html .= '<img class="img-responsive" src="'.$photourl.'" alt="photo">';
            $html .= '<span class="zoom-mask">';
            $html .= '<span class="zoom">';
            $html .= '<a class="zoom-photo" href="'.$photourl.'">';
            $html .= '<span class="fa-stack fa-2x">';
            $html .= '<i class="fa fa-circle fa-stack-2x"></i>';
            $html .= '<i class="fa fa-search fa-stack-1x"></i>';
            $html .= '</span>';
            $html .= '</a>';
            if( !empty($url) ) {
                $html .= '<a href="'.$url.'">';
                $html .= '<span class="fa-stack fa-2x">';
                $html .= '<i class="fa fa-circle fa-stack-2x"></i>';
                $html .= '<i class="fa fa-link fa-stack-1x"></i>';
                $html .= '</span>';
                $html .= '</a>';
            }
            $html .= '</span>';
            $html .= '</span>';
            $html .= '</div>';
        } else {
            $html = '<div class="full-width-image '.$class.'">';
            if( !empty($url) ) {
                $html .= '<a href="'.$url.'">';
                $html .= '<img class="no-zoom" src="'.$photourl.'" alt="photo">';
                $html .= '</a>';
            } else {
                $html .= '<img class="no-zoom" src="'.$photourl.'" alt="photo">';
            }
            $html .= '</div>';
        }

        if( !empty($content) ) {
            $html .= '<p class="'.$class.' '.$padding.'">';
            $html .= do_shortcode( $content );
            $html .= '</p>';
        }
        $html .= '</div>';
        return force_balance_tags($html);            
    }
    add_shortcode( 'fullwidthimage', 'fullwidthimage_shortcode' );
}

// shortcode for adding image gallery with option of masonry grid/slideshow type.
if( !function_exists('gallerytype_shortcode') ) {
    remove_shortcode('gallery', 'gallery_shortcode');
    function gallerytype_shortcode($atts, $content = null){
        extract( shortcode_atts( array(
            'style' => '',
            'height' => '',
            'margin' => '',
            'ids'   => ''
        ), $atts ) );  

        $attachment_size     = apply_filters( 'inafx_attachment_size', array( 980, 980 ) );
    
        $gallery_format = $style;
        $gallery_targetheight = $height;
        $gallery_margins = $margin;

        $attachments = get_posts(
            array(
                'post_type' => 'attachment',
                'post_mime_type'  => 'image',
                'numberposts'    => -1,
                'include'         => $ids,
                'order'          => 'ASC',
                'orderby'         => 'post__in'
            )
        );

        $post_gallery_id = 'post-gallery-' . rand();

        if( 'grid' == $gallery_format ) {
            $html = '<div id="' . $post_gallery_id . '">';
            foreach( $attachments as &$attachment ) {
	            $html .= sprintf( '<a href="%1$s" title="%2$s"><img class="img-responsive" src="%1$s" alt="%2$s" /></a>',
		            wp_get_attachment_image_src( $attachment->ID, $attachment_size )[0],
                    $attachment->post_title
	            );
            }
            $html .= '</div>';

            $script = '<script type="text/javascript">';
            $script .= 'jQuery(document).ready(function () {';
            $script .= 'jQuery(\'#' . $post_gallery_id . '\').justifiedGallery({';
            $script .= ' rowHeight: ' . $gallery_targetheight . ',';
            $script .= ' fixedHeight: false,';
            $script .= ' lastRow: \'justify\',';
            $script .= ' margins: ' . $gallery_margins . ',';
            $script .= ' randomize: false,';
            $script .= ' sizeRangeSuffixes: {\'lt100\':\'\', \'lt240\':\'\', \'lt320\':\'\', \'lt500\':\'\', \'lt640\':\'\', \'lt1024\':\'\'}';
            $script .= '}).on(\'jg.complete\', function () {';
	        $script .= '$(\'#' . $post_gallery_id . ' a\').swipebox();';
            $script .= '});';
            $script .= '});';
            $script .= '</script>';

            $html .= $script;
        }
        else {
            $html = '<div id="' . $post_gallery_id . '" class="carousel slide" data-ride="carousel">';
            $html .= '<ol class="carousel-indicators">';
            for( $index = 0; $index < count($attachments); $index++  ) {
                $html .= '<li data-target="#' . $post_gallery_id . '" data-slide-to="' . $index . '"'. (($index == 0) ? ' class="active"' : '') . '></li>';
            }
            $html .= '</ol>';

            $html .= '<div class="carousel-inner">';
            for( $index = 0; $index < count($attachments); $index++  ) {
                $post_thumbnail_url = wp_get_attachment_url( $attachments[$index]->ID );
                global $fullWidth;
                $post_thumbnail = aq_resize( $post_thumbnail_url, 1140, 550, true, true, true );
                $html .= '<div class="item'. (($index == 0) ? ' active' : '') . '">';
                $html .= '<img src="' . $post_thumbnail . '" alt="' . $attachments[$index]->post_title . '">';
                $html .= '</div>';
            }
            $html .= '</div>';

            $html .= '<a class="left carousel-control" href="#' . $post_gallery_id . '" data-slide="prev">';
            $html .= '<span class="glyphicon glyphicon-chevron-left"></span>';
            $html .= '</a>';
            $html .= '<a class="right carousel-control" href="#' . $post_gallery_id . '" data-slide="next">';
            $html .= '<span class="glyphicon glyphicon-chevron-right"></span>';
            $html .= '</a>';
            $html .= '</div>';
        }

        return force_balance_tags($html);            
    }
    add_shortcode( 'gallery', 'gallerytype_shortcode' );
}
?>