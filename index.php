<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>

<div class="homepage-about">
    <div class="container">
        <div class="col-sm-12">
            <div class="content-block">
                <h6 class="header-label">About the <?php echo option('site_title'); ?></h6>
                <p><?php echo get_theme_option('Homepage: Text'); ?></p>
            </div>
        </div>
    </div>
</div>

<?php $featured = get_theme_option('Homepage: Featured Content'); ?>
<?php if ($featured && !empty($featured)): ?>
<div class="homepage-featured">
    <div class="container">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    <div class="content-block">
                        <h6 class="header-label">Featured Item</h6>
                        <p><?php echo random_featured_items(1); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="content-block">
                        <h6 class="header-label">Featured Collection</h6>
                        <p><?php echo random_featured_items(1); ?></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="content-block">
                    <?php if (function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
                        <h6 class="header-label">Featured Exhibit</h6>
                        <?php echo sckls_exhibit_builder_display_random_featured_exhibit(); ?>
                    <?php else: ?>
                        <h6>View all items</h6>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="homepage-recent">
    <div class="container">
        <div class="col-sm-12">
            <div class="content-block">
                <h6 class="header-label">Recently Added Items</h6>
                <?php 
                    $homepageRecentItems = '6';
                    set_loop_records('items', get_recent_items($homepageRecentItems));
                    if (has_loop_records('items')):
                ?>
                    <div class="items-list slider">
                    <?php foreach (loop('items') as $item): ?>
                        <div class="item">
                            <h3><?php echo link_to_item(); ?></h3>
                        </div>
                    <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p><?php echo __('No recent items available.'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php echo foot(); ?>
