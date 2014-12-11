<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 author-info">
            <!-- ## author-info start ## -->
            <div class="single media-list">
                <div class="media">
                    <!-- ## author-avatar start ## -->
                    <div class="author-avatar pull-left">
                        <span class="media-object"><?php echo get_avatar( get_the_author_meta( 'user_email' ),  128 ); ?></span>
                    </div>
                    <!-- ## author-avatar end ## -->
                    <!-- ## author-description start ## -->
                    <div class="author-description media-body">
                        <!-- ## author-title ## -->
                        <h4 class="author-title media-heading"><?php printf( '%s', get_the_author() ); ?></h4>
                        <!-- ## author-bio start ## -->
                        <p class="author-bio">
                            <?php the_author_meta( 'description' ); ?>
                            <!-- ## author-link ## -->
                            <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                                <?php printf( '%s <span class="fa fa-angle-double-right"></span>', theme_locals( 'author_view_all_posts' ) ); ?>
                            </a>
                        </p>
                        <!-- ## author-bio end ## -->
                        <?php if ( inafx_theme_option( 'opt_show_author_social_icons' ) != 0 ) : ?>
                        <!-- ## author-social start ## -->
                        <ul class="author-social list-inline">
                            <?php
                                $social_array = array(
                                    'facebook'      => 'Facebook',
                                    'twitter'       => 'Twitter',
                                    'google-plus'   => 'Google+',
                                    'pinterest'     => 'Pinterest',
                                    'linkedin'      => 'Linkedin',
                                    'youtube-play'  => 'Youtube',
                                    'vimeo-square'  => 'Vimeo',
                                    'skype'         => 'Skype',
                                    'instagram'     => 'Instagram',
                                    'flickr'        => 'Flickr',
                                    'dribbble'      => 'Dribbble',
                                    'behance'       => 'Behance',
                                    'deviantart'    => 'DeviantART',
                                    'github'        => 'Github',
                                    'stumbleupon'   => 'StumbleUpon',
                                    'reddit'        => 'Reddit',
                                    'delicious'     => 'Delicious',
                                    'soundcloud'    => 'SoundCloud',
                                    'spotify'       => 'Spotify'
                                );    
                                
                                foreach( $social_array as $author_meta => $social ) :
                            ?>
                            <?php if ( get_the_author_meta( $author_meta ) ) { ?>
                            <li><a href="<?php the_author_meta( $author_meta ); ?>" title="<?php printf( '%1$s %2$s %3$s %4$s', theme_locals( 'social_follow' ), get_the_author_meta( 'display_name' ), theme_locals( 'social_on' ), $social ); ?>"><span class="fa fa-<?php echo $author_meta; ?>"></span></a></li>
                            <?php } ?>
                            <?php endforeach; ?>
                            <?php if ( get_the_author_meta( 'rssfeed' ) ) { ?>
                            <li><a href="<?php the_author_meta( 'rssfeed' ); ?>" title="<?php echo theme_locals( 'subscribe_rss_feed' ); ?>"><span class="fa fa-rss"></span></a></li>
                            <?php } ?>
                        </ul>
                        <!-- ## author-social end ## -->
                        <?php endif; ?>
                    </div>
                    <!-- ## author-description end ## -->
                </div>
            </div>
            <!-- ## author-info end ## -->
        </div>
    </div>
</div>