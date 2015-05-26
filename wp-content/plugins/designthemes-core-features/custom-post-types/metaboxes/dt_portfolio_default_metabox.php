<?php
global $post;
$gallery_settings = get_post_meta ( $post->ID, '_gallery_settings', TRUE );
$gallery_settings = is_array ( $gallery_settings ) ? $gallery_settings : array ();?>

<!-- Sub Title -->
<div class="custom-box">

	<div class="column one-sixth">
		<label><?php _e('Sub Title','dt_themes');?></label>
	</div>

	<div class="column five-sixth last">
	<?php $subtitle = array_key_exists ( "sub-title", $gallery_settings ) ? $gallery_settings ['sub-title'] : '';?>
    
		<input id="sub-title" name="sub-title" type="text" class="widefat" 	value="<?php echo $subtitle;?>" />
		<p class="note"> <?php _e("If you wish! You can add sub title.",'dt_themes');?> </p>
        <div class="clear"></div>
	</div>
</div><!-- Sub Title End -->

<!-- Layout -->
<div class="custom-box ">
	<div class="column one-sixth">
		<label><?php _e('Layout','dt_themes');?> </label>
	</div>
	<div class="column five-sixth last">
		<ul class="dt-bpanel-layout-set"><?php
			$layouts = array (	'content-full-width'=>'without-sidebar', 'with-left-sidebar'=>'left-sidebar', 'with-right-sidebar'=>'right-sidebar');

			$v = array_key_exists ( "layout", $gallery_settings ) ? $gallery_settings ['layout'] : 'content-full-width';
			foreach ( $layouts as $key => $value ) {
				$class = ($key == $v) ? " class='selected' " : "";
				echo "<li><a href='#' rel='{$key}' {$class}><img src='" . plugin_dir_url ( __FILE__ ) . "images/columns/{$value}.png' /></a></li>";
			}?></ul>
			<?php $v = array_key_exists("layout",$gallery_settings) ? $gallery_settings['layout'] : 'content-full-width';
			$cs = ( $v == "content-full-width") ? "style='display:none;'":"";?>
		<input id="mytheme-portfolio-layout" name="layout" type="hidden"
			value="<?php echo $v;?>" />
		<p class="note"> <?php _e("You can choose between a left, right or full width.",'dt_themes');?> </p>
	</div>
</div><!-- Layout End-->

<div id="widget-area-options" <?php echo $cs;?>>
	<!-- 2. Every Where Sidebar Start -->
	<div id="page-commom-sidebar" class="sidebar-section custom-box" >
		<div class="column one-sixth"><label><?php _e('Disable Every Where Sidebar','dt_themes');?></label></div>
		<div class="column five-sixth last"><?php 
			$switchclass = array_key_exists("disable-everywhere-sidebar",$gallery_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
			$checked = array_key_exists("disable-everywhere-sidebar",$gallery_settings) ? ' checked="checked"' : '';?>
			<div data-for="mytheme-disable-everywhere-sidebar" class="checkbox-switch <?php echo $switchclass;?>"></div>
			<input id="mytheme-disable-everywhere-sidebar" class="hidden" type="checkbox" name="disable-everywhere-sidebar" value="true"  <?php echo $checked;?>/>
			<p class="note"> <?php _e('Yes! to hide "Every Where Sidebar" on this page.','dt_themes');?> </p>
		</div>
    </div><!-- Every Where Sidebar End-->

    <!-- 3. Choose Widget Areas Start -->
    <div id="page-sidebars" class="sidebar-section custom-box">
    	<div class="column one-sixth"><label><?php _e('Choose Widget Area','dt_themes');?></label></div>
    	<div class="column five-sixth last"><?php
    		if( array_key_exists('widget-area', $gallery_settings)):
    			$widgetareas =  array_unique($gallery_settings["widget-area"]);
    			$widgetareas = array_filter($widgetareas);

    			foreach( $widgetareas as $widgetarea ){
    				echo '<div class="multidropdown">';
    				echo dttheme_custom_widgetarea_list("widgetareas",$widgetarea,"multidropdown");
    				echo '</div>';
                }

                echo '<div class="multidropdown">';
                echo dttheme_custom_widgetarea_list("widgetareas","","multidropdown");
                echo '</div>';
            else:
            	echo '<div class="multidropdown">';
            	echo dttheme_custom_widgetarea_list("widgetareas","","multidropdown");
            	echo '</div>';                                
            endif;?></div>
    </div><!-- Choose Widget Areas End -->
</div>

<!-- Show Related Posts -->
<div class="custom-box">
	<div class="column one-sixth">
		<label><?php _e('Show Related Projects','dt_themes');?></label>
	</div>
	<div class="column five-sixth last"><?php
	
	$switchclass = array_key_exists ( "show-related-items", $gallery_settings ) ? 'checkbox-switch-on' : 'checkbox-switch-off';
	$checked = array_key_exists ( "show-related-items", $gallery_settings ) ? ' checked="checked"' : '';
	?><div data-for="mytheme-related-item"
			class="dt-checkbox-switch <?php echo $switchclass;?>"></div>
		<input id="mytheme-related-item" class="hidden" type="checkbox"
			name="mytheme-related-item" value="true" <?php echo $checked;?> />
		<p class="note"> <?php _e('Would you like to show the related projects at the bottom','dt_themes');?> </p>
	</div>
</div>
<!-- Show Related Posts End-->

<!-- Show Social Share -->
<div class="custom-box">
	<div class="column one-sixth">
		<label><?php _e('Show Social Share','dt_themes');?></label>
	</div>
	<div class="column five-sixth last"><?php
	$switchclass = array_key_exists ( "show-social-share", $gallery_settings ) ? 'checkbox-switch-on' : 'checkbox-switch-off';
	$checked = array_key_exists ( "show-social-share", $gallery_settings ) ? ' checked="checked"' : '';
	?><div data-for="mytheme-social-share"
			class="dt-checkbox-switch <?php echo $switchclass;?>"></div>
		<input id="mytheme-social-share" class="hidden" type="checkbox"
			name="mytheme-social-share" value="true" <?php echo $checked;?> />
		<p class="note"> <?php _e('Would you like to show the social share at the bottom','dt_themes');?> </p>
	</div>
</div>
<!-- Show Social Share End -->

<!-- Medias -->
<div class="custom-box">
	<div class="column one-sixth">
		<label><?php _e('Images','dt_themes');?> </label>
	</div>
	<div class="column five-sixth last">
		<div class="dt-media-btns-container">
			<a href="#" class="dt-open-media button button-primary"><?php _e( 'Click Here to Add Images', 'dt_themes' );?> </a>
			<a href="#" class="dt-add-video button button-primary"><?php _e( 'Click Here to Add Video', 'dt_themes' );?> </a>
		</div>
		<div class="clear"></div>

		<div class="dt-media-container">
			<ul class="dt-items-holder"><?php
			if (array_key_exists ( "items", $gallery_settings )) {
				foreach ( $gallery_settings ["items_thumbnail"] as $key => $thumbnail ) {
					$item = $gallery_settings ['items'] [$key];
					$id = $gallery_settings ['items_id'] [$key];
					$out = "";
					$name = "";
					$foramts = array (
							'jpg',
							'jpeg',
							'gif',
							'png' 
					);
					$parts = explode ( '.', $item );
					$ext = strtolower ( $parts [count ( $parts ) - 1] );
					if (in_array ( $ext, $foramts )) {
						$name = $gallery_settings ['items_name'] [$key];
						$out .= "<li>";
						$out .= "<img src='{$thumbnail}' alt='' />";
						$out .= "<span class='dt-image-name'>{$name}</span>";
						$out .= "<input type='hidden' name='items[]' value='{$item}' />";
					} else {
						$name = "video";
						$out .= "<li>";
						$out .= "<span class='dt-video'></span>";
						$out .= "<input type='text' name='items[]' value='{$item}' />";
					}
					
					$out .= "<input class='dt-image-name' type='hidden' name='items_name[]' value='{$name}' />";
					$out .= "<input type='hidden' name='items_thumbnail[]' value='{$thumbnail}' />";
					$out .= "<input type='hidden' name='items_id[]' value='{$id}' />";					
					$out .= "<span class='my_delete'></span>";
					$out .= "</li>";
					echo $out;
				}
			}
			?></ul>
		</div>
	</div>
</div>
<!-- Medias End -->