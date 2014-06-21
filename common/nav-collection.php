<?php 
    $collection = get_current_record('Collections', false);
    $collectionId = $collection->id;
    $collectionTitle = metadata('collection', array('Dublin Core', 'Title'));
?>

<nav class="sidebar">
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
                        echo '<ul class="nav nav-pills nav-stacked">';
                        if ($collectionTitle === 'Workshop') {
                            echo '  <li id="collection-' . $collection->id . '" class="active">' . $thisCollectionTitle;
                        } else {
                            echo '  <li id="collection-' . $collection->id . '">' . $thisCollectionTitle;
                        }
                        echo '    <ul>';
                        foreach (loop('items') as $sub_item){
                            echo '  <li>';
                    	    echo link_to_item();
                            echo '  </li>';
                    	}
                        echo '    </ul>';
                        echo '  </li>';
                        echo '</ul>';
                    }
                }
            }
        }
        set_current_record('Collection', $collection);
    ?>
</nav>