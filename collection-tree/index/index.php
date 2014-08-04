<?php echo head(array('title' => __('Collection Tree'))); ?>

<div class="container">
    <div class="content-block browse-page">
        <h1>Collection tree</h1>
        <?php if ($this->full_collection_tree): ?>
            <?php echo $this->full_collection_tree; ?>
        <?php else: ?>
            <p><?php echo __('No collections have been added, yet'); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php echo foot(); ?>