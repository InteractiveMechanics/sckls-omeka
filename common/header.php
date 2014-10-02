<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php if ( $description = option('description')): ?>
    	<meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
	    if (isset($title)) {
	        $titleParts[] = strip_formatting($title);
	    }
	    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugins -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Icons -->
    <link rel="apple-touch-icon" href="<?php echo img('icons/apple-touch-icon.png'); ?>" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo img('icons/apple-touch-icon-57x57.png'); ?>" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo img('icons/apple-touch-icon-114x114.png'); ?>" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo img('icons/apple-touch-icon-72x72.png'); ?>" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo img('icons/apple-touch-icon-144x144.png'); ?>" />
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo img('icons/apple-touch-icon-60x60.png'); ?>" />
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo img('icons/apple-touch-icon-120x120.png'); ?>" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo img('icons/apple-touch-icon-76x76.png'); ?>" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo img('icons/apple-touch-icon-152x152.png'); ?>" />
	<link rel="icon" type="image/png" href="<?php echo img('icons/64_favicon.png'); ?>" sizes="64x64" />
	<link rel="icon" type="image/png" href="<?php echo img('icons/32_favicon.png'); ?>" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php echo img('icons/favicon.png'); ?>" sizes="16x16" />

    <!-- Stylesheets -->
    <?php 
    	queue_css_file('main');
    	queue_css_file('lib/bootstrap.min');
        queue_css_file('lib/slick');
        queue_css_file('lib/lightGallery');
   		echo head_css(); ?>

    <!-- Scripts -->
    <?php 
	    queue_js_url('http://code.jquery.com/jquery-1.11.0.min.js');
        queue_js_file('lib/bootstrap.min');
        queue_js_file('lib/slick.min');
        queue_js_file('lib/lightGallery.min');
	    queue_js_file('app');
	    echo head_js(); ?>

    <style>
        header {
            <?php if(get_theme_option('Theme: Background')): ?>
                background-image: url('<?php echo url('/'); ?>files/theme_uploads/<?php echo get_theme_option('Theme: Background'); ?>');
            <?php endif; ?>
        }
        .content {
            background: #<?php echo get_theme_option('Theme: Color'); ?>;
        }
        .content .overlay:hover {
            background: #<?php echo get_theme_option('Theme: Color'); ?>;
        }
    </style>
    </style>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
<div class="wrapper">
    <nav class="navbar navbar-inverse navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-button">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="search-overlay-button navbar-toggle"><span class="glyphicon glyphicon-search"></span></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-button">
                <?php $nav = public_nav_main(); echo $nav->setUlClass('nav navbar-nav'); ?>
                <ul class="nav navbar-nav navbar-right hidden-xs">
                    <li><a class="search-overlay-button"><span class="glyphicon glyphicon-search"></span> Search</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <div class="overlay"></div>
        <div class="container">
            <?php if(!get_theme_option('Theme: Show')): ?>
                <div class="branding">
                    <h1><?php echo link_to_home_page(); ?></h1>
                    <h4><?php echo get_theme_option('Theme: Subtitle'); ?></h4>
                </div>
            <?php endif; ?>
        </div>
    </header>
    <div class="content">
