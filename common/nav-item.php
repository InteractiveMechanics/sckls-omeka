<?php 
    $record = get_current_record('Items');
    $recordId = $record->id;

    $collection = get_collection_for_item();
    $collectionId = $collection->id;
    $collectionTitle = metadata($collection, array('Dublin Core', 'Title'));
?>

<nav class="sidebar">
    <?php
        $collections = get_records('collection', array('sort_field'=>'id'), 99);
        set_loop_records('collections', $collections);
        if (has_loop_records('collections')){
            echo '<ul class="nav nav-pills nav-stacked">';
            foreach (loop('collections') as $collection){
                $thisCollectionTitle = metadata('collection', array('Dublin Core', 'Title'));
                $sub_items = get_records('Item', array('collection'=>$collection->id), 99);
                set_loop_records('items', $sub_items);
                if (($collectionTitle !== 'Workshop' && $thisCollectionTitle !== 'Workshop') || 
                    ($collectionTitle === 'Workshop' && $thisCollectionTitle === 'Workshop')){
                    if (has_loop_records('items')){
                        if ($collectionId === $collection->id) {
                            echo '<li id="collection-' . $collection->id . '" class="active">' . metadata('collection', array('Dublin Core', 'Title'));
                        } else {
                            echo '<li id="collection-' . $collection->id . '">' . metadata('collection', array('Dublin Core', 'Title'));
                        }
                        echo '<ul>';
                        foreach (loop('items') as $sub_item){
                            if ($recordId === $sub_item->id) {
                                echo '<li class="active">';
                            } else {
                                echo '<li>';
                            }
                    	    echo link_to_item();
                            echo '</li>';
                    	}
                        echo '</ul>';
                        echo '</li>';
                    }
                }
            }
            echo '</ul>';
        }       
        set_current_record('Items', $record);
    ?>
</nav>