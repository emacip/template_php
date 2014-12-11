        </div>
        <!-- ## main end ## -->
        
        <!-- ## footer start ## -->
        <footer id="footer">
            <?php 
            get_template_part( 'wrapper/wrapper-footer' );
            ?>
        </footer>
        <!-- ## footer end ## -->

        <?php wp_footer(); ?>
        <?php echo inafx_theme_option( 'opt_google_analytics' ); ?>
        </div>
        <!-- ## page-wrapper end ## -->

        <!-- ## sidr-nav start ## -->
        <div id="sidr">
            <!-- ## navbar-toggle start ## -->
            <a id="sidr-navbar-toggle-1" class="navbar-toggle visible-sm visible-xs" href="#_">
                <span class="fa fa-times"></span>
            </a>
            <!-- ## navbar-toggle end ## -->
            <?php get_sidebar(); ?>
            <!-- ## navbar-toggle start ## -->
            <a id="sidr-navbar-toggle-2" class="navbar-toggle visible-sm visible-xs" href="#_">
                <span class="fa fa-times"></span>
            </a>
            <!-- ## navbar-toggle end ## -->
        </div>
        <!-- ## sidr-nav end ## -->
    </body>
</html>