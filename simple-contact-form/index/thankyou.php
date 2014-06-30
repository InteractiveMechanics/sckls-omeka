<?php echo head(); ?>

<div class="container">
    <div class="content-block">
        <div id="primary">
        <h1><?php echo html_escape(get_option('simple_contact_form_thankyou_page_title')); // Not HTML ?></h1>
        <?php echo get_option('simple_contact_form_thankyou_page_message'); // HTML ?>
        </div>
    </div>
</div>

<?php echo foot(); ?>