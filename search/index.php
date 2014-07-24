<?php echo head(); $searchRecordTypes = get_search_record_types(); ?>
<div class="container">
    <div class="content-block">
        <h1><?php echo __('Search Results'); ?> <?php echo search_filters(); ?></h1>
        <?php if ($total_results): ?>
            <table id="search-results" class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:25%;"><?php echo __('Type');?></th>
                        <th style="width:50%;"><?php echo __('Title');?></th>
                        <th><?php echo __('Results');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (loop('search_texts') as $searchText): ?>
                    <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
                    <tr>
                        <td style="width:25%;"><?php echo $searchRecordTypes[$searchText['record_type']]; ?></td>
                        <td style="width:50%;">
                            <a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a>
                        </td>
                        <td><?php echo $searchText['text']; ?></td>
                    </tr>
                    <?php endforeach; ?>
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