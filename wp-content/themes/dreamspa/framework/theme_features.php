<?php if (!function_exists('dt_theme_features')) {

	// Register Theme Features
	function dt_theme_features() {
		global $wp_version;
		
		// Add theme support for Custom Background
		$b_args = array(
			'default-color' => 'ffffff',
			'default-image' => '',
			'wp-head-callback' => '_custom_background_cb',
			'admin-head-callback' => '',
			'admin-preview-callback' => ''
		);
		add_theme_support('custom-background', $b_args);
		// END of Custom Background Feature

		// Add theme support for Custom Header
		$hargs = array( 'default-image'=>'',	'random-default'=>false,	'width'=>0,					'height'=>0,
				'flex-height'=> false,	'flex-width'=> false,		'default-text-color'=> '',	'header-text'=> false,
				'uploads'=> true,		'wp-head-callback'=> '',	'admin-head-callback'=> '',	'admin-preview-callback' => '');
				
		add_theme_support('custom-header', $hargs);
		// END of Custom Header Feature
		
		
		# Now Theme supports WooCommerce
		add_theme_support('woocommerce');

		// Add theme support for Translation
		load_theme_textdomain('dt_themes', IAMD_DIR.'/languages');

		// Add theme support for Post Formats
		$formats = array(
			'status',
			'quote',
			'gallery',
			'image',
			'video',
			'audio',
			'link',
			'aside',
			'chat'
		);
		add_theme_support('post-formats', $formats);
		// END of Post Formats

		// Add theme support for custom CSS in the TinyMCE visual editor
		add_editor_style('custom-editor-style.css');

		// Add theme support for Automatic Feed Links
	
		add_theme_support('automatic-feed-links');
		// END of Automatic Feed Links

		// Add theme support for Featured Images
		add_theme_support('post-thumbnails', array('post','page','product','dt_services','dt_staffs'));
		
		add_image_size('dt-default-1-column','1060','795');
		add_image_size('dt-default-1-column-with-sidebar','780','585');
		add_image_size('dt-default-2-columns','530','397');
		add_image_size('dt-default','420','315');
		
		
		add_image_size('tpl-fullwidth-2-columns','960','720');
		add_image_size('tpl-fullwidth-3-columns','639','480');
		add_image_size('tpl-fullwidth-4-columns','480','360');
		
		add_image_size('blog-one-column','920','536');
		add_image_size('blog-two-column','420','245');
		add_image_size('blog-one-column-with-sidebar','640','373');
		
		
		if (version_compare($wp_version, '3.6', '>=')) :
		
			$args = array(
				'search-form',
				'comment-form',
				'comment-list'
			);
		
			add_theme_support( 'html5', $args );		
		endif;

	}
	// Hook into the 'after_setup_theme' action
	add_action('after_setup_theme', 'dt_theme_features');

}

if (!function_exists('dt_theme_navigation_menus')) {

	// Register Navigation Menus
	function dt_theme_navigation_menus() {
		$locations = array( 
			'header_menu' => __('Header Menu', 'dt_themes')
		);
		register_nav_menus($locations);
	}

	// Hook into the 'init' action
	add_action('init', 'dt_theme_navigation_menus');
}

if (!function_exists('dttheme_activation_function')) {

	function dttheme_activation_function($oldname, $oldtheme=false) {
		update_option(IAMD_THEME_SETTINGS, dttheme_default_option());
	}

	add_action("after_switch_theme", "dttheme_activation_function", 10 , 2);
}?>