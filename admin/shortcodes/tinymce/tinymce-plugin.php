<?php
if ( !class_exists('Inafx_TinyMCE_Shortcodes') ) {
    /**
    * Class Name: class Inafx_TinyMCE_Shortcodes 
    * Description: It contains functions for loading shortcodes in TinyMCE WYSIWYG editor.
    * Author: INA Brains
    */
	class Inafx_TinyMCE_Shortcodes {

        var $plugin_name    = 'inafx_shortcodes';       // shortcodes plugin name
        var $plugin_url     = '';                       // plugin url

        /**
        * Inafx_TinyMCE_Shortcodes class construction.
        *
        * @see Inafx_TinyMCE_Shortcodes()
        */
		function Inafx_TinyMCE_Shortcodes() {
			add_action( 'admin_init', array( $this, 'init' ) );

            $this->plugin_url = get_template_directory_uri();

			add_action( 'wp_ajax_inafx_check_url_action', array( $this, 'ajax_action_check_url' ) );
			add_action( 'wp_ajax_inafx_shortcodes_nonce', array( $this, 'ajax_action_generate_nonce' ) );
		}

        /**
        * Method to add wp filters for loading tinymce jQuery plugin script and CSS file
        *
        * @see init()
        */
		function init() {
			global $pagenow;

			if ( ( current_user_can( 'edit_posts' ) || current_user_can( 'edit_pages' ) ) && get_user_option( 'rich_editing' ) == 'true' && ( in_array( $pagenow, array( 'post.php', 'post-new.php', 'page-new.php', 'page.php' ) ) ) )  {

				add_filter( 'mce_buttons', array( $this, 'filter_mce_buttons' ) );
				add_filter( 'mce_external_plugins', array( $this, 'filter_mce_external_plugins' ) );

				wp_enqueue_style( 'tinymce-shortcodes', $this->plugin_url . '/admin/shortcodes/tinymce/css/tinymce-shortcodes.css', false );
			}
		}

        /**
        * Method to add shortcodes plugin button to tinymce's buttons.
        *
        * @see filter_mce_buttons( $buttons )
        *
        * @param  array $buttons as array of tinymce buttons.
        * @return  array $buttons updated by adding shortcodes button.
        */
		function filter_mce_buttons( $buttons ) {
			array_push( $buttons, '|',  $this->plugin_name );
			return $buttons;
		}

        /**
        * Method to add shortcodes plugin to tinymce.
        *
        * @see filter_mce_external_plugins( $plugin_array )
        *
        * @param  array $plugin_array as array of external plugins of tinymce .
        * @return  array $plugin_array updated by adding shortcodes plugin.
        */
		function filter_mce_external_plugins( $plugin_array ) {
            $plugin_array[ $this->plugin_name ] = $this->plugin_url . '/admin/shortcodes/tinymce/js/tinymce-shortcodes.js' ;
            return $plugin_array;
		}

        /**
        * Method to check whether plugin URL exists or not.
        *
        * @see ajax_action_check_url()
        */
		function ajax_action_check_url() {
			$hadError = true;

			$url = isset( $_REQUEST['url'] ) ? $_REQUEST['url'] : '';

			if ( strlen( $url ) > 0  && function_exists( 'get_headers' ) ) {
				$url          = esc_url( $url );
				$file_headers = @get_headers( $url );
				$exists       = $file_headers && $file_headers[0] != 'HTTP/1.1 404 Not Found';
				$hadError     = false;
			}

			echo '{ "exists": '. ($exists ? '1' : '0') . ($hadError ? ', "error" : 1 ' : '') . ' }';
			die();
		}

        /**
        * Method to generate nonce for shortcodes plugin.
        *
        * @see ajax_action_generate_nonce()
        */
		function ajax_action_generate_nonce() {
			echo wp_create_nonce( 'inafx-tinymce-shortcodes' );
			die();
		}
	}
	$inafx_tinymce_shortcodes = new Inafx_TinyMCE_Shortcodes();
} 
?>