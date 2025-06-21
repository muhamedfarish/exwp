<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" /> 
	<title><?php wp_title( '|', true, 'right' ); ?></title>              
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link rel="profile" href="http://gmpg.org/xfn/11" />        
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />    
    <!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.js"></script>
	<![endif]-->    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>	
	<div id="header-sticky">
		<div class="container">	
			<div id="header-top" class="row">
				<div class="col-md-4">
					<a id="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
				</div>
				<div class="col-md-8">
					<a id="hamburger" href="#">
						<span></span>
						<span></span>
						<span></span>
					</a>	
					<nav>			
						<?php wp_nav_menu(array('theme_location' => 'primary','depth' => 2,'container' => 'false','fallback_cb' => 'false')); ?>										
					</nav>
				</div>
			</div>
		</div>
	</div>
	<?php if (get_theme_mod('hero_text') || get_theme_mod('hero_heading')) : ?>
		<div class="container">	
			<div id="hero-block" class="row">
				<div class="col-md-9">						
					<h3><?php echo get_theme_mod('hero_heading'); ?></h3>
					<p><?php echo get_theme_mod('hero_text'); ?></p>
				</div>
				<div class="col-md-3">	
					<?php if (get_theme_mod('hero_url')) : ?>
						<a href="<?php echo get_theme_mod('hero_url'); ?>"><?php echo get_theme_mod('hero_url_text'); ?> <span>&rarr;</span></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</header>
<div class="container">	