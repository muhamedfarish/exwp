<footer>	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php wp_nav_menu(array('theme_location' => 'footer','depth' => 1,'container' => 'false','fallback_cb' => 'false')); ?>	
				<p id="footer-meta"><?php bloginfo('description'); ?></p>
				<p id="footer-copyright"><?php _e('Copyright &copy; 2014 All rights reserved', 'bravo'); ?> <a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <a href="http://www.wpmultiverse.com/themes/bravo/" title="Bravo WordPress Theme">Bravo Theme</a></p>				
			</div>
		</div>
	</div>
</footer>
</div>
<?php wp_footer(); ?>   
</body>
</html>