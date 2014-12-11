<!-- ## logo start ## -->
<div class="logo">
    <?php if( inafx_theme_option( 'opt_logo_type' ) == 'text' ) : ?>
    <!-- ## logo-text start ## -->
    <div class="logo-text pull-left">
        <a href="<?php echo home_url( '/' ); ?>">
            <?php echo inafx_theme_option( 'opt_logo_text' ); ?>
        </a>
    </div>
    <!-- ## logo-text end ## -->
    <?php else : ?>
    <!-- ## logo-image start ## -->
    <div class="logo-image pull-left">
        <a href="<?php echo home_url( '/' ); ?>">
            <img src="<?php echo inafx_theme_option( 'opt_logo_image' )['url']; ?>" alt="<?php bloginfo(); ?>" />
        </a>
    </div>
    <!-- ## logo-image end ## -->
    <?php endif; ?>
    <?php if( inafx_theme_option( 'opt_show_tagline' ) == 1 ) : ?>
    <!-- ## logo-tagline start ## -->
    <div class="logo-tagline pull-left hidden-xs">
        <?php bloginfo( 'description' ); ?>
    </div>
    <!-- ## logo-tagline end ## -->
    <?php endif; ?>
</div>
<!-- ## logo end ## -->
<!-- ## nav-search start ## -->
<div class="nav-search-bar">
    <?php if ( inafx_theme_option( 'opt_show_search' ) != 0 ) : ?>
    <!-- ## search link icon ## -->
    <a id="lnk-show-search" href="#_" class="fa fa-search"></a>
    <?php endif; ?>
    <!-- ## navbar-toggle start ## -->
    <a id="navbar-toggle" class="navbar-toggle visible-lg visible-md visible-sm visible-xs" href="#sidr">
        <span class="fa fa-bars"></span>
    </a>
    <!-- ## navbar-toggle end ## -->
</div>
<!-- ## nav-search end ## -->