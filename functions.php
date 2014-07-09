<?php

// Custom SCKLS
// -- Exhibit Builder Random Featured Exhibit Display
function sckls_exhibit_builder_display_random_featured_exhibit() {
    $html = '';
    $featuredExhibit = exhibit_builder_random_featured_exhibit();
    if ($featuredExhibit) {
        $html .= '<a href="' . sckls_exhibit_builder_link_to_exhibit($featuredExhibit) . '" class="featured">';
        $html .= '    <h6 class="header-label">Featured Exhibit</h6>';
        $html .= '    <div class="overlay"></div>';
        $html .= '    <span class="title">' . $featuredExhibit->title . '</span>';
        $html .= '</a>';
    } else {
        $html .= '<h4>No featured exhibits.</h4>';
    }
    $html = apply_filters('exhibit_builder_display_random_featured_exhibit', $html);
    return $html;
}
function sckls_exhibit_builder_link_to_exhibit($exhibit = null, $exhibitPage = null) {
    if (!$exhibit) {
        $exhibit = get_current_record('exhibit');
    }
    $uri = exhibit_builder_exhibit_uri($exhibit, $exhibitPage);
    return html_escape($uri);
}

// Custom SCKLS
// -- Random Featured Collection
function sckls_random_featured_collection() {
    $html = '';
	$collection = get_db()->getTable('Collection')->findRandomFeatured();
    if ($collection){
        set_current_record('collection', $collection);
		$html .= '<a href="' . record_url($collection, null, true) . '" class="featured">';
        $html .= '    <h6 class="header-label">Featured Collection</h6>';
        $html .= '    <div class="overlay"></div>';
        $image = $collection->Files;
        if ($image) {
            $html .= '<div style="background-image: url(' . file_display_url($image[0], 'original') . ');" class="img"></div>';
        } else {
            $html .= '<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img default"></div>';
        }
	    $html .= '    <span class="title">' . metadata('collection', array('Dublin Core', 'Title')) . '</span>';
        $html .= '</a>';
	} else {
        $html .= '<h4>No featured collections.</h4>';
    }
    return $html;
}

// Custom SCKLS
// -- Random Featured Item
function sckls_random_featured_item() {
    $html = '';
    $items = get_records('Item', array('featured' => true), 1);
    set_loop_records('items', $items);
    if (has_loop_records('items')){
        foreach (loop('items') as $item){
            $html .= '<a href="' . record_url($item, null, true) . '" class="featured">';
            $html .= '    <h6 class="header-label">Featured Item</h6>';
            $html .= '    <div class="overlay"></div>';
            $image = $item->Files;
            if ($image) {
                $html .= '<div style="background-image: url(' . file_display_url($image[0], 'original') . ');" class="img"></div>';
            } else {
                $html .= '<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img default"></div>';
            }
    	    $html .= '    <span class="title">' . metadata('item', array('Dublin Core', 'Title')) . '</span>';
            $html .= '</a>';
    	}
    } else {
        $html .= '<h4>No featured items.</h4>';
    }
    return $html;
}
