<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            background-image: url('<?php echo url('/'); ?>files/theme_uploads/<?php echo get_theme_option('Theme: Background'); ?>');
        }
        header .overlay {
            background: #<?php echo get_theme_option('Theme: Color'); ?>;
        }
        .content .overlay:hover {
            background: #<?php echo get_theme_option('Theme: Color'); ?>;
        }
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
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-button">
                <?php $nav = public_nav_main(); echo $nav->setUlClass('nav navbar-nav'); ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a id="search-overlay-button"><span class="glyphicon glyphicon-search"></span> Search</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <div class="overlay"></div>
        <div class="container">
            <div class="branding">
                <h1><?php echo link_to_home_page(); ?></h1>
                <h4><?php echo get_theme_option('Theme: Subtitle'); ?></h4>
            </div>
        </div>
    </header>
    <div class="content">
