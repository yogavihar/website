<?php get_header();?>
<section id="primary" class="content-full-width">
	<div class="dt-sc-hr-invisible"></div><?php
	if ( have_posts() ):
		while( have_posts() ):
			the_post();
			get_template_part( 'framework/loops/content' );
		endwhile;
	endif;?>
	<!-- **Pagination** -->
	<div class="pagination blog-pagination">
		<div class="prev-post"><?php previous_posts_link( __( 'Prev', 'dt_themes' ) );?></div>
		<?php echo dttheme_pagination();?>
		<div class="next-post"><?php next_posts_link( __( 'Next', 'dt_themes' ) );?></div>
	</div><!-- **Pagination** -->
</section>
<?php get_footer();?>
