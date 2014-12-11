<?php
// shortcode for adding dropcap
if( !function_exists('dropcap_shortcode') ) {
    function dropcap_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'class' => ''
        ), $atts ) );

        $classes = array();

        $classes[] = 'dropcap';
        $classes[] = $class;

        $class = implode(" ", $classes);

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $html = '<span class="'.$class.'">';
        $html .= do_shortcode($content);
        $html .= '</span>';

        return force_balance_tags($html);
    }
    add_shortcode( 'dropcap', 'dropcap_shortcode' );
}

// shortcode for adding text highlighter
if( !function_exists('highlight_shortcode') ) {
    function highlight_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'class' => ''
        ), $atts ) );

        $classes = array();

        $classes[] = $class;

        $class = implode(" ", $classes);

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $html = '<mark class="'.$class.'">';
        $html .= do_shortcode($content);
        $html .= '</mark>';

        return force_balance_tags($html);
    }
    add_shortcode( 'highlight', 'highlight_shortcode' );
}

// shortcode for adding different styles of listings
if( !function_exists('list_shortcode') ) {
    function list_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'type'  => '',
            'style' => ''
        ), $atts ) );

        $classes = array();

        $classes[] = 'list-fa';
        $classes[] = $style;
        $classes[] = $type;

        $class = implode(" ", $classes);

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $html = '<div class="'.$class.'">';
        $html .= do_shortcode($content);
        $html .= '</div>';

        return force_balance_tags($html);
    }
    add_shortcode( 'list', 'list_shortcode' );
}

// shortcode for adding blockquote, pullquote or pushquote
if( !function_exists('blockquote_shortcode') ) {
    function blockquote_shortcode($atts, $content = null, $shortcode){
        extract( shortcode_atts( array(
         'author'   => '',
         'style'    => ''
        ), $atts ) ); 

        $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

        $classes = array();

        switch ($shortcode) {
            case 'blockquote':
                break;
            case 'pullquote' :
                $classes[] = $shortcode;
                $classes[] = 'col-sm-6';
                $classes[] = 'col-xs-12';
                $classes[] = $style;
                break;
            case 'pushquote' :
                $classes[] = $shortcode;
                $classes[] = 'col-sm-6';
                $classes[] = 'col-xs-12';
                $classes[] = $style;
                break;
            default:
                break;
        }

        $class = implode(' ', $classes);

        $html = '<blockquote' . ( !empty($class) ? ' class="' . $class . '"' : '') . '>';
        $html .= '<p>';
        $html .= do_shortcode($content);
        $html .= '</p>';
        if($author!='') {
            $html .= '<footer>';
            $html .= $author;
            $html .= '</footer>';
        }
        $html .= '</blockquote>';

        return force_balance_tags($html);
    }
    add_shortcode( 'blockquote', 'blockquote_shortcode' );
    add_shortcode( 'pullquote', 'blockquote_shortcode' );
    add_shortcode( 'pushquote', 'blockquote_shortcode' );
}
?>