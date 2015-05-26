<?php
/*
Template Name: Timetable Event
*/

	get_header(); 
	?>
<section id="primary" class="page-with-sidebar with-right-sidebar">
    <div class="type-page">
			<?php
				the_post_thumbnail("event-post-thumb", array("alt" => get_the_title(), "title" => ""));
			?>
			<h1><?php the_title();?></h1>
			<?php
			$subtitle = get_post_meta(get_the_ID(), "timetable_subtitle", true);
			if($subtitle!=""):
			?>
				<h5><?php echo $subtitle; ?></h5>
			<?php
			endif;
			if(have_posts()) : while (have_posts()) : the_post();
				echo tt_remove_wpautop(get_the_content());
			endwhile; endif;
			?>
	
</div>
</section>
<section id="secondary-right" class="secondary-sidebar secondary-has-right-sidebar"><?php get_sidebar( );?></section>

	<?php
	get_footer();

?>