	<div class="top-bar">
		<div class="container">
			<ul class="contact-details">
				<li><span class="fa fa-phone"></span><?php _e('Call Us ','dt_themes'); echo dttheme_option('general','h2-phoneno');?></li>
				<li><span class="fa fa-user"></span><?php _e('Mail Us :','dt_themes');
					$email = dttheme_option('general','h2-emailid');
					$email = !empty($email)   ? $email : get_option('admin_email');?>
					<a href="mailto:<?php echo $email;?>" title=""><?php echo $email;?></a>
				</li>
			</ul>

			<?php if(dttheme_is_plugin_active('woocommerce/woocommerce.php')):
					 global $woocommerce;?>
					<ul class="cart-details">
						<li><span class="fa fa-shopping-cart"></span> 
							<a id="top-cart-count" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><?php echo sprintf(_n('Cart [%d] item', 'Cart [%d] items', $woocommerce->cart->cart_contents_count, 'dt_themes'), $woocommerce->cart->cart_contents_count);?></a></li>
						<li><a id="top-cart-total" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><?php echo $woocommerce->cart->get_cart_total(); ?></a></li>
					</ul><?php
			endif;?>	 	
		</div>
	</div>
