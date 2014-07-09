<div class="container">
    <div class="content-block extra-padding">
        <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
        <p>
            <?php $googleCode = get_theme_option('Theme: Googlecode'); ?>
            <script>
              (function() {
                var cx = '<?php echo $googleCode; ?>';
                var gcse = document.createElement('script');
                gcse.type = 'text/javascript';
                gcse.async = true;
                gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                    '//www.google.com/cse/cse.js?cx=' + cx;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(gcse, s);
              })();
            </script>
            <gcse:searchresults-only></gcse:searchresults-only>
        </p>
    </div>
</div>