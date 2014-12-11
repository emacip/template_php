<?php 
/**
 * Retrieve Author's social profile meta info.
 *
 * @see inafx_show_social_profile_fields( $user )
 *
 * @param  object $user for passing the current user object.
 */
function inafx_show_social_profile_fields( $user ) { ?>
    <!-- ## social info title ## -->
	<h3><?php theme_locals( 'author_social_info' ); ?></h3>
    <!-- ## form-table start ## -->
	<table class="form-table">
		<tr>
            <!-- ## facebook info ## -->
			<th><label for="facebook"><?php echo theme_locals( 'facebook_url' ); ?></label></th>
			<td>
				<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## twitter info ## -->
			<th><label for="twitter"><?php echo theme_locals( 'twitter_url' ); ?></label></th>
			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## google+ info ## -->
			<th><label for="google-plus"><?php echo theme_locals( 'google_plus_url' ); ?></label></th>
			<td>
				<input type="text" name="google-plus" id="google-plus" value="<?php echo esc_attr( get_the_author_meta( 'google-plus', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## pinterest info ## -->
			<th><label for="pinterest"><?php echo theme_locals( 'pinterest_url' ); ?></label></th>
			<td>
				<input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## linkedin info ## -->
			<th><label for="linkedin"><?php echo theme_locals( 'linkedin_url' ); ?></label></th>
			<td>
				<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## youtube info ## -->
			<th><label for="youtube"><?php echo theme_locals( 'youtube_url' ); ?></label></th>
			<td>
				<input type="text" name="youtube" id="youtube" value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## vimeo info ## -->
			<th><label for="vimeo"><?php echo theme_locals( 'vimeo_url' ); ?></label></th>
			<td>
				<input type="text" name="vimeo" id="vimeo" value="<?php echo esc_attr( get_the_author_meta( 'vimeo', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## skype info ## -->
			<th><label for="skype"><?php echo theme_locals( 'skype_url' ); ?></label></th>
			<td>
				<input type="text" name="skype" id="skype" value="<?php echo esc_attr( get_the_author_meta( 'skype', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## instagram info ## -->
			<th><label for="instagram"><?php echo theme_locals( 'instagram_url' ); ?></label></th>
			<td>
				<input type="text" name="instagram" id="instagram" value="<?php echo esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## flickr info ## -->
			<th><label for="flickr"><?php echo theme_locals( 'flickr_url' ); ?></label></th>
			<td>
				<input type="text" name="flickr" id="flickr" value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## dribbble info ## -->
			<th><label for="dribbble"><?php echo theme_locals( 'dribbble_url' ); ?></label></th>
			<td>
				<input type="text" name="dribbble" id="dribbble" value="<?php echo esc_attr( get_the_author_meta( 'dribbble', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## behance info ## -->
			<th><label for="behance"><?php echo theme_locals( 'behance_url' ); ?></label></th>
			<td>
				<input type="text" name="behance" id="behance" value="<?php echo esc_attr( get_the_author_meta( 'behance', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## deviantArt info ## -->
			<th><label for="deviantart"><?php echo theme_locals( 'deviantart_url' ); ?></label></th>
			<td>
				<input type="text" name="deviantart" id="deviantart" value="<?php echo esc_attr( get_the_author_meta( 'deviantart', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## githun info ## -->
			<th><label for="github"><?php echo theme_locals( 'github_url' ); ?></label></th>
			<td>
				<input type="text" name="github" id="github" value="<?php echo esc_attr( get_the_author_meta( 'github', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## stumbleupon info ## -->
			<th><label for="stumbleupon"><?php echo theme_locals( 'stumbleupon_url' ); ?></label></th>
			<td>
				<input type="text" name="stumbleupon" id="stumbleupon" value="<?php echo esc_attr( get_the_author_meta( 'stumbleupon', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## reddit info ## -->
			<th><label for="reddit"><?php echo theme_locals( 'reddit_url' ); ?></label></th>
			<td>
				<input type="text" name="reddit" id="reddit" value="<?php echo esc_attr( get_the_author_meta( 'reddit', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## delicious info ## -->
			<th><label for="delicious"><?php echo theme_locals( 'delicious_url' ); ?></label></th>
			<td>
				<input type="text" name="delicious" id="delicious" value="<?php echo esc_attr( get_the_author_meta( 'delicious', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## soundcloud info ## -->
			<th><label for="soundcloud"><?php echo theme_locals( 'soundcloud_url' ); ?></label></th>
			<td>
				<input type="text" name="soundcloud" id="soundcloud" value="<?php echo esc_attr( get_the_author_meta( 'soundcloud', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## spotify info ## -->
			<th><label for="spotify"><?php echo theme_locals( 'spotify_url' ); ?></label></th>
			<td>
				<input type="text" name="spotify" id="spotify" value="<?php echo esc_attr( get_the_author_meta( 'spotify', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
		<tr>
            <!-- ## rss feed ## -->
			<th><label for="rssfeed"><?php echo theme_locals( 'rss_feed_url' ); ?></label></th>
			<td>
				<input type="text" name="rssfeed" id="rssfeed" value="<?php echo esc_attr( get_the_author_meta( 'rssfeed', $user->ID ) ); ?>" class="regular-text" /><br />
			</td>
		</tr>
	</table>
    <!-- ## form-table end ## -->
<?php } ?>
<?php
add_action( 'show_user_profile', 'inafx_show_social_profile_fields' );
add_action( 'edit_user_profile', 'inafx_show_social_profile_fields' );
    
/**
 * Save Author's social profile info.
 *
 * @see inafx_save_social_profile_fields( $user_id )
 *
 * @param  integer $user_id for passing the user id.
 */
function inafx_save_social_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

    update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
	update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
    update_user_meta( $user_id, 'google-plus', $_POST['google-plus'] );
    update_user_meta( $user_id, 'pinterest', $_POST['pinterest'] );
    update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
    update_user_meta( $user_id, 'youtube', $_POST['youtube'] );
    update_user_meta( $user_id, 'vimeo', $_POST['vimeo'] );
    update_user_meta( $user_id, 'skype', $_POST['skype'] );
    update_user_meta( $user_id, 'instagram', $_POST['instagram'] );
    update_user_meta( $user_id, 'flickr', $_POST['flickr'] );
    update_user_meta( $user_id, 'dribbble', $_POST['dribbble'] );
    update_user_meta( $user_id, 'behance', $_POST['behance'] );
    update_user_meta( $user_id, 'deviantart', $_POST['deviantart'] );
    update_user_meta( $user_id, 'github', $_POST['github'] );
    update_user_meta( $user_id, 'stumbleupon', $_POST['stumbleupon'] );
    update_user_meta( $user_id, 'reddit', $_POST['reddit'] );
    update_user_meta( $user_id, 'delicious', $_POST['delicious'] );
    update_user_meta( $user_id, 'soundcloud', $_POST['soundcloud'] );
    update_user_meta( $user_id, 'spotify', $_POST['spotify'] );
    update_user_meta( $user_id, 'rssfeed', $_POST['rssfeed'] );
} 
add_action( 'personal_options_update', 'inafx_save_social_profile_fields' );
add_action( 'edit_user_profile_update', 'inafx_save_social_profile_fields' );   
?>