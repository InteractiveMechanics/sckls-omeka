<?php echo head(); ?>
<div class="container">
    <div class="content-block">
        <h1><?php echo __('Search Results'); ?> <?php echo search_filters(); ?></h1>
        <?php if ($total_results): ?>
            <table id="search-results" class="table table-hover">
                <thead>
                    <tr>
                        <th><?php echo __('Collection');?></th>
                        <th><?php echo __('Title');?></th>
                        <th><?php echo __('Results');?></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            <?php echo pagination_links(); ?>
        <?php else: ?>
        <div id="no-results">
            <p><?php echo __('Your query returned no results.');?></p>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php echo foot(); ?>