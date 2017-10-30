<?php
/*
 * Plugin Name: WP Remove Assets
 * Plugin URI: https://www.cozmsolabs.com
 * Version: 0.1
 * Description: Filter particular scripts and style to load in posts or pages that don't need it.
 * Author: Linda Formumm
 * Author URI: https://www.cozmoslabs.com/
*/
 
 
// remove script and style handles we don't need, each with their own conditions
 
add_action('wp_print_scripts', 'wra_filter_scripts', 100000);
add_action('wp_print_footer_scripts', 'wra_filter_scripts', 100000);

// remove styles we don't need
add_action('wp_print_styles', 'wra_filter_styles', 100000);
add_action('wp_print_footer_scripts', 'wra_filter_styles', 100000);

function wra_filter_styles(){
    if (!is_page("wochenplan") && !is_page("weekly-schedule")) {

        wp_deregister_style('timetable_sf_style');
        wp_dequeue_style('timetable_sf_style');

        wp_deregister_style('timetable_style');
        wp_dequeue_style('timetable_style');

        wp_deregister_style('timetable_event_template'); 
        wp_dequeue_style('timetable_event_template');

        wp_deregister_style('timetable_responsive_style');
        wp_dequeue_style('timetable_responsive_style');

        wp_deregister_style('timetable_font_lato');
        wp_dequeue_style('timetable_font_lato');

    }

    //Kontakt und Kursanmeldung
    if (!is_page("contact") && !is_page("kontakt") && !is_page("anmeldung") && !is_page("course-registration")) {
        wp_deregister_style('contact-form-7');
        wp_dequeue_style('contact-form-7');
    }

     //Kontakt
    if (!is_page("contact") && !is_page("kontakt")) {
        wp_deregister_style('responsive_map_css');
        wp_dequeue_style('responsive_map_css');
    }
        
}  

 
function wra_filter_scripts(){
    #wp_deregister_script($handle);
    #wp_dequeue_script($handle);


        //Skripte und Styles bereiningen 
        //Wochenplan
    //if (current_user_can('delete_users') ){
      // $post= get_post();
    //echo($post->post_name);
    //}
    

    //JQuery und Shortcodes
    if (!is_page("videos") && !is_page("videos-2") &&  !is_page("treatments") && !is_page("behandlungen") && !is_page("meinungen") && !is_page("testimonials") && !is_page("wochenplan") && !is_page("weekly-schedule") && !is_page("mantra-cd") && !is_page("mantra-cd-2")) {
         wp_deregister_script('jquery');
         wp_dequeue_script('jquery');
         
         wp_deregister_script('dt-sc-script');
         wp_dequeue_script('dt-sc-script');
    }
    
  
     if (!is_page("meinungen") && !is_page("testimonials")) {
         wp_deregister_script('dt-sc-carouFredSel-script');
         wp_dequeue_script('dt-sc-carouFredSel-script');
    }
    
    if (!is_page("wochenplan") && !is_page("weekly-schedule")) {
        
        wp_deregister_script('jquery-ui-core');
        wp_dequeue_script('jquery-ui-core');

        wp_deregister_script('jquery-ui-tabs');
        wp_dequeue_script('jquery-ui-tabs');

        wp_deregister_script("jquery-ba-bqq");
        wp_dequeue_script("jquery-ba-bqq");

        wp_deregister_script("jquery-carouFredSel");
        wp_dequeue_script("jquery-carouFredSel");

        wp_deregister_script('timetable_main');
        wp_dequeue_script('timetable_main');
    }

    //Kontakt und Kursanmeldung
    if (!is_page("contact") && !is_page("kontakt") && !is_page("anmeldung") && !is_page("course-registration")) {
        wp_deregister_script('contact-form-7');
        wp_dequeue_script('contact-form-7');
    }

     //Kontakt
    if (!is_page("contact") && !is_page("kontakt")) {
        wp_deregister_script('jquerygmap');
        wp_dequeue_script('jquerygmap');

    }
}
 

// list loaded assets by our theme and plugins so we know what we're dealing with. This is viewed by admin users only.
add_action('wp_print_footer_scripts', 'wra_list_assets', 900000);
function wra_list_assets(){
    if ( !current_user_can('delete_users') ){
        return;
    }
 
    echo '<h2>List of all scripts loaded on this particular page.</h2>';
    echo '<p>This can differ from page to page depending of what is loaded in that particular page.</p>';
 
    // Print all loaded Scripts (JS)
    global $wp_scripts;
    wra_print_assets($wp_scripts);
 
    echo '<h2>List of all css styles loaded on this particular page.</h2>';
    echo '<p>This can differ from page to page depending of what is loaded in that particular page.</p>';
    // Print all loaded Styles (CSS)
    global $wp_styles;
    wra_print_assets($wp_styles);
}
 
function wra_print_assets($wp_asset){
    $nb_of_asset = 0;
    foreach( $wp_asset->queue as $asset ) :
        $nb_of_asset ++;
        $asset_obj = $wp_asset->registered[$asset];
        wra_asset_template($asset_obj, $nb_of_asset);
    endforeach;
}
 
function wra_asset_template($asset_obj, $nb_of_asset){
    if( is_object( $asset_obj ) ){
        echo '<div class="wra_asset" style="padding: 2rem; font-size: 0.8rem; border-bottom: 1px solid #ccc;">';
 
        echo '<div class="wra_asset_nb"><span style="width: 150px; display: inline-block">Number:</span>';
        echo $nb_of_asset . '</div>';
 
 
        echo '<div class="wra_asset_handle"><span style="width: 150px; display: inline-block">Handle:</span>';
        echo $asset_obj->handle . '</div>';
 
        echo '<div class="wra_asset_src"><span style="width: 150px; display: inline-block">Source:</span>';
        echo $asset_obj->src . '</div>';
 
        echo '<div class="wra_asset_deps"><span style="width: 150px; display: inline-block">Dependencies:</span>';
        foreach( $asset_obj->deps as $deps){
            echo $deps . ' / ';
        }
        echo '</div>';
 
        echo '<div class="wra_asset_ver"><span style="width: 150px; display: inline-block">Version:</span>';
        echo $asset_obj->ver . '</div>';
 
        echo '</div>';
 
    }
}