<?php
/**
 * Custom Widget for displaying Ad
 *
 * Displays image banner ad of any size
 */
class MY_Ad_Widget extends WP_Widget {

	function MY_Ad_Widget() {
		$widget_ops = array(
			'classname'   => 'ad_x',
			'description' => theme_locals( 'widget_adbanner_desc' ),
			);
		$control_ops = array( 'id_base' => 'ad_x-widget' );
		$this->WP_Widget( 'ad_x-widget', theme_locals( 'widget_adbanner_title' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args ); 
        $title     = apply_filters('widget_title', $instance['title']);
	    echo $before_widget;
		    if ( $title )
			    echo $before_title . $title . $after_title;
        ?>
		<ul class="banners clearfix unstyled">
			<?php
				for ( $ad_count = 1; $ad_count <= 1; $ad_count++ ) :
					if ( $instance['ad_x_img_' . $ad_count] && $instance['ad_x_link_' . $ad_count] ) : ?>

					<li class="banners_li">
						<span class="hold">
							<a href="<?php echo $instance['ad_x_link_' . $ad_count]; ?>">
								<img src="<?php echo $instance['ad_x_img_' . $ad_count]; ?>" alt="banner ad <?php echo $ad_count; ?>" class="banners_img" />
							</a>
						</span>
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
            'title'       => '',
			'ad_x_img_1'  => '',
			'ad_x_link_1' => ''
			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	    <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo theme_locals( 'widget_adbanner_label' ); ?> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
            </label>
        </p>
		<p><strong><?php echo theme_locals( 'widget_adbanner_ad_label' ); ?></strong></p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_x_img_1'); ?>"><?php echo theme_locals( 'widget_adbanner_imgurl_label' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_x_img_1'); ?>" name="<?php echo $this->get_field_name('ad_x_img_1'); ?>" value="<?php echo $instance['ad_x_img_1']; ?>" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ad_x_link_1'); ?>"><?php echo theme_locals( 'widget_adbanner_adlink_label' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ad_x_link_1'); ?>" name="<?php echo $this->get_field_name('ad_x_link_1'); ?>" value="<?php echo $instance['ad_x_link_1']; ?>" type="text" />
		</p>
		<?php
	}
} ?>