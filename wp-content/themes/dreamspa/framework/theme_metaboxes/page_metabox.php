<?php add_action("admin_init", "page_metabox");?>
<?php function page_metabox(){
		//add_meta_box("page-template-slider-meta-container", __('Header Image','dt_themes'), "page_sllider_settings", "page", "normal", "default");	
		add_meta_box("page-template-meta-container", __('Default page Options','dt_themes'), "page_settings", "page", "normal", "default");
		add_action('save_post','page_meta_save');
	}
	
	#Page Meta Box	
	function page_settings($args){
		 
		global $post; 
		$tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
		$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();?>
        
        <div class="j-pagetemplate-container">
        	<div id="tpl-common-settings">

            	<!-- 1. Layout -->
                <div id="page-layout" class="custom-box">
                	<div class="column one-sixth"><label><?php _e('Layout','dt_themes');?> </label></div>
                    <div class="column five-sixth last">
                    	<ul class="bpanel-layout-set"><?php 
							$homepage_layout = array(
                                'content-full-width'=>'without-sidebar',
                                'with-right-sidebar'=>'right-sidebar');
                            
                            	$v =  array_key_exists("layout",$tpl_default_settings) ?  $tpl_default_settings['layout'] : 'content-full-width';
							
							foreach($homepage_layout as $key => $value):
								$class = ($key == $v) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
							endforeach;?></ul>
						 <?php $v = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : 'content-full-width';
                            $cs = ( $v == "content-full-width") ? "style='display:none;'":"";?>
                         <input id="mytheme-page-layout" name="layout" type="hidden"  value="<?php echo $v;?>"/>
                         <p class="note"> <?php _e("You can choose between a right or no sidebar layout.",'dt_themes');?> </p>
                    </div>
                </div> <!-- Layout End-->


            </div><!-- .tpl-common-settings end -->
                         
             <!-- Gallery Template Settings -->
            <div id="tpl-gallery">
             	<!-- Post Playout -->
                <div class="custom-box">
                    <div class="column one-sixth">                 
                        <label><?php _e('Posts Layout','dt_themes');?> </label>
                    </div>
                    <div class="column five-sixth last">       
                        <ul class="bpanel-post-layout bpanel-layout-set">
                        <?php $posts_layout = array( 
                                'one-column'=>  __("Single post per row.",'dt_themes'),
								'one-half-column'=>	__("Two posts per row.",'dt_themes'),
								'one-third-column'=>	__("Three posts per row.",'dt_themes'),
								'one-fourth-column' => __("Four Posts per row",'dt_themes'));
                                $v = array_key_exists("gallery-post-layout",$tpl_default_settings) ?  $tpl_default_settings['gallery-post-layout'] : 'one-half-column';
                                foreach($posts_layout as $key => $value):
                                    $class = ($key == $v) ? " class='selected' " : "";
                                    echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
                                endforeach;?>
                        </ul>
                        <input id="mytheme-gallery-post-layout" name="mytheme-gallery-post-layout" type="hidden" value="<?php echo $v;?>"/>
                        <p class="note"> <?php _e("Choose layout style for your gallery",'dt_themes');?> </p>
                    </div>      
                </div><!-- Post Playout End-->

                <!-- Grid Space -->
                <div class="custom-box">
                    <div class="column one-sixth">                
                        <label><?php _e('Allow Grid Space','dt_themes');?></label>
                    </div>
                    <div class="column five-sixth last">                       
                        <?php $switchclass = array_key_exists("grid_space",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                              $checked = array_key_exists("grid_space",$tpl_default_settings) ? ' checked="checked"' : '';?>
                        <div data-for="mytheme-gallery-grid_space" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input id="mytheme-gallery-grid_space" class="hidden" type="checkbox" name="mytheme-gallery-grid_space" value="true"  <?php echo $checked;?>/>
                        <p class="note"> <?php _e('Allow Grid Space for gallery items','dt_themes');?> </p>
                    </div>
                </div><!-- Grid Space End -->                

                <!-- Post Count-->
                <div class="custom-box">
                    <div class="column one-sixth">                 
                        <label><?php _e('Post per page','dt_themes');?></label>
                    </div>
                    <div class="column five-sixth last">   
                        <select name="mytheme-gallery-post-per-page">
                            <option value="-1"><?php _e("All",'dt_themes');?></option>
                            <?php $selected = 	array_key_exists("gallery-post-per-page",$tpl_default_settings) ?  $tpl_default_settings['gallery-post-per-page'] : ''; ?>
                            <?php for($i=1;$i<=30;$i++):
                                echo "<option value='{$i}'".selected($selected,$i,false).">{$i}</option>";
                                endfor;?>
                        </select>
                        <p class="note"> <?php _e("Your gallery pages show at most selected number of posts per page.",'dt_themes');?> </p>
                    </div>
                </div><!-- Post Count End-->

                <div class="custom-box">
                    <div class="column one-sixth">                
	                    <label><?php _e('Allow Filters','dt_themes');?></label>
                    </div>
                    <div class="column five-sixth last">                       
						<?php $switchclass = array_key_exists("filter",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                              $checked = array_key_exists("filter",$tpl_default_settings) ? ' checked="checked"' : '';?>
                        <div data-for="mytheme-gallery-filter" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input id="mytheme-gallery-filter" class="hidden" type="checkbox" name="mytheme-gallery-filter" value="true"  <?php echo $checked;?>/>
                        <p class="note"> <?php _e('Allow filter options for gallery items','dt_themes');?> </p>
                    </div>
                </div>
                
                <!-- Categories -->
                <div class="custom-box">
                	<h3><?php _e('Choose Categories','dt_themes');?></h3>
                    <?php if(array_key_exists("gallery-categories",$tpl_default_settings)):
							 $exclude_cats = array_unique($tpl_default_settings["gallery-categories"]);
							 foreach($exclude_cats as $cats):
								echo "<!-- Category Drop Down Container -->
									  <div class='multidropdown'>";
								echo  dttheme_gallery_categorylist("gallery,cats",$cats,"multidropdown");
								echo "</div><!-- Category Drop Down Container end-->";		
							 endforeach;
						  else:
							echo "<!-- Category Drop Down Container -->";
							echo "<div class='multidropdown'>";
							echo  dttheme_gallery_categorylist("gallery,cats","","multidropdown");
							echo "</div><!-- Category Drop Down Container end-->";
						   endif;?>
                    <p class="note"> <?php _e("You can choose only certain categories to show in gallery items. ",'dt_themes');?> </p>
                </div><!-- Categories End-->
            </div><!-- Portfolio Template Settings End-->
        </div><?php
        wp_reset_postdata();
    } 
   
	function page_meta_save($post_id){
		global $pagenow;
		if ( 'post.php' != $pagenow ) return $post_id;
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 	return $post_id;
		
			$settings = array();
			$settings['layout'] = ( $_POST["page_template"]  === 'tpl-fullwidth.php' ) ? "" : $_POST['layout'];
			$settings['disable-everywhere-sidebar'] = $_POST['disable-everywhere-sidebar'];
            $settings['widget-area'] =  array_unique(array_filter($_POST['mytheme']['widgetareas']));

            $settings['sub-title'] = $_POST['sub-title'];
			
			if(isset($_POST["page_template"]) && ( 'default' == $_POST["page_template"]) || 'tpl-startseite.php' == $_POST["page_template"]
				 || 'tpl-fullwidth.php' == $_POST["page_template"] || 'tpl-reservation.php' == $_POST['page_template'] ) :
				$settings['show_slider'] =  $_POST['mytheme-show-slider'];
				$settings['slider_type'] = $_POST['mytheme-slider-type'];
				$settings['comment'] = $_POST['mytheme-page-comment'];
                $settings['slider-image'] = $_POST['slider-image'];
                $settings['image-claim'] = $_POST['image-claim'];
                $settings['image-claim-author'] = $_POST['image-claim-author'];
                
			
			elseif( "tpl-blog.php" == $_POST['page_template'] ):
				$settings['blog-post-layout'] = $_POST['mytheme-blog-post-layout'];
				$settings['blog-post-per-page'] = $_POST['mytheme-blog-post-per-page'];
				$settings['blog-post-excerpt'] = $_POST['mytheme-blog-post-excerpt'];
				$settings['blog-post-excerpt-length'] = $_POST['mytheme-blog-post-excerpt-length'];
				$settings['blog-post-exclude-categories'] = $_POST['mytheme']['blog']['exclude_cats'];
				$settings['disable-date-info'] = $_POST['mytheme-blog-disable-date-info'];
				$settings['disable-author-info'] = $_POST['mytheme-blog-disable-author-info'];
				$settings['disable-comment-info'] = $_POST['mytheme-blog-disable-comment-info'];
				$settings['disable-category-info'] = $_POST['mytheme-blog-disable-category-info'];
				$settings['disable-tag-info'] = $_POST['mytheme-blog-disable-tag-info'];
			
			elseif( "tpl-gallery.php" == $_POST['page_template'] ):
				$settings['gallery-post-layout'] = $_POST['mytheme-gallery-post-layout'];
				$settings['gallery-post-per-page'] = $_POST['mytheme-gallery-post-per-page'];
				$settings['filter'] = $_POST['mytheme-gallery-filter'];
                $settings['grid_space'] = $_POST['mytheme-gallery-grid_space'];   
                $settings['gallery-categories'] = $_POST['mytheme']['gallery']['cats'];
            endif;
		
		update_post_meta($post_id, "_tpl_default_settings", array_filter($settings));
		
	}?>