<?php
    if ( is_page() && !is_front_page() ):
        global $post;
        dttheme_subtitle_section( $post->ID, 'page' );
    elseif( is_singular('post') ):    
        global $post;
        dttheme_subtitle_section( $post->ID, 'post' );
    elseif( is_singular('dt_galleries' )):
    	global $post;
        dttheme_subtitle_section( $post->ID, 'dt_galleries' );
    elseif( is_singular( 'product' ) ):    
        global $post;
        $title = get_the_title($post->ID);
        $subtitle = get_post_meta( $post->ID, '_sub_title', true );
        echo "<section class='title-section'>";
        echo '  <div class="title-wrapper">';
        echo '      <div class="container">';
        echo '          <div class="border-title aligncenter">';
        echo "              <h1>{$title}</h1>";
        echo                !( empty($subtitle) ) ? "<h6>{$subtitle}</h6>" : "";
        echo '          </div>';                    
        echo '      </div>';
        echo '  </div>';
        echo '</section>';
    elseif( is_attachment() ):
        global $post;
        $my_query = get_post($post->post_parent);            
        $subtitle =  get_the_title($my_query->ID);
        dttheme_custom_subtitle_section( __('Attachment','dt_themes') ,$subtitle);
    elseif( is_tax() ):
        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
        $title = $term->name;
        $subtitle="";
        if( get_query_var( 'taxonomy' ) == "product_cat")
            $subtitle =  __('Products Archive',"dt_themes");
        if( get_query_var( 'taxonomy' ) == "dt_gallery_entries")
            $subtitle = __('Galleries Archive','dt_themes');

        dttheme_custom_subtitle_section($title,$subtitle);
    elseif( is_post_type_archive('product') ):
        dttheme_subtitle_section( get_option('woocommerce_shop_page_id'), 'page' );
    elseif( is_category( ) ):
        dttheme_custom_subtitle_section(single_cat_title('',FALSE) ,__('Category Archive','dt_themes'));
    elseif( is_tag( ) ):
        dttheme_custom_subtitle_section(single_tag_title('',FALSE) ,__('Tag Archive','dt_themes'));
    elseif( is_author() ):
        $curauth = get_user_by('slug',get_query_var('author_name')) ;   
        dttheme_custom_subtitle_section($curauth->nickname ,__('Author Archive','dt_themes'));
    elseif( is_year() ): 
        dttheme_custom_subtitle_section(get_the_time('Y'),__('Year Archive','dt_themes'));   
    elseif( is_month() ): 
        dttheme_custom_subtitle_section(get_the_time('F'),__('Month Archive','dt_themes'));   
    elseif( is_search() ):
        dttheme_custom_subtitle_section(__('Search','dt_themes'), __('Search Result for ','dt_themes').get_search_query() );
    elseif( is_404() ):
        dttheme_custom_subtitle_section(__('LOST','dt_themes'),__('Oops Nothing Found','dt_themes'));
    endif;?> 