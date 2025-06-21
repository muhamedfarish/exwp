<?php if (is_single()) : ?>
	<?php the_post_thumbnail('featured'); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
		<?php if ('' != get_the_post_thumbnail()) : ?>		
			<h1 id="post-title-img"><?php the_title(); ?></h1>	
		<?php else : ?>
			<h1 id="post-title"><?php the_title(); ?></h1>
		<?php endif; ?>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
		<p id="post-category"><?php _e('Category', 'bravo'); ?>: <?php the_category(', '); ?></p>
		<p id="post-tags"><?php the_tags(); ?></p>
	</article>	
	<div id="post-author">
		<?php echo get_avatar(get_the_author_meta('ID'), 64); ?>
		<p><?php the_author_posts_link(); ?> - <?php the_date(); ?><br /><?php the_author_meta('description'); ?></p>
	</div>
<?php else : ?>	
	<div class="row teaser">
		<div class="col-lg-2 teaser-date-comments">
			<?php if (is_sticky()) :?>
				<p class="sticky"><span>&Star;</span> <?php _e('Featured', 'bravo'); ?></p>
			<?php endif; ?>
			<p><?php the_time('jS M Y'); ?></p>
			<p class="teaser-comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></p>
		</div>	
		<div class="col-lg-10">
			
			    
					<?php the_post_thumbnail('featured-cropped'); ?>
					
		
				<h3 class="teaser-post-title"><a href="<?php echo esc_url( get_permalink()); ?>"><?php the_title(); ?></a></h3>
			<?php the_excerpt(); ?>
		</div>		
	</div>
<?php endif; ?>		