<?php
global $dt_modules, $dt_animation_types, $woothemes_sensei, $dtthemes_columns;
$dt_animation_types = array();

$dt_animation_types = array("flash" => "flash", "shake" => "shake", "bounce" => "bounce", "tada" => "tada", "swing" => "swing", "wobble" => "wobble", "pulse" => "pulse", "flip" => "flip", "flipInX" => "flipInX", "flipOutX" => "flipOutX", "flipInY" => "flipInY", "flipOutY" => "flipOutY", "fadeIn" => "fadeIn", "fadeInUp" => "fadeInUp", "fadeInDown" => "fadeInDown", "fadeInLeft" => "fadeInLeft", "fadeInRight" => "fadeInRight", "fadeInUpBig" => "fadeInUpBig", "fadeInDownBig" => "fadeInDownBig", "fadeInLeftBig" => "fadeInLeftBig", "fadeInRightBig" => "fadeInRightBig", "fadeOut" => "fadeOut", "fadeOutUp" => "fadeOutUp","fadeOutDown" => "fadeOutDown", "fadeOutLeft" => "fadeOutLeft", "fadeOutRight" => "fadeOutRight", "fadeOutUpBig" => "fadeOutUpBig", "fadeOutDownBig" => "fadeOutDownBig", "fadeOutLeftBig" => "fadeOutLeftBig","fadeOutRightBig" => "fadeOutRightBig", "bounceIn" => "bounceIn", "bounceInUp" => "bounceInUp", "bounceInDown" => "bounceInDown", "bounceInLeft" => "bounceInLeft", "bounceInRight" => "bounceInRight", "bounceOut" => "bounceOut", "bounceOutUp" => "bounceOutUp", "bounceOutDown" => "bounceOutDown", "bounceOutLeft" => "bounceOutLeft", "bounceOutRight" => "bounceOutRight", "rotateIn" => "rotateIn", "rotateInUpLeft" => "rotateInUpLeft", "rotateInDownLeft" => "rotateInDownLeft", "rotateInUpRight" => "rotateInUpRight", "rotateInDownRight" => "rotateInDownRight", "rotateOut" => "rotateOut", "rotateOutUpLeft" => "rotateOutUpLeft","rotateOutDownLeft" => "rotateOutDownLeft", "rotateOutUpRight" => "rotateOutUpRight", "rotateOutDownRight" => "rotateOutDownRight", "hinge" => "hinge", "rollIn" => "rollIn", "rollOut" => "rollOut", "lightSpeedIn" => "lightSpeedIn", "lightSpeedOut" => "lightSpeedOut", "slideDown" => "slideDown", "slideUp" => "slideUp", "slideLeft" => "slideLeft", "slideRight" => "slideRight", "slideExpandUp" => "slideExpandUp", "expandUp" => "expandUp", "expandOpen" => "expandOpen", "bigEntrance" => "bigEntrance", "hatch" => "hatch", "floating" => "floating", "tossing" => "tossing", "pullUp" => "pullUp", "pullDown" => "pullDown", "stretchLeft" => "stretchLeft", "stretchRight" => "stretchRight");

$variations = array('chocolate' => 'Chocolate', 'green' => 'Green', 'blue' => 'Blue', 'orange' => 'Orange', 'pink' => 'Pink', 'red' => 'Red', 'purple' => 'Purple', 'ocean' => 'Ocean','black' => 'Black', 'slateblue' => 'Slate Blue', 'skyblue' => 'Sky Blue', 'coral' => 'Coral', 'khaki' => 'Khaki', 'cyan' => 'Cyan', 'grey' => 'Grey', 'gold' => 'Gold', 'raspberry'=>'Raspberry', 'electricblue' => 'Electric Blue', 'eggplant' => 'Eggplant', 'ferngreen' => 'Fern Green', 'palebrown' => 'Pale Brown');

#$button_types = array('type1' => 'Type 1', 'type2' => 'Type 2');

$button_size = array('small' => 'Small', 'medium' => 'Medium', 'large' => 'Large', 'xlarge' => 'Xlarge');

$page_targets = array('_blank' => 'Blank', '_new' => 'New', '_parent' => 'Parent', '_self' => 'Self', '_top' => 'Top');

$box_types = array('titled-box' => 'Titled Box', 'error-box' => 'Error Box', 'warning-box' => 'Warning Box', 'success-box' => 'Success Box', 'info-box' => 'Info Box');

$blocquote_types = array('type1' => 'Type 1', 'type2' => 'Type 2', 'type3' => 'Type 3', 'type4' => 'Type 4');

$pullquote_types = array('pullquote1' => 'Pullquote 1', 'pullquote2' => 'Pullquote 2', 'pullquote3' => 'Pullquote 3', 'pullquote4' => 'Pullquote 4', 'pullquote5' => 'Pullquote 5', 'pullquote6' => 'Pullquote 6');

$callout_box_types = array('type1' => 'Type 1', 'type2' => 'Type 2', 'type3' => 'Type 3', 'type4' => 'Type 4', 'type5' => 'Type 5', 'type6' => 'Type 6', 'type7' => 'Type 7');

$pricingtable_types = $testimonial_types = $colored_icon_box_types = array('type1' => 'Type 1', 'type2' => 'Type 2');

$align = array('left' => 'Left', 'right' => 'Right', 'center' => 'Center');

$yesorno = array('yes' => 'Yes', 'no' => 'No');

$trueorfalse = array('true' => 'True', 'false' => 'False');

$tooltip_positions = array('top' => 'Top', 'right' => 'Right', 'bottom' => 'Bottom', 'left' => 'Left');

$tooltip_types = array('default' => 'Default', 'boxed' => 'Boxed');

$dropcap_types = array('Default' => 'Default', 'Circle' => 'Circle', 'Bordered Circle' => 'Bordered Circle', 'Square' => 'Square', 'Bordered Square' => 'Bordered Square');

$bacground_repeat = array('no-repeat' => 'No Repeat', 'repeat' => 'Repeat', 'repeat-x' => 'Repeat X', 'repeat-y' => 'Repeat Y');

$bacground_position = array('left top' => 'Left Top', 'left center' => 'Left Center', 'left bottom' => 'Left Bottom', 'right top' => 'Right Top', 'right center' => 'Right Center', 'right bottom' => 'Right Bottom', 'center top' => 'Center Top', 'center center' => 'Center Center', 'center bottom' => 'Center Bottom');

$lengths = array(5 => 5, 10 => 10, 15 => 15, 20 => 20, 25 => 25, 30 => 30, 35 => 35, 40 => 40, 45 => 45, 50 => 50, 55 => 55, 60 => 60, 65 => 65, 70 => 70, 75 => 75, 80 => 80, 85 => 85, 90 => 90, 95 => 95, 100 => 100);

$post_columns = array(2 => 2, 3 => 3);

$portfolio_columns = array(2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6);

$teacher_columns = array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5);

$icon_box_types = array('type1' => 'Type 1', 'type2' => 'Type 2', 'type3' => 'Type 3');

$progressbar_types = array('standard' => 'Standard', 'progress-striped' => 'Striped', 'progress-striped-active' => 'Striped Active');

$oltypes = array('decimal' => 'Decimal', 'decimal-leading-zero' => 'Decimal With Leading Zero', 'lower-alpha' => 'Lower Alpha', 'lower-roman' => 'Lower Roman', 'upper-alpha' => 'Upper Alpha', 'upper-roman' => 'Upper Roman');

$ultypes = array('arrow' => 'Arrow', 'rounded-arrow' => 'Rounded Arrow', 'double-arrow' => 'Double Arrow', 'heart' => 'Heart', 'trash' => 'Trash', 'star' => 'Star', 'tick' => 'Tick', 'rounded-tick' => 'Rounded Tick', 'cross' => 'Cross', 'rounded-cross' => 'Rounded Cross', 'rounded-question' => 'Rounded Question', 'rounded-info' => 'Rounded Info', 'delete' => 'Delete', 'warning' => 'Warning', 'comment' => 'Comment', 'edit' => 'Edit', 'share' => 'Share', 'plus' => 'Plus', 'rounded-plus' => 'Rounded Plus', 'minus' => 'Minus', 'rounded-minus' => 'Rounded Minus', 'asterisk' => 'Asterisk', 'cart' => 'Cart', 'folder' => 'Folder', 'folder-open' => 'Folder Open', 'desktop' => 'Desktop', 'tablet' => 'Tablet', 'mobile' => 'Mobile', 'reply' => 'Reply', 'quote' => 'Quote', 'mail' => 'Mail', 'external-link' => 'External Link', 'adjust' => 'Adjust', 'pencil' => 'Pencil', 'print' => 'Print', 'tag' => 'Tag', 'thumbs-up' => 'Thumbs Up', 'thumbs-down' => 'Thumbs Down', 'time' => 'Time', 'globe' => 'Globe', 'pushpin' => 'Pushpin', 'map-marker' => 'Map Marker', 'link' => 'Link', 'paper-clip' => 'Paper Clip', 'download' => 'Download', 'key' => 'Key', 'search' => 'Search', 'rss' => 'Rss', 'twitter' => 'Twitter', 'facebook' => 'Facebook', 'linkedin' => 'Linkedin', 'google-plus' => 'Google Plus', 'circle-tick' => 'Circle Tick');

$slider_types = array('LayerSlider' => 'Layer Slider', 'RevolutionSlider' => 'Revolution Slider');

/*  Start of Columns Definition */

$dtthemes_columns['full_width'] = array( 
		'name' => __('1 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['one_half'] = array( 
		'name' => __('1/2 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['one_third'] = array( 
		'name' => __('1/3 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['one_fourth'] = array( 
		'name' => __('1/4 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['one_fifth'] = array( 
		'name' => __('1/5 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['one_sixth'] = array( 
		'name' => __('1/6 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['two_third'] = array( 
		'name' => __('2/3 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['two_fifth'] = array( 
		'name' => __('2/5 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['two_sixth'] = array( 
		'name' => __('2/6 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['three_fourth'] = array( 
		'name' => __('3/4 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['three_fifth'] = array( 
		'name' => __('3/5 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['three_sixth'] = array( 
		'name' => __('3/6 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['four_fifth'] = array( 
		'name' => __('4/5 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['four_sixth'] = array( 
		'name' => __('4/6 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['five_sixth'] = array( 
		'name' => __('5/6 Column', 'dt_themes'),
		'type' => 'column',
	);
$dtthemes_columns['resizable'] = array( 
		'name' => __('Resizable Column', 'dt_themes') ,
		'type' => 'column',
	);

$dtthemes_columns['fullwidth_section'] = array( 
	'name' => __('Fullwidth Section', 'dt_themes'),
	'type' => 'section',
	'options' => array(
		'backgroundcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => ''
		),
		'backgroundimage' => array(
			'title' => __('Background Image', 'dt_themes'),
			'type' => 'upload',
			'default_value' => ''
		),
		'opacity' => array(
			'title' => __('Background Opacity', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'parallax' => array(
			'title' => __('Parallax Effect', 'dt_themes'),
			'type' => 'select',
			'options' => $yesorno,
			'default_value' => array('no')
		),
		'backgroundrepeat' => array(
			'title' => __('Background Repeat', 'dt_themes'),
			'type' => 'select',
			'options' => $bacground_repeat,
			'default_value' => array('no-repeat')
		),
		'backgroundposition' => array(
			'title' => __('Background Position', 'dt_themes'),
			'type' => 'select',
			'options' => $bacground_position,
			'default_value' => array('left top')
		),
		'paddingtop' => array(
			'title' => __('Padding Top', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'paddingbottom' => array(
			'title' => __('Padding Bottom', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'margintop' => array(
			'title' => __('Margin Top', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'marginbottom' => array(
			'title' => __('Margin Bottom', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'height' => array(
			'title' => __('Height', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => ''
		),
		'class' => array(
			'title' => __('CSS Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		)
	)
);

$dtthemes_columns['fullwidth_video'] = array( 
	'name' => __('Fullwidth Section Video', 'dt_themes'),
	'type' => 'section',
	'options' => array(
		'mp4' => array(
			'title' => __('MP4', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'webm' => array(
			'title' => __('WEBM', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'ogv' => array(
			'title' => __('OGV', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'poster' => array(
			'title' => __('Poster Image', 'dt_themes'),
			'type' => 'upload',
			'default_value' => ''
		),
		'backgroundimage' => array(
			'title' => __('Background Image', 'dt_themes'),
			'type' => 'upload',
			'default_value' => ''
		),
		'paddingtop' => array(
			'title' => __('Padding Top (in px)', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'paddingbottom' => array(
			'title' => __('Padding Bottom (in px)', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'class' => array(
			'title' => __('CSS Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		)
	)
);

/*  End of Columns definition */


/*  Start of General Modules */

$dt_modules['general']['doshortcode_anycontent'] = array(
	'name' => __('Add Any Content Here', 'dt_themes'),
	'tooltip' => 'Add any content using this module',
	'icon_class' => 'ico-anycontent',
	'options' => array(
		'acc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true
		)
	)
);
											 
$dt_modules['general']['doshortcode_accordion_framed'] = array(
	'name' => __('Accordion Framed', 'dt_themes'),
	'tooltip' => 'Add Accordion Framed Module',
	'icon_class' => 'ico-accordion',
	'options' => array(
		'acc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_accordion_group]<br>
							[dt_sc_toggle_framed title="Accordion 1"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle_framed]<br>
							[dt_sc_toggle_framed title="Accordion 2"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle_framed]<br>
							[dt_sc_toggle_framed title="Accordion 3"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle_framed]<br>
						[/dt_sc_accordion_group]'
		)
	)
);

$dt_modules['general']['doshortcode_accordion_default'] = array(
	'name' => __('Accordion Default', 'dt_themes'),
	'tooltip' => 'Add Accordion Default Module',
	'icon_class' => 'ico-accordion',
	'options' => array(
		'acc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_accordion_group]<br>
							[dt_sc_toggle title="Accordion 1"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle]<br>
							[dt_sc_toggle title="Accordion 2"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle]<br>
							[dt_sc_toggle title="Accordion 3"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle]<br>
						[/dt_sc_accordion_group]'
		)
	)
);

$dt_modules['general']['animation'] = array(
	'name' => __('Animation', 'dt_themes'),
	'tooltip' => 'Add Animation effect for any content',
	'icon_class' => 'ico-animation',
	'options' => array(
		'effect' => array(
			'title' => __('Choose Effect', 'dt_themes'),
			'type' => 'select',
			'options' => $dt_animation_types,
			'default_value' => array('fadeInUp')
		),
		'delay' => array(
			'title' => __('Delay', 'dt_themes'),
			'type' => 'text',
			'default_value' => 400
		),
		'animation_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => 'Add any content here for animation.'
		)
	)
);


$dt_modules['general']['titled_box'] = array(
	'name' => __('Titled Box', 'dt_themes'),
	'tooltip' => 'Add titled box and different types of messgae box',
	'icon_class' => 'ico-box',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $box_types,
			'default_value' => array('titled-box')
		),
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Title Comes Here'
		),
		'icon' => array(
			'title' => __('Fontawesome Icon', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'fa-cogs'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		'variation' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		'box_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
		)
	)
);

$dt_modules['general']['button'] = array(
	'name' => __('Button', 'dt_themes'),
	'tooltip' => 'Add Button',
	'icon_class' => 'ico-button',
	'options' => array(
	
		'type' => array(
			'title' => __('Style','dt_themes'),
			'type' => 'select',
			'options' => array( 'with-icon' => 'With Icon', 'without-icon' =>'Without Icon'),
			'default_value' => array('with-icon'),
		),

		'icon' => array(
			'title' => __('Font Awesome Icon', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		
		'link' => array(
			'title' => __('Link', 'dt_themes'),
			'type' => 'text',
			'default_value' => '#'
		),
		
		'size' => array(
			'title' => __('Size', 'dt_themes'),
			'type' => 'select',
			'options' => $button_size,
			'default_value' => array('medium')
		),
		
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		
		'variation' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		
		'target' => array(
			'title' => __('Target', 'dt_themes'),
			'type' => 'select',
			'options' => $page_targets,
			'default_value' => array('_blank')
		),
		
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => ''
		),
		
		'button_content' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'Sample Button'
		),
	));

$dt_modules['general']['blockquote'] = array(
	'name' => __('Blockquote', 'dt_themes'),
	'tooltip' => 'Add Blockquote',
	'icon_class' => 'ico-blockquote',
	'options' => array(
	
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $blocquote_types,
			'default_value' => array('type1')
		),
		
		'align' => array(
			'title' => __('Align', 'dt_themes'),
			'type' => 'select',
			'options' => $align,
			'default_value' => array('left')
		),
		
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		
		'cite' => array(
			'title' => __('Cite', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		
		'blockquote_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
		)
	) );

$dt_modules['general']['pullquote'] = array(
	'name' => __('Pullquote', 'dt_themes'),
	'tooltip' => 'Add different types of pullquotes',
	'icon_class' => 'ico-quote',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $pullquote_types,
			'default_value' => array('pullquote1')
		),
		'icon' => array(
			'title' => __('Show Icon', 'dt_themes'),
			'type' => 'select',
			'options' => $yesorno,
			'default_value' => array('yes')
		),
		'align' => array(
			'title' => __('Align', 'dt_themes'),
			'type' => 'select',
			'options' => $align,
			'default_value' => array('left')
		),
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => ''
		),
		'cite' => array(
			'title' => __('Cite Name', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Dolor sit amet'
		),
		'pq_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
		)
	) );

$dt_modules['general']['tooltip'] = array(
	'name' => __('Tooltip', 'dt_themes'),
	'tooltip' => 'Add tooltip with different positions',
	'icon_class' => 'ico-pullquote',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $tooltip_types,
			'default_value' => array('default')
		),
		'position' => array(
			'title' => __('Position', 'dt_themes'),
			'type' => 'select',
			'options' => $tooltip_positions,
			'default_value' => array('top')
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker'
		),
		'tooltip' => array(
			'title' => __('Tooltip Text', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Consectetur adipisicing elit'
		),
		'href' => array(
			'title' => __('Link', 'dt_themes'),
			'type' => 'text',
			'default_value' => '#'
		),
		'target' => array(
			'title' => __('Target', 'dt_themes'),
			'type' => 'select',
			'options' => $page_targets,
			'default_value' => array('_blank')
		),
		'tp_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'Lorem ipsum'
		)
	) );
	
$dt_modules['general']['callout_box'] = array(
	'name' => __('Callout Box', 'dt_themes'),
	'tooltip' => 'Add the callout box here',
	'icon_class' => 'ico-callout',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $callout_box_types,
			'default_value' => array('type1')
		),
		'link' => array(
			'title' => __('Link', 'dt_themes'),
			'type' => 'text',
			'default_value' => '#'
		),
		'button_text' => array(
			'title' => __('Button Label', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Purchase Now'
		),
		'button_icon' => array(
			'title' => __('Icon', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'fa-home'
		),

		'image' => array(
			'title' => __('Image', 'dt_themes'),
			'type' => 'upload',
			'default_value' => ''
		),
		
		'target' => array(
			'title' => __('Target', 'dt_themes'),
			'type' => 'select',
			'options' => $page_targets,
			'default_value' => array('_blank')
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text'
		),
		'cb_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => "<h4>Our Technological services has been improved vastly</h4><h5>Come Experience the real life situations of saving life</h5>"
		)
	)
);

$dt_modules['general']['fancy_ol'] = array(
	'name' => __('Ordered Lists', 'dt_themes'),
	'tooltip' => 'Add items in ordered list',
	'icon_class' => 'ico-orderedlists',
	'options' => array(
		'style' => array(
			'title' => __('Style', 'dt_themes'),
			'type' => 'select',
			'options' => $oltypes,
			'default_value' => array('decimal')
		),
		'variation' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'ol_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '<ol>
							<li>Lorem ipsum dolor sit</li>
							<li>Praesent convallis nibh</li>
							<li>Nullam ac sapien sit</li>
							<li>Phasellus auctor augue</li>
						</ol>'
		)
	)
);

$dt_modules['general']['fancy_ul'] = array(
	'name' => __('Unordered Lists', 'dt_themes'),
	'tooltip' => 'Add items in unordered lists',
	'icon_class' => 'ico-unorderedlists',
	'options' => array(
		'style' => array(
			'title' => __('Style', 'dt_themes'),
			'type' => 'select',
			'options' => $ultypes,
			'default_value' => array('arrow')
		),
		'variation' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text'
		),
		'ul_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '<ul>
							<li>Lorem ipsum dolor sit</li>
							<li>Praesent convallis nibh</li>
							<li>Nullam ac sapien sit</li>
							<li>Phasellus auctor augue</li>
						</ul>'
		)
	));

$dt_modules['general']['fancy_ul_alt'] = array(
	'name' => __('Unordered Lists II', 'dt_themes'),
	'tooltip' => 'Add items in unordered lists',
	'icon_class' => 'ico-unorderedlists',
	'options' => array(
		
		'alignright' => array(
			'title' => __( 'Align Right','dt_themes'),
			'type' =>  'select',
			'options' => array("yes" =>__("Yes","dt_themes"), "no" => __("No","dt_themes") ),
			'default_value' => array("yes")
		),
	
		'variation' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text'
		),
		'ul_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_ul]
				[dt_sc_li icon="fa-pencil" text="Lorem ipsum dolor sit" link="#"/]
				[dt_sc_li icon="fa-comment" text="Praesent convaldtlis nibh" link="#"/]
				[dt_sc_li icon="fa-asterisk" text="Nullam ac sapien sit" link="#"/]
				[dt_sc_li icon="fa-gavel" text="Phasellus auctor augue" link="#"/]
			[/dt_sc_ul]'
		)
	));

$dt_modules['general']['pricing_table'] = array(
	'name' => __('Pricing Table', 'dt_themes'),
	'tooltip' => 'Add pricing table',
	'icon_class' => 'ico-pricingtable',
	'options' => array(
		'pt_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => "[dt_sc_one_third first]
[dt_sc_pricing_table_item variation='pink' heading='gift' button_text='Buy Now' button_link='#' currency=' price1='15' price2='.85' selected]
<ul>
<li>Text</li>
<li>Text</li>
<li>Text</li>
</ul>
[/dt_sc_pricing_table_item]
[/dt_sc_one_third]
[dt_sc_one_third]
[dt_sc_pricing_table_item variation='purple' heading='gift' button_text='Buy Now' button_link='#' currency=' price1='15' price2='.85']
<ul>
<li>Text</li>
<li>Text</li>
<li>Text</li>
</ul>
[/dt_sc_pricing_table_item]
[/dt_sc_one_third]
[dt_sc_one_third]
[dt_sc_pricing_table_item variation='blue' heading='gift' button_text='Buy Now' button_link='#' currency=' price1='15' price2='.85']
<ul>
<li>Text</li>
<li>Text</li>
<li>Text</li>
</ul>
[/dt_sc_pricing_table_item]
[/dt_sc_one_third]"
		)
	));

$dt_modules['general']['pricing_table_rounded'] = array(
	'name' => __('Rounded Pricing Table', 'dt_themes'),
	'tooltip' => 'Add pricing table',
	'icon_class' => 'ico-pricingtable',
	'options' => array(
		'pt_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => "[dt_sc_one_third first]
				[dt_sc_pricing_table_item variation='skyblue' heading='gift' button_text='Buy Now' button_link='#' currency='$' price1='15' price2='.85' selected]
				[dt_pricing_round_text title='Full Circle' subtitle='2 Person' text='Gift your loved ones a dinner at affordable price' /]
				[/dt_sc_pricing_table_item]
				[/dt_sc_one_third]
				[dt_sc_one_third]
				[dt_sc_pricing_table_item variation='chocolate' heading='gift' button_text='Buy Now' button_link='#' currency='$' price1='15' price2='.85' ]
				[dt_pricing_round_text title='Full Circle' subtitle='2 Person' text='Gift your loved ones a dinner at affordable price' /]
				[/dt_sc_pricing_table_item]
				[/dt_sc_one_third]
				[dt_sc_one_third]
				[dt_sc_pricing_table_item variation='pink' heading='gift' button_text='Buy Now' button_link='#' currency='$' price1='15' price2='.85' ]
				[dt_pricing_round_text title='Full Circle' subtitle='2 Person' text='Gift your loved ones a dinner at affordable price' /]
				[/dt_sc_pricing_table_item]
				[/dt_sc_one_third]"
		)
	));

$dt_modules['general']['pricing_table_with_image'] = array(
	'name' => __('Pricing Table with Image', 'dt_themes'),
	'tooltip' => 'Add pricing table',
	'icon_class' => 'ico-pricingtable',
	'options' => array(
		'pt_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => "[dt_sc_one_third first]
[dt_sc_pricing_table_item title='DesignThemes' thumb='http://placehold.it/300x200&amp;text=DesignThemes' variation='lightgreen' heading='gift' button_text='Buy Now' button_link='#' currency='$' price1='15' price2='.85' selected]
<ul>
	<li>Text</li>
	<li>Text</li>
	<li>Text</li>
</ul>
[/dt_sc_pricing_table_item]
[/dt_sc_one_third]

[dt_sc_one_third]
[dt_sc_pricing_table_item title='DesignThemes' thumb='http://placehold.it/300x200&amp;text=DesignThemes' variation='khaki' heading='gift' button_text='Buy Now' button_link='#' currency='$' price1='15' price2='.85' ]
<ul>
	<li>Text</li>
	<li>Text</li>
	<li>Text</li>
</ul>
[/dt_sc_pricing_table_item]
[/dt_sc_one_third]

[dt_sc_one_third]
[dt_sc_pricing_table_item title='DesignThemes' thumb='http://placehold.it/300x200&amp;text=DesignThemes' variation='pink' heading='gift' button_text='Buy Now' button_link='#' currency='$' price1='15' price2='.85' ]
<ul>
	<li>Text</li>
	<li>Text</li>
	<li>Text</li>
</ul>
[/dt_sc_pricing_table_item]
[/dt_sc_one_third]"
		)
	) );

$dt_modules['general']['progressbar'] = array(
	'name' => __('Progress Bar', 'dt_themes'),
	'tooltip' => 'Add different types of progres bar',
	'icon_class' => 'ico-progressbar',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $progressbar_types,
			'default_value' => array('standard')
		),
		'color' => array(
			'title' => __('Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => ''
		),
		'value' => array(
			'title' => __('Value', 'dt_themes'),
			'type' => 'text',
			'default_value' => 55
		),
		'content' => array(
			'title' => __('Text', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'Consectetur'
		)
	));

$dt_modules['general']['tabs_horizontal'] = array(
	'name' => __('Tabs - Horizontal', 'dt_themes'),
	'tooltip' => 'Add horizontal tabs',
	'icon_class' => 'ico-tabs',
	'options' => array(

		'class' => array(
			'title' => __('Style', 'dt_themes'),
			'type' => 'select',
			'options' => array( 'aligncenter' => 'Align Center', 'alignleft' => 'Align Left'),
			'default_value' => array('alignleft')
		),
	
		'th_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_tab title="Tab 1" number="01"]<br>
							
							Tab 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_tab]<br>
							[dt_sc_tab title="Tab 2" number="02"]<br>
							
							Tab 2 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_tab]<br>
							[dt_sc_tab title="Tab 3" number="03"]<br>
							
							Tab 3 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_tab]'
		)
	)
);

$dt_modules['general']['tabs_vertical'] = array(
	'name' => __('Tabs Vertical', 'dt_themes'),
	'tooltip' => 'Add vertical tabs',
	'icon_class' => 'ico-tabs',
	'options' => array(
		'tv_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_tab title="Tab 1" number="01"]<br>
							
							Tab 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_tab]<br>
							[dt_sc_tab title="Tab 2" number="02"]<br>
							
							Tab 2 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_tab]<br>
							[dt_sc_tab title="Tab 3" number="03"]<br>
							
							Tab 3 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_tab]'
		)
	)
);

$dt_modules['general']['doshortcode_toggledefault'] = array(
	'name' => __('Toggle Default', 'dt_themes'),
	'tooltip' => 'Add default toggles',
	'icon_class' => 'ico-toggle',
	'options' => array(
		'td_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_toggle title="Toggle 1"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle]<br>
							[dt_sc_toggle title="Toggle 2"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle]<br>
							[dt_sc_toggle title="Toggle 3"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
						[/dt_sc_toggle]'
		)
	)
);

$dt_modules['general']['doshortcode_toggleframed'] = array(
	'name' => __('Toggle Framed', 'dt_themes'),
	'tooltip' => 'Add framed toggles',
	'icon_class' => 'ico-toggle',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_toggle_framed title="Toggle 1"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle_framed]<br>
							[dt_sc_toggle_framed title="Toggle 2"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
							[/dt_sc_toggle_framed]<br>
							[dt_sc_toggle_framed title="Toggle 3"]<br>
							
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br>
							
						[/dt_sc_toggle_framed]'
		)
	)
);

$dt_modules['general']['dropcap'] = array(
	'name' => __('Dropcap', 'dt_themes'),
	'tooltip' => __('Use this module to add dropcap', 'dt_themes'),
	'icon_class' => 'ico-dropcap',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $dropcap_types,
			'default_value' => array('Default')
		),
		'variation' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#808080'
		),
		'textcolor' => array(
			'title' => __('Text Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#4bbcd7'
		),
		'content' => array(
			'title' => __('Text', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'A'
		)
	)
);

$dt_modules['general']['doshortcode_team'] = array(
	'name' => __('Team', 'dt_themes'),
	'tooltip' => __('Use this module to add member', 'dt_themes'),
	'icon_class' => 'ico-team',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_team name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500" twitter="#" facebook="#" google="#" linkedin="#"]<br><p>Saleem naijar kaasram eerie can be disbursed in the wofl like of a fox that is her thing smaoasa lase lemedds laasd pamade eleifend sapien.</p>[/dt_sc_team]'
		)
	)
);

$dt_modules['general']['doshortcode_testimonial'] = array(
	'name' => __('Testimonial', 'dt_themes'),
	'tooltip' => __('Use this module to add testimonial', 'dt_themes'),
	'icon_class' => 'ico-testimonial',
	'options' => array(
		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '[dt_sc_testimonial name="John Doe" image="http://placehold.it/300"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.[/dt_sc_testimonial]'
		)
	)
);

$dt_modules['general']['testimonial_carousel'] = array(
	'name' => __('Testimonial Carousel', 'dt_themes'),
	'tooltip' => __('Use this module to add testimonial carousel', 'dt_themes'),
	'icon_class' => 'ico-testimonial',
	'options' => array(
	
		'class' => array(
		'title' => __('Style', 'dt_themes'),
		'type' => 'select',
		'options' => array( '' => 'Default', 'type2' => 'Alternate'),
		'default_value' => array('')
		),

		'tmc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '<ul>
									<li>[dt_sc_testimonial name="John Doe" role="Cambridge Telcecom" type="type2" class=""]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.[/dt_sc_testimonial]</li>
									<li>[dt_sc_testimonial name="John Doe" role="Cambridge Telcecom" type="type2" class=""]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.[/dt_sc_testimonial]</li>
									<li>[dt_sc_testimonial name="John Doe" role="Cambridge Telcecom" type="type2" class=""]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.[/dt_sc_testimonial]</li>
								</ul>'
		)
	)
);

$dt_modules['general']['carousel'] = array(
	'name' => __('Images Carousel', 'dt_themes'),
	'tooltip' => __('Use this module to add images carousel', 'dt_themes'),
	'icon_class' => 'ico-clients',
	'options' => array(

		'columns' => array(
			'title' => __('Columns', 'dt_themes'),
			'type' => 'select',
			'options' => array( '2' => '2 Columns', '3' => '3 Columns' , '4' => '4 Columns', '5' => '5 Columns'),
			'default_value' => array('4')
		),
	
		'cc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '<ul>
									<li><a href="#"><img title="Client 1" src="http://placehold.it/163x116" alt="Client 1" /></a></li>
									<li><a href="#"><img title="Client 2" src="http://placehold.it/163x116" alt="Client 2" /></a></li>
									<li><a href="#"><img title="Client 3" src="http://placehold.it/163x116" alt="Client 3" /></a></li>
									<li><a href="#"><img title="Client 4" src="http://placehold.it/163x116" alt="Client 4" /></a></li>
									<li><a href="#"><img title="Client 5" src="http://placehold.it/163x116" alt="Client 5" /></a></li>
								</ul>'
		)
	)
);

$dt_modules['general']['icon_box'] = array(
	'name' => __('Icon Box', 'dt_themes'),
	'tooltip' => __('Use this module to add icon box', 'dt_themes'),
	'icon_class' => 'ico-iconbox',
	'options' => array(
		'type' => array(
			'title' => __('Types', 'dt_themes'),
			'type' => 'select',
			'options' => $icon_box_types,
			'default_value' => array('type1')
		),
		'fontawesome_icon' => array(
			'title' => __('Fontawesome Icon', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'trophy'
		),
		'custom_icon' => array(
			'title' => __('Custom Icon', 'dt_themes'),
			'type' => 'upload',
			'default_value' => ''
		),

		'inner_image' => array(
			'title' => __('Type 1 Inner Image', 'dt_themes'),
			'type' => 'upload',
			'default_value' => 'http://placehold.it/620x237&text=DesignThemes'
		),

		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Title Comes Here'
		),
		'link' => array(
			'title' => __('Link', 'dt_themes'),
			'type' => 'text',
			'default_value' => '#'
		),
		'color' => array(
			'title' => __('Variation', 'dt_themes'),
			'type' => 'select',
			'options' => $variations,
			'default_value' => array()
		),
		'ib_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras cursus sollicitudin nunc nec rhoncus.'
		)
	)
);

/*  End of General Modules */


/*  Start of Unique Modules */

if(function_exists('dttheme_is_plugin_active') && dttheme_is_plugin_active('woothemes-sensei/woothemes-sensei.php')) {
	
	$dt_modules['unique']['courses_sensei'] = array(
		'name' => __('Courses - Sensei', 'dt_themes'),
		'tooltip' => __('Use this module to add courses', 'dt_themes'),
		'icon_class' => 'ico-courses-sensei',
		'options' => array(
			'course_type' => array(
				'title' => __('Course Type', 'dt_themes'),
				'type' => 'select',
				'options' => $course_sensei_types,
				'default_value' => array()
			),
			'limit' => array(
				'title' => __('Limit', 'dt_themes'),
				'type' => 'text',
				'default_value' => '4'
			),
			'carousel' => array(
				'title' => __('Carousel', 'dt_themes'),
				'type' => 'select',
				'options' => $trueorfalse,
				'default_value' => array('false')
			),
			'categories' => array(
				'title' => __('Categories', 'dt_themes'),
				'type' => 'text',
				'default_value' => ''
			),
		)
	);

}

$dt_modules['unique']['popular_procedure'] = array(
	'name' => __('Popular Procedure','dt_themes'),
	'tooltip' => __('Use this module to add popular procedure','dt_themes'),
	'icon_class' => 'ico-iconbox',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Aliquama'
		),
		'image' => array(
			'title' => __('Image', 'dt_themes'),
			'type' => 'upload',
			'default_value' => 'http://placehold.it/500&text=Images'
		),
		'link' => array(
			'title' => __('Link', 'dt_themes'),
			'type' => 'text',
			'default_value' => '#'
		),
		'button_text' => array(
			'title' => __('Button Text', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Read More'
		),
		'hours' => array(
			'title' => __('Hours', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Duration: 1-2hr'
		),
		'price' => array(
			'title' => __('Price', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Price: $18.00'
		),
		'ib_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias provident destiny is about voles.'
		)
	)
);

$dt_modules['unique']['donutchart_small'] = array(
	'name' => __('Donut Chart - Small', 'dt_themes'),
	'tooltip' => __('Use this module to add small donutchart', 'dt_themes'),
	'icon_class' => 'ico-donutchart',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#808080'
		),
		'fgcolor' => array(
			'title' => __('Foreground Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#4bbcd7'
		),
		'percent' => array(
			'title' => __('Percent', 'dt_themes'),
			'type' => 'text',
			'default_value' => '40'
		),
	)
);

$dt_modules['unique']['donutchart_medium'] = array(
	'name' => __('Donut Chart - Medium', 'dt_themes'),
	'tooltip' => __('Use this module to add medium donutchart', 'dt_themes'),
	'icon_class' => 'ico-donutchart',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#808080'
		),
		'fgcolor' => array(
			'title' => __('Foreground Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#4bbcd7'
		),
		'percent' => array(
			'title' => __('Percent', 'dt_themes'),
			'type' => 'text',
			'default_value' => '40'
		),
	)
);

$dt_modules['unique']['donutchart_large'] = array(
	'name' => __('Donut Chart - Large', 'dt_themes'),
	'tooltip' => __('Use this module to add large donutchart', 'dt_themes'),
	'icon_class' => 'ico-donutchart',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Lorem'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#808080'
		),
		'fgcolor' => array(
			'title' => __('Foreground Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#4bbcd7'
		),
		'percent' => array(
			'title' => __('Percent', 'dt_themes'),
			'type' => 'text',
			'default_value' => '40'
		),
	)
);

$dt_modules['unique']['post'] = array(
	'name' => __('Single Post', 'dt_themes'),
	'tooltip' => __('Use this module to display any single post', 'dt_themes'),
	'icon_class' => 'ico-singlepost',
	'options' => array(
		'id' => array(
			'title' => __('Post Id', 'dt_themes'),
			'type' => 'text',
			'default_value' => '1'
		),
		'read_more_text' => array(
			'title' => __('Read More Text', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Read More'
		),
		'excerpt_length' => array(
			'title' => __('Excerpt Length', 'dt_themes'),
			'type' => 'text',
			'default_value' => '10'
		),
		'show_meta' => array(
			'title' => __('Show Meta Data ','dt_themes'),
			'type' => 'select',
			'options' => array( "yes" => __("Yes","dt_themes"), "no" => __("No","dt_themes")),
			'default_value' => array("yes")
		),
	)
);

$dt_modules['unique']['recent_post'] = array(
	'name' => __('Recent Posts', 'dt_themes'),
	'tooltip' => __('Use this module to display recent posts', 'dt_themes'),
	'icon_class' => 'ico-recentposts',
	'options' => array(
		'columns' => array(
			'title' => __('Columns', 'dt_themes'),
			'type' => 'select',
			'options' => $post_columns,
			'default_value' => array(3)
		),
		'count' => array(
			'title' => __('Limit', 'dt_themes'),
			'type' => 'text',
			'default_value' => '3'
		),
		'read_more_text' => array(
			'title' => __('Read More Text', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Read More'
		),
		'excerpt_length' => array(
			'title' => __('Excerpt Length', 'dt_themes'),
			'type' => 'text',
			'default_value' => '10'
		),
		'show_meta' => array(
			'title' => __('Show Meta Data ','dt_themes'),
			'type' => 'select',
			'options' => array( "yes" => __("Yes","dt_themes"), "no" => __("No","dt_themes")),
			'default_value' => array("yes")
		),
	)
);

$dt_modules['unique']['gallery_item'] = array(
	'name' => __('Gallery Item', 'dt_themes'),
	'tooltip' => __('Use this module to add individual gallery items', 'dt_themes'),
	'icon_class' => 'ico-portfolio-item',
	'options' => array(
		'id' => array(
			'title' => __('Item Id', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
	)
);

$dt_modules['unique']['recent_gallery_items'] = array(
	'name' => __('Recent Gallery Items', 'dt_themes'),
	'tooltip' => __('Use this module to add recent gallery items', 'dt_themes'),
	'icon_class' => 'ico-portfolio-item',
	'options' => array(
		'columns' => array(
			'title' => __('Columns', 'dt_themes'),
			'type' => 'select',
			'options' => $portfolio_columns,
			'default_value' => array(3)
		),
		
		'space' => array(
			'title' => __('Allow Space','dt_themes'),
			'type' => 'select',
			'options' => array( "yes" => __("Yes","dt_themes"), "no" => __("No","dt_themes")),
			'default_value' => array("yes")
		),
		'count' => array(
			'title' => 'Count',
			'type' => 'text',
			'default_value' => ''
		),
	)
);

$dt_modules['unique']['gallery_items_from_category'] = array(
	'name' => __('Gallery Items From Category', 'dt_themes'),
	'tooltip' => __('Use this module to add gallery items from category', 'dt_themes'),
	'icon_class' => 'ico-portfolio-item',
	'options' => array(
		'category_id' => array(
			'title' => __('Category Id(s)', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'column' => array(
			'title' => __('Columns', 'dt_themes'),
			'type' => 'select',
			'options' => $portfolio_columns,
			'default_value' => array(3)
		),
		
		'space' => array(
			'title' => __('Allow Space','dt_themes'),
			'type' => 'select',
			'options' => array( "yes" => __("Yes","dt_themes"), "no" => __("No","dt_themes")),
			'default_value' => array("yes")
		),
		'count' => array(
			'title' => 'Count',
			'type' => 'text',
			'default_value' => ''
		),
	)
);

/*$dt_modules['unique']['icon_box_colored'] = array(
	'name' => __('Icon Box Colored', 'dt_themes'),
	'tooltip' => 'Add the colored icon box',
	'icon_class' => 'ico-iconbox-colored',
	'options' => array(
		'type' => array(
			'title' => __('Type', 'dt_themes'),
			'type' => 'select',
			'options' => $colored_icon_box_types,
			'default_value' => array('type1')
		),
		'fontawesome_icon' => array(
			'title' => __('Fontawesome Icons', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'home'
		),
		'custom_icon' => array(
			'title' => __('Custom Icons', 'dt_themes'),
			'type' => 'upload',
			'default_value' => ''
		),
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Sample Title'
		),
		'bgcolor' => array(
			'title' => __('Background Color', 'dt_themes'),
			'type' => 'colorpicker',
			'default_value' => '#333334'
		),
		'ibc_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempora."
		)
	)
);
*/
/*  End of Unique Modules */

/*  Start of Others Modules */

$dt_modules['others']['h1'] = array(
	'name' => __('Heading 1', 'dt_themes'),
	'tooltip' => __('Use this module to add heading 1', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'content' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'Title Comes Here'
		),
	)
);

$dt_modules['others']['h2'] = array(
	'name' => __('Heading 2', 'dt_themes'),
	'tooltip' => __('Use this module to add heading 2', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'content' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'Title Comes Here'
		),
	)
);

$dt_modules['others']['h3'] = array(
	'name' => __('Heading 3', 'dt_themes'),
	'tooltip' => __('Use this module to add heading 3', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'content' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'Title Comes Here'
		),
	)
);

$dt_modules['others']['h4'] = array(
	'name' => __('Heading 4', 'dt_themes'),
	'tooltip' => __('Use this module to add heading 4', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'content' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'Title Comes Here'
		),
	)
);

$dt_modules['others']['h5'] = array(
	'name' => __('Heading 5', 'dt_themes'),
	'tooltip' => __('Use this module to add heading 5', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'content' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'Title Comes Here'
		),
	)
);

$dt_modules['others']['h6'] = array(
	'name' => __('Heading 6', 'dt_themes'),
	'tooltip' => __('Use this module to add heading 6', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'class' => array(
			'title' => __('Class', 'dt_themes'),
			'type' => 'text',
			'default_value' => ''
		),
		'content' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'is_content' => true,
			'default_value' => 'Title Comes Here'
		),
	)
);

$dt_modules['others']['intro_text'] = array(
	'name' => __('Intro Text', 'dt_themes'),
	'tooltip' => __('Use this module to add introduction text', 'dt_themes'),
	'icon_class' => 'ico-headings',
	'options' => array(
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'A Warm Welcome'
		),

		'tf_content' => array(
			'title' => __('Content', 'dt_themes'),
			'type' => 'wp_editor',
			'is_content' => true,
			'default_value' => '<h6>We at Dream Spa provide various services to the nature of the clients. Wish how you would like to spend the
time here we can talk and come to a conclusion.</h6>'
		)
	)
);

$dt_modules['others']['address'] = array(
	'name' => __('Address', 'dt_themes'),
	'tooltip' => __('Use this module to add address', 'dt_themes'),
	'icon_class' => 'ico-address',
	'options' => array(
		'icon' => array(
			'title' => __('Fontawesome icon', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'fa-rocket'
		),
		'detail' => array(
			'title' => __('Address', 'dt_themes'),
			'type' => 'text',
			'default_value' => '121 King St, Melbourne VIC 3000, Australia'
		)
	)
);

$dt_modules['others']['contact'] = array(
	'name' => __('Contact Info', 'dt_themes'),
	'tooltip' => __('Use this module to add phone no etc', 'dt_themes'),
	'icon_class' => 'ico-email',
	'options' => array(

		'icon' => array(
			'title' => __('Fontawesome icon', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'fa-phone'
		),
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Phone/Booking'
		),
		'detail' => array(
			'title' => __('Detail', 'dt_themes'),
			'type' => 'text',
			'default_value' => '+1 888 458 5376 (offline)'
		),
		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Mon - Fri 9AM - 8:30PM'
		)
	)
);

$dt_modules['others']['email'] = array(
	'name' => __('Email', 'dt_themes'),
	'tooltip' => __('Use this module to add email alone', 'dt_themes'),
	'icon_class' => 'ico-email',
	'options' => array(

		'icon' => array(
			'title' => __('Fontawesome icon', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'fa-envelope'
		),
		
		'title' => array(
			'title' => __('Title', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'Email'
		),
	
		'emailid' => array(
			'title' => __('Email', 'dt_themes'),
			'type' => 'text',
			'default_value' => 'yourname@somemail.com'
		),

		'description' => array(
			'title' => __('Description', 'dt_themes'),
			'type' => 'text',
			'default_value' => '24/7'
		)
	)
);

$dt_modules['others']['clear'] = array(
	'name' => __('Clear', 'dt_themes'),
	'tooltip' => __('Add this module to add space between contents', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_border'] = array(
	'name' => __('Bordered Horizontal Rule', 'dt_themes'),
	'tooltip' => __('Use this module to add bordered horizontal rule', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr'] = array(
	'name' => __('Horizontal Rule', 'dt_themes'),
	'tooltip' => __('Use this module to add horizontal rule', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_medium'] = array(
	'name' => __('Horizontal Rule Medium', 'dt_themes'),
	'tooltip' => __('Use this module to add medium horizontal rule', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_large'] = array(
	'name' => __('Horizontal Rule Large', 'dt_themes'),
	'tooltip' => __('Use this module to add large horizontal rule', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_top'] = array(
	'name' => __('Horizontal Rule With Top Link', 'dt_themes'),
	'tooltip' => __('Use this module to add horizontal rule with top link', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_invisible'] = array(
	'name' => __('Whitespace', 'dt_themes'),
	'tooltip' => __('Use this module to add whitespace', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_invisible_small'] = array(
	'name' => __('Whitespace Small', 'dt_themes'),
	'tooltip' => __('Use this module to add small whitespace', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_invisible_medium'] = array(
	'name' => __('Whitespace Medium', 'dt_themes'),
	'tooltip' => __('Use this module to add medium whitespace', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);

$dt_modules['others']['hr_invisible_large'] = array(
	'name' => __('Whitespace Large', 'dt_themes'),
	'tooltip' => __('Use this module to add large whitespace', 'dt_themes'),
	'icon_class' => 'ico-divider',
	'disable_resize' => true,
);
/*  End of Others Modules */?>