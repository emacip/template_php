<?php if ( inafx_theme_option( 'opt_show_search' ) != 0 ) : ?>
<!-- ## form-header-search start ## -->
<form method="get" id="form-header-search" action="<?php echo home_url( '/' ); ?>">
    <!-- ## search-box start ## -->
    <div id="search-box">
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="row">
                        <div class="col-xs-10 pull-left">
                            <!-- ## search field ## -->
                            <input name="s" class="form-control col-sm-10" id="search-field" type="text" placeholder="<?php echo theme_locals( 'search_field_placeholder' ); ?>." />
                        </div>
                        <div class="col-xs-2 pull-left text-center">
                            <!-- ## link-hide-search ## -->
                            <a id="lnk-hide-search" href="#_">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ## search-box end ## -->
</form>
<!-- ## form-header-search end ## -->
<?php endif; ?>