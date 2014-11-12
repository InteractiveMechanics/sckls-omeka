<?php
    $pageTitle = __('Browse Collections');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>

<div class="container">

    <?php if ($collections): ?>
        <?php foreach (loop('collections') as $collection): ?>
        <div class="content-block browse-page">        
            <h1><?php echo link_to_collection(); ?></h1>
            <?php
                $items = get_records('Item', array('collection'=>$collection->id), 8);
                set_loop_records('items', $items);
                if (has_loop_records('items')): ?>
    
                <div class="items-list slider">
                <?php foreach (loop('items') as $item): ?>
                    <?php $image = $item->Files; ?>
                    <?php if ($image): ?>
                    <div class="item">
                        <?php
                            echo '  <a href="' . record_url($item, null, true) . '">';
                            echo '    <div class="overlay"></div>';
                            if ($image) {
                                echo '<div style="background-image: url(' . file_display_url($image[0], 'fullsize') . ');" class="img"></div>';
                            } else {
                                echo '<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img default"></div>';
                            }
                    	    echo '    <span class="title">' . metadata('item', array('Dublin Core', 'Title')) . '</span>';
                            echo '  </a>';
                        ?>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                </div>
            <?php endif; //endif; ?>
    
            <?php if (metadata('collection', array('Dublin Core', 'Description'))): ?>
                <hr>
                <?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'), array('snippet'=>150))); ?>
                <?php echo link_to_collection('View this collection', array('class' => 'link-to-exhibit')); ?>
            <?php endif; ?>        
        </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="content-block browse-page">
            <h1>Browse all collections</h1>
            <p><?php echo 'No collections added, yet.'; ?></p>
        </div>
    <?php endif; ?>
    <?php echo pagination_links(); ?>
    <?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>
</div>

<?php echo foot(); ?>
