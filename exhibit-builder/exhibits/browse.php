<?php
    $title = __('Browse Exhibits');
    echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<div class="container">
    <div class="content-block">
        <?php if (count($exhibits) > 0): ?>
                
        <?php $exhibitCount = 0; ?>
        <?php foreach (loop('exhibit') as $exhibit): ?>
            <?php $exhibitCount++; ?>
            <div class="exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
                <h1><?php echo link_to_exhibit(); ?></h1>
                <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                    <hr>
                    <p><?php echo $exhibitDescription; ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        
        <?php echo pagination_links(); ?>
        
        <?php else: ?>
        <p><?php echo __('There are no exhibits available yet.'); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php echo foot(); ?>
