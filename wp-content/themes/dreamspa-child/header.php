<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="de-DE"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
	<title><?php wp_title( '|', true, 'right' );?></title>
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<?php wp_head();?>
</head>
    <?php  
 //echo($post->ID); 
$section_id = empty( $post->ancestors ) ? $post->ID : end( $post->ancestors );
//echo($section_id);



/* für retreats müsste ich im wp_postmeta die ID abfragen, die die 819 als meta value hat, davon das menu_item_menu_item_parent
 * 735 oder so
 */
 $body_class="";
if ($section_id==739)
    $body_class="blue";

elseif($section_id==756)
    $body_class="green";
else{
    if($post->post_type =="tribe_events"){
        $categories_array= get_the_terms( $post->ID, 'tribe_events_cat');
        $mainCat=$categories_array[0]->name;
        if($mainCat=="Retreat")
            $body_class="green";
    }
}

?>
<body class="boxed <?php echo($body_class);?>">

<!-- **Wrapper** -->
<div class="wrapper">
	<div class="inner-wrapper">
	
        <!-- **Header Wrapper** -->
        <div id="header-wrapper"><!-- **Header** -->
			<header id="header" class="header1">
				<div class="container">
					<div id="logo">				
						<a href="<?php echo home_url();?>" title="Yogavihar">			
							<img class="normal_logo" src="<?php echo CHILD_THEME_BASE_URL;?>images/logo.png" alt="yogaviha" title="yogavihar" />
							<img class="retina_logo" src="<?php echo CHILD_THEME_BASE_URL;?>images/logo@2x.png" alt="yogavihar" title="yogavihar" style="width:70px; height:70px;"/>
						</a>
					</div>
                                     <ul id="language-switcher">
                                        <?php 
                                        $args =array(
                                            'show_names'=>0,
                                            'show_flags'=>1,
                                            'hide_current'=>1

                                        );
                                        pll_the_languages($args);?>
                                    </ul>
				</div>
                           
				<div class="main-menu-wrapper">
					<!-- **Navigation** -->
					<nav id="main-menu">
						<div class="container">
							<div class="dt-menu-toggle" id="dt-menu-toggle">
								<?php _e('Menu','dt_themes');?>
								<span class="dt-menu-toggle-icon"></span>
							</div><?php
								$primaryMenu = NULL;
								if (function_exists('wp_nav_menu')) :
									$primaryMenu = wp_nav_menu(array('theme_location'=>'header_menu','menu_id'=>'','menu_class'=>'menu','fallback_cb'=>'dttheme_default_navigation'
												,'echo'=>false,'container'=>'','walker' => new DTFrontEndMenuWalker()));
								endif;

								if(!empty($primaryMenu)):
									echo $primaryMenu;
								endif;?>
						</div>
					</nav><!-- **Navigation - End** -->  
				</div>
			</header><!-- **Header - End** -->
		</div><!-- **Header Wrapper - End** -->

        <!-- **Main** -->
        <div id="main">
		<?php
                    
            #Header Image Section

                $tpl_default_settings = get_post_meta($post->ID, '_tpl_default_settings', TRUE);
                $tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings : array();
                //Header Image von Event Page Type
                $_EventHeaderImage = get_post_meta($post->ID, '_EventHeaderImage',TRUE);
                
                if(!empty($_EventHeaderImage)){
                    $tpl_default_settings["show_slider"]=1;
                    $tpl_default_settings['slider-image']=$_EventHeaderImage;
                }
                //var_dump($tpl_default_settings);
                if (array_key_exists('show_slider', $tpl_default_settings)) :

                    echo '<!-- **Slider Section** -->';
                    echo '<div id="slider">';


                    echo '<div id="slider-container">';
       
                        $img = isset($tpl_default_settings['slider-image']) ? "<div class='slider-image-only'><img src='{$tpl_default_settings['slider-image']}' alt=''/></div>" : "";
                        echo $img;
                        if( !empty($tpl_default_settings['image-claim'])):
                            echo "<div class='header-image-claim'>&#8222;".stripslashes($tpl_default_settings['image-claim'])."&#8220;";
                            echo "<p class='author'>".stripslashes($tpl_default_settings['image-claim-author'])."</p></div>";
                        endif;
                   
                    echo '</div>';
                    echo '</div><!-- **Slider Section - End** -->';
                endif;


             
                ?>
                <?php 
           	
if( !is_page_template( 'tpl-fullwidth.php' ) ):?>
                <!-- ** Container ** -->
                <div class="container"><?php 
            endif; ?>			