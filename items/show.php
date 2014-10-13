<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<div class="container single-item">
    <div class="content-block">
        <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?> <small><?php echo html_entity_decode(metadata('item', 'Collection Name')); ?></small></h1>
        
        <div class="row">
            <div class="col-sm-5">
                <?php if (metadata('item', 'has files')): ?>
                    <ul id="image-gallery" class="clearfix">
                       <?php echo sckls_item_image_gallery(); ?>
                    </ul>
                <?php else: ?>
                    <img src="<?php echo img('defaultImage@2x.jpg'); ?>" style="max-width:100%;" />
                <?php endif; ?>
            </div>
            <div class="col-sm-7">
                <?php echo all_element_texts('item', array(false, false)); ?>
                <h6>Citation</h6>
                <?php echo metadata('item', 'citation', array('no_escape' => true)); ?>
            </div>
        </div>
        <nav>
            <ul class="pager">
                <li id="previous-item" class="previous"><?php echo link_to_previous_item_show('&larr; Previous'); ?></li>
                <li id="next-item" class="next"><?php echo link_to_next_item_show('Next &rarr;'); ?></li>
            </ul>
        </nav>
    </div>
</div>

<?php echo foot(); ?>
