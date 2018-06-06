<?php if (!defined('FW')) die('Forbidden');
$alone_template_directory = get_template_directory_uri();

// MegaMenu row options
$options = array(
	'menu_mega_background_image' => array(
		'label' => esc_html__( 'Background Image', 'alone' ),
		'desc'  => esc_html__( 'Upload background image mega-menu', 'alone' ),
		'type'  => 'upload',
	),
	'menu_mega_sub_menu_position' => array(
		'label' => esc_html__('Sub Menu Position', 'alone'),
		'desc' => esc_html__('Select the sub menu display position', 'alone'),
		'type' => 'image-picker',
		'value' => 'fw-sub-menu-position-left',
		'choices' => array(
			'fw-sub-menu-position-left' => array(
				'small' => array(
					'height' => 50,
					'src' => $alone_template_directory . '/assets/images/image-picker/left-position.jpg',
					'title' => esc_html__('Left', 'alone')
				),
			),
			'fw-sub-menu-position-center' => array(
				'small' => array(
					'height' => 50,
					'src' => $alone_template_directory . '/assets/images/image-picker/center-position.jpg',
					'title' => esc_html__('Center', 'alone')
				),
			),
			'fw-sub-menu-position-right' => array(
				'small' => array(
					'height' => 50,
					'src' => $alone_template_directory . '/assets/images/image-picker/right-position.jpg',
					'title' => esc_html__('Right', 'alone')
				),
			),
		),
	),
);
