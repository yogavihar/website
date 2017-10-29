<?php

class BWGViewAlbum_extended_preview {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  private $model;


  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct($model) {
    $this->model = $model;
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function display($params, $from_shortcode = 0, $bwg = 0) {
    global $wp;
    $current_url = $wp->query_string;
    global $WD_BWG_UPLOAD_DIR;
    require_once(WD_BWG_DIR . '/framework/WDWLibrary.php');
    $options_row = $this->model->get_options_row_data();
    $play_icon = $options_row->play_icon;

    if (!isset($params['extended_album_image_title'])) {
      $params['extended_album_image_title'] = 'none';
    }
    if (!isset($params['extended_album_view_type'])) {
      $album_view_type = 'thumbnail';
    }
    else {
      $album_view_type = $params['extended_album_view_type'];
    }
    if (!isset($params['extended_album_mosaic_hor_ver'])) {
      $params['extended_album_mosaic_hor_ver'] = 'vertical';
    }
    if (!isset($params['extended_album_resizable_mosaic'])) {
      $params['extended_album_resizable_mosaic'] = 0;
    }
    if (!isset($params['extended_album_mosaic_total_width'])) {
      $params['extended_album_mosaic_total_width'] = 100;
    }
    if (!isset($params['popup_fullscreen'])) {
      $params['popup_fullscreen'] = 0;
    }
    if (!isset($params['popup_autoplay'])) {
      $params['popup_autoplay'] = 0;
    }
    if (!isset($params['popup_enable_pinterest'])) {
      $params['popup_enable_pinterest'] = 0;
    }
    if (!isset($params['popup_enable_tumblr'])) {
      $params['popup_enable_tumblr'] = 0;
    }
    if (!isset($params['show_search_box'])) {
      $params['show_search_box'] = 0;
    }
    if (!isset($params['search_box_width'])) {
      $params['search_box_width'] = 180;
    }
    if (!isset($params['popup_enable_info'])) {
      $params['popup_enable_info'] = 1;
    }
    if (!isset($params['popup_info_always_show'])) {
      $params['popup_info_always_show'] = 0;
    }
    if (!isset($params['popup_info_full_width'])) {
      $params['popup_info_full_width'] = 0;
    }
    if (!isset($params['popup_enable_rate'])) {
      $params['popup_enable_rate'] = 0;
    }
    if (!isset($params['thumb_click_action']) || $params['thumb_click_action'] == 'undefined') {
      $params['thumb_click_action'] = 'open_lightbox';
    }
    if (!isset($params['thumb_link_target'])) {
      $params['thumb_link_target'] = 1;
    }
    if (!isset($params['popup_hit_counter'])) {
      $params['popup_hit_counter'] = 0;
    }
    if (!isset($params['order_by'])) {
      $params['order_by'] = ' ASC ';
    }
    if (!isset($params['show_sort_images'])) {
      $params['show_sort_images'] = 0;
    }
    if (!isset($params['extended_album_enable_page'])) {
      $params['extended_album_enable_page'] = 1;
    }
    $sort_direction = ' ' . $params['order_by'] . ' ';
    $theme_row = $this->model->get_theme_row_data($params['theme_id']);
    if (!$theme_row) {
      echo WDWLibrary::message(__('There is no theme selected or the theme was deleted.', 'bwg'), 'error');
      return;
    }
    $type = (isset($_REQUEST['type_' . $bwg]) ? esc_html($_REQUEST['type_' . $bwg]) : 'album');
    $bwg_search = ((isset($_POST['bwg_search_' . $bwg]) && esc_html($_POST['bwg_search_' . $bwg]) != '') ? esc_html($_POST['bwg_search_' . $bwg]) : '');
    $album_gallery_id = (isset($_REQUEST['album_gallery_id_' . $bwg]) ? esc_html($_REQUEST['album_gallery_id_' . $bwg]) : $params['album_id']);
    if (!$album_gallery_id || ($type == 'album' && !$this->model->get_album_row_data($album_gallery_id))) {
      echo WDWLibrary::message(__('There is no album selected or the album was deleted.', 'bwg'), 'error');
      return;
    }
    if ($type == 'gallery') {
      $items_per_page = $params['extended_album_images_per_page'];
      $items_col_num = $params['extended_album_image_column_number'];
      if (isset($_POST['sortImagesByValue_' . $bwg])) {
        $sort_by = esc_html($_POST['sortImagesByValue_' . $bwg]);
        if ($sort_by == 'random') {
          $params['sort_by'] = 'RAND()';
        }
        else if ($sort_by == 'default')  {
          $params['sort_by'] = $params['sort_by'];
        }
        else {
          $params['sort_by'] = $sort_by;
        }
      }
      $image_rows = $this->model->get_image_rows_data($album_gallery_id, $items_per_page, $params['sort_by'], $bwg, $sort_direction);
      $images_count = count($image_rows);
      if (!$image_rows) {
        echo WDWLibrary::message(__('There are no images in this gallery.', 'bwg'), 'error');
      }
      $page_nav = $this->model->gallery_page_nav($album_gallery_id, $items_per_page, $bwg);
      $album_gallery_div_id = 'bwg_album_extended_' . $bwg;
      $album_gallery_div_class = 'bwg_standart_thumbnails_' . $bwg;
    }
    else {
      $items_per_page = $params['extended_albums_per_page'];
      $items_col_num = 1;
      $album_galleries_row = $this->model->get_alb_gals_row($album_gallery_id, $items_per_page, 'order', $bwg, ' asc ');
      if (!$album_galleries_row) {
        echo WDWLibrary::message(__('There is no album selected or the album was deleted.', 'bwg'), 'error');
        return;
      }
      $page_nav = $this->model->album_page_nav($album_gallery_id, $items_per_page, $bwg);
      $album_gallery_div_id = 'bwg_album_extended_' . $bwg;
      $album_gallery_div_class = 'bwg_album_extended_thumbnails_' . $bwg;
    }

    if ($type == 'gallery' ) { 
	  if($album_view_type == 'masonry') {
        $form_child_div_id = 'bwg_masonry_thumbnails_div_' . $bwg;
        $form_child_div_style = 'background-color:rgba(0, 0, 0, 0); position:relative; text-align:' . $theme_row->masonry_thumb_align . '; width:100%;';	  
        $album_gallery_div_id = 'bwg_masonry_thumbnails_' . $bwg;
        $album_gallery_div_class = 'bwg_masonry_thumbnails_' . $bwg;
	  }
      else if($album_view_type == 'mosaic'){
        $form_child_div_id = 'bwg_mosaic_thumbnails_div_' . $bwg;
        $form_child_div_style = 'background-color:rgba(0, 0, 0, 0); position:relative; text-align:' . $theme_row->mosaic_thumb_align . '; width:100%;';    
        $album_gallery_div_id = 'bwg_mosaic_thumbnails_' . $bwg;
        $album_gallery_div_class = 'bwg_mosaic_thumbnails_' . $bwg;
      }
	  else {
	    $form_child_div_style = 'background-color:rgba(0, 0, 0, 0); position:relative; text-align:' . $theme_row->thumb_align . '; width:100%;';
		$form_child_div_id = '';
	  }
    }
    else {
      $form_child_div_id = '';
      $form_child_div_style = 'background-color:rgba(0, 0, 0, 0); position:relative; text-align:' . $theme_row->album_extended_thumb_align . '; width:100%;';
    }
	
    $bwg_previous_album_id = (isset($_REQUEST['bwg_previous_album_id_' . $bwg]) ? esc_html($_REQUEST['bwg_previous_album_id_' . $bwg]) : $params['album_id']);
    $bwg_previous_album_page_number = (isset($_REQUEST['bwg_previous_album_page_number_' . $bwg]) ? esc_html($_REQUEST['bwg_previous_album_page_number_' . $bwg]) : 0);

    $rgb_page_nav_font_color = WDWLibrary::spider_hex2rgb($theme_row->page_nav_font_color);
    $rgb_album_extended_thumbs_bg_color = WDWLibrary::spider_hex2rgb($theme_row->album_extended_thumbs_bg_color);
    $rgb_album_extended_div_bg_color = WDWLibrary::spider_hex2rgb($theme_row->album_extended_div_bg_color);
    $rgb_thumbs_bg_color = WDWLibrary::spider_hex2rgb($theme_row->thumbs_bg_color);
    $params_array = array(
      'action' => 'GalleryBox',
      'current_view' => $bwg,
      'theme_id' => $params['theme_id'],
      'thumb_width' => $params['extended_album_image_thumb_width'],
      'thumb_height' => $params['extended_album_image_thumb_height'],
      'open_with_fullscreen' => $params['popup_fullscreen'],
      'open_with_autoplay' => $params['popup_autoplay'],
      'image_width' => $params['popup_width'],
      'image_height' => $params['popup_height'],
      'image_effect' => $params['popup_effect'],
      'wd_sor' => $params['sort_by'],
      'wd_ord' => $params['order_by'],
      'enable_image_filmstrip' => $params['popup_enable_filmstrip'],
      'image_filmstrip_height' => $params['popup_filmstrip_height'],
      'enable_image_ctrl_btn' => $params['popup_enable_ctrl_btn'],
      'enable_image_fullscreen' => $params['popup_enable_fullscreen'],
      'popup_enable_info' => $params['popup_enable_info'],
      'popup_info_always_show' => $params['popup_info_always_show'],
      'popup_info_full_width' => $params['popup_info_full_width'],
      'popup_hit_counter' => $params['popup_hit_counter'],
      'popup_enable_rate' => $params['popup_enable_rate'],
      'slideshow_interval' => $params['popup_interval'],
      'enable_comment_social' => $params['popup_enable_comment'],
      'enable_image_facebook' => $params['popup_enable_facebook'],
      'enable_image_twitter' => $params['popup_enable_twitter'],
      'enable_image_google' => $params['popup_enable_google'],
      'enable_image_pinterest' => $params['popup_enable_pinterest'],
      'enable_image_tumblr' => $params['popup_enable_tumblr'],
      'watermark_type' => $params['watermark_type'],
      'current_url' => $current_url
    );
    if ($params['watermark_type'] != 'none') {
      $params_array['watermark_link'] = urlencode($params['watermark_link']);
      $params_array['watermark_opacity'] = $params['watermark_opacity'];
      $params_array['watermark_position'] = $params['watermark_position'];
    }
    if ($params['watermark_type'] == 'text') {
      $params_array['watermark_text'] = $params['watermark_text'];
      $params_array['watermark_font_size'] = $params['watermark_font_size'];
      $params_array['watermark_font'] = $params['watermark_font'];
      $params_array['watermark_color'] = $params['watermark_color'];
    }
    elseif ($params['watermark_type'] == 'image') {
      $params_array['watermark_url'] = urlencode($params['watermark_url']);
      $params_array['watermark_width'] = $params['watermark_width'];
      $params_array['watermark_height'] = $params['watermark_height'];
    }
    $params_array_hash = $params_array;
    ?>
    <style>
		  /* Style for masonry view.*/
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_masonry_thumbnails_<?php echo $bwg; ?> * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_masonry_thumb_<?php echo $bwg; ?> {
        visibility: hidden;
        text-align: center;
        display: inline-block;
        vertical-align: middle;     
        width: <?php echo $params['extended_album_image_thumb_width']; ?>px !important;
        border-radius: <?php echo $theme_row->masonry_thumb_border_radius; ?>;
        border: <?php echo $theme_row->masonry_thumb_border_width; ?>px <?php echo $theme_row->masonry_thumb_border_style; ?> #<?php echo $theme_row->masonry_thumb_border_color; ?>;
        background-color: #<?php echo $theme_row->thumb_bg_color; ?>;
        margin: 0;
        padding: <?php echo $theme_row->masonry_thumb_padding; ?>px !important;
        opacity: <?php echo number_format($theme_row->masonry_thumb_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->masonry_thumb_transparent; ?>);
        <?php echo ($theme_row->masonry_thumb_transition) ? 'transition: all 0.3s ease 0s;-webkit-transition: all 0.3s ease 0s;' : ''; ?>
        z-index: 100;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_masonry_thumb_<?php echo $bwg; ?>:hover {
        opacity: 1;
        filter: Alpha(opacity=100);
        transform: <?php echo $theme_row->masonry_thumb_hover_effect; ?>(<?php echo $theme_row->masonry_thumb_hover_effect_value; ?>);
        -ms-transform: <?php echo $theme_row->masonry_thumb_hover_effect; ?>(<?php echo $theme_row->masonry_thumb_hover_effect_value; ?>);
        -webkit-transform: <?php echo $theme_row->masonry_thumb_hover_effect; ?>(<?php echo $theme_row->masonry_thumb_hover_effect_value; ?>);
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        z-index: 102;
        position: absolute;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_masonry_thumbnails_<?php echo $bwg; ?> {
        -moz-box-sizing: border-box;
        background-color: rgba(<?php echo $rgb_thumbs_bg_color['red']; ?>, <?php echo $rgb_thumbs_bg_color['green']; ?>, <?php echo $rgb_thumbs_bg_color['blue']; ?>, <?php echo number_format($theme_row->masonry_thumb_bg_transparent / 100, 2, ".", ""); ?>);
        box-sizing: border-box;
        display: inline-block;
        font-size: 0;
        /*width: <?php echo $params['extended_album_image_column_number'] * ($params['extended_album_image_thumb_width'] + 2 * ($theme_row->masonry_thumb_padding + $theme_row->masonry_thumb_border_width)); ?>px;*/
        width: 100%;
        position: relative;
        text-align: <?php echo $theme_row->masonry_thumb_align; ?>;
      }
      @media only screen and (max-width : <?php echo $params['extended_album_image_column_number'] * ($params['extended_album_image_thumb_width'] + 2 * ($theme_row->masonry_thumb_padding + $theme_row->masonry_thumb_border_width)); ?>px) {
        #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_masonry_thumbnails_<?php echo $bwg; ?> {
          width: inherit;
        }
      }	  	  
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #spider_popup_overlay_<?php echo $bwg; ?> {
        background-color: #<?php echo $theme_row->lightbox_overlay_bg_color; ?>;
        opacity: <?php echo number_format($theme_row->lightbox_overlay_bg_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->lightbox_overlay_bg_transparent; ?>);
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_masonry_thumb_spun_<?php echo $bwg; ?> {
        position: absolute;
      }
      /* Style for thumbnail view.*/
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_album_extended_thumbnails_<?php echo $bwg; ?> * {
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_album_extended_thumbnails_<?php echo $bwg; ?> {
        display: block;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        background-color: rgba(<?php echo $rgb_album_extended_thumbs_bg_color['red']; ?>, <?php echo $rgb_album_extended_thumbs_bg_color['green']; ?>, <?php echo $rgb_album_extended_thumbs_bg_color['blue']; ?>, <?php echo number_format($theme_row->album_extended_thumb_bg_transparent / 100, 2, ".", ""); ?>);
        font-size: 0;
        text-align: <?php echo $theme_row->album_extended_thumb_align; ?>;
        max-width: inherit;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_album_extended_div_<?php echo $bwg; ?> {
        display: table;
        width: 100%;
        height: <?php echo $params['extended_album_height']; ?>px;
        border-spacing: <?php echo $theme_row->album_extended_div_padding; ?>px;
        border-bottom: <?php echo $theme_row->album_extended_div_separator_width; ?>px <?php echo $theme_row->album_extended_div_separator_style; ?> #<?php echo $theme_row->album_extended_div_separator_color; ?>;
        background-color: rgba(<?php echo $rgb_album_extended_div_bg_color['red']; ?>, <?php echo $rgb_album_extended_div_bg_color['green']; ?>, <?php echo $rgb_album_extended_div_bg_color['blue']; ?>, <?php echo number_format($theme_row->album_extended_div_bg_transparent / 100, 2, ".", ""); ?>);
        border-radius: <?php echo $theme_row->album_extended_div_border_radius; ?>;
        margin: <?php echo $theme_row->album_extended_div_margin; ?>;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_album_extended_thumb_div_<?php echo $bwg; ?> {
        background-color: #<?php echo $theme_row->album_extended_thumb_div_bg_color; ?>;
        border-radius: <?php echo $theme_row->album_extended_thumb_div_border_radius; ?>;
        text-align: center;
        border: <?php echo $theme_row->album_extended_thumb_div_border_width; ?>px <?php echo $theme_row->album_extended_thumb_div_border_style; ?> #<?php echo $theme_row->album_extended_thumb_div_border_color; ?>;
        display: table-cell;
        vertical-align: middle;
        padding: <?php echo $theme_row->album_extended_thumb_div_padding; ?>;
      }
      @media only screen and (max-width : 320px) {
        #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_album_extended_thumb_div_<?php echo $bwg; ?> {
          display: table-row;
        }
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_album_extended_text_div_<?php echo $bwg; ?> {
        background-color: #<?php echo $theme_row->album_extended_text_div_bg_color; ?>;
        border-radius: <?php echo $theme_row->album_extended_text_div_border_radius; ?>;
        border: <?php echo $theme_row->album_extended_text_div_border_width; ?>px <?php echo $theme_row->album_extended_text_div_border_style; ?> #<?php echo $theme_row->album_extended_text_div_border_color; ?>;
        display: table-cell;
        width: 100%;
        border-collapse: collapse;
        vertical-align: middle;
        padding: <?php echo $theme_row->album_extended_text_div_padding; ?>;
      }
      @media only screen and (max-width : 320px) {
        #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_album_extended_text_div_<?php echo $bwg; ?> {
          display: table-row;
        }
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_title_spun_<?php echo $bwg; ?> {
        border: <?php echo $theme_row->album_extended_title_span_border_width; ?>px <?php echo $theme_row->album_extended_title_span_border_style; ?> #<?php echo $theme_row->album_extended_title_span_border_color; ?>;
        color: #<?php echo $theme_row->album_extended_title_font_color; ?>;
        display: block;
        font-family: <?php echo $theme_row->album_extended_title_font_style; ?>;
        font-size: <?php echo $theme_row->album_extended_title_font_size; ?>px;
        font-weight: <?php echo $theme_row->album_extended_title_font_weight; ?>;
        height: inherit;
        margin-bottom: <?php echo $theme_row->album_extended_title_margin_bottom; ?>px;
        padding: <?php echo $theme_row->album_extended_title_padding; ?>;
        text-align: left;
        vertical-align: middle;
        width: inherit;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_description_spun1_<?php echo $bwg; ?> a {
        color: #<?php echo $theme_row->album_extended_desc_font_color; ?>;
        font-size: <?php echo $theme_row->album_extended_desc_font_size; ?>px;
        font-weight: <?php echo $theme_row->album_extended_desc_font_weight; ?>;
        font-family: <?php echo $theme_row->album_extended_desc_font_style; ?>;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_description_spun1_<?php echo $bwg; ?> {
        border: <?php echo $theme_row->album_extended_desc_span_border_width; ?>px <?php echo $theme_row->album_extended_desc_span_border_style; ?> #<?php echo $theme_row->album_extended_desc_span_border_color; ?>;
        display: inline-block;
        color: #<?php echo $theme_row->album_extended_desc_font_color; ?>;
        font-size: <?php echo $theme_row->album_extended_desc_font_size; ?>px;
        font-weight: <?php echo $theme_row->album_extended_desc_font_weight; ?>;
        font-family: <?php echo $theme_row->album_extended_desc_font_style; ?>;
        height: inherit;
        padding: <?php echo $theme_row->album_extended_desc_padding; ?>;
        vertical-align: middle;
        width: inherit;
        word-wrap: break-word;
        word-break: break-word;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_description_spun1_<?php echo $bwg; ?> * {
        margin: 0;
        text-align: left !important;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_description_spun2_<?php echo $bwg; ?> {
        float: left;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_description_short_<?php echo $bwg; ?> {
        display: inline;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_description_full_<?php echo $bwg; ?> {
        display: none;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_description_more_<?php echo $bwg; ?> {
        clear: both;
        color: #<?php echo $theme_row->album_extended_desc_more_color; ?>;
        cursor: pointer;
        float: right;
        font-size: <?php echo $theme_row->album_extended_desc_more_size; ?>px;
        font-weight: normal;
      }
      /*Album thumbs styles.*/
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_album_thumb_<?php echo $bwg; ?> {
        display: inline-block;
        text-align: center;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_album_thumb_spun1_<?php echo $bwg; ?> {
        background-color: #<?php echo $theme_row->album_extended_thumb_bg_color; ?>;
        border-radius: <?php echo $theme_row->album_extended_thumb_border_radius; ?>;
        border: <?php echo $theme_row->album_extended_thumb_border_width; ?>px <?php echo $theme_row->album_extended_thumb_border_style; ?> #<?php echo $theme_row->album_extended_thumb_border_color; ?>;
        box-shadow: <?php echo $theme_row->album_extended_thumb_box_shadow; ?>;
        display: inline-block;
        height: <?php echo $params['extended_album_thumb_height']; ?>px;
        margin: <?php echo $theme_row->album_extended_thumb_margin; ?>px;
        opacity: <?php echo number_format($theme_row->album_extended_thumb_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->album_extended_thumb_transparent; ?>);
        <?php echo ($theme_row->album_extended_thumb_transition) ? 'transition: all 0.3s ease 0s;-webkit-transition: all 0.3s ease 0s;' : ''; ?>
        padding: <?php echo $theme_row->album_extended_thumb_padding; ?>px;
        text-align: center;
        vertical-align: middle;
        width: <?php echo $params['extended_album_thumb_width']; ?>px;
        z-index: 100;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_album_thumb_spun1_<?php echo $bwg; ?>:hover {
        opacity: 1;
        filter: Alpha(opacity=100);
        transform: <?php echo $theme_row->album_extended_thumb_hover_effect; ?>(<?php echo $theme_row->album_extended_thumb_hover_effect_value; ?>);
        -ms-transform: <?php echo $theme_row->album_extended_thumb_hover_effect; ?>(<?php echo $theme_row->album_extended_thumb_hover_effect_value; ?>);
        -webkit-transform: <?php echo $theme_row->album_extended_thumb_hover_effect; ?>(<?php echo $theme_row->album_extended_thumb_hover_effect_value; ?>);
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        z-index: 102;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_album_thumb_spun2_<?php echo $bwg; ?> {
        display: inline-block;
        height: <?php echo $params['extended_album_thumb_height']; ?>px;
        overflow: hidden;
        width: <?php echo $params['extended_album_thumb_width']; ?>px;
      }
      <?php
      if ($album_view_type != 'mosaic') {
        ?>
		  /* Style for masonry view.*/
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_masonry_thumbnails_<?php echo $bwg; ?> * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_masonry_thumb_<?php echo $bwg; ?> {
        visibility: hidden;
        text-align: center;
        display: inline-block;
        vertical-align: middle;     
        width: <?php echo $params['extended_album_image_thumb_width']; ?>px !important;
        border-radius: <?php echo $theme_row->masonry_thumb_border_radius; ?>;
        border: <?php echo $theme_row->masonry_thumb_border_width; ?>px <?php echo $theme_row->masonry_thumb_border_style; ?> #<?php echo $theme_row->masonry_thumb_border_color; ?>;
        background-color: #<?php echo $theme_row->thumb_bg_color; ?>;
        margin: 0;
        padding: <?php echo $theme_row->masonry_thumb_padding; ?>px !important;
        opacity: <?php echo number_format($theme_row->masonry_thumb_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->masonry_thumb_transparent; ?>);
        <?php echo ($theme_row->masonry_thumb_transition) ? 'transition: all 0.3s ease 0s;-webkit-transition: all 0.3s ease 0s;' : ''; ?>
        z-index: 100;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_masonry_thumb_<?php echo $bwg; ?>:hover {
        opacity: 1;
        filter: Alpha(opacity=100);
        transform: <?php echo $theme_row->masonry_thumb_hover_effect; ?>(<?php echo $theme_row->masonry_thumb_hover_effect_value; ?>);
        -ms-transform: <?php echo $theme_row->masonry_thumb_hover_effect; ?>(<?php echo $theme_row->masonry_thumb_hover_effect_value; ?>);
        -webkit-transform: <?php echo $theme_row->masonry_thumb_hover_effect; ?>(<?php echo $theme_row->masonry_thumb_hover_effect_value; ?>);
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        z-index: 102;
        position: absolute;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_masonry_thumbnails_<?php echo $bwg; ?> {
        -moz-box-sizing: border-box;
        background-color: rgba(<?php echo $rgb_thumbs_bg_color['red']; ?>, <?php echo $rgb_thumbs_bg_color['green']; ?>, <?php echo $rgb_thumbs_bg_color['blue']; ?>, <?php echo number_format($theme_row->masonry_thumb_bg_transparent / 100, 2, ".", ""); ?>);
        box-sizing: border-box;
        display: inline-block;
        font-size: 0;
        /*width: <?php echo $params['extended_album_image_column_number'] * ($params['extended_album_image_thumb_width'] + 2 * ($theme_row->masonry_thumb_padding + $theme_row->masonry_thumb_border_width)); ?>px;*/
        width: 100%;
        position: relative;
        text-align: <?php echo $theme_row->masonry_thumb_align; ?>;
      }
      @media only screen and (max-width : <?php echo $params['extended_album_image_column_number'] * ($params['extended_album_image_thumb_width'] + 2 * ($theme_row->masonry_thumb_padding + $theme_row->masonry_thumb_border_width)); ?>px) {
        #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_masonry_thumbnails_<?php echo $bwg; ?> {
          width: inherit;
        }
      }	  	  
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #spider_popup_overlay_<?php echo $bwg; ?> {
        background-color: #<?php echo $theme_row->lightbox_overlay_bg_color; ?>;
        opacity: <?php echo number_format($theme_row->lightbox_overlay_bg_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->lightbox_overlay_bg_transparent; ?>);
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_masonry_thumb_spun_<?php echo $bwg; ?> {
        position: absolute;
      }
      /*Style for image thumbnail view .*/
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumb_spun1_<?php echo $bwg; ?> {
        background-color: #<?php echo $theme_row->thumb_bg_color; ?>;
        border-radius: <?php echo $theme_row->thumb_border_radius; ?>;
        border: <?php echo $theme_row->thumb_border_width; ?>px <?php echo $theme_row->thumb_border_style; ?> #<?php echo $theme_row->thumb_border_color; ?>;
        box-shadow: <?php echo $theme_row->thumb_box_shadow; ?>;
        display: inline-block;
        height: <?php echo $params['extended_album_image_thumb_height']; ?>px;
        margin: <?php echo $theme_row->thumb_margin; ?>px;
        opacity: <?php echo number_format($theme_row->thumb_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->thumb_transparent; ?>);
        <?php echo ($theme_row->thumb_transition) ? 'transition: all 0.3s ease 0s;-webkit-transition: all 0.3s ease 0s;' : ''; ?>
        padding: <?php echo $theme_row->thumb_padding; ?>px;
        text-align: center;
        vertical-align: middle;
        width: <?php echo $params['extended_album_image_thumb_width']; ?>px;
        z-index: 100;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumb_spun1_<?php echo $bwg; ?>:hover {
        -ms-transform: <?php echo $theme_row->thumb_hover_effect; ?>(<?php echo $theme_row->thumb_hover_effect_value; ?>);
        -webkit-transform: <?php echo $theme_row->thumb_hover_effect; ?>(<?php echo $theme_row->thumb_hover_effect_value; ?>);
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        opacity: 1;
        filter: Alpha(opacity=100);
        transform: <?php echo $theme_row->thumb_hover_effect; ?>(<?php echo $theme_row->thumb_hover_effect_value; ?>);
        z-index: 102;
        position: relative;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumb_spun2_<?php echo $bwg; ?> {
        display: inline-block;
        height: <?php echo $params['extended_album_image_thumb_height']; ?>px;
        overflow: hidden;
        width: <?php echo $params['extended_album_image_thumb_width']; ?>px;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumbnails_<?php echo $bwg; ?> {
        -moz-box-sizing: border-box;
        display: inline-block;
        background-color: rgba(<?php echo $rgb_thumbs_bg_color['red']; ?>, <?php echo $rgb_thumbs_bg_color['green']; ?>, <?php echo $rgb_thumbs_bg_color['blue']; ?>, <?php echo number_format($theme_row->thumb_bg_transparent / 100, 2, ".", ""); ?>);
        box-sizing: border-box;
        font-size: 0;
        max-width: <?php echo $params['extended_album_image_column_number'] * ($params['extended_album_image_thumb_width'] + 2 * (2 + $theme_row->thumb_margin + $theme_row->thumb_padding + $theme_row->thumb_border_width)); ?>px;
        text-align: <?php echo $theme_row->thumb_align; ?>;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumb_<?php echo $bwg; ?> {
        display: inline-block;
        text-align: center;
      }
      <?php
      if ($params['extended_album_image_title'] == 'show') { /* Show image title at the bottom.*/
        ?>
        #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_title_spun1_<?php echo $bwg; ?> {
          display: block;
          margin: 0 auto;
          opacity: 1;
          filter: Alpha(opacity=100);
          text-align: center;
          width: <?php echo $params['extended_album_image_thumb_width']; ?>px;
        }
        <?php
      }
      elseif ($params['extended_album_image_title'] == 'hover') { /* Show image title on hover.*/
        ?>
        #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_title_spun1_<?php echo $bwg; ?> {
          display: table;
          height: inherit;
          left: -3000px;
          opacity: 0;
          filter: Alpha(opacity=0);
          position: absolute;
          top: 0px;
          width: inherit;
        }
        <?php
      }
      ?>
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_standart_thumb_spun1_<?php echo $bwg; ?>:hover .bwg_image_title_spun1_<?php echo $bwg; ?> {
        left: <?php echo $theme_row->thumb_padding; ?>px;
        top: <?php echo $theme_row->thumb_padding; ?>px;
        opacity: 1;
        filter: Alpha(opacity=100);
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_image_title_spun2_<?php echo $bwg; ?> {
        color: #<?php echo $theme_row->thumb_title_font_color; ?>;
        display: table-cell;
        font-family: <?php echo $theme_row->thumb_title_font_style; ?>;
        font-size: <?php echo $theme_row->thumb_title_font_size; ?>px;
        font-weight: <?php echo $theme_row->thumb_title_font_weight; ?>;
        height: inherit;
        margin: <?php echo $theme_row->thumb_title_margin; ?>;
        text-shadow: <?php echo $theme_row->thumb_title_shadow; ?>;
        vertical-align: middle;
        width: inherit;
        word-break: break-all;
        word-wrap: break-word;
      }
      /*Pagination styles.*/
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> {
        text-align: <?php echo $theme_row->page_nav_align; ?>;
        font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
        font-family: <?php echo $theme_row->page_nav_font_style; ?>;
        font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
        color: #<?php echo $theme_row->page_nav_font_color; ?>;
        margin: 6px 0 4px;
        display: block;
        height: 30px;
        line-height: 30px;
      }
      @media only screen and (max-width : 320px) {
        #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .displaying-num_<?php echo $bwg; ?> {
          display: none;
        }
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .displaying-num_<?php echo $bwg; ?> {
        font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
        font-family: <?php echo $theme_row->page_nav_font_style; ?>;
        font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
        color: #<?php echo $theme_row->page_nav_font_color; ?>;
        margin-right: 10px;
        vertical-align: middle;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .paging-input_<?php echo $bwg; ?> {
        font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
        font-family: <?php echo $theme_row->page_nav_font_style; ?>;
        font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
        color: #<?php echo $theme_row->page_nav_font_color; ?>;
        vertical-align: middle;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a.disabled,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a.disabled:hover,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a.disabled:focus {
        cursor: default;
        color: rgba(<?php echo $rgb_page_nav_font_color['red']; ?>, <?php echo $rgb_page_nav_font_color['green']; ?>, <?php echo $rgb_page_nav_font_color['blue']; ?>, 0.5);
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a {
        cursor: pointer;
        font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
        font-family: <?php echo $theme_row->page_nav_font_style; ?>;
        font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
        color: #<?php echo $theme_row->page_nav_font_color; ?>;
        text-decoration: none;
        padding: <?php echo $theme_row->page_nav_padding; ?>;
        margin: <?php echo $theme_row->page_nav_margin; ?>;
        border-radius: <?php echo $theme_row->page_nav_border_radius; ?>;
        border-style: <?php echo $theme_row->page_nav_border_style; ?>;
        border-width: <?php echo $theme_row->page_nav_border_width; ?>px;
        border-color: #<?php echo $theme_row->page_nav_border_color; ?>;
        background-color: #<?php echo $theme_row->page_nav_button_bg_color; ?>;
        opacity: <?php echo number_format($theme_row->page_nav_button_bg_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->page_nav_button_bg_transparent; ?>);
        box-shadow: <?php echo $theme_row->page_nav_box_shadow; ?>;
        <?php echo ($theme_row->page_nav_button_transition ) ? 'transition: all 0.3s ease 0s;-webkit-transition: all 0.3s ease 0s;' : ''; ?>
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_back_<?php echo $bwg; ?> {
        background-color: rgba(0, 0, 0, 0);
        color: #<?php echo $theme_row->album_extended_back_font_color; ?> !important;
        cursor: pointer;
        display: block;
        font-family: <?php echo $theme_row->album_extended_back_font_style; ?>;
        font-size: <?php echo $theme_row->album_extended_back_font_size; ?>px;
        font-weight: <?php echo $theme_row->album_extended_back_font_weight; ?>;
        text-decoration: none;
        padding: <?php echo $theme_row->album_extended_back_padding; ?>;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #spider_popup_overlay_<?php echo $bwg; ?> {
        background-color: #<?php echo $theme_row->lightbox_overlay_bg_color; ?>;
        opacity: <?php echo number_format($theme_row->lightbox_overlay_bg_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->lightbox_overlay_bg_transparent; ?>);
      }
      .bwg_play_icon_spun_<?php echo $bwg; ?>	 {
        width: inherit;
        height: inherit;
        display: table;
        position: absolute;
      }	 
     .bwg_play_icon_<?php echo $bwg; ?> {
        color: #<?php echo $theme_row->thumb_title_font_color; ?>;
        font-size: <?php echo 2 * $theme_row->thumb_title_font_size; ?>px;
        vertical-align: middle;
        display: table-cell !important;
        z-index: 1;
        text-align: center;
        margin: 0 auto;
      }
        <?php
      }
      else { /* For mosaic view of images.*/
        ?>
      /*#bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_mosaic_thumbnails_<?php echo $bwg; ?> * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
      }*/
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_mosaic_thumb_<?php echo $bwg; ?> {
        visibility: hidden;/* make hidden later */
        /*text-align: center;*/
        display: block;
        -moz-box-sizing: content-box !important;
        -webkit-box-sizing: content-box !important;
        box-sizing: content-box !important;
        border-radius: <?php echo $theme_row->mosaic_thumb_border_radius; ?>;
        border: <?php echo $theme_row->mosaic_thumb_border_width; ?>px <?php echo $theme_row->mosaic_thumb_border_style; ?> #<?php echo $theme_row->mosaic_thumb_border_color; ?>;
        background-color: #<?php echo $theme_row->thumb_bg_color; ?>;
        margin: 0;
        padding: <?php echo $theme_row->mosaic_thumb_padding; ?>px !important;
        opacity: <?php echo number_format($theme_row->mosaic_thumb_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->mosaic_thumb_transparent; ?>);
        z-index: 100;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_mosaic_thumb_spun_<?php echo $bwg; ?>:hover {
        opacity: 1;
        filter: Alpha(opacity=100);
        transform: <?php echo $theme_row->mosaic_thumb_hover_effect; ?>(<?php echo $theme_row->mosaic_thumb_hover_effect_value; ?>);
        -ms-transform: <?php echo $theme_row->mosaic_thumb_hover_effect; ?>(<?php echo $theme_row->mosaic_thumb_hover_effect_value; ?>);
        -webkit-transform: <?php echo $theme_row->mosaic_thumb_hover_effect; ?>(<?php echo $theme_row->mosaic_thumb_hover_effect_value; ?>);
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        z-index: 102;
        position: absolute;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_mosaic_thumbnails_<?php echo $bwg; ?> {
        background-color: rgba(<?php echo $rgb_thumbs_bg_color['red']; ?>, <?php echo $rgb_thumbs_bg_color['green']; ?>, <?php echo $rgb_thumbs_bg_color['blue']; ?>, <?php echo number_format($theme_row->mosaic_thumb_bg_transparent / 100, 2, ".", ""); ?>);
        font-size: 0;
        position: relative;
        text-align: <?php echo $theme_row->mosaic_thumb_align; ?>;
        display: inline-block;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_mosaic_thumb_spun_<?php echo $bwg; ?> {
        display:block;
        position: absolute;
        -moz-box-sizing: content-box !important;
        -webkit-box-sizing: content-box !important;
        box-sizing: content-box !important;
      }
      /*image title styles*/
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_mosaic_title_spun1_<?php echo $bwg; ?> {
        position: absolute;
        display:block;
        opacity: 0;
        filter: Alpha(opacity=0);
        left: -10000px;
        top: 0px;
        box-sizing:border-box;
        text-align: center;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_mosaic_title_spun2_<?php echo $bwg; ?> {
        color: #<?php echo $theme_row->mosaic_thumb_title_font_color; ?>;
        font-family: <?php echo $theme_row->mosaic_thumb_title_font_style; ?>;
        font-size: <?php echo $theme_row->mosaic_thumb_title_font_size; ?>px;
        font-weight: <?php echo $theme_row->mosaic_thumb_title_font_weight; ?>;
        text-shadow: <?php echo $theme_row->mosaic_thumb_title_shadow; ?>;
        vertical-align: middle;
        word-wrap: break-word;
      }
      .bwg_mosaic_play_icon_spun_<?php echo $bwg; ?> {
        display: table;
        position: absolute;
        left: -10000px;
        top: 0px;
        opacity: 0;
        filter: Alpha(opacity=0);
      }
      .bwg_mosaic_play_icon_<?php echo $bwg; ?> {
        color: #<?php echo $theme_row->mosaic_thumb_title_font_color; ?>;
        font-size: <?php echo 2 * $theme_row->mosaic_thumb_title_font_size; ?>px;
        vertical-align: middle;
        display: table-cell !important;
        z-index: 1;
        text-align: center;
        margin: 0 auto;
      }
      /*pagination styles*/
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> {
        text-align: <?php echo $theme_row->page_nav_align; ?>;
        font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
        font-family: <?php echo $theme_row->page_nav_font_style; ?>;
        font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
        color: #<?php echo $theme_row->page_nav_font_color; ?>;
        margin: 6px 0 4px;
        display: block;
        height: 30px;
        line-height: 30px;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .displaying-num_<?php echo $bwg; ?> {
        font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
        font-family: <?php echo $theme_row->page_nav_font_style; ?>;
        font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
        color: #<?php echo $theme_row->page_nav_font_color; ?>;
        margin-right: 10px;
        vertical-align: middle;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .paging-input_<?php echo $bwg; ?> {
        font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
        font-family: <?php echo $theme_row->page_nav_font_style; ?>;
        font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
        color: #<?php echo $theme_row->page_nav_font_color; ?>;
        vertical-align: middle;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a.disabled,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a.disabled:hover,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a.disabled:focus {
        cursor: default;
        color: rgba(<?php echo $rgb_page_nav_font_color['red']; ?>, <?php echo $rgb_page_nav_font_color['green']; ?>, <?php echo $rgb_page_nav_font_color['blue']; ?>, 0.5);
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .tablenav-pages_<?php echo $bwg; ?> a {
        cursor: pointer;
        font-size: <?php echo $theme_row->page_nav_font_size; ?>px;
        font-family: <?php echo $theme_row->page_nav_font_style; ?>;
        font-weight: <?php echo $theme_row->page_nav_font_weight; ?>;
        color: #<?php echo $theme_row->page_nav_font_color; ?>;
        text-decoration: none;
        padding: <?php echo $theme_row->page_nav_padding; ?>;
        margin: <?php echo $theme_row->page_nav_margin; ?>;
        border-radius: <?php echo $theme_row->page_nav_border_radius; ?>;
        border-style: <?php echo $theme_row->page_nav_border_style; ?>;
        border-width: <?php echo $theme_row->page_nav_border_width; ?>px;
        border-color: #<?php echo $theme_row->page_nav_border_color; ?>;
        background-color: #<?php echo $theme_row->page_nav_button_bg_color; ?>;
        opacity: <?php echo number_format($theme_row->page_nav_button_bg_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->page_nav_button_bg_transparent; ?>);
        box-shadow: <?php echo $theme_row->page_nav_box_shadow; ?>;
        <?php echo ($theme_row->page_nav_button_transition ) ? 'transition: all 0.3s ease 0s;-webkit-transition: all 0.3s ease 0s;' : ''; ?>
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_back_<?php echo $bwg; ?> {
        background-color: rgba(0, 0, 0, 0);
        color: #<?php echo $theme_row->album_compact_back_font_color; ?> !important;
        cursor: pointer;
        display: block;
        font-family: <?php echo $theme_row->album_compact_back_font_style; ?>;
        font-size: <?php echo $theme_row->album_compact_back_font_size; ?>px;
        font-weight: <?php echo $theme_row->album_compact_back_font_weight; ?>;
        text-decoration: none;
        padding: <?php echo $theme_row->album_compact_back_padding; ?>;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #spider_popup_overlay_<?php echo $bwg; ?> {
        background-color: #<?php echo $theme_row->lightbox_overlay_bg_color; ?>;
        opacity: <?php echo number_format($theme_row->lightbox_overlay_bg_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->lightbox_overlay_bg_transparent; ?>);
      }
        <?php 
      } /* For mosaic view or (thumbnail or masonry) view.*/
      ?>
    </style>
    <div id="bwg_container1_<?php echo $bwg; ?>">
      <div id="bwg_container2_<?php echo $bwg; ?>">
        <form id="gal_front_form_<?php echo $bwg; ?>" method="post" action="#">
          <?php
          if ($params['show_search_box'] && $type == 'gallery') {
            WDWLibrary::ajax_html_frontend_search_box('gal_front_form_' . $bwg, $bwg, $album_gallery_div_id, $images_count, $params['search_box_width']);
          }
          if (isset($params['show_sort_images']) && $params['show_sort_images'] && $type == 'gallery') {
            WDWLibrary::ajax_html_frontend_sort_box('gal_front_form_' . $bwg, $bwg, $album_gallery_div_id, $params['sort_by'], $params['search_box_width']);
          }
          ?>
          <div id="<?php echo $form_child_div_id; ?>" style="<?php echo $form_child_div_style; ?>">
            <div id="ajax_loading_<?php echo $bwg; ?>" style="position:absolute;width: 100%; z-index: 115; text-align: center; height: 100%; vertical-align: middle; display: none;">
              <div style="display: table; vertical-align: middle; width: 100%; height: 100%; background-color:#FFFFFF; opacity:0.7; filter:Alpha(opacity=70);">
                <div style="display: table-cell; text-align: center; position: relative; vertical-align: middle;" >
                  <div id="loading_div_<?php echo $bwg; ?>" style="display: inline-block; text-align: center; position: relative; vertical-align: middle;">
                    <img src="<?php echo WD_BWG_URL . '/images/ajax_loader.png'; ?>" class="spider_ajax_loading" style="float: none; width:50px;">
                  </div>
                </div>
              </div>
            </div>
            <?php
            if ($params['extended_album_enable_page']  && $items_per_page && ($theme_row->page_nav_position == 'top') && $page_nav['total']) {
              WDWLibrary::ajax_html_frontend_page_nav($theme_row, $page_nav['total'], $page_nav['limit'], 'gal_front_form_' . $bwg, $items_per_page, $bwg, $album_gallery_div_id, $params['album_id'], $type, $options_row->enable_seo, $params['extended_album_enable_page']);
            }
            if ($bwg_previous_album_id != $params['album_id']) {
              ?>
              <a class="bwg_back_<?php echo $bwg; ?>" onclick="spider_frontend_ajax('gal_front_form_<?php echo $bwg; ?>', '<?php echo $bwg; ?>', '<?php echo $album_gallery_div_id; ?>', 'back', '', 'album')"><?php echo __('Back', 'bwg'); ?></a>
              <?php
            }
            ?>
            <div id="<?php echo $album_gallery_div_id; ?>" class="<?php echo $album_gallery_div_class; ?>">
              <input type="hidden" id="bwg_previous_album_id_<?php echo $bwg; ?>" name="bwg_previous_album_id_<?php echo $bwg; ?>" value="<?php echo $bwg_previous_album_id; ?>" />
              <input type="hidden" id="bwg_previous_album_page_number_<?php echo $bwg; ?>" name="bwg_previous_album_page_number_<?php echo $bwg; ?>" value="<?php echo $bwg_previous_album_page_number; ?>" />
              <?php
              if ($type != 'gallery') {
                if (!$page_nav['total']) {
                  ?>
                  <span class="bwg_back_<?php echo $bwg; ?>"><?php echo __('Album is empty.', 'bwg'); ?></span>
                  <?php
                }
                foreach ($album_galleries_row as $album_galallery_row) {
                  if ($album_galallery_row->is_album) {
                    $album_row = $this->model->get_album_row_data($album_galallery_row->alb_gal_id);
                    if (!$album_row) {
                      continue;
                    }
                    $preview_image = $album_row->preview_image;
                    if (!$preview_image) {
                      $preview_image = $album_row->random_preview_image;
                    }
                    $def_type = 'album';
                    $title = $album_row->name;
                    $description = wpautop($album_row->description);
                  }
                  else {
                    $gallery_row = $this->model->get_gallery_row_data($album_galallery_row->alb_gal_id);
                    if (!$gallery_row) {
                      continue;
                    }
                    $preview_image = $gallery_row->preview_image;
                    if (!$preview_image) {
                      $preview_image = $gallery_row->random_preview_image;
                    }
                    $def_type = 'gallery';
                    $title = $gallery_row->name;
                    $description = wpautop($gallery_row->description);
                  }
                  $local_preview_image = true;
                  $parsed_prev_url = parse_url($preview_image, PHP_URL_SCHEME);
                  
                  if($parsed_prev_url =='http' || $parsed_prev_url =='https'){
                    $local_preview_image = false;
                  }

                  if (!$preview_image) {
                    $preview_url = WD_BWG_URL . '/images/no-image.png';
                    $preview_path = WD_BWG_DIR . '/images/no-image.png';
                  }
                  else {
                    if($local_preview_image){
                      $preview_url = site_url() . '/' . $WD_BWG_UPLOAD_DIR . $preview_image;
                      $preview_path = ABSPATH . $WD_BWG_UPLOAD_DIR . $preview_image;
                    }
                    else{
                      $preview_url = $preview_image;
                      $preview_path = $preview_image;
                    }
                  }
                  if($local_preview_image){
                    list($image_thumb_width, $image_thumb_height) = getimagesize(htmlspecialchars_decode($preview_path, ENT_COMPAT | ENT_QUOTES));
                    $scale = max($params['extended_album_thumb_width'] / $image_thumb_width, $params['extended_album_thumb_height'] / $image_thumb_height);
                    $image_thumb_width *= $scale;
                    $image_thumb_height *= $scale;
                    $thumb_left = ($params['extended_album_thumb_width'] - $image_thumb_width) / 2;
                    $thumb_top = ($params['extended_album_thumb_height'] - $image_thumb_height) / 2;
                  }
                  else{
                    $image_thumb_width = $params['extended_album_thumb_width'];
                    $image_thumb_height = $params['extended_album_thumb_height'];
                    $thumb_left = 0;
                    $thumb_top = 0;
                  }
                  if ($type != 'gallery') {
                    ?>
                    <div class="bwg_album_extended_div_<?php echo $bwg; ?>">
                      <div class="bwg_album_extended_thumb_div_<?php echo $bwg; ?>">
                        <a class="bwg_album_<?php echo $bwg; ?>" <?php echo ($options_row->enable_seo ? 'href="' . add_query_arg(array("type_" . $bwg => $def_type, "album_gallery_id_" . $bwg => $album_galallery_row->alb_gal_id, "bwg_previous_album_id_" . $bwg => $album_gallery_id . ',' . $bwg_previous_album_id , "bwg_previous_album_page_number_" . $bwg => (isset($_REQUEST['page_number_' . $bwg]) ? esc_html($_REQUEST['page_number_' . $bwg]) : 0) . ',' . $bwg_previous_album_page_number), $_SERVER['REQUEST_URI']) . '"' : ''); ?> style="font-size: 0;" data-alb_gal_id="<?php echo $album_galallery_row->alb_gal_id; ?>" data-def_type="<?php echo $def_type; ?>" data-title="<?php htmlspecialchars(addslashes($title)); ?>">
                          <span class="bwg_album_thumb_<?php echo $bwg; ?>" style="height:inherit;">
                            <span class="bwg_album_thumb_spun1_<?php echo $bwg; ?>">
                              <span class="bwg_album_thumb_spun2_<?php echo $bwg; ?>">
                                <img style="padding: 0; max-height:none; max-width:none; width:<?php echo $image_thumb_width; ?>px; height:<?php echo $image_thumb_height; ?>px; margin-left: <?php echo $thumb_left; ?>px; margin-top: <?php echo $thumb_top; ?>px;" src="<?php echo $preview_url; ?>" alt="<?php echo $title; ?>" />
                              </span>
                            </span>
                          </span>
                        </a>
                      </div>
                      <div class="bwg_album_extended_text_div_<?php echo $bwg; ?>">
                        <?php
                        if ($title) {
                          ?>
                          <span class="bwg_title_spun_<?php echo $bwg; ?>"><?php echo $title; ?></span>
                          <?php
                        }
                        if ($params['extended_album_description_enable'] && $description) {
                          if (stripos($description, '<!--more-->') !== FALSE) {
                            $description_array = explode('<!--more-->', $description);
                            $description_short = $description_array[0];
                            $description_full = $description_array[1];
                            ?>
                            <span class="bwg_description_spun1_<?php echo $bwg; ?>">
                              <span class="bwg_description_spun2_<?php echo $bwg; ?>">
                                <span class="bwg_description_short_<?php echo $bwg; ?>">
                                  <?php echo $description_short; ?>
                                </span>
                                <span class="bwg_description_full_<?php echo $bwg; ?>">
                                  <?php echo $description_full; ?>
                                </span>
                              </span>
                              <span class="bwg_description_more_<?php echo $bwg; ?> bwg_more"><?php echo __('More', 'bwg'); ?></span>
                            </span>
                            <?php
                          }
                          else {
                            ?>
                            <span class="bwg_description_spun1_<?php echo $bwg; ?>">
                              <span class="bwg_description_short_<?php echo $bwg; ?>">
                                <?php echo $description; ?>
                              </span>
                            </span>
                            <?php
                          }
                        }
                        ?>
                      </div>
                    </div>
                    <?php
                  }
                }
              }
              elseif ($type == 'gallery') {
                if ($options_row->show_album_name) {
                  ?>
                  <div class="bwg_back_<?php echo $bwg; ?>" ><?php echo isset($_POST['title_' . $bwg]) ? esc_html($_POST['title_' . $bwg]) : ''; ?></div>
                  <?php
                }
                if (!$page_nav['total']) {
                  if ($bwg_search != '') {
                    ?>
                    <span class="bwg_back_<?php echo $bwg; ?>"><?php echo __('There are no images matching your search.', 'bwg'); ?></span>
                    <?php
                  }
                  else {
                    ?>
                    <span class="bwg_back_<?php echo $bwg; ?>"><?php echo __('Gallery is empty.', 'bwg'); ?></span>
                    <?php
                  }
                }
                foreach ($image_rows as $image_row) {
                  $params_array['image_id'] = (isset($_POST['image_id']) ? esc_html($_POST['image_id']) : $image_row->id);
                  $params_array['gallery_id'] = $album_gallery_id;
                  
                  $is_embed = preg_match('/EMBED/',$image_row->filetype)==1 ? true :false;
                  $is_embed_video = preg_match('/VIDEO/',$image_row->filetype)==1 ? true :false;
                  if (!$is_embed) {
                    list($image_thumb_width, $image_thumb_height) = getimagesize(htmlspecialchars_decode(ABSPATH . $WD_BWG_UPLOAD_DIR . $image_row->thumb_url, ENT_COMPAT | ENT_QUOTES));
                  }
                  else {
                    if($image_row->resolution != ''){
                      $resolution_arr = explode(" ",$image_row->resolution);
                      $resolution_w = intval($resolution_arr[0]);
                      $resolution_h = intval($resolution_arr[2]);
                      if($resolution_w != 0 && $resolution_h != 0){
                        $scale = $scale = max($params['extended_album_image_thumb_width'] / $resolution_w, $params['extended_album_image_thumb_height'] / $resolution_h);
                        $image_thumb_width = $resolution_w * $scale;
                        $image_thumb_height = $resolution_h * $scale;
                      }
                      else{
                        $image_thumb_width = $params['extended_album_image_thumb_width'];
                        $image_thumb_height = $params['extended_album_image_thumb_height'];
                      }
                    }
                    else{
                      $image_thumb_width = $params['extended_album_image_thumb_width'];
                      $image_thumb_height = $params['extended_album_image_thumb_height'];
                    }               
                  }
                  $scale = max($params['extended_album_image_thumb_width'] / $image_thumb_width, $params['extended_album_image_thumb_height'] / $image_thumb_height);
                  $image_thumb_width *= $scale;
                  $image_thumb_height *= $scale;
                  $thumb_left = ($params['extended_album_image_thumb_width'] - $image_thumb_width) / 2;
                  $thumb_top = ($params['extended_album_image_thumb_height'] - $image_thumb_height) / 2;
                  if ($album_view_type == 'thumbnail') {
                    ?>
                  <a <?php echo ($params['thumb_click_action'] == 'open_lightbox' ? (' class="bwg_lightbox_' . $bwg . '"' . ($options_row->enable_seo ? ' href="' . ($is_embed ? $image_row->thumb_url : site_url() . '/' . $WD_BWG_UPLOAD_DIR . $image_row->image_url) . '"' : '') . ' data-image-id="' . $image_row->id . '" data-gallery-id="' . $album_gallery_id . '"') : ($image_row->redirect_url ? 'href="' . $image_row->redirect_url . '" target="' .  ($params['thumb_link_target'] ? '_blank' : '')  . '"' : '')) ?>>
                    <span class="bwg_standart_thumb_<?php echo $bwg; ?>">
                      <span class="bwg_standart_thumb_spun1_<?php echo $bwg; ?>">
                        <span class="bwg_standart_thumb_spun2_<?php echo $bwg; ?>">
                          <?php
                          if ($play_icon && $is_embed_video) {
                            ?>
                          <span class="bwg_play_icon_spun_<?php echo $bwg; ?>">
                             <i title="<?php echo __('Play', 'bwg'); ?>"  class="fa fa-play bwg_play_icon_<?php echo $bwg; ?>"></i>
                          </span>
                            <?php
                          }
                          if ($params['extended_album_image_title'] == 'hover') {
                            ?>
                            <span class="bwg_image_title_spun1_<?php echo $bwg; ?>">
                              <span class="bwg_image_title_spun2_<?php echo $bwg; ?>">
                                <?php echo $image_row->alt; ?>
                              </span>
                            </span>
                            <?php
                          }
                          ?>
                          <img style="max-height:none; max-width:none; width:<?php echo $image_thumb_width; ?>px; height:<?php echo $image_thumb_height; ?>px; margin-left: <?php echo $thumb_left; ?>px; margin-top: <?php echo $thumb_top; ?>px;" id="<?php echo $image_row->id; ?>" src="<?php echo ( $is_embed ? "" : site_url() . '/' . $WD_BWG_UPLOAD_DIR) . $image_row->thumb_url; ?>" alt="<?php echo $image_row->alt; ?>" />
                        </span>
                      </span>
                      <?php
                      if ($params['extended_album_image_title'] == 'show') {
                        ?>
                        <span class="bwg_image_title_spun1_<?php echo $bwg; ?>">
                          <span class="bwg_image_title_spun2_<?php echo $bwg; ?>">
                            <?php echo $image_row->alt; ?>
                          </span>
                        </span>
                        <?php
                      }
                      ?>
                    </span>
                  </a>
                    <?php
                  } 			  
                  else if($album_view_type == 'masonry') {
                    ?>
                  <span class="bwg_masonry_thumb_spun_<?php echo $bwg; ?>">
                    <a <?php echo ($params['thumb_click_action'] == 'open_lightbox' ? (' class="bwg_lightbox_' . $bwg . '"' . ($options_row->enable_seo ? ' href="' . ($is_embed ? $image_row->thumb_url : site_url() . '/' . $WD_BWG_UPLOAD_DIR . $image_row->image_url) . '"' : '') . ' data-image-id="' . $image_row->id . '" data-gallery-id="' . $album_gallery_id . '"') : ($image_row->redirect_url ? 'href="' . $image_row->redirect_url . '" target="' .  ($params['thumb_link_target'] ? '_blank' : '')  . '"' : '')) ?>>
                      <img class="bwg_masonry_thumb_<?php echo $bwg; ?>" id="<?php echo $image_row->id; ?>" src="<?php echo ($is_embed ? "" : site_url() . '/' . $WD_BWG_UPLOAD_DIR) . $image_row->thumb_url; ?>" alt="<?php echo $image_row->alt; ?>" style="max-height: none !important;  max-width: none !important;" />
                    </a>
                  </span>
                    <?php
                  }
                  else { /* If mosaic.*/
                    ?>
                  <a <?php echo ($params['thumb_click_action'] == 'open_lightbox' ? (' class="bwg_lightbox_' . $bwg . '"' . ($options_row->enable_seo ? ' href="' . ($is_embed ? $image_row->thumb_url : site_url() . '/' . $WD_BWG_UPLOAD_DIR . $image_row->image_url) . '"' : '') . ' data-image-id="' . $image_row->id . '" data-gallery-id="' . $album_gallery_id . '"') : ($image_row->redirect_url ? 'href="' . $image_row->redirect_url . '" target="' .  ($params['thumb_link_target'] ? '_blank' : '')  . '"' : '')) ?>>
                    <div class="bwg_mosaic_thumb_spun_<?php echo $bwg; ?>">
                      <?php
                    if ($play_icon && $is_embed_video) {
                        ?>
                      <span class="bwg_mosaic_play_icon_spun_<?php echo $bwg; ?>">
                        <i title="<?php echo __('Play', 'bwg'); ?>"  class="fa fa-play bwg_mosaic_play_icon_<?php echo $bwg; ?>"></i>
                      </span>
                        <?php
                      }
                      if ($params['extended_album_image_title'] == 'hover' || $params['extended_album_image_title'] == 'show') {
                        ?>
                      <span class="bwg_mosaic_title_spun1_<?php echo $bwg; ?>">
                        <span class="bwg_mosaic_title_spun2_<?php echo $bwg; ?>">
                          <?php echo $image_row->alt; ?>
                        </span>
                      </span>
                        <?php
                      }
                      ?>
                          <img class="bwg_mosaic_thumb_<?php echo $bwg; ?>" id="<?php echo $image_row->id; ?>" src="<?php echo ( $is_embed ? "" : site_url() . '/' . $WD_BWG_UPLOAD_DIR) . $image_row->thumb_url; ?>" alt="<?php echo $image_row->alt; ?>" style="max-height: none !important;  max-width: none !important; " />  
                    </div>
                  </a>
                  <?php
                  } /* End of if mosaic.*/
                }
              } /* End of if gallery.*/
              ?>
              <script>
                jQuery(".bwg_description_more_<?php echo $bwg; ?>").click(function () {
                  if (jQuery(this).hasClass("bwg_more")) {
                    jQuery(this).parent().find(".bwg_description_full_<?php echo $bwg; ?>").show();
                    jQuery(this).attr("class", "bwg_description_more_<?php echo $bwg; ?> bwg_hide");
                    jQuery(this).html("<?php echo __('Hide', 'bwg'); ?>");
                  }
                  else {
                    jQuery(this).parent().find(".bwg_description_full_<?php echo $bwg; ?>").hide();
                    jQuery(this).attr("class", "bwg_description_more_<?php echo $bwg; ?> bwg_more");
                    jQuery(this).html("<?php echo __('More', 'bwg'); ?>");
                  }
                });
                <?php 
                if ($album_view_type == 'masonry' && $type == 'gallery') {
                  ?>
                function bwg_masonry_<?php echo $bwg; ?>() {
                  var image_width = <?php echo $params['extended_album_image_thumb_width']; ?>;
                  var cont_div_width = <?php echo $params['extended_album_image_column_number'] * ($params['extended_album_image_thumb_width'] + 2 * ($theme_row->thumb_padding + $theme_row->thumb_border_width)); ?>;
                  if (cont_div_width > jQuery("#bwg_masonry_thumbnails_div_<?php echo $bwg; ?>").width()) {
                    cont_div_width = jQuery("#bwg_masonry_thumbnails_div_<?php echo $bwg; ?>").width();
                  }
                  var col_count = parseInt(cont_div_width / image_width);
                  if (!col_count) {
                    col_count = 1;
                  }
                  var top = new Array();
                  var left = new Array();
                  for (var i = 0; i < col_count; i++) {
                    top[i] = 0;
                    left[i] = i * image_width;
                  }
                  var div_width = col_count * image_width;
                  if (div_width > jQuery(window).width()) {
                    div_width = jQuery(window).width();
                    jQuery(".bwg_masonry_thumb_<?php echo $bwg; ?>").attr("style", "max-width: " + div_width + "px");
                  }
                  else {
                    div_width = col_count * image_width;
                  }
                  jQuery(".bwg_masonry_thumb_spun_<?php echo $bwg; ?>").each(function() {
                    min_top = Math.min.apply(Math, top);
                    index_min_top = jQuery.inArray(min_top, top);
                    jQuery(this).css({left: left[index_min_top], top: top[index_min_top]});
                    top[index_min_top] += jQuery(this).height();
                  });
                  jQuery(".bwg_masonry_thumbnails_<?php echo $bwg; ?>").width(div_width);
                  jQuery(".bwg_masonry_thumbnails_<?php echo $bwg; ?>").height(Math.max.apply(Math, top));
                  jQuery(".bwg_masonry_thumb_<?php echo $bwg; ?>").css({visibility: 'visible'});
                }
                jQuery(window).load(function() {
                  bwg_masonry_<?php echo $bwg; ?>();
                });
                jQuery(window).resize(function() {
                  bwg_masonry_<?php echo $bwg; ?>();
                });
                jQuery(".bwg_masonry_thumb_spun_<?php echo $bwg; ?> img").error(function() {
                  jQuery(this).height(100);
                  jQuery(this).width(100);
                });

                <?php
                if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'):
                ?>
                /*if page is called by AJAX use this instead of window.load*/
                  var cccount_masonry_ajax = 0;
                  var tot_cccount_masonry_ajax = jQuery(".bwg_masonry_thumb_spun_<?php echo $bwg; ?> img").length;
                  jQuery(".bwg_masonry_thumb_spun_<?php echo $bwg; ?> img").on("load", function() {
                    if (++cccount_masonry_ajax == tot_cccount_masonry_ajax) {
                      window["bwg_masonry_<?php echo $bwg; ?>"]();
                    }
                  });
                  jQuery(".bwg_masonry_thumb_spun_<?php echo $bwg; ?> img").error(function() {
                    
                    jQuery(this).height(100);
                    jQuery(this).width(100);
                    if (++cccount_masonry_ajax == tot_cccount_masonry_ajax) {
                      
                      bwg_masonry_<?php echo $bwg; ?>();

                      }
                  });
                <?php
                  endif;
                ?>








                  <?php
                }
                /* Mosaic.*/
                if ($album_view_type == 'mosaic' && $type == 'gallery') {
                  if ($params['extended_album_mosaic_hor_ver'] == 'vertical') {
                    ?>
                    /* Vertical mosaic.*/
                    function bwg_mosaic_<?php echo $bwg; ?>(event_type) {
                      <?php
                      if ($params['extended_album_resizable_mosaic'] == 1) {
                        ?>
                        if (jQuery(window).width() >= 1920) {
                          var thumbnail_width = (1 + jQuery(window).width() / 1920) * <?php echo $params['extended_album_image_thumb_width']; ?>;
                        }
                        else if (jQuery(window).width() <= 640) {
                          var thumbnail_width = jQuery(window).width() / 640 * <?php echo $params['extended_album_image_thumb_width']; ?>;
                        }
                        else {
                          var thumbnail_width = <?php echo $params['extended_album_image_thumb_width']; ?>;
                        }
                        <?php
                      }
                      else {
                        ?>
                        var thumbnail_width = <?php echo $params['extended_album_image_thumb_width']; ?>;
                        <?php
                      }
                      ?>
                      /* Initialize.*/
                      var mosaic_pics = jQuery(".bwg_mosaic_thumb_<?php echo $bwg; ?>");
      
                      mosaic_pics.each(function (index){
                        var thumb_w = mosaic_pics.eq(index).width();
                        var thumb_h = mosaic_pics.eq(index).height();
                        mosaic_pics.eq(index).height(thumb_h * thumbnail_width/thumb_w);
                        mosaic_pics.eq(index).width(thumbnail_width);
                      });
                      /* Resize.*/
                      var divwidth = jQuery("#bwg_mosaic_thumbnails_div_<?php echo $bwg; ?>").width()/100 * <?php echo $params['extended_album_mosaic_total_width'] ?>;
                      /*set absolute width of mosaic*/
                      jQuery("#bwg_mosaic_thumbnails_<?php echo $bwg; ?>").width(divwidth);
         
                      var padding_px = <?php echo $theme_row->mosaic_thumb_padding; ?>;
                      var border_px = <?php echo $theme_row->mosaic_thumb_border_width; ?>;       
                      var border_and_padding= border_px+ padding_px;
                      var col_width = thumbnail_width +2*border_and_padding < divwidth ? thumbnail_width : divwidth - 2*border_and_padding;
                      var col_number= Math.floor(divwidth / (col_width+2*border_and_padding));
                      var col_of_img = []; /* Column of the current image.*/
                      col_of_img[0]=0;
                      var imgs_by_cols = []; /* Number of images in each column*./
                      /* Zero points.*/
                      var min_top = [];
                      for (var x = 0; x < col_number; x++) {
                        min_top[x] = 0;
                        imgs_by_cols[x] = 0;          
                      }
                      var img_wrap_left = 0;
                      /* Create masonry vertical ///this part may be shortened!!!*/
                      mosaic_pics.each(function (index){
                        var col=0;
                        var min = min_top[0];
                        for (var x = 0; x < col_number; x++) {
                          if (min > min_top[x]) {
                            min = min_top[x];
                            col = x;
                          }
                        }
                        col_of_img[index] = col; /* Store in which col is arranged.*/
                        imgs_by_cols[col]++;
                        img_container_top = min ;
                        img_container_left = img_wrap_left+  col*(col_width + 2*border_and_padding);      
                        mosaic_pics.eq(index).parent().css({ top: img_container_top, left: img_container_left  });
                        min_top[col] +=  mosaic_pics.eq(index).height()+ 2*border_and_padding;
                      });
                      /* Create mosaics.*/
                      var stretch = [];
                      stretch[0] = 1;
                      var sum_col_width = 0;
                      var sum_col_height = []; /* Array to store height of every column.*/
                      /* Solve equations to calculate stretch[col] factors.*/
                      var axbx = 0;
                      var axpxbx = 0;
                      for (var x = 0; x<col_number; x++) {
                        sum_col_width += col_width;
                        sum_col_height[x] = 0;
                        mosaic_pics.each(function (index) {
                          if (col_of_img[index] == x) {
                            sum_col_height[x] += mosaic_pics.eq(index).height();
                          }
                        });
                        if (sum_col_height[x] != 0) {
                          axbx += col_width / sum_col_height[x];
                          axpxbx += col_width * imgs_by_cols[x] * 2 * border_and_padding / sum_col_height[x];
                        }
                      }
                      var common_height = 0;
                      if (axbx != 0) {
                        common_height = (sum_col_width + axpxbx)/ axbx;
                      }
                      for (var x = 0; x < col_number; x++) {
                        if (sum_col_height[x] != 0) {
                          stretch[x] = (common_height - imgs_by_cols[x] * 2 * border_and_padding) / sum_col_height[x];
                        }
                      }
                      var img_container_left = []; /* Position.left of every column.*/
                      img_container_left[0] = img_wrap_left;
                      for (var x = 1; x <= col_number; x++) {
                        img_container_left[x] = img_container_left[x-1] + col_width *stretch[x-1] + 2 * border_and_padding;
                      }
                      /* Reset min_top array to the position.top of #wrap container.*/
                      var img_container_top = [];
                      for (var x = 0; x < col_number; x++) {
                        img_container_top[x] = 0;       
                      }
                      /* Stretch and shift to create mosaic vertical.*/
                      var last_img_index =[]; /* Last image in column.*/
                      last_img_index[0] = 0;
                      mosaic_pics.each(function (index) {
                          var thumb_w = mosaic_pics.eq(index).width();
                          var thumb_h = mosaic_pics.eq(index).height();
                          mosaic_pics.eq(index).width(thumb_w * stretch[col_of_img[index]]);
                          mosaic_pics.eq(index).height(thumb_h * stretch[col_of_img[index]]);
                          mosaic_pics.eq(index).parent().css({ top: img_container_top[col_of_img[index]], left: img_container_left[col_of_img[index]] });
                          img_container_top[col_of_img[index]] +=  thumb_h * stretch[col_of_img[index]] + 2 * border_and_padding;
                          last_img_index[col_of_img[index]] = index;
                      });
                      jQuery("#bwg_mosaic_thumbnails_<?php echo $bwg; ?>").width(img_container_left[col_number]);
                      jQuery("#bwg_mosaic_thumbnails_<?php echo $bwg; ?>").height(img_container_top[0]);  /*IMPORTANT!*/
                      jQuery(".bwg_mosaic_thumb_<?php echo $bwg; ?>").css({visibility: 'visible'});
                      show_title_always_show_<?php echo $bwg; ?>();
                      show_mosaic_play_icons_<?php echo $bwg; ?>();
                    } /* End of function bwg_mosaic_ vertical.*/
                    <?php
                  }
                  else {
                    ?>
                    /* Horizontal mosaic.*/
                    function bwg_mosaic_<?php echo $bwg; ?>(event_type) {
                      <?php
                      if ($params['extended_album_resizable_mosaic'] == 1) {
                        ?>
                      if (jQuery(window).width() >= 1920) {
                        var thumbnail_height = (1 + jQuery(window).width() / 1920) * <?php echo $params['extended_album_image_thumb_height']; ?>;
                      }
                      else if (jQuery(window).width() <= 640) {
                        var thumbnail_height = jQuery(window).width() / 640 * <?php echo $params['extended_album_image_thumb_height']; ?>;
                      }
                      else {
                        var thumbnail_height = <?php echo $params['extended_album_image_thumb_height']; ?>;
                      }
                        <?php
                      }
                      else {
                        ?>
                      var thumbnail_height = <?php echo $params['extended_album_image_thumb_height']; ?>;
                        <?php
                      }
                      ?>
                      /* Initialize.*/
                      var mosaic_pics = jQuery(".bwg_mosaic_thumb_<?php echo $bwg; ?>");

                      mosaic_pics.each(function (index){
                        var thumb_h = mosaic_pics.eq(index).height();
                        var thumb_w = mosaic_pics.eq(index).width();
                        thumb_w = thumb_w*  thumbnail_height/thumb_h;   
                        mosaic_pics.eq(index).height(thumbnail_height);
                        mosaic_pics.eq(index).width(thumb_w);  
                      });
                      /* Resize.*/
                      var divwidth = jQuery("#bwg_mosaic_thumbnails_div_<?php echo $bwg; ?>").width() / 100 * <?php echo $params['extended_album_mosaic_total_width'] ?>;
                      /* Set absolute in order not to be affected by appearance of scroll bar.*/
                      jQuery("#bwg_mosaic_thumbnails_<?php echo $bwg; ?>").width(divwidth);
        
                      var padding_px = <?php echo $theme_row->mosaic_thumb_padding; ?>;
                      var border_px = <?php echo $theme_row->mosaic_thumb_border_width; ?>;    
                      var border_and_padding= border_px+ padding_px;
                      var row_height = thumbnail_height + 2 * border_and_padding;
                      var row_number = 0;
                      var row_of_img = []; /* Row of the current image.*/
                      row_of_img[0]=0;
                      var imgs_by_rows = []; /* Number of images in each row.*/
                      imgs_by_rows[0] = 0;
                      var row_cum_width = 0; /* Width of the current row.*/
                      /* Create masonry horizontal.*/
                      mosaic_pics.each(function (index) {
                        row_cum_width2 = row_cum_width + mosaic_pics.eq(index).width() + 2 * border_and_padding;
                        if (row_cum_width2 - divwidth < 0) { /* add the image to the row.*/
                          row_cum_width = row_cum_width2;
                          row_of_img[index] = row_number;
                          imgs_by_rows[row_number]++;
                        }
                        else {
                          if (index !== mosaic_pics.length - 1) { /* If not last element.*/
                            if ((Math.abs(row_cum_width-divwidth) > Math.abs(row_cum_width2-divwidth)) || !(!(Math.abs(row_cum_width-divwidth) <= Math.abs(row_cum_width2-divwidth)) || !(imgs_by_rows[row_number] == 0))) {
                              if (index !== mosaic_pics.length - 2) { /* Add and shrink if not the second.*/
                                row_cum_width = row_cum_width2;
                                row_of_img[index] = row_number;
                                imgs_by_rows[row_number]++; 
                                row_number++;
                                imgs_by_rows[row_number] = 0;
                                row_cum_width = 0;
                              }
                              else { /* add second but NOT shrink and not change row.*/
                                row_cum_width = row_cum_width2;
                                row_of_img[index] = row_number;
                                imgs_by_rows[row_number]++;
                              }
                            }
                            else { /* Add to new row and  stretch prev row (or shrink if even one pic is big).*/
                              row_number++;
                              imgs_by_rows[row_number] = 1;
                              row_of_img[index] = row_number;
                              row_cum_width = row_cum_width2 - row_cum_width;
                            }
                          }
                          else { /* If the last element, add and shrink.*/
                            row_cum_width = row_cum_width2;
                            row_of_img[index] = row_number;
                            imgs_by_rows[row_number]++;
                          }
                        }
                      });
                      /* Create mosaics.*/
                      var stretch = []; /* Stretch[row] factors.*/
                      var row_new_height = []; /* Array to store height of every column.*/
                      for ( var row = 0; row <= row_number; row++) {
                        stretch[row] = 1;
                        row_new_height[row] = row_height;    
                      }
                      /* Find stretch factors.*/
                      for (var row = 0; row <= row_number; row++) {
                        row_cum_width = 0;
                        mosaic_pics.each(function (index) {
                          if(row_of_img[index] == row) {
                            row_cum_width += mosaic_pics.eq(index).width();
                          }
                        });
                        stretch[row] = x = (divwidth - imgs_by_rows[row] * 2 * border_and_padding)/row_cum_width;
                        row_new_height[row]=(row_height - 2 * border_and_padding) * stretch[row] + 2 * border_and_padding;
                      }
                      /* Stretch and shift to create mosaic horizontal.*/
                      var last_img_index =[]; /* last image in row */
                      last_img_index[0] = 0;
                      /* Zero points.*/
                      var img_left = [];
                      var row_top = [];
                      img_left[0] = 0;
                      row_top[0] = 0;
                      for (var row = 1; row <= row_number; row++) {
                        img_left[row] = img_left[0];
                        row_top[row] = row_top[row - 1]+row_new_height[row - 1];
                      }
                      mosaic_pics.each(function (index) {
                        var thumb_w = mosaic_pics.eq(index).width();
                        var thumb_h = mosaic_pics.eq(index).height();
                        mosaic_pics.eq(index).width(thumb_w * stretch[row_of_img[index]]);
                        mosaic_pics.eq(index).height(thumb_h * stretch[row_of_img[index]]);
                        mosaic_pics.eq(index).parent().css({ top: row_top[row_of_img[index]], left: img_left[row_of_img[index]] });
                        img_left[row_of_img[index]] +=  thumb_w * stretch[row_of_img[index]] + 2 * border_and_padding;
                        last_img_index[row_of_img[index]] = index;   
                      });
                      jQuery("#bwg_mosaic_thumbnails_<?php echo $bwg; ?>").height(row_top[row_number]+row_new_height[row_number]-row_top[0]); /* IMPORTANT!*/
                      jQuery(".bwg_mosaic_thumb_<?php echo $bwg; ?>").css({visibility: 'visible'});
                      show_title_always_show_<?php echo $bwg; ?>();
                      show_mosaic_play_icons_<?php echo $bwg; ?>();
                    } /* End of function bwg_mosaic_ horizontal.*/
                    <?php
                  } /* If horizontal.*/
                  ?>
                  jQuery(window).load(function() {
                    bwg_mosaic_<?php echo $bwg; ?>("load");
                  });
                  jQuery(window).resize(function() {
                    bwg_mosaic_<?php echo $bwg; ?>("resize");
                  });
                  jQuery(".bwg_mosaic_thumb_spun_<?php echo $bwg; ?> img").error(function() {
                    jQuery(this).height(100);
                    jQuery(this).width(100);
                  });

                  <?php
                if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'):
                ?>
                    /*if page is called by AJAX use this instead of window.load*/
                    var cccount_mosaic_ajax = 0;
                    var tot_cccount_mosaic_ajax = jQuery(".bwg_mosaic_thumb_spun_<?php echo $bwg; ?> img").length;
                    
                    jQuery(".bwg_mosaic_thumb_spun_<?php echo $bwg; ?> img").on("load", function() {

                      if (++cccount_mosaic_ajax == tot_cccount_mosaic_ajax) {
                      
                        window["bwg_mosaic_<?php echo $bwg; ?>"]("load");

                      }
                    });
                    jQuery(".bwg_mosaic_thumb_spun_<?php echo $bwg; ?> img").error(function() {

                      jQuery(this).height(100);
                      jQuery(this).width(100);
                      if (++cccount_mosaic_ajax == tot_cccount_mosaic_ajax) {
                        
                        bwg_mosaic_<?php echo $bwg; ?>("load");

                      }
                    });
                <?php
                endif;
                ?>







                  
                  <?php
                  if ($params['extended_album_image_title'] == 'hover') {
                    ?>
                  jQuery(".bwg_mosaic_thumb_spun_<?php echo $bwg; ?>").on("mouseenter", function() {
                    var img_w = jQuery(this).children(".bwg_mosaic_thumb_<?php echo $bwg; ?>").width();
                    var img_h = jQuery(this).children(".bwg_mosaic_thumb_<?php echo $bwg; ?>").height();
                    jQuery(this).children(".bwg_mosaic_title_spun1_<?php echo $bwg; ?>").width(img_w);
                    var title_w = jQuery(this).children(".bwg_mosaic_title_spun1_<?php echo $bwg; ?>").width();
                    var title_h = jQuery(this).children(".bwg_mosaic_title_spun1_<?php echo $bwg; ?>").height();
                    var paddings_and_borders = <?php echo $theme_row->mosaic_thumb_padding; ?> + <?php echo $theme_row->mosaic_thumb_border_width; ?>;
                    jQuery(this).children(".bwg_mosaic_title_spun1_<?php echo $bwg; ?>").css({
                      top: paddings_and_borders + 0.5 * img_h - 0.5 * title_h, 
                      left: paddings_and_borders +  0.5 * img_w - 0.5 * title_w,
                      'opacity': 1,
                      'filter': 'Alpha(opacity=100)'
                    });
                  });
                  jQuery(".bwg_mosaic_thumb_spun_<?php echo $bwg; ?>").on("mouseleave", function() {
                    jQuery(this).children(".bwg_mosaic_title_spun1_<?php echo $bwg; ?>").css({ top: 0, left: -10000,'opacity': 0,
                    'filter': 'Alpha(opacity=0)','padding': '<?php echo $theme_row->mosaic_thumb_title_margin; ?>'});
                  });
                    <?php
                  }
                  ?>
                  function show_title_always_show_<?php echo $bwg; ?>() {
                    <?php
                    if ($params['extended_album_image_title'] == 'show') {
                      ?>
                    jQuery(".bwg_mosaic_thumb_spun_<?php echo $bwg; ?>").each(function() {
                      var img_w = jQuery(this).children(".bwg_mosaic_thumb_<?php echo $bwg; ?>").width();
                      var img_h = jQuery(this).children(".bwg_mosaic_thumb_<?php echo $bwg; ?>").height();
                      jQuery(this).children(".bwg_mosaic_title_spun1_<?php echo $bwg; ?>").width(img_w);
                      var title_w = jQuery(this).children(".bwg_mosaic_title_spun1_<?php echo $bwg; ?>").width();
                      var title_h = jQuery(this).children(".bwg_mosaic_title_spun1_<?php echo $bwg; ?>").height();
                      var paddings_and_borders = <?php echo $theme_row->mosaic_thumb_padding; ?> + <?php echo $theme_row->mosaic_thumb_border_width; ?>;
                      jQuery(this).children(".bwg_mosaic_title_spun1_<?php echo $bwg; ?>").css({
                        top: paddings_and_borders + 0.5 * img_h - 0.5 * title_h,
                        left: paddings_and_borders +  0.5 * img_w - 0.5 * title_w,
                        'opacity': 1,
                        'filter': 'Alpha(opacity=100)',
                        'padding': '<?php echo $theme_row->mosaic_thumb_title_margin; ?>'
                      });
                    });
                      <?php
                    }
                    ?>
                    /* If not $params['extended_album_image_title'] == 'show', function body is empty.*/
                  }
                  function show_mosaic_play_icons_<?php echo $bwg; ?>() {
                    <?php
                    if ($play_icon) {
                      ?>
                    jQuery(".bwg_mosaic_play_icon_spun_<?php echo $bwg; ?>").each(function() {
                      var img_w = jQuery(this).parent().children(".bwg_mosaic_thumb_<?php echo $bwg; ?>").width();
                      var img_h = jQuery(this).parent().children(".bwg_mosaic_thumb_<?php echo $bwg; ?>").height();
                      var paddings_and_borders = <?php echo $theme_row->mosaic_thumb_padding; ?> + <?php echo $theme_row->mosaic_thumb_border_width; ?> ;
                      jQuery(this).css({
                        top: paddings_and_borders + 0.5 * img_h -0.5 *  jQuery(this).height(),
                        left: paddings_and_borders +  0.5 * img_w - 0.5 *  jQuery(this).width(),
                        'opacity': 1,
                        'filter': 'Alpha(opacity=100)'
                      });
                    });
                  <?php
                    }
                  ?>
                  }
                  <?php
                } /* If mosaic.*/
                ?>
              </script>
            </div>
            <?php
            if ($params['extended_album_enable_page']  && $items_per_page && ($theme_row->page_nav_position == 'bottom') && $page_nav['total']) {
              WDWLibrary::ajax_html_frontend_page_nav($theme_row, $page_nav['total'], $page_nav['limit'], 'gal_front_form_' . $bwg, $items_per_page, $bwg, $album_gallery_div_id, $params['album_id'], $type, $options_row->enable_seo, $params['extended_album_enable_page']);
            }
            ?>
          </div>
        </form>
        <div id="spider_popup_loading_<?php echo $bwg; ?>" class="spider_popup_loading"></div>
        <div id="spider_popup_overlay_<?php echo $bwg; ?>" class="spider_popup_overlay" onclick="spider_destroypopup(1000)"></div>
      </div>
    </div>
    <script>
      function bwg_gallery_box_<?php echo $bwg; ?>(gallery_id, image_id) {
        spider_createpopup('<?php echo addslashes(add_query_arg($params_array, admin_url('admin-ajax.php'))); ?>&gallery_id=' + gallery_id + '&image_id=' + image_id, '<?php echo $bwg; ?>', '<?php echo $params['popup_width']; ?>', '<?php echo $params['popup_height']; ?>', 1, 'testpopup', 5);
      }
      var bwg_hash = window.location.hash.substring(1);
      if (bwg_hash) {
        if (bwg_hash.indexOf("bwg") != "-1") {
          bwg_hash_array = bwg_hash.replace("bwg", "").split("/");
          if(bwg_hash_array[0] == <?php echo $album_gallery_id; ?>){
            bwg_gallery_box_<?php echo $bwg; ?>(bwg_hash_array[0], bwg_hash_array[1]);
          }
        }
      }
      function bwg_document_ready_<?php echo $bwg; ?>() {
        var bwg_touch_flag = false;
        jQuery(".bwg_lightbox_<?php echo $bwg; ?>").on("click", function () {
          if (!bwg_touch_flag) {
            bwg_touch_flag = true;
            setTimeout(function(){ bwg_touch_flag = false; }, 100);
            bwg_gallery_box_<?php echo $bwg; ?>(jQuery(this).attr("data-gallery-id"), jQuery(this).attr("data-image-id"));
            return false;
          }
        });
        jQuery(".bwg_album_<?php echo $bwg; ?>").on("click", function () {
          if (!bwg_touch_flag) {
            bwg_touch_flag = true;
            setTimeout(function(){ bwg_touch_flag = false; }, 100);
            spider_frontend_ajax('gal_front_form_<?php echo $bwg; ?>', '<?php echo $bwg; ?>', 'bwg_album_extended_<?php echo $bwg; ?>', jQuery(this).attr("data-alb_gal_id"), '<?php echo $album_gallery_id; ?>', jQuery(this).attr("data-def_type"), '', jQuery(this).attr("data-title"), 'default'); 
            return false;
          }
        });
      }
      jQuery(document).ready(function () {
        bwg_document_ready_<?php echo $bwg; ?>();
      });
    </script>
    <?php
    if ($from_shortcode) {
      return;
    }
    else {
      die();
    }
  }
  
  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}