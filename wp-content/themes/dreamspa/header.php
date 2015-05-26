    <!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<?php dttheme_is_mobile_view(); ?>
	<title><?php
		$status = dttheme_is_plugin_active('all-in-one-seo-pack/all_in_one_seo_pack.php') || dttheme_is_plugin_active('wordpress-seo/wp-seo.php');
		if (!$status) :
			$title = dttheme_public_title();

			if( !empty( $title) )
				echo $title;
			else
				wp_title( '|', true, 'right' );
		else:
			wp_title( '|', true, 'right' );
		endif;		
	?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]--><?php

    if( dttheme_option('integration', 'enable-header-code') ):
    	echo stripslashes(dttheme_option('integration', 'header-code'));
    endif;
    wp_head();?>
</head>
<?php $body_class_arg  = ( dttheme_option("appearance","layout") === "boxed" ) ? array("boxed") : array(); ?>
<body <?php body_class( $body_class_arg ); ?>>
<?php $picker = dttheme_option("general","disable-picker");
    if(!isset($picker) && !is_user_logged_in() ):   dttheme_color_picker(); endif;?>
<!-- **Wrapper** -->
<div class="wrapper">
	<div class="inner-wrapper">

        <!-- **Header Wrapper** -->
        <div id="header-wrapper"><?php
        	if( is_page_template('tpl-header1.php') ):
        		$header = "header1";
        	elseif( is_page_template('tpl-header2.php') ):
        		$header = "header2";
        	elseif( is_page_template('tpl-header3.php') ):
        		$header = "header3";
        	elseif( is_page_template('tpl-header4.php') ):
        		$header = "header4";
        	else:
		  		$header = dttheme_option("appearance","header_type");
		  		$header = !empty($header) ? $header : "header1";
        	endif;
			
			require_once IAMD_DIR."/headers/{$header}.php";
        ?></div><!-- **Header Wrapper - End** -->

        <!-- **Main** -->
        <div id="main"><?php

            #Slider Section
            if( is_page() ):
                global $post;
                dttheme_slider_section( $post->ID); 
            endif;

            #Sub Title Section
            require_once( get_template_directory()."/framework/sub-title.php");

            if( !is_page_template( 'tpl-fullwidth.php' ) ):?>
                <!-- ** Container ** -->
                <div class="container"><?php 
            endif; ?>                 