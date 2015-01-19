<?php
$pageTitle = __('Search Items');
echo head(array('title' => $pageTitle,
           'bodyclass' => 'items advanced-search'));
?>

<div class="container single-item">
    <div class="content-block">
        <a href="<?php echo public_url('/'); ?>">&larr; Return to homepage</a>
        <h1><?php echo $pageTitle; ?></h1>
        <?php echo $this->partial('items/search-form.php', array('formAttributes' => array('id'=>'advanced-search-form'))); ?>
    </div>
</div>

<?php echo foot(); ?>
