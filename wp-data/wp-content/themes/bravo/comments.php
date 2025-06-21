<?php if (post_password_required()) { return; } ?>
<div id="comments">
	<?php if (have_comments()) : ?>
		<h4 id="comments-title"><?php _e('Comments', 'bravo'); ?></h4>		
		<ol class="comment-list">
			<?php wp_list_comments(array('type' => 'comment', 'callback' => 'bravo_comment')); ?>
		</ol>
		<div class="page-links"><?php paginate_comments_links(); ?></div> 
		<?php if (!comments_open()) : ?>
			<p class="no-comments"><?php _e('Comments are closed.', 'bravo'); ?></p>
		<?php endif; ?>
	<?php endif; ?>	
	<?php 
		$fields = array(	
			'comment_notes_before' => '<p class="comment-notes">' . __('Your email address will not be published / Required fields are marked *', 'bravo') . '</p>',		
			'fields' => apply_filters( 'comment_form_default_fields', array(		
				'author' => '<div class="col-md-6"><label for="author">Name*</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" /></div>',			
				'email' => '<div class="col-md-6"><label for="email">Email*</label><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" /></div>',
				'url' => '<div class="col-md-12"><label for="url">Website</label><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url'] ) . '" /></div>')
			),
		);	
		comment_form($fields); 
	?>	
</div>