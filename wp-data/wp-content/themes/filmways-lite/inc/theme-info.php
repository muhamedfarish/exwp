<?php
/**
 * Add Theme info Page
 */

function filmways_lite_menu() {
	add_theme_page( esc_html__( 'Filmways Lite', 'filmways-lite' ), esc_html__( 'About Filmways Lite', 'filmways-lite' ), 'edit_theme_options', 'filmways-lite-info', 'filmways_lite_theme_page_display' );
}
add_action( 'admin_menu', 'filmways_lite_menu' );

function filmways_lite_admin_theme_style() {
	wp_enqueue_style('filmways-lite-custom-admin-style', esc_url(get_template_directory_uri()) . '/assets/css/admin-styles.css');
}
add_action('admin_enqueue_scripts', 'filmways_lite_admin_theme_style');

/**
 * Display About page
 */
function filmways_lite_theme_page_display() {
	$theme = wp_get_theme();

	if ( is_child_theme() ) {
		$theme = wp_get_theme()->parent();
	} ?>

		<div class="Grace-wrapper">
			<div class="Grcae-info-holder">
				<div class="Grcae-info-holder-content">
					<div class="Grace-Welcome">
						<h1 class="welcomeTitle"><?php esc_html_e( 'About Theme Info', 'filmways-lite' ); ?></h1>                        
						<div class="featureDesc">
							<?php echo esc_html__( 'The Filmways Lite is a highly attractive and sophisticated looking free Movie Studio WordPress theme. This amazing filmmaker WordPress theme is designed for filmmaker websites, movie studio websites, and other movie-related websites. The homepage of this WordPress theme serves as the perfect eye candy to retain the attention of the viewers on the web. The homepage is developed with Gutenberg block Editor.', 'filmways-lite' ); ?>
						</div>
						
                        <h1 class="welcomeTitle"><?php esc_html_e( 'Theme Features', 'filmways-lite' ); ?></h1>

                        <h2><?php esc_html_e( 'Block Compatibale', 'filmways-lite' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'This is a next-generation WordPress theme that adopts the Full Site Editing concept compatible with Gutenberg blog editor. ', 'filmways-lite' ); ?>
                        </div>
                        
                        <h2><?php esc_html_e( 'Responsive Ready', 'filmways-lite' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'filmways-lite' ); ?>
                        </div>
                        
                        <h2><?php esc_html_e( 'Cross Browser Compatible', 'filmways-lite' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome, Firefox, Safari, Opera, IE11 and above.', 'filmways-lite' ); ?>
                        </div>
                        
                        <h2><?php esc_html_e( 'E-commerce', 'filmways-lite' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'filmways-lite' ); ?>
                        </div>

					</div> <!-- .Grace-Welcome -->
				</div> <!-- .Grcae-info-holder-content -->
				
				
				<div class="Grcae-info-holder-sidebar">
                        <div class="sidebarBX">
                            <h2 class="sidebarBX-title"><?php echo esc_html__( 'Get Filmways PRO', 'filmways-lite' ); ?></h2>
                            <p><?php echo esc_html__( 'More features and options are availbale in premium version.', 'filmways-lite' ); ?></p>
                            <a href="<?php echo esc_url( 'https://gracethemes.com/themes/filmmaker-wordpress-theme/' ); ?>" target="_blank" class="button"><?php esc_html_e( 'Get the PRO Version &rarr;', 'filmways-lite' ); ?></a>
                        </div>


						<div class="sidebarBX">
							<h2 class="sidebarBX-title"><?php echo esc_html__( 'Important Links', 'filmways-lite' ); ?></h2>

							<ul class="themeinfo-links">
                                <li>
									<a href="<?php echo esc_url( 'https://gracethemes.com/demo/filmways/' ); ?>" target="_blank"><?php echo esc_html__( 'Demo Preview', 'filmways-lite' ); ?></a>
								</li>                               
								<li>
									<a href="<?php echo esc_url( 'https://gracethemes.com/documentation/filmways/#homepage-lite' ); ?>" target="_blank"><?php echo esc_html__( 'Documentation', 'filmways-lite' ); ?></a>
								</li>
								
								<li>
									<a href="<?php echo esc_url( 'https://gracethemes.com/wordpress-themes/' ); ?>" target="_blank"><?php echo esc_html__( 'View Our Premium Themes', 'filmways-lite' ); ?></a>
								</li>
							</ul>
						</div>

						<div class="sidebarBX">
							<h2 class="sidebarBX-title"><?php echo esc_html__( 'Leave us a review', 'filmways-lite' ); ?></h2>
							<p><?php echo esc_html__( 'If you are satisfied with Filmways Lite, please give your feedback.', 'filmways-lite' ); ?></p>
							<a href="https://wordpress.org/support/theme/filmways-lite/reviews/" class="button" target="_blank"><?php esc_html_e( 'Submit a review', 'filmways-lite' ); ?></a>
						</div>

				</div><!-- .Grcae-info-holder-sidebar -->	

			</div> <!-- .Grcae-info-holder -->
		</div><!-- .Grace-wrapper -->
<?php } ?>