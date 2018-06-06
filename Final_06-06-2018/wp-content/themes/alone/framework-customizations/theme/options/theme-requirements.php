<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$alone_server_requirements = fw()->theme->manifest->get('server_requirements');

// wp version
global $wp_version;
$alone_wp_required_version = fw()->theme->manifest->get('requirements/wordpress/min_version');
if( version_compare($wp_version, $alone_wp_required_version , '<=') ){
	$alone_wp_version_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.$wp_version.'</strong>';
	$alone_wp_version_description_text = '<span class="fw-error-message">' .esc_html__( "The version of WordPress installed on your site.", "alone" ). ' '. esc_html__( 'We recommend you update WordPress to the latest version. The minimum required version for this theme is:', 'alone' ) .' <strong>'.$alone_wp_required_version. '</strong>. <a target="_blank" href="'.esc_url( admin_url('update-core.php') ).'">'.esc_html__('Do that right now', 'alone').'</a></span>';
}
else{
	$alone_wp_version_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.$wp_version.'</strong>';
	$alone_wp_version_description_text = esc_html__( "The version of WordPress installed on your site", "alone" );
}

// wp multisite
if ( is_multisite() ){
	$alone_multisite_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('Yes', 'alone').'</strong>';
}
else{
	$alone_multisite_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('No', 'alone').'</strong>';
}

// wp debug mode
if ( defined('WP_DEBUG') && WP_DEBUG ){
	$alone_wp_debug_mode_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.esc_html__('Yes', 'alone').'</strong>';
	$alone_wp_debug_mode_description_text = '<span class="fw-error-message">' .esc_html__( 'Displays whether or not WordPress is in Debug Mode. This mode is used by developers to test the theme. We recommend you turn it off for an optimal user experience on your website.', 'alone' ).' <a href="https://codex.wordpress.org/WP_DEBUG" target="_blank">'.esc_html__('Learn how to do it', 'alone').'</a></span>';
}
else{
	$alone_wp_debug_mode_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('No', 'alone').'</strong>';
	$alone_wp_debug_mode_description_text = esc_html__( 'Displays whether or not WordPress is in Debug Mode', 'alone' );
}

// wp memory limit
$alone_memory = alone_return_memory_size( WP_MEMORY_LIMIT );
$alone_requirements_wp_memory_limit = alone_return_memory_size($alone_server_requirements['server']['wp_memory_limit']);
if ( $alone_memory < $alone_requirements_wp_memory_limit ) {
	$alone_wp_memory_limit_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.size_format( $alone_memory ).'</strong>';
	$alone_wp_memory_limit_description_text = '<span class="fw-error-message">' . esc_html__('The maximum amount of memory (RAM) that your site can use at one time.', 'alone') . ' '.__( 'We recommend setting memory to at least <strong>256MB</strong>. Please define memory limit in <strong>wp-config.php</strong> file.', 'alone').' <a href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">'.esc_html__('Learn how to do it', 'alone' ).'</a></span>';
} else {
	$alone_wp_memory_limit_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.size_format( $alone_memory ).'</strong>';
	$alone_wp_memory_limit_description_text = esc_html__('The maximum amount of memory (RAM) that your site can use at one time', 'alone');
}

// php version
if ( function_exists( 'phpversion' ) ) {
	if( version_compare(phpversion(), $alone_server_requirements['server']['php_version'], '<=') ){
		$alone_php_version_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.esc_html( phpversion() ).'</strong>';
		$alone_php_version_description_text = '<span class="fw-error-message">' .esc_html__( 'The version of PHP installed on your hosting server.', 'alone' ).' '.esc_html__( 'We recommend you update PHP to the latest version. The minimum required version for this theme is:', 'alone' ) .' <strong>'.$alone_server_requirements['server']['php_version']. '</strong>. '.__('Contact your hosting provider, they can install it for you.', 'alone').'</span>';
	}
	else{
		$alone_php_version_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html( phpversion() ).'</strong>';
		$alone_php_version_description_text =  esc_html__( 'The version of PHP installed on your hosting server', 'alone' );
	}
}
else{
	$alone_php_version_text = __('No PHP Installed', 'alone');
}

// php post max size
$alone_requirements_post_max_size = alone_return_memory_size($alone_server_requirements['server']['post_max_size']);
if ( alone_return_memory_size( ini_get('post_max_size') ) < $alone_requirements_post_max_size ) {
	$alone_php_post_max_size_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.size_format(alone_return_memory_size( ini_get('post_max_size') ) ).'</strong>';
	$alone_php_post_max_size_description_text = '<span class="fw-error-message">' .esc_html__( 'The largest file size that can be contained in one post.', 'alone'  ).' '. esc_html__( 'We recommend setting the post maximum size to at least:', 'alone' ) .' <strong>'.size_format($alone_requirements_post_max_size). '</strong>'.'. <a href="#" target="_blank">'.__('Learn how to do it','alone').'</a></span>';
}
else{
	$alone_php_post_max_size_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.size_format(alone_return_memory_size( ini_get('post_max_size') ) ).'</strong>';
	$alone_php_post_max_size_description_text = esc_html__( 'The largest file size that can be contained in one post', 'alone'  );
}

// php time limit
$alone_time_limit = ini_get('max_execution_time');
$alone_required_php_time_limit = (int)$alone_server_requirements['server']['php_time_limit'];
if ( $alone_time_limit < $alone_required_php_time_limit && $alone_time_limit != 0 ) {
	$alone_php_time_limit_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.$alone_time_limit.'</strong>';
	$alone_php_time_limit_description_text = '<span class="fw-error-message">'.esc_html__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups).', 'alone'  ).' '.__( 'We recommend setting the maximum execution time to at least', 'alone').' <strong>'.$alone_required_php_time_limit.'</strong>'.'. <a href="http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded" target="_blank">'.__('Learn how to do it','alone').'</a></span>';
} else {
	$alone_php_time_limit_description_text = esc_html__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)', 'alone'  );
	$alone_php_time_limit_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.$alone_time_limit.'</strong>';
}

// php max input vars
$alone_max_input_vars = ini_get('max_input_vars');
$alone_required_input_vars = $alone_server_requirements['server']['php_max_input_vars'];
if ( $alone_max_input_vars < $alone_required_input_vars ) {
	$alone_php_max_input_vars_description_text = '<span class="fw-error-message">'.esc_html__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'alone'  ). ' '.__( 'Please increase the maximum input variables limit to:','alone').' <strong>' . $alone_required_input_vars . '</strong>'.'. <a href="#" target="_blank">'.__('Learn how to do it','alone').'</a></span>';
	$alone_php_max_input_vars_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.$alone_max_input_vars.'</strong>';
} else {
	$alone_php_max_input_vars_description_text = esc_html__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'alone'  );
	$alone_php_max_input_vars_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.$alone_max_input_vars.'</strong>';
}

// suhosin
if( extension_loaded( 'suhosin' ) ) {
	$alone_suhosin_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.__('Yes', 'alone').'</strong>';
	$alone_suhosin_description_text = '<span class="fw-error-message">'. esc_html__( 'Suhosin is an advanced protection system for PHP installations and may need to be configured to increase its data submission limits', 'alone'  ).'</span>';
	$alone_max_input_vars      = ini_get( 'suhosin.post.max_vars' );
	$alone_required_input_vars = $alone_server_requirements['server']['suhosin_post_max_vars'];
	if ( $alone_max_input_vars < $alone_required_input_vars ) {
		$alone_suhosin_description_text .= '<span class="fw-error-message">' . sprintf( __( '%s - Recommended Value is: %s. <a href="%s" target="_blank">Increasing max input vars limit.</a>', 'alone' ), $alone_max_input_vars, '<strong>' . ( $alone_required_input_vars ) . '</strong>', '#' ) . '</span>';
	}
}
else {
	$alone_suhosin_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.__('No', 'alone').'</strong>';
	$alone_suhosin_description_text = esc_html__( 'Suhosin is an advanced protection system for PHP installations.', 'alone'  );
}

// mysql version
global $wpdb;
if( version_compare($wpdb->db_version(), $alone_server_requirements['server']['mysql_version'], '<=') ){
	$alone_mysql_version_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.$wpdb->db_version().'</strong>';
	$alone_mysql_version_description_text = '<span class="fw-error-message">' . esc_html__( 'The version of MySQL installed on your hosting server.', 'alone'  ).' '. esc_html__( 'We recommend you update MySQL to the latest version. The minimum required version for this theme is:', 'alone' ) .' <strong>'.$alone_server_requirements['server']['mysql_version']. '</strong> '.__('Contact your hosting provider, they can install it for you.', 'alone').'</span>';
}
else{
	$alone_mysql_version_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.$wpdb->db_version().'</strong>';
	$alone_mysql_version_description_text = esc_html__( 'The version of MySQL installed on your hosting server', 'alone'  );
}

// max upload size
$alone_requirements_max_upload_size = alone_return_memory_size($alone_server_requirements['server']['max_upload_size']);
if ( wp_max_upload_size() < $alone_requirements_max_upload_size ) {
	$alone_max_upload_size_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.size_format(wp_max_upload_size()).'</strong>';
	$alone_max_upload_size_description_text = '<span class="fw-error-message">' . esc_html__( 'The largest file size that can be uploaded to your WordPress installation.', 'alone'  ). ' '.esc_html__( 'We recommend setting the maximum upload file size to at least:', 'alone' ) .' <strong>'.size_format($alone_requirements_max_upload_size). '</strong>. <a href="'. esc_url('http://docs.themefuse.com/alone/your-theme/theme-settings/how-to-set-a-maximum-file-upload-size', 'alone') .'" target="_blank">'.__('Learn how to do it', 'alone').'</a></span>';
}
else{
	$alone_max_upload_size_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.size_format(wp_max_upload_size()).'</strong>';
	$alone_max_upload_size_description_text = esc_html__( 'The largest file size that can be uploaded to your WordPress installation', 'alone'  );
}

// fsockopen
if( function_exists( 'fsockopen' ) || function_exists( 'curl_init' ) ) {
	$alone_fsockopen_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html__('Yes', 'alone').'</strong>';
	$alone_fsockopen_description_text = __( 'Payment gateways can use cURL to communicate with remote servers to authorize payments, other plugins may also use it when communicating with remote services', 'alone' );
}
else{
	$alone_fsockopen_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.esc_html__('No', 'alone').'</strong>';
	$alone_fsockopen_description_text = '<span class="fw-error-message">'.__( 'Payment gateways can use cURL to communicate with remote servers to authorize payments, other plugins may also use it when communicating with remote services. Your server does not have <strong>fsockopen</strong> or <strong>cURL</strong> enabled thus PayPal IPN and other scripts which communicate with other servers will not work. Contact your hosting provider, they can install it for you.', 'alone' ).'</span>';
}

$options = array(
	'requirements_tab' => array(
		'title'   => esc_html__( 'Requirements', 'alone' ),
		'type'    => 'tab',
		'options' => array(
			'wordpress-environment-box' => array(
				'title'   => esc_html__( 'WordPress Environment', 'alone' ),
				'type'    => 'box',
				'options' => array(
					'home_url' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'Home URL', 'alone' ),
						'desc'  => esc_html__( "The URL of your site's homepage", "alone" ),
						'type'  => 'html',
						'html'  => '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_url(home_url()).'</strong>',
					),
					'site_url' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'Site URL', 'alone' ),
						'desc'  => esc_html__( "The root URL of your site", "alone" ),
						'type'  => 'html',
						'html'  => '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_url(site_url()).'</strong>',
					),
					'wp_version' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'WP Version', 'alone' ),
						'desc'  => $alone_wp_version_description_text,
						'type'  => 'html',
						'html'  => $alone_wp_version_text,
					),
					'wp_multisite' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'WP Multisite', 'alone' ),
						'type'  => 'html',
						'desc'  => esc_html__( 'Whether or not you have WordPress Multisite enabled', 'alone' ),
						'html'  => $alone_multisite_text,
					),
					'wp_debug_mode' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'WP Debug Mode', 'alone' ),
						'type'  => 'html',
						'desc'  => $alone_wp_debug_mode_description_text,
						'html'  => $alone_wp_debug_mode_text,
					),
					'wp_memory_limit' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'WP Memory Limit', 'alone' ),
						'desc'  => $alone_wp_memory_limit_description_text,
						'type'  => 'html',
						'html'  => $alone_wp_memory_limit_text,
					),
				)
			),
			'server-environment-box' => array(
				'title'   => esc_html__( 'Server Environment', 'alone' ),
				'type'    => 'box',
				'options' => array(
					'server_info' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'Server Info', 'alone' ),
						'desc'  => esc_html__( "Information about the web server that is currently hosting your site", "alone" ),
						'type'  => 'html',
						'html'  => '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html( $_SERVER['SERVER_SOFTWARE'] ).'</strong>',
					),
					'php_version' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Version', 'alone' ),
						'desc'  => $alone_php_version_description_text,
						'type'  => 'html',
						'html'  => $alone_php_version_text,
					),
					'php_post_max_size' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Post Max Size', 'alone' ),
						'desc'  => $alone_php_post_max_size_description_text,
						'type'  => 'html',
						'html'  => $alone_php_post_max_size_text,
					),
					'php_time_limit' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Time Limit', 'alone' ),
						'desc'  => $alone_php_time_limit_description_text,
						'type'  => 'html',
						'html'  => $alone_php_time_limit_text,
					),
					'php_max_input_vars' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Max Input Vars', 'alone' ),
						'desc'  => $alone_php_max_input_vars_description_text,
						'type'  => 'html',
						'html'  => $alone_php_max_input_vars_text,
					),
					'suhosin_installed' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'SUHOSIN Installed', 'alone' ),
						'desc'  => $alone_suhosin_description_text,
						'type'  => 'html',
						'html'  => $alone_suhosin_text,
					),
					'zip_archive' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'ZipArchive', 'alone' ),
						'desc'  => class_exists( 'ZipArchive' ) ? esc_html__('ZipArchive is required for importing demos. They are used to import and export zip files specifically for sliders', 'alone') : '<span class="fw-error-message">'.esc_html__('ZipArchive is required for importing demos. They are used to import and export zip files specifically for sliders.', 'alone').' '.esc_html__('Contact your hosting provider, they can install it for you.', 'alone').'</span>',
						'type'  => 'html',
						'html'  => class_exists( 'ZipArchive' ) ? '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html__('Yes', 'alone').'</strong>' : '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.esc_html__('No', 'alone').'</strong>',
					),
					'mysql_version' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'MySQL Version', 'alone' ),
						'desc'  => $alone_mysql_version_description_text,
						'type'  => 'html',
						'html'  => $alone_mysql_version_text,
					),
					'max_upload_size' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'Max Upload Size', 'alone' ),
						'desc'  => $alone_max_upload_size_description_text,
						'type'  => 'html',
						'html'  => $alone_max_upload_size_text,
					),
					'fsockopen' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'fsockopen/cURL', 'alone' ),
						'desc'  => $alone_fsockopen_description_text,
						'type'  => 'html',
						'html'  => $alone_fsockopen_text,
					),
					'legend' => array(
						'label' => false,
						'type'  => 'html',
						'html'  => '',
						'desc'  => '<i class="fw-yes-icon dashicons dashicons-yes"></i><span class="fw-success-message">'.esc_html__('Meets minimum requirements', 'alone').'</span><br><i class="fw-no-icon dashicons dashicons-info"></i><span class="fw-error-message">'.esc_html__("We have some improvements to suggest", "alone").'</span>',
					),
				)
			),
		)
	),
);
