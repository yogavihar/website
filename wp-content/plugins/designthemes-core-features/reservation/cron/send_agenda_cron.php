<?php $full_path = __FILE__;
$path = explode ( 'wp-content', $full_path );
require_once ($path [0] . '/wp-load.php');

global $wpdb;

	# Members List
	$cp_members = get_posts( array('post_type'=>'dt_staffs','posts_per_page'=>'-1', 'orderby'=>'title' , 'order'=>'asc' ) );
	$current_time = current_time('mysql');
	$current_time = new DateTime($current_time);
	$nextday = $current_time->modify('+1 day');
	$nextday = $nextday->format("Y-m-d");
	
	$data = array();
	$email = array();
	$wp_options = array();
	$update_wp_options = false;
	$mseeage = "";

	if( $cp_members ){
		foreach( $cp_members as $cp_member ){
			$mid = $cp_member->ID;
			$memberwiselist = "SELECT option_name,option_value FROM $wpdb->options WHERE option_name LIKE '_dt_reservation_mid_{$mid}%' AND option_name NOT LIKE '_dt_reservation_mid_{$mid}%_agenda' ORDER BY option_id ASC";
			$rows = $wpdb->get_results( $memberwiselist );
			if($rows):
				foreach( $rows as $row ){
					$option = get_option($row->option_name);
					$date = $option['start'];
					$date = explode("(", $date);
					$date = $date[0];
					$date = new DateTime($date);
					$date = $date->format("Y-m-d");
					if ( $date == $nextday) {
						$data[$mid][] = get_option($row->option_name );
						$wp_options[] = $row->option_name;
					}
				}
			endif;
		}

		if( !empty($data) ){

			$replace = array(
				'tomorrow' => $nextday,
				'staff_name' => '',
				'tomorrow_agenda' => '',
				'company_logo' => 'Company Logo',
				'company_name' => 'Company Name',
				'company_phone' => 'Company Phone',
				'company_address' => 'Company Address',
				'company_website' => 'Company Website');

			foreach( $data as $key => $value ){

				$staff_name = get_the_title($key);

				$info = get_post_meta( $key, "_info",true);
				$info = is_array($info) ? $info : array();
				if( array_key_exists("emailid", $info) ) {

					$mseeage .= "<table border='1' width='100%' cellpadding='5' cellspacing='0'>";
					$mseeage .= '<caption>'.$nextday.' - '.__('Agenda').'</caption>';
					$mseeage .= '<tr>';
					$mseeage .= '<th scope="col">'.__('Title').'</th>';
					$mseeage .= '<th scope="col">'.__('Client').'</th>';
					$mseeage .= '<th scope="col">'.__('Description').'</th>';
					$mseeage .= '<th scope="col">'.__('Service').'</th>';
					$mseeage .= '<th scope="col">'.__('Time').'</th>';
					$mseeage .= '</tr>';
					foreach( $value as $k => $reservation ){
						$mseeage .= '<tr>';
							$mseeage .= '<td>'.$reservation['title'].'</td>';
							$client = get_the_title( $reservation['user'] );
							$mseeage .= '<td>'.$client.'</td>';
							$mseeage .= '<td>'.$reservation['body'].'</td>';
							$service_name = get_the_title( $reservation['service'] );
							$mseeage .= '<td>'.$service_name.'</td>';

							$date = $reservation['start'];
							$date = explode("(", $date);
							$date = $date[0];
							$stime = new DateTime($date);
							$stime = $stime->format('h:i A');
							$end = $reservation['end'];
							$end = explode("(", $end);
							$end = $end[0];
							$end = new DateTime($end);
							$end = $end->format('h:i A');
							$time = $stime.' - '.$end;
							$mseeage .= '<td>'.$time.'</td>';
						$mseeage .= '</tr>';
					}
					$mseeage .= "</table>";

					#Mailing
					$tomorrow_agenda = $mseeage;
					$replace['staff_name'] = $staff_name;
					$replace['tomorrow_agenda'] = $tomorrow_agenda;

					$subject = dttheme_option('company', 'agenda_to_staff_subject');
					$subject = dt_replace_agenda( $subject, $replace);

					$message = dttheme_option('company', 'agenda_to_staff_message' );
					$message = dt_replace_agenda( $message, $replace);

					if( dt_send_mail( $info["emailid"], $subject, $message) ){
						$update_wp_options = true;
					}
					#Mailing
				}
			}

			if( $update_wp_options){
				foreach($wp_options as $wp_option) {
					$wpdb->query("UPDATE $wpdb->options SET option_name = '{$wp_option}_agenda' WHERE option_name = '$wp_option'");
				}
			}
		}
	}?>