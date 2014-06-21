    </div>
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <a href="http://www.neh.gov/" target="_blank">
                        <img src="<?php echo img('neh-logo@2x.jpg', 'images'); ?>" alt="National Endowment of the Humanities" />
                    </a>
                    <?php echo get_theme_option('Footer Text'); ?>
                </div>
            </div>
        </div>
	</footer>
	<?php fire_plugin_hook('public_footer'); ?>
</div> <!-- end .wrapper -->
</body>
</html>