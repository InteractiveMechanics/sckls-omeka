<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<div class="container">
    <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
    <div class="row">
        <div class="col-sm-3">
            <?php echo common('nav-item'); ?>
        </div>
        <div class="col-sm-9 item-details">
            <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
            <?php $transcription = metadata('item', array('Item Type Metadata', 'Transcription')) ?>
            <ul class="nav nav-tabs">
                <?php if ($transcription): ?>
                    <li class="active"><a href="#transcript" data-toggle="tab">Transcript</a></li>
                <?php endif; ?>
                <li <?php if (!$transcription){ echo 'class="active"'; } ?>><a href="#information" data-toggle="tab">Information</a></li>
            </ul>
            <div class="tab-content">
                <?php if ($transcription): ?>
                <div class="tab-pane active" id="transcript">
                    <?php echo metadata('item', array('Item Type Metadata', 'Transcription')); ?>
                </div>
                <?php endif; ?>
                <div class="tab-pane <?php if (!$transcription){ echo 'active'; } ?>" id="information">
                    <table class="table">
                        <tbody>
                            <?php $collection = get_collection_for_item(); ?>
                            <tr><td>Panel Info</td><td><?php echo metadata($collection, array('Dublin Core', 'Description')); ?></td></tr>
                            <tr><td>Title</td><td><?php echo metadata('item', array('Dublin Core', 'Title')); ?></td></tr>
                            <tr><td>Creator</td><td><?php echo metadata('item', array('Dublin Core', 'Creator')); ?></td></tr>
                            <tr><td>Contributor</td><td><?php echo metadata('item', array('Dublin Core', 'Contributor')); ?></td></tr>
                            <tr><td>Date</td><td><?php echo metadata('item', array('Dublin Core', 'Date')); ?></td></tr>
                            <tr><td>Rights</td><td><?php echo metadata('item', array('Dublin Core', 'Rights')); ?></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo foot(); ?>
