<!-- ## nav-dropdown-menu start ## -->
<?php
     if (has_nav_menu('header_menu')) {
            wp_nav_menu( array(
                'menu'              => '',
                'theme_location'    => 'header_menu',
                'depth'             => 3,
                'container'         => 'nav',
                'container_class'   => 'nav-dropdown-menu',
                'container_id'      => 'nav-dropdown-menu1',
                'menu_class'        => 'menu-wrapper',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
    } else {
        if( current_user_can( 'administrator' ) ) {
?>
<nav class="nav-dropdown-menu collapse navbar-collapse" id="nav-dropdown-menu1">
    <ul class="nav" id="menu-top-menu">
        <li class="menu-item menu dropdown" id="menu-item-0">
            <a class="dropdown-toggle" href="<?php echo home_url( '/' ); ?>wp-admin/nav-menus.php">Add A Menu</a>
        </li>
    </ul>
</nav>
<?php
        }
    }
?>
<!-- ## nav-dropdown-menu end ## -->