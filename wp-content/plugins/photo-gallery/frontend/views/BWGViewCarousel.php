<?php

class BWGViewCarousel {
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
	  
    require_once(WD_BWG_DIR . '/framework/WDWLibrary.php');
    require_once(WD_BWG_DIR . '/framework/WDWLibraryEmbed.php');
    global $WD_BWG_UPLOAD_DIR;
    $from = (isset($params['from']) ? esc_html($params['from']) : 0);

    $options_row = $this->model->get_options_row_data();
    if (!isset($params['order_by'])) {
      $order_by = 'asc'; 
    }
    else {
      $order_by = $params['order_by'];
    }

	if (!isset($params['carousel_title_full_width'])){
      $params['carousel_title_full_width'] = 0;
	}
    $image_right_click = $options_row->image_right_click;
    $theme_id = (isset($params['theme_id']) ? esc_html($params['theme_id']) : 1);
    $theme_row = $this->model->get_theme_row_data($theme_id);
      if (!$theme_row) {
        echo WDWLibrary::message(__('There is no theme selected or the theme was deleted.', 'bwg'), 'error');
        return;
      }
        $gallery_id = (isset($params['gallery_id']) ? esc_html($params['gallery_id']) : 0);
        $sort_by = (isset($params['sort_by']) ? esc_html($params['sort_by']) : 'order');  
	      $enable_carousel_autoplay = (isset($params['enable_carousel_autoplay']) ? esc_html($params['enable_carousel_autoplay']) : 0);
        $image_width = (isset($params['carousel_width']) ? esc_html($params['carousel_width']) : '620');
        $image_height = (isset($params['carousel_height']) ? esc_html($params['carousel_height']) : '464');
        $enable_image_title = (isset($params['enable_carousel_title']) ? esc_html($params['enable_carousel_title']) : 0);
        $carousel_interval = (isset($params['carousel_interval']) ? esc_html($params['carousel_interval']) : 15);
        $carousel_image_column_number=(isset($params['carousel_image_column_number']) ? esc_html($params['carousel_image_column_number']) : 5);
        $carousel_image_angle = (isset($params['carousel_image_angle']) ? esc_html($params['carousel_image_angle']) : 3);
        $carousel_enable_autoplay = (isset($params['enable_carousel_autoplay']) ? esc_html($params['enable_carousel_autoplay']) : 1);
        $carousel_image_par = (isset($params['carousel_image_par']) ? esc_html($params['carousel_image_par']) : 0.75);
        $carousel_feature_border_width = (isset($params['carousel_feature_border_width']) ? esc_html($params['carousel_feature_border_width']) : 10); 
        $carousel_r_width = (isset($params['carousel_r_width']) ? esc_html($params['carousel_r_width']) : '620');
        $carousel_fit_containerWidth = (isset($params['carousel_fit_containerWidth']) ? esc_html($params['carousel_fit_containerWidth']) : 1);
        $carousel_prev_next_butt = (isset($params['carousel_prev_next_butt']) ? esc_html($params['carousel_prev_next_butt']) : 1);
        $carousel_play_pause_butt = (isset($params['carousel_play_pause_butt']) ? esc_html($params['carousel_play_pause_butt']) : 1);
        $rgb_carousel_cont_bg_color = WDWLibrary::spider_hex2rgb($theme_row->carousel_cont_bg_color);
        $interval = $carousel_interval; 
    if( $carousel_enable_autoplay)
      $car_inter = $carousel_interval;
    else
      $car_inter = 0;  
      $gallery_row = $this->model->get_gallery_row_data($gallery_id);
    if (!$gallery_row) {
      echo WDWLibrary::message(__('There is no gallery selected or the gallery was deleted.', 'bwg'), 'error');
      return;
    }
    $image_rows = $this->model->get_image_rows_data($gallery_id, $sort_by, $order_by, $bwg);
    if (!$image_rows) {
      echo WDWLibrary::message(__('There are no images in this gallery.', 'bwg'), 'error');
    }
      $current_image_id = ($image_rows ? $image_rows[0]->id : 0);
      $play_pause_button_display = 'undefined';
      $left_or_top = 'left';
      $width_or_height = 'width';
      $outerWidth_or_outerHeight = 'outerWidth';
    if (!$from) {
      $watermark_type = (isset($params['watermark_type']) ? esc_html($params['watermark_type']) : 'none');
      $watermark_text = (isset($params['watermark_text']) ? esc_html($params['watermark_text']) : '');
      $watermark_font_size = (isset($params['watermark_font_size']) ? esc_html($params['watermark_font_size']) : 12);
      $watermark_font = (isset($params['watermark_font']) ? esc_html($params['watermark_font']) : 'Arial');
      $watermark_color = (isset($params['watermark_color']) ? esc_html($params['watermark_color']) : 'FFFFFF');
      $watermark_opacity = (isset($params['watermark_opacity']) ? esc_html($params['watermark_opacity']) : 30);
      $watermark_position = explode('-', (isset($params['watermark_position']) ? esc_html($params['watermark_position']) : 'bottom-right'));
      $watermark_link = (isset($params['watermark_link']) ? esc_html($params['watermark_link']) : '');
      $watermark_url = (isset($params['watermark_url']) ? esc_html($params['watermark_url']) : '');
      $watermark_width = (isset($params['watermark_width']) ? esc_html($params['watermark_width']) : 90);
      $watermark_height = (isset($params['watermark_height']) ? esc_html($params['watermark_height']) : 90);
   
    }    
    else {
      $watermark_type = $options_row->watermark_type;
      $watermark_text = $options_row->watermark_text;
      $watermark_font_size = $options_row->watermark_font_size;
      $watermark_font = $options_row->watermark_font;
      $watermark_color = $options_row->watermark_color;
      $watermark_opacity = $options_row->watermark_opacity;
      $watermark_position = explode('-', $options_row->watermark_position);
      $watermark_link = urlencode($options_row->watermark_link);
      $watermark_url = urlencode($options_row->watermark_url);
      $watermark_width = $options_row->watermark_width;
      $watermark_height = $options_row->watermark_height;
    
    }

    ?>
    <style>
		
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_slide_bg_<?php echo $bwg; ?> {
          margin: 0 auto;
          width: 100%;
          height: 100%;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_slider_<?php echo $bwg; ?> {
        height: 100%;
        width: 100%;
      }
    
      #bwg_container1_<?php echo $bwg; ?> * {
        -moz-user-select: none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;		 
      }
      #bwg_container2_<?php echo $bwg; ?> * {
        -moz-user-select: none;
        -khtml-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;	
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel_watermark_<?php echo $bwg; ?> {
        position: relative;
        z-index: 15;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel_image_container_<?php echo $bwg; ?> {
        display: inline-block;
        position: relative;
        text-align: center;
        /*top:0px;*/ 
        vertical-align: middle;
        
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel_watermark_container_<?php echo $bwg; ?> {
        display:  table-cell;
        margin: 0 auto;
        position: relative;
        vertical-align: middle;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel_watermark_spun_<?php echo $bwg; ?> {
        display: table-cell;
        overflow: hidden;
        position: relative;
       text-align: <?php echo $watermark_position[1]; ?>;
        vertical-align: <?php echo $watermark_position[0]; ?>;    
      }
     
     #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel_watermark_image_<?php echo $bwg; ?> {
        padding: 0 !important;
        display:inline-block;
        float: none !important;
        margin: 4px !important;
        max-height: <?php echo $watermark_height; ?>px;
        max-width: <?php echo $watermark_width/2; ?>px;
        opacity: <?php echo number_format($watermark_opacity / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $watermark_opacity; ?>);
        position: relative;
        z-index: 15;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel_watermark_text_<?php echo $bwg; ?>,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel_watermark_text_<?php echo $bwg; ?>:hover {
        text-decoration: none;
        margin: 4px;
        display:block;
        font-size: <?php echo $watermark_font_size; ?>px;
        font-family: <?php echo $watermark_font; ?>;
        color: #<?php echo $watermark_color; ?> !important;
        opacity: <?php echo number_format($watermark_opacity / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $watermark_opacity; ?>);
        position: relative;
        z-index: 17;
      }
      /*.bwg_carousel-container<?php echo $bwg; ?> {
          position:relative;
          max-width: 100%;
          background-color:<?php echo $theme_row->carousel_cont_bg_color; ?>;
        }*/
	  
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel<?php echo $bwg; ?> {
        max-width: 100%;     
        position:relative;
        overflow: hidden;        
        margin-bottom:<?php echo $theme_row->carousel_mergin_bottom; ?>px;
        margin-top:<?php echo $theme_row->carousel_mergin_bottom; ?>px;
        font-size:<?php echo $theme_row->carousel_caption_p_font_size; ?>px;
        font-family:<?php echo $theme_row->carousel_font_family; ?>;     
        height:100%;
        width:100%;      
      }
	
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel-image<?php echo $bwg; ?> {
        border:0;
        position:absolute;
        display:block;
        max-width:none;
        padding: 0 !important;
        margin: 0 !important;
        float: none !important;
        vertical-align: middle;
        height:100%;
        width:100%;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
      
      }
     #bwg_container2_<?php echo $bwg; ?>{
      visibility:hidden;
     }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel-container<?php echo $bwg; ?> {
        position:relative; 
        max-width: 100%;
        width:100%;
        height: <?php echo $image_height; ?>px;
        background-color: rgba(<?php echo $rgb_carousel_cont_bg_color['red']; ?>, <?php echo $rgb_carousel_cont_bg_color['green']; ?>, <?php echo $rgb_carousel_cont_bg_color['blue']; ?>, <?php echo number_format($theme_row->carousel_cont_btn_transparent / 100, 2, ".", ""); ?>);
         
      }

      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel-feature<?php echo $bwg; ?> {
        position:absolute;
        border-width: <?php echo $theme_row->carousel_feature_border_width; ?>px;
        border-style: <?php echo $theme_row->carousel_feature_border_style; ?>;
        border-color: #<?php echo $theme_row->carousel_feature_border_color; ?>; 
        display:block;
        overflow:hidden;
        cursor:pointer;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel-feature<?php echo $bwg; ?> .bwg_carousel-caption<?php echo $bwg; ?> .bwg_carousel_title_text_<?php echo $bwg; ?> {
        text-decoration: none;
        position: absolute;
        z-index: 15;
        /*bottom:0px; */                 
        background-color:#<?php echo $theme_row->carousel_caption_background_color; ?>;
        display: inline-block; 
        margin: <?php echo $theme_row->carousel_caption_p_mergin; ?>px;
        padding: <?php echo $theme_row->carousel_caption_p_pedding; ?>px;
        font-weight:<?php echo $theme_row->carousel_caption_p_font_weight; ?>;
        font-size:<?php echo $theme_row->carousel_caption_p_font_size; ?>px;
        opacity: <?php echo number_format($theme_row->carousel_title_opacity / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->carousel_title_opacity; ?>);
        border-radius: <?php echo $theme_row->carousel_title_border_radius; ?>px; 
        color:#<?php echo $theme_row->carousel_caption_p_color; ?>!important;
        width: 75%;
        top:0px;
        text-align:center;
        word-wrap: break-word;
        word-break: break-word;
             
      }
       
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel-left<?php echo $bwg; ?>,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel-right<?php echo $bwg; ?> {
        background: transparent url("<?php echo WD_BWG_URL . '/images/blank.gif'; ?>") repeat scroll 0 0;
        bottom:38%;
        cursor: pointer;
        display: inline;
        height: 30%;
        outline: medium none;
        position: absolute;
        width: 0%;
        /*z-index: 10130;*/
        z-index: 13;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel-left<?php echo $bwg; ?> {
        left: 0;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel-right<?php echo $bwg; ?> {
        right: 0;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel-left<?php echo $bwg; ?>
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel-right<?php echo $bwg; ?> {
        visibility: visible;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel-left<?php echo $bwg; ?>{
        left: 20px;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_video_hide<?php echo $bwg; ?>{
        width:100%;
        height:100%;
        position:absolute;
        z-index:22;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel-right<?php echo $bwg; ?> {
        left: auto;
        right: 50px;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #spider_carousel_left-ico_<?php echo $bwg; ?> span,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #spider_carousel_right-ico_<?php echo $bwg; ?> span {
        display: table-cell;
        text-align: center;
        vertical-align: middle;
        z-index: 13;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #spider_carousel_left-ico_<?php echo $bwg; ?>,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #spider_carousel_right-ico_<?php echo $bwg; ?> {
        background-color: #<?php echo $theme_row->carousel_rl_btn_bg_color; ?>;
        border-radius: <?php echo $theme_row->carousel_rl_btn_border_radius; ?>;
        border: <?php echo $theme_row->carousel_rl_btn_border_width; ?>px <?php echo $theme_row->carousel_rl_btn_border_style; ?> #<?php echo $theme_row->carousel_rl_btn_border_color; ?>;       
        color: #<?php echo $theme_row->carousel_rl_btn_color; ?>;
        height: <?php echo $theme_row->carousel_rl_btn_height; ?>px;
        font-size: <?php echo $theme_row->carousel_rl_btn_size; ?>px;
        width: <?php echo $theme_row->carousel_rl_btn_width; ?>px;
        z-index: 13;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        cursor: pointer;
        display: table;
        /*left: -9999px;*/
        line-height: 0;
        margin-top: -15px;
        position: absolute;
        top: 55%;
        /*z-index: 10135;*/
        opacity: <?php echo number_format($theme_row->carousel_close_btn_transparent / 100, 2, ".", ""); ?>;
        filter: Alpha(opacity=<?php echo $theme_row->carousel_close_btn_transparent; ?>);
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #spider_carousel_left-ico_<?php echo $bwg; ?>:hover,
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #spider_carousel_right-ico_<?php echo $bwg; ?>:hover {
        color: #<?php echo $theme_row->carousel_close_rl_btn_hover_color; ?>;
        cursor: pointer;
      }
       #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel_play_pause_<?php echo $bwg; ?> {
        background: transparent url("<?php echo WD_BWG_URL . '/images/blank.gif'; ?>") repeat scroll 0 0;
        bottom: 0;
        cursor: pointer;
        display: table;
        outline: medium none;
        position: absolute;
        height: inherit;
        width: 30%;
        left: 35%;
        z-index: 13;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel_play_pause_<?php echo $bwg; ?>:hover #bwg_carousel_play_pause-ico_<?php echo $bwg; ?> {
        display: inline-block !important;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel_play_pause_<?php echo $bwg; ?>:hover span {
        position: relative;
        z-index: 13;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel_play_pause_<?php echo $bwg; ?> span {
        display: table-cell;
        text-align: center;
        vertical-align: middle;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel_play_pause-ico_<?php echo $bwg; ?> {  
        display: none !important;
        color: #<?php echo $theme_row->carousel_rl_btn_color; ?>;        
        font-size: <?php echo $theme_row->carousel_play_pause_btn_size; ?>px;
        cursor: pointer;
        position: relative;
        z-index: 13;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> #bwg_carousel_play_pause-ico_<?php echo $bwg; ?>:hover {  
        color: #<?php echo $theme_row->carousel_close_rl_btn_hover_color; ?>;
        display: inline-block;
        position: relative;
        z-index: 13;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel_embed_<?php echo $bwg; ?> {
        padding: 0 !important;
        <?php
        if( $image_width > $image_height) {
         ?>
          margin-top: <?php echo ($image_height -$image_width) /2; ?>px;
        <?php
        }
        else {
         ?>
          margin-left: <?php echo ($image_width -$image_height) /2; ?>px;
          <?php
        }
        ?>
        float: none !important;
        width: 100%;
        height: 100%;
        vertical-align: middle;
        position:relative;
        display: table;
        background-color:#000000;
        text-align: center;
      }
      #bwg_container1_<?php echo $bwg; ?> #bwg_container2_<?php echo $bwg; ?> .bwg_carousel_embed_video_<?php echo $bwg; ?> {
       padding: 0 !important;
        margin: 0 !important;
       float: none !important;
        vertical-align: middle;
        position:relative;
        display:table-cell;
        background-color:#000000;
        text-align: center
      }
    </style>
     <script>
      var data_<?php echo $bwg; ?> = [];
      var event_stack_<?php echo $bwg; ?> = [];
      <?php
      foreach ($image_rows as $key => $image_row) {
        if ($image_row->id == $current_image_id) {
          $current_image_alt = $image_row->alt;
          $current_image_description = str_replace(array("\r\n", "\n", "\r"), esc_html('<br />'), $image_row->description);
        }
        ?>
        data_<?php echo $bwg; ?>["<?php echo $key; ?>"] = [];
        data_<?php echo $bwg; ?>["<?php echo $key; ?>"]["id"] = "<?php echo $image_row->id; ?>";
        data_<?php echo $bwg; ?>["<?php echo $key; ?>"]["alt"] = "<?php echo $image_row->alt; ?>";
        data_<?php echo $bwg; ?>["<?php echo $key; ?>"]["description"] = "<?php echo str_replace(array("\r\n", "\n", "\r"), esc_html('<br />'), $image_row->description); ?>";
        data_<?php echo $bwg; ?>["<?php echo $key; ?>"]["image_url"] = "<?php echo $image_row->image_url; ?>";
        data_<?php echo $bwg; ?>["<?php echo $key; ?>"]["thumb_url"] = "<?php echo $image_row->thumb_url; ?>";
        data_<?php echo $bwg; ?>["<?php echo $key; ?>"]["date"] = "<?php echo $image_row->date; ?>";
        data_<?php echo $bwg; ?>["<?php echo $key; ?>"]["is_embed"] = "<?php echo (preg_match('/EMBED/',$image_row->filetype)==1 ? true :false); ?>";
        data_<?php echo $bwg; ?>["<?php echo $key; ?>"]["is_embed_video"] = "<?php echo (((preg_match('/EMBED/',$image_row->filetype)==1) && (preg_match('/_VIDEO/',$image_row->filetype)==1)) ? true :false); ?>";
        data_<?php echo $bwg; ?>["<?php echo $key; ?>"]["is_embed_instagram_post"] = "<?php echo preg_match('/INSTAGRAM_POST/',$image_row->filetype)==1 ? true :false;; ?>"; 
        <?php
      }
      ?>    
    </script>
    <div id="bwg_container1_<?php echo $bwg; ?>">
      <div id="bwg_container2_<?php echo $bwg; ?>">
          <script type="text/javascript">
        var bwg_carousel_<?php echo $bwg; ?>;
        var isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
        var bwg_click = isMobile ? 'touchend' : 'click';
        var bwg_currentCenterNum<?php echo $bwg; ?> = 1;
        var bwg_currentlyMoving<?php echo $bwg; ?> = false;
      function bwg_carousel_params<?php echo $bwg; ?>() {
        var parent_width = jQuery("#bwg_container1_<?php echo $bwg; ?>").parent().width();      
        var larg_width;
        var par = 1;
        var orig_width = <?php echo $image_width; ?> ; 
        if(parent_width < <?php echo $carousel_r_width ?> ) {
          par = parent_width / <?php echo $carousel_r_width ?>;
        }
        <?php
        if( $carousel_image_par > 1){
          $carousel_image_par = 1;
        }
        if($carousel_image_column_number > count($image_rows)){
         $carousel_image_column_number = count($image_rows); 
        }
        ?>
        if(data_<?php echo $bwg; ?>["<?php echo $key; ?>"]["is_embed"]){
          if(<?php echo $image_width; ?> < <?php echo $image_height; ?> ){
            jQuery( ".bwg_carousel_embed_<?php echo $bwg; ?>").css({width: <?php echo $image_height; ?> });
          }
        }
        if(!<?php echo $carousel_play_pause_butt ?>) {
          jQuery( ".bwg_carousel_play_pause_<?php echo $bwg; ?>").css({display:'none' });
        }
        else {
          jQuery( ".bwg_carousel_play_pause_<?php echo $bwg; ?>").css({display:'' });
        }
        if(!<?php echo $carousel_prev_next_butt ?>) {
          jQuery( "#bwg_carousel-left<?php echo $bwg; ?>").css({display:'none' });
          jQuery( "#bwg_carousel-right<?php echo $bwg; ?>").css({display:'none' });
        }
        else {
          jQuery( "#bwg_carousel-right<?php echo $bwg; ?>").css({display:'' });
          jQuery( "#bwg_carousel-left<?php echo $bwg; ?>").css({display:'' });
        }
        if(data_<?php echo $bwg; ?>["<?php echo $key; ?>"]["is_embed_instagram_post"]){
          if (<?php echo $image_height; ?> < <?php echo $image_width; ?> + 88 ) {
             jQuery( ".bwg_embed_frame_<?php echo $bwg; ?>").css({width: (<?php echo $image_height; ?> * par - 88) });
          }
          else if (<?php echo $image_height; ?> == <?php echo $image_width; ?> + 88){
            jQuery( ".bwg_embed_frame_<?php echo $bwg; ?>").css({height: (<?php echo $image_width; ?> * par + 88) });
          }
          else {
            jQuery( ".bwg_embed_frame_<?php echo $bwg; ?>").css({height: (<?php echo $image_width; ?> * par + 88),width:<?php echo $image_width; ?> * par });
          }
        }
        jQuery( ".bwg_carousel_image_container_<?php echo $bwg; ?>").css({width: <?php echo $image_width; ?> * par,height:<?php echo $image_height; ?> * par });
       /* jQuery( ".bwg_carousel_title_text_<?php echo $bwg; ?>").css({width: <?php echo $image_width; ?> * par });*/
       jQuery(".bwg_carousel_watermark_text_<?php echo $bwg; ?>, .bwg_carousel_watermark_text_<?php echo $bwg; ?>:hover").css({fontSize: ((parent_width) * <?php echo $watermark_font_size / $image_width; ?> * par)});
        jQuery( ".bwg_carousel-image <?php echo $bwg; ?>").css({width: <?php echo $image_width; ?> * par,height:<?php echo $image_height; ?> * par });
        jQuery( ".bwg_carousel_watermark_container_<?php echo $bwg; ?>").css({width: <?php echo $image_width; ?> * par,height:<?php echo $image_height; ?> * par });
        jQuery( ".bwg_carousel_embed_video_<?php echo $bwg; ?>").css({width: <?php echo $image_width; ?> * par,height:<?php echo $image_height; ?> * par });
            
        jQuery( ".bwg_carousel_watermark_spun_<?php echo $bwg; ?>").css({width: <?php echo $image_width; ?> * par,height:<?php echo $image_height; ?> * par  });
        jQuery( ".bwg_carousel-container<?php echo $bwg; ?>").css({width:  parent_width ,height:<?php echo $image_height; ?> * par  });
        jQuery( ".bwg_video_hide<?php echo $bwg; ?>").css({width: <?php echo $image_width; ?> * par,height:<?php echo $image_height; ?> * par });
          bwg_carousel_<?php echo $bwg; ?> = jQuery("#bwg_carousel<?php echo $bwg; ?>").featureCarousel({
          containerWidth:       parent_width * par,
          containerHeight:      <?php echo $image_height; ?> * par,
          fit_containerWidth:   <?php echo $carousel_fit_containerWidth; ?>,
          largeFeatureWidth:    <?php echo $image_width; ?> * par,
          largeFeatureHeight:   <?php echo $image_height; ?> * par, 
          smallFeaturePar:      <?php echo  $carousel_image_par; ?>,
          currentlyMoving:      false,
          startingFeature:      bwg_currentCenterNum<?php echo $bwg; ?>,
          featuresArray:        [],          
          timeoutVar:           null,
          rotationsRemaining:   0,
          autoPlay:             <?php echo $car_inter * 1000; ?>,
          interval:             <?php echo $interval * 1000; ?>, 
          imagecount:           <?php echo $carousel_image_column_number; ?>,
          bwg_number:           <?php echo $bwg; ?>,
          enable_image_title:  <?php echo  $enable_image_title; ?>, 
          borderWidth:		      0,
        });
        
      }
       jQuery(document).ready(function() {
          jQuery("#spider_carousel_left-ico_<?php echo $bwg; ?>").click(function () {
            bwg_carousel_<?php echo $bwg; ?>.prev();
          });
         jQuery("#spider_carousel_right-ico_<?php echo $bwg; ?>").click(function () {
           bwg_carousel_<?php echo $bwg; ?>.next();           
         });
         if(<?php echo $carousel_enable_autoplay; ?>){
            jQuery(".bwg_carousel_play_pause_<?php echo $bwg; ?>").attr("title", "<?php echo __('Pause', 'bwg'); ?>");
            jQuery(".bwg_carousel_play_pause_<?php echo $bwg; ?>").attr("class", "bwg_ctrl_btn_<?php echo $bwg; ?> bwg_carousel_play_pause_<?php echo $bwg; ?> fa fa-pause");               
         }
        jQuery(".bwg_carousel_play_pause_<?php echo $bwg; ?>").on(bwg_click, function () {        
          if (jQuery(".bwg_ctrl_btn_<?php echo $bwg; ?>").hasClass("fa-play") ) {
            /*play*/
            jQuery(".bwg_carousel_play_pause_<?php echo $bwg; ?>").attr("title", "<?php echo __('Pause', 'bwg'); ?>");
            jQuery(".bwg_carousel_play_pause_<?php echo $bwg; ?>").attr("class", "bwg_ctrl_btn_<?php echo $bwg; ?> bwg_carousel_play_pause_<?php echo $bwg; ?> fa fa-pause");
              bwg_carousel_<?php echo $bwg; ?>.start();
          }
          else {
            /* Pause.*/           
            jQuery(".bwg_carousel_play_pause_<?php echo $bwg; ?>").attr("title", "<?php echo __('Play', 'bwg'); ?>");
            jQuery(".bwg_carousel_play_pause_<?php echo $bwg; ?>").attr("class", "bwg_ctrl_btn_<?php echo $bwg; ?> bwg_carousel_play_pause_<?php echo $bwg; ?> fa fa-play");
             bwg_carousel_<?php echo $bwg; ?>.pause();
          }
        });
         if (typeof jQuery().swiperight !== 'undefined') {
          if (jQuery.isFunction(jQuery().swiperight)) {
            jQuery('#bwg_container1_<?php echo $bwg; ?>').swiperight(function () {
              bwg_carousel<?php echo $bwg; ?>.prev();           
            });
          }
        }
        if (typeof jQuery().swipeleft !== 'undefined') {
          if (jQuery.isFunction(jQuery().swipeleft)) {
            jQuery('#bwg_container1_<?php echo $bwg; ?>').swipeleft(function () {
               bwg_carousel<?php echo $bwg; ?>.next();              
            });
          }
        }
       });
        jQuery(window).resize(function() {
          bwg_carousel_<?php echo $bwg; ?>.pause();            
          bwg_carousel_params<?php echo $bwg; ?>();
          bwg_carousel_watermark_<?php echo $bwg; ?>(); 
        if (!jQuery(".bwg_ctrl_btn_<?php echo $bwg; ?>").hasClass("fa-play")) {
          bwg_carousel_<?php echo $bwg; ?>.start();
        }
        });
        jQuery(window).load(function() {
           bwg_carousel_watermark_<?php echo $bwg; ?>();
          jQuery( "#bwg_container2_<?php echo $bwg; ?>").css({visibility:'visible '});
          bwg_carousel_params<?php echo $bwg; ?>();
        });  
		</script>
       <div class="bwg_carousel-container<?php echo $bwg; ?>">        
          <div id="bwg_carousel<?php echo $bwg; ?>">	  
            <?php               
              foreach ($image_rows as $key => $image_row) {
                $is_embed = preg_match('/EMBED/',$image_row->filetype)==1 ? true :false;
                $is_embed_video = ($is_embed && preg_match('/_VIDEO/',$image_row->filetype)==1) ? true :false;
                $is_embed_instagram_post = preg_match('/INSTAGRAM_POST/',$image_row->filetype)==1 ? true :false;
                  if ($image_row->id == $current_image_id) {
                    $current_key = $key;
                  }
                  if ($play_pause_button_display === 'undefined') {
                      if ($is_embed_instagram_post ) {
                        $play_pause_button_display = 'none';
                      }
                      else {
                        $play_pause_button_display = '';
                      }
                    }
                ?>
                <div class="bwg_carousel-feature<?php echo $bwg; ?>"onclick="bwg_carousel_<?php echo $bwg; ?>.shift(this);bwg_change_image_<?php echo $bwg; ?>(parseInt(jQuery('#bwg_current_image_key_<?php echo $bwg; ?>').val()), '<?php echo $key; ?>', data_<?php echo $bwg; ?>)" image_id="<?php echo $image_row->id; ?>" image_key="<?php echo $key; ?>" >
                 <?php
                  if ($watermark_type != 'none') {
                  ?>
                  <div class="bwg_carousel_image_container_<?php echo $bwg; ?>" style="position: absolute;">
                    <div class="bwg_carousel_watermark_container_<?php echo $bwg; ?>">
                      <div style="display:table; margin:0 auto;">
                        <span class="bwg_carousel_watermark_spun_<?php echo $bwg; ?>" id="bwg_carousel_watermark_container_<?php echo $bwg; ?>">
                          <?php
                          if ($watermark_type == 'image') {
                          ?>
                          <a href="<?php echo urldecode($watermark_link); ?>" target="_blank">
                            <img class="bwg_carousel_watermark_image_<?php echo $bwg; ?> bwg_carousel_watermark_<?php echo $bwg; ?>" src="<?php echo $watermark_url; ?>" />
                          </a>
                          <?php
                          }
                          elseif ($watermark_type == 'text') {
                          ?>
                          <a class="bwg_none_selectable_<?php echo $bwg; ?> bwg_carousel_watermark_text_<?php echo $bwg; ?> bwg_carousel_watermark_<?php echo $bwg; ?>" target="_blank" href="<?php echo urldecode($watermark_link); ?>"><?php echo $watermark_text; ?></a>
                          <?php
                          }
                          ?>
                          <span id="bwg_carousel_play_pause_<?php echo $bwg; ?>" style="display: <?php echo $play_pause_button_display; ?>;"><span><span id="bwg_carousel_play_pause-ico_<?php echo $bwg; ?>"><i class="bwg_ctrl_btn_<?php echo $bwg; ?> bwg_carousel_play_pause_<?php echo $bwg; ?> fa fa-play"></i></span></span></span>
                        </span>
                      </div>
                    </div>
                  </div> 
                  <?php
                  } 
                  ?> 
                  <?php 
                  if (!$is_embed) {
                  ?>
                    <div  style="<?php echo "background-image: url('" . addslashes(htmlspecialchars_decode (site_url() . '/' . $WD_BWG_UPLOAD_DIR . $image_row->image_url,ENT_QUOTES)) . "');"; ?>" class="bwg_carousel-image<?php echo $bwg; ?>" alt="<?php echo $image_row->alt; ?>"></div>
                  <?php 
                  } else { ?>
                    <span class="bwg_video_hide<?php echo $bwg; ?>"></span> 
                    <span class="<?php echo ($is_embed_video || $is_embed_instagram_post) ? "bwg_carousel_embed_video_". $bwg : "bwg_carousel_embed_". $bwg; ?>" >
                      <?php
                      if($is_embed_instagram_post){
                        $post_width = $image_width ;
                        $post_height = $image_height ;
                          if($post_height < $post_width +88 ){
                            $post_width = $post_height - 88; 
                          }
                          else{
                            $post_height =$post_width + 88; 
                           
                          }
                        
                        WDWLibraryEmbed::display_embed($image_row->filetype, $image_row->filename, array('class'=>"bwg_embed_frame_".$bwg, 'frameborder'=>"0", 'style'=>"width:".$post_width."px; height:".$post_height."px; vertical-align:middle; display:table; position:relative;margin: 0 auto"));
                      }
                      else {
                        WDWLibraryEmbed::display_embed($image_row->filetype, $image_row->filename, array('class'=>"bwg_embed_frame_".$bwg, 'frameborder'=>"0", 'allowfullscreen'=>"allowfullscreen", 'style'=>"width:100%; height:100%; vertical-align:middle;margin:0 auto;padding:0; display:table-cell;"));
                      }
                      ?>
                    </span>
                     
                  <?php
                  }
                  ?>
            <div class="bwg_carousel-caption<?php echo $bwg; ?>" >            
           <div class="bwg_carousel_title_text_<?php echo $bwg; ?>" style="<?php if (!$current_image_alt) echo 'display:none;'; ?>">
                    <?php
                    if($enable_image_title){
                      echo html_entity_decode($image_row->alt);
                    }
                    ?>
          </div>     
            </div>
           
        </div>
          
        <?php 
				}
				?>
      </div>
    	     <div id="bwg_carousel-left<?php echo $bwg; ?>">
             <span id="spider_carousel_left-ico_<?php echo $bwg; ?>"><span><i class="bwg_carousel_prev_btn_<?php echo $bwg; ?> fa <?php echo $theme_row->carousel_rl_btn_style; ?>-left"></i></span></span>  
           </div>  
		       <div id="bwg_carousel-right<?php echo $bwg; ?>">
            <span id="spider_carousel_right-ico_<?php echo $bwg; ?>"><span><i class="bwg_carousel_next_btn_<?php echo $bwg; ?> fa <?php echo $theme_row->carousel_rl_btn_style; ?>-right"></i></span></span>
           </div>
            
        </div>
      </div>
    </div>
            
   <script>
     
       function bwg_carousel_watermark_<?php echo $bwg; ?>() {
          var par = 1;
          var parent_width = jQuery("#bwg_container1_<?php echo $bwg; ?>").parent().width();
          if(parent_width < <?php echo $carousel_r_width ?> ) {
            par = parent_width / <?php echo $carousel_r_width ?>;
          }
         if (parent_width >= <?php echo $image_width; ?>) {
          /* Set watermark container size.*/
           bwg_change_watermark_container_<?php echo $bwg; ?>();    
           jQuery("#bwg_carousel_play_pause-ico_<?php echo $bwg; ?>").css({fontSize: (<?php echo $theme_row->carousel_play_pause_btn_size; ?>)});
           jQuery(".bwg_carousel_watermark_image_<?php echo $bwg; ?>").css({maxWidth: <?php echo $watermark_width; ?> * par, maxHeight: <?php echo $watermark_height; ?> * par});
           jQuery(".bwg_carousel_watermark_text_<?php echo $bwg; ?>, .bwg_carousel_watermark_text_<?php echo $bwg; ?>:hover").css({fontSize: par * (<?php echo $watermark_font_size; ?>)});
        
          } 
          else {
          /* Set watermark container size.*/
            var img_width = <?php echo $image_width; ?> / par;
            bwg_change_watermark_container_<?php echo $bwg; ?>();
            jQuery("#bwg_carousel_play_pause-ico_<?php echo $bwg; ?>").css({fontSize: ((parent_width) * (<?php echo $theme_row->carousel_play_pause_btn_size; ?>) / img_width )});
            jQuery(".bwg_carousel_watermark_image_<?php echo $bwg; ?>").css({maxWidth: ( (parent_width) * (<?php echo $watermark_width; ?>) / img_width), maxHeight: ((parent_width) * (<?php echo $watermark_height; ?>) / img_width)});
            jQuery(".bwg_carousel_watermark_text_<?php echo $bwg; ?>, .bwg_carousel_watermark_text_<?php echo $bwg; ?>:hover").css({fontSize:  ((parent_width) * (<?php echo $watermark_font_size; ?>) / img_width )});
          }
       }
         function bwg_change_image_<?php echo $bwg; ?>(current_key, key, data_<?php echo $bwg; ?>, from_effect) {
          if(data_<?php echo $bwg; ?>["<?php echo $key; ?>"]["is_embed_video"]){
          
          if(<?php echo $image_width; ?> > <?php echo $image_height; ?> ) {
          
          jQuery( ".bwg_carousel_embed_<?php echo $bwg; ?>").css({width: <?php echo $image_width; ?> * par,height:<?php echo $image_height; ?> * par }); 
          }
        }
      }
      function bwg_change_watermark_container_<?php echo $bwg; ?>() {
        jQuery(".bwg_carousel<?php echo $bwg; ?>").children().each(function() {
          if (jQuery(this).css("zIndex") == 2) {
            var bwg_current_image_span = jQuery(this).find("img");
            if (!bwg_current_image_span.length) {
              bwg_current_image_span = jQuery(this).find("iframe");
            }
            var width = bwg_current_image_span.width();
            var height = bwg_current_image_span.height();
            jQuery(".bwg_carousel_watermark_spun_<?php echo $bwg; ?>").width(width);
            jQuery(".bwg_carousel_watermark_spun_<?php echo $bwg; ?>").height(height);
            jQuery(".bwg_carousel_title_spun_<?php echo $bwg; ?>").width(width);
            jQuery(".bwg_carouel_title_spun_<?php echo $bwg; ?>").height(height);            
            jQuery(".bwg_carousel_watermark_<?php echo $bwg; ?>").css({display: 'none'});
          }
        });
      }
     
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