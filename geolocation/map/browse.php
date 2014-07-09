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
        <h1>Browse on the map</h1>        
        <div class="row">
            <div class="col-sm-12">
                <?php echo $this->googleMap('map_browse', array('loadKml'=>true, 'list'=>'list-view'));?>
            </div>
            <div id="list-view" class="hidden"></div>
        </div>
    </div>
</div>

<?php echo foot(); ?>
