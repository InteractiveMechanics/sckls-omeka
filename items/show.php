<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<div class="container single-item">
    <div class="content-block">
        <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?> <small><?php echo metadata('item', 'Collection Name'); ?></small></h1>
        
        <div class="row">
            <div class="col-sm-5">
                <?php $images = $item->Files; $imagesCount = 1; ?>
                <?php if ($images): ?>
                <ul id="image-gallery" class="clearfix">
                    <?php foreach ($images as $image): ?>
                        <?php if ($imagesCount === 1): ?>
                            <li class="image-large" data-src="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>">
                                <img src="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>" />
                            </li>
                        <?php else: ?>
                            <li class="image-small" data-src="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>">
                                <img src="<?php echo url('/'); ?>files/original/<?php echo $image->filename; ?>" />
                            </li>
                        <?php endif; ?>
                    <?php $imagesCount++; endforeach; ?>
                </ul>
                <?php else: ?>
                    <div class="no-image">No photos available.</div>
                <?php endif; ?>
            </div>
            <div class="col-sm-7">
                <?php if(metadata('item', array('Dublin Core', 'Description'))): ?>
                    <h6>Description</h6>
                    <p><?php echo metadata('item', array('Dublin Core', 'Description')); ?></p>
                <?php endif; ?>
                <?php if(metadata('item', array('Dublin Core', 'Subject'))): ?>
                    <h6>Subject</h6>
                    <p><?php echo metadata('item', array('Dublin Core', 'Subject')); ?></p>
                <?php endif; ?>
                <?php if(metadata('item', array('Dublin Core', 'Creator'))): ?>
                    <h6>Creator</h6>
                    <p><?php echo metadata('item', array('Dublin Core', 'Creator')); ?></p>
                <?php endif; ?>
                <?php if(metadata('item', array('Dublin Core', 'Date'))): ?>
                    <h6>Date</h6>
                    <p><?php echo metadata('item', array('Dublin Core', 'Date')); ?></p>
                <?php endif; ?>
                <?php if(metadata('item', array('Dublin Core', 'Publisher'))): ?>
                    <h6>Publisher</h6>
                    <p><?php echo metadata('item', array('Dublin Core', 'Publisher')); ?></p>
                <?php endif; ?>
                <?php if(metadata('item', array('Dublin Core', 'Format'))): ?>
                    <h6>Format</h6>
                    <p><?php echo metadata('item', array('Dublin Core', 'Format')); ?></p>
                <?php endif; ?>
                <?php if(metadata('item', array('Dublin Core', 'Source'))): ?>
                    <h6>Source</h6>
                    <p><?php echo metadata('item', array('Dublin Core', 'Source')); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <nav>
            <ul class="pager">
                <li id="previous-item" class="previous"><?php echo link_to_previous_item_show('Previous'); ?></li>
                <li id="next-item" class="next"><?php echo link_to_next_item_show('Next'); ?></li>
            </ul>
        </nav>
    </div>
</div>

<?php echo foot(); ?>
