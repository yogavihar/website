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
    <table cellspacing="0" cellpadding="0" id="EventInfo">
		<tr>
			<td colspan="2" class="tribe_sectionheader">
				<div class="tribe_sectionheader" style="">
					<h4><?php _e( 'Event Time &amp; Date', 'tribe-events-calendar' ); ?></h4></div>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<table class="eventtable">
					<tr id="recurrence-changed-row">
						<td colspan='2'><?php _e( "You have changed the recurrence rules of this event.  Saving the event will update all future events.  If you did not mean to change all events, then please refresh the page.", 'tribe-events-calendar' ) ?></td>
					</tr>
					<tr>
						<td><?php _e( 'All Day Event:', 'tribe-events-calendar' ); ?></td>
						<td>
							<input tabindex="<?php tribe_events_tab_index(); ?>" type="checkbox" id="allDayCheckbox" name="EventAllDay" value="yes" <?php echo $isEventAllDay; ?> />
						</td>
					</tr>
                                        <tr>
						<td><?php _e( 'Weekly recurring Event:', 'tribe-events-calendar' ); ?></td>
						<td>
							<input tabindex="<?php tribe_events_tab_index(); ?>" type="checkbox" id="weeklyCheckbox" name="EventWeekly" value="yes" <?php echo $isEventWeekly; ?> />
						</td>
					</tr>
					<tr>
						<td style="width:175px;"><?php _e( 'Start Date &amp; Time:', 'tribe-events-calendar' ); ?></td>
						<td id="tribe-event-datepickers" data-startofweek="<?php echo get_option( 'start_of_week' ); ?>">
							<input autocomplete="off" tabindex="<?php tribe_events_tab_index(); ?>" type="text" class="tribe-datepicker" name="EventStartDate" id="EventStartDate" value="<?php echo esc_attr( $EventStartDate ) ?>" />
							<span class="helper-text hide-if-js"><?php _e( 'YYYY-MM-DD', 'tribe-events-calendar' ) ?></span>
				<span class="timeofdayoptions">
					um
					<select tabindex="<?php tribe_events_tab_index(); ?>" name="EventStartHour">
						<?php echo $startHourOptions; ?>
					</select>
					<select tabindex="<?php tribe_events_tab_index(); ?>" name="EventStartMinute">
						<?php echo $startMinuteOptions; ?>
					</select> Uhr
					<?php if ( ! TribeEventsViewHelpers::is_24hr_format() ) : ?>
						<select tabindex="<?php tribe_events_tab_index(); ?>" name="EventStartMeridian">
							<?php echo $startMeridianOptions; ?>
						</select>
					<?php endif; ?>
				</span>
						</td>
					</tr>
					<tr>
						<td><?php _e( 'End Date &amp; Time:', 'tribe-events-calendar' ); ?></td>
						<td>
							<input autocomplete="off" type="text" class="tribe-datepicker" name="EventEndDate" id="EventEndDate" value="<?php echo esc_attr( $EventEndDate ); ?>" />
							<span class="helper-text hide-if-js"><?php _e( 'YYYY-MM-DD', 'tribe-events-calendar' ) ?></span>
				<span class="timeofdayoptions">
					um 
					<select class="tribeEventsInput" tabindex="<?php tribe_events_tab_index(); ?>" name="EventEndHour">
						<?php echo $endHourOptions; ?>
					</select>
					<select tabindex="<?php tribe_events_tab_index(); ?>" name="EventEndMinute">
						<?php echo $endMinuteOptions; ?>
					</select> Uhr
					<?php if ( ! TribeEventsViewHelpers::is_24hr_format() ) : ?>
						<select tabindex="<?php tribe_events_tab_index(); ?>" name="EventEndMeridian">
							<?php echo $endMeridianOptions; ?>
						</select>
					<?php endif; ?>
				</span>
						</td>
					</tr>
					<?php $this->do_action( 'tribe_events_date_display', $postId, true ) ?>
				</table>
			</td>
		</tr>
	</table>
        <table id="event_images" class="eventtable">

            <tr>
                <td colspan="2" class="tribe_sectionheader">
                    <h4>Bilder</h4></td>
            </tr>
            <tr>
                <td>Header Image</td>
                <td>
                    <div id="header-image" class="custom-box">
                        <div class="custom-box">
                            <div class="column one-sixth">
                        <?php
                        if(!empty( $_EventHeaderImage )){
                            echo "<img style='max-width:100%;' src='".esc_attr( $_EventHeaderImage )."'>";
                        }else{ 
                          _e( 'Choose Header Image (1000px width)','dt_themes');  
                        } ?>
                            </div>
                            <div class="column five-sixth last">
                                <div class="image-preview-container">
                                    <input name="EventHeaderImage" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo ( isset( $_EventHeaderImage ) ) ? esc_attr( $_EventHeaderImage ) : ''; ?>"/>
                                    <input type="button" value="<?php _e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                                    <input type="button" value="<?php _e('Remove','dt_themes');?>" class="upload_image_reset" />
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </td>
            </tr>
            <tr>
                <td>Bild 1</td>
                <td>
                    <div id="image1" class="custom-box">
                        <div class="custom-box">
                            <div class="column one-sixth">
                              <?php
                        if(!empty( $_EventImage1 )){
                            echo "<img style='max-width:100%;' src='".esc_attr( $_EventImage1 )."'>";
                        }else{ 
                          _e( 'Choose Image','dt_themes');  
                        } ?>
                            </div>
                            <div class="column five-sixth last">
                                <div class="image-preview-container">
                                    <input name="EventImage1" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo ( isset( $_EventImage1 ) ) ? esc_attr( $_EventImage1 ) : ''; ?>"/>
                                    <input type="button" value="<?php _e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                                    <input type="button" value="<?php _e('Remove','dt_themes');?>" class="upload_image_reset" />
                                </div>

                            </div>
                        </div>
                        
                    </div>
            </td>
        </tr>
            <tr>
                <td>Bild 2</td>
                <td>
                    <div id="image2" class="custom-box">
                        <div class="custom-box">
                            <div class="column one-sixth">
                                                    <?php
                        if(!empty( $_EventImage2 )){
                            echo "<img style='max-width:100%;' src='".esc_attr( $_EventImage2 )."'>";
                        }else{ 
                          _e( 'Choose Image','dt_themes');  
                        } ?>    
                            </div>
                            <div class="column five-sixth last">
                                <div class="image-preview-container">
                                    <input name="EventImage2" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo ( isset( $_EventImage2 ) ) ? esc_attr( $_EventImage2 ) : ''; ?>"/>
                                    <input type="button" value="<?php _e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                                    <input type="button" value="<?php _e('Remove','dt_themes');?>" class="upload_image_reset" />
                                </div>

                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Bild 3</td>
                <td>
                    <div id="image3" class="custom-box">
                        <div class="custom-box">
                            <div class="column one-sixth">
                                                  <?php
                        if(!empty( $_EventImage3 )){
                            echo "<img style='max-width:100%;' src='".esc_attr( $_EventImage3 )."'>";
                        }else{ 
                          _e( 'Choose Image','dt_themes');  
                        } ?>
                            </div>
                            <div class="column five-sixth last">
                                <div class="image-preview-container">
                                    <input name="EventImage3" type="text" class="uploadfield medium" readonly="readonly" value="<?php echo ( isset( $_EventImage3 ) ) ? esc_attr( $_EventImage3 ) : ''; ?>"/>
                                    <input type="button" value="<?php _e('Upload','dt_themes');?>" class="upload_image_button show_preview" />
                                    <input type="button" value="<?php _e('Remove','dt_themes');?>" class="upload_image_reset" />
                                </div>

                            </div>
                        </div>
                   
                    </div>
                </td>
            </tr>
            <tr>
                <td>Thumbnail auf Startseite:</td>
                <td>
                    <select tabindex="<?php tribe_events_tab_index(); ?>" name="EventTeaserImage">
                        <option value="1" <?php if( isset( $_EventTeaserImage ) and $_EventTeaserImage=="1") echo "selected";?>>Bild 1</option>
                        <option value="2" <?php if( isset( $_EventTeaserImage ) and $_EventTeaserImage=="2") echo "selected";?>>Bild 2</option>
                        <option value="3" <?php if( isset( $_EventTeaserImage ) and $_EventTeaserImage=="3") echo "selected";?>>Bild 3</option>
                    </select>
                </td>
            </tr>
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
		<?php $this->do_action( 'tribe_events_cost_table', $postId, true ) ?>


</div>
<?php $this->do_action( 'tribe_events_above_donate', $postId, true ) ?>
<?php $this->do_action( 'tribe_events_details_bottom', $postId, true ) ?>
