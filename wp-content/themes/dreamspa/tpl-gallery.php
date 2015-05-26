<?php /*Template Name: Gallery Template*/?>
<?php get_header();

	$tpl_default_settings = get_post_meta( $post->ID, '_tpl_default_settings', TRUE );
	$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();

	$page_layout  = array_key_exists( "layout", $tpl_default_settings ) ? $tpl_default_settings['layout'] : "content-full-width";
	$show_sidebar = $show_left_sidebar = $show_right_sidebar =  false;
	$sidebar_class = "";

	switch ( $page_layout ) {
		case 'with-left-sidebar':
			$page_layout = "page-with-sidebar with-left-sidebar";
			$show_sidebar = $show_left_sidebar = true;
			$sidebar_class = "secondary-has-left-sidebar";
		break;

		case 'with-right-sidebar':
			$page_layout = "page-with-sidebar with-right-sidebar";
			$show_sidebar = $show_right_sidebar	= true;
			$sidebar_class = "secondary-has-right-sidebar";
		break;

		case 'content-full-width':
		default:
			$page_layout = "content-full-width";
		break;
	}

	if ( $show_sidebar ):
		if ( $show_left_sidebar ): ?>
			<!-- Secondary Left -->
			<section id="secondary-left" class="secondary-sidebar <?php echo $sidebar_class;?>"><?php get_sidebar( );?></section><?php
		endif;
	endif;?>

	<!-- ** Primary Section ** -->
	<section id="primary" class="<?php echo $page_layout;?>"><?php
		if( have_posts() ):
			while( have_posts() ):
				the_post();
				get_template_part( 'framework/loops/content', 'page' );
			endwhile;
		endif;?>

		<div class="dt-sc-clear"></div>
		<!-- Start loop to show Gallery Items -->
		<?php $allow_space  =  array_key_exists("grid_space",$tpl_default_settings) ? " with-space " : " no-space ";
			$post_layout	=	isset( $tpl_default_settings['gallery-post-layout'] ) ? $tpl_default_settings['gallery-post-layout'] : "one-half-column";
			$post_per_page	=	$tpl_default_settings['gallery-post-per-page'];
			$image_size = "";
			
			#TO SET POST LAYOUT
			switch($post_layout):

					case 'one-column':
						$post_class = $show_sidebar ? "dt-gallery column dt-sc-one-column with-sidebar" : "dt-gallery column dt-sc-one-column ";
						$image_size = $show_sidebar ? "dt-default-1-column-with-sidebar" : "dt-default-1-column";
						$columns = 1;
					break;

					case 'one-half-column';
						$post_class = $show_sidebar ? "dt-gallery column dt-sc-one-half with-sidebar " : "dt-gallery column dt-sc-one-half ";
						$image_size = $show_sidebar ?  "dt-default" : "dt-default-2-columns";
						$columns = 2;
					break;
					
					case 'one-third-column':
						$post_class = $show_sidebar ? "dt-gallery column dt-sc-one-third with-sidebar " : "dt-gallery column dt-sc-one-third ";
						$image_size = "dt-default";
						$columns = 3;
					break;

					case 'one-fourth-column':
						$post_class = $show_sidebar ? "dt-gallery column dt-sc-one-fourth with-sidebar " : "dt-gallery column dt-sc-one-fourth";
						$image_size = "dt-default";
						$columns = 4;
					break;
			endswitch;

			$categories =	isset($tpl_default_settings['gallery-categories']) ? array_filter($tpl_default_settings['gallery-categories']) : "";
			if(empty($categories)):
				$categories = get_categories('taxonomy=dt_gallery_entries&hide_empty=1');
			else:
				$args = array('taxonomy'=>'dt_gallery_entries','hide_empty'=>1,'include'=>$categories);
				$categories = get_categories($args);
			endif;

			if( sizeof($categories) > 1 ) :
				if( array_key_exists("filter",$tpl_default_settings) && (!empty($categories)) ):
					$post_class .= " all-sort ";?>
						<div class="dt-sc-sorting-container">
							<a href="#" class="active-sort" title="" data-filter=".all-sort"><?php _e('All','dt_themes');?></a><?php 
								foreach( $categories as $category ): ?>
									<a href='#' data-filter=".<?php echo $category->category_nicename;?>-sort"><?php echo $category->cat_name;?></a><?php
								endforeach;?>	
						</div><?php
				endif;
			endif;

			#Pagination
			if ( get_query_var('paged') ) { 
				$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) {
				$paged = get_query_var('page');
			} else { 
				$paged = 1;
			}?>
			<!-- Gallery Items Container Start-->
			<div class="dt-sc-gallery-container gallery <?php echo $allow_space;?>"><?php
				$args = array();
				$categories = array_filter($tpl_default_settings['gallery-categories']);

				if(is_array($categories) && !empty($categories)):
					$terms = $categories;
					$args = array( 
						'orderby' => 'ID',
						'order' => 'ASC',
						'paged' => $paged,
						'posts_per_page' => $post_per_page,
						'tax_query' => array( array( 'taxonomy'=>'dt_gallery_entries', 'field'=>'id', 'operator'=>'IN', 'terms'=>$terms ) ) );
				else:
					$args = array( 'paged' => $paged ,'posts_per_page' => $post_per_page,'post_type' => 'dt_galleries');
				endif;

				query_posts($args);
				if( have_posts() ):
					$i = 1;
					while( have_posts() ):
						the_post();

						$the_id = get_the_ID();

						$temp_class = "";
						if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
						if($i == $columns) $i = 1; else $i = $i + 1;

                        $sort = " ";
                        if( array_key_exists("filter",$tpl_default_settings) ):
                        	$item_categories = get_the_terms( $the_id, 'dt_gallery_entries' );
                        	if(is_object($item_categories) || is_array($item_categories)):
                        		foreach ($item_categories as $category):
                        			$sort .= $category->slug.'-sort ';
                        		endforeach;
                            endif;
                         endif;						

						$gallery_item_meta = get_post_meta($the_id,'_gallery_settings',TRUE);
						$gallery_item_meta = is_array($gallery_item_meta) ? $gallery_item_meta  : array();
						$items_id_exists = array_key_exists('items_id',$gallery_item_meta) ? true : false;?>
						<div id="<?php echo "dt_galleries-{$the_id}";?>" class="<?php echo $temp_class.$sort.$allow_space;?>">
							<figure><?php
								$popup = "http://placehold.it/1060x795&text=DesignThemes";

								if( array_key_exists('items_name', $gallery_item_meta) ) {
									$item =  $gallery_item_meta['items_name'][0];
                        			$popup = $gallery_item_meta['items'][0];

                        			if( "video" === $item ) {
                        				$items = array_diff( $gallery_item_meta['items_name'] , array("video") );
                        				if( !empty($items) ) {
											if( $items_id_exists ) {
												$id = $gallery_item_meta['items_id'][key($items)];
												$img = wp_get_attachment_image_src($id,$image_size);
												echo "<img src='".$img[0]."' width='".$img[1]."' height='".$img[2]."' alt='' />";
											} else {
												echo "<img src='".$gallery_item_meta['items'][key($items)]."' width='1060' height='795' alt='' />";
											}
                        				} else {
                        					echo '<img src="http://placehold.it/1060x795&text=DesignThemes" width="1060" height="795" alt="">';
                        				}
                        			} else {
										if( $items_id_exists ) {
											$id = $gallery_item_meta['items_id'][0];
											$img = wp_get_attachment_image_src($id,$image_size);
											echo "<img src='".$img[0]."' width='".$img[1]."' height='".$img[2]."' alt=''/>";
										} else {
											echo "<img src='".$gallery_item_meta['items'][0]."' width='1060' height='795' alt=''/>";
										}
                        			}
                        		} else {
                        			echo "<img src='{$popup}'/>";
                        		}?>
                        		<div class="image-overlay">
                        			<div class="image-overlay-details">
                        				<h5><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h5>
                        				<div class="links">
                                            <a href="<?php echo $popup;?>" data-gal="prettyPhoto[gallery]" title=""> <span class="fa fa-search-plus"> </span> </a>
                                            <a href="<?php the_permalink();?>" title=""> <span class="fa fa-external-link"> </span> </a><?php
                                            if(dttheme_is_plugin_active('roses-like-this/likethis.php')): ?>
                                            	<div class="views">
                                            		<span class="fa fa-heart"> </span> <?php printLikes($post->ID);?>
                                            	</div><?php 
                                            endif;?>	
                        				</div>
                        			</div>
                        			<a href="#" class="close-overlay hidden"> x </a>
                        		</div>
							</figure><?php
								# Show Details
								if( $allow_space == " with-space " ):?>
									<div class="dt-gallery-details">
										<div class="dt-gallery-details-inner">
											<h5><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h5>
											<?php if( array_key_exists("sub-title",$gallery_item_meta) ):?>
													<h6><?php echo $gallery_item_meta["sub-title"];?></h6>
											<?php endif;?>
										</div>
									</div><?php
								endif;
								#Show Details End?>
						</div><?php
					endwhile;
				endif;?>
			</div><!-- Gallery Items Container End-->
			<!-- End loop to show Gallery Items -->

			<div class="pagination">
				<div class="prev-post"><?php previous_posts_link(__('Prev','dt_themes'));?></div>
				<?php echo dttheme_pagination();?>
				<div class="next-post"><?php next_posts_link( __('Next','dt_themes') );?></div>
			</div>
	</section><!-- ** Primary Section End ** --><?php

	if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo $sidebar_class;?>"><?php get_sidebar( );?></section><?php
		endif;
	endif;?>
<?php get_footer(); ?>