    </div>
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3><?php echo link_to_home_page(); ?></h3>
                    <p>South Central Kansas Library System<br>Copyright &copy; <?php echo date('Y'); ?> <?php echo option('site_title'); ?></p>
                </div>
                <div class="col-sm-6">
                    <div class="row partners">
                        <?php 
                            $logos = array(
                                get_theme_option('Theme: Footer1'),
                                get_theme_option('Theme: Footer2'),
                                get_theme_option('Theme: Footer3')
                            );
                            foreach ($logos as $logo) {
                                if (!empty($logo)){
                                    echo '<div class="col-xs-4 col-sm-6 col-md-4">';
                                    echo '    <img src="' . url('/') . '/files/theme_uploads/' . $logo . '" />';
                                    echo '</div>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
	</footer>

    <div id="search-overlay" style="display: none;">
        <div class="container">
            <div class="close">&times;</div>
            <span class="glyphicon glyphicon-search"></span>
            <form id="search-omeka-container" action="<?php echo public_url(''); ?>search">
                <?php echo search_form(array('show_advanced' => false, 'form_attributes' => 'class')); ?>
            </form>
            <?php $googleCode = get_theme_option('Theme: Googlecode'); ?>
            <?php if($googleCode && !empty($googleCode)): ?>
            <div id="search-library-container" class="hidden">
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
                <gcse:searchbox-only resultsUrl="<?php echo url('/search-all'); ?>"></gcse:searchbox-only>
            </div>
            <input type="radio" name="search-type" id="search-omeka" checked /> <label for="search-omeka">Search the library</label>
            <input type="radio" name="search-type" id="search-library" /> <label for="search-library">Search the library system</label>
            <?php endif; ?>
        </div>
    </div>
	<?php fire_plugin_hook('public_footer'); ?>
</div> <!-- end .wrapper -->
</body>
</html>