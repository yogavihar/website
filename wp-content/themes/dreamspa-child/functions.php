<?php
define( 'CHILD_THEME_BASE_URL',  get_stylesheet_directory_uri().'/' );

// Load translation files from your child theme instead of the parent theme
function my_child_theme_locale() {
    load_child_theme_textdomain( 'dt_themes', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_child_theme_locale' );
?>