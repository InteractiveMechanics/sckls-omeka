<?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<div class="container">
    <div class="content-block">
        <h1><?php echo 'Browse all items'; ?></h1>
        
        <?php if ($total_results > 0): ?>
        <?php
        $sortLinks[__('Title')] = 'Dublin Core,Title';
        $sortLinks[__('Creator')] = 'Dublin Core,Creator';
        ?>
        <div id="sort-links">
            <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks, array('')); ?>
        </div>
        <?php endif; ?>
    
        <?php foreach (loop('items') as $item): ?>
        <div class="item">
            <div class="row">
                <div class="col-sm-2">
                    <?php $image = $item->Files; ?>
                    <?php if ($image) {
                            echo link_to_item('<div style="background-image: url(' . file_display_url($image[0], 'original') . ');" class="img"></div>');
                        } else {
                            echo link_to_item('<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img default"></div>');
                        }
                    ?>
                </div>
                <div class="col-sm-2">
                    <?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?>
                </div>
                <div class="col-sm-2">
                    <?php echo metadata('item', array('Dublin Core', 'Creator')); ?>
                </div>
                <div class="col-sm-2">
                    <?php echo metadata('item', array('Dublin Core', 'Subject')); ?>
                </div>
                <div class="col-sm-4">
                    <?php echo metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250)); ?>
                </div>
            
                <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
            </div>
        </div>
        <?php endforeach; ?>
        
        <?php echo pagination_links(); ?>        
        <?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>
    </div>
    <?php echo pagination_links(); ?>
</div>

<?php echo foot(); ?>
