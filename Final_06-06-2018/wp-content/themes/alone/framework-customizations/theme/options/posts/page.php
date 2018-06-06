<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$alone_admin_url          = admin_url();
$options            = array(
	'page-side' => array(
		'title'    => esc_html__( 'Header Image', 'alone' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
			'header_image' => array(
				'label' => esc_html__( 'Add Image', 'alone' ),
				'desc'  => esc_html__( 'Upload header image', 'alone' ),
				// 'help'  => esc_html__( 'You can set a general header image for all your pages from the Theme Settings page under the', 'alone' ) . ' <a target="_blank" href="' . $alone_admin_url . 'themes.php?page=fw-settings#fw-options-tab-pages">' . esc_html__( 'Pages tab', 'alone' ) . '</a>',
				'type'  => 'upload',
			),
		),
	),
	'container-size' => array(
		'title'    => esc_html__( 'Container Size', 'alone' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
			'container_size' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Select Container Size', 'alone' ),
				'value'   => '',
				'help'    => esc_html__( 'This option applies for "Default Template", "Blog page".', 'alone' ),
				'choices' => array(
					'' => esc_html__('Default', 'alone'),
					'container-large' => esc_html__('Container Large', 'alone'),
				)
			),
		),
	),
);
