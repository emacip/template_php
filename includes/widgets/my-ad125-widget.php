<?php
/**
 * Custom Widget for displaying 125x125 Ads
 *
 * Displays 4 image banner ads of size 125px x 125px
 */
class MY_Ad_125x125_Widget extends WP_Widget {

	function MY_Ad_125x125_Widget() {
		$widget_ops = array(
			'classname'   => 'widget_ad_125x125',
			'description' => theme_locals( 'widget_ad125_desc' ),
			);
		$control_ops = array( 'id_base' => 'ad_125x125-widget' );
		$this->WP_Widget( 'ad_125x125-widget', theme_locals( 'widget_ad125_title' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args ); 
        $title     = apply_filters('widget_title', $instance['title']);
	    echo $before_widget;
		    if ( $title )
			    echo $before_title . $title . $after_title;
    ?>
		<ul class="banners text-center">
			<?php
				for ( $ad_count = 1; $ad_count <= 4; $ad_count++ ) :
					if ( $instance['ad_125_img_' . $ad_count] && $instance['ad_125_link_' . $ad_count] ) : ?>

					<li>
						<a href="<?php echo $instance['ad_125_link_' . $ad_count]; ?>">
							<img src="<?php echo $instance['ad_125_img_' . $ad_count]; ?>" alt="banner ad <?php echo $ad_count; ?>" class="banners_img" width="125" height="125" />
						</a>
					</li>
			<?php
				endif;
				endfor;
			?>
		</ul>
	<?php
        echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		$defaults = array(
            'title'         => '',
			'ad_125_img_1'  => '',
			'ad_125_link_1' => '',
			'ad_125_img_2'  => '',
			'ad_125_link_2' => '',
			'ad_125_img_3'  => '',
			'ad_125_link_3' => '',
			'ad_125_img_4'  => '',
			'ad_125_link_4' => '',
			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	    <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo theme_locals( 'widget_ad125_label' ); ?> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
            </label>
        </p>
		<p><strong><?php echo theme_locals('widget_ad125_ad1_label'); ?></strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_img_1'); ?>"><?php echo theme_locals('widget_ad125_imgurl_label'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_125_img_1'); ?>" name="<?php echo $this->get_field_name('ad_125_img_1'); ?>" value="<?php echo $instance['ad_125_img_1']; ?>" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_link_1'); ?>"><?php echo theme_locals('widget_ad125_adlink_label'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_125_link_1'); ?>" name="<?php echo $this->get_field_name('ad_125_link_1'); ?>" value="<?php echo $instance['ad_125_link_1']; ?>" type="text" />
		</p>
        <hr />
		<p><strong><?php echo theme_locals('widget_ad125_ad2_label'); ?></strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_img_2'); ?>"><?php echo theme_locals('widget_ad125_imgurl_label');  ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_125_img_2'); ?>" name="<?php echo $this->get_field_name('ad_125_img_2'); ?>" value="<?php echo $instance['ad_125_img_2']; ?>" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_link_2'); ?>"><?php echo theme_locals('widget_ad125_adlink_label'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_125_link_2'); ?>" name="<?php echo $this->get_field_name('ad_125_link_2'); ?>" value="<?php echo $instance['ad_125_link_2']; ?>" type="text" />
		</p>
        <hr />
		<p><strong><?php echo theme_locals('widget_ad125_ad3_label'); ?></strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_img_3'); ?>"><?php echo theme_locals('widget_ad125_imgurl_label'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_125_img_3'); ?>" name="<?php echo $this->get_field_name('ad_125_img_3'); ?>" value="<?php echo $instance['ad_125_img_3']; ?>" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_link_3'); ?>"><?php echo theme_locals('widget_ad125_adlink_label'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_125_link_3'); ?>" name="<?php echo $this->get_field_name('ad_125_link_3'); ?>" value="<?php echo $instance['ad_125_link_3']; ?>" type="text" />
		</p>
        <hr />
		<p><strong><?php echo theme_locals('widget_ad125_ad4_label'); ?></strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_img_4'); ?>"><?php echo theme_locals('widget_ad125_imgurl_label');  ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_125_img_4'); ?>" name="<?php echo $this->get_field_name('ad_125_img_4'); ?>" value="<?php echo $instance['ad_125_img_4']; ?>" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_125_link_4'); ?>"><?php echo theme_locals('widget_ad125_adlink_label'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_125_link_4'); ?>" name="<?php echo $this->get_field_name('ad_125_link_4'); ?>" value="<?php echo $instance['ad_125_link_4']; ?>" type="text" />
		</p>
		<?php
	}
} ?>