<?php

/* 
Plugin Name: Termine
Description: Kurse, Retreats, Ausbildungen für Yogavihar verwalten
Author: Linda Formumm
Version:0.1
 */
add_action('init','post_type_courses');
function post_type_courses(){
    register_post_type(
            'course',
            array(
                    'labels'   =>array('name' => 'Termine', 'singular_name'=>'Termin', 'edit_item'=>'Termin bearbeiten',  'add_item'=>'Termin erstellen'),
                    'public' => true,
                    'menu_icon' => 'dashicons-calendar-alt',
                    'rewrite'           => array(
                        'slug'       => 'courses',
                        'with_front' => FALSE,
                    ),
                    'show_in_nav_menus' => true,
                    'menu_position'     => 3,
                    'show_ui' => true,
                    'supports' => array(
                        'title',
                        'editor',
                        'excerpt',
                        'thumbnail',
                        'custom-fields',
                        'revisions')
                )
    );
            
}
add_action('add_meta_boxes','course_add_custom_box');
add_action('save_post','course_save_postdata');


function course_add_custom_box(){
    //add_meta_box('');
}

function  course_save_postdata($post_id){
   //echo "course_save_postdata<br><br>";
   //echo "<pre>";
    //var_dump($_POST["acf"]['field_57f946f9528db']);
     //noch unbedingt gegen die aktuellen fields austauschen
     //
    //ganztägig
    //lokal
    /*if($_POST["acf"]['field_56b5f78f5a233']==1){
        $datum_von=date("Y-m-d",strtotime ($_POST["acf"]['field_57f946f9528db'][0]["field_56b5f78f680de"]))." 00:00:00";
        $datum_bis=date("Y-m-d",strtotime ($_POST["acf"]['field_57f946f9528db'][0]["field_56b5f78f684c6"]))." 23:59:59";
    }
    else{
        $datum_von=date("Y-m-d",strtotime ($_POST["acf"]['field_57f946f9528db'][0]["field_56b5f78f680de"]))." ". $_POST["acf"]['field_57f946f9528db'][0]["field_56b5f78f688af"].":00";
        $datum_bis=date("Y-m-d",strtotime ($_POST["acf"]['field_57f946f9528db'][0]["field_56b5f78f684c6"]))." ". $_POST["acf"]['field_57f946f9528db'][0]["field_56b5f78f68c97"].":59";
    }*/
    if($_POST["acf"]['field_580cee8f78340']==1){
        $datum_von=date("Y-m-d",strtotime ($_POST["acf"]['field_580ceec578341'][0]["field_580ceef078342"]))." 00:00:00";
        $datum_bis=date("Y-m-d",strtotime ($_POST["acf"]['field_580ceec578341'][0]["field_580cef3b78343"]))." 23:59:59";
    }
    else{
        $datum_von=date("Y-m-d",strtotime ($_POST["acf"]['field_580ceec578341'][0]["field_580ceef078342"]))." ". $_POST["acf"]['field_580ceec578341'][0]["field_580cefc878344"].":00";
        $datum_bis=date("Y-m-d",strtotime ($_POST["acf"]['field_580ceec578341'][0]["field_580cef3b78343"]))." ". $_POST["acf"]['field_580ceec578341'][0]["field_580cf01678346"].":59";
    }
    
    
    //YYYY-MM-DD HH:MM:SS

    //echo "$datum_von <br>$datum_bis";
   update_post_meta($post_id, "start_date", $datum_von);
   update_post_meta($post_id, "end_date", $datum_bis);
   
    //die;

}

 





