<!-- **Header** -->
<header id="header" class="header4">

	<?php if( dttheme_option('appearance','enable-top-bar') ):
			require_once(get_template_directory()."/headers/top_menu.php");
		  endif;?>
	
	<div class="container">

		<div id="logo"><?php
			if( dttheme_option('general', 'logo') ):
				$url = dttheme_option('general', 'logo-url');
				$url = !empty( $url ) ? $url : IAMD_BASE_URL."images/logo.png";

				
				$retina_url = dttheme_option('general','retina-logo-url');
				$retina_url = !empty($retina_url) ? $retina_url : IAMD_BASE_URL."images/logo@2x.png";
				
				$width = dttheme_option('general','retina-logo-width');
				$width = !empty($width) ? $width."px;" : "124px";
				
				$height = dttheme_option('general','retina-logo-height');
				$height = !empty($height) ? $height."px;" : "62px";?>
				<a href="<?php echo home_url();?>" title="<?php echo dttheme_blog_title();?>">
					<img class="normal_logo" src="<?php echo $url;?>" alt="<?php echo dttheme_blog_title(); ?>" title="<?php echo dttheme_blog_title(); ?>" />
                    <img class="retina_logo" src="<?php echo $retina_url;?>" alt="<?php echo dttheme_blog_title();?>"
                    	 title="<?php echo dttheme_blog_title();?>" style="width:<?php echo $width;?>; height:<?php echo $height;?>;" />
				</a><?php
			else:?>
				<h2><a href="<?php echo home_url();?>" title="<?php echo dttheme_blog_title();?>"><?php echo do_shortcode(get_option('blogname')); ?></a></h2><?php
			endif;?>
		</div>

		<div class="header-right-content">
		<?php  get_search_form(); echo do_shortcode('[social/]'); ?>
		</div>
	</div>
    
	<div class="main-menu-wrapper header4">
		<!-- **Navigation** -->
		<nav id="main-menu">
			<div class="container">
				<div class="dt-menu-toggle" id="dt-menu-toggle">
					<?php _e('Menu','dt_themes');?>
					<span class="dt-menu-toggle-icon"></span>
				</div><?php
					$primaryMenu = NULL;
					if (function_exists('wp_nav_menu')) :
						$primaryMenu = wp_nav_menu(array('theme_location'=>'header_menu','menu_id'=>'','menu_class'=>'menu','fallback_cb'=>'dttheme_default_navigation'
                                    ,'echo'=>false,'container'=>'','walker' => new DTFrontEndMenuWalker()));
            		endif;

            		if(!empty($primaryMenu)):
            			echo $primaryMenu;
            		endif;?>
            </div>		
        </nav><!-- **Navigation - End** -->  
	</div>
    
</header><!-- **Header - End** -->