<article id="post-<?php the_ID();?>" <?php post_class(array('blog-entry','blog-single-entry'));?>><?php 
	$tpl_default_settings = get_post_meta( $post->ID, '_dt_post_settings', TRUE );
	$tpl_default_settings = is_array( $tpl_default_settings ) ? $tpl_default_settings  : array();
	$format = get_post_format(  $post->ID );?>
	<div class="blog-entry-inner">

		<div class="entry-meta">

			<div class="date">
				<span>
					<?php echo get_the_date('d');?><br>
					<?php echo strtoupper(get_the_date('M'));?><br>
					<?php echo get_the_date('Y');?>
				</span>
			</div>

			<p class="comments"><?php comments_popup_link( __('<span class="fa fa-comments"> </span> 0','dt_themes'), __('<span class="fa fa-comments"> </span> 1','dt_themes'), __('<span class="fa fa-comments"> </span> %','dt_themes'),'',__('<span class="fa fa-comments-o"> </span>','dt_themes'));?></p>
		</div>

		<div class="entry-thumb">
			<?php #Image Format
			if( $format == "image" || empty($format) ):?>
				<a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>"><?php
					if( has_post_thumbnail() ):
						the_post_thumbnail("full");	
					else:
						echo '<img src="http://placehold.it/1060x618&text=Image" />';
					endif;?>
				</a><?php

			#Gallery Format	
			elseif( $format == "gallery" &&  array_key_exists("items", $tpl_default_settings) ):
				echo '<ul class="entry-gallery-post-slider">';
				foreach ( $tpl_default_settings['items'] as $item ) { 
					echo "<li><img src='{$item}'/></li>";
				}
				echo '</ul>';

			#Video Format
			elseif( $format == "video" ):
				if( array_key_exists('oembed-url', $tpl_default_settings) || array_key_exists('self-hosted-url', $tpl_default_settings) ) :
					if( array_key_exists('oembed-url', $tpl_default_settings) ):
						echo "<div class='dt-video-wrap'>".wp_oembed_get($tpl_default_settings['oembed-url']).'</div>';
					elseif( array_key_exists('self-hosted-url', $tpl_default_settings) ):
						echo "<div class='dt-video-wrap'>".apply_filters( 'the_content', $tpl_default_settings['self-hosted-url'] ).'</div>';
					endif;
				else:
					echo '<img src="http://placehold.it/1060x618&text=Set Video" />';
				endif;

			#Audio Format
			elseif( $format === "audio" ):
				if( array_key_exists('oembed-url', $tpl_default_settings) || array_key_exists('self-hosted-url', $tpl_default_settings) ):
					if( array_key_exists('oembed-url', $tpl_default_settings) ):
						echo wp_oembed_get($tpl_default_settings['oembed-url']);
					elseif( array_key_exists('self-hosted-url', $tpl_default_settings) ):
						echo apply_filters( 'the_content', $tpl_default_settings['self-hosted-url'] );
					endif;
				else:
					echo '<img src="http://placehold.it/1060x618&text=Set Audio" />';
				endif;
			elseif( has_post_thumbnail() ):
				the_post_thumbnail("full");
			endif;?>
		</div>

		<div class="entry-details">

			<div class="entry-title">
				<h4><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s'), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h4>
			</div>

			<div class="entry-metadata">
				<p class="author">
					<i class="fa fa-user"> </i>
					<a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" title="<?php _e('View all posts by ', 'dt_themes').get_the_author();?>"><?php echo get_the_author();?></a>
				</p>
				<span> | </span>

				<?php the_tags("<p class='tags'> <i class='fa fa-tags'> </i>",', ',"</p> <span> | </span>");?>

				<p class="category"><i class="fa fa-sitemap"> </i> <?php the_category(', '); ?></p>
			</div>

			<div class="entry-body"><?php echo dttheme_excerpt( 50 );?></div>

			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>" class="dt-sc-button small"> <?php _e('Read More','dt_themes');?> </a>
		</div>
	</div>
</article>