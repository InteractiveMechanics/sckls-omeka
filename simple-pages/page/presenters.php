<div class="container">
    <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
    <?php
        $items = get_records('Item', array(), 99);
        $id = 0;
        $creators = array();

        function in_array_r($needle, $haystack, $strict = false) {
            foreach ($haystack as $item) {
                if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                    return true;
                }
            }
            return false;
        }

        set_loop_records('items', $items);
        if (has_loop_records('items')){
            foreach (loop('items') as $item){
                $name = metadata($item, array('Dublin Core', 'Creator'));
                $title = metadata($item, array('Dublin Core', 'Title'));
                $creds = metadata($item, array('Dublin Core', 'Subtitle'));
                $url = record_url($item, null, true);

                if (strpos($name, ',') !== FALSE){
                    $names = array_map('trim', explode(',', $name));

                    foreach ($names as $n){
                        $found = false;

                        foreach ($creators as $key => $val) {
                            if ($creators[$key]['name'] == $n) {
                                $new_title = 
                                    array(
                                        'title_name' => $title,
                                        'url' => $url
                                    );
                                array_push($creators[$key]['titles'], $new_title);
                                $found = true;
                            }
                        }
                        if ($found === false) {
                            $creators[$id] = array(
                                'name' => $n,
                                'creds' => $creds,
                                'titles' => array(
                                    'title' => array(
                                        'title_name' => $title,
                                        'url' => $url
                                    )
                                )
                            );
                            $id++;
                        }
                    }
                } else {
                    if (!in_array_r($name, $creators)){
                        $creators[$id] = array(
                            'name' => $name,
                            'creds' => $creds,
                            'titles' => array(
                                'title' => array(
                                    'title_name' => $title,
                                    'url' => $url
                                )
                            )
                        );
                    } else {
                        while (list($var, $val) = each($creators)) {
                            if ($creators[$var]['name'] == $name) {
                                $new_title = 
                                    array(
                                        'title_name' => $title,
                                        'url' => $url
                                    );
                                array_push($creators[$var]['titles'], $new_title);
                            }
                        }
                    }
                    $id++;
                }
        	}
            sort($creators);
        }

        if ($creators != ''){
            echo '<div class="row">';
            foreach ($creators as $creator){
                echo '<div class="col-md-6">';
                echo '  <div class="presenter">';
                echo '    <h3>'. $creator['name'] .'</h3>';
                if ($creator['creds'] != null) {
                    echo '    <p>'. $creator['creds'] .'</p>';
                }
                echo '    <h5>Panels and Talks</h5>';
                echo '    <ul>';
                while (list($var, $val) = each($creator['titles'])) {
                    echo '<li><a href="'. $creator['titles'][$var]['url'] .'">'. $creator['titles'][$var]['title_name'] .'</a></li>';
                }
                echo '    </ul>';
                echo '  </div>';
                echo '</div>';
            }
            echo '</div>';
        }
    ?>
</div>
