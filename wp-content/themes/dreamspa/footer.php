        <?php if( !is_page_template( 'tpl-fullwidth.php' ) ): ?>
            </div><!-- **Container - End** -->
        <?php endif;?>

		</div><!-- **Main - End** -->

	    <!-- **Footer** -->
        <footer id="footer"><?php
        	$show_footer_logo =  dttheme_option ('general','show-footer-logo');
        	if( !is_null($show_footer_logo) ) :?>
        		<div class="footer-logo"><?php
        			$flogo = dttheme_option('general','footer-logo-url');
        			$flogo = !empty($flogo) ? $flogo : IAMD_BASE_URL."images/footer-logo.png";
					
					$retina_url = dttheme_option('general','retina-footer-logo-url');
					$retina_url = !empty($retina_url) ? $retina_url : IAMD_BASE_URL."images/footer-logo@2x.png";
					
					$width = dttheme_option('general','retina-footer-logo-width');
					$width = !empty($width) ? $width."px;" : "66px";
					
					$height = dttheme_option('general','retina-footer-logo-height');
					$height = !empty($height) ? $height."px;" : "33px";?>
        			<img class="normal_logo" src="<?php echo $flogo;?>" alt="<?php _e('Footer Logo','dt_themes');?>" title="<?php _e('Footer Logo','dt_themes');?>">
                    <img class="retina_logo" src="<?php echo $retina_url;?>" alt="<?php echo dttheme_blog_title();?>"
                    	 title="<?php echo dttheme_blog_title(); ?>" style="width:<?php echo $width;?>; height:<?php echo $height;?>;"/>
        		</div><?php
        	endif;

        	$show_footer = dttheme_option('general','show-footer');
        	if( !empty($show_footer) ):?>
        		<div class="footer-widgets-wrapper">
        			<div class="container"><?php
        				$columns = dttheme_option ('general','footer-columns');
        				dttheme_show_footer_widgetarea($columns);
        			?></div>
        		</div><?php
        	endif;

        	$show_copyright = dttheme_option('general','show-copyrighttext');
        	$copyright_text = dttheme_option('general','copyright-text');
        	$copyright_text = stripcslashes($copyright_text);
        	if( !empty($show_copyright) && !empty( $copyright_text) ):?>
        		<div class="copyright">
        			<div class="container">
        				<div class="copyright-content"><?php echo $copyright_text;?></div>
        			</div>
        		</div><?php
        	endif;?>	
        </footer><!-- **Footer - End** -->
    </div><!-- **Inner Wrapper - End** -->
</div><!-- **Wrapper - End** -->

<?php
	if (is_singular() AND comments_open())
		wp_enqueue_script( 'comment-reply');

	if(dttheme_option('integration', 'enable-body-code') != '') 
		echo stripslashes(dttheme_option('integration', 'body-code'));
	wp_footer(); ?>
</body>
</html>