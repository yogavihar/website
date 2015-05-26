        <?php if( !is_page_template( 'tpl-fullwidth.php' ) ): ?>
            </div><!-- **Container - End** -->
        <?php endif;?>

		</div><!-- **Main - End** -->

	    <!-- **Footer** -->
        <footer id="footer"><?php

        	$show_footer = dttheme_option('general','show-footer');
        	if( !empty($show_footer) ):?>
        		<div class="footer-widgets-wrapper">
        			<div class="container"><?php
        				$columns = dttheme_option ('general','footer-columns');
        				dttheme_show_footer_widgetarea($columns);
        			?></div>
        		</div><?php endif;?>
        		<div class="copyright">
        			<div class="container">
        				<div class="copyright-content">Integral Yoga - Ayurveda Institute  |  Kaiser-Friedrich-Str.51  |  10627 Berlin-Charlottenburg  |  Tel &amp; Fax: 030 - 31997452  |  Email: 
                                        <a href="mailto:info@yogavihar.com">info@yogavihar.com</a>
                                        </div>
        			</div>
        		</div>	
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