<?php get_header();
	$page_layout  = dttheme_option( 'specialty', 'search-layout' );
	$page_layout  = !empty( $page_layout ) ? $page_layout : "content-full-width";
	$post_layout = dttheme_option( 'specialty', 'search-post-layout' );
	$post_layout  = !empty( $post_layout ) ? $post_layout : "one-column";

	$show_sidebar = $show_left_sidebar = $show_right_sidebar =  false;
	$sidebar_class = "";
	$container_class = "";
	$image_size = "";

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

		switch($post_layout):
			case 'one-column':
				$post_class = $show_sidebar ? " column dt-sc-one-column with-sidebar blog-fullwidth" : " column dt-sc-one-column blog-fullwidth";
				$image_size = $show_sidebar ? "blog-one-column-with-sidebar" : "blog-one-column";
				$columns = 1;
			break;

			case 'one-half-column':
			default:
				$post_class = $show_sidebar ? " column dt-sc-one-half with-sidebar" : " column dt-sc-one-half";
				$columns = 2;
				$container_class = "apply-isotope";
				$image_size = "blog-two-column";
			break;
		endswitch;

	if ( $show_sidebar ):
		if ( $show_left_sidebar ): ?>
			<!-- Secondary Left -->
			<section id="secondary-left" class="secondary-sidebar <?php echo $sidebar_class;?>"><?php get_sidebar( );?></section><?php
		endif;
	endif;?>
			<section id="primary" class="<?php echo $page_layout;?>"><?php
				#Blog Holder Start
					if( have_posts() ):
						$i = 1;
						while( have_posts() ):
							the_post();

							$temp_class = "";
							if($i == 1) $temp_class = $post_class." first"; else $temp_class = $post_class;
							if($i == $columns) $i = 1; else $i = $i + 1;

							$format = get_post_format(  get_the_id() );

							$post_meta = get_post_meta(get_the_id() ,'_dt_post_settings',TRUE);
							$post_meta = is_array($post_meta) ? $post_meta : array();?>
							<div class="<?php echo $temp_class;?>">
								<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry'); ?>>
									<div class="blog-entry-inner">

										<div class="entry-meta">
											<div class="date"><span>
												<?php echo get_the_date('d');?><br>
												<?php echo strtoupper(get_the_date('M'));?><br>
												<?php echo get_the_date('Y');?>
											</span></div>
											<p class="comments"><?php comments_popup_link( __('<span class="fa fa-comments"> </span> 0','dt_themes'), __('<span class="fa fa-comments"> </span> 1','dt_themes'), __('<span class="fa fa-comments"> </span> %','dt_themes'),'',__('<span class="fa fa-comments-o"> </span>','dt_themes'));?></p>
										</div>

										<div class="entry-thumb"><?php
											#Image Format 
											if( $format == "image" || empty($format) ):?>
												<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php
													if( has_post_thumbnail() ):
														the_post_thumbnail($image_size);
													else:?>
														<img src="http://placehold.it/1060x618&text=Image" alt="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" /></a><?php
													endif;?>
												</a><?php
											#Gallery Format
											elseif( $format == "gallery" ):
												if( array_key_exists("items", $post_meta) ):
													$items_id_exists = array_key_exists('items_id',$post_meta) ? true : false;
													echo "<ul class='entry-gallery-post-slider'>";
													foreach ( $post_meta['items'] as $k => $item ) { 
														if( $items_id_exists ) {
															$id = $post_meta['items_id'][$k];
															$img = wp_get_attachment_image_src($id,$image_size);
															echo "<li><img src='".$img[0]."' width='".$img[1]."' height='".$img[2]."' alt='' /></li>";
														} else {
															echo "<li><img src='{$item}' /></li>";
														}
													}
													echo "</ul>";
												else:?>
													<img src="http://placehold.it/1060x618&text=Set Gallery" alt="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" /><?php
												endif;
											#Video Format	
											elseif( $format == "video" ):
												if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ):
													if( array_key_exists('oembed-url', $post_meta) ):
														echo "<div class='dt-video-wrap'>".wp_oembed_get($post_meta['oembed-url']).'</div>';
													elseif( array_key_exists('self-hosted-url', $post_meta) ):
														echo "<div class='dt-video-wrap'>".apply_filters( 'the_content', $post_meta['self-hosted-url'] ).'</div>';
													endif;
												else:?>
													<img src="http://placehold.it/1060x618&text=Set Video" alt="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" /><?php
												endif;
											#Audio Format	
											elseif( $format === "audio" ):
												if( array_key_exists('oembed-url', $post_meta) || array_key_exists('self-hosted-url', $post_meta) ):
													if( array_key_exists('oembed-url', $post_meta) ):
														echo wp_oembed_get($post_meta['oembed-url']);
													elseif( array_key_exists('self-hosted-url', $post_meta) ):
														echo apply_filters( 'the_content', $post_meta['self-hosted-url'] );
													endif;
												else:?>
													<img src="http://placehold.it/1060x618&text=Set Audio" alt="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>" /><?php
												endif;
											elseif( has_post_thumbnail() ):	?>
												<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php the_post_thumbnail($image_size);?></a><?php
											endif;?>
										</div>
										<div class="entry-details">
											<div class="entry-title">
												<h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s'), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h4>
											</div>
											<div class="entry-metadata">
												<P class="author">
													<i class="fa fa-user"> </i>
													<a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" title="<?php _e('View all posts by ', 'dt_themes').get_the_author();?>"><?php echo get_the_author();?></a>
												</P>
												<span> | </span>

												<?php the_tags("<p class='tags'> <i class='fa fa-tags'> </i>",', ',"</p> <span> | </span>");?>

												<p class="category"><i class="fa fa-sitemap"> </i> <?php the_category(', '); ?></p>
											</div>
											<div class="entry-body"><?php the_excerpt();?></div>
											<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>" class="dt-sc-button small"> <?php _e('Read More','dt_themes');?> </a>
										</div>
									</div>
								</article>
							</div><?php
						endwhile;
					else:?>
						<div class="dt-sc-hr-invisible"> </div>
						<h1><?php _e( 'Nothing Found','dt_themes'); ?></h1>
						<h3><?php _e( 'Apologies, but no results were found for the requested archive.', 'dt_themes'); ?></h3><?php 
						get_search_form();
					endif;?>
				<!-- **Pagination** -->
				<div class="pagination blog-pagination">
					<div class="prev-post"><?php previous_posts_link(__('Prev','dt_themes'));?></div>
					<?php echo dttheme_pagination();?>
					<div class="next-post"><?php next_posts_link( __('Next','dt_themes') );?></div>
				</div><!-- **Pagination** -->
			</section><!-- **Primary - End** --><?php

	if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo $sidebar_class;?>"><?php get_sidebar( );?></section><?php
		endif;
	endif;
get_footer();?>