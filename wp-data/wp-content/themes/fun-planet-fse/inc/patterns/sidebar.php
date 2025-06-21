<?php 
/**
 * Default Sidebar
 */
return array(
	'title'      => esc_html__( 'Sidebar', 'fun-planet-fse' ),
	'categories' => array( 'fun-planet-fse', 'sidebar' ),
	'content'    => '<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"0"},"border":{"radius":"7px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-radius:7px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"},"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--50);text-transform:uppercase">Latest Post</h2>
<!-- /wp:heading -->

<!-- wp:latest-posts {"displayPostDate":true,"displayFeaturedImage":true,"featuredImageAlign":"left","featuredImageSizeWidth":70,"featuredImageSizeHeight":70,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"typography":{"lineHeight":"1.6"}},"className":"sidebar-posts"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"radius":"7px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-radius:7px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}},"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--50);text-transform:uppercase">Categories</h2>
<!-- /wp:heading -->

<!-- wp:categories {"showPostCounts":true} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"0"},"border":{"radius":"7px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-radius:7px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}},"typography":{"textTransform":"uppercase"}},"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size" style="margin-bottom:var(--wp--preset--spacing--50);text-transform:uppercase">Archives</h2>
<!-- /wp:heading -->

<!-- wp:archives /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);
