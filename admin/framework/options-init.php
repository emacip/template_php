<?php
if ( !class_exists( 'inafx_options_config' ) ) {
    class inafx_options_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {
            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }
        }

        public function initSettings() {

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            // $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // Function to test the compiler hook and demo CSS output.
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }        

        function compiler_action($options, $css, $changed_values) {
            $body        = 'body{';
            if( $options['opt_body_pattern'] == 0 ) {
                $body       .= 'background-color:' . $options['opt_body_background']['background-color'] . ';';
                $body       .= (empty($options['opt_body_background']['background-image']) ? '' : 'background-image:url('.$options['opt_body_background']['background-image'].');');
                $body       .= 'background-repeat:' .$options['opt_body_background']['background-repeat'] . ';';
                $body       .= 'background-position:' .$options['opt_body_background']['background-position'] . ';';
                $body       .= 'background-attachment:' .$options['opt_body_background']['background-attachment'] . ';';
                $body       .= 'background-size:' .$options['opt_body_background']['background-size'] . ';';
            } 
            else {
                $body       .= 'background-image: url('.INAFX_PARENT_URL. '/assets/images/pattern'.$options['opt_body_pattern'].'.png);';
                $body       .= 'background-repeat: repeat;';
            }
            $body       .= 'color:' .$options['opt_body_typography']['color'] . ';';
            $body       .= 'font-family:' .$options['opt_body_typography']['font-family'] . ';';
            $body       .= 'font-size:' .$options['opt_body_typography']['font-size'] . ';';
            $body       .= 'font-weight:' .$options['opt_body_typography']['font-weight'] . ';';
            if(!empty( $options['opt_body_typography']['text-align'] )) {
                $body       .= 'text-align:' .$options['opt_body_typography']['text-align'] . ';';
            }
            $body       .= '}'.PHP_EOL;
            $body       .= '@media (max-device-width: 640px) and (min-device-width: 180px){'.PHP_EOL;
            $body       .= 'body{'.PHP_EOL;
            $body       .= 'background-attachment: scroll;';
            $body       .= 'background-size: auto;';
            $body       .= 'background-repeat: repeat;';
            $body       .= '}'.PHP_EOL;
            $body       .= '}'.PHP_EOL;

            $headings    = 'h1{';
            $headings   .= 'font-family:' .$options['opt_h1_heading']['font-family'] . ';';
            $headings   .= 'font-weight:' .$options['opt_h1_heading']['font-weight'] . ';';
            $headings   .= 'color:' .$options['opt_h1_heading']['color'] . ';';
            if(!empty( $options['opt_h1_heading']['text-align'] )) {
                $headings   .= 'text-align:' .$options['opt_h1_heading']['text-align'] . ';';
            }
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h2{';
            $headings   .= 'font-family:' .$options['opt_h2_heading']['font-family'] . ';';
            $headings   .= 'font-weight:' .$options['opt_h2_heading']['font-weight'] . ';';
            $headings   .= 'color:' .$options['opt_h2_heading']['color'] . ';';
            if(!empty( $options['opt_h2_heading']['text-align'] )) {
                $headings   .= 'text-align:' .$options['opt_h2_heading']['text-align'] . ';';
            }
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h3{';
            $headings   .= 'font-family:' .$options['opt_h3_heading']['font-family'] . ';';
            $headings   .= 'font-weight:' .$options['opt_h3_heading']['font-weight'] . ';';
            $headings   .= 'color:' .$options['opt_h3_heading']['color'] . ';';
            if(!empty( $options['opt_h3_heading']['text-align'] )) {
                $headings   .= 'text-align:' .$options['opt_h3_heading']['text-align'] . ';';
            }
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h4{';
            $headings   .= 'font-family:' .$options['opt_h4_heading']['font-family'] . ';';
            $headings   .= 'font-weight:' .$options['opt_h4_heading']['font-weight'] . ';';
            $headings   .= 'color:' .$options['opt_h4_heading']['color'] . ';';
            if(!empty( $options['opt_h4_heading']['text-align'] )) {
                $headings   .= 'text-align:' .$options['opt_h4_heading']['text-align'] . ';';
            }
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h5{';
            $headings   .= 'font-family:' .$options['opt_h5_heading']['font-family'] . ';';
            $headings   .= 'font-weight:' .$options['opt_h5_heading']['font-weight'] . ';';
            $headings   .= 'color:' .$options['opt_h5_heading']['color'] . ';';
            if(!empty( $options['opt_h5_heading']['text-align'] )) {
                $headings   .= 'text-align:' .$options['opt_h5_heading']['text-align'] . ';';
            }
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h6{';
            $headings   .= 'font-family:' .$options['opt_h6_heading']['font-family'] . ';';
            $headings   .= 'font-weight:' .$options['opt_h6_heading']['font-weight'] . ';';
            $headings   .= 'color:' .$options['opt_h6_heading']['color'] . ';';
            if(!empty( $options['opt_h6_heading']['text-align'] )) {
                $headings   .= 'text-align:' .$options['opt_h6_heading']['text-align'] . ';';
            }
            $headings   .= '}'.PHP_EOL;
            $headings   .= '@media (min-width: 992px){'.PHP_EOL;
            $headings   .= 'h1{';
            $headings   .= 'font-size:' .$options['opt_h1_heading']['font-size'] . ';';
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h2{';
            $headings   .= 'font-size:' .$options['opt_h2_heading']['font-size'] . ';';
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h3{';
            $headings   .= 'font-size:' .$options['opt_h3_heading']['font-size'] . ';';
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h4{';
            $headings   .= 'font-size:' .$options['opt_h4_heading']['font-size'] . ';';
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h5{';
            $headings   .= 'font-size:' .$options['opt_h5_heading']['font-size'] . ';';
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h6{';
            $headings   .= 'font-size:' .$options['opt_h6_heading']['font-size'] . ';';
            $headings   .= '}'.PHP_EOL;
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h1 > a{';
            $headings   .= 'color:' .$options['opt_h1_heading']['color'] . ';';
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h2 > a{';
            $headings   .= 'color:' .$options['opt_h2_heading']['color'] . ';';
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h3 > a,table caption{';
            $headings   .= 'color:' .$options['opt_h3_heading']['color'] . ';';
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h4 > a{';
            $headings   .= 'color:' .$options['opt_h4_heading']['color'] . ';';
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h5 > a{';
            $headings   .= 'color:' .$options['opt_h5_heading']['color'] . ';';
            $headings   .= '}'.PHP_EOL;
            $headings   .= 'h6 > a{';
            $headings   .= 'color:' .$options['opt_h6_heading']['color'] . ';';
            $headings   .= '}'.PHP_EOL;

            $header      = '';
            if ( !empty($options['opt_header_background']['url']) ) {
                $header     .= '#header-wrapper{';
                $header     .= 'background-image: url('.$options['opt_header_background']['url'].');';
                $header     .= 'background-position: center center;';
                $header     .= 'background-size: cover;';
                $header     .= 'background-repeat: repeat;';
                $header     .= '}'.PHP_EOL;
            }
            $header     .= '#header{';
            $hex         = $options['opt_header_overlay_color']['background-color'];
            $alpha       = $options['opt_header_overlay_alpha'];
            $rgba        = Redux_Helpers::hex2rgba( $hex, $alpha );
            $header     .= 'background-color:'.$rgba;
            $header     .= '}'.PHP_EOL;
            $header     .= '.navbar-wrapper > .navbar{';
            $hex         = '#ffffff';
            $alpha       = $options['opt_header_overlay_alpha'];
            $rgba        = Redux_Helpers::hex2rgba( $hex, $alpha );
            $header     .= 'background-color:'.$hex;
            $header     .= '}'.PHP_EOL;

            $logo_text   = '#header .logo .logo-text,#header .logo .logo-text a{';
            $logo_text  .= 'font-family:' .$options['opt_logo_text_typo']['font-family'] . ';';
            $logo_text  .= 'font-weight:' .$options['opt_logo_text_typo']['font-weight'] . ';';
            $logo_text  .= 'font-size:' .$options['opt_logo_text_typo']['font-size'] . ';';
            $logo_text  .= 'color:' .$options['opt_logo_text_typo']['color'] . ';';
            $logo_text  .= 'text-transform:' .$options['opt_logo_text_typo']['text-transform'] . ';';
            $logo_text  .= '}'.PHP_EOL;
            $logo_text  .= '#header.header-fixed .logo .logo-text,#header.header-fixed .logo .logo-text a{';
            $logo_text  .= 'font-family:' .$options['opt_logo_text_sticky_typo']['font-family'] . ';';
            $logo_text  .= 'font-weight:' .$options['opt_logo_text_sticky_typo']['font-weight'] . ';';
            $logo_text  .= 'font-size:' .$options['opt_logo_text_sticky_typo']['font-size'] . ';';
            $logo_text  .= 'color:' .$options['opt_logo_text_sticky_typo']['color'] . ';';
            $logo_text  .= 'text-transform:' .$options['opt_logo_text_sticky_typo']['text-transform'] . ';';
            $logo_text  .= '}'.PHP_EOL;
            $logo_text  .= '#header .logo .logo-tagline, #header .nav-search-bar #lnk-show-search, #header .nav-search-bar .navbar-toggle {';
            $logo_text  .= 'color:' .$options['opt_header_fore_color'] . ';';
            $logo_text  .= '}'.PHP_EOL;
            $logo_text  .= '#header .logo .logo-tagline {';
            $logo_text  .= 'border-left-color:' .$options['opt_header_fore_color'] . ';';
            $logo_text  .= '}'.PHP_EOL;
            $logo_text  .= '.rtl #header .logo .logo-tagline {';
            $logo_text  .= 'border-right-color:' .$options['opt_header_fore_color'] . ';';
            $logo_text  .= '}'.PHP_EOL;

            $nav         = '.nav-dropdown-menu{';
            $nav        .= 'font-family:' .$options['opt_menu_typography']['font-family'] . ';';
            $nav        .= 'font-weight:' .$options['opt_menu_typography']['font-weight'] . ';';
            $nav        .= 'font-size:' .$options['opt_menu_typography']['font-size'] . ';';
            $nav        .= 'text-transform:' .$options['opt_menu_typography']['text-transform'] . ';';
            $nav        .= '}'.PHP_EOL;

            $css         = $body;
            $css        .= $headings;
            $css        .= $header;
            $css        .= $logo_text;
            $css        .= $nav;
            
            $filename = INAFX_CHILD_DIR . '/assets/css/custom' . '.css';
            global $wp_filesystem;
            if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
                WP_Filesystem();
            }

            if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
            }

            require INAFX_PARENT_DIR . "/admin/framework/lessc.inc.php";
            
            $formatter = new lessc_formatter_classic;
            $formatter->indentChar = "\t";

            $less = new lessc;
            $less->setFormatter($formatter);
            $less->setFormatter("compressed");
            $less->setVariables(
                array(
                    'theme-base-color' => ( ( $options['opt_theme_preset_type'] == 'preset' ) ? $options['opt_theme_preset_color'] : $options['opt_theme_custom_color'] )
                )
            );
            $less->compileFile( INAFX_CHILD_DIR . '/assets/less/styles.less', INAFX_CHILD_DIR . '/assets/less/styles.css' );
            $less->compileFile( INAFX_CHILD_DIR . '/assets/less/fa-list.less', INAFX_CHILD_DIR . '/assets/less/fa-list.css' );
            $less->compileFile( INAFX_CHILD_DIR . '/assets/less/dropmenu.less', INAFX_CHILD_DIR . '/assets/less/dropmenu.css' );
        }

        public function setArguments() { 
            $theme = wp_get_theme(); // For use with some settings. Not necessary.
            $theme = preg_replace("/\W/", "_", strtolower($theme) );
            global $inafx_options_var;
            $inafx_options_var = INAFX_OPTIONS_SLUG_PREFIX . '_' . $theme;
            $this->args = array(
                'opt_name' => $inafx_options_var, //'inafx_options',
                'page_slug' => INAFX_OPTIONS_SLUG_PREFIX,
                'page_title' => theme_locals( 'opt_theme_options_page_title' ),
                'display_name' => theme_locals( 'opt_display_name' ),
                'display_version' => '1.0',
                'dev_mode' => '0',
                'update_notice' => '0',
                'footer_credit' => theme_locals( 'opt_footer_credits' ),
                //'intro_text' => '',
                //'footer_text' => '',
                'admin_bar' => 0,
                'menu_type' => 'menu',
                'menu_title' => theme_locals( 'opt_theme_options_menu_text' ),
                'allow_sub_menu' => false,
                'page_parent_post_type' => 'your_post_type',
                'customizer' => false,
                'default_show' => true,
                'google_api_key' => 'AIzaSyAqSth4WcSF1nwdnpt8FpAlFlqQymBbVRs',
                'hints' => 
                array(
                  'icon' => 'el-icon-question-sign',
                  'icon_position' => 'right',
                  'icon_size' => 'normal',
                  'tip_style' => 
                  array(
                    'color' => 'dark',
                    'shadow' => true,
                    'rounded' => true,
                    'style' => 'bootstrap'
                  ),
                  'tip_position' => 
                  array(
                    'my' => 'top left',
                    'at' => 'bottom right',
                  ),
                  'tip_effect' => 
                  array(
                    'show' => 
                    array(
                      'duration' => '500',
                      'event' => 'mouseover',
                    ),
                    'hide' => 
                    array(
                      'effect' => 'fade',
                      'duration' => '500',
                      'event' => 'mouseleave unfocus',
                    ),
                  ),
                ),
                'output' => '1',
                'output_tag' => '1',
                'compiler' => '1',
                'page_icon' => 'icon-themes',
                'page_permissions' => 'manage_options',
                'save_defaults' => '1',
                'show_import_export' => '1',
                'transient_time' => '3600',
                'network_sites' => '1',
                'class' => 'inafx', 
              );
        }

        public function setHelpTabs() {
            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'inafx-help-tab-1',
                'title'     => 'Theme Information 1',
                'content'   => '<p>This is the tab content, HTML is allowed.</p>'
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'inafx-help-tab-2',
                'title'     => 'Theme Information 2',
                'content'   => '<p>This is the tab content, HTML is allowed.</p>'
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = '<p>This is the sidebar content, HTML is allowed.</p>';
        }

        public function setSections() {
            $this->sections[] = array(
                'title'     => theme_locals( 'opt_general' ),
                'desc'      => theme_locals( 'opt_general_desc' ),
                'icon'      => 'fa fa-cogs',
                'fields'    => array(
                    array(
                        'id'                    => 'opt_body_background',
                        'type'                  => 'background',
                        'title'                 => theme_locals( 'opt_body_bg' ),
                        'subtitle'              => theme_locals( 'opt_body_bg_desc' ),
                        'transparent'           => false,
                        'preview'               => true,
                        'preview_media'         => true,
                        'compiler'              => true,
                        'default'               => array(
                            'background-repeat'     => 'repeat',
                            'background-attachment' => 'fixed',
                            'background-position'   => 'center center',
                            'background-size'       => 'cover',
                            'background-color'      => '#f7f7f7'
                        )
                    ),
                    array(
                        'id'        => 'opt_body_pattern',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => theme_locals( 'opt_body_bgpattern' ),
                        'subtitle'  => theme_locals( 'opt_body_bgpattern_desc' ),
                        'hint'      => array(
                                           'title' => theme_locals( 'opt_body_bgpattern_hint_title' ),
                                           'content' => theme_locals( 'opt_body_bgpattern_hint_desc' )
                                       ),
                        'width'     => '80',
                        'height'    => '80',
                        'options'   => array(
                            '0' => array('alt' => theme_locals( 'opt_body_bgpattern_alt0' ), 'img' => ReduxFramework::$_url . 'assets/img/pattern0.png'),
                            '1' => array('alt' => theme_locals( 'opt_body_bgpattern_alt1' ), 'img' => ReduxFramework::$_url . 'assets/img/pattern1.png'),
                            '2' => array('alt' => theme_locals( 'opt_body_bgpattern_alt2' ), 'img' => ReduxFramework::$_url . 'assets/img/pattern2.png'),
                            '3' => array('alt' => theme_locals( 'opt_body_bgpattern_alt3' ), 'img' => ReduxFramework::$_url . 'assets/img/pattern3.png'),
                            '4' => array('alt' => theme_locals( 'opt_body_bgpattern_alt4' ), 'img' => ReduxFramework::$_url . 'assets/img/pattern4.png'),
                            '5' => array('alt' => theme_locals( 'opt_body_bgpattern_alt5' ), 'img' => ReduxFramework::$_url . 'assets/img/pattern5.png'),
                            '6' => array('alt' => theme_locals( 'opt_body_bgpattern_alt6' ), 'img' => ReduxFramework::$_url . 'assets/img/pattern6.png')
                        ),
                        'default'   => '0'
                    ),
                    array(
                        'id'            => 'opt_body_typography',
                        'type'          => 'typography',
                        'title'         => theme_locals( 'opt_body_font' ),
                        'subtitle'      => theme_locals( 'opt_body_font_desc' ),
                        'google'        => true,
                        'subsets'       => false,
                        'line-height'   => false,
                        'compiler'      => true,
                        'default'   => array(
                            'color'         => '#4e4e4e',
                            'font-size'     => '14px',
                            'font-family'   => 'Raleway',
                            'font-weight'   => '400',
                            'line-height'   => '30px',
                            //'text-align'    => 'left'
                        ),
                    ),
                    array(
                        'id'            => 'opt_h1_heading',
                        'type'          => 'typography',
                        'title'         => theme_locals( 'opt_h1_font' ),
                        'subtitle'      => theme_locals( 'opt_h1_font_desc' ),
                        'google'        => true,
                        'subsets'       => false,
                        'line-height'   => false,
                        'compiler'      => true,
                        'default'   => array(
                            'color'         => '#222222',
                            'font-size'     => '40px',
                            'font-family'   => 'Raleway',
                            'font-weight'   => '700',
                            //'text-align'    => 'left'
                        ),
                    ),
                    array(
                        'id'        => 'opt_h2_heading',
                        'type'      => 'typography',
                        'title'         => theme_locals( 'opt_h2_font' ),
                        'subtitle'      => theme_locals( 'opt_h2_font_desc' ),
                        'google'    => true,
                        'subsets'   => false,
                        'line-height'   => false,
                        'compiler'      => true,
                        'default'   => array(
                            'color'         => '#222222',
                            'font-size'     => '36px',
                            'font-family'   => 'Raleway',
                            'font-weight'   => '700',
                            //'text-align'    => 'left'
                        ),
                    ),
                    array(
                        'id'        => 'opt_h3_heading',
                        'type'      => 'typography',
                        'title'         => theme_locals( 'opt_h3_font' ),
                        'subtitle'      => theme_locals( 'opt_h3_font_desc' ),
                        'google'    => true,
                        'subsets'   => false,
                        'line-height'   => false,
                        'compiler'      => true,
                        'default'   => array(
                            'color'         => '#222222',
                            'font-size'     => '32px',
                            'font-family'   => 'Raleway',
                            'font-weight'   => '700',
                            //'text-align'    => 'left'
                        ),
                    ),
                    array(
                        'id'        => 'opt_h4_heading',
                        'type'      => 'typography',
                        'title'         => theme_locals( 'opt_h4_font' ),
                        'subtitle'      => theme_locals( 'opt_h4_font_desc' ),
                        'google'    => true,
                        'subsets'   => false,
                        'line-height'   => false,
                        'compiler'      => true,
                        'default'   => array(
                            'color'         => '#222222',
                            'font-size'     => '28px',
                            'font-family'   => 'Raleway',
                            'font-weight'   => '700',
                            //'text-align'    => 'left'
                        ),
                    ),
                    array(
                        'id'        => 'opt_h5_heading',
                        'type'      => 'typography',
                        'title'         => theme_locals( 'opt_h5_font' ),
                        'subtitle'      => theme_locals( 'opt_h5_font_desc' ),
                        'google'    => true,
                        'subsets'   => false,
                        'line-height'   => false,
                        'compiler'      => true,
                        'default'   => array(
                            'color'         => '#222222',
                            'font-size'     => '24px',
                            'font-family'   => 'Raleway',
                            'font-weight'   => '700',
                            //'text-align'    => 'left'
                        ),
                    ),
                    array(
                        'id'        => 'opt_h6_heading',
                        'type'      => 'typography',
                        'title'         => theme_locals( 'opt_h6_font' ),
                        'subtitle'      => theme_locals( 'opt_h6_font_desc' ),
                        'google'    => true,
                        'subsets'   => false,
                        'line-height'   => false,
                        'compiler'      => true,
                        'default'   => array(
                            'color'         => '#222222',
                            'font-size'     => '20px',
                            'font-family'   => 'Raleway',
                            'font-weight'   => '700',
                            //'text-align'    => 'left'
                        ),
                    ),
                    array(
                        'id'        => 'opt_show_tagline',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_tagline' ),
                        'subtitle'  => theme_locals( 'opt_display_tagline_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_search',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_search' ),
                        'subtitle'  => theme_locals( 'opt_display_search_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_page_titles',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_page_titles' ),
                        'subtitle'  => theme_locals( 'opt_display_page_titles_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_homepage_titles',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_titles_home' ),
                        'subtitle'  => theme_locals( 'opt_display_titles_home_desc' ),
                        'default'   => false,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_breadcrumbs',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_breadcrumbs' ),
                        'subtitle'  => theme_locals( 'opt_display_breadcrumbs_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_enable_nicescroll',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_enable_nicescroll' ),
                        'subtitle'  => theme_locals( 'opt_enable_nicescroll_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_google_api_key',
                        'type'      => 'text',
                        'title'     => theme_locals( 'opt_google_api_key' ),
                        'subtitle'  => theme_locals( 'opt_google_api_key_desc' ),
                        'desc'      => theme_locals( 'opt_google_api_key_desc_2' ),
                    ),
               )
            );

            $this->sections[] = array(
                'title'     => theme_locals( 'opt_header_styles' ),
                'desc'      => theme_locals( 'opt_header_styles_desc' ),
                'icon'      => 'el-icon-adjust-alt fa-rotate-90',
                'fields'    => array(
                    array(
                        'id'        => 'opt_header_background',
                        'type'      => 'media',
                        'title'     => theme_locals( 'opt_header_bg' ),
                        'subtitle'  => theme_locals( 'opt_header_bg_desc' ),
                        'compiler'         => true,
                    ),
                    array(
                        'id'                    => 'opt_header_overlay_color',
                        'type'                  => 'background',
                        'title'                 => theme_locals( 'opt_header_overlay' ),
                        'subtitle'              => theme_locals( 'opt_header_overlay_desc' ),
                        'default'               => array(
                        'background-color'      => '#f2702f'
                        ),
                        'validate'              => 'color',
                        'transparent'           =>  false,
                        'background-image'      => false,
                        'background-position'   => false,
                        'background-repeat'     => false,
                        'background-attachment' => false,
                        'background-size'       => false,
                        'compiler'              => true,
                    ),
                    array(
                        'id'            => 'opt_header_overlay_alpha',
                        'type'          => 'slider',
                        'title'         => theme_locals( 'opt_header_transparency' ),
                        'subtitle'      => theme_locals( 'opt_header_transparency_desc' ),
                        'desc'          => theme_locals( 'opt_header_transparency_desc_2' ),
                        'default'       => 1,
                        'min'           => 0,
                        'step'          => .1,
                        'max'           => 1,
                        'resolution'    => 0.1,
                        'display_value' => 'text',
                        'compiler'      => true,
                    ),
                    array(
                        'id'            => 'opt_header_fore_color',
                        'type'          => 'color',
                        'title'         => theme_locals( 'opt_header_fore_color' ),
                        'subtitle'      => theme_locals( 'opt_header_fore_color_desc' ),
                        'default'       => '#ffffff',
                        'validate'      => 'color',
                        'transparent'   => false,
                        'compiler'      => true,
                    ),
                    array(
                        'id'        => 'opt_header_type',
                        'type'      => 'select',
                        'title'     => theme_locals( 'opt_header_type' ),
                        'subtitle'  => theme_locals( 'opt_header_type_desc' ),
                        'options'   => array(
                            '0' => theme_locals( 'opt_header_normal' ), 
                            '1' => theme_locals( 'opt_header_sticky' )
                        ),
                        'default'   => '1'
                    ),
                    array(
                        'id'        => 'opt_header_ephemera_enabled',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_header_ephemera' ),
                        'subtitle'  => theme_locals( 'opt_header_ephemera_desc' ),
                        'default'   => 'no',
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_header_ephemera_style',
                        'type'      => 'select',
                        'title'     => theme_locals( 'opt_header_ephemera_style' ),
                        'subtitle'  => theme_locals( 'opt_header_ephemera_style_desc' ),
                        'options'   => array(
                            'slideshow-1' => theme_locals( 'opt_header_ephemera_slideshow_1' ), 
                            'slideshow-2' => theme_locals( 'opt_header_ephemera_slideshow_2' )
                        ),
                        'default'   => 'slideshow-1'
                    ),
                    array(
                        'id'        => 'opt_header_ephemera_slideshow_interval',
                        'type'      => 'text',
                        'title'     => theme_locals( 'opt_header_ephemera_slide_interval' ),
                        'subtitle'  => theme_locals( 'opt_header_ephemera_slide_interval_desc' ),
                        'desc'      => theme_locals( 'opt_header_ephemera_slide_interval_desc_2' ),
                        'default'   => '5000'
                    ),
                    array(
                        'id'        => 'opt_header_ephemera_items',
                        'type'      => 'button_set',
                        'title'     => theme_locals( 'opt_header_ephemera_items' ),
                        'subtitle'  => theme_locals( 'opt_header_ephemera_items_desc' ),
                        'options'   => array(
                            'posts'        => theme_locals( 'opt_header_ephemera_items_posts' ),
                            'categories'   => theme_locals( 'opt_header_ephemera_items_categories' ),
                            'tags'         => theme_locals( 'opt_header_ephemera_items_tags' )
                        ),
                        'default'           => 'categories'
                    ),
                    array(
                        'id'        => 'opt_header_ephemera_posts',
                        'type'      => 'select',
                        'title'     => theme_locals( 'opt_header_ephemera_posts' ),
                        'subtitle'  => theme_locals( 'opt_header_ephemera_posts_desc' ),
                        'desc'      => theme_locals( 'opt_header_ephemera_posts_desc_2' ),
                        'multi'     => true,
                        'sortable'  => true,
                        'required'  => array( 'opt_header_ephemera_items', 'equals', 'posts' )
                    ),
                    array(
                        'id'        => 'opt_header_ephemera_categories',
                        'type'      => 'select',
                        'title'     => theme_locals( 'opt_header_ephemera_categories' ),
                        'subtitle'  => theme_locals( 'opt_header_ephemera_categories_desc' ),
                        'data'      => 'categories',
                        'multi'     => true,
                        'sortable'  => true,
                        'args'      => array( 'posts_per_page' => -1 ),
                        'select2'   => array( 'width'   => '300px' ),
                        'required'  => array( 'opt_header_ephemera_items', 'equals', 'categories' )
                    ),
                    array(
                        'id'        => 'opt_header_ephemera_categories_count',
                        'type'      => 'text',
                        'title'     => theme_locals( 'opt_header_ephemera_posts_count' ),
                        'subtitle'     => theme_locals( 'opt_header_ephemera_posts_count_desc' ),
                        'default'   => '5',
                        'required'  => array( 
                            array( 'opt_header_ephemera_items', 'equals', 'categories' )
                        )
                    ),
                    array(
                        'id'        => 'opt_header_ephemera_tags',
                        'type'      => 'select',
                        'title'     => theme_locals( 'opt_header_ephemera_tags' ),
                        'subtitle'  => theme_locals( 'opt_header_ephemera_tags_desc' ),
                        'data'      => 'tags',
                        'multi'     => true,
                        'sortable'  => true,
                        'args'      => array( 'posts_per_page' => -1 ),
                        'select2'   => array( 'width'   => '300px' ),
                        'required'  => array( 'opt_header_ephemera_items', 'equals', 'tags' )
                    ),
                    array(
                        'id'        => 'opt_header_ephemera_tags_count',
                        'type'      => 'text',
                        'title'     => theme_locals( 'opt_header_ephemera_posts_count' ),
                        'subtitle'     => theme_locals( 'opt_header_ephemera_posts_count_desc' ),
                        'default'   => '5',
                        'required'  => array( 
                            array( 'opt_header_ephemera_items', 'equals', 'tags' )
                        )
                    ),
                 )
            );

            $this->sections[] = array(
                'title'     => theme_locals( 'opt_theme_styles' ),
                'desc'      => theme_locals( 'opt_theme_styles_desc' ),
                'icon'      => 'el-icon-brush',
                'fields'    => array(
                    array(
                        'id'        => 'opt_theme_preset_type',
                        'type'      => 'button_set',
                        'title'     => theme_locals( 'opt_theme_preset_type' ),
                        'subtitle'  => theme_locals( 'opt_theme_preset_type_desc' ),
                        'compiler'  => true,
                        'options'   => array(
                            'preset' => theme_locals( 'opt_theme_preset_colors_type' ), 
                            'custom' => theme_locals( 'opt_theme_custom_colors_type' ), 
                        ),
                        'default'   => 'preset'
                    ),
                    array(
                        'id'        => 'opt_theme_preset_color',
                        'type'      => 'image_select',
                        'required'  => array( 'opt_theme_preset_type', 'equals', 'preset' ),
                        'compiler'  => true,
                        'title'     => theme_locals( 'opt_theme_preset_colors' ),
                        'subtitle'  => theme_locals( 'opt_theme_preset_colors_desc' ),
                        'width'     => '80',
                        'height'    => '80',
                        'options'   => array(
                            '#f2702f' => array('alt' => theme_locals( 'opt_theme_base_color_1' ), 'img' => ReduxFramework::$_url . 'assets/img/color1.png'),
                            '#37c5e5' => array('alt' => theme_locals( 'opt_theme_base_color_2' ), 'img' => ReduxFramework::$_url . 'assets/img/color2.png'),
                            '#e33dc0' => array('alt' => theme_locals( 'opt_theme_base_color_3' ), 'img' => ReduxFramework::$_url . 'assets/img/color3.png'),
                            '#9dd22f' => array('alt' => theme_locals( 'opt_theme_base_color_4' ), 'img' => ReduxFramework::$_url . 'assets/img/color4.png'),
                            '#f85593' => array('alt' => theme_locals( 'opt_theme_base_color_5' ), 'img' => ReduxFramework::$_url . 'assets/img/color5.png')
                        ),
                        'default'   => '#f2702f'
                    ),
                    array(
                        'id'        => 'opt_theme_custom_color',
                        'type'      => 'color',
                        'required'  => array( 'opt_theme_preset_type', 'equals', 'custom' ),
                        'title'     => theme_locals( 'opt_theme_custom_colors' ),
                        'subtitle'  => theme_locals( 'opt_theme_custom_colors_desc' ),
                        'compiler'  => true,
                        'transparent' => false,
                        'default'   => '#f2702f'
                    ),
                )
            );

            $this->sections[] = array(
                'title'     => theme_locals( 'opt_logo_favicon' ),
                'desc'      => theme_locals( 'opt_logo_favicon_desc' ),
                'icon'      => 'el-icon-bookmark',
                'fields'    =>  array (
                    array(
                        'id'        => 'opt_logo_type',
                        'type'      => 'button_set',
                        'title'     => theme_locals( 'opt_logo_type' ),
                        'subtitle'  => theme_locals( 'opt_logo_type_desc' ),
                        'desc'      => theme_locals( 'opt_logo_type_desc_2' ),
                        'compiler'  => true,
                        'options'   => array(
                            'image' => theme_locals( 'opt_logo_type_image' ), 
                            'text' => theme_locals( 'opt_logo_type_text' ), 
                        ),
                        'default'   => 'text'
                    ),
                    array(
                        'id'        => 'opt_logo_image',
                        'type'      => 'media',
                        'required'  => array('opt_logo_type', '=', 'image'),
                        'title'     => theme_locals( 'opt_logo_image' ),
                        'subtitle'  => theme_locals( 'opt_logo_image_desc' ),
                        'desc'      => theme_locals( 'opt_logo_image_desc_2' ),
                        'compiler'  => true,
                        'default'   => array(
                            'url'   => INAFX_PARENT_URL . '/assets/images/logo.png'
                        )
                    ),
                    array(
                        'id'        => 'opt_logo_text',
                        'type'      => 'text',
                        'required'      => array('opt_logo_type', '=', 'text'),
                        'title'     => theme_locals( 'opt_logo_text' ),
                        'subtitle'  => theme_locals( 'opt_logo_text_desc' ),
                        'compiler'  => true,
                        'default'   => theme_locals( 'opt_logo_text_default' ),
                    ),
                    array(
                        'id'            => 'opt_logo_text_typo',
                        'type'          => 'typography',
                        'required'      => array('opt_logo_type', '=', 'text'),
                        'title'         => theme_locals( 'opt_logo_typography_normal' ),
                        'subtitle'      => theme_locals( 'opt_logo_typography_normal_desc' ),
                        'google'        => true,
                        'line-height'   => false,
                        'subsets'       => false,
                        'text-transform'    =>true,
                        'compiler'      => true,
                        'text-align'    => false,
                        'default'   => array(
                            'color'         => '#ffffff',
                            'font-size'     => '36px',
                            'font-family'   => 'Raleway',
                            'font-weight'   => '700',
                            'text-align'    => 'center',
                            'text-transform' => 'none'
                        ),
                    ),
                    array(
                        'id'            => 'opt_logo_text_sticky_typo',
                        'type'          => 'typography',
                        'required'      => array('opt_logo_type', '=', 'text'),
                        'title'         => theme_locals( 'opt_logo_typography_sticky' ),
                        'subtitle'      => theme_locals( 'opt_logo_typography_sticky_desc' ),
                        'google'        => true,
                        'line-height'   => false,
                        'subsets'       => false,
                        'text-transform'    =>true,
                        'compiler'      => true,
                        'text-align'    => false,
                        'default'   => array(
                            'color'         => '#ffffff',
                            'font-size'     => '24px',
                            'font-family'   => 'Raleway',
                            'font-weight'   => '700',
                            'text-align'    => 'center',
                            'text-transform' => 'none'
                        ),
                    ),
                    array(
                        'id'        => 'opt_favicon',
                        'type'      => 'media',
                        'title'     => theme_locals( 'opt_favicon' ),
                        'subtitle'  => theme_locals( 'opt_favicon_desc' ),
                        'preview'               => true,
                        'preview_media'         => true,
                        'default'   => array(
                            'url'   => INAFX_PARENT_URL . '/assets/ico/favicon.png'
                        )
                    ),
                 )
            );

            $this->sections[] = array(
                'title'     => theme_locals( 'opt_navigation' ),
                'desc'      => theme_locals( 'opt_navigation_desc' ),
                'icon'      => 'fa fa-reorder',
                'fields'    => array(
                    array(
                        'id'                => 'opt_menu_typography',
                        'type'              => 'typography',
                        'title'             => theme_locals( 'opt_navigation_menu_typography' ),
                        'subtitle'          => theme_locals( 'opt_navigation_menu_typography_desc' ),
                        'google'            => true,
                        'text-transform'    => true,
                        'subsets'           => false,
                        'line-height'       => false,
                        'color'             => false,
                        'text-align'        => false,
                        'compiler'          => true,
                        'default'   => array(
                            'font-size'         => '18px',
                            'font-family'       => 'Raleway',
                            'font-weight'       => '300',
                            'text-transform'    => 'uppercase'
                        ),
                    ),
                )
            );

            $this->sections[] = array(
                'title'     => theme_locals( 'opt_blog' ),
                'desc'      => theme_locals( 'opt_blog_desc' ),
                'icon'      => 'fa fa-file-text-o',
                'fields'    => array(
                    array(
                        'id'        => 'opt_blog_home_title',
                        'type'      => 'text',
                        'title'     => theme_locals( 'opt_blog_home_title' ),
                        'subtitle'  => theme_locals( 'opt_blog_home_title_desc' ),
                        'default'   => theme_locals( 'opt_blog_home_title_default' ),
                    ),
                    array(
                        'id'        => 'opt_blog_pagination_type',
                        'type'      => 'button_set',
                        'title'     => theme_locals( 'opt_pagination_type' ),
                        'subtitle'  => theme_locals( 'opt_pagination_type_desc' ),
                        'desc'      => theme_locals( 'opt_pagination_type_desc_2' ),
                        'options'   => array(
                            'numbers'  => theme_locals( 'opt_pagination_page_numbers' ), 
                            'links'     => theme_locals( 'opt_pagination_next_prev_links' ), 
                        ),
                        'default'   => 'numbers'
                    ),
                    array(
                        'id'        => 'opt_show_related_posts',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_show_related_posts' ),
                        'subtitle'  => theme_locals( 'opt_show_related_posts_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_related_posts_title',
                        'type'      => 'text',
                        'required'  => array( 'opt_show_related_posts', '=', true ),
                        'title'     => theme_locals( 'opt_related_posts_title' ),
                        'subtitle'  => theme_locals( 'opt_related_posts_title_desc' ),
                        'default'   => theme_locals( 'opt_related_posts_title_default' ),
                    ),
                    array(
                        'id'        => 'opt_related_posts_count',
                        'type'      => 'text',
                        'required'  => array( 'opt_show_related_posts', '=', true ),
                        'title'     => theme_locals( 'opt_related_posts_count' ),
                        'subtitle'  => theme_locals( 'opt_related_posts_count_desc' ),
                        'default'   => '3',
                        'validate'  => 'numeric'
                    ),
                    array(
                        'id'        => 'opt_show_full_post',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_show_full_posts' ),
                        'subtitle'  => theme_locals( 'opt_show_full_posts_desc' ),
                        'default'   => false,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_readmore_button',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_show_readmore' ),
                        'subtitle'  => theme_locals( 'opt_show_readmore_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_readmore_button_text',
                        'type'      => 'text',
                        'required'  => array( 'opt_show_readmore_button', '=', true ),
                        'title'     => theme_locals( 'opt_readmore_text' ),
                        'subtitle'  => theme_locals( 'opt_readmore_text_desc' ),
                        'default'   => theme_locals( 'opt_readmore_text_default' ),
                    ),
                    array(
                        'id'        => 'opt_excerpt_words_limit',
                        'type'      => 'text',
                        'title'     => theme_locals( 'opt_excerpt_words_limit' ),
                        'subtitle'  => theme_locals( 'opt_excerpt_words_limit_desc' ),
                        'default'   => '150',
                        'validate'  => 'numeric'
                    ),
                    array(
                        'id'        => 'opt_show_author_bio',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_show_author_bio' ),
                        'subtitle'  => theme_locals( 'opt_show_author_bio_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_post_meta',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_show_post_meta' ),
                        'subtitle'  => theme_locals( 'opt_show_post_meta_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_post_format_icon',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_show_post_type_icon' ),
                        'subtitle'  => theme_locals( 'opt_show_post_type_icon_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_post_author',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_show_post_author' ),
                        'subtitle'  => theme_locals( 'opt_show_post_author_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_post_author_text',
                        'type'      => 'text',
                        'required'  => array( 'opt_show_post_author', '=', true ),
                        'title'     => theme_locals( 'opt_post_author_prefix_text' ),
                        'subtitle'  => theme_locals( 'opt_post_author_prefix_text_desc' ),
                        'default'   => theme_locals( 'opt_post_author_prefix_text_default' ),
                    ),
                    array(
                        'id'        => 'opt_show_post_date_published',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_show_post_date_published' ),
                        'subtitle'  => theme_locals( 'opt_show_post_date_published_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_post_date_format',
                        'type'      => 'text',
                        'required'  => array( 'opt_show_post_date_published', '=', true ),
                        'title'     => theme_locals( 'opt_post_date_format' ),
                        'subtitle'  => theme_locals( 'opt_post_date_format_desc' ),
                        'desc'      => theme_locals( 'opt_post_date_format_desc_2' ),
                        'default'   => 'F j, Y',
                    ),
                    array(
                        'id'        => 'opt_show_post_categories',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_show_post_categories' ),
                        'subtitle'  => theme_locals( 'opt_show_post_categories_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_post_tags',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_show_post_tags' ),
                        'subtitle'  => theme_locals( 'opt_show_post_tags_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_post_comments_meta',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_show_post_comments_count' ),
                        'subtitle'  => theme_locals( 'opt_show_post_comments_count_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                )
            );

            $this->sections[] = array(
                'title'     => theme_locals( 'opt_social_networks' ),
                'desc'      => theme_locals( 'opt_social_networks_desc' ),
                'icon'      => 'fa fa-share-alt',
                'fields'    =>  array(
                    array(
                        'id'        => 'opt_show_author_social_icons',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_author_social_icons' ),
                        'subtitle'  => theme_locals( 'opt_display_author_social_icons_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_post_social_share',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_post_social_icons' ),
                        'subtitle'  => theme_locals( 'opt_display_post_social_icons_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_social_facebook',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_facebook_icon' ),
                        'subtitle'  => theme_locals( 'opt_display_facebook_icon_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_social_twitter',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_twitter_icon' ),
                        'subtitle'  => theme_locals( 'opt_display_twitter_icon_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_social_googleplus',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_google_plus_icon' ),
                        'subtitle'  => theme_locals( 'opt_display_google_plus_icon_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_social_digg',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_digg_icon' ),
                        'subtitle'  => theme_locals( 'opt_display_digg_icon_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_social_reddit',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_reddit_icon' ),
                        'subtitle'  => theme_locals( 'opt_display_reddit_icon_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_social_linkedin',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_linkedin_icon' ),
                        'subtitle'  => theme_locals( 'opt_display_linkedin_icon_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_social_pinterest',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_pinterest_icon' ),
                        'subtitle'  => theme_locals( 'opt_display_pinterest_icon_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_social_stumbleupon',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_stumbleupon_icon' ),
                        'subtitle'  => theme_locals( 'opt_display_stumbleupon_icon_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_social_delicious',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_delicious_icon' ),
                        'subtitle'  => theme_locals( 'opt_display_delicious_icon_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                    array(
                        'id'        => 'opt_show_social_mail',
                        'type'      => 'switch',
                        'title'     => theme_locals( 'opt_display_mail_icon' ),
                        'subtitle'  => theme_locals( 'opt_display_mail_icon_desc' ),
                        'default'   => true,
                        'on'        => theme_locals( 'opt_yes' ),
                        'off'       => theme_locals( 'opt_no' )
                    ),
                )
            );

            $this->sections[] = array(
                'title'     => theme_locals( 'opt_footer' ),
                'desc'      => theme_locals( 'opt_footer_desc' ),
                'icon'      => 'fa fa-indent',
                'fields'    => array(
                    array(
                        'id'        => 'opt_footer_copyright',
                        'type'      => 'textarea',
                        'title'     => theme_locals( 'opt_footer_copyright_text' ),
                        'subtitle'  => theme_locals( 'opt_footer_copyright_text_desc' ),
                        'validate'  => 'html',
                        'default'   => theme_locals( 'opt_footer_copyright_text_default' )
                    ),
                    array(
                        'id'        => 'opt_google_analytics',
                        'type'      => 'textarea',
                        'title'     => theme_locals( 'opt_google_analytics' ),
                        'subtitle'  => theme_locals( 'opt_google_analytics_desc' ),
                    ),
                )
            );

            $this->sections[] = array(
                'title'     => theme_locals( 'opt_contact_form' ),
                'desc'      => theme_locals( 'opt_contact_form_desc' ),
                'icon'      => 'fa fa-envelope',
                'fields'    => array(
                    array(
                        'id'        => 'opt_contactform_mailto',
                        'type'      => 'text',
                        'title'     => theme_locals( 'opt_contact_mailto' ),
                        'subtitle'  => theme_locals( 'opt_contact_mailto_desc' ),
                        'validate'  => 'email',
                        'default'   => get_option( 'admin_email' )
                    ),
                    array(
                        'id'        => 'opt_contactform_subject',
                        'type'      => 'text',
                        'title'     => theme_locals( 'opt_contact_subject_line' ),
                        'subtitle'  => theme_locals( 'opt_contact_subject_line_desc' ),
                        'default'   => theme_locals( 'opt_contact_subject_line_default' )
                    ),
                    array(
                        'id'        => 'opt_contactform_success',
                        'type'      => 'textarea',
                        'title'     => theme_locals( 'opt_contact_success_message' ),
                        'subtitle'  => theme_locals( 'opt_contact_success_message_desc' ),
                        'default'   => theme_locals( 'opt_contact_success_message_default' )

                    ),
                    array(
                        'id'        => 'opt_contactform_failure',
                        'type'      => 'textarea',
                        'title'     => theme_locals( 'opt_contact_error_message' ),
                        'subtitle'  => theme_locals( 'opt_contact_error_message_desc' ),
                        'default'   => theme_locals( 'opt_contact_error_message_default' )
                    )
                )
            );

            $this->sections[] = array(
                'title'     => theme_locals( 'opt_404_page' ),
                'desc'      =>  theme_locals( 'opt_404_page_desc' ),
                'icon'      => 'el-icon-website',
                'fields'    => array(
                    array(
                        'id'        => 'opt_404_background',
                        'type'      => 'media',
                        'title'     => theme_locals( 'opt_404_page_bg' ),
                        'subtitle'  => theme_locals( 'opt_404_page_bg_desc' ),
                        'preview'               => true,
                        'preview_media'         => true,
                        'default'   => array(
                            'url'   => INAFX_PARENT_URL . '/assets/images/404.jpg'
                        )
                    ),
                    array(
                        'id'            => 'opt_404_overlay_color',
                        'type'          => 'color',
                        'title'         => theme_locals( 'opt_404_bg_overlay' ),
                        'subtitle'      => theme_locals( 'opt_404_bg_overlay_desc' ),
                        'default'       => '#000000',
                        'validate'      => 'color',
                        'transparent'   =>  false
                    ),
                    array(
                        'id'            => 'opt_404_overlay_alpha',
                        'type'          => 'slider',
                        'title'         => theme_locals( 'opt_404_bg_overlay_transparency' ),
                        'subtitle'      => theme_locals( 'opt_404_bg_overlay_transparency_desc' ),
                        'desc'          => theme_locals( 'opt_404_bg_overlay_transparency_desc_2' ),
                        'default'       => .8,
                        'min'           => 0,
                        'step'          => .1,
                        'max'           => 1,
                        'resolution'    => 0.1,
                        'display_value' => 'text'
                    ),
                    array(
                        'id'        => 'opt_404_title_1',
                        'type'      => 'text',
                        'title'     => theme_locals( 'opt_404_title_line_1' ),
                        'subtitle'  => theme_locals( 'opt_404_title_line_1_desc' ),
                        'default'   => theme_locals( 'opt_404_title_line_1_default' ),
                    ),
                    array(
                        'id'        => 'opt_404_typo_title_1',
                        'type'      => 'typography',
                        'title'     => theme_locals( 'opt_404_title_line_1_font' ),
                        'subtitle'  => theme_locals( 'opt_404_title_line_1_font_desc' ),
                        'google'    => true,
                        'default'   => array(
                            'color'         => '#000',
                            'font-size'     => '30px',
                            'font-family'   => 'Arial,Helvetica,sans-serif',
                            'font-weight'   => 'Normal',
                        ),
                    ),
                    array(
                        'id'        => 'opt_404_title_2',
                        'type'      => 'text',
                        'title'     => theme_locals( 'opt_404_title_line_2' ),
                        'subtitle'  => theme_locals( 'opt_404_title_line_2_desc' ),
                        'default'   => theme_locals( 'opt_404_title_line_2_default' ),
                    ),
                    array(
                        'id'        => 'opt_404_typo_title_2',
                        'type'      => 'typography',
                        'title'     => theme_locals( 'opt_404_title_line_2_font' ),
                        'subtitle'  => theme_locals( 'opt_404_title_line_2_font_desc' ),
                        'google'    => true,
                        'default'   => array(
                            'color'         => '#000',
                            'font-size'     => '30px',
                            'font-family'   => 'Arial,Helvetica,sans-serif',
                            'font-weight'   => 'Normal',
                        ),
                    ),
                ),
            ); 

            $this->sections[] = array(
                'title'     => theme_locals( 'opt_import_export' ),
                'desc'      =>  theme_locals( 'opt_import_export_desc' ),
                'icon'      => 'el-icon-refresh fa-rotate-90',
                'fields'    => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'full_width'    => false,
                    ),
                ),
            );  
        }
    }

    global $reduxConfig;
    $reduxConfig = new inafx_options_config();
}
?>