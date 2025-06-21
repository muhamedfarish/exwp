<?php

// theme setup
if (!function_exists('bravo_setup')):
	function bravo_setup() {
		if (!isset($content_width)) {$content_width = 725;}	
		register_nav_menus( array(
			'primary' => __('Primary Menu', 'bravo'),			
			'footer' => __('Footer Menu', 'bravo')	
		));
		add_theme_support('post-thumbnails');
		add_theme_support('html5', array('search-form'));
		add_theme_support('automatic-feed-links');	
		add_image_size('featured', 725);	
		add_image_size('featured-cropped', 725, 350, true);	
		add_editor_style( get_template_directory_uri() . '/assets/css/editor-style.css');		
	}
endif; 
add_action('after_setup_theme', 'bravo_setup');

// load css 
function bravo_css() {	
	wp_enqueue_style('bravo_lobster', '//fonts.googleapis.com/css?family=Lobster');
	wp_enqueue_style('bravo_raleway', '//fonts.googleapis.com/css?family=Raleway:400,700');	
	wp_enqueue_style('bravo_bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');	   
	wp_enqueue_style('bravo_style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'bravo_css');

// load javascript
function bravo_javascript() {		
	wp_enqueue_script('bravo_script', get_template_directory_uri() . '/assets/js/bravo.js', array('jquery'), '1.0', true);
	if (is_singular() && comments_open()) {wp_enqueue_script('comment-reply');}
}
add_action('wp_enqueue_scripts', 'bravo_javascript');

// sidebar
function bravo_widgets_init() {
	register_sidebar(array(
		'name' => __('Primary Sidebar', 'bravo'),
		'id' => 'primary-sidebar',
		'description' => __('Widgets in this area will appear in the right sidebar on all pages and posts.', 'bravo'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));	
}
add_action('widgets_init', 'bravo_widgets_init');

// page titles
function bravo_title($title, $sep) {
	global $paged, $page;
	if (is_feed()) {
		return $title;
	}
	$title .= get_bloginfo('name');	
	$site_description = get_bloginfo('description', 'display');
	if ( $site_description && (is_home() || is_front_page())) {
		$title = "$title $sep $site_description";
	}	
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __('Page %s', 'bravo'), max($paged, $page));
	}
	return $title;
}
add_filter('wp_title', 'bravo_title', 10, 2);

// custom excerpt
function bravo_custom_excerpt_length($length) {
	return 35;
}
add_filter('excerpt_length', 'bravo_custom_excerpt_length', 999);
function bravo_custom_excerpt_more($more) {
	global $post;
	return '...<p><a class="more-link" href="'. get_permalink($post->ID) . '">'. __('Read More', 'bravo') .'</a></p>';
}
add_filter('excerpt_more', 'bravo_custom_excerpt_more');

// pagination
if (!function_exists('bravo_pagination')):
	function bravo_pagination() {
		global $wp_query;
		$big = 999999999;	
		echo '<div class="page-links">';	
		echo paginate_links( array(
			'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format' => '?paged=%#%',
			'current' => max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages,
			'prev_next' => False,
		));
		echo '</div>';
	}
endif;

// comments
if (!function_exists('bravo_comment')) :
	function bravo_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		?>	
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"> 	
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-header">	
				<div class="comment-author">
					<?php echo get_avatar($comment, 40); ?> 
					<p class="comment-author-name"><span><?php comment_author(); ?></span><br /><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php echo get_comment_date() . ' - ' . get_comment_time() ?></a></p>
				</div>				
			</div>
			<div class="comment-body">			
				<?php comment_text(); ?>
				<?php if ('0' == $comment->comment_approved) : ?>				
					<p class="comment-awaiting-moderation"><?php _e('Comment is awaiting moderation!', 'bravo'); ?></p>					
				<?php endif; ?>				
			</div>			
		</div>
	<?php 
	}
endif;

// theme customizer
function bravo_customize_register($wp_customize) {
	 $wp_customize->add_section(
        'header_hero',
        array(
            'title' => 'Header Hero Content',
            'description' => 'Heading, text & link that appears above the content on all posts & pages.',
            'priority' => 900,
        )
    );
	$wp_customize->add_setting('hero_heading',  array(        
        'sanitize_callback' => 'bravo_sanitize_text'
    )); 	
	$wp_customize->add_control(
	    'hero_heading',
	    array(
	        'label' => 'Heading',
	        'section' => 'header_hero',
	        'type' => 'text',
	    )
	);
	class Customize_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea'; 
	    public function render_content() {
	        ?>
	        <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
	        </label>
	        <?php
	    }
	}	
	$wp_customize->add_setting('hero_text',  array(        
        'sanitize_callback' => 'bravo_sanitize_text'
    )); 
	$wp_customize->add_control(new Customize_Textarea_Control($wp_customize, 'hero_text', array(
	    'label'   => 'Text',
	    'section' => 'header_hero',
	    'settings'   => 'hero_text',
	)));
	$wp_customize->add_setting('hero_url_text', array(
		'sanitize_callback' => 'bravo_sanitize_text'
	)); 	
	$wp_customize->add_control(
	    'hero_url_text',
	    array(
	        'label' => 'Button Text',
	        'section' => 'header_hero',
	        'type' => 'text',
	    )
	);
	$wp_customize->add_setting('hero_url', array(
		'sanitize_callback' => 'esc_url_raw'
	)); 	
	$wp_customize->add_control(
	    'hero_url',
	    array(
	        'label' => 'Button URL',
	        'section' => 'header_hero',
	        'type' => 'text',
	    )
	);
	function bravo_sanitize_text($input) {
    	return wp_kses_post(force_balance_tags($input));
	}	
}
add_action('customize_register', 'bravo_customize_register');

?>