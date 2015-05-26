<?php get_header();
	$gallery_settings = get_post_meta( $post->ID, '_gallery_settings', TRUE );
	$gallery_settings = is_array( $gallery_settings) ? $gallery_settings : array();

	$page_layout = isset( $gallery_settings['layout']) ? $gallery_settings['layout'] : 'content-full-width';
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
			<section id="primary" class="<?php echo $page_layout;?>"><?php
				if( have_posts() ):
					while( have_posts() ):
						the_post();
						get_template_part( 'framework/loops/content', 'gallery' );	
					endwhile;
				endif;?>
				<div class="dt-sc-hr-invisible"> </div>

				<!-- Recent Gallery Items -->
				<?php if(array_key_exists("show-related-items",$gallery_settings)): ?>
						<div class="dt-sc-hr"> </div>

						<div class="related-dt-gallery">
							<h2><?php _e('RECENT GALLERY','dt_themes');?></h2><?php

								$category_ids = array();
								$input  = wp_get_object_terms( $post->ID, 'dt_gallery_entries');

								foreach($input as $category) { 
									$category_ids[] = $category->term_id;
								}

								$args = array(	'orderby' => 'rand',
									'showposts' => '-1' ,
									'post__not_in' => array($post->ID),
									'tax_query' => array( array( 'taxonomy'=>'dt_gallery_entries', 'field'=>'id', 'operator'=>'IN', 'terms'=>$category_ids ))
								);

								$count = 0;

								query_posts($args);
								if( have_posts() ):
									echo '<div class="dt-gallery-carousel-wrapper gallery">';
									echo '<ul class="dt-sc-gallery-carousel">';
									while( have_posts() ):
										the_post();
										$the_id = get_the_ID();
										$count++;

										$gallery_item_meta = get_post_meta( $the_id, '_gallery_settings', TRUE );
										$gallery_item_meta = is_array( $gallery_item_meta) ? $gallery_item_meta : array();

										echo '<li class="dt-gallery dt-sc-one-third">';
										echo '<figure>';

											$popup = "http://placehold.it/1060x795&text=DesignThemes";
											if( array_key_exists('items_name', $gallery_item_meta) ) {
												$item =  $gallery_item_meta['items_name'][0];
												$popup = $gallery_item_meta['items'][0];

												if( "video" === $item ) {
														$items = array_diff( $gallery_item_meta['items_name'] , array("video") );

														if( !empty($items) ) {
															echo "<img src='".$gallery_item_meta['items'][key($items)]."' width='1060' height='795' alt='' />";	
														} else {
															echo '<img src="http://placehold.it/1060x795&text=DesignThemes" width="1060" height="795" alt="">';
														}
												} else {
													echo "<img src='".$gallery_item_meta['items'][0]."' width='1060' height='795' alt=''/>";
												}
											} else {
												echo "<img src='{$popup}'/>";
											}?>
											<div class="image-overlay">
												<div class="image-overlay-details">
													<h5><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h5>
													<div class="links">
			                                            <a href="<?php echo $popup;?>" data-gal="prettyPhoto[gallery]" title=""> <span class="fa fa-search-plus"> </span> </a>
			                                            <a href="<?php the_permalink();?>" title=""> <span class="fa fa-external-link"> </span> </a>
			                                            <a href="" title=""> <span class="fa fa-heart"> </span> </a>
													</div>
												</div>
											</div><?php
										echo '</figure>';?>
											<div class="dt-gallery-details">
												<div class="dt-gallery-details-inner">
													<h5><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"><?php the_title();?></a></h5>
													<?php if( array_key_exists("sub-title",$gallery_item_meta) ):?>
														<h6><?php echo $gallery_item_meta["sub-title"];?></h6>
													<?php endif;?>
												</div>
											</div><?php
										echo '</li>';
									endwhile;
									echo '</ul>';

									if($count > 3 ) 
										echo '<div class="carousel-arrows">	<a class="dt-gallery-prev" href=""> <span class="fa fa-angle-left"> </span> </a>	<a class="dt-gallery-next" href="" > <span class="fa fa-angle-right"> </span> </a> </div>';

									echo '</div>';	
								endif;?>
						</div>
				<?php endif;?>
				<!-- Recent Gallery Items End -->
			</section>

<?php if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo $sidebar_class;?>"><?php get_sidebar( );?></section><?php
		endif;
	  endif;
get_footer();?>