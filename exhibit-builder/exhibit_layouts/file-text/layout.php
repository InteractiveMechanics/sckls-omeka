<?php
$position = isset($options['file-position'])
    ? html_escape($options['file-position'])
    : 'left';
$size = isset($options['original'])
    ? html_escape($options['original'])
    : 'original';
?>
<div class="exhibit-items <?php echo $position; ?> <?php echo $size; ?>">
    <?php foreach ($attachments as $attachment): ?>
        <?php echo $this->exhibitAttachment($attachment, array('imageSize' => 'original'), array(), true); ?>
    <?php endforeach; ?>
</div>
<?php echo $text; ?>