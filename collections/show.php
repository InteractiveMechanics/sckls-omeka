<?php
    $collection = get_current_record('Collections', false);
    $collectionId = get_current_record('Collections',false)->id;
    $collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));

    if ($collectionTitle == '') {
        $collectionTitle = __('[Untitled]');
    }
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>

<div class="container">
    <h1><?php echo $collectionTitle; ?></h1>
    <div class="row">
        <div class="col-sm-3">
            <?php echo common('nav-collection'); ?>
        </div>
        <div class="col-sm-9">
            <?php
                $collections = get_records('collection', array('sort_field'=>'id'), 99);
                set_loop_records('collections', $collections);
                if (has_loop_records('collections')){
                    foreach (loop('collections') as $collection){
                        $thisCollectionTitle = metadata('collection', array('Dublin Core', 'Title'));
                        $items = get_records('Item', array('collection'=>$collection->id), 99);
                        set_loop_records('items', $items);
                        if (($collectionTitle === 'Conference' && $thisCollectionTitle !== 'Workshop') || 
                            ($collectionTitle === 'Workshop' && $thisCollectionTitle === 'Workshop')){
                            if (has_loop_records('items')){
                                echo '<h3>' . metadata('collection', array('Dublin Core', 'Title')) . '</h3>';
                                echo '<div class="row">';
                                foreach (loop('items') as $item){
                                    echo '<div class="col-sm-6 col-md-4">';
                                    echo '  <div class="item">';
                                    echo '    <a href="' . record_url($item, null, true) . '">';
                                    echo '      <div class="overlay"></div>';
                                    $image = $item->Files;
                                    if ($image) {
                                        echo '<img src="' . file_display_url($image[0], 'original') . '" alt="' . metadata('item', array('Dublin Core', 'Title')) . '" />';
                                    }
                                    echo '      <span class="title">' . metadata('item', array('Dublin Core', 'Title')) . '';
                                    echo '    </a>';
                                    echo '  </div>';
                                    echo '</div>';
                            	}
                                echo '</div>';
                            }
                        }
                    }
                }
            ?>
        </div>
    </div>
</div>

<?php echo foot(); ?>