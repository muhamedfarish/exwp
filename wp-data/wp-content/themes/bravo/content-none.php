<article>
	<h1><?php _e('Nothing Found','bravo'); ?></h1>
	<?php if (is_home() && current_user_can('publish_posts')) : ?>
		<p><?php printf( __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bravo'), admin_url('post-new.php')); ?></p>
	<?php elseif (is_search()) : ?>
		<h5><?php _e('Search results:', 'bravo'); echo ' "' . get_search_query() . '"'; ?></h5>
		<p><?php _e('Sorry, but nothing matched your search terms. <br />Try again with some different keywords.', 'bravo'); ?></p>
		<?php get_search_form(); ?>
	<?php else : ?>
		<p><?php _e('It seems we cannot find what you&rsquo;re looking for. Perhaps searching can help.', 'bravo'); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</article>