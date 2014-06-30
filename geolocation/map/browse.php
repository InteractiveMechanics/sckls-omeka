<?php 
    queue_js_url("http://maps.google.com/maps/api/js?sensor=false");
    queue_js_file('map');
    
    $css = "
        #map_browse {
            height: 436px;
        }
        .balloon {width:400px !important; font-size:1.2em;}
        .balloon .title {font-weight:bold;margin-bottom:1.5em;}
        .balloon .title, .balloon .description {float:left; width: 220px;margin-bottom:1.5em;}
        .balloon img {float:right;display:block;}
        .balloon .view-item {display:block; float:left; clear:left; font-weight:bold; text-decoration:none;}
        #map-links a {
            display:block;
        }
        #search_block {
            clear: both;
        }
    ";
    queue_css_string($css);
    echo head(array('title' => __('Browse Map'),'bodyid'=>'map','bodyclass' => 'browse'));

?>

<div class="container">
    <div class="content-block">
        <h1><?php echo __('Browse Items on the Map');?> (<?php echo $totalItems; ?> <?php echo __('total');?>)</h1>
        
        <?php echo pagination_links(); ?>
        
        <div class="row">
            <div class="col-sm-8">
                <?php echo $this->googleMap('map_browse', array('loadKml'=>true, 'list'=>'map-links'));?>
            </div><!-- end map_block -->
            <div class="col-sm-4">
                <div id="map-links"><h2><?php echo __('Find An Item on the Map'); ?></h2></div><!-- Used by JavaScript -->
            </div><!-- end link_block -->
        </div><!-- end primary -->
    </div>
</div>

<?php echo foot(); ?>
