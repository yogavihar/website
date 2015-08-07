<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

     
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
 $tribe_ecp = TribeEvents::instance();
                        
$post_ID=get_the_id();
$categories_array= get_the_terms( $post_ID, $tribe_ecp->get_event_taxonomy());
$mainCat=$categories_array[0]->name;
$event_id = get_the_ID(); ?>
<div id="tribe-events-container">
<section id="primary" class="page-with-sidebar with-right-sidebar">
    <div class="col1">
        <?php if($mainCat=="Kurse"):?>
            <span> <img src='<?php echo site_url();?>/wp-includes/images/icon-meditation.png' alt=''/></span>
        <?php else:?>
            <span class='fa fa-leaf'> </span>
        <?php endif;?>
        
    </div>
    <div class="col2">
        
	<!-- Notices -->
	<?php tribe_events_the_notices() ?>
        
	

	<?php while ( have_posts() ) :  the_post(); 
    $curr_lang=get_locale();
 
       $custom_fields = get_post_custom();
       //echo "<pre>";
       //var_dump($custom_fields);
       
if($curr_lang=="en_GB"){
    $content=get_field('contend_en' );
    $title=get_field('title_en' );
}
else if($curr_lang=="es_ES"){
     $content=get_field('contend_es' );
    $title=get_field('title_es' );
}
else{
    $content=get_the_content();
    $title=get_the_title();
}
        ?>
        <h2 class="tribe-events-single-event-title summary entry-title"><?php echo($title); ?></h2>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event featured image, but exclude link -->
			<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content entry-content description">
				<?php echo($content); ?>
			</div>
			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php
			/**
			 * The tribe_events_single_event_meta() function has been deprecated and has been
			 * left in place only to help customers with existing meta factory customizations
			 * to transition: if you are one of those users, please review the new meta templates
			 * and make the switch!
			 */
			/*if ( ! apply_filters( 'tribe_events_single_event_meta_legacy_mode', false ) ) {
				tribe_get_template_part( 'modules/meta' );
			} else {
				echo tribe_events_single_event_meta();
			}*/
			?>
			<?php //do_action( 'tribe_events_single_event_after_the_meta' )
                        
                       
                         
                        
                        ?>
		</div> <!-- #post-x -->
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th><?php ($mainCat=="Kurse")? _e( 'Course', 'tribe-events-calendar' ) : _e( 'Program', 'tribe-events-calendar' );?></th>
                                <th><?php _e( 'Dates', 'tribe-events-calendar' ) ?></th>
                                <?php if ($mainCat=="Kurse"): ?>
                                    <th><?php _e( 'Time', 'tribe-events-calendar' ) ?></th>
                                <?php endif;?>
                                <th><?php _e( 'Price', 'tribe-events-calendar' ) ?></th>
                            </tr>
                        </thead>
                        <tbody>
                           
                           <?php if( have_rows('courses_') ): ?>
                                
                               <?php while( have_rows('courses_') ): the_row(); ?>
                                
                             <tr>
                                <td><?php echo $title;?></td>
                                <td>
                                <?php 
                                while( have_rows('dates') ): the_row(); 
                                    echo get_sub_field('begin')." - ".get_sub_field('end')."<br>";
                                endwhile; ?>
                                </td>
                                 <?php if ($mainCat=="Kurse"): ?>
                                 <td>
                                     <?php while( have_rows('dates') ): the_row();
                                     $weekday=date_i18n("l",strtotime(get_sub_field('begin')));?>
                                     <?php echo $weekday.": ".get_sub_field('begin_time')." - ".get_sub_field('end_time')."</br>";?>
                                 <?php endwhile; ?>
                                 </td>
                                 <?php endif;?>
                            <td><?php esc_html_e( tribe_get_formatted_cost() ) ?></td>
                         
                            </tr>
                                <?php endwhile; ?>
                            
                            
                            <?php endif;?>
                        </tbody>
                        </table>
                </div>
	<?php endwhile; ?>

	<!-- Event footer -->
	<div id="tribe-events-footer">
            <!--a href="mailto:info@yogavihar.de?subject=Buchungsanfrage%20für%20<?php //echo $title;?>" class="dt-sc-button small with-icon"><span>Buchung anfragen</span><i class="fa fa-envelope"> </i></a-->
            <a href="mailto:info@yogavihar.de?subject=Buchungsanfrage%20für%20<?php echo $title;?>" class="dt-sc-button small"><span>Kurs anfragen</span></a>
	
		<!--p class="tribe-events-back">
                    <a href="<?php //echo esc_url( tribe_get_events_link() ); ?>"> <?php //_e( '&laquo; All Events', 'tribe-events-calendar' ) ?></a>
                </p-->
		<!-- Navigation -->
<!--		<h3 class="tribe-events-visuallyhidden"><?php //_e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php //tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php //tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
		</ul>-->
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-footer -->
 </div>

</section>
<!-- Secondary Right -->
<section id="secondary-right" class="secondary-sidebar secondary-has-right-sidebar"><?php get_sidebar( );?></section>
</div>
<?php 

// check if the repeater field has rows of data
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
<?php endif;?>
