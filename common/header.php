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
   		echo head_css(); ?>

    <!-- Scripts -->
    <?php 
	    queue_js_url('http://code.jquery.com/jquery-1.11.0.min.js');
        queue_js_file('lib/jquery.tinycarousel.min');
        queue_js_file('lib/bootstrap.min');
	    queue_js_file('app');
	    echo head_js(); ?>
	    
	<script type="text/javascript" src="//use.typekit.net/tfe1hdv.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
<div class="wrapper">
    <header>
        <div class="container">
            <div class="branding"><?php echo link_to_home_page('regeneration<span>Conference</span>'); ?></div>
        </div>
    </header>
    <nav class="navbar navbar-default" role="navigation">
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
                <ul class="nav navbar-nav">
                    <li><?php echo link_to_home_page('Home'); ?></li>
                </ul>
                <?php $nav = public_nav_main(); echo $nav->setUlClass('nav navbar-nav'); ?>
                <form class="navbar-form navbar-right" role="search" action="<?php echo public_url(''); ?>search">
                    <?php echo search_form(array('show_advanced' => false, 'form_attributes' => 'class')); ?>
                </form>
            </div>
        </div>
    </nav>
    <div class="content">
