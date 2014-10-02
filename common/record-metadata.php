<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <h6><?php echo html_escape(__($elementName)); ?></h6>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <p><?php echo $text; ?></p>
        <?php endforeach; ?>
    </div><!-- end element -->
    <?php endforeach; ?>
    <hr>
</div><!-- end element-set -->
<?php endforeach;
