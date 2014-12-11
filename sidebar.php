<!-- ## sidebar-1 start ## -->
<div class="col-sm-12 col-xs-12 sidebar">
    <?php get_template_part("static/static-nav"); ?>
    <?php if( is_page() ) : ?>
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
    <?php else: ?>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php endif; ?>
</div>
<!-- ## sidebar-1 end ## -->