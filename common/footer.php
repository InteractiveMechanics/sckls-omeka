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
                                array( get_theme_option('Theme: Footer1'), get_theme_option('Theme: Footer1link')),
                                array( get_theme_option('Theme: Footer2'), get_theme_option('Theme: Footer2link')),
                                array( get_theme_option('Theme: Footer3'), get_theme_option('Theme: Footer3link'))
                            );
                            foreach ($logos as $logo) {
                                if (!empty($logo[0])){
                                    echo '<div class="col-xs-4 col-sm-6 col-md-4">';
                                    if (!empty($logo[1])){
                                        echo '<a href="' . $logo[1] . '" target="_blank">';
                                    }
                                    echo '        <img src="' . public_url('') . 'files/theme_uploads/' . $logo[0] . '" />';
                                    if (!empty($logo[1])){
                                        echo '</a>';
                                    }
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
            <form id="search-omeka-container" action="<?php echo public_url(''); ?>search" class="clearfix">
                <?php echo search_form(array('show_advanced' => false)); ?>
            </form>
            <?php 
                $googleCode = get_theme_option('Theme: Googlecode');
            ?>
            <?php if($googleCode && !empty($googleCode)): ?>
            <div id="search-library-container" class="hidden clearfix">
                <script>
                  function doSearchBox(){
                      (function() {
                        var cx = '<?php echo $googleCode; ?>';
                        var gcse = document.createElement('script');
                        gcse.type = 'text/javascript';
                        gcse.async = true;
                        gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                            '//www.google.com/cse/cse.js?cx=' + cx;
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(gcse, s);
                      })();}
                  setTimeout(doSearchBox, 0);
                </script>
                <gcse:searchbox-only resultsUrl="<?php echo url('/search?all'); ?>"></gcse:searchbox-only>
            </div>
            <input type="radio" name="search-type" id="search-omeka" checked /> <label for="search-omeka">Search this site</label>
            <input type="radio" name="search-type" id="search-library" /> <label for="search-library">Search all sites</label>
            <div class="pull-right"><?php echo link_to_item_search(__('Advanced Search')); ?></div>
            <?php endif; ?>
        </div>
    </div>
	<?php fire_plugin_hook('public_footer'); ?>
</div>
<?php 
    $statproject = get_theme_option('Theme: Statproject');
    $statsecurity = get_theme_option('Theme: Statsecurity');

    if(($statproject && !empty($statproject)) && ($statsecurity && !empty($statsecurity))): ?>

    <script type="text/javascript">
        var sc_project=<?php echo $statproject; ?>;
        var sc_invisible=1;
        var sc_security="<?php echo $statsecurity; ?>";
        var scJsHost = (("https:" == document.location.protocol) ?
        "https://secure." : "http://www.");
        document.write("<sc"+"ript type='text/javascript' src='" +
        scJsHost+
        "statcounter.com/counter/counter.js'></"+"script>");
    </script>
    <noscript><div class="statcounter"><a title="shopify visitor
    statistics" href="http://statcounter.com/shopify/"
    target="_blank"><img class="statcounter"
    src="http://c.statcounter.com/<?php echo $statproject; ?>/0/<?php echo $statsecurity; ?>/1/"
    alt="shopify visitor statistics"></a></div></noscript>
<?php endif; ?>
</body>
</html>