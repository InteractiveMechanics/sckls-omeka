<?php 
    $bodyclass = 'page simple-page';
    $top = simple_pages_earliest_ancestor_page(null);
    
    // Build appropriate page titles
    if (!$top) {
        $top = get_current_record('simple_pages_page');
        $topSlug = metadata($top, 'slug');
    }
    if ($topSlug != metadata('simple_pages_page', 'slug') && ($topSlug == 'advisory-board' || $topSlug == 'people')) {
    	$title = metadata('simple_pages_page', 'title') . ' | ' . metadata($top, 'title');
    	$subtitle = metadata($top, 'title');
    } else {
    	$title = metadata('simple_pages_page', 'title');
    	$subtitle = metadata('simple_pages_page', 'title');
    }
    echo head(array( 'title' => $title, 
    	'bodyclass' => $bodyclass, 
    	'bodyid' => metadata('simple_pages_page', 'slug'),
    	'subtitle' => $subtitle,
    	'currentUriOverride' => url($topSlug)
    ));
    
    // Setup information for custom page routing/templating
    // If there is a file that matches the slug of this page, display that as the template
    // Otherwise, use the template on show.php
    $fname = dirname(__FILE__) . '/' . metadata('simple_pages_page', 'slug') . '.php';
    if (is_file( $fname )):
        include( $fname );
    else :
?>

<div class="container">
    <div class="content-block extra-padding">
        <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
        <p>
            <?php
                $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
                if (metadata('simple_pages_page', 'use_tiny_mce')) {
                    echo $text;
                } else {
                    echo eval('?>' . $text);
                }
            ?>
        </p>
    </div>
</div>

<?php 
    endif;
    echo foot(); 
?>
