<?php 
//Product Search Form 
	add_filter( 'get_product_search_form' , 'dt_custom_product_searchform' );
	if( !function_exists('dt_custom_product_searchform') ){
		function dt_custom_product_searchform( $form ){

			$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
					<div>
						<label class="screen-reader-text" for="s">' . __( 'Search for:', 'woocommerce' ) . '</label>
						<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search for products', 'woocommerce' ) . '" />
						<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Go', 'woocommerce' ) .'" />
						<input type="hidden" name="post_type" value="product" />
					</div>
			</form>';
			return $form;
		}
	}

//Remove Shop Page Title
	add_action( 'woocommerce_show_page_title', 'dt_woocommerce_show_page_title', 10);
	if( !function_exists('dt_woocommerce_show_page_title') ) {
    	   function dt_woocommerce_show_page_title() {
        	       return false;
       	}
	}
//End of Remove Shop Page Title

#Disable WooCommerce Styles
	if ( version_compare( get_option('woocommerce_version') , "2.1" ) >= 0 ) {
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	} else {
		define( 'WOOCOMMERCE_USE_CSS', false );
	}

#Add My Own Style
	if(!is_admin()) {
		add_action('init', 'dt_woocommerce_register_assets');
		
		#To add extra class form product images
		add_filter( 'post_class', 'product_has_gallery' );
	}

	function dt_woocommerce_register_assets() {
		wp_enqueue_style( 'dt-woocommerce-css', IAMD_FW_URL.'woocommerce/style.css');
	}
#Add My Own Style End


	function product_has_gallery( $classes ) {
		global $product;

		$post_type = get_post_type( get_the_ID() );
		if ( $post_type == 'product' ) {
			$attachment_ids = $product->get_gallery_attachment_ids();
			if ( $attachment_ids ) {
				$classes[] = 'pif-has-gallery';
			}
		}
		return $classes;
	}
#End of Adding extra class to product

/*No of products per row*/
	add_filter( 'loop_shop_columns', 'dt_woocommerce_loop_columns' );	
	if (!function_exists('dt_woocommerce_loop_columns')) {
		function dt_woocommerce_loop_columns() {
			$shop_layout = dttheme_option('woo',"shop-page-product-layout");
			$columns = "";
			switch($shop_layout) {
				case "one-half-column":		$columns = 2;	break;
				case "one-third-column":	$columns = 3;	break;
				case "one-fourth-column":	$columns = 4;	break;				
				default:					$columns = 4;	break;
			}
			return $columns;
		}
	}
/*End of No of products per row*/

// No of products per page
	add_filter( 'loop_shop_per_page', 'dt_woocommerce_product_count' );
	if (!function_exists('dt_woocommerce_product_count')) {
		function dt_woocommerce_product_count() {
			$shop_product_per_page = trim(stripslashes(dttheme_option('woo','shop-product-per-page')));
			$shop_product_per_page = !empty( $shop_product_per_page)  ? $shop_product_per_page : 10;
			return $shop_product_per_page;
		}
	}
// End of No of products per page

// Tabs

#Custom Product Meta
	add_action( 'woocommerce_product_options_general_product_data', 'wc_type_product_field' );
	function wc_type_product_field() {
		global $post, $woocommerce;
		echo '<div class="options_group">';
			woocommerce_wp_text_input( array( 
					'id' => '_sub_title',
					'label' => '<abbr title="'. __( 'Sub Title', 'dt_themes' ) .'">' . __( 'Sub Title', 'dt_themes' ) . '</abbr>',
					'desc_tip' => 'false',
					'class' => 'large'
			) );		
		echo '</div>';
	}

	add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );
	function woo_add_custom_general_fields_save( $post_id ){
		$sub_title = $_POST['_sub_title'];
		if( !empty($sub_title) ){
			update_post_meta( $post_id, '_sub_title', esc_attr( $sub_title ) );
		}
	}
#Custom Product Meta End

#Adjust markup on all WooCommerce pages
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
	remove_action( 'woocommerce_pagination', 'woocommerce_catalog_ordering', 20 );
	remove_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); #remove result count above products
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 ); #remove woo commerce ordering drop down
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); #remove rating
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );

	add_action( 'woocommerce_before_main_content', 'dt_woocommerce_before_main_content', 10);
	if( !function_exists('dt_woocommerce_before_main_content') ) {
		function dt_woocommerce_before_main_content() {

			$show_sidebar = false;
			$sidebar_class = "";

			#For Shop Page
			if( is_shop() ){
				$tpl_default_settings = get_post_meta( get_option('woocommerce_shop_page_id') ,'_tpl_default_settings',TRUE);
				$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();

				$page_layout  = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : "content-full-width";
			}
			#For Product Page 
			elseif( is_product()) { 
				$page_layout = dttheme_option('woo',"product-layout");
				$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";				
			}
			#For Product Category
			elseif( is_product_category() ) {
				$page_layout = dttheme_option('woo',"product-category-layout");
				$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";			
			}
			#For Product Tag
			elseif( is_product_tag() ) {
				$page_layout = dttheme_option('woo',"product-tag-layout");
				$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";
			}

		#Define Page Layout
		switch($page_layout):
			case 'with-left-sidebar':
				$page_layout = "page-with-sidebar with-left-sidebar";
				$sidebar_class = "secondary-has-left-sidebar";
				$show_sidebar = true;
			break;
			
			case 'with-right-sidebar':
				$page_layout = "page-with-sidebar with-right-sidebar";
				$show_sidebar = false;
			break;

			case 'content-full-width':
			default:
				$page_layout = "content-full-width";
			break;
		endswitch;


			if ( $show_sidebar ):
				echo "<section id='secondary-left' class='secondary-sidebar {$sidebar_class}'>";
				get_sidebar( );
				echo '</section>';
			endif;


			echo '<!-- ** Primary Section ** -->';
			echo "<section id='primary' class='{$page_layout}'>";
		}
	}

	add_action( 'woocommerce_after_main_content', 'dt_woocommerce_after_main_content', 20);
	if( !function_exists('dt_woocommerce_after_main_content') ) {
		function dt_woocommerce_after_main_content() {
			echo "</section><!-- ** Primary Section End ** -->";

			$show_sidebar = false;
			$sidebar_class = "";

			#For Shop Page
			if( is_shop() ){
				$tpl_default_settings = get_post_meta( get_option('woocommerce_shop_page_id') ,'_tpl_default_settings',TRUE);
				$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();

				$page_layout  = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : "content-full-width";
			}
			#For Product Page 
			elseif( is_product()) { 
				$page_layout = dttheme_option('woo',"product-layout");
				$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";				
			}
			#For Product Category
			elseif( is_product_category() ) {
				$page_layout = dttheme_option('woo',"product-category-layout");
				$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";			
			}
			#For Product Tag
			elseif( is_product_tag() ) {
				$page_layout = dttheme_option('woo',"product-tag-layout");
				$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";
			}

			#Define Page Layout
			switch($page_layout):
				case 'with-right-sidebar':
					$sidebar_class = "secondary-has-right-sidebar";
					$show_sidebar = true;
				break;

				case 'with-left-sidebar':
					$sidebar_class = "secondary-has-left-sidebar";
					$show_sidebar = true;
				break;
			endswitch;

			if ( $show_sidebar ):
				echo "<section id='secondary-right' class='secondary-sidebar {$sidebar_class}'>";
				get_sidebar();
				echo '</section>';
			endif;
		}
	}

#Adjust markup for product
	add_action( 'woocommerce_before_shop_loop_item', 'dt_woocommerce_shop_overview_extra_div', 5);
	if( !function_exists('dt_woocommerce_shop_overview_extra_div') ) {
		function dt_woocommerce_shop_overview_extra_div() {
			global $product, $woocommerce_loop;

			$class = "";
			if( is_shop() || is_product_category() || is_product_tag() ):
				$product_layout = dttheme_option('woo',"shop-page-product-layout");
				$product_layout = !empty( $product_layout ) ? $product_layout : "one-half-column";

				switch ($product_layout) {
					case 'one-half-column': 
						$class .= " product-two-column";
					break;
					case 'one-third-column':
						$class .= " product-three-column";
					break;
					case 'one-fourth-column': 
						$class .= " product-four-column";
					break;
				}
			else:
				$column = $woocommerce_loop['columns'];

				switch($column) {
					case '2':					$class .= "product-two-column";					break;
					case '2-with-nospace':		$class .= "product-two-column no-space";		break;
					case '3':					$class .= "product-three-column";				break;
					case '3-with-nospace':		$class .= "product-three-column no-space";		break;
					case '4':					$class .= "product-four-column";				break;
					case '4-with-nospace': 		$class .= "product-four-column no-space";		break;
					case '5':					$class .= "product-five-column";				break;
					case '5-with-nospace': 		$class .= "product-five-column no-space";		break;
					case '6':					$class .= "product-six-column";					break;
					case '6-with-nospace': 		$class .= "product-six-column no-space";		break;
					default:					$class .= "product-two-column";					break;
				}
			endif;

			if( $product->is_featured() )
				$class .= " featured-product ";
		
			if( $product->is_on_sale() )
				$class .= " on-sale-product ";

			if( $product->is_in_stock() )
				$class .= " in-stock-product ";
			else	
				$class .= " out-of-stock-product ";

			echo "<div class='product-wrapper {$class}'>";
			echo '	<div class="product-container">';
		}
	}

	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

	add_action( 'woocommerce_before_shop_loop_item_title', 'dt_woocommerce_template_loop_product_thumbnail', 10);
	if( !function_exists('dt_woocommerce_template_loop_product_thumbnail') ) {
		function dt_woocommerce_template_loop_product_thumbnail() {
			global $post,$product,$woocommerce;

			$out = "";
			$id = get_the_ID();
			$image =  get_the_post_thumbnail( $id );
			$image = !empty( $image ) ? $image : '<img  width="100%" height="100%" src="http://placehold.it/1060x811&text=Product" alt="" />';

			echo '<div class="product-thumb">';
			echo $image;

			$attachment_ids = $product->get_gallery_attachment_ids();
			if ( $attachment_ids ) {
				$secondary_image_id = $attachment_ids['0'];
				echo wp_get_attachment_image( $secondary_image_id, array(500,500), '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );
			}

			$rating = $product->get_rating_html(); //get rating
			$rating = !empty( $rating ) ? "<div class='product-rating-wrapper'><div class='product-rating-container'>{$rating}</div></div>" : "";
			echo $rating;


			if ($product->is_on_sale() and $product->is_in_stock() ) :
				echo apply_filters('woocommerce_sale_flash', '<span class="onsale"><span>'.__( 'Sale!', 'dt_themes' ).'</span></span>', $post, $product);
			elseif(!$product->is_in_stock()):
				echo apply_filters( 'woocommerce_sale_flash', '<span class="out-of-stock"><span>'.__( 'Out of Stock', 'dt_themes' ).'</span></span>', $post, $product );
			endif;

			if( $product->is_featured() )
				echo apply_filters( 'woocommerce_sale_flash', '<span class="featured"><span>'.__( 'Featured', 'dt_themes' ).'</span></span>', $post, $product );

			echo '</div>';
		}
	}


	add_action( 'woocommerce_before_shop_loop_item_title', 'dt_woocommerce_before_shop_loop_item_title', 10);
	if( !function_exists('dt_woocommerce_before_shop_loop_item_title') ) {
		function dt_woocommerce_before_shop_loop_item_title() {
			$out = "";
			$out .= "<div class='product-title'>";
			echo $out;
		}
	}

	add_action( 'woocommerce_after_shop_loop_item_title', 'dt_woocommerce_after_shop_loop_item_title', 10);
	if( !function_exists('dt_woocommerce_after_shop_loop_item_title') ) {
		function dt_woocommerce_after_shop_loop_item_title() {
			global $post;
			$out = "";
			$subtitle = get_post_meta( $post->ID, '_sub_title', true );
			$out .= !empty( $subtitle ) ? "<p>{$subtitle}</p>" : "";
			$out .= "</div>";
			echo $out;
		}
	}

	add_action( 'woocommerce_after_shop_loop_item', 'dt_woocommerce_shop_overview_extra_div_close', 1000);
	if( !function_exists('dt_woocommerce_shop_overview_extra_div_close') ) {
		function dt_woocommerce_shop_overview_extra_div_close() {
			global $product;

			$link = apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) );
			
			ob_start();
			woocommerce_template_loop_price();
			$price = ob_get_clean();

			ob_start();
			woocommerce_template_loop_add_to_cart();
			$add_to_cart = ob_get_clean();

			if( !empty($add_to_cart) ) {
				$add_to_cart = str_replace(' class="',' class="small button ',$add_to_cart);
			}

			echo "		<div class='product-details'>";
			echo 		$price;
			echo "		<div class='product-buttons'>";
			echo 			$add_to_cart;
							if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) )
							echo  do_shortcode('[yith_wcwl_add_to_wishlist]');	
			echo "		</div>";			
			echo "		</div>";
			echo '	</div>';
			echo '</div>';
		}
	}

	#Pagination
	add_action( 'woocommerce_after_shop_loop', 'dt_woocommerce_after_shop_loop', 10);
	if( !function_exists('dt_woocommerce_after_shop_loop') ) {
		function dt_woocommerce_after_shop_loop() {?>
			<div class="pagination product-pagination">
    			<div class="prev-post"><?php previous_posts_link( __('Prev','dt_themes') );?></div>
        		<?php echo dttheme_pagination(); ?>
        		<div class="next-post"><?php next_posts_link( __('Next','dt_themes') );?></div>
        	</div><?php
		}
	}

#Single Product
	#Showing Related Products
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);
	remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products',10);

	add_action( 'woocommerce_after_single_product_summary', 'dt_woocommerce_output_related_products', 20);
	if( !function_exists('dt_woocommerce_output_related_products') ){
		function dt_woocommerce_output_related_products() {
			$page_layout = dttheme_option('woo',"product-layout");
			$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";

			$related_products = ( $page_layout === "content-full-width" ) ? 4 : 3;

			$output = "";
			ob_start();
			woocommerce_related_products(array('posts_per_page' => $related_products, 'columns' => $related_products));
			$content = ob_get_clean();
			if($content):
			    $output .= "<div class='related-products-container'>{$content}</div>";
			endif;
			echo $output;
		}
	}

	#Showing Upsell Products( You may also like)
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	remove_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display',10);

	add_action( 'woocommerce_after_single_product_summary', 'dt_woocommerce_output_upsells', 21); 
	if( !function_exists('dt_woocommerce_output_upsells') ){
		function dt_woocommerce_output_upsells() {
			$page_layout = dttheme_option('woo',"product-layout");
			$page_layout = !empty($page_layout) ? $page_layout : "content-full-width";
	
			$upsell_products = ( $page_layout === "content-full-width" ) ? 4 : 3;
	
			$output = "";
			ob_start();
			woocommerce_upsell_display($upsell_products,$upsell_products); // X products, X columns
			$content = ob_get_clean();
			if($content):
				$output .= "<div class='upsell-products-container'>{$content}</div>";
			endif;
			echo $output;
		}
	}

	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	add_action('woocommerce_before_single_product_summary','dt_woocommerce_show_product_sale_flash',10);
	function dt_woocommerce_show_product_sale_flash() {
		global $product;
		$out = "";
		if( $product->is_on_sale() and $product->is_in_stock() )
			$out .= '<span class="onsale">'.__('Sale!','dt_themes').'</span>';
		
		elseif(!$product->is_in_stock())
			$out .= '<span class="out-of-stock">'.__('Out of Stock','dt_themes').'</span>';
		
		if( $product->is_featured() )
			$out .= '<span class="featured-product">'.__('Featured','dt_themes').'</span>';
		echo $out;
	}

	// Ensure cart contents update when products are added to the cart via AJAX
	add_filter('add_to_cart_fragments', 'dt_woocommerce_header_cart_count');
	function dt_woocommerce_header_cart_count( $fragments ) {
		global $woocommerce;
		ob_start();?>
			<a id="top-cart-count" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><?php echo sprintf(_n('Cart [%d] item', 'Cart [%d] items', $woocommerce->cart->cart_contents_count, 'dt_themes'), $woocommerce->cart->cart_contents_count);?></a><?php
		$fragments['a#top-cart-count'] = ob_get_clean();
		return $fragments;
	}

	add_filter('add_to_cart_fragments', 'dt_woocommerce_header_cart_total');
	function dt_woocommerce_header_cart_total( $fragments ) {
		global $woocommerce;
		ob_start();?>
			<a id="top-cart-total" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><?php echo $woocommerce->cart->get_cart_total(); ?></a><?php
			$fragments['a#top-cart-total'] = ob_get_clean();
		return $fragments;
	}?>