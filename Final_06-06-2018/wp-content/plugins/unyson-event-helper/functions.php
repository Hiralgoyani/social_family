<?php
if( ! function_exists('bearsthemes_event_booking_form') ) :
  function bearsthemes_event_booking_form($post_id = 0) {
    $event_options = fw_get_db_post_option($post_id);
    $limit_space = fw_akg('total_space', $event_options);
    // $event_ext_options = fw_get_db_ext_settings_option('events', '', $default_value = null)
    // echo '<pre>'; print_r($event_options); echo '</pre>';
    if( isset($event_options['enable_booking_form']) && $event_options['enable_booking_form'] != 'yes' ) return;

    $user = wp_get_current_user();
    $maximum_spaces_per_booking = fw_akg('maximum_spaces_per_booking', $event_options);
    $variable_data = array(
      'name'                            => '',
      'email'                           => '',
      'phone'                           => '',
      'comment'                         => '',
      'currency'                        => fw_get_db_ext_settings_option('events', 'currency', $default_value = 'USD'),
      'currency_format'                 => fw_get_db_ext_settings_option('events', 'currency_format', $default_value = '${price}'),
      'price'                           => fw_akg('price', $event_options),
      'total_space'                     => ( empty($limit_space) ) ? '&#8734;' : $limit_space,
      'maximum_spaces_per_booking_text' => ( empty($maximum_spaces_per_booking) ) ? '' : sprintf( __('Maximum %s spaces per booking', 'bearsthemes'), fw_akg('maximum_spaces_per_booking', $event_options)),
      'maximum_spaces_per_booking'      => fw_akg('maximum_spaces_per_booking', $event_options),
      'book_time_end'                   => bearsthemes_event_get_start_time($post_id),
      'current_time'                    => get_the_time( __( 'Y/m/d g:i' ) ),
      'note'                            => fw_akg('note', $event_options),
      'booked'                          => bearsthemes_event_count_booked_by_event($post_id),
    );
    // echo '<pre>'; print_r(fw_get_db_ext_settings_option('events', 'checking_information_template')); echo '</pre>';

    if(bearsthemes_event_is_available($post_id) != true) return;

    if($user->ID != 0) {
      $variable_data['name'] = $user->user_nicename;
      $variable_data['email'] = $user->user_email;
    }
    ?>
    <div class="event-booking-form-wrap">
      <div class="heading-bpooking-form">
        <h4 class="title"><?php _e('Book Online', 'bearsthemes'); ?></h4>
        <p class="note-book-form"><?php echo apply_filters('_event_note_booking_form', __( sprintf('will be closed until date %s', fw_akg('book_time_end', $variable_data)) , 'bearsthemes')); ?></p>
      </div>
      <form method="POST" class="form" data-event-booking-form>
        <?php apply_filters('_fw_ext_event_booking_form_field_before', ''); ?>
        <div class="form-group">
          <label><?php _e('Space *', 'bearsthemes'); ?> <span class="optional">(<?php echo fw_akg('maximum_spaces_per_booking_text', $variable_data) ?>)</span></label>
          <input type="number" name="maximum_spaces_per_booking" min="1" max="<?php echo esc_attr(fw_akg('maximum_spaces_per_booking', $event_options)); ?>" step="1" value="1" required>
        </div>
        <div class="form-group">
          <label><?php _e('Name *', 'bearsthemes'); ?></label>
          <input type="text" name="name" value="<?php echo esc_attr( fw_akg('name', $variable_data) ); ?>" required>
        </div>
        <div class="form-group">
          <label><?php _e('Email *', 'bearsthemes'); ?></label>
          <input type="email" name="email" value="<?php echo esc_attr( fw_akg('email', $variable_data) ); ?>" required>
        </div>
        <div class="form-group">
          <label><?php _e('Phone *', 'bearsthemes'); ?></label>
          <input type="text" name="phone" required>
        </div>
        <div class="form-group">
          <label><?php _e('Comment', 'bearsthemes'); ?></label>
          <textarea name="comment" rows="5"></textarea>
        </div>
        <?php apply_filters('_fw_ext_event_booking_form_field_after', ''); ?>
        <?php
        $note = fw_akg('note', $event_options);
        if(!empty($note)) { ?>
        <p class="event-note">
          <?php echo sprintf( __('Note: %s', 'bearsthemes'), fw_akg('note', $event_options) ); ?>
        </p>
        <?php } ?>
        <?php
        $price = fw_akg('price', $event_options);
        if(!empty($price)) { ?>
        <div class="event-price">
          <label><?php _e('Price', 'bearsthemes'); ?></label>
          <span class="amount">
            <?php
              echo bearsthemes_event_get_price($post_id);
            ?>
          </span>
        </div>
        <?php } ?>
        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-8">
            <span class="space-user-book"><?php echo sprintf(__('Booked: %s / %s', 'bearsthemes'), bearsthemes_event_count_booked_by_event($post_id), fw_akg('total_space', $variable_data)); ?></span>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4 text-right">
            <input type="hidden" name="id" value="<?php echo esc_attr($post_id); ?>">
            <button class="btn btn-submit" type="submit"><?php _e('Send', 'bearsthemes'); ?></button>
          </div>
        </div>
      </form>
    </div>
    <?php
  }
endif;

if(! function_exists('bearsthemes_event_is_available')) :
  /**
   * bearsthemes_event_is_available
   * @param [int] $event_id
   */
  function bearsthemes_event_is_available($event_id = null) {
    if(empty($event_id) || $event_id == 0) return false;

    $event_options = fw_get_db_post_option($event_id);
    $limit_space = fw_akg('total_space', $event_options);

    $variable_data = array(
      'status_post'      => get_post_status($event_id),
      'book_time_end'    => bearsthemes_event_get_start_time($event_id),
      'current_time'     => get_the_time( __( 'Y/m/d g:i' ) ),
      'booked'           => bearsthemes_event_count_booked_by_event($event_id),
    );

    if($variable_data['status_post'] != 'publish') { return false; };

    if(!empty($limit_space) && $limit_space <= $variable_data['booked']) { return false; }

    $date_end = new DateTime($variable_data['book_time_end']);
    $current_date = new DateTime($variable_data['current_time']);
    if( $current_date > $date_end ) { return false; }

    return true;
  }
endif;

if(! function_exists('bearsthemes_event_get_price')) :
  function bearsthemes_event_get_price($post_id = null) {
    if(empty($post_id)) return;

    $event_price = fw_get_db_post_option($post_id, 'price');
    // $currency_format = fw_get_db_ext_settings_option('events', 'currency_format', $default_value = '${price}');

    return bearsthemes_event_make_price($event_price);// str_replace( '{price}', $event_price, $currency_format );
  }
endif;

if(! function_exists('bearsthemes_event_make_price')) :
  function bearsthemes_event_make_price($price) {
    $currency_format = fw_get_db_ext_settings_option('events', 'currency_format', $default_value = '${price}');
    return str_replace( '{price}', $price, $currency_format );
  }
endif;

if(! function_exists('bearsthemes_event_get_start_time')) :
  function bearsthemes_event_get_start_time($post_id = 0) {
    $event_options = fw_get_db_post_option($post_id);
    $start_event = fw_akg('booking_cut_off_date', $event_options);
    $event_date_from = fw_akg('general-event/event_children/0/event_date_range/from', $event_options);

    if( empty( $start_event ) && ! empty($event_date_from) ) { $start_event = $event_date_from; }
    return $start_event;
  }
endif;

if( ! function_exists('bearsthemes_currency_list') ) :
  function bearsthemes_currency_list() {
    $currency_list = array (
      'ALL' => 'Albania Lek',
      'AFN' => 'Afghanistan Afghani',
      'ARS' => 'Argentina Peso',
      'AWG' => 'Aruba Guilder',
      'AUD' => 'Australia Dollar',
      'AZN' => 'Azerbaijan New Manat',
      'BSD' => 'Bahamas Dollar',
      'BBD' => 'Barbados Dollar',
      'BDT' => 'Bangladeshi taka',
      'BYR' => 'Belarus Ruble',
      'BZD' => 'Belize Dollar',
      'BMD' => 'Bermuda Dollar',
      'BOB' => 'Bolivia Boliviano',
      'BAM' => 'Bosnia and Herzegovina Convertible Marka',
      'BWP' => 'Botswana Pula',
      'BGN' => 'Bulgaria Lev',
      'BRL' => 'Brazil Real',
      'BND' => 'Brunei Darussalam Dollar',
      'KHR' => 'Cambodia Riel',
      'CAD' => 'Canada Dollar',
      'KYD' => 'Cayman Islands Dollar',
      'CLP' => 'Chile Peso',
      'CNY' => 'China Yuan Renminbi',
      'COP' => 'Colombia Peso',
      'CRC' => 'Costa Rica Colon',
      'HRK' => 'Croatia Kuna',
      'CUP' => 'Cuba Peso',
      'CZK' => 'Czech Republic Koruna',
      'DKK' => 'Denmark Krone',
      'DOP' => 'Dominican Republic Peso',
      'XCD' => 'East Caribbean Dollar',
      'EGP' => 'Egypt Pound',
      'SVC' => 'El Salvador Colon',
      'EEK' => 'Estonia Kroon',
      'EUR' => 'Euro Member Countries',
      'FKP' => 'Falkland Islands (Malvinas) Pound',
      'FJD' => 'Fiji Dollar',
      'GHC' => 'Ghana Cedis',
      'GIP' => 'Gibraltar Pound',
      'GTQ' => 'Guatemala Quetzal',
      'GGP' => 'Guernsey Pound',
      'GYD' => 'Guyana Dollar',
      'HNL' => 'Honduras Lempira',
      'HKD' => 'Hong Kong Dollar',
      'HUF' => 'Hungary Forint',
      'ISK' => 'Iceland Krona',
      'INR' => 'India Rupee',
      'IDR' => 'Indonesia Rupiah',
      'IRR' => 'Iran Rial',
      'IMP' => 'Isle of Man Pound',
      'ILS' => 'Israel Shekel',
      'JMD' => 'Jamaica Dollar',
      'JPY' => 'Japan Yen',
      'JEP' => 'Jersey Pound',
      'KZT' => 'Kazakhstan Tenge',
      'KPW' => 'Korea (North) Won',
      'KRW' => 'Korea (South) Won',
      'KGS' => 'Kyrgyzstan Som',
      'LAK' => 'Laos Kip',
      'LVL' => 'Latvia Lat',
      'LBP' => 'Lebanon Pound',
      'LRD' => 'Liberia Dollar',
      'LTL' => 'Lithuania Litas',
      'MKD' => 'Macedonia Denar',
      'MYR' => 'Malaysia Ringgit',
      'MUR' => 'Mauritius Rupee',
      'MXN' => 'Mexico Peso',
      'MNT' => 'Mongolia Tughrik',
      'MZN' => 'Mozambique Metical',
      'NAD' => 'Namibia Dollar',
      'NPR' => 'Nepal Rupee',
      'ANG' => 'Netherlands Antilles Guilder',
      'NZD' => 'New Zealand Dollar',
      'NIO' => 'Nicaragua Cordoba',
      'NGN' => 'Nigeria Naira',
      'NOK' => 'Norway Krone',
      'OMR' => 'Oman Rial',
      'PKR' => 'Pakistan Rupee',
      'PAB' => 'Panama Balboa',
      'PYG' => 'Paraguay Guarani',
      'PEN' => 'Peru Nuevo Sol',
      'PHP' => 'Philippines Peso',
      'PLN' => 'Poland Zloty',
      'QAR' => 'Qatar Riyal',
      'RON' => 'Romania New Leu',
      'RUB' => 'Russia Ruble',
      'SHP' => 'Saint Helena Pound',
      'SAR' => 'Saudi Arabia Riyal',
      'RSD' => 'Serbia Dinar',
      'SCR' => 'Seychelles Rupee',
      'SGD' => 'Singapore Dollar',
      'SBD' => 'Solomon Islands Dollar',
      'SOS' => 'Somalia Shilling',
      'ZAR' => 'South Africa Rand',
      'LKR' => 'Sri Lanka Rupee',
      'SEK' => 'Sweden Krona',
      'CHF' => 'Switzerland Franc',
      'SRD' => 'Suriname Dollar',
      'SYP' => 'Syria Pound',
      'TWD' => 'Taiwan New Dollar',
      'THB' => 'Thailand Baht',
      'TTD' => 'Trinidad and Tobago Dollar',
      'TRY' => 'Turkey Lira',
      'TRL' => 'Turkey Lira',
      'TVD' => 'Tuvalu Dollar',
      'UAH' => 'Ukraine Hryvna',
      'GBP' => 'United Kingdom Pound',
      'USD' => 'United States Dollar',
      'UYU' => 'Uruguay Peso',
      'UZS' => 'Uzbekistan Som',
      'VEF' => 'Venezuela Bolivar',
      'VND' => 'Viet Nam Dong',
      'YER' => 'Yemen Rial',
      'ZWD' => 'Zimbabwe Dollar'
    );
    return apply_filters('_fw_ext_event_currency_list', $currency_list);
  }
endif;

if( ! function_exists('bearsthemes_currency_list_options') ) :
  function bearsthemes_currency_list_options() {
    $currency_list = bearsthemes_currency_list();

    array_walk($currency_list, function(&$item, $key) {
        $item = "{$key} - {$item}";
    });

    return $currency_list;
  }
endif;

if(! function_exists('bearsthemes_event_get_payment_methods') ) :
  /**
   * bearsthemes_event_get_payment_methods
   * @param [int] $book_id
   */
  function bearsthemes_event_get_payment_methods($book_id = null) {
    $payment_method = fw_get_db_ext_settings_option('events', 'payment_methods', '');
    if(! is_array($payment_method) && count($payment_method) <= 0) return;

    $payment_method_ui = apply_filters('_fw_ext_event_payment_method_ui', array(
      'local' => __('Local', 'bearsthemes'),
      'paypal' => '<img src="'. get_template_directory_uri() . '/assets/images/paypal-icon.png' .'" alt="paypal"/>',
    ));

    // set detault method
    $payment_method_checked = array_keys($payment_method)[0];

    // set method by book item
    if(! empty($book_id)) {
      $payment_method_by_book_id = fw_get_db_post_option($book_id, 'payment_method');
      if(! empty($payment_method_by_book_id) ) {
        $payment_method_checked = $payment_method_by_book_id;
      }
    }

    $output = array();
    $i = 1;
    foreach($payment_method as $key => $val) {
      if( (int) $val != 1 ) continue;
      $checked = ($payment_method_checked == $key) ? 'checked' : '';
      $output[] = implode('', array(
        '<label class="payment-item payment-'. $key .'" title="'. $key .'">',
          '<input type="radio" name="payment_method" value="'. $key .'" '. $checked .'/>',
          isset($payment_method_ui[$key]) ? $payment_method_ui[$key] : $item,
        '</label>',
      ));
      $i++;
    }

    return implode(' ', $output);
  }
endif;

if(! function_exists('bearsthemes_event_insert_book_data')) :
  function bearsthemes_event_insert_book_data($data = array()) {
    $data = array_merge(
      array(
        'post_title'      => '',
        'post_content'    => '',
        'post_status'     => 'pending',

        'name'            => '',
        'email'           => '',
        'phone'           => '',
        'space'           => '',
        'event_id'        => '',
      ), $data);
    extract($data);

    // Create post object
    $data_post = array(
      'post_type'       => 'event-bookings',
      'post_title'      => $post_title,
      'post_content'    => $post_content,
      'post_status'     => $post_status,
      'meta_input'      => array(
        'fw_options' => array(
          'name'      => $name,
          'email'     => $email,
          'phone'     => $phone,
          'space'     => $space,
          'event_id'  => $event_id,
        )
      )
    );

    // Insert the post into the database
    $pid = wp_insert_post( $data_post );

    if($pid) {
      add_post_meta($pid, 'fw_option:name', $name, true);
      add_post_meta($pid, 'fw_option:email', $email, true);
      add_post_meta($pid, 'fw_option:phone', $phone, true);
      add_post_meta($pid, 'fw_option:space', $space, true);
      add_post_meta($pid, 'fw_option:event_id', $event_id, true);
    }

    do_action('_fw_ext_event_after_insert_book_data', $pid);

    return $pid;
  }
endif;

if(! function_exists('bearsthemes_event_build_booking_info')) :
  function bearsthemes_event_build_booking_info($book_id = null) {
    $checking_information_template = fw_get_db_ext_settings_option('events', 'checking_information_template');
    $event_id = fw_get_db_post_option($book_id, 'event_id', '');
    $space = fw_get_db_post_option($book_id, 'space', '');
    $price = fw_get_db_post_option($event_id, 'price', '');
    $total = ! empty($price) ? bearsthemes_event_make_price((float) $price * (float) $space) : '';
    $current_status = get_post_status($book_id);

    $status_str = array(
      'pending' => __('Pending', 'Greenfresh'),
      'approve' => __('Approve', 'Greenfresh'),
      'reject'  => __('Reject', 'Greenfresh'),
      'paid'    => __('Paid', 'Greenfresh'),
      'refund'  => __('Refund', 'Greenfresh'),
    );

    $variables = array(
      '{event_id}' => $event_id,
      '{book_id}'  => $book_id,
      '{name}'     => fw_get_db_post_option($book_id, 'name', ''),
      '{email}'    => fw_get_db_post_option($book_id, 'email', ''),
      '{phone}'    => fw_get_db_post_option($book_id, 'phone', ''),
      '{spaces}'   => $space,
      '{comment}'  => get_post_field('post_content', $book_id),
      '{status}'   => $status_str[$current_status],
      '{price}'    => ! empty($price) ? bearsthemes_event_make_price((float) $price) : '',
      '{total}'    => $total,
    );

    $output = str_replace(array_keys($variables), array_values($variables), $checking_information_template);
    return $output; // '<div class="table-event-ext table-checking-information">' . apply_filters('_fw_ext_event_filter_checking_information', $output, $event_id, $space) . '</div>';
  }
endif;

if(! function_exists('bearsthemes_event_count_booked_by_event')) :
  function bearsthemes_event_count_booked_by_event($event_id) {
    $args = array(
      'post_type' => 'event-bookings',
      'post_status' => 'approve',
      'meta_query' => array(
        array(
          'key' => 'fw_option:event_id',
          'value' => $event_id,
        ),
      ),
    );
    $query = new WP_Query( $args );
    $space = 0;
    if(count($query->posts) > 0) {
      foreach($query->posts as $item) {
        $space += (int) fw_get_db_post_option($item->ID, 'space', 0);
      }
    }

    return $space;
  }
endif;

if(! function_exists('bearsthemes_event_check_user_booked')) :
  function bearsthemes_event_check_user_booked($event_id, $email) {

    $args = array(
      'post_type' => 'event-bookings',
      'post_status' => array( 'pending', 'approve', 'reject', 'paid', 'refund' ),
      'meta_query' => array(
        'relation' => 'AND',
        array(
          'key' => 'fw_option:email',
          'value' => $email,
        ),
        array(
          'key' => 'fw_option:event_id',
          'value' => $event_id,
        ),
      ),
    );
    $query = new WP_Query( $args );
    // echo '<pre>'; print_r($query); echo '</pre>';
    return ($query->post_count > 0) ? true : false;
  }
endif;

if(! function_exists('bearsthemes_event_set_payment_method')) :
  function bearsthemes_event_set_payment_method($book_id, $method) {
    fw_set_db_post_option($book_id, 'payment_method', $method);
  }
endif;

if(! function_exists('bearsthemes_event_get_payment_method')) :
  function bearsthemes_event_get_payment_method($book_id) {
    return fw_get_db_post_option($book_id, 'payment_method', '');
  }
endif;

if(! function_exists('bearsthemes_event_buil_data_paypal')) :
function bearsthemes_event_buil_data_paypal($book_id) {

  $event_id = fw_get_db_post_option($book_id, 'event_id', '');
  $price = fw_get_db_post_option($event_id, 'price');
  $space = fw_get_db_post_option($book_id, 'space', '');
  $total = (float) $price * (float) $space;

  $test_mode = array('no' => false, 'yes' => true);
  return array(
    'username' 		=> fw_get_db_ext_settings_option('events', 'paypal_api_username', ''),
    'password' 		=> fw_get_db_ext_settings_option('events', 'paypal_api_password', ''),
    'signature' 	=> fw_get_db_ext_settings_option('events', 'paypal_api_signature', ''),
    'test_mode'   => $test_mode[fw_get_db_ext_settings_option('events', 'payPal_sandbox', '')],

    'name'        => get_the_title($event_id),
    'quantity'    => $space,
    'amount'      => $total,
    'currency'    => fw_get_db_ext_settings_option('events', 'currency', ''),
    'returnUrl'   => add_query_arg( 'event_return', 'paypal', get_permalink($event_id) ),
    'cancelUrl'   => add_query_arg( 'event_cancel', 'paypal', get_permalink($event_id) ),
  );
}
endif;

if(! function_exists('bearsthemes_event_booking_data_by_event')) :
  function bearsthemes_event_booking_data_by_event($event_id = null, $tool = true) {
    global $post;
    $event_id = ! empty($event_id) ? $event_id : $post->ID;
    if(empty($event_id)) return;

    $args = array(
      'post_type' => 'event-bookings',
      'posts_per_page' => -1,
      'post_status' => array('pending', 'approve', 'reject', 'paid', 'refund'),
      'orderby' => 'ID',
      'order' => 'DESC',
      'meta_query' => array(
        array(
          'key' => 'fw_option:event_id',
          'value' => $event_id,
        ),
      ),
    );
    $result = get_posts( $args );

    if(isset($_POST['export_pdf'])) {
      unset($_POST['export_pdf']);
      $pdf_content = bearsthemes_event_booking_data_by_event($event_id, false);
      $pdf_name = __('booking_data-', 'bearsthemes') . str_replace(' ', '_', get_the_title($event_id));
      bearsthemes_event_export_booking_data_pdf(
        apply_filters('_fw_ext_event_filter_content_export_pdf', $pdf_content),
        apply_filters('_fw_ext_event_filter_name_export_pdf', $pdf_name)
      );
    }

    ob_start(); // echo '<pre>'; print_r($the_query); echo '</pre>';
    if(count($result) > 0) {
      ?>
      <?php if($tool == true) : ?>
        <div class="btn-tool">
          <button type="button" class="button button-primary button-large" data-fw-event-export-booking-data="<?php echo esc_attr($event_id); ?>"><?php _e('Export PDF', 'bearsthemes'); ?></button>
          <br />
          <hr />
          <br />
        </div>
      <?php endif; ?>

      <table>
        <tr>
          <th style="text-align: left; width: 120px;"><?php _e('Event Name:', 'bearsthemes'); ?></th>
          <td><?php echo get_the_title($event_id); ?></td>
        </tr>
        <tr>
          <th style="text-align: left;"><?php _e('Date Start:', 'bearsthemes'); ?></th>
          <td><?php echo bearsthemes_event_get_start_time($event_id); ?></td>
        </tr>
        <tr>
          <th style="text-align: left;"><?php _e('Limit Space:', 'bearsthemes'); ?></th>
          <td><?php echo fw_get_db_post_option($event_id, 'total_space', ''); ?></td>
        </tr>
        <tr>
          <th style="text-align: left;"><?php _e('Booked Space:', 'bearsthemes'); ?></th>
          <td data-fw-ext-event-booked-count="<?php echo esc_attr($event_id); ?>"><?php echo bearsthemes_event_count_booked_by_event($event_id); ?></td>
        </tr>
      </table>
      <br />
      <hr />
      <br />
      <table class="wp-list-table widefat fixed">
        <thead>
          <tr>
            <th width="60px"><?php _e('Book ID', 'bearsthemes'); ?></th>
            <th><?php _e('Name', 'bearsthemes'); ?></th>
            <th><?php _e('Email', 'bearsthemes'); ?></th>
            <th width="60px"><?php _e('Space', 'bearsthemes'); ?></th>
            <th width="120px"><?php _e('Payment Method', 'bearsthemes'); ?></th>
            <th width="100px"><?php _e('Status', 'bearsthemes'); ?></th>
          </tr>
        </thead>
        <tbody class="event-booking-table-listing">
          <?php
          foreach($result as $item) {
            $book_link = get_edit_post_link($item->ID);
            echo implode('', array(
              '<tr>',
                "<td><a href='{$book_link}' target='_blank'>#{$item->ID}</a></td>",
                "<td>". fw_get_db_post_option($item->ID, 'name', '') ."</td>",
                "<td><a href='mailto:". fw_get_db_post_option($item->ID, 'email', '') ."'>". fw_get_db_post_option($item->ID, 'email', '') ."</a></td>",
                "<td>". fw_get_db_post_option($item->ID, 'space', '') ."</td>",
                "<td>". fw_get_db_post_option($item->ID, 'payment_method', '') ."</td>",
                "<td>". bearsthemes_event_booking_builder_select_status( $item->ID, array('data-edit-fw-ext-event-handle' => $item->ID ) ) ."</td>",
              '</tr>',
            ));
          }
          ?>
        </tbody>
      </table>
      <?php
    } else {
      _e('Not item!', 'bearsthemes');
    }

    $output = ob_get_clean();

    return apply_filters('_fw_ext_event_filter_booking_data_by_event', $output);
  }
endif;

if(! function_exists('bearsthemes_event_booking_builder_select_status')) :
  function bearsthemes_event_booking_builder_select_status($book_id = null, $atts = array()) {
    $list_status = array(
      'pending' => __('Pending', 'bearsthemes'),
      'approve' => __('Approve', 'bearsthemes'),
      'reject'  => __('Reject', 'bearsthemes'),
      'paid'    => __('Paid', 'bearsthemes'),
      'refund'  => __('Refund', 'bearsthemes'),
    );

    $current_status = get_post_status($book_id);

    $atts = array_map(function($attr_key, $attr_value) {
      return "{$attr_key}='{$attr_value}'";
    }, array_keys($atts), array_values($atts));

    $output = array();
    $output[] = '<select '. implode(' ', $atts) .'>';
    foreach($list_status as $key => $val) {
      $selected = ($key == $current_status) ? 'selected' : '';
      $output[] = "<option value='{$key}' {$selected}>{$val}</option>";
    }
    $output[] = '</select>';


    return implode('', $output);
  }
endif;

if(! function_exists('bearsthemes_event_set_status')) :
  function bearsthemes_event_set_status($book_id, $status) {
    $post = array( 'ID' => $book_id, 'post_status' => $status );
    return wp_update_post($post);
  }
endif;

if(! function_exists('bearsthemes_get_options_event')) :
  function bearsthemes_get_options_event() {

  }
endif;
