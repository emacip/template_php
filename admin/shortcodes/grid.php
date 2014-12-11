<?php
// shortcode for adding responsive grid system
// 1 column, 2 columns, 3 columns, 4 columns etc
if( !function_exists('grid_system') ) {    
    function grid_system($atts, $content = null, $shortcode){
    	    extract( shortcode_atts( array(
                'class' => ''
    	    ), $atts ) );    

            $classes = array();

            switch ($shortcode) {
                case 'row':
                    $classes[] = 'row';
                    ( $class != '' ) ? $classes[1] = $class : '';
                    break;
                case 'col_one':
                    $classes[] = 'col-sm-12';
                    $classes[] = 'col-xs-12';
                    ( $class != '' ) ? $classes[] = $class : '';
                    break;
                case 'col_onehalf':
                    $classes[] = 'col-sm-6';
                    $classes[] = 'col-xs-12';
                    ( $class != '' ) ? $classes[] = $class : '';
                    break;
                case 'col_onethird':
                    $classes[] = 'col-sm-4';
                    $classes[] = 'col-xs-12';
                    ( $class != '' ) ? $classes[] = $class : '';
                    break;
                case 'col_twothird':
                    $classes[] = 'col-sm-8';
                    $classes[] = 'col-xs-12';
                    ( $class != '' ) ? $classes[] = $class : '';
                    break;
                case 'col_oneforth':
                    $classes[] = 'col-md-3';
                    $classes[] = 'col-sm-4';
                    $classes[] = 'col-xs-12';
                    ( $class != '' ) ? $classes[] = $class : '';
                    break;
                case 'col_threeforth':
                    $classes[] = 'col-md-9';
                    $classes[] = 'col-sm-8';
                    $classes[] = 'col-xs-12';
                    ( $class != '' ) ? $classes[] = $class : '';
                    break;
                default:
                    break;
            }

            $class = implode(" ", $classes);

            $content = preg_replace('/<br class="nc".\/>/', '', trim($content));

            $html = '<div class="'.$class.'">';
            $html .= do_shortcode($content);
            $html .= '</div>';

            return force_balance_tags($html);
    }
    add_shortcode( 'row', 'grid_system' );
    add_shortcode( 'col_one', 'grid_system' );
    add_shortcode( 'col_onehalf', 'grid_system' );
    add_shortcode( 'col_onethird', 'grid_system' );
    add_shortcode( 'col_twothird', 'grid_system' );
    add_shortcode( 'col_oneforth', 'grid_system' );
    add_shortcode( 'col_threeforth', 'grid_system' );
}
?>