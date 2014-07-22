<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>

<div class="container">
    <div class="content-block">
        <h1><?php echo metadata('exhibit', 'title'); ?></h1>
        <div class="row">
            <div class="col-sm-9">
                <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                    <?php echo $exhibitDescription; ?>
                <?php endif; ?>
                <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
                    <h3><?php echo __('Credits'); ?></h3>
                    <p><?php echo $exhibitCredits; ?></p>
                <?php endif; ?>
            </div>
            <div class="col-sm-3">
                <ul class="nav nav-pills nav-stacked">
                    <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
                    <?php foreach (loop('exhibit_page') as $exhibitPage): ?>
                    <?php echo exhibit_builder_page_summary($exhibitPage); ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php echo foot(); ?>
