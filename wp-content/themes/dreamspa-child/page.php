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
                case 'content-full-width':
			$page_layout = "content-full-width";
		break;
		case 'with-right-sidebar':
                default:
			$page_layout = "page-with-sidebar with-right-sidebar";
			$show_sidebar = $show_right_sidebar	= true;
			$sidebar_class = "secondary-has-right-sidebar";
		break;

		
	}
        $top_image = get_field('top_image');
        if($top_image){
            $page_layout .= " with_top_image";
            $sidebar_class .= " with_top_image";
        }

	if ( $show_sidebar ):
		if ( $show_left_sidebar ): ?>
			<!-- Secondary Left -->
			<section id="secondary-left" class="secondary-sidebar <?php echo $sidebar_class;?>"><?php get_sidebar( );?></section><?php
		endif;
	endif;?>
			<section id="primary" class="<?php echo $page_layout;?>">
                            <?php if($page_layout=="content-full-width"):?>
                            <div class="fullwidth-section"><?php endif;?>
                            <?php
				if( have_posts() ):
					while( have_posts() ):
						the_post();
						get_template_part( 'framework/loops/content', 'page' );
					endwhile;
				endif;?>
                                 <?php if($page_layout=="content-full-width"):?>
                            </div><?php endif;?>
			</section><!-- **Primary - End** --><?php

	if ( $show_sidebar ):
		if ( $show_right_sidebar ): ?>
			<!-- Secondary Right -->
			<section id="secondary-right" class="secondary-sidebar <?php echo $sidebar_class;?>"><?php get_sidebar( );?></section><?php
		endif;
	endif;
        ?>
                        </div>
        <?php // check if the repeater field has rows of data
if( get_field('bottom_images') ):?>
<section id="image-section-container"> 

<?php // loop through the rows of data
if(get_field("images_layout")=="1"):?>
    <div class='image-section large'>
    <img src="<?php echo wp_get_attachment_url(get_field("image_layout_1"));?>" alt="" />
    </div>
   
<?php elseif(get_field("images_layout")=="2"):?>
    <div class='image-section double'>
    <img src="<?php echo wp_get_attachment_url(get_field("images_layout_2_0_1"));?>" alt="" />
    </div>
    <div class='image-section'>
        <img src="<?php echo wp_get_attachment_url(get_field("images_layout_2_0_2"));?>" alt="" />
    </div>
    <div class='image-section'>
        <img src="<?php echo wp_get_attachment_url(get_field("images_layout_2_0_3"));?>" alt="" />
    </div>  
<?php elseif(get_field("images_layout")=="3"):?>
    <div class='image-section'>
    <img src="<?php echo wp_get_attachment_url(get_field("images_layout_3_0_1"));?>" alt="" />
    </div>
    <div class='image-section'>
        <img src="<?php echo wp_get_attachment_url(get_field("images_layout_3_0_2"));?>" alt="" />
    </div>
    <div class='image-section double'>
        <img src="<?php echo wp_get_attachment_url(get_field("images_layout_3_0_3"));?>" alt="" />
    </div>   
<?php endif;?>

</section>
<?php endif;
get_footer();?>