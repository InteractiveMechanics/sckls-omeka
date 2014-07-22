<?php 
    queue_js_url("http://maps.google.com/maps/api/js?sensor=false");
    queue_js_file('map');

    echo head(array('title' => __('Browse Map'),'bodyid'=>'map','bodyclass' => 'browse'));
?>

<div class="container">
    <div class="content-block">
        <h1>Browse the map</h1>        
        <div class="row">
            <div class="col-sm-12">
                <?php echo $this->googleMap('map_browse', array('loadKml'=>true, 'list'=>'list-view'));?>
            </div>
            <div id="list-view" class="hidden"></div>
        </div>
    </div>
</div>

<?php echo foot(); ?>
