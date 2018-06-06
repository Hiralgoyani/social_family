<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' ); }

$options   = array(
	'custom_header_image' => array(
		'label' => __( 'Custom Header Image', 'alone' ),
		'desc'  => __( 'Upload the image for header', 'alone' ),
		'help'  => __( 'Select custom header image, could you can select header image for all page at theme Customize/Title bar', 'alone' ),
		'type'  => 'upload',
		'value' => '',
	),
  'custom_category_title' => array(
    'label'   => __('Custom Header Title', 'alone'),
    'desc'    => __( 'Enter custom title product category. (default category name if this field empty)', 'alone' ),
    'type'    => 'text',
    'value'   => '',
  ),
);
