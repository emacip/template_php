<?php
/*************************************************************************
Plugin Name:  Unattach
Plugin URI:   http://outlandishideas.co.uk/blog/2011/03/unattach/
Description:  Allows detaching images and other media from posts, pages and other content types.
Version:      1.0.1
Author:       tamlyn
**************************************************************************/

//filter to add button to media library UI
function unattach_media_row_action( $actions, $post ) {
	if ($post->post_parent) {
		$url = admin_url('themes.php?page=unattach&noheader=true&id=' . $post->ID . ( !empty($_REQUEST['paged']) ? '&paged=' . $_REQUEST['paged'] : '' ));
		$actions['unattach'] = '<a href="' . esc_url( $url ) . '" title="'. theme_locals( 'unattach_link_title' ) .'">'. theme_locals( 'unattach_link_text' ) .'</a>';
	}

	return $actions;
}

//action to set post_parent to 0 on attachment
function unattach_do_it() {
	global $wpdb;
	
	if (!empty($_REQUEST['id'])) {
		$wpdb->update($wpdb->posts, array('post_parent'=>0), array('id'=>$_REQUEST['id'], 'post_type'=>'attachment'));
	}
	
	wp_redirect(admin_url('upload.php' . ( !empty($_REQUEST['paged']) ? '?paged=' . $_REQUEST['paged'] : '' )));
	exit;
}

//set it up
add_action( 'admin_menu', 'unattach_init' );
function unattach_init() {
	if ( current_user_can( 'upload_files' ) ) {
		add_filter('media_row_actions',  'unattach_media_row_action', 10, 2);
		add_theme_page('Unattach Media', 'Unattach', 'upload_files', 'unattach', 'unattach_do_it');
		remove_submenu_page('themes.php', 'unattach');
	}
}

?>