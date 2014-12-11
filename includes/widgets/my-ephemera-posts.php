<?php
/**
 * Custom Widget for displaying specific post formats
 *
 * Displays posts from All, Standard, Aside, Quote, Video, Audio, Image, Gallery, and Link formats.
 */
class MY_Post_Widget extends WP_Widget {
    private $formats = array( 'all', 'standard', 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery' );

	/** constructor */
	function MY_Post_Widget() {
		parent::WP_Widget(false, $name = __('INAFX - Recent Posts', INAFX_CURRENT_THEME), array( 
            'classname'   => 'widget_inafx_ephemera',
            'description' => 'Use this widget to list your recent Posts, Standard, Aside, Quote, Video, Audio, Image, Gallery, and Link posts.'
        ));
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {
		$format = $instance['format'];

		switch ( $format ) {
			case 'image':
				$format_string      = __( 'Images', INAFX_CURRENT_THEME );
				$format_string_more = __( 'More images', INAFX_CURRENT_THEME );
				break;
			case 'video':
				$format_string      = __( 'Videos', INAFX_CURRENT_THEME );
				$format_string_more = __( 'More videos', INAFX_CURRENT_THEME );
				break;
			case 'audio':
				$format_string      = __( 'Audio', INAFX_CURRENT_THEME );
				$format_string_more = __( 'More audio', INAFX_CURRENT_THEME );
				break;
			case 'quote':
				$format_string      = __( 'Quotes', INAFX_CURRENT_THEME );
				$format_string_more = __( 'More quotes', INAFX_CURRENT_THEME );
				break;
			case 'link':
				$format_string      = __( 'Links', INAFX_CURRENT_THEME );
				$format_string_more = __( 'More links', INAFX_CURRENT_THEME );
				break;
			case 'gallery':
				$format_string      = __( 'Galleries', INAFX_CURRENT_THEME );
				$format_string_more = __( 'More galleries', INAFX_CURRENT_THEME );
				break;
			case 'aside':
				$format_string      = __( 'Asides', INAFX_CURRENT_THEME );
				$format_string_more = __( 'More asides', INAFX_CURRENT_THEME );
				break;
			case 'all':
            case 'standard':
            default:
				$format_string      = __( 'Posts', INAFX_CURRENT_THEME );
				$format_string_more = __( 'More postings', INAFX_CURRENT_THEME );
				break;
		}

		$number = empty( $instance['number'] ) ? 2 : absint( $instance['number'] );
		$title  = apply_filters( 'widget_title', empty( $instance['title'] ) ? $format_string : $instance['title'], $instance, $this->id_base );

        if( 'all' == $format ) {
		    $ephemera = new WP_Query( array(
			    'order'          => 'DESC',
			    'posts_per_page' => $number,
			    'no_found_rows'  => true,
			    'post_status'    => 'publish',
			    'post__not_in'   => get_option( 'sticky_posts' )
		    ) );                        
        }
        elseif( 'standard' == $format ) {
		    $ephemera = new WP_Query( array(
			    'order'          => 'DESC',
			    'posts_per_page' => $number,
			    'no_found_rows'  => true,
			    'post_status'    => 'publish',
			    'post__not_in'   => get_option( 'sticky_posts' ),
			    'tax_query'      => array(
				    array(
					    'taxonomy' => 'post_format',
					    'terms'    => array( 'post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-audio', 'post-format-video' ),
					    'field'    => 'slug',
					    'operator' => 'NOT IN',
				    ),
			    ),
		    ) );            
        }
        else {
		    $ephemera = new WP_Query( array(
			    'order'          => 'DESC',
			    'posts_per_page' => $number,
			    'no_found_rows'  => true,
			    'post_status'    => 'publish',
			    'post__not_in'   => get_option( 'sticky_posts' ),
			    'tax_query'      => array(
				    array(
					    'taxonomy' => 'post_format',
					    'terms'    => array( "post-format-$format" ),
					    'field'    => 'slug',
					    'operator' => 'IN',
				    ),
			    ),
		    ) );
        }
		if ( $ephemera->have_posts() ) :
			$tmp_content_width = $GLOBALS['content_width'];
			$GLOBALS['content_width'] = 306;

			echo $args['before_widget'];
			?>
			<h1 class="widget-title <?php echo esc_attr( $format ); ?>">
				<?php echo $title; ?>
			</h1>
			<ol>

				<?php
					while ( $ephemera->have_posts() ) :
						$ephemera->the_post();
						$tmp_more = $GLOBALS['more'];
						$GLOBALS['more'] = 0;
				?>
				<li>
				<article <?php post_class(); ?>>
					<div class="entry-content">
						<?php
							if ( has_post_thumbnail() ) :
								if ( post_password_required() ) :
									the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', INAFX_CURRENT_THEME ) );
								else :
									$images = array();

									$galleries = get_post_galleries( get_the_ID(), false );
									if ( isset( $galleries[0]['ids'] ) )
										$images = explode( ',', $galleries[0]['ids'] );

									if ( ! $images ) :
										$images = get_posts( array(
											'fields'         => 'ids',
											'numberposts'    => -1,
											'order'          => 'ASC',
											'orderby'        => 'menu_order',
											'post_mime_type' => 'image',
											'post_parent'    => get_the_ID(),
											'post_type'      => 'attachment',
										) );
									endif;

									$total_images = count( $images );
                                    $post_thumbnail = '';
									if ( has_post_thumbnail() ) :
										$post_thumbnail = get_the_post_thumbnail();
									elseif ( $total_images > 0 ) :
										$image          = array_shift( $images );
										$post_thumbnail = wp_get_attachment_image( $image, 'post-thumbnail' );
									endif;

									if ( ! empty ( $post_thumbnail ) ) :
						?>
						    <a href="<?php the_permalink(); ?>"><?php echo $post_thumbnail; ?></a>
						<?php endif; ?>
						<p class="wp-caption-text">
							<?php
                                if( has_post_format( 'gallery' ) ) :
								    printf( _n( 'This gallery contains <a href="%1$s" rel="bookmark">%2$s photo</a>.', 'This gallery contains <a href="%1$s" rel="bookmark">%2$s photos</a>.', $total_images, INAFX_CURRENT_THEME ),
									    esc_url( get_permalink() ),
									    number_format_i18n( $total_images )
								    );
                                endif;
							?>
						</p>
						<?php
								endif;

								the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', INAFX_CURRENT_THEME ) );
							endif;
						?>
					</div>

					<header class="entry-header">
						<div class="entry-meta">
							<?php
    							the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );

								printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
									esc_url( get_permalink() ),
									esc_attr( get_the_date( 'c' ) ),
									esc_html( get_the_date() ),
									esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
									get_the_author()
								);

								if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
							?>
							<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', INAFX_CURRENT_THEME ), __( '1 Comment', INAFX_CURRENT_THEME ), __( '% Comments', INAFX_CURRENT_THEME ) ); ?></span>
                            <br />
							<?php 
the_excerpt();
 endif; ?>
						</div>
					</header>
				</article>
				</li>
				<?php endwhile; ?>

			</ol>
			<a class="post-format-archive-link" href="<?php echo esc_url( get_post_format_link( $format ) ); ?>">
				<?php
					/* translators: used with More archives link */
					printf( __( '%s <span class="meta-nav">&rarr;</span>', INAFX_CURRENT_THEME ), $format_string_more );
				?>
			</a>
			<?php

			echo $args['after_widget'];

			// Reset the post globals as this query will have stomped on it.
			wp_reset_postdata();

			$GLOBALS['more']          = $tmp_more;
			$GLOBALS['content_width'] = $tmp_content_width;

		endif; // End check for ephemeral posts.
	}

	/** @see WP_Widget::update */
	function update($new_instance, $instance) {
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['number'] = empty( $new_instance['number'] ) ? 2 : absint( $new_instance['number'] );
		if ( in_array( $new_instance['format'], $this->formats ) ) {
			$instance['format'] = $new_instance['format'];
		}

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		$title  = empty( $instance['title'] ) ? '' : esc_attr( $instance['title'] );
		$number = empty( $instance['number'] ) ? 2 : absint( $instance['number'] );
		$format = isset( $instance['format'] ) && in_array( $instance['format'], $this->formats ) ? $instance['format'] : 'all';
		?>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', INAFX_CURRENT_THEME ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"></p>

			<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of posts to show:', INAFX_CURRENT_THEME ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3"></p>

			<p><label for="<?php echo esc_attr( $this->get_field_id( 'format' ) ); ?>"><?php _e( 'Post format to show:', INAFX_CURRENT_THEME ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'format' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'format' ) ); ?>">
				<?php foreach ( $this->formats as $slug ) : ?>
				<option value="<?php echo esc_attr( $slug ); ?>"<?php selected( $format, $slug ); ?>><?php echo get_post_format_string( $slug ) == '' ? 'All' : get_post_format_string( $slug ); ?></option>
				<?php endforeach; ?>
			</select>
		<?php
	}
}
?>