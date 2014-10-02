<?php
    $fileTitle = metadata('file', array('Dublin Core', 'Title')) ? strip_formatting(metadata('file', array('Dublin Core', 'Title'))) : metadata('file', 'original filename');

    if ($fileTitle != '') {
        $fileTitle = ': &quot;' . $fileTitle . '&quot; ';
    } else {
        $fileTitle = '';
    }
    $fileTitle = __('File #%s', metadata('file', 'id')) . $fileTitle;
?>
<?php echo head(array('title' => $fileTitle, 'bodyclass'=>'files show primary-secondary')); ?>

<div class="container single-item">
    <div class="content-block">
        <h1><?php echo $fileTitle; ?></h1>
        <div class="row">
            <div class="col-sm-5">
                <?php echo file_markup($file, array('imageSize'=>'original')); ?>
            </div>
            <div class="col-sm-7">
                <?php echo all_element_texts('file'); ?>
                <div id="original-filename" class="element">
                    <h6><?php echo __('Original Filename'); ?></h6>
                    <p class="element-text"><?php echo metadata('file', 'Original Filename'); ?></p>
                </div>
                <div id="file-size" class="element">
                    <h6><?php echo __('File Size'); ?></h6>
                    <p class="element-text"><?php echo __('%s bytes', metadata('file', 'Size')); ?></p>
                </div>
        
                <div id="authentication" class="element">
                    <h6><?php echo __('Authentication'); ?></h6>
                    <p class="element-text"><?php echo metadata('file', 'Authentication'); ?></p>
                </div>
                <div id="mime-type-browser" class="element">
                    <h6><?php echo __('Mime Type'); ?></h6>
                    <p class="element-text"><?php echo metadata('file', 'MIME Type'); ?></p>
                </div>
                <div id="file-type-os" class="element">
                    <h6><?php echo __('File Type / OS'); ?></h6>
                    <p class="element-text"><?php echo metadata('file', 'Type OS'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo foot();?>
