<?php
define( 'CHILD_THEME_BASE_URL',  get_stylesheet_directory_uri().'/' );

// Load translation files from your child theme instead of the parent theme

function themename_setup() {
     load_child_theme_textdomain( 'dt_themes', get_stylesheet_directory() . '/languages' );
    //style css of tiny mce editor-style.css in dreamspa-child
     add_editor_style();
}
add_action( 'after_setup_theme', 'themename_setup' );
add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats' );
/*
 * Modify TinyMCE editor to remove H1.
 */
function tiny_mce_remove_unused_formats($init) {
	// Add block format elements you want to show in dropdown
	$init['block_formats'] = 'Paragraph=p;Heading 1=h2;Heading 2=h3;Address=address;Pre=pre; Button=.dt-sc-button';
	return $init;
}
?>