<?php

// Custom SCKLS
// -- Exhibit Builder Random Featured Exhibit Display
function sckls_exhibit_builder_display_random_featured_exhibit() {
    $html = '';
    $featuredExhibit = exhibit_builder_random_featured_exhibit();
    if ($featuredExhibit) {
        $image = sckls_exhibit_builder_get_first_image_object($featuredExhibit);
    } else {
        $image = '';
    }

    if ($featuredExhibit) {
        $html .= '<a href="' . sckls_exhibit_builder_link_to_exhibit($featuredExhibit) . '" class="featured">';
        $html .= '    <h6 class="header-label">Featured Exhibit</h6>';
        $html .= '    <div class="overlay"></div>';
        $html .= '    <span class="title">' . $featuredExhibit->title . '</span>';
        if ($image) {
            $html .= '<div style="background-image: url(' . file_display_url($image, 'fullsize') . ');" class="img"></div>';
        } else {
            $html .= '<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img default"></div>';
        }
        $html .= '</a>';
    } else {
        $html .= '<h4 class="not-featured">No exhibits added, yet.</h4>';
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

        $items = get_records('Item', array('collection'=>$collection->id), 8);
        set_loop_records('items', $items);
        if (has_loop_records('items')){
            $image = $items[0]->Files;
            if ($image) {
                $html .= '<div style="background-image: url(' . file_display_url($image[0], 'fullsize') . ');" class="img"></div>';
            } else {
                $html .= '<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img default"></div>';
            }
        } else {
            $html .= '<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img default"></div>';
        }
	    $html .= '    <span class="title">' . metadata('collection', array('Dublin Core', 'Title')) . '</span>';
        $html .= '</a>';
	} else {
        $html .= '<h4 class="not-featured">No featured collections.</h4>';
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
                $html .= '<div style="background-image: url(' . file_display_url($image[0], 'fullsize') . ');" class="img"></div>';
            } else {
                $html .= '<div style="background-image: url(' . img('defaultImage@2x.jpg') . ');" class="img default"></div>';
            }
    	    $html .= '    <span class="title">' . metadata('item', array('Dublin Core', 'Title')) . '</span>';
            $html .= '</a>';
    	}
    } else {
        $html .= '<h4 class="not-featured">No featured items.</h4>';
    }
    return $html;
}

function sckls_exhibit_builder_get_first_image_object($exhibit) {
	$file = '';
    $count = 0;

	if (!$exhibit) {
        $exhibit = get_current_record('exhibit');
    }
    set_loop_records('exhibit_page', $exhibit->TopPages);
    
    foreach (loop('exhibit_page') as $exhibitPage) {
        $attachments = $exhibitPage->getAllAttachments();
        foreach ($attachments as $attachment):
            if ($file === ''){
                $item = $attachment->getItem();
                $file = $attachment->getFile();
            }
        endforeach;
    }
    return $file;
}

function sckls_exhibit_builder_get_first_image_html($exhibit) {
	$html = '';
    $count = 0;

	if (!$exhibit) {
        $exhibit = get_current_record('exhibit');
    }
    set_loop_records('exhibit_page', $exhibit->TopPages);
    
    foreach (loop('exhibit_page') as $exhibitPage) {
        $attachments = $exhibitPage->getAllAttachments();
        foreach ($attachments as $attachment):
            if ($count === 0){
                $item = $attachment->getItem();
                $file = $attachment->getFile();
    
                $html .= file_display_url($file, 'fullsize');
            }
            $count++;
        endforeach;
    }
    return $html;
}

function sckls_exhibit_builder_get_images($exhibit) {
	$html = '';

	if (!$exhibit) {
        $exhibit = get_current_record('exhibit');
    }
    set_loop_records('exhibit_page', $exhibit->TopPages);
    
    foreach (loop('exhibit_page') as $exhibitPage) {
        $attachments = $exhibitPage->getAllAttachments();
        foreach ($attachments as $attachment):
            $item = $attachment->getItem();
            $file = $attachment->getFile();

            $html .= '<div class="item">';
            //$html .= '    <a href="' . record_url($item, null, true) . '" class="featured">';
            $html .= '    <a>';
            //$html .= '        <div class="overlay"></div>';
            $html .= '        <div style="background-image: url(' . file_display_url($file, 'fullsize') . ');" class="img"></div>';
            //$html .= '        <span class="title">' . metadata($item, array('Dublin Core', 'Title')) . '</span>';
            $html .= '    </a>';
            $html .= '</div>';
        endforeach;
    }
    return $html;
}

function sckls_exhibit_builder_page_nav($exhibitPage = null) {
    $html = '';
    if (!$exhibitPage) {
        if (!($exhibitPage = get_current_record('exhibit_page', false))) {
            return;
        }
    }

    $exhibit = $exhibitPage->getExhibit();
    $pagesTrail = $exhibitPage->getAncestors();
    $pagesTrail[] = $exhibitPage;
    $html .= '<li>';
    $html .= '<a class="exhibit-title" href="'. html_escape(exhibit_builder_exhibit_uri($exhibit)) . '">';
    $html .= html_escape($exhibit->title) .'</a></li>' . "\n";
    foreach ($pagesTrail as $page) {
        $linkText = $page->title;
        $pageExhibit = $page->getExhibit();
        $pageParent = $page->getParent();
        $pageSiblings = ($pageParent ? exhibit_builder_child_pages($pageParent) : $pageExhibit->getTopPages()); 

        $html .= "<li>\n<ul class='nav nav-pills nav-stacked'>\n";
        foreach ($pageSiblings as $pageSibling) {
            $html .= '<li' . ($pageSibling->id == $page->id ? ' class="current"' : '') . '>';
            $html .= '<a class="exhibit-page-title" href="' . html_escape(exhibit_builder_exhibit_uri($exhibit, $pageSibling)) . '">';
            $html .= html_escape($pageSibling->title) . "</a></li>\n";
        }
        $html .= "</ul>\n</li>\n";
    }
    $html = apply_filters('exhibit_builder_page_nav', $html);
    return $html;
}

function sckls_item_image_gallery($attrs = array(), $imageType = 'square_thumbnail', $filesShow = false, $item = null) {
    if (!$item) {
        $item = get_current_record('item');
    }

    $files = $item->Files;
    if (!$files) {
        return '';
    }

    $defaultAttrs = array(
        'wrapper' => array('id' => 'item-images'),
        'linkWrapper' => array(),
        'link' => array(),
        'image' => array()
    );
    $attrs = array_merge($defaultAttrs, $attrs);
    $count = 1;
    $html = '';

    foreach ($files as $file) {
        $mime = $file->mime_type;

        // Is it the first item? If so, give it a special class name
        if ($count == 1){
            $class = 'image-large';
            $image = file_image($imageType, array('size' => 'fullsize'), $file);
        } else {
            $class = 'image-small';
            $image = file_image($imageType, $attrs['image'], $file);
        }

        // Setup list items with appropriate classes
        if (strstr($mime, 'image') == true) {
            $html .= '<li data-src="' . $file->getWebPath('original') . '" class="' . $class . '">';
        } elseif (strstr($mime, 'video') == true) {
            $html .= '<li data-iframe="true" data-src="' . $file->getWebPath('original') . '?video" class="' . $class . '">';
        } elseif (strstr($mime, 'pdf') == true) {
            $html .= '<li data-iframe="true" data-src="' . $file->getWebPath('original') . '?pdf" class="' . $class . '">';
        } else {
            $html .= '<li data-iframe="true" data-src="' . $file->getWebPath('original') . '" class="' . $class . '">';
        }

        // Get the files/images
        $html .= $image;

        $html .= '</li>';
        $count++;
    }
    return $html;
}