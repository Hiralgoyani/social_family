<?php

/** @internal */
if(! function_exists('_filter_theme_fw_ext_events_custom_events_post_slug')) :
function _filter_theme_fw_ext_events_custom_events_post_slug($slug) {
    return 'event';
}
endif;
add_filter('fw_ext_events_post_slug', '_filter_theme_fw_ext_events_custom_events_post_slug');

/** @internal */
if(! function_exists('_filter_theme_fw_ext_events_custom_events_taxonomy_slug')) :
	function _filter_theme_fw_ext_events_custom_events_taxonomy_slug($slug) {
	    return 'events';
	}
endif;
add_filter('fw_ext_events_taxonomy_slug', '_filter_theme_fw_ext_events_custom_events_taxonomy_slug');

/** @internal */
if(! function_exists('_filter_theme_fw_ext_events_custom_options')) :
function _filter_theme_fw_ext_events_custom_options($options) {
    if(! defined('FW')) return;

    return array_merge($options, array(
        'events_booking' => array(
            'title'   => __('Bookings/Registration Options', 'bearsthemes'),
            'type'    => 'tab',
            'options' => array(
              'enable_booking_form' => array(
                'type'  => 'switch',
                'label' => __('Enable Booking Form', 'bearsthemes'),
                'value' => 'no',
                'left-choice' => array(
                  'value' => 'yes',
                  'label' => __('Yes', 'bearsthemes'),
                ),
                'right-choice' => array(
                    'value' => 'no',
                    'label' => __('No', 'bearsthemes'),
                ),
              ),
							'price' => array(
                'type'  => 'text',
                'label' => __('Price', 'bearsthemes'),
                'desc'  => __('Leave blank for free.', 'bearsthemes'),
              ),
              'total_space' => array(
                'type'  => 'text',
                'label' => __('Total Space', 'bearsthemes'),
                'desc'  => __('Remaining spaces will not be available if total booking spaces reach this limit. Leave blank for no limit.', 'bearsthemes'),
              ),
              'maximum_spaces_per_booking' => array(
                'type'  => 'text',
                'label' => __('Maximum Spaces Per Booking', 'bearsthemes'),
                'desc'  => __('If set, the total number of spaces for a single booking to this event cannot exceed this amount.Leave blank for no limit.', 'bearsthemes'),
              ),
              'booking_cut_off_date' => array(
                'label' => __('Booking Cut-Off Date', 'bearsthemes'),
                'desc'  => __('This is the definite date after which bookings will be closed for this event, regardless of individual ticket settings above. Default value will be the event start date.', 'bearsthemes'),
                'type'  => 'datetime-picker',
                'value' => '',
                'datetime-picker' => array(
                    'format'        => 'Y/m/d H:i', // Format datetime.
                    'maxDate'       => false,  // By default there is not maximum date , set a date in the datetime format.
                    'minDate'       => false,  // By default minimum date will be current day, set a date in the datetime format.
                    'timepicker'    => true,   // Show timepicker.
                    'datepicker'    => true,   // Show datepicker.
                    'defaultTime'   => '12:00' // If the input value is empty, timepicker will set time use defaultTime.
                ),
              ),
							'note' => array(
                'type'  => 'textarea',
                'label' => __('Note', 'bearsthemes'),
                'desc'  => __('This note will be displayed below form', 'bearsthemes'),
              ),
            )
       ),
			 'booking_data' => array(
				 'title'   => __('Bookings Data', 'bearsthemes'),
				 'type'    => 'tab',
				 'options' => array(
					 'booking_data_listing' => array(
						 'type'  => 'html',
						 'label' => false,
						 'html'  => bearsthemes_event_booking_data_by_event(),
					 ),
				 )
			 )
    ));
}
endif;
add_filter('fw_ext_events_post_options', '_filter_theme_fw_ext_events_custom_options');

if(! function_exists('_filter_theme_fw_ext_events_options')) :
	function _filter_theme_fw_ext_events_options($options = array()) {
    if(! defined('FW')) return;

		$options['pricing-tab'] = array(
			'title'   => false,
			'type'    => 'tab',
			'title'   => __( 'Bookings', 'bearsthemes' ),
			'options' => array(
				'pricing_settings' => array(
					'title'   => __( 'Pricing Options', 'bearsthemes' ),
					'type'    => 'box',
					'options' => array(
						'currency' => array(
					    'type'  => 'select',
					    'value' => 'USD',
					    'label' => __('Currency', 'bearsthemes'),
					    'choices' => bearsthemes_currency_list_options(),
							'desc' => __('Choose your currency for displaying event pricing.', 'bearsthemes'),
						),
						'currency_format' => array(
							'type' => 'text',
							'value' => '${price}',
							'label' => __('Currency Format', 'bearsthemes'),
							'desc' => __('Choose how prices are displayed. {price} will be replaced by the number. ${price} = $10,000,000.00', 'bearsthemes'),
						)
					)
				),

			)
		);

		$options['template-tab'] = array(
			'title'   => false,
			'type'    => 'tab',
			'title'   => __( 'Templates', 'bearsthemes' ),
			'options' => array(
				'checking_information_template_settings' => array(
					'title'   => __( 'Checking Information Template', 'bearsthemes' ),
					'type'    => 'box',
					'options' => array(
						'checking_information_template' => array(
							'type' => 'wp-editor',
							'size' => 'large', // small, large
							'editor_height' => 250,
					    'wpautop' => true,
					    'editor_type' => 'tinymce', // tinymce, html
							'value' => '<table>
								<tr>
									<th>Book ID</th>
									<td>{book_id}</td>
								</tr>
								<tr>
									<th>Name</th>
									<td>{name}</td>
								</tr>
								<tr>
									<th>Email</th>
									<td>{email}</td>
								</tr>
								<tr>
									<th>Phone</th>
									<td>{phone}</td>
								</tr>
								<tr>
									<th>Spaces</th>
									<td>{spaces}</td>
								</tr>
								<tr>
									<th>Comment</th>
									<td>{comment}</td>
								</tr>
								<tr>
									<th>Status</th>
									<td>{status}</td>
								</tr>
							</table>
							<br />
							<table>
								<tr>
									<th>Price</th>
									<td>{price}</td>
								</tr>
								<tr>
									<th>Total</th>
									<td>{total}</td>
								</tr>
							</table>',
							'label' => false,
							'desc' => '<strong>Template for checking information, could you use key string bellow to replace variable</strong> <br/>
								{book_id} => Booking ID<br />
								{name} => Name<br />
								{email} => Email<br />
								{phone} => Phone<br />
								{spaces} => Number of spaces per booking<br />
								{comment} => Comment <br />
								{status} => Status Booking<br />
								{price} => Price of event <br />
								{total} => Total price',
						),
					)
				),
				'user_mail_checking_information_template_settings' => array(
					'title'   => __( 'User Mail Checking Information Template', 'bearsthemes' ),
					'type'    => 'box',
					'options' => array(
						'user_mail_checking_information_subject_template' => array(
							'type' => 'text',
							'value' => 'Event Booking Information | {event_title}',
							'desc' => '<strong>could you use key string bellow to replace variable</strong> <br />
							{event_title} => Event Title',
						),
						'user_mail_checking_information_template' => array(
							'type' => 'wp-editor',
							'size' => 'large', // small, large
							'editor_height' => 250,
					    'wpautop' => true,
					    'editor_type' => 'tinymce', // tinymce, html
							'value' => '<div>
								<h2>Booking Information:</h2>
								<p>This is a your booking information for event {event_title_link}</p>
								<div>{checking_information_template}</div>
								<br />
								<p>Ps: If you have unfinished booking form please click <a href="{event_link}">here</a> to continue.</p>
								<p>---------------------------</p>
								<strong>Best Regards !</strong>
							</div>',
							'label' => false,
							'desc' => '<strong>could you use key string bellow to replace variable</strong> <br />
							{event_title} => Event Title <br />
							{event_link} => Event link <br />
							{event_title_link} => Event title click on redirect to event <br />
							{checking_information_template} => Checking information template option',
						)
					)
				),
				'successful_template_settings' => array(
					'title'   => __( 'Successful Template', 'bearsthemes' ),
					'type'    => 'box',
					'options' => array(
						'successful_template' => array(
							'type' => 'wp-editor',
							'size' => 'large', // small, large
							'editor_height' => 250,
					    'wpautop' => true,
					    'editor_type' => 'tinymce', // tinymce, html
							'value' => __('Thanks! You can check the booking information at your mailbox and wait for admin approval.', 'bearsthemes'),
							'label' => false,
							'desc' => __('', 'bearsthemes'),
						)
					)
				),
			)
		);

		$options['payment-tab'] = array(
			'type'    => 'tab',
			'title'   => __( 'Payments', 'bearsthemes' ),
			'options' => array(
				'payment-method-settings' => array(
					'title'   => __( 'Payment Method Settings', 'bearsthemes' ),
					'type'    => 'box',
					'options' => array(
						'payment_methods' => array(
					    'type'  => 'checkboxes',
					    'value' => array(
					        'local' => true,
					    ),
					    'label' => __('Payment Methods', 'bearsthemes'),
					    'desc'  => __('You could select multi method for payment.', 'bearsthemes'),
					    // 'help'  => __('Help tip', 'bearsthemes'),
					    'choices' => apply_filters('_fw_ext_event_filter_payment_methods', array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
					        'local' => __('Local', 'bearsthemes'),
					        'paypal' => __('Paypal', 'bearsthemes'),
						    )
							),
					    // Display choices inline instead of list
					    'inline' => false,
						)
					)
				),

				'paypal-settings' => array(
					'title'   => __( 'Paypal Settings', 'bearsthemes' ),
					'type'    => 'box',
					'options' => array(
						'palpal_text' => array(
					   	'type' => 'html',
							'label' => false,
							'html' => 'Enter your PayPal API credentials to process refunds via PayPal. Learn how to access your PayPal API Credentials <a href="https://developer.paypal.com/webapps/developer/docs/classic/api/apiCredentials/#creating-an-api-signature" target="_blank">here</a>.',
						),
						'paypal_api_username' => array(
					   	'type' => 'text',
							'value' => '',
							'label' => __('API Username', 'bearsthemes'),
						),
						'paypal_api_password' => array(
					   	'type' => 'text',
							'value' => '',
							'label' => __('API Password', 'bearsthemes'),
						),
						'paypal_api_signature' => array(
					   	'type' => 'text',
							'value' => '',
							'label' => __('API Signature', 'bearsthemes'),
						),
						'payPal_sandbox' => array(
							'type'  => 'switch',
					    'value' => 'no',
					    'label' => __('PayPal Sandbox', 'bearsthemes'),
					    'desc'  => 'PayPal sandbox can be used to test payments. Sign up for a developer account <a href="https://developer.paypal.com/" target="_blank">here</a>.',
					    'left-choice' => array(
					        'value' => 'yes',
					        'label' => __('Yes', 'bearsthemes'),
					    ),
					    'right-choice' => array(
					        'value' => 'no',
					        'label' => __('No', 'bearsthemes'),
					    ),
						)
					)
				),
			)
		);

		return $options;
	}
endif;
add_filter('fw_ext_events_settings_options', '_filter_theme_fw_ext_events_options');

if( ! function_exists('_fw_event_booking_get_info') ) :
	function _fw_event_booking_get_info($id = null) {
    if(! defined('FW')) return;

		extract( $_POST );
		$event_id = $id;

		if(empty($id)){
			echo json_encode(array(
				'status' => 201, // Event id not found
				'type' => 'error',
				'heading' => __('Error 201:', 'bearsthemes'),
				'output' => __('Event not found!', 'bearsthemes'),
			)); exit();
		}

		// check user booked by event
		if(bearsthemes_event_check_user_booked($event_id, trim($email))) {
			echo json_encode(array(
				'status' => 203,
				'type' => 'info',
				'heading' => __('Message 203:', 'bearsthemes'),
				'output' => __('This email account has already been used for this event, could you please use other email or check booking information on your mailbox!', 'bearsthemes'),
			)); exit();
		}

		// insert book data
		$current_datetime = current_time( 'mysql' );
		$event_book_id = bearsthemes_event_insert_book_data(array(
			'post_title'      => $name . ' - ' . $email,
			'post_content'    => $comment,
			'name'            => $name,
			'email'           => $email,
			'phone'           => $phone,
			'space'           => $maximum_spaces_per_booking,
			'event_id'        => $event_id,
		));

		if(empty($event_book_id) && $event_book_id == 0) {
			return json_encode(array(
				'status' => 202,
				'type' => 'error',
				'heading' => __('Error 202:', 'bearsthemes'),
				'output' => __('Sorry, can\'t create Booking information, please reload page and try again!', 'bearsthemes'),
			));
		}
		$output = bearsthemes_event_build_booking_info($event_book_id);
		// echo $output;

		do_action( '_fw_ext_event_action_after_save_booking', $event_book_id );

		echo json_encode(array(
			'status' => 200, // get book info success
			'heading' => __('Checking information', 'bearsthemes'),
			'type' => 'success',
			'bcode' => base64_encode("{$event_book_id}:{$email}"),
			'output' => '<div class="table-event-ext table-checking-information">' . apply_filters('_fw_ext_event_filter_checking_information', $output, $event_book_id) . '</div>',
		));
		exit();
	}
endif;
add_action( 'wp_ajax__fw_event_booking_get_info', '_fw_event_booking_get_info' );
add_action( 'wp_ajax_nopriv__fw_event_booking_get_info', '_fw_event_booking_get_info' );

if(! function_exists('_fw_ext_event_booking_now')) :
	/**
	 * _fw_ext_event_booking_now
	 *	@param [array] $data
	 *	book_id 				: book ID
   *	handle 					: payment | success
   *  payment_method 	: local | paypal
	 */
	function _fw_ext_event_booking_now($data = array()) {
    if(! defined('FW')) return;

		$data = isset($data['handle']) ? $data : $_POST;
		$variables = array_merge(array(
			'book_id' 				=> '',
			'handle'	 				=> '',
			'payment_method' 	=> ''
		), $data);

		$event_available = bearsthemes_event_is_available(fw_get_db_post_option($variables['book_id'], 'event_id'));
		if($event_available != true) $variables['handle'] = 'event_not_available';

		extract($variables);
		// extract($_POST);

		switch ($handle) {
			case 'payment':
				bearsthemes_event_set_payment_method($book_id, $payment_method);
				do_action('_fw_ext_event_payment_method_handle_' . $payment_method, $_POST);
				break;

			case 'success':
				echo json_encode(array(
					'status' 	=> 205,
					'heading' => __('Success', 'bearsthemes'),
					'output' 	=> fw_get_db_ext_settings_option('events', 'successful_template', ''),
					'type' 		=> 'success',
				));
				break;

			case 'event_not_available':
				echo json_encode(array(
					'status' 	=> 206,
					'heading' => __('Sorry', 'bearsthemes'),
					'output' 	=> __('Event not available for book online!', 'bearsthemes'),
					'type' 		=> 'info',
				));
				break;

			default:
				echo json_encode(array(
					'status' 	=> 204,
					'heading' => __('Error 204:', 'bearsthemes'),
					'output' 	=> __('Internal error!!!', 'bearsthemes'),
					'type' 		=> 'error',
				));
				break;
		}
		exit();
	}
endif;
add_action( 'wp_ajax__fw_ext_event_booking_now', '_fw_ext_event_booking_now' );
add_action( 'wp_ajax_nopriv__fw_ext_event_booking_now', '_fw_ext_event_booking_now' );

if(! function_exists('_fw_ext_event_open_book_info')) :
	function _fw_ext_event_open_book_info() {
    if(! defined('FW')) return;

		extract($_POST);
		if($code) {
			list($book_id, $email) = explode(':', base64_decode($code));
			$book_status = get_post_status( $book_id );
			$booking_info = bearsthemes_event_build_booking_info($book_id);

			switch ($book_status) {
				case 'pending':
					$output = '<div class="table-event-ext table-checking-information">' . apply_filters('_fw_ext_event_filter_checking_information', $booking_info, $book_id) . '</div>';
					echo json_encode(array(
						'heading' => __('Checking Information', 'bearsthemes'),
						'output' => $output,
						'book_status' => $book_status,
						'type' => '',
					));
					break;

				case 'approve':
					echo json_encode(array(
						'heading' => __('Thank You!', 'bearsthemes'),
						'output' => __('Your booking is approved', 'bearsthemes'),
						'book_status' => $book_status,
						'type' => 'success',
					));
					break;

				case 'paid':
					echo json_encode(array(
						'heading' => __('Thanks, You Paid!', 'bearsthemes'),
						'output' => fw_get_db_ext_settings_option('events', 'successful_template', ''),
						'book_status' => $book_status,
						'type' => 'success',
					));
					break;
			}
		}
		exit();
	}
endif;
add_action( 'wp_ajax__fw_ext_event_open_book_info', '_fw_ext_event_open_book_info' );
add_action( 'wp_ajax_nopriv__fw_ext_event_open_book_info', '_fw_ext_event_open_book_info' );

if(! function_exists('_fw_ext_event_change_status_by_book_id')) :
	function _fw_ext_event_change_status_by_book_id() {
    if(! defined('FW')) return;

		// print_r($_POST);
		extract($_POST);
		echo bearsthemes_event_set_status($book_id, $status);
		exit();
	}
endif;
add_action( 'wp_ajax__fw_ext_event_change_status_by_book_id', '_fw_ext_event_change_status_by_book_id' );
add_action( 'wp_ajax_nopriv__fw_ext_event_change_status_by_book_id', '_fw_ext_event_change_status_by_book_id' );

if(! function_exists('_fw_ext_event_return_booked_count_by_event_id')) :
	function _fw_ext_event_return_booked_count_by_event_id() {
    if(! defined('FW')) return;

		extract($_POST);
		echo bearsthemes_event_count_booked_by_event($event_id);
		exit();
	}
endif;
add_action( 'wp_ajax__fw_ext_event_return_booked_count_by_event_id', '_fw_ext_event_return_booked_count_by_event_id' );
add_action( 'wp_ajax_nopriv__fw_ext_event_return_booked_count_by_event_id', '_fw_ext_event_return_booked_count_by_event_id' );

if(! function_exists('_fw_ext_event_payment_method_handle_local')) :
	function _fw_ext_event_payment_method_handle_local($data) {
    if(! defined('FW')) return;

		// update method
		_fw_ext_event_booking_now(array('book_id' => $data['book_id'], 'handle' => 'success'));
	}
endif;
add_action('_fw_ext_event_payment_method_handle_local', '_fw_ext_event_payment_method_handle_local', 10, 1);

if(! function_exists('_fw_ext_event_payment_method_handle_paypal')) :
	function _fw_ext_event_payment_method_handle_paypal($data) {
    if(! defined('FW')) return;

		if( !session_id()) session_start();
		extract($data);
		// set ss book_id
		$_SESSION['fw_event'] = array('book_id' => $book_id);

		// print_r($data);
		$params = bearsthemes_event_buil_data_paypal($book_id);
		$payment_url = fw_ext_events_payment_paypal_get_link($params);
		// echo $payment_url;
		echo json_encode(array(
			'js_callback' => 'paypal_handle',
			'params' => array(
				'request_url' 	=> $payment_url,
				'data' 					=> $data,
			),
		));
		exist();
	}
endif;
add_action('_fw_ext_event_payment_method_handle_paypal', '_fw_ext_event_payment_method_handle_paypal', 10, 1);

if(! function_exists('_fw_ext_event_register_session')) :
	function _fw_ext_event_register_session(){
    if(! defined('FW')) return;

	  if( !session_id() ) session_start();
	}
endif;
add_action('init','_fw_ext_event_register_session');

if(! function_exists('_fw_ext_event_payment_paypal_return')) :
function _fw_ext_event_payment_paypal_return() {
  if(! defined('FW')) return;

	if(isset($_GET['event_return']) && $_GET['event_return'] == 'paypal') {
		$book_id = fw_akg('fw_event/book_id', $_SESSION);
		$params = bearsthemes_event_buil_data_paypal($book_id);

		$response = fw_ext_events_payment_paypal_complete_purchase($params);
		$data = $response->getData();
		$ACK = fw_akg('ACK', $data);

		// change status book item
		if($ACK == 'Success') do_action('_fw_ext_event_paypal_payment_after_success', $response, $book_id);
		return;
	}

	if(isset($_GET['event_cancel']) && $_GET['event_return'] == 'paypal') {
		do_acction('_fw_ext_event_paypal_payment_cancel', $response_paypal, $book_id);
		return;
	}
}
endif;
add_action('init', '_fw_ext_event_payment_paypal_return');

if(! function_exists('_fw_ext_event_paypal_payment_after_success')) :
function _fw_ext_event_paypal_payment_after_success($response, $book_id) {
  if(! defined('FW')) return;

	$event_id 			= fw_get_db_post_option($book_id, 'event_id', '');
	$email 					= fw_get_db_post_option($book_id, 'email', '');
	$event_link 		= get_permalink($event_id);
	$bcode 					= base64_encode("{$book_id}:{$email}");

	// save
	$transaction_ID = $response->getTransactionReference();
	add_post_meta($book_id, 'fw_option:transaction_id', $transaction_ID, true);

	// update post status
	$post_data = array(
		'ID' 					=> $book_id,
		'post_status' => 'approve',
	);
  wp_update_post( $post_data );

	// clear session book id
	unset($_SESSION['fw_event']);

	wp_redirect($event_link . "#{$bcode}");
}
endif;
add_action('_fw_ext_event_paypal_payment_after_success', '_fw_ext_event_paypal_payment_after_success', 10, 2);

if(! function_exists('_fw_ext_events_send_mail_booking_detail_for_user')) :
	/**
	 * _fw_ext_events_send_mail_booking_detail_for_user
	 * @param [int] $book_id
	 */
	function _fw_ext_events_send_mail_booking_detail_for_user($book_id) {
    if(! defined('FW')) return;

		// mail handle
		$mail_template = fw_get_db_ext_settings_option('events', 'user_mail_checking_information_template');
		$subject_template = fw_get_db_ext_settings_option('events', 'user_mail_checking_information_subject_template');

		$email = fw_get_db_post_option($book_id, 'email');
		$bcode = base64_encode("{$book_id}:{$email}");
		$variables_replace = array(
			'{event_title}' 										=> get_the_title(fw_get_db_post_option($book_id, 'event_id')),
			'{event_link}' 											=> get_permalink(fw_get_db_post_option($book_id, 'event_id')) . '#' . $bcode,
			'{event_title_link}' 								=> '<a href="'. get_permalink(fw_get_db_post_option($book_id, 'event_id')) .'">'. get_the_title(fw_get_db_post_option($book_id, 'event_id')) .'</a>',
			'{checking_information_template}' 	=> bearsthemes_event_build_booking_info($book_id),
		);

		$data = array(
			'to' 				=> $email,
			'subject' 	=> str_replace(array_keys($variables_replace), array_values($variables_replace), $subject_template),
			'body' 			=> str_replace(array_keys($variables_replace), array_values($variables_replace), $mail_template),
			'headers' 	=> array('Content-Type: text/html; charset=UTF-8'),
		);
		// print_r($data);
		extract($data);

		wp_mail( $to, $subject, $body, $headers );
	}
endif;
add_action( '_fw_ext_event_action_after_save_booking', '_fw_ext_events_send_mail_booking_detail_for_user', 10, 1 );

if(! function_exists('_fw_ext_events_include_price_after_information') ) :
	function _fw_ext_events_include_price_after_information($output, $book_id) {
    if(! defined('FW')) return;

		$event_id = fw_get_db_post_option($book_id, 'event_id', '');
		$event_options = fw_get_db_post_option($event_id);
		$price = fw_akg('price', $event_options);

		if(! empty($price)) {
			$output .= "<input type='hidden' name='book_id' value='{$book_id}' />";
			$output .= "<input type='hidden' name='handle' value='payment' />";

			$output .= '<br />
			<div class="event-payment-method-box">
				<h4>'. __('Payment method:', 'bearsthemes') .'</h4>
				<div class="payment-list-wrap">
					'. bearsthemes_event_get_payment_methods($book_id) .'
				</div>
			</div>';
		} else{
			$output .= "<input type='hidden' name='book_id' value='{$book_id}' />";
			$output .= "<input type='hidden' name='handle' value='success' />";
		}

		return $output;
	}
endif;
add_filter('_fw_ext_event_filter_checking_information', '_fw_ext_events_include_price_after_information', 10, 2);

/* register post event-booking */
if(! function_exists('_fw_ext_event_post_register_bookings') ) :
	function _fw_ext_event_post_register_bookings() {
    if(! defined('FW')) return;

		$post_names = apply_filters( 'fw_ext_event_booking_post_type_name',
			array(
				'singular' => __( 'Booking', 'bearsthemes' ),
				'plural'   => __( 'Bookings', 'bearsthemes' )
			)
		);

		register_post_type( 'event-bookings',
			array(
				'labels'             => array(
					'name'               => __( 'Bookings', 'bearsthemes' ),
					'singular_name'      => __( 'Booking', 'bearsthemes' ),
					'add_new'            => __( 'Add New', 'bearsthemes' ),
					'add_new_item'       => sprintf( __( 'Add New %s', 'bearsthemes' ), $post_names['singular'] ),
					'edit'               => __( 'Edit', 'bearsthemes' ),
					'edit_item'          => sprintf( __( 'Edit %s', 'bearsthemes' ), $post_names['singular'] ),
					'new_item'           => sprintf( __( 'New %s', 'bearsthemes' ), $post_names['singular'] ),
					'all_items'          => sprintf( __( 'All %s', 'bearsthemes' ), $post_names['plural'] ),
					'view'               => sprintf( __( 'View %s', 'bearsthemes' ), $post_names['singular'] ),
					'view_item'          => sprintf( __( 'View %s', 'bearsthemes' ), $post_names['singular'] ),
					'search_items'       => sprintf( __( 'Search %s', 'bearsthemes' ), $post_names['plural'] ),
					'not_found'          => sprintf( __( 'No %s Found', 'bearsthemes' ), $post_names['plural'] ),
					'not_found_in_trash' => sprintf( __( 'No %s Found In Trash', 'bearsthemes' ), $post_names['plural'] ),
					'parent_item_colon'  => '' /* text for parent types */
				),
				'description'        => __( 'Create a booking item', 'bearsthemes' ),
				'public'             => true,
				'show_ui'            => true,
				'show_in_menu'       => 'edit.php?post_type=fw-event',
				'publicly_queryable' => true,
				/* queries can be performed on the front end */
				'show_in_nav_menus'  => false,
				'hierarchical'       => false,
				'query_var'          => true,
				/* Sets the query_var key for this post type. Default: true - set to $post_type */
				'supports'           => array(
					'title', /* Text input field to create a post title. */
					'editor',
					'custom-fields'
					// 'thumbnail', /* Displays a box for featured image. */
				)
			)
		);

		PostStatusExtender::extend('event-bookings', array(
			'approve' => array(
          'label' => __('Approve', 'bearsthemes'),
          'public' => true,
          'exclude_from_search' => true,
          'show_in_admin_all_list' => true,
          'show_in_admin_status_list' => true,
          'label_count' => _n_noop('Approve <span class="count">(%s)</span>', 'Approve <span class="count">(%s)</span>'),
      ),
			'reject' => array(
          'label' => __('Reject', 'bearsthemes'),
          'public' => true,
          'exclude_from_search' => true,
          'show_in_admin_all_list' => true,
          'show_in_admin_status_list' => true,
          'label_count' => _n_noop('Reject <span class="count">(%s)</span>', 'Reject <span class="count">(%s)</span>'),
      ),
			'paid' => array(
          'label' => __('Paid', 'bearsthemes'),
          'public' => true,
          'exclude_from_search' => true,
          'show_in_admin_all_list' => true,
          'show_in_admin_status_list' => true,
          'label_count' => _n_noop('Paid <span class="count">(%s)</span>', 'Paid <span class="count">(%s)</span>'),
      ),
			'refund' => array(
          'label' => __('Refund', 'bearsthemes'),
          'public' => true,
          'exclude_from_search' => true,
          'show_in_admin_all_list' => true,
          'show_in_admin_status_list' => true,
          'label_count' => _n_noop('Sold <span class="count">(%s)</span>', 'Sold <span class="count">(%s)</span>'),
      ),
    ));
	}
endif;
add_action('init', '_fw_ext_event_post_register_bookings');

if(! function_exists('_fw_ext_event_filter_admin_add_post_bookings_options') ) :
	function _fw_ext_event_filter_admin_add_post_bookings_options( $options, $post_type ) {
    if(! defined('FW')) return;

		if ( $post_type === 'event-bookings' ) {
			$options[] = array(
				'event_details ' => array(
					'context' => 'side',
					'title'   => __( 'Event Details', 'bearsthemes' ),
					'type'    => 'box',
					'options' => array(
						'event_id' => array(
							'label' => __('Event ID', 'bearsthemes'),
							'type'  => 'text',
							'fw-storage' => array(
									'type' => 'post-meta',
									'post-meta' => 'fw_option:event_id',
							),
							'desc'  => false,
						),
					)
				),
				'personal_details ' => array(
					'context' => 'side',
					'title'   => __( 'Personal Details', 'bearsthemes' ),
					'type'    => 'box',
					'options' => array(
						'name' => array(
							'label' => __('Name', 'bearsthemes'),
							'type'  => 'text',
							'fw-storage' => array(
									'type' => 'post-meta',
									'post-meta' => 'fw_option:name',
							),
							'desc'  => false,
						),
						'email' => array(
							'label' => __('Email', 'bearsthemes'),
							'type'  => 'text',
							'fw-storage' => array(
									'type' => 'post-meta',
									'post-meta' => 'fw_option:email',
							),
							'desc'  => false,
						),
						'phone' => array(
							'label' => __('Phone', 'bearsthemes'),
							'type'  => 'text',
							'fw-storage' => array(
									'type' => 'post-meta',
									'post-meta' => 'fw_option:phone',
							),
							'desc'  => false,
						),
					)
				),
				'booking_details' => array(
					'context' => 'side',
					'title'   => __( 'Booking Details', 'bearsthemes' ),
					'type'    => 'box',
					'options' => array(
						'space' => array(
							'label' => __('Space', 'bearsthemes'),
							'type'  => 'text',
							'fw-storage' => array(
									'type' => 'post-meta',
									'post-meta' => 'fw_option:space',
							),
							'desc'  => false,
						),
						'payment_method' => array(
							'label' => __('Payment Method', 'bearsthemes'),
							'value' => '',
							'type'  => 'text',
							'fw-storage' => array(
									'type' => 'post-meta',
									'post-meta' => 'fw_option:payment_method',
							),
							'desc'  => false,
						),
					)
				),
			);
		}

		return $options;
	}
endif;
add_filter( 'fw_post_options', '_fw_ext_event_filter_admin_add_post_bookings_options', 10, 2 );

if(! function_exists('_fw_ext_event_booking_columns_head')) :
  function _fw_ext_event_booking_columns_head($defaults) {
    if(! defined('FW')) return;

    $defaults['book_id']  = __('Booking ID', 'Booking ID');
    $defaults['event']  = __('Event', 'bearsthemes');
    $defaults['space']  = __('Space', 'bearsthemes');
    $defaults['status'] = __('Status', 'bearsthemes');
    return $defaults;
  }
endif;
add_filter('manage_event-bookings_posts_columns', '_fw_ext_event_booking_columns_head');

if(! function_exists('_fw_ext_event_booking_columns_content')) :
  function _fw_ext_event_booking_columns_content($column_name, $post_ID) {
    if(! defined('FW')) return;

		$event_id = fw_get_db_post_option($post_ID, 'event_id');

    switch ($column_name) {
			case 'book_id':
				?>
				<strong><?php echo esc_attr($post_ID); ?></strong>
				<?php
				break;

      case 'event':
				?>
				<a href="<?php echo esc_attr(get_permalink($event_id)); ?>"><?php echo get_the_title($event_id); ?></a>
				<?php
        break;

      case 'space':
				echo fw_get_db_post_option($post_ID, 'space');
        break;

      case 'status':
				echo get_post_status($post_ID);
        break;
    }
  }
endif;
add_action('manage_event-bookings_posts_custom_column', '_fw_ext_event_booking_columns_content', 10, 2);

if(! function_exists('_fw_ext_event_columns_head')) :
  function _fw_ext_event_columns_head($defaults) {
      $defaults['start_date']  = __('Start Date', 'bearsthemes');
      return $defaults;
  }
endif;
add_filter('manage_fw-event_posts_columns', '_fw_ext_event_columns_head');

if(! function_exists('_fw_ext_event_columns_content')) :
function _fw_ext_event_columns_content($column_name, $post_ID) {
	switch ($column_name) {
		case 'start_date':
			echo bearsthemes_event_get_start_time($post_ID);
			break;
	}
}
endif;
add_action('manage_fw-event_posts_custom_column', '_fw_ext_event_columns_content', 10, 2);

if(! function_exists('_fw_ext_event_articles_event_id_request_admin')) :
	function _fw_ext_event_articles_event_id_request_admin($request) {
	    if( isset($_GET['event_id']) && !empty($_GET['event_id']) ) {
	        $request['meta_key'] = 'fw_option:event_id';
	        $request['meta_value'] = $_GET['event_id'];
	    }
	    return $request;
	}
endif;
if(! function_exists('_fw_ext_event_booking_add_extra_tablenav')) :
	function _fw_ext_event_booking_add_extra_tablenav($post_type){
    global $wpdb;

    /** Grab the results from the DB */
		$results = $wpdb->get_col("
        SELECT DISTINCT meta_value
        FROM ". $wpdb->postmeta ."
        WHERE meta_key = 'fw_option:event_id'
        ORDER BY meta_value DESC
    ");
		// echo '<pre>'; print_r($results); echo '</pre>';

    /** Ensure there are options to show */
    if(count($results) <= 0) return;
		?>
		<label>
			<?php _e('Event:','bearsthemes') ?>
	    <select name="event_id" id="event_id" style="float: none;">
	        <option value="">Show all</option>
	        <?php foreach ($results as $event_id) { ?>
	        <option value="<?php echo esc_attr( $event_id ); ?>" <?php if(isset($_GET['event_id']) && !empty($_GET['event_id']) ) selected($_GET['event_id'], $event_id); ?>><?php echo esc_attr("#{$event_id}") . ' - ' . get_the_title($event_id); ?></option>
	        <?php } ?>
	    </select>
		</label>
    <?php
	}
endif;
if( is_admin() && isset($_GET['post_type']) && $_GET['post_type'] == 'event-bookings' ) {
  	add_filter('request', '_fw_ext_event_articles_event_id_request_admin');
    add_filter('restrict_manage_posts', '_fw_ext_event_booking_add_extra_tablenav');
}

if(! function_exists('_fw_ext_event_booking_save')) :
	/**
	 * _fw_ext_event_booking_save
	 */
	function _fw_ext_event_booking_save( $post_id ) {

	    /*
	     * In production code, $slug should be set only once in the plugin,
	     * preferably as a class property, rather than in each function that needs it.
	     */
	    $post_type = get_post_type($post_id);

	    // If this isn't a 'book' post, don't update it.
	    if ( "event-bookings" != $post_type ) return;

			/* status */
			$post_status = get_post_status( $post_id );

			do_action('_fw_ext_event_booking_action_after_change_status', $post_status, $post_id);
	}
endif;
add_action( 'save_post', '_fw_ext_event_booking_save', 10, 3 );

if(! function_exists('_fw_ext_event_booking_send_mail_user')) :
	/**
	 * _fw_ext_event_booking_send_mail_user
	 * @param [string] $status
	 * @param [int] $post_id
	 */
	function _fw_ext_event_booking_send_mail_user($status, $post_id) {
		switch ($status) {
			case 'approve':
				_fw_ext_events_send_mail_booking_detail_for_user($post_id);
				break;
		}
	}
endif;
add_action('_fw_ext_event_booking_action_after_change_status', '_fw_ext_event_booking_send_mail_user', 10, 2);
