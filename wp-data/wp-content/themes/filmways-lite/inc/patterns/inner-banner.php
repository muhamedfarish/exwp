<?php 
/**
 * Header Inner Banner
 */
return array(
	'title'      => esc_html__( 'Inner Banner', 'filmways-lite' ),
	'categories' => array( 'filmways-lite', 'Inner Banner' ),
	'content'    => '<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( '/assets/images/inner-banner.jpg' ) ) . '","id":420,"dimRatio":50,"minHeight":200,"minHeightUnit":"px","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-cover" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:200px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-420" alt="" src="' . esc_url( get_theme_file_uri( '/assets/images/inner-banner.jpg' ) ) . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container"></div></div>
<!-- /wp:cover -->',
);


