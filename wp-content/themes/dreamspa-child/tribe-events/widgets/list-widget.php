<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @return string
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

//Check if any posts were found
if ( $posts ) {
    $section_id = empty( $post->ancestors ) ? $post->ID : end( $post->ancestors );
	    
    ?>

	<ol class="hfeed vcalendar">
		<?php
		foreach ( $posts as $post ) :
                    setup_postdata( $post );
                     $custom_fields = get_post_custom();
                     $curr_lang=get_locale();

$event_link=esc_url( tribe_get_event_link() );

if($curr_lang=="en_GB"){
    if(get_field('title_en' )=="") continue;
    $title=get_field('title_en' );
    $event_link = str_replace( '/event/','/en/event/',$event_link);
}
else if($curr_lang=="es_ES"){
    if (get_field('title_es' )=="")  continue;
    $title=get_field('title_es' );
    $event_link = str_replace( '/event/','/es/event/',$event_link);
}
else{
    $title="";
        //den Custom Title holen
        $custom_fields = get_post_custom();
       while( have_rows('courses_') ): the_row();
        if(get_sub_field('title')):
           $title=get_sub_field('title');
         endif;
     endwhile;

    if(!$title)
        $title=get_the_title();
}
			?>
			<li class="tribe-events-list-widget-events <?php tribe_events_event_classes() ?>">

				<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>
				<!-- Event Title -->
				<h4 class="entry-title summary">
					<a href="<?php echo $event_link; ?>" rel="bookmark"><?php echo($title); ?></a>
				</h4>

				<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>
				<!-- Event Time -->

				<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>

				<div class="duration">
					<?php echo tribe_events_event_schedule_details(); ?>
				</div>

				<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>


			</li>
		<?php
		endforeach;
		?>
	</ol><!-- .hfeed -->

	<!--p class="tribe-events-widget-link">
		<a href="<?php //echo esc_url( tribe_get_events_link() ); ?>" rel="bookmark"><?php //_e( 'View All Events', 'tribe-events-calendar' ); ?></a>
	</p-->

	<?php
	//No Events were Found
} else {
	?>
	<p><?php _e( 'There are no upcoming events at this time.', 'tribe-events-calendar' ); ?></p>
<?php
}
?>
