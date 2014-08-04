<?php
    $title = __('Browse Exhibits');
    echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<div class="container">
    <?php if (count($exhibits) > 0): ?>
        <?php $exhibitCount = 0; ?>
    
        <?php foreach (loop('exhibit') as $exhibit): ?>
            <div class="content-block exhibit">
                <?php $exhibitCount++; ?>
                <h1><?php echo link_to_exhibit(); ?></h1>
                <div class="items-list slider exhibit-slider">
                    <?php print_r(sckls_exhibit_builder_get_images($exhibit)); ?>
                </div>
                <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                    <hr>
                    <?php echo $exhibitDescription; ?>
                    <?php echo link_to_exhibit('View this exhibit', array('class' => 'link-to-exhibit')); ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <?php echo pagination_links(); ?>
    
    <?php else: ?>
        <div class="content-block">
            <h1>Browse all exhibits</h1>
            <p><?php echo __('There are no exhibits available yet.'); ?></p>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php echo foot(); ?>
