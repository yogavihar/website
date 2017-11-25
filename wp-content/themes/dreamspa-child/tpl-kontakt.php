<?php /*Template Name: Kontakt Template*/?>
<?php get_header();?>

	<!-- ** Primary Section ** -->
	<section id="primary" class="content-full-width no-borduere contact-page">
            <iframe
  width="1000"
  height="500"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBLvF8JbCGMCCLQyxBFTN_nKtHdy4IOoqE
    &q=YogaVihar,Berlin" allowfullscreen>
</iframe>
            <?php
		if( have_posts() ):
			while( have_posts() ):
				the_post();
				get_template_part( 'framework/loops/content-fullwidth', 'page' );
			endwhile;
		endif;?>

	</section><!-- ** Primary Section End ** -->
<?php get_footer(); ?>