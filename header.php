<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <title><?php wp_title(''); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
        <link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo INAFX_CHILD_URL; ?>/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo INAFX_CHILD_URL; ?>/assets/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <?php wp_head(); ?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo INAFX_CHILD_URL; ?>/assets/js/html5shiv.js"></script>
          <script src="<?php echo INAFX_CHILD_URL; ?>/assets//js/respond.min.js"></script>
        <![endif]-->
        <?php 
            $favicon = inafx_theme_option( 'opt_favicon' )['url']; 
            $favicon = empty($favicon) ? $favicon = get_template_directory_uri().'/assets/ico/favicon.png' : $favicon;
        ?>
        <link rel="shortcut icon" type="image/png" href="<?php echo $favicon; ?>" />
    </head>
    <body <?php body_class(); ?> role="document">
        <!-- ## page-wrapper start ## -->
        <div class="page-wrapper">

        <!-- ## header start ## -->
        <header id="header-wrapper">
            <?php 
            get_template_part( 'wrapper/wrapper-header' );
            ?>
        </header>
        <!-- ## header end ## -->

        <!-- ## main start ## -->
        <div id="main">
        <?php 
        get_template_part( 'static/static-header-ephemera' );
        ?>
        <?php
            get_template_part('static/static-title');
        ?>
        <?php
            get_template_part('static/static-breadcrumbs');
        ?>