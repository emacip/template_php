<!-- ## bg-404 start ## -->
<div class="bg-404" style="background-image: url('<?php echo inafx_theme_option( 'opt_404_background' )['url']; ?>');">
    <?php
        $rgb = inafx_theme_option( 'opt_404_overlay_color' );
        $alpha = inafx_theme_option( 'opt_404_overlay_alpha' );
        $rgba = Redux_Helpers::hex2rgba( $rgb, $alpha );
    ?>
    <!-- ## overlay-404 start ## -->
    <div class="overlay-404" style="background: <?php echo $rgba; ?>;">
        <!-- ## content container start ## -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <!-- ## entry-404 start ## -->
                        <div class="col-sm-8 col-sm-offset-2 entry-404">
                            <!-- ## title 1 ## -->
                            <h4 class="title"><?php echo inafx_theme_option( 'opt_404_title_1' ); ?></h4>
                            <!-- ## title 2 ## -->
                            <h1 class="title"><?php echo inafx_theme_option( 'opt_404_title_2' ); ?></h1>
                            <!-- ## go to home link start ## -->
                            <div class="col-sm-6 col-sm-offset-3">
                                <a class="btn btn-default" href="<?php echo home_url( '/' ); ?>"><?php echo theme_locals( 'go_to_home' ); ?></a>
                            </div>
                            <!-- ## go to home link end ## -->
                        </div>
                        <!-- ## entry-404 end ## -->
                    </div>
                </div>
                <!-- ## content container end ## -->
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- ## overlay-404 end ## -->
</div>
<!-- ## bg-404 end ## -->