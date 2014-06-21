<?php
if ($this->pageCount > 1):
    $getParams = $_GET;
?>

<ul class="pager">
    <?php if (isset($this->previous)): ?>
    <!-- Previous page link --> 
    <li class="pagination_previous">
        <?php $getParams['page'] = $previous; ?>
        <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo __('&lt; Previous'); ?></a>
    </li>
    <?php endif; ?>
        
    <?php if (isset($this->next)): ?>
    <!-- Next page link -->
    <li class="pagination_next ">
        <?php $getParams['page'] = $next; ?>
        <a href="<?php echo html_escape($this->url(array(), null, $getParams)); ?>"><?php echo __('Next &gt;'); ?></a>
    </li>
    <?php endif; ?>
</ul>

<?php endif; ?>
