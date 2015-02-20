<?php
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
if ($collectionTitle == '') {
    $collectionTitle = __('[Untitled]');
}
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>

<div class="container">
    <div class="content-block">
        <h1><?php echo $collectionTitle; ?></h1>
        <p><?php echo metadata('collection', array('Dublin Core', 'Description')); ?></p>
        
        <?php if (metadata('collection', 'total_items') > 0): ?>
        <div class="browse-items">
            <?php
                $sortLinks[__('Title')] = 'Dublin Core,Title';
                $sortLinks[__('Creator')] = 'Dublin Core,Creator';
                ?>
            <div class="browse-items-header hidden-xs">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-2 col-md-2 col-md-offset-2">
                        <?php echo browse_sort_links(array('Title'=>'Dublin Core,Title'), array('')); ?>
                    </div>
                    <div class="col-sm-3 col-md-2">
                        <?php echo browse_sort_links(array('Creator'=>'Dublin Core,Creator'), array('')); ?>
                    </div>
                    <div class="hidden-sm col-md-2">
                        Subject
                    </div>
                    <div class="col-sm-4 col-md-4">
                        Description
                    </div>
                </div>
            </div>
        
            <?php foreach (loop('items') as $item): ?>
            <div class="item">
                <div class="row">
                    <div class="col-sm-2 col-md-2">
                        <?php $image = $item->Files; ?>
                        <?php if ($image) {
                                echo link_to_item('<div style="background-image: url(' . file_display_url($image[0], 'fullsize') . ');" class="img"></div>');
                            } else {
                                echo link_to_item('<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img"></div>');
                            }
                        ?>
                    </div>
                    <div class="col-sm-3 col-md-2">
                        <?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?>
                    </div>
                    <div class="col-sm-3 col-md-2">
                        <?php echo metadata('item', array('Dublin Core', 'Creator')); ?>
                    </div>
                    <div class="hidden-sm col-md-2">
                        <?php echo metadata('item', array('Dublin Core', 'Subject')); ?>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <?php echo metadata('item', array('Dublin Core', 'Description'), array('snippet'=>150)); ?>
                    </div>
                
                    <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
                </div>
            </div>
            <?php endforeach; ?>
            <?php echo pagination_links(); ?>
        </div>
        <?php else: ?>
            <div class="alert alert-warning">There are currently no items within this collection.</div>
        <?php endif; ?>

        <?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
    </div>
</div>

<?php echo foot(); ?>
