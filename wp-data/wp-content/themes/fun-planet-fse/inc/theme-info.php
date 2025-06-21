<?php
/**
 * Add Theme info Page
 */

function fun_planet_fse_menu() {
	add_theme_page( esc_html__( 'Fun Planet FSE', 'fun-planet-fse' ), esc_html__( 'About Fun Planet FSE', 'fun-planet-fse' ), 'edit_theme_options', 'about-fun-planet-fse', 'fun_planet_fse_theme_page_display' );
}
add_action( 'admin_menu', 'fun_planet_fse_menu' );

function fun_planet_fse_admin_theme_style() {
	wp_enqueue_style('fun-planet-fse-custom-admin-style', esc_url(get_template_directory_uri()) . '/assets/css/admin-styles.css');
}
add_action('admin_enqueue_scripts', 'fun_planet_fse_admin_theme_style');

/**
 * Display About page
 */
function fun_planet_fse_theme_page_display() {
	$theme = wp_get_theme();

	if ( is_child_theme() ) {
		$theme = wp_get_theme()->parent();
	} ?>

		<div class="Grace-wrapper">
			<div class="Grcae-info-holder">
				<div class="Grcae-info-holder-content">
					<div class="Grace-Welcome">
						<h1 class="welcomeTitle"><?php esc_html_e( 'About Theme Info', 'fun-planet-fse' ); ?></h1>                        
						<div class="featureDesc">
							<?php echo esc_html__( 'The Fun Planet FSE theme is a highly versatile theme designed for amusement parks, waterparks, and related commercial websites. This theme can make your website reach incredible heights of prosperity by using its amazing features. ', 'fun-planet-fse' ); ?>
						</div>
						
                        <h1 class="welcomeTitle"><?php esc_html_e( 'Theme Features', 'fun-planet-fse' ); ?></h1>

                        <h2><?php esc_html_e( 'Block Compatibale', 'fun-planet-fse' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'fun-planet-fse' ); ?>
                        </div>
                        
                        <h2><?php esc_html_e( 'Responsive Ready', 'fun-planet-fse' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'fun-planet-fse' ); ?>
                        </div>
                        
                        <h2><?php esc_html_e( 'Cross Browser Compatible', 'fun-planet-fse' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'fun-planet-fse' ); ?>
                        </div>
                        
                        <h2><?php esc_html_e( 'E-commerce', 'fun-planet-fse' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'fun-planet-fse' ); ?>
                        </div>

					</div> <!-- .Grace-Welcome -->
				</div> <!-- .Grcae-info-holder-content -->
				
				
				<div class="Grcae-info-holder-sidebar">
                        <div class="sidebarBX">
                            <h2 class="sidebarBX-title"><?php echo esc_html__( 'Get Fun Planet PRO', 'fun-planet-fse' ); ?></h2>
                            <p><?php echo esc_html__( 'More features availbale on Premium version', 'fun-planet-fse' ); ?></p>
                            <a href="<?php echo esc_url( 'https://gracethemes.com/themes/amusement-park-wordpress-theme/' ); ?>" target="_blank" class="button"><?php esc_html_e( 'Get the PRO Version &rarr;', 'fun-planet-fse' ); ?></a>
                        </div>


						<div class="sidebarBX">
							<h2 class="sidebarBX-title"><?php echo esc_html__( 'Important Links', 'fun-planet-fse' ); ?></h2>

							<ul class="themeinfo-links">
                                <li>
									<a href="<?php echo esc_url( 'http://www.gracethemesdemo.com/fun-planet/' ); ?>" target="_blank"><?php echo esc_html__( 'Demo Preview', 'fun-planet-fse' ); ?></a>
								</li>                               
								<li>
									<a href="<?php echo esc_url( 'http://www.gracethemesdemo.com/documentation/fun-planet/#homepage-lite' ); ?>" target="_blank"><?php echo esc_html__( 'Documentation', 'fun-planet-fse' ); ?></a>
								</li>
								
								<li>
									<a href="<?php echo esc_url( 'https://gracethemes.com/wordpress-themes/' ); ?>" target="_blank"><?php echo esc_html__( 'View Our Premium Themes', 'fun-planet-fse' ); ?></a>
								</li>
							</ul>
						</div>

						<div class="sidebarBX">
							<h2 class="sidebarBX-title"><?php echo esc_html__( 'Leave us a review', 'fun-planet-fse' ); ?></h2>
							<p><?php echo esc_html__( 'If you are satisfied with Fun Planet FSE, please give your feedback.', 'fun-planet-fse' ); ?></p>
							<a href="https://wordpress.org/support/theme/fun-planet-fse/reviews/" class="button" target="_blank"><?php esc_html_e( 'Submit a review', 'fun-planet-fse' ); ?></a>
						</div>

				</div><!-- .Grcae-info-holder-sidebar -->	

			</div> <!-- .Grcae-info-holder -->
		</div><!-- .Grace-wrapper -->
<?php } ?>