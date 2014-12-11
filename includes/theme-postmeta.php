<?php
// prefix for meta box ids
$meta_prefix = 'inafx';

// meta box information for quote post
$inafx_meta_box_quote = array(
	'id' => $meta_prefix.'-meta-box-quote',
	'title' =>  theme_locals( 'metabox_quote_settings' ),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => theme_locals( 'metabox_quote_text' ),
				"desc" => theme_locals( 'metabox_quote_text_desc' ),
				"id" => $meta_prefix."_quote",
				"type" => "textarea",
				"std" => ""
			),
		array( "name" => theme_locals( 'metabox_quote_author' ),
				"desc" => theme_locals( 'metabox_quote_author_desc' ),
				"id" => $meta_prefix."_author_quote",
				"type" => "text",
				"std" => ""
			)
	)
);    

// meta box information for link post
$inafx_meta_box_link = array(
	'id' => $meta_prefix.'-meta-box-link',
	'title' =>  theme_locals( 'metabox_link_settings' ),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => theme_locals( 'metabox_link_url' ),
				"desc" => theme_locals( 'metabox_link_url_desc' ),
				"id" => $meta_prefix."_link_url",
				"type" => "text",
				"std" => ""
			),
		array( "name" => theme_locals( 'metabox_link_text' ),
				"desc" => theme_locals( 'metabox_link_text_desc' ),
				"id" => $meta_prefix."_link_text",
				"type" => "text",
				"std" => ""
			)
	)
);

// meta box information for gallery post
$inafx_meta_box_gallery = array(
	'id' => $meta_prefix.'-meta-box-gallery',
	'title' =>  theme_locals( 'metabox_gallery_settings' ),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => theme_locals( 'metabox_gallery_type' ),
				"desc" => theme_locals( 'metabox_gallery_type_desc' ),
				"id" => $meta_prefix."_gallery_format",
				"type" => "select",
				"std" => "== set slideshow type ==",
				"options" => array( theme_locals( 'metabox_gallery_type_0' ), theme_locals( 'metabox_gallery_type_1' ), theme_locals( 'metabox_gallery_type_2' ) )
			),
		array( "name" => theme_locals( 'metabox_gallery_grid_height' ),
				"desc" => theme_locals( 'metabox_gallery_grid_height_desc' ),
				"id" => $meta_prefix."_gallery_targetheight",
				"type" => "text",
				"std" => "200"
			),
		array( "name" => theme_locals( 'metabox_gallery_grid_margins' ),
				"desc" => theme_locals( 'metabox_gallery_grid_margins_desc' ),
				"id" => $meta_prefix."_gallery_margins",
				"type" => "text",
				"std" => "10"
			)
	)
);

// meta box information for audio post
$inafx_meta_box_audio = array(
	'id' => $meta_prefix.'-meta-box-audio',
	'title' =>  theme_locals( 'metabox_audio_settings' ),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => theme_locals( 'metabox_audio_embed' ),
				"desc" => theme_locals( 'metabox_audio_embed_desc' ),
				"id" => $meta_prefix."_audio_embed",
				"type" => "textarea",
				"std" => ""
			)
	)
);

// meta box information for video post
$inafx_meta_box_video = array(
	'id' => $meta_prefix.'-meta-box-video',
	'title' =>  theme_locals( 'metabox_video_settings' ),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( "name" => theme_locals( 'metabox_video_embed' ),
				"desc" => theme_locals( 'metabox_video_embed_desc' ),
				"id" => $meta_prefix."_video_embed",
				"type" => "text",
				"std" => ""
			)
		)
);


// function add meta boxes for the posts
function inafx_add_meta_boxes() {
    global $meta_prefix, $inafx_meta_box_quote, $inafx_meta_box_link, $inafx_meta_box_gallery, $inafx_meta_box_audio, $inafx_meta_box_video;

	add_meta_box($inafx_meta_box_quote['id'], $inafx_meta_box_quote['title'], $meta_prefix . '_show_box_quote', $inafx_meta_box_quote['page'], $inafx_meta_box_quote['context'], $inafx_meta_box_quote['priority']);
	add_meta_box($inafx_meta_box_link['id'], $inafx_meta_box_link['title'], $meta_prefix . '_show_box_link', $inafx_meta_box_link['page'], $inafx_meta_box_link['context'], $inafx_meta_box_link['priority']);
	add_meta_box($inafx_meta_box_gallery['id'], $inafx_meta_box_gallery['title'], $meta_prefix . '_show_box_gallery', $inafx_meta_box_gallery['page'], $inafx_meta_box_gallery['context'], $inafx_meta_box_gallery['priority']);
	add_meta_box($inafx_meta_box_audio['id'], $inafx_meta_box_audio['title'], $meta_prefix . '_show_box_audio', $inafx_meta_box_audio['page'], $inafx_meta_box_audio['context'], $inafx_meta_box_audio['priority']);
	add_meta_box($inafx_meta_box_video['id'], $inafx_meta_box_video['title'], $meta_prefix . '_show_box_video', $inafx_meta_box_video['page'], $inafx_meta_box_video['context'], $inafx_meta_box_video['priority']);
}
add_action( 'add_meta_boxes', 'inafx_add_meta_boxes' );

// loads the meta box template for quote post 
function inafx_show_box_quote() {
    global $meta_prefix, $inafx_meta_box_quote, $post;

    echo '<input type="hidden" name="'. $meta_prefix .'_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	echo '<table class="form-table">';
 
	foreach ($inafx_meta_box_quote['fields'] as $field) {
		
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
			case 'text':	
			echo '<tr>',
				'<th><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" class="large-text" />';
            echo '<p class="description">'. $field['desc'] . '</p>';
            echo '</td>';
            echo '</tr>';
			break;
			
			case 'textarea':		
			echo '<tr>',
				'<th><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" rows="8" cols="5" class="large-text">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
            echo '<p class="description">'. $field['desc'] . '</p>';
            echo '</td>';
            echo '</tr>';
			break;
		}
	}
 
	echo '</table>';
}

// loads the meta box template for link post
function inafx_show_box_link() {
    global $meta_prefix, $inafx_meta_box_link, $post;

    echo '<input type="hidden" name="'. $meta_prefix .'_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	echo '<table class="form-table">';
 
	foreach ($inafx_meta_box_link['fields'] as $field) {
		
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
			case 'text':		
			echo '<tr>',
				 '<th><label for="', $field['id'], '">', $field['name'], '</label></th>',
				 '<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" class="large-text" />';
            echo '<p class="description">' . $field['desc'] . '</p>';
            echo '</td>';
            echo '</tr>';
			break;
		}
	}
 
	echo '</table>';
}

// loads the meta box template for gallery post
function inafx_show_box_gallery() {
	global $meta_prefix, $inafx_meta_box_gallery, $post;

	echo '<input type="hidden" name="'. $meta_prefix .'_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($inafx_meta_box_gallery['fields'] as $field) {
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
			case 'text':			
			echo '<tr>',
				'<th><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" class="large-text" />';
            echo '<p class="description">'. $field['desc'] .'</p>';
            echo '</td>';
            echo '</tr>';
			break;
				
			case 'textarea':			
			echo '<tr>',
				'<th><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" rows="8" cols="5" class="large-text">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
            echo '<p class="description">'. $field['desc'] .'</p>';
            echo '</td>';
            echo '</tr>';
			break;
			
			case 'select':
				echo '<tr>',
				'<th><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
			
				echo'<select name="'.$field['id'].'" class="postform">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				echo'</select>';
                echo '<p class="description">'. $field['desc'] .'</p>';
                echo '</td>';
                echo '</tr>';
			break;
		}
	}
 
	echo '</table>';
}

// loads the meta box template for audio post
function inafx_show_box_audio() {
    global $meta_prefix, $inafx_meta_box_audio, $post;

    echo '<input type="hidden" name="'. $meta_prefix .'_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	echo '<table class="form-table">';
 
	foreach ($inafx_meta_box_audio['fields'] as $field) {
		
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
			case 'text':	
			echo '<tr>',
				'<th><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" class="large-text" />';
            echo '<p class="description">'. $field['desc'] .'</p>';
            echo '</td>';
            echo '</tr>';
			break;
			
			case 'textarea':		
			echo '<tr>',
				'<th><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" rows="8" cols="5" class="large-text">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
            echo '<p class="description">'. $field['desc'] .'</p>';
            echo '</td>';
            echo '</tr>';
			break;
		}
	}
 
	echo '</table>';
}

// loads the meta box template for video post
function inafx_show_box_video() {
    global $meta_prefix, $inafx_meta_box_video, $post;

    echo '<input type="hidden" name="'. $meta_prefix .'_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	echo '<table class="form-table">';
 
	foreach ($inafx_meta_box_video['fields'] as $field) {
		
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
			case 'text':	
			echo '<tr>',
				'<th><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" class="large-text" />';
            echo '<p class="description">'. $field['desc'] .'</p>';
            echo '</td>';
            echo '</tr>';
			break;
			
			case 'textarea':		
			echo '<tr>',
				'<th><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" rows="8" cols="5" class="large-text">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
            echo '<p class="description">'. $field['desc'] .'</p>';
            echo '</td>';
            echo '</tr>';
			break;
		}
	}
 
	echo '</table>';
}


// function to save the meta box fields information of post
function inafx_save_data($post_id) {
	global $meta_prefix, $inafx_meta_box_quote, $inafx_meta_box_link, $inafx_meta_box_gallery, $inafx_meta_box_audio, $inafx_meta_box_video;
 
	// verify nonce
	if (!isset($_POST[$meta_prefix.'_meta_box_nonce']) || !wp_verify_nonce($_POST[$meta_prefix.'_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	foreach ($inafx_meta_box_quote['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
	foreach ($inafx_meta_box_link['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

	
	foreach ($inafx_meta_box_gallery['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];

		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'],stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
    
    	
	foreach ($inafx_meta_box_audio['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'],stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
	
	foreach ($inafx_meta_box_video['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}
add_action('save_post', 'inafx_save_data');
?>