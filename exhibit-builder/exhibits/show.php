<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>

<div class="container">
    <div class="content-block">
        <h1><?php echo metadata('exhibit_page', 'title'); ?></h1>
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-9">
                <?php exhibit_builder_render_exhibit_page(); ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3 exhibit-nav">
                <ul class="nav nav-pills nav-stacked">
                    <?php echo sckls_exhibit_builder_page_nav(); ?>
                    <?php echo exhibit_builder_child_page_nav(); ?>
                </ul>
            </div>
        </div>      
        
        <ul class="pager">
            <hr>
            <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
                <li class="previous"><?php echo $prevLink; ?></li>
            <?php endif; ?>
            <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
                <li class="next"><?php echo $nextLink; ?></li>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php echo foot(); ?>
