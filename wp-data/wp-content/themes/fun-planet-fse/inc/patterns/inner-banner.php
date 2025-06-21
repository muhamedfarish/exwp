<?php  
/**
 * Header Inner Banner
 */
return array(
	'title'      => esc_html__( 'Inner Banner', 'fun-planet-fse' ),
	'categories' => array( 'fun-planet-fse', 'Inner Banner' ),
	'content'    => '<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( '/assets/images/inner-banner.jpg' ) ) . '","id":523,"dimRatio":50} -->
<div class="wp-block-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-523" alt="" src="' . esc_url( get_theme_file_uri( '/assets/images/inner-banner.jpg' ) ) . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->',
);
