<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>

<div class="homepage-hero">
    <div class="container">
        <h1><strong>Regeneration</strong> in Digital Contexts</h1>
        <h2>Early Black Film Conference</h2>
    </div>
</div>
<div class="homepage-slideshow">
    <div class="container">
        <h6 class="header-label">Explore the Conference</h6>
        <div id="homepage-slideshow-container" class="carousel">
            <a class="buttons prev" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <div class="viewport">
            <?php
                $items = get_records('Item', array(), 99);
                set_loop_records('items', $items);
                if (has_loop_records('items')){
                    echo '<ul class="overview">';
                    foreach (loop('items') as $item){
                        echo '<li>';
                        echo '  <a href="' . record_url($item, null, true) . '">';
                        echo '    <div class="overlay"></div>';
                        $image = $item->Files;
                        if ($image) {
                            echo '<img src="' . file_display_url($image[0], 'original') . '" alt="' . metadata('item', array('Dublin Core', 'Title')) . '" />';
                        }
                	    echo '    <span class="title">' . metadata('item', array('Dublin Core', 'Title')) . '';
                        echo '  </a>';
                        echo '</li>';
                	}
                    echo '</ul>';
                }
            ?>
            </div>
            <a class="buttons next" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
</div>
<div class="homepage-content">
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <h6 class="header-label">About the Conference</h6>
            <p><?php echo get_theme_option('Homepage Text'); ?></p>
        </div>
    </div>
</div>

<?php echo foot(); ?>
