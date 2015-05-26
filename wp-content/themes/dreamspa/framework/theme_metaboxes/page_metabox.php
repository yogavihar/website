<?php add_action("admin_init", "page_metabox");?>
<?php function page_metabox(){
		add_meta_box("page-template-slider-meta-container", __('Header Image','dt_themes'), "page_sllider_settings", "page", "normal", "default");	
		add_meta_box("page-template-meta-container", __('Default page Options','dt_themes'), "page_settings", "page", "normal", "default");
		add_action('save_post','page_meta_save');
	}

	#Slider Meta Box
	function page_sllider_settings($args){	
		global $post; 
		$tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
		$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();?>

		<!-- Show Slider -->        
        <div class="custom-box">
        	<div class="column one-sixth">
                <label><?php _e('Show Header Image','dt_themes');?> </label>
            </div>
            <div class="column four-sixth last">
				<?php $switchclass = array_key_exists("show_slider",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                      $checked = array_key_exists("show_slider",$tpl_default_settings) ? ' checked="checked"' : '';?>
                <div data-for="mytheme-show-slider" class="checkbox-switch <?php echo $switchclass;?>"></div>
                <input id="mytheme-show-slider" class="hidden" type="checkbox" name="mytheme-show-slider" value="true"  <?php echo $checked;?>/>
                <p class="note"> <?php _e('YES! to show Header Image on this page.','dt_themes');?> </p>
            </div>
        </div><!-- Show Slider End-->

        <!-- Slider Types -->
         <input type="hidden" name="mytheme-slider-type" value="imageonly">
	            <?php /*$slider_types = array( 'imageonly' => __( "Image Only", "dt_themes") );
											 
	 				  $v =  array_key_exists("slider_type",$tpl_default_settings) ?  $tpl_default_settings['slider_type'] : '';
					  
					  echo "<select class='slider-type' name='mytheme-slider-type'>";
					  foreach($slider_types as $key => $value):
					  	$rs = selected($key,$v,false);
						echo "<option value='{$key}' {$rs}>{$value}</option>";
					  endforeach;
	 				 echo "</select>";*/?>
              
        <!-- slider-container starts-->
    	<div id="slider-conainer"><?php 
            $imageonly = 'style="display:none"';
			 if(isset($tpl_default_settings['slider_type'])&& $tpl_default_settings['slider_type'] == "imageonly"):
                $imageonly = 'style="display:block"';
			  endif;?>
             

            <!-- Image Only -->
            <div id="imageonly" class="custom-box" <?php echo $imageonly;?>>
                <div class="custom-box">
                    <div class="column one-sixth"><?php _e( 'Choose Image','dt_themes');?></div>
                    <div class="column five-sixth last">
                        <div class="image-preview-container">
                            <?php $slider_image = array_key_exists ( "slider-image", $tpl_default_settings ) ? $tpl_default_settings ['slider-image'] : '';?>
                            <input name="slider-image" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo $slider_image;?>"/>
                            <input type="button" value="<?php _e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                            <input type="button" value="<?php _e('Remove','dt_themes');?>" class="upload_image_reset" />
                        </div>

                    </div>
                </div>
                                        <?php
                        if(!empty($slider_image)){
                        echo "<img style='max-width:100%;' src='".$slider_image."'>";
                            
                        }
                        ?>
            </div>
            <!-- Claim -->
            <div id="claim" class="custom-box">
                <div class="custom-box">
                    <div class="column one-sixth"><?php _e( 'Choose a Quote','dt_themes');?></div>
                    <div class="column five-sixth last">
                        <div class="">
                           <textarea class="large" id="" name="image-claim" cols="8" rows="4"><?php echo stripslashes($tpl_default_settings ['image-claim']);?></textarea>

                        </div>

                    </div>
                </div>
            </div>
            <!-- Claim -->
            <div id="claim-author" class="custom-box">
                <div class="custom-box">
                    <div class="column one-sixth"><?php _e( 'Author of Quote','dt_themes');?></div>
                    <div class="column five-sixth last">
                        <div class="">
                            <textarea class="large" id="" name="image-claim-author" cols="8" rows="1"><?php echo stripslashes($tpl_default_settings ['image-claim-author']);?></textarea>

                        </div>

                    </div>
                </div>
            </div>

        </div><!-- slier-container ends--><?php

        wp_reset_postdata();
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

                <div id="widget-area-options" <?php echo $cs;?>>
                    <!-- 2. Every Where Sidebar Start -->
                    <div id="page-commom-sidebar" class="sidebar-section custom-box" >
                     	<div class="column one-sixth"><label><?php _e('Disable Every Where Sidebar','dt_themes');?></label></div>
                        <div class="column five-sixth last"><?php 
    						$switchclass = array_key_exists("disable-everywhere-sidebar",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
    						$checked = array_key_exists("disable-everywhere-sidebar",$tpl_default_settings) ? ' checked="checked"' : '';?>
                            
                            <div data-for="mytheme-disable-everywhere-sidebar" class="checkbox-switch <?php echo $switchclass;?>"></div>
                            <input id="mytheme-disable-everywhere-sidebar" class="hidden" type="checkbox" name="disable-everywhere-sidebar" value="true"  <?php echo $checked;?>/>
                            <p class="note"> <?php _e('Yes! to hide "Every Where Sidebar" on this page.','dt_themes');?> </p>
                         </div>
                    </div><!-- Every Where Sidebar End-->
                    
                    <!-- 3. Choose Widget Areas Start -->
                    <div id="page-sidebars" class="sidebar-section custom-box">
                        <div class="column one-sixth"><label><?php _e('Choose Widget Area','dt_themes');?></label></div>
                        <div class="column five-sixth last"><?php
                            if( array_key_exists('widget-area', $tpl_default_settings)):
                                $widgetareas =  array_unique($tpl_default_settings["widget-area"]);
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
                            endif;?>
                        </div>
                    </div><!-- Choose Widget Areas End -->
                </div>

            </div><!-- .tpl-common-settings end -->
             
            <!-- Blog Template Settings -->
            <div id="tpl-blog">
            
             	<!-- Post Playout -->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Posts Layout','dt_themes');?> </label></div>
                    
                    <div class="column five-sixth last">
                    	<ul class="bpanel-post-layout bpanel-layout-set"><?php 
							$posts_layout = array(	
                                'one-column'=>	__("Single post per row.",'dt_themes'),
                                'one-half-column'=>	__("Two posts per row.",'dt_themes'));

                                $v = array_key_exists("blog-post-layout",$tpl_default_settings) ?  $tpl_default_settings['blog-post-layout'] : 'one-column';

                                foreach($posts_layout as $key => $value):
								$class = ($key == $v) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
							endforeach;?></ul>
                            
                        <input id="mytheme-blog-post-layout" name="mytheme-blog-post-layout" type="hidden" value="<?php echo $v;?>"/>
                        <p class="note"> <?php _e("Choose layout style for your Blog",'dt_themes');?> </p>
                    </div>
                </div><!-- Post Playout End-->

				<!-- Allow Excerpt -->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Allow Excerpt','dt_themes');?></label></div>
                    <div class="column five-sixth last">                     
						<?php $switchclass = array_key_exists("blog-post-excerpt",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                              $checked = array_key_exists("blog-post-excerpt",$tpl_default_settings) ? ' checked="checked"' : '';?>
                        <div data-for="mytheme-blog-post-excerpt" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input id="mytheme-blog-post-excerpt" class="hidden" type="checkbox" name="mytheme-blog-post-excerpt" value="true"  <?php echo $checked;?>/>
                        <p class="note"> <?php _e('Enable Excerpt','dt_themes');?> </p>
                    </div>
                </div><!-- Allow Excerpt End-->

                <!-- Excerpt Length-->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Excerpt Length','dt_themes');?></label></div>
                    <div class="column five-sixth last">
                    	<?php $v = array_key_exists("blog-post-excerpt-length",$tpl_default_settings) ?  $tpl_default_settings['blog-post-excerpt-length'] : '45';?>
                        <input id="mytheme-blog-post-excerpt-length" name="mytheme-blog-post-excerpt-length" type="text" value="<?php echo $v;?>" />
                        <p class="note"> <?php _e("Limit! Number of charectors from the content to appear on each blog post (Number Only)",'dt_themes');?> </p>
                    </div>
                </div><!-- Excerpt Length End-->

                <!-- Post Count-->
                <div class="custom-box">
                    <div class="column one-sixth"><label><?php _e('Post per page','dt_themes');?></label></div>
                    <div class="column five-sixth last">
                        <select name="mytheme-blog-post-per-page">
                            <option value="-1"><?php _e("All",'dt_themes');?></option>
                            <?php $selected = 	array_key_exists("blog-post-per-page",$tpl_default_settings) ?  $tpl_default_settings['blog-post-per-page'] : ''; ?>
                            <?php for($i=1;$i<=30;$i++):
                                echo "<option value='{$i}'".selected($selected,$i,false).">{$i}</option>";
                                endfor;?>
                        </select>
                        <p class="note"><?php _e("Your blog pages show at most selected number of posts per page.",'dt_themes');?></p>
                    </div>
                </div><!-- Post Count End-->
                
                <!-- Post Meta-->
                <div class="custom-box">
	                <h3><?php _e('Post Meta Options','dt_themes');?></h3>
                	<?php $post_meta = array(array(
								"id"=>		"disable-author-info",
								"label"=>	__("Disable the Author info.",'dt_themes'),
								"tooltip"=>	__("By default the author info will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							), array(
								"id"=>		"disable-date-info",
								"label"=>	__("Disable the date info.",'dt_themes'),
								"tooltip"=>	__("By default the date info will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							),
							array(
								"id"=>		"disable-comment-info",
								"label"=>	__("Disable the comment",'dt_themes'),
								"tooltip"=>	__("By default the comment will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							),
							array(
								"id"=>		"disable-category-info",
								"label"=>	__("Disable the category",'dt_themes'),
								"tooltip"=>	__("By default the category will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							),
							array(
								"id"=>		"disable-tag-info",
								"label"=>	__("Disable the tag",'dt_themes'),
								"tooltip"=>	__("By default the tag will display when viewing your posts. You can choose to disable it here.",'dt_themes')
							));
						$count = 1;
						foreach($post_meta as $p_meta):
							$last = ($count%3 == 0)?"last":'';
							$id = 		$p_meta['id'];
							$label =	$p_meta['label'];
							$tooltip =  $p_meta['tooltip'];
							$v =  array_key_exists($id,$tpl_default_settings) ?  $tpl_default_settings[$id] : '';
							$rs =		checked($id,$v,false);
						 	$switchclass = ($v<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';
							
							echo "<div class='one-third-content {$last}'>";
							echo '<div class="bpanel-option-set">';
							echo "<label>{$label}</label>";							
							echo "<div data-for='{$id}' class='checkbox-switch {$switchclass}'></div>";
							echo "<input class='hidden' id='{$id}' type='checkbox' name='mytheme-blog-{$id}' value='{$id}' {$rs} />";
							echo '<p class="note">';
							echo ($tooltip);
							echo '</p>';
							echo '</div>';
							echo '</div>';
							
						$count++;	
						endforeach;?>
                </div><!-- Post Meta End-->
                
                <!-- Categories -->
                <div class="custom-box">
                	<h3><?php _e('Exclude Categories','dt_themes');?></h3>
                    <?php if(array_key_exists("blog-post-exclude-categories",$tpl_default_settings)):
							 $exclude_cats = array_unique($tpl_default_settings["blog-post-exclude-categories"]);
							 foreach($exclude_cats as $cats):
								echo "<!-- Category Drop Down Container -->
									  <div class='multidropdown'>";
								echo  dttheme_categorylist("blog,exclude_cats",$cats,"multidropdown");
								echo "</div><!-- Category Drop Down Container end-->";		
							 endforeach;
						  else:
							echo "<!-- Category Drop Down Container -->";
							echo "<div class='multidropdown'>";
							echo  dttheme_categorylist("blog,exclude_cats","","multidropdown");
							echo "</div><!-- Category Drop Down Container end-->";
						   endif;?>
                    <p class="note"> <?php _e("You can choose certain categories to exclude from your blog page.",'dt_themes');?> </p>
                </div><!-- Categories End-->
            </div><!-- Blog Template Settings End-->
            
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