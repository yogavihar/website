<?php
/**
 * Events post main metabox
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

?>
<style type="text/css">
	<?php if( class_exists( 'Eventbrite_for_TribeEvents' ) ) : ?>
	.eventBritePluginPlug {
		display: none;
	}

	<?php endif; ?>
</style>
<div id="eventIntro">
	<div id="tribe-events-post-error" class="tribe-events-error error"></div>
	<?php $this->do_action( 'tribe_events_post_errors', $postId, true ) ?>

</div>
<div id='eventDetails' class="inside eventForm">
	<?php $this->do_action( 'tribe_events_detail_top', $postId, true ) ?>
	<?php wp_nonce_field( TribeEvents::POSTTYPE, 'ecp_nonce' ); ?>
	<?php do_action( 'tribe_events_eventform_top', $postId ); ?>
    	</table>
   
	<table id="event_venue" class="eventtable">
		<tr>
			<td colspan="2" class="tribe_sectionheader">
				<h4><?php _e( 'Event Location Details', 'tribe-events-calendar' ); ?></h4></td>
		</tr>
		<?php do_action( 'tribe_venue_table_top', $postId ) ?>
		<?php include( $this->pluginPath . 'admin-views/venue-meta-box.php' ); ?>
	</table>
	<?php do_action( 'tribe_after_location_details', $postId ); ?>
	
	<table id="event_url" class="eventtable">
		<tr>
			<td colspan="2" class="tribe_sectionheader">
				<h4><?php _e( 'Event Website', 'tribe-events-calendar' ); ?></h4></td>
		</tr>
		<tr>
			<td style="width:172px;"><?php _e( 'URL:', 'tribe-events-calendar' ); ?></td>
			<td>
				<input tabindex="<?php tribe_events_tab_index(); ?>" type='text' id='EventURL' name='EventURL' size='25' value='<?php echo ( isset( $_EventURL ) ) ? esc_attr( $_EventURL ) : ''; ?>' placeholder='example.com' />
			</td>
		</tr>
		<?php $this->do_action( 'tribe_events_url_table', $postId, true ) ?>
	</table>

	<?php //$this->do_action( 'tribe_events_details_table_bottom', $postId, true ) ?>

	<table id="event_cost" class="eventtable">
		<?php if ( tribe_events_admin_show_cost_field() ) : ?>
			<tr>
				<td colspan="2" class="tribe_sectionheader">
					<h4><?php _e( 'Event Cost', 'tribe-events-calendar' ); ?></h4></td>
			</tr>

			<tr>
				<td><?php _e( 'Cost:', 'tribe-events-calendar' ); ?></td>
				<td>
                                    <input type='hidden' id='EventCurrencySymbol' name='EventCurrencySymbol' value='€' />
                                    <input type='hidden' id='EventCurrencyPosition' name='EventCurrencyPosition'  value='suffix' />
                                    <input tabindex="<?php tribe_events_tab_index(); ?>" type='text' id='EventCost' name='EventCost' size='6' value='<?php echo ( isset( $_EventCost ) ) ? esc_attr( $_EventCost ) : ''; ?>' /> €
				</td>
			</tr>
		
		<?php endif; ?>
        </table>
		<?php $this->do_action( 'tribe_events_cost_table', $postId, true ) ?>


</div>
<?php $this->do_action( 'tribe_events_above_donate', $postId, true ) ?>
<?php $this->do_action( 'tribe_events_details_bottom', $postId, true ) ?>
