<?php
class DTCoreShortcodesDefination {
	
	function __construct() {
		
		/* Accordion Shortcode */
		add_shortcode ( "dt_sc_accordion_group", array (
				$this,
				"dt_sc_accordion_group" 
		) );

		/* Button Shortcode */
		add_shortcode ( "dt_sc_button", array (
				$this,
				"dt_sc_button" 
		) );

		/* BlockQuotes Shortcode */
		add_shortcode ( "dt_sc_blockquote", array (
				$this,
				"dt_sc_blockquote" 
		) );

		/* Callout Box Shortcode */
		add_shortcode ( "dt_sc_callout_box", array (
				$this,
				"dt_sc_callout_box"
		) );

		/* Columns Shortcode */
		
		add_shortcode ( "dt_sc_full_width", array ( 
				$this,
				"dt_sc_columns"
		) );
		
		add_shortcode ( "dt_sc_one_half", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_third", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_fourth", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_fifth", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_sixth", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_sixth", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_third", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_fourth", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_fifth", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_fifth", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_fifth", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_sixth", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_sixth", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_five_sixth", array (
				$this,
				"dt_sc_columns" 
		) );

		/* Column with inner */
		add_shortcode ( "dt_sc_one_half_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_third_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_fourth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_fifth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_one_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_third_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_fourth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_two_fifth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_fifth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_four_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_three_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_five_sixth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		add_shortcode ( "dt_sc_four_fifth_inner", array (
				$this,
				"dt_sc_columns" 
		) );

		/* Contact Information */

		/* Title Shortcode */
		add_shortcode ( "dt_sc_h1", array ( 
			$this,
			"dt_sc_title"
		) );

		add_shortcode ( "dt_sc_h2", array ( 
			$this,
			 "dt_sc_title"
		) );

		add_shortcode ( "dt_sc_h3", array ( 
			$this,
			"dt_sc_title"
		) );

		add_shortcode ( "dt_sc_h4", array ( 
			$this,
			"dt_sc_title"
		) );
		
		add_shortcode ( "dt_sc_h5", array ( 
			$this,
			"dt_sc_title"
		) );
		
		add_shortcode ( "dt_sc_h6", array ( 
			$this, 
			"dt_sc_title"
		) );
		/* Title Shortcode End */

		#Email
		add_shortcode ( "dt_sc_email", array (
				$this,
				"dt_sc_email"
		) );

		add_shortcode( "dt_sc_contact", array (
				$this,
				"dt_sc_contact"
		) );

		add_shortcode( "dt_sc_address", array(
				$this,
				"dt_sc_address"
		) );
		/* Contact Information End */

		/* Clients Carousel Shortcode */
		add_shortcode ( "dt_sc_carousel", array (
				$this,
				"dt_sc_carousel"
		) );

		/* Donutchart Start */
		add_shortcode ( "dt_sc_donutchart_small", array ( 
				$this,
				"dt_sc_donutchart"
		) );
		
		add_shortcode ( "dt_sc_donutchart_medium", array ( 
				$this,
				"dt_sc_donutchart"
		) );

		add_shortcode ( "dt_sc_donutchart_large", array ( 
				$this,
				"dt_sc_donutchart"
		) );
		/* Donutchart End */
		
		/* Dividers */
		
		/* Clear Shortcode */
		add_shortcode ( "dt_sc_clear", array ( 
				$this,
				"dt_sc_clear"
		) );
		
		/* HR With Border */
		add_shortcode( "dt_sc_hr_border", array (
				$this,
				"dt_sc_hr_border"
		) );

		add_shortcode ( "dt_sc_hr", array (
				$this,
				"dt_sc_dividers" 
		) );
		
		add_shortcode ( "dt_sc_hr_top", array (
				$this,
				"dt_sc_hr_top"
		) );
		
		add_shortcode ( "dt_sc_hr_medium", array (
				$this,
				"dt_sc_dividers" 
		) );
		
		add_shortcode ( "dt_sc_hr_large", array (
				$this,
				"dt_sc_dividers" 
		) );
		
		add_shortcode ( "dt_sc_hr_invisible", array (
				$this,
				"dt_sc_dividers" 
		) );
	
		add_shortcode ( "dt_sc_hr_invisible_small", array (
				$this,
				"dt_sc_dividers" 
		) );

		add_shortcode ( "dt_sc_hr_invisible_medium", array (
				$this,
				"dt_sc_dividers" 
		) );
		
		add_shortcode ( "dt_sc_hr_invisible_large", array (
				$this,
				"dt_sc_dividers" 
		) );
		/* Dividers End */
		
		/* Icon Boxes Shortcode */
		add_shortcode ( "dt_sc_icon_box", array (
				$this,
				"dt_sc_icon_box" 
		) );
		/* Icon Boxes Shortcode End*/

		/* Icon Boxes Shortcode */
		add_shortcode ( "dt_sc_icon_box_colored", array (
				$this,
				"dt_sc_icon_box_colored" 
		) );
		/* Icon Boxes Shortcode End*/
		
		/* Dropcap Shortcode */
		add_shortcode ( "dt_sc_dropcap", array (
				$this,
				"dt_sc_dropcap" 
		) );
		
		/* Code Shortcode */
		add_shortcode ( "dt_sc_code", array (
				$this,
				"dt_sc_code" 
		) );

		/* Ordered List Shortcode */
		add_shortcode ( "dt_sc_fancy_ol", array (
				$this,
				"dt_sc_fancy_ol" 
		) );
		
		/* Unordered List Shortcode */
		add_shortcode ( "dt_sc_fancy_ul", array (
			$this,
			"dt_sc_fancy_ul" 
		) );

		add_shortcode ("dt_sc_fancy_ul_alt", array ( 
			$this,
			"dt_sc_fancy_ul_alt"
		) );

		/* Pricing Table */
		add_shortcode ( "dt_sc_pricing_table", array (
				$this,
				"dt_sc_pricing_table" 
		) );
		
		/* Used in Page Builder */
		add_shortcode( "dt_sc_pricing_table_rounded", array (
				$this,
				"dt_sc_pricing_table" 
		) );

		/* Used in Page Builder */
		add_shortcode( "dt_sc_pricing_table_with_image", array (
				$this,
				"dt_sc_pricing_table" 
		) );

		/* Pricing Table Item */
		add_shortcode ( "dt_sc_pricing_table_item", array (
				$this,
				"dt_sc_pricing_table_item" 
		) );

		/* Pricing Table Rounded Item */
		add_shortcode ( "dt_pricing_round_text", array (
				$this,
				"dt_pricing_round_text" 
		) );

		/* Progress Bar Shortcode */
		add_shortcode ( "dt_sc_progressbar", array (
				$this,
				"dt_sc_progressbar" 
		) );

		/* Tabs */
		add_shortcode ( "dt_sc_tab", array (
				$this,
				"dt_sc_tab" 
		) );

		add_shortcode ( "dt_sc_tabs_horizontal", array (
				$this,
				"dt_sc_tabs_horizontal" 
		) );

		add_shortcode ( "dt_sc_tabs_vertical", array (
				$this,
				"dt_sc_tabs_vertical" 
		) );

		/* Team Shortcode */
		add_shortcode ( "dt_sc_team", array (
				$this,
				"dt_sc_team" 
		) );

		/* Testimonial Shortcode */
		add_shortcode ( "dt_sc_testimonial", array (
				$this,
				"dt_sc_testimonial" 
		) );
		
		/* Testimonial Carousel Shortcode */
		add_shortcode ( "dt_sc_testimonial_carousel", array (
				$this,
				"dt_sc_testimonial_carousel"
		) );

		/* Toggle Shortcode */
		add_shortcode ( "dt_sc_toggle", array (
				$this,
				"dt_sc_toggle" 
		) );

		/* Toogle Framed Shortcode */
		add_shortcode ( "dt_sc_toggle_framed", array (
				$this,
				"dt_sc_toggle_framed" 
		) );
		
		/* Titles Box Shortcode */
		add_shortcode ( "dt_sc_titled_box", array (
				$this,
				"dt_sc_titled_box" 
		) );
		
		/* Tooltip Shortcode */
		add_shortcode ( "dt_sc_tooltip", array (
				$this,
				"dt_sc_tooltip"
		) );
		
		/* PullQuotes Shortcode */
		add_shortcode ( "dt_sc_pullquote", array (
				$this,
				"dt_sc_pullquote" 
		) );

		add_shortcode ( "dt_sc_infographic_bar", array (
				$this,
				"dt_sc_infographic_bar" 
		) );

		/* Full width Shortcode*/
		add_shortcode("dt_sc_fullwidth_section", array(
				$this,
				"dt_sc_fullwidth_section"
		) );

		/* Full Width Video Shortcode */
		add_shortcode("dt_sc_fullwidth_video", array(
				$this,
				"dt_sc_fullwidth_video"
		));

		/* Animation */
		add_shortcode("dt_sc_animation", array(
			$this,
			"dt_sc_animation"
		) );

		/* Post & Recent Post Shortcode */
		add_shortcode("dt_sc_post", array ( 
			$this,
			"dt_sc_post"
		) );

		add_shortcode("dt_sc_recent_post", array ( 
			$this,
			"dt_sc_recent_post"
		) );

		add_shortcode("dt_sc_intro_text", array(
			$this,
			"dt_sc_intro_text"
		) );

		add_shortcode("dt_sc_popular_procedure", array(
			$this,
			"dt_sc_popular_procedure"
		) );

		/* Unordered List Short code */
		add_shortcode("dt_sc_ul", array(
			$this,
			"dt_sc_ul"
		) );

		add_shortcode("dt_sc_li", array(
			$this,
			"dt_sc_li"
		) );
		/* Unordered List Short code */

		/* Custom Post Type: Gallery */
		add_shortcode( "dt_sc_gallery_item", array(
			$this,
			"dt_sc_gallery_item"
		) );

		add_shortcode( "dt_sc_recent_gallery_items", array(
			$this,
			"dt_sc_recent_gallery_items"
		) );

		add_shortcode( "dt_sc_gallery_items_from_category", array(
			$this,
			"dt_sc_gallery_items_from_category"
		) );
		/* Custom Post Type: Gallery */

		add_shortcode( "dt_sc_goto", array(
			$this,
			"dt_sc_goto"
		) );
		
		/* Page Builder Utils */
		add_shortcode ( "dt_sc_doshortcode", array ( $this, "dt_sc_doshortcode" ) );		
		
		/* Resizeable Column */
		add_shortcode ( "dt_sc_resizable", array ( $this, "dt_sc_resizable" ) );

		add_shortcode ( "dt_sc_resizable_inner", array ( $this, "dt_sc_resizable" ) );
		
		add_shortcode ( "dt_sc_widgets", array ( $this, "dt_sc_widgets" ) );
		/* Page Builder Utils */
	}
	
	/**
	 *
	 * @param string $content        	
	 * @return string
	 */
	function dtShortcodeHelper($content = null) {
		$content = do_shortcode ( shortcode_unautop ( $content ) );
		$content = preg_replace ( '#^<\/p>|^<br \/>|<p>$#', '', $content );
		$content = preg_replace ( '#<br \/>#', '', $content );
		return trim ( $content );
	}
	
	/**
	 *
	 * @param string $dir        	
	 * @return multitype:
	 */
	function dtListImages($dir = null) {
		$images = array ();
		$icon_types = array (
				'jpg',
				'jpeg',
				'gif',
				'png' 
		);
		
		if (is_dir ( $dir )) {
			$handle = opendir ( $dir );
			while ( false !== ($dirname = readdir ( $handle )) ) {
				
				if ($dirname != "." && $dirname != "..") {
					$parts = explode ( '.', $dirname );
					$ext = strtolower ( $parts [count ( $parts ) - 1] );
					
					if (in_array ( $ext, $icon_types )) {
						$option = $parts [count ( $parts ) - 2];
						$images [$dirname] = str_replace ( ' ', '', $option );
					}
				}
			}
			closedir ( $handle );
		}
		
		return $images;
	}
	
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_accordion_group($attrs, $content = null) {
		$out = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = str_replace ( "<h5 class='dt-sc-toggle", "<h5 class='dt-sc-toggle-accordion ", $out );
		$out = "<div class='dt-sc-toggle-frame-set'>{$out}</div>";
		return $out;
	}


	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_button($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'size' => '',
				'link' => '#',
				'type' => '',
				'icon' => '',
				'target' => '',
				'variation' => '',
				'bgcolor' => '',
				'textcolor' => '',
				'class' =>''
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = "<span>$content</span>";

		if( ($type == "with-icon") && !empty($icon)  ){
			$content = $content."<i class='fa {$icon}'> </i>"; 
		}
		
		$size = ($size == 'xlarge') ? ' xlarge' : $size;
		$size = ($size == 'large') ? ' large' : $size;
		$size = ($size == 'medium') ? ' medium' : $size;
		$size = ($size == 'small') ? ' small' : $size;
		
		$target = empty($target) ? 'target="_blank"' : "target='{$target}' ";
		
		$variation = (($variation) && (empty ( $bgcolor ))) ? ' ' . $variation : '';
		
		$styles = array ();
		if ($bgcolor)
			$styles [] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if ($textcolor)
			$styles [] = 'color:' . $textcolor . ';';
		$style = join ( '', array_unique ( $styles ) );
		$style = ! empty ( $style ) ? ' style="' . $style . '"' : '';
		
		if(preg_match('#^{{#', $link) === 1) {
			$link =  str_replace ( '{{', '[', $link );
			$link =  str_replace ( '}}', '/]', $link );
			$link = do_shortcode($link);
		}else{
			$link = esc_url ( $link );
		}
		
		$out = "<a href='{$link}' {$target} class='dt-sc-button {$class} {$size} {$variation} {$type}' {$style}>{$content}</a>";
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_blockquote($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type' => "type1",	
				'align' => '',
				'variation' => '',
				'textcolor' => '',
				'cite'=> ''		
		), $attrs ) );
		
		$class = array();
		if( preg_match( '/left|right|center/', trim( $align ) ) )
			$class[] = ' align' . $align;
		if( $variation)
			$class[] = ' ' . $variation;
		
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = strip_tags($content);
		$content = ! empty ( $content ) ? "<q>{$content}</q>" : "";
		
		$cite = ! empty ( $cite ) ? '&ndash; ' .$cite : "";
		$cite = !empty( $cite ) ? "<cite>$cite</cite>" : "";
		
		$style = ( $textcolor ) ? ' style="color:' . $textcolor . ';"' : '';
		$class = join( '', array_unique( $class ) );

		$out = "<blockquote class='{$type} {$class}' {$style}>{$content}{$cite}</blockquote>";
		return $out;
	}


	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_callout_box($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type' => "type1",
				'link' => '#',
				'button_text'=> __('Purchase Now','dt_themes'),
				'image' =>'',
				'button_icon'=>'',
				'target' => '',
				'class' => ''
		), $attrs ) );

		$attribute = !empty($image) ? "class='dt-sc-callout-box with-icon {$type} {$class}' " :" class='dt-sc-callout-box {$type} {$class}' ";

		$target = empty($target) ? 'target="_blank"' : "target='{$target}' ";
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out = "<div {$attribute}>";
		$out .= ( !empty( $title ) ) ? "<h2>{$title}</h2>" : "";
		$out .= '<div class="dt-sc-callout-content">';
		if( !empty( $image ) ):
			$out .= "<img src='{$image}' alt=''/>";
		endif;
		$out .= $content;
		$out .= '</div>';
			
		$out .= '<div class="dt-sc-callout-button">';
		$button_icon = !empty( $button_icon ) ? "<i class='fa $button_icon'></i>" : "";
		$c = !empty( $button_icon ) ? "with-icon" : "";  
		$out .= ( !empty($link) ) ? "<a href='{$link}' class='dt-sc-button {$c} small' {$target}><span>{$button_text}</span> {$button_icon}</a>" : "";
		$out .= '</div>';			
		$out .= "</div>";
		
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_columns($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'id' => '',
				'class' => '',
				'style' => '' ,
				'type' => ''
		), $attrs ) );
		
		$shortcodename = str_replace ( "_", "-", $shortcodename );
		$shortcodename = str_replace ( "-inner", "", $shortcodename );
		
		$id = ($id != '') ? " id = '{$id}'" : '';
		$style = !empty( $style ) ? " style='{$style}' ": "";

		if( trim($type) == 'type2' ):
			$type = "no-space";
		elseif( trim($type) == 'type1'):
			$type = "space";
		else:
			$type = "";
		endif;	

		$first = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'first' )) ? 'first' : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out = "<div {$id} class='column {$shortcodename} {$class} {$type} {$first}' {$style}>{$content}</div>";
		return $out;
	}


	function dt_sc_title( $attrs,$content = null , $shortcodename = "" ){
		extract ( shortcode_atts ( array ( 'class' => '' ), $attrs ) );

		$shortcodename = str_replace ( "dt_sc_", "", $shortcodename );
		$out = "<{$shortcodename} class='{$class}'>";
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= "</{$shortcodename}>";
		return $out;	
	}

	/* Contact Information */
	/**
	 * Shortcode : Email id
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	 function dt_sc_email($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '',
				'description' =>'',
				'icon' => '',
				'emailid' => ''
		), $attrs ) );

		$out = '<div class="dt-sc-contact-info">';
		$out .= "<i class='fa {$icon}'></i>";
		$out .= "<span>{$title}</span>";
		$out .= ( !empty($emailid) ) ? "<a href='mailto:$emailid'>{$emailid}</a>" : "";
		$out .= "<span class='details'>{$description}</span>";
		$out .= '</div>';
		return $out;
	 }

	function dt_sc_contact( $attrs, $content = null ){
		extract( shortcode_atts( array(
			'title' =>'',
			'detail' =>'',
			'icon'=>'',
			'description'=>''
		), $attrs));

		$out  = '<div class="dt-sc-contact-info">';
		$out .= !empty( $icon ) ? "<i class='fa {$icon}'></i>" : "";
		$out .= !empty( $title ) ? "<span>{$title}</span>" : "";
		$out .= !empty( $detail ) ? "<p>{$detail}</p>" : "";
		$out .= !empty( $description ) ? "<span class='details'>{$description}<span class='details'>" : "";
		$out .= '</div>';
		return $out;
	} 

	function dt_sc_address( $attrs, $content = null ){
		extract( shortcode_atts( array(
			'detail' =>'',
			'icon'=>''
		), $attrs));

		$out  = '<div class="dt-sc-contact-info">';
		$out .= !empty( $icon ) ? "<i class='fa {$icon}'></i>" : "";
		$out .= !empty( $detail ) ? $detail : "";
		$out .= '</div>';
		return $out;
	} 

	/* Contact Information End*/

	/* Client Carousel */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_carousel($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'columns' => '2'
		), $attrs ) );

		$min = 1;
		$max = $width = "";
		if( $columns == 2 ):
			$max = 2;
			$width = 520;
		elseif( $columns == 3 ):
			$max = 3;
			$width = 340;
		elseif( $columns == 4 ):
			$max = 4;
			$width = 250;
		elseif( $columns == 5 ):
			$max = 5;
			$width = 195;
		else:
			$max = 2;
			$width = 520;
		endif;

		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace( '<ul>', "<ul class='dt-sc-images-carousel'>", $content );
		
		
		$out = "<div class='dt-sc-images-carousel-wrapper' data-min='{$min}' data-max='{$max}' data-width='{$width}'>";
		$out .= $content;
		$out .= '<div class="carousel-arrows">';
		$out .= '	<a href="" class="images-carousel-prev"> <span class="fa fa-angle-left"> </span> </a>';
		$out .= '	<a href="" class="images-carousel-next"> <span class="fa fa-angle-right"> </span> </a>';
		$out .= '</div>';
		$out .= '</div>';
		return $out;
	}

	/* Client Carousel End*/
	
	/* Dividers */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_clear($attrs, $content = null) {
		return '<div class="dt-sc-clear"></div>';
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_hr_border($attrs, $content = null) {
		return '<div class="dt-sc-hr-border"></div>';
	}


	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_donutchart($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'title' => '',
				'bgcolor' => '',
				'fgcolor' => '',
				'percent' =>'30'
		), $attrs ) );
		
		$size = "100";
		$size = ( "dt_sc_donutchart_medium" === $shortcodename ) ? "200" : $size;
		$size = ( "dt_sc_donutchart_large" === $shortcodename ) ? "300" : $size;
		
		$shortcodename = str_replace ( "_", "-", $shortcodename );
		$out = "<div class='{$shortcodename}'>";
		$out .= "<div class='dt-sc-donutchart' data-size='{$size}' data-percent='{$percent}' data-bgcolor='{$bgcolor}' data-fgcolor='$fgcolor'></div>";
		$out .= ( empty($title) ) ? $out : "<h5 class='dt-sc-donutchart-title'>{$title}</h5>";
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_dividers($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'class' => '',
				'top' => '' 
		), $attrs ) );
		
		if ("dt_sc_hr" === $shortcodename || "dt_sc_hr_medium" === $shortcodename || "dt_sc_hr_large" === $shortcodename) {
			
			$shortcodename = str_replace ( "_", "-", $shortcodename );
			
			$out = "<div class='{$shortcodename} {$class}'>";
			
			if ((isset ( $attrs [0] ) && trim ( $attrs [0] == 'top' ))) {
				
				$out = "<div class='{$shortcodename} top {$class}'>";
				$out .= "<a href='#top' class='scrollTop'><span class='fa fa-angle-up'></span>" . __ ( "top", 'dt_themes' ) . "</a>";
			}
			
			$out .= "</div>";
		} else {
			$shortcodename = str_replace ( "_", "-", $shortcodename );
			$out = "<div class='{$shortcodename}  {$class}'></div>";
		}
		return $out;
	}
	
	function dt_sc_hr_top($attrs, $content = null, $shortcodename="" ){
		$out = do_shortcode("[dt_sc_hr top]");
		return $out;
	}
	/* Dividers End*/
	
	/* Icon Boxes Shortcode */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_icon_box($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'type' => '',
				'fontawesome_icon' => '',
				'custom_icon' => '',
				'inner_image'=>'',
				'title' => '',
				'link' => '',
				'color' =>''
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out =  "<div class='dt-sc-ico-content {$type} {$color}'>";
		if( !empty($fontawesome_icon) && empty($custom_icon) ){
			$out .= "<div class='icon'> <span class='fa fa-{$fontawesome_icon}'> </span> </div>";
		
		}elseif( !empty($custom_icon) ){
			$out .= "<div class='icon'> <span> <img src='{$custom_icon}' alt=''/></span> </div>";	
		}
		
		if( !empty($link) ) :
			$out .= empty( $title ) ? $out : "<h2><a href='{$link}'> {$title} </a></h2>";
		else:
			$out .= empty( $title ) ? $out : "<h2>{$title}</h2>";
		endif;

		if( $type == "type1" && !empty($inner_image) ):
			$out .= "<div class='image'><img src='{$inner_image}' alt='' title=''/></div>";
		endif;	
			
		
		$out .= $content;
		$out .= "</div>";
		return $out;
	}
	/* Icon Boxes Short code End*/

	/* Icon Boxes Colored Short code */
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_icon_box_colored($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'type' => '',
				'fontawesome_icon' => '',
				'custom_icon' => '',
				'title' => '',
				'bgcolor' => ''
		), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$bgcolor = empty ( $bgcolor ) ? "" : " style='background:{$bgcolor};' ";
		
		$type = ( trim($type) === 'type1' ) ? "no-space" : "space";
		
		$out =  "<div class='dt-sc-colored-box {$type}' {$bgcolor}>";
		
		$icon = "";
		if( !empty($fontawesome_icon) ){
			$icon = "<span class='fa fa-{$fontawesome_icon}'> </span>";
		
		}elseif( !empty($custom_icon) ){
			$icon = "";	
		}
		
		$out .= "<h5>{$icon}{$title}</h5>";
		$out .= $content;
		$out .= "</div>";
		return $out;
	}
	/* Icon Boxes Colored Short code End*/


	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @param string $shortcodename        	
	 * @return string
	 */
	function dt_sc_dropcap($attrs, $content = null, $shortcodename = "") {
		extract ( shortcode_atts ( array (
				'type' => '',
				'variation' => '',
				'bgcolor' => '',
				'textcolor' => '' 
		), $attrs ) );
		
		$type = str_replace ( " ", "-", $type );
		$type = "dt-sc-dropcap-".strtolower ( $type );
		
		$bgcolor = ( $type == 'dt-sc-dropcap-default') ? "" : $bgcolor;
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';border-color:' . $textcolor . ';';;
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out = "<span class='dt-sc-dropcap $type {$variation}' {$style}>{$content}</span>";
		return $out;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_code($attrs, $content = null) {
		$array = array (
				'[' => '&#91;',
				']' => '&#93;',
				'/' => '&#47;',
				'<' => '&#60;',
				'>' => '&#62;',
				'<br />' => '&nbsp;' 
		);
		$content = strtr ( $content, $array );
		$out = "<pre>{$content}</pre>";
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return mixed
	 */
	function dt_sc_fancy_ol($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'style' => '',
				'variation' => '',
				'class' => '' 
		), $attrs ) );
		
		$style = ($style) ? trim ( $style ) : 'decimal';
		$class = ($class) ? trim ( $class ) : '';
		$variation = ($variation) ? ' ' . trim ( $variation ) : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ol>', "<ol class='dt-sc-fancy-list {$variation} {$class} {$style}'>", $content );
		$content = str_replace ( '<li>', '<li><span>', $content );
		$content = str_replace ( '</li>', '</span></li>', $content );
		return $content;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return mixed
	 */
	function dt_sc_fancy_ul($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'style' => '',
				'variation' => '',
				'class' => '' 
		), $attrs ) );
		$style = ($style) ? trim ( $style ) : 'decimal';
		$class = ($class) ? trim ( $class ) : '';
		$variation = ($variation) ? ' ' . trim ( $variation ) : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ul>', "<ul class='dt-sc-fancy-list {$variation} {$class} {$style}'>", $content );
		return $content;
	}
	
	function dt_sc_fancy_ul_alt($attrs, $content = null){
		extract ( shortcode_atts ( array (
				'variation' => '',
				'class' => '',
				'alignright'=> 'yes'
		), $attrs ) );
		
		$class = ($class) ? trim ( $class ) : '';
		$class = ( $alignright === 'yes' ) ? $class.' alignright' : $class;
		$variation = ($variation) ? ' ' . trim ( $variation ) : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$content = str_replace ( '<ul>', "<ul class='dt-sc-fancy-list type2 {$variation} {$class}'>", $content );
		return $content;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_pricing_table($attrs, $content = null) {
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		return "<div class='dt-sc-pricing-table'>" . $content . '</div>';
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_pricing_table_item($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'variation' =>'',
				'heading' => __ ( "Gift", 'dt_themes' ),
				'currency' => '$',
				'price1' => '',
				'price2' =>'',
				"button_link" => "#",
				"button_text" => __ ( "Buy Now", 'dt_themes' ),
				"button_size" => "small",
				"title" =>'', # Used in Pricing Table Type 3
				"thumb" =>''  # Used in Pricing Table Type 3
		), $attrs ) );
		
		$selected = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'selected' )) ? 'selected' : '';

		$button_link= do_shortcode($button_link);
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace ( '<ul>', '<ul class="dt-sc-tb-content">', $content );
		$content = str_replace ( '<ol>', '<ul class="dt-sc-tb-content">', $content );
		$content = str_replace ( '</ol>', '</ul>', $content );
		
		$out = "<div class='dt-sc-pr-tb-col {$variation} $selected'>";
		$out .= '	<div class="dt-sc-tb-header">';

					if( !empty($thumb) ):
						$out .= '<div class="dt-sc-tb-thumb">';
						$out .= "	<img alt='thumb' src='{$thumb}'>";
						$out .= ( !empty($title) ) ? "<div class='dt-sc-tb-title'><h3>{$title}</h3></div>" : "";
						$out .= '</div>';
					endif;	

		$out .= '		<div class="dt-sc-price"><p>';
		$out .= "		<span>{$currency}<span>{$price1}</span></span>{$price2}";
		$out .= "		<sup>{$heading}</sup>";
		$out .= '		</p></div>';
		$out .= '	</div>';
		$out .= 	$content;
		$out .= '	<div class="dt-sc-buy-now">';

					if(preg_match('#^{{#', $button_link) === 1) {
						$button_link =  str_replace ( '{{', '[', $button_link );
						$button_link =  str_replace ( '}}', '/]', $button_link );
						$button_link = do_shortcode($button_link);
					}else{
						$button_link = esc_url ( $button_link );
					}
					$out .= do_shortcode ( "[dt_sc_button size='$button_size' link='$button_link']" . $button_text . "[/dt_sc_button]" );
		$out .= '	</div>';
		$out .= '</div>';
		return $out;
	}

	function dt_pricing_round_text( $attrs, $content = null ){
		extract ( shortcode_atts ( array ( 'title' =>'', 'subtitle' => '', 'text'=>''), $attrs ) );
		$out = ' <div class="dt-sc-tb-content">';
		$out .= '	<div class="dt-sc-rounded">';
		$out .= "		<span>{$title}</span>";
		$out .= "		<h3>{$subtitle}</h3>";
		$out .= "		<hr><p>{$text}</p>";
		$out .= '	</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_progressbar($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type' => 'standard',
				'color' => '',
				'value' => '55'
		), $attrs ) );
		
		
		if( $type === 'standard' ){
			$type = "dt-sc-standard";
		}elseif( $type === 'progress-striped' ){
			$type = "dt-sc-progress-striped";
		}elseif( $type === 'progress-striped-active' ){
			$type = "dt-sc-progress-striped active";
		}

		
		$color = ! empty ( $color ) ? "style='background-color:$color;'" : "";

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = $content.' - '.$value."%";
		$value = "data-value='$value'";
		$out = "<div class='dt-sc-bar-text'>{$content}</div>";
		$out .= "<div class='dt-sc-progress $type'>";
		$out .= "<div class='dt-sc-bar' $color $value></div>";
		$out .= '</div>';
		return $out;
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tab($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '' ,
				'number' => '',
		), $attrs ) );

		$number = !empty($number) ? "<span>{$number}</span>" : "";	
		$out = '<li class="tab_head"><a href="#">'.$number.$title. '</a></li><div class="tabs_content">' . DTCoreShortcodesDefination::dtShortcodeHelper ( $content ) . '</div>';
		return $out;
	}
	
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tabs_horizontal($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'class' => '' 
		), $attrs ) );

		preg_match_all("/(.?)\[(dt_sc_tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/dt_sc_tab\])?(.?)/s", $content, $matches);

		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts( $matches[3][$i] );
		}

		$out = '<ul class="dt-sc-tabs-frame">';
			for($i = 0; $i < count($matches[0]); $i++) {
				$no = $matches[3][$i]['number'];
				$no = !empty($no) ? "<span>{$no}</span>":"";
				$out .= '<li><a href="#">'.$no.' '.$matches[3][$i]['title'] . '</a></li>';
			}
		$out .= '</ul>';

		for($i = 0; $i < count($matches[0]); $i++) {
			$out .= '<div class="dt-sc-tabs-frame-content">' . DTCoreShortcodesDefination::dtShortcodeHelper($matches[5][$i]) . '</div>';
		}		
	return "<div class='dt-sc-tabs-container {$class}'>$out</div>";
	}


	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tabs_vertical($attrs, $content = null) {
		preg_match_all("/(.?)\[(dt_sc_tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/dt_sc_tab\])?(.?)/s", $content, $matches);
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts( $matches[3][$i] );
		}

		$out = "<ul class='dt-sc-tabs-vertical-frame'>";
		for($i = 0; $i < count($matches[0]); $i++) {
			$no = $matches[3][$i]['number'];
			$no = !empty($no) ? "<span>{$no}</span>":"";
			$out .= '<li><a href="#">'.$no.' '. $matches[3][$i]['title'] . '<span></span></a></li>';
		}
		$out .= "</ul>";

		for($i = 0; $i < count($matches[0]); $i++) {
			$out .= '<div class="dt-sc-tabs-vertical-frame-content">' . DTCoreShortcodesDefination::dtShortcodeHelper($matches[5][$i]) . '</div>';
		}		
		return "<div class='dt-sc-tabs-vertical-container'>$out</div>";		
	}

	/**
	 *
	 * @param unknown $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_team($attrs, $content = null) {
		$dir_path = plugin_dir_path ( __FILE__ ) . "images/sociables/";
		$sociables_icons = DTCoreShortcodesDefination::dtListImages ( $dir_path );
		
		$sociables = array_values ( $sociables_icons );
		$attributes = array (
				'name' => '',
				'image' => 'http://placehold.it/300',
				'role' => '',
				'alt' => __('Please specify image url','dt_themes'),
				'title' => __('Please specify image url','dt_themes')
		);
		
		foreach ( $sociables as $sociable ) {
			$attributes [$sociable] = '';
		}
		
		extract ( shortcode_atts ( $attributes, $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$image = "<img src='{$image}' alt='{$alt}' title='{$title}' />";
		$name = empty ( $name ) ? "" : "<h5>{$name}</h5>";
		$role = empty ( $role ) ? "" : "<h6>{$role}</h6>";
		
		$s = "";
		$path = plugin_dir_url ( __FILE__ ) . "images/sociables/";
		foreach ( $sociables as $sociable ) {
			$img = array_search ( $sociable, $sociables_icons );
			$class = explode(".",$img);
			$class = $class[0];
			$s .= empty ( $$sociable ) ? "" : "<li class='{$class}'><a href='{$$sociable}' target='_blank'> <img src='{$path}hover/{$img}' alt='{$sociable}'/>  <img src='{$path}{$img}' alt='{$sociable}'/> </a></li>";
		}
		
		$s = ! empty ( $s ) ? "<ul class='dt-sc-social-icons'>$s</ul>" : "";

		$out = "<div class='dt-sc-team'>";
		$out .= '	<div class="team-details">';
		$out .= 	$name.$role;
		$out .= '	</div>';
		$out .= "	<div class='image'>{$image}</div>";
		$out .= 	$content.$s;
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_testimonial($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'name' => '',
				'image' => 'http://placehold.it/300'
		), $attrs ) );


		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = ! empty ( $content ) ? '<q> '.$content.' </q>' : "";
		$content = (! empty ( $content ) ) ? '<blockquote>'.$content.'</blockquote>' : "";

		$name = ! empty ( $name ) ? "<cite> - {$name} </cite>" : "";
		
		$image = "<img src='{$image}' alt='{$name}' title='{$name}' />";
		$image = "<div class='author'><span>{$image}</span></div>";
		
		return "<div class='dt-sc-testimonial'>$content$name$image</div>";
	}
	
	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_testimonial_carousel($attrs, $content = null) {

		extract ( shortcode_atts ( array ( 'class' => '' ), $attrs ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = str_replace( '<ul>', "<ul class='dt-sc-testimonial-carousel'>", $content );
		
		
		$out = "<div class='dt-sc-testimonial-carousel-wrapper {$class}'>";
		$out .= $content;
		$out .= '<div class="carousel-arrows">';
		$out .= '	<a href="" class="testimonial-prev"> <span class="fa fa-angle-left"> </span> </a>';
		$out .= '	<a href="" class="testimonial-next"> <span class="fa fa-angle-right"> </span> </a>';
		$out .= '</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_toggle($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '' 
		), $attrs ) );
		
		$out = "<h5 class='dt-sc-toggle'><a href='#'>{$title}</a></h5>";
		$out .= '<div class="dt-sc-toggle-content" style="display: none;">';
		$out .= '<div class="block">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_toggle_framed($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '' 
		), $attrs ) );
		
		$out = '<div class="dt-sc-toggle-frame">';
		$out .= "	<h5 class='dt-sc-toggle'><a href='#'>{$title}</a></h5>";
		$out .= '	<div class="dt-sc-toggle-content" style="display: none;">';
		$out .= '		<div class="block">';
		$out .= DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out .= '		</div>';
		$out .= '	</div>';
		$out .= '</div>';
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_titled_box($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'title' => '',
				'icon' => '',
				'type'	=> '',
				'variation' => '',
				'bgcolor' => '',
				'textcolor' => '' 
		), $attrs ) );
		
		$type = (empty($type)) ? 'dt-sc-titled-box' :"dt-sc-$type";
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';
		$content = DTCoreShortcodesDefination::dtShortcodeHelper( $content );
		$content = strip_tags($content);
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		
		if($type == 'dt-sc-titled-box') :
			$icon = ( empty($icon) ) ? "" : "<span class='fa {$icon} '></span>";
			$title = "<h6 class='{$type}-title' {$style}> {$icon} {$title}</h6>";
			$out = "<div class='{$type} {$variation}'>";
			$out .= $title;
			$out .=	"<div class='{$type}-content'>{$content}</div>";
			$out .= "</div>";
		else :
			$out = "<div class='{$type}'>{$content}</div>";
		endif;
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_tooltip($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type'	=> 'default',
				'tooltip' => '',
				'position' => 'top',
				'href' => '',
				'target' => '',
				'bgcolor' => '',
				'textcolor' => '' 
		), $attrs ) );
		
		$class  = "class=' ";
		$class .=  ( $type == "boxed" ) ? "dt-sc-boxed-tooltip" : "";
		$class .= " dt-sc-tooltip-{$position}'";
		
		$href = " href='{$href}' ";
		$title = " title = '{$tooltip}' ";
		$target = empty($target) ? 'target="_blank"' : "target='{$target}' ";
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		$style = ( $type == "boxed" ) ? $style : "";
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper( $content );
		$out = "<a {$href} {$title} {$class} {$style} {$target}>{$content}</a>";
		return $out;
	}

	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_pullquote($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'type'	=> 'pullquote1',
				'align' => '',
				'icon' => '',
				'textcolor' => '',
				'cite' => ''
		), $attrs ) );
		
		$class = array();
		if( isset($type) )
			$class[] = " dt-sc-{$type}";
			
		if( trim( $icon ) == 'yes' )
			$class[] = ' quotes';

		if( preg_match( '/left|right|center/', trim( $align ) ) )
			$class[] = ' align' . $align;
			
		$cite = ( $cite ) ? ' <cite>&ndash; ' . $cite .'</cite>' : '' ;
		
		$style = ( $textcolor ) ? ' style="color:' . $textcolor . ';"' : '';
		$class = join( '', array_unique( $class ) );
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$content = strip_tags($content);
		$out = "<span class='{$class}' {$style}> {$content} {$cite}</span>";
		
		return $out;
	}


	/**
	 *
	 * @param array $attrs        	
	 * @param string $content        	
	 * @return string
	 */
	function dt_sc_infographic_bar($attrs, $content = null, $shortcodename ="") {
		extract ( shortcode_atts ( array (
				'type' => 'standard',
				'icon' =>'',
				'icon_size'=>'150',
				'color' => '',
				'value' => '55'
		), $attrs ) );

		if( $type === 'standard' ){
			$type = "dt-sc-standard";
		}elseif( $type === 'progress-striped' ){
			$type = "dt-sc-progress-striped";
		}elseif( $type === 'progress-striped-active' ){
			$type = "dt-sc-progress-striped active";
		}
		
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		
		$out = '<div class="dt-sc-infographic-bar">';
		
		if( !empty($icon) ){
		$out .= "<i class='fa {$icon}' style='font-size:{$icon_size}px; color:{$color};'> </i>";
		}
		$out .= '	<div class="info">';
		
		$out .= "		<div class='dt-sc-progress $type'>";
		$out .= "		 <div data-value={$value} style='background-color:{$color};' class='dt-sc-bar'></div>";
		$out .= '		</div>';
		
		$out .= "		<div class='dt-sc-bar-percentage'> <span> {$value}%  </span> </div>";
		$out .= "		<div class='dt-sc-bar-text'>$content</div>";
		$out .= '	</div>';
		
		$out .= '</div>';
		
		return $out;
	}

	function dt_sc_fullwidth_section($attrs, $content = null) {
		extract ( shortcode_atts ( array (
			'id' =>'',
			'backgroundcolor' => '',
			'backgroundimage' => '',
			'backgroundrepeat' => '',
			'backgroundposition' => '',
			'paddingtop' => '',
			'paddingbottom' => '',
			'margintop' => '',
			'marginbottom' => '',
			'height'=>'',
			'textcolor' =>'',
			'opacity' => '',
			'class' =>'',
			'parallax' => 'no'
		), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$styles = array ();
		$styles[] = !empty( $textcolor ) ? "color:{$textcolor};" : "";
		if( !empty( $opacity ) ) {
			$hex = str_replace ( "#", "", $backgroundcolor );
			if (strlen ( $hex ) == 3) :
				$r = hexdec ( substr ( $hex, 0, 1 ) . substr ( $hex, 0, 1 ) );
				$g = hexdec ( substr ( $hex, 1, 1 ) . substr ( $hex, 1, 1 ) );
				$b = hexdec ( substr ( $hex, 2, 1 ) . substr ( $hex, 2, 1 ) );
			else :
				$r = hexdec ( substr ( $hex, 0, 2 ) );
				$g = hexdec ( substr ( $hex, 2, 2 ) );
				$b = hexdec ( substr ( $hex, 4, 2 ) );
			endif;
			$rgb = array ( $r,$g,$b);
			$styles[] = "background-color:rgba($rgb[0],$rgb[1],$rgb[2],$opacity); ";
		} else {
			$styles[] = !empty( $backgroundcolor ) ? "background-color:{$backgroundcolor};" : "";
		}	

		$styles[] = !empty( $backgroundimage ) ? "background-image:url({$backgroundimage});" : "";
		$styles[] = !empty( $backgroundrepeat ) ? "background-repeat:{$backgroundrepeat};" : "";
		$styles[] = !empty( $backgroundposition ) ? "background-position:{$backgroundposition};" : "";
		$styles[] = !empty( $paddingtop ) ? "padding-top:{$paddingtop}px;" : "";
		$styles[] = !empty( $paddingbottom ) ? "padding-bottom:{$paddingbottom}px;" : "";
		$styles[] = !empty( $margintop ) ? "margin-top:{$margintop}px;" : "";
		$styles[] = !empty( $marginbottom ) ? "margin-bottom:{$marginbottom}px;" : "";
		$styles[] = !empty( $height ) ? "height:{$height}px;" : "";

		if( $parallax === "yes") {
			$styles[] = "background-attachment:fixed; ";

		}

		$styles = array_filter( $styles);
		$style = join ( '', array_unique ( $styles ) );
		$style = ! empty ( $style ) ? ' style="' . $style . '"' : '';

		$id = !empty( $id ) ? " id='{$id}' " : "";
		
		$out = 	"<div {$id} class='fullwidth-section {$class}' {$style}>";
		$out .=	'	<div class="container">';
		$out .= 	$content;
		$out .= '	</div>';
		$out .= '</div>';
		return $out;
	}

	function dt_sc_fullwidth_video( $attrs, $content = null ) {
		extract ( shortcode_atts ( array (
			'mp4' => '',
			'webm'=>'',
			'ogv' => '',
			'poster' => '',
			'backgroundimage' => '',
			'paddingtop' => '',
			'paddingbottom' => '',
			'class' =>''
		), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$styles = array ();
		$styles[] = !empty( $paddingtop ) ? "padding-top:{$paddingtop}px;" : "";
		$styles[] = !empty( $paddingbottom ) ? "padding-bottom:{$paddingbottom}px;" : "";
		$styles = array_filter( $styles);
		$style = join ( '', array_unique ( $styles ) );

		$backgroundimage = !empty( $backgroundimage )  ? "$backgroundimage" : "http://placehold.it/1920x400.jpg&text=DesignThemes";
		$style .= " background:url({$backgroundimage}) left top repeat; ";
		$style = ! empty ( $style ) ? ' style="' . $style . '"' : '';

		$poster = !empty( $poster )  ? " poster='{$poster}' " : "";

		$mp4 = !empty( $mp4 )  ? "<source src='{$mp4}' type='video/mp4'/>" : "";
		$webm = !empty( $webm )  ? "<source src='{$webm}' type='video/webm'/>" : "";
		$ogv = !empty( $ogv )  ? "<source src='{$ogv}' type='video/ogg'/>" : "";
		

		$out  = "<div class='dt-sc-fullwidth-video-section {$class}' {$style}>";
		$out .= '	<div class="dt-sc-video-container">';
		$out .= "	<div class='dt-sc-mobile-image-container' style='display:none;'></div>";
		$out .= "		<video autoplay loop class='dt-sc-video dt-sc-fillWidth' {$poster}>";
		$out .= 		$mp4.$webm.$ogv;
		$out .= '		</video>';
		$out .= '	</div>';
		$out .= '   <div class="dt-sc-video-content-wrapper">';		
		$out .= "		<div class='container'>{$content}</div>";
		$out .= '	</div>';
		$out .= '</div>';

		return $out;
	}

	function dt_sc_animation( $attrs, $content = null ){
		extract ( shortcode_atts ( array ( 'effect' => '','delay'=>''), $attrs ) );
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		return "<div class='animate' data-animation='{$effect}' data-delay='{$delay}'>{$content}</div>";
	}

	function dt_sc_post( $attrs, $content="" ) {
		extract(shortcode_atts(array( 'id'=>'1', 'read_more_text'=>__('Read More','dt_themes'),'excerpt_length'=>10 , 'show_meta' =>'yes'), $attrs));
		$p = get_post($id,'ARRAY_A');

		if( !is_null($p) ) {
			$link = get_permalink($id);
			$format = get_post_format($id);
			$title = $p['post_title'];
			$author_id = $p['post_author'];
			$class = get_post_class("blog-entry no-border",$id);
			$class = implode(" ",$class);
			$class  = is_sticky($id) ? $class.' sticky': $class;
			$show_meta = strtolower($show_meta);

			if( $show_meta == 'yes'):
				$tags = "";
				$terms = wp_get_post_tags($id);

				$cats = "";
				$categories = get_the_category($id);
				if($categories){
					foreach($categories as $category) {
						$cats .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>,';
					}
					$cats = trim($cats, ",");
					$cats = "<p class='category'><i class='fa fa-sitemap'></i>{$cats}</p>";
				}
			endif;	


			$post_meta = get_post_meta($id ,'_dt_post_settings',TRUE);
			$post_meta = is_array($post_meta) ? $post_meta : array();

			if( !empty($terms) ){
				$tags .= '<p class="tags">'.__('in','dt_themes').' ';
				foreach( $terms as $term ) {
					$tags .= '<a href="'.get_term_link($term->slug, 'post_tag').'"> '.$term->name.'</a>,';
				}
				$tags = substr($tags,0,-1);
				$tags .= '</p> <span> | </span> ';
			}

			if((wp_count_comments($id)->approved) == 0)	$commtext = '0';
			else $commtext = wp_count_comments($id)->approved;


			$out  = "<article class='{$class}'>";
			$out .= '	<div class="blog-entry-inner">';

			$out .= '		<div class="entry-meta">';
			$out .= '			<div class="date"><span>';
			$out .= 				get_the_date('d').'<br>'.strtoupper(get_the_date('M')).'<br>'.get_the_date('Y');
			$out .= '			</span></div>';
			$out .="			<p class='comments'><a href='{$link}/#respond'><span class='fa fa-comments'> </span> {$commtext} </a></p>";			
			$out .= '		</div>';

			$out .= '		<div class="entry-thumb">';
					if( $format === "image" || empty($format) ):
						$out .= "<a href='{$link}'>";
						if( has_post_thumbnail( $id )) {
							$out .= get_the_post_thumbnail($id,"full");	
						}else{
							$out .= '<img src="http://placehold.it/1060x618&text=Image" alt=""/>';
						}
						$out .= "</a>";
					elseif( $format === "gallery" ):
						if( array_key_exists("items", $post_meta) ):
							$out .= "<ul class='entry-gallery-post-slider'>";
							foreach ( $post_meta['items'] as $item ) {
								$out .= "<li><img src='{$item}' alt=''/></li>";	
							}
							$out .= "</ul>";
						endif;
					elseif( $format === "video" ):
						if( array_key_exists('oembed-url', $post_meta) ):
							$out .= "<div class='dt-video-wrap'>".wp_oembed_get($post_meta['oembed-url']).'</div>';
						elseif( array_key_exists('self-hosted-url', $post_meta) ):
							$out .= "<div class='dt-video-wrap'>".apply_filters( 'the_content', $post_meta['self-hosted-url'] ).'</div>';
						endif;
					elseif( $format === "audio" ):
						if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ):
							if( array_key_exists('oembed-url', $post_meta) ):
								$out .= wp_oembed_get($post_meta['oembed-url']);
							elseif( array_key_exists('self-hosted-url', $post_meta) ):
								$out .= apply_filters( 'the_content', $post_meta['self-hosted-url'] );
							endif;
						endif;
					else:
						$out .= "<a href='{$link}'>";
						if( has_post_thumbnail( $id )) {
							$out .= get_the_post_thumbnail($id,"full");	
						}else{
							$out .= '<img src="http://placehold.it/1060x618&text=Image" alt=""/>';
						}
						$out .= "</a>";
					endif;			
			$out .= '		</div>';

			$out .= '		<div class="entry-details">';
			$out .= "			<div class='entry-title'><h4><a href='{$link}'>{$title}</a></h4></div>";

			if( $show_meta == 'yes'):
			$out .= '			<div class="entry-metadata">';
			$out .= "				<p class='author'>".__('by','dt_themes')." <a href='".get_author_posts_url($author_id)."'>".get_the_author_meta('display_name',$author_id)."</a></p><span> | </span>".$tags.$cats;
			$out .= '			</div>';
			endif;

			$out .= '			<div class="entry-body">';

								$excerpt = explode(' ', do_shortcode($p['post_content']), $excerpt_length);
								$excerpt = array_filter($excerpt);
								
								if (!empty($excerpt)) {
									if (count($excerpt) >= $excerpt_length) {
										array_pop($excerpt);
										$excerpt = implode(" ", $excerpt).'...';
									} else {
										$excerpt = implode(" ", $excerpt);
									}
									$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
								$out .= "<p>{$excerpt}</p>";									
								}
			$out .= '			</div>';

			$out .= "	 		<a href='{$link}' class='dt-sc-button small'>{$read_more_text}</a>";			

			$out .= '		</div>';

			$out .= '	</div>';
			$out .= '</<article>';

			return $out;
		}
	}

	function dt_sc_recent_post( $attrs, $content="" ) {
		extract( shortcode_atts( array( 'columns'=>'2','count'=>'3', 'read_more_text'=>__('Read More','dt_themes'),'excerpt_length'=>10, 'show_meta' =>'yes'), $attrs ));

		$out = "";
		$post_class = "";

		$show_meta = " show_meta ='{$show_meta}' ";

		switch( $columns ) :
			case '2':
				$post_class = "column dt-sc-one-half";
			break;

			default:
			case '3':
				$post_class = "column dt-sc-one-third";
			break;
		endswitch;

		$rposts = new WP_Query( array( 'posts_per_page' => $count, 'orderby' => 'date', 'ignore_sticky_posts' => 1 ) );
		if ( $rposts->have_posts() ):
			$i = 1;
			while( $rposts->have_posts() ):
				$rposts->the_post();

				$the_id = get_the_ID();
				$permalink = get_permalink($the_id);
				$title = get_the_title($the_id);

				$temp_class = "";
				if($i == 1) 
					$temp_class = $post_class." first";
				else
					$temp_class = $post_class;

				if($i == $columns)
					$i = 1;
				else
					$i = $i + 1;

				$out .= "<div class='{$temp_class}'>";
				$sc = "[dt_sc_post id='{$the_id}' read_more_text='{$read_more_text}' excerpt_length='{$excerpt_length}' show_meta='{$show_meta}'/]";
				$out .= do_shortcode($sc);
				$out .= '</div>';
			endwhile;
			wp_reset_query();
		endif;
		return $out;	
	}

	function dt_sc_intro_text( $attrs, $content="" ){
		extract ( shortcode_atts ( array ( 'title' => ''), $attrs ) );
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		$out  = '<div class="border-title aligncenter">';
		$out .= "<h2>{$title}</h2>";
		$out .= $content;
		$out .= '</div>';
		return $out;
	}

	function dt_sc_popular_procedure( $attrs, $content="" ){
		extract ( shortcode_atts ( array ( 'title'=>'', 'image'=>'', 'link'=>'', 'button_text'=>'', 'hours'=>'', 'price'=>''), $attrs ) );
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );


		$out  = '<div class="dt-sc-popular-procedures with-image">';
		$out .= '	<div class="dt-sc-popular-procedures-wrapper">';
		$out .= '		<div class="border"> </div>';
		$out .= "			<div class='image'><img src='{$image}' alt='{$title}' /></div>";
		$out .= ( !empty($title) ) ? "<h2>{$title}</h2>":"";
		$out .= ( !empty($hours) ) ? "<span class='duration'>{$hours}</span>":"";
		$out .= ( !empty($price) ) ? "<span class='price'>{$price}</span>":"";
		$out .= $content;
		$out .= '	</div>';
		$out .= ( !empty($link) ) ? "<a href='{$link}' class='dt-sc-button small'>{$button_text}</a>" : "";
		$out .= '</div>';
		return $out;
	}

	function dt_sc_ul( $attrs, $content="" ){
		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );
		return "<ul>{$content}</ul>";
	}

	function dt_sc_li( $attrs, $content="" ){
		extract ( shortcode_atts ( array ( 'icon'=>'', 'text'=>'', 'link'=>''), $attrs ) );
		$icon = !empty( $icon ) ? "<i class='fa {$icon}'></i>" : "";
		$text = !empty( $link ) ? "<a href='{$link}'>{$text}</a>" : $text;
		return "<li>{$icon}{$text}</li>";
	}

	function dt_sc_gallery_item( $attrs, $content="" ){
		extract( shortcode_atts( array( 'id' => '', 'space' =>'', 'image_size' => ''), $attrs ));
		$out = "";
		if( !empty($id) ){
			$p = get_post( $id );
			if( $p->post_type === "dt_galleries" ):
				$permalink = get_permalink($id);
				$gallery_item_meta = get_post_meta($id,'_gallery_settings',TRUE);
				$gallery_item_meta = is_array($gallery_item_meta) ? $gallery_item_meta  : array();
				$items_id_exists = array_key_exists('items_id',$gallery_item_meta) ? true : false;
				
				$space =  ( $space =="yes" ) ? "with-space" : "no-space";

				$out .= "<div id='dt_galleries-{$id}' class='dt-gallery gallery {$space}'>";
				$out .= '	<figure>';
							$popup = "http://placehold.it/1060x795&text=DesignThemes";
							if( array_key_exists('items_name', $gallery_item_meta) ) {
								$item =  $gallery_item_meta['items_name'][0];
								$popup = $gallery_item_meta['items'][0];
								
								if( "video" === $item ){
									$items = array_diff( $gallery_item_meta['items_name'] , array("video") );
									if( !empty($items) ) {
										if( $items_id_exists ) {
											$id = $gallery_item_meta['items_id'][key($items)];
											$img = wp_get_attachment_image_src($id,$image_size);
											$out .= "<img src='".$img[0]."' width='".$img[1]."' height='".$img[2]."' alt=''/>";
										} else {
											echo "<img src='".$gallery_item_meta['items'][key($items)]."' width='1060' height='795' alt='' />";
										}
									} else {
										$out .= '<img src="http://placehold.it/1060x795&text=DesignThemes" width="1060" height="795" alt="">';
									}
								} else {
									if( $items_id_exists ) {
										$id = $gallery_item_meta['items_id'][0];
										$img = wp_get_attachment_image_src($id,$image_size);
										$out .= "<img src='".$img[0]."' width='".$img[1]."' height='".$img[2]."' alt=''/>";
									} else {
										echo "<img src='".$gallery_item_meta['items'][0]."' width='1060' height='795' alt=''/>";
									}
								}
                        	} else {
                        		$out .= "<img src='{$popup}'/>";
                        	}				
				$out .= '		<div class="image-overlay">';
				$out .= '			<div class="image-overlay-details">';
				$out .= "				<h5><a href='{$permalink}'>{$p->post_title}</a></h5>";
				$out .= '				<div class="links">';
				$out .= "              		<a href='{$popup}' data-gal='prettyPhoto[gallery]'> <span class='fa fa-search-plus'> </span> </a>";
				$out .= "					<a href='{$permalink}'> <span class='fa fa-external-link'> </span> </a>";
				 							if(dttheme_is_plugin_active('roses-like-this/likethis.php')):
												$out .= "<div class='views'> <span class='fa fa-heart'> </span> ".generateLikeString($id, isset($_COOKIE["like_" . $id])).'</div>';
											endif;
				$out .= '				</div>';
				$out .= '			</div>';
				$out .= '			<a class="close-overlay hidden"> x </a>';
				$out .= '		</div>';
				$out .= '	</figure>';
							if( $space == "with-space" ):
								$out .= '<div class="dt-gallery-details">';
								$out .= '	<div class="dt-gallery-details-inner">';
								$out .= "	<h5><a href='{$permalink}'>{$p->post_title}</a></h5>";
											if( array_key_exists("sub-title",$gallery_item_meta) ):
												$out .= "<h6>{$gallery_item_meta['sub-title']}</h6>";
											endif;	
								$out .= '	</div>';
								$out .= '</div>';
							endif;
				$out .= "</div>";
			else:
				$out .="<p>".__("There is no gallery item with id :","dt_themes").$id."</p>";
			endif;	
		} else{
			$out .="<p>".__("Please give gallery post id","dt_themes")."</p>";
		}
		return $out;
	}

	function dt_sc_recent_gallery_items( $attrs, $content="" ){
		
		global $post;
		$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
		$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();

		$template = get_page_template_slug($post->ID);
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
		$image_size = "";
		
		extract( shortcode_atts( array( 'columns'=>'','count'=>'', 'space' => ''), $attrs) );
		$out = "";
		$post_class =  ( $space =="yes" ) ? "column with-space " :  "column no-space ";
		switch ( $columns ) {
			case '2': 
				$post_class .= " dt-sc-one-half";
				
				if( $template ){ #For pages
					if( $template  === "tpl-fullwidth.php" ) {
						$image_size = "tpl-fullwidth-2-columns";
					} else {
						$image_size = ( $page_layout === "content-full-width" ) ?  "dt-default-2-columns" : "dt-default" ;
					}
				} else { # For post
					$image_size = ( $page_layout === "content-full-width" ) ?  "dt-default-2-columns" : "dt-default" ;
				}
				
			break;
			
			case '3':
				$post_class .= " dt-sc-one-third ";
				$image_size = ( ($template) && ( $template  === "tpl-fullwidth.php" ) ) ? "tpl-fullwidth-3-columns" : "dt-default";
			break;

			case '4': 
				$post_class .= " dt-sc-one-fourth ";
				$image_size = ( ($template) && ( $template  === "tpl-fullwidth.php" ) ) ? "tpl-fullwidth-4-columns" : "dt-default";
			break;

			case '5':
				$post_class .= " dt-sc-one-fifth ";
				$image_size = ( ($template) && ( $template  === "tpl-fullwidth.php" ) ) ? "tpl-fullwidth-4-columns" : "dt-default";
			break;

			case '6': 
				$post_class .= " dt-sc-one-sixth ";
				$image_size = ( ($template) && ( $template  === "tpl-fullwidth.php" ) ) ? "tpl-fullwidth-4-columns" : "dt-default";
			break;
		}

	
		$rposts = new WP_Query( array( 'post_type'=>'dt_galleries','posts_per_page' => $count, 'orderby' => 'date', 'ignore_sticky_posts' => 1 ) );
		if ( $rposts->have_posts() ):
			$i = 1;
			while( $rposts->have_posts() ):
				$rposts->the_post();
				$the_id = get_the_ID();

				$temp_class = "";
				if($i == 1) 
					$temp_class = $post_class." first";
				else
					$temp_class = $post_class;

				if($i == $columns)
					$i = 1;
				else
					$i = $i + 1;

				$out .= "<div class='{$temp_class}'>";
				$sc = "[dt_sc_gallery_item id='{$the_id}' space='{$space}' image_size='{$image_size}'/]";
				$out .= do_shortcode($sc);
				$out .= '</div>';
			endwhile;
			wp_reset_query();
		endif;
		return $out;
	}

	function dt_sc_gallery_items_from_category( $attrs, $content="" ){

		global $post;
		$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
		$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();

		$template = get_page_template_slug($post->ID);
		$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
		$image_size = "";

		
		extract( shortcode_atts( array( 'category_id'=>'', 'columns'=>'', 'space'=>'', 'count'=>''), $attrs) );
		$out = "";
		$post_class =  ( $space =="yes" ) ? "column with-space dt-gallery " :  "column no-space dt-gallery ";
		
		switch ( $columns ) {
			case '2': 
				$post_class .= " dt-sc-one-half";
				
				if( $template ){ #For pages
					if( $template  === "tpl-fullwidth.php" ) {
						$image_size = "tpl-fullwidth-2-columns";
					} else {
						$image_size = ( $page_layout === "content-full-width" ) ?  "dt-default-2-columns" : "dt-default" ;
					}
				} else { # For post
					$image_size = ( $page_layout === "content-full-width" ) ?  "dt-default-2-columns" : "dt-default" ;
				}
				
			break;
			
			case '3':
				$post_class .= " dt-sc-one-third ";
				$image_size = ( ($template) && ( $template  === "tpl-fullwidth.php" ) ) ? "tpl-fullwidth-3-columns" : "dt-default";
			break;

			case '4': 
				$post_class .= " dt-sc-one-fourth ";
				$image_size = ( ($template) && ( $template  === "tpl-fullwidth.php" ) ) ? "tpl-fullwidth-4-columns" : "dt-default";
			break;

			case '5':
				$post_class .= " dt-sc-one-fifth ";
				$image_size = ( ($template) && ( $template  === "tpl-fullwidth.php" ) ) ? "tpl-fullwidth-4-columns" : "dt-default";
			break;

			case '6': 
				$post_class .= " dt-sc-one-sixth ";
				$image_size = ( ($template) && ( $template  === "tpl-fullwidth.php" ) ) ? "tpl-fullwidth-4-columns" : "dt-default";
			break;
		}

		$category_id = explode(",", $category_id);
		if( is_array($category_id) && !empty($category_id) ){

			$args = array( 'orderby' => 'ID',
				'order' => 'ASC',
				'paged' => get_query_var( 'paged' ),
				'posts_per_page' => $count,
				'tax_query' => array( array( 'taxonomy'=>'dt_gallery_entries', 'field'=>'id', 'operator'=>'IN', 'terms'=>$category_id ) ) );

			query_posts($args);
			if( have_posts() ):
				$i = 1;
				while( have_posts() ):
					the_post();

					$the_id = get_the_ID();
					$permalink = get_permalink($the_id);
					$title = get_the_title($the_id);

					$gallery_item_meta = get_post_meta($the_id,'_gallery_settings',TRUE);
					$gallery_item_meta = is_array($gallery_item_meta) ? $gallery_item_meta  : array();

					$temp_class = "";
					if($i == 1) 
						$temp_class = $post_class." first";
					else
						$temp_class = $post_class;

					if($i == $columns)
						$i = 1;
					else
						$i = $i + 1;

					$out .= "<div class='{$temp_class}'>";
					$sc = "[dt_sc_gallery_item id='{$the_id}' space='{$space}' image_size='{$image_size}'/]";
					$out .= do_shortcode($sc);
					$out .= '</div>';
				endwhile;
				wp_reset_query();	
			endif;	
		} else {
			$out = "<p>".__("No gallery items in given category","dt_themes")."</p>";
		}

		return $out;		
	}


	function dt_sc_doshortcode($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'width' => '100',
				'animation' => '',
				'animation_delay' => ''
		), $attrs ) );

		$content = DTCoreShortcodesDefination::dtShortcodeHelper ( $content );

		$danimation = !empty( $animation ) ? " data-animation='{$animation}' ": "";
		$ddelay = ( !empty( $animation ) && !empty( $animation_delay )) ? " data-delay='{$animation_delay}' " : "";
		$danimate = !empty( $animation ) ? "animate": "";

		$first = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'first' )) ? 'first' : '';

		$out = '<div class="column '.$danimate.' '.$first.'" style="width:'.$width.'%;" '.$danimation.' '.$ddelay.'>';
		$cont = do_shortcode($content);
		if(isset($cont))
			$out .= $cont;
		else
			$out .= $content;
		$out .= '</div>';
		return $out;
	}

	function dt_sc_resizable($attrs, $content = null) {		
		extract ( shortcode_atts ( array (
				'width' => '',
				'class' => '',
				'animation' => '',
				'animation_delay' => ''
		), $attrs ) );

		$danimation = !empty( $animation ) ? " data-animation='{$animation}' ": "";
		$ddelay = (!empty( $animation ) && !empty( $animation_delay )) ? " data-delay='{$animation_delay}' " : "";
		$danimate = !empty( $animation ) ? "animate": "";

		$style = (!empty( $width ) ) ? ' style="width:'.$width.'%;" ' : "";
	
		$first = (isset ( $attrs [0] ) && trim ( $attrs [0] == 'first' )) ? 'first' : '';
		$content = do_shortcode(DTCoreShortcodesDefination::dtShortcodeHelper ( $content ));
		$out = "<div class='column {$class} {$danimate} {$first}' {$danimation} {$ddelay} {$style}>{$content}</div>";
		return $out;
	}

	function dt_sc_widgets($attrs, $content = null) {
		extract ( shortcode_atts ( array (
				'widget_name' => '',
				'widget_wpname' => '',
				'widget_wpid' => ''
		), $attrs ) );
		
		if($widget_name != ''):	
			
			foreach($attrs as $key=>$value):
				$instance[$key] = $value;			
			endforeach;
			
			$instance = array_filter($instance);
			
			if(substr($widget_name, 0, 2) == 'WC') $add_cls = 'woocommerce';
			else $add_cls = '';
			
			ob_start();
			the_widget($widget_name, $instance, 'before_widget=<aside id="'.$widget_wpid.'" class="widget '.$add_cls.' '.$widget_wpname.'">&after_widget=</aside>&before_title=<h3 class="widgettitle">&after_title=<span></span></h3>');
			$output = ob_get_contents();
			ob_end_clean();
			
			return $output;
							
		endif;

	}
}

new DTCoreShortcodesDefination();?>