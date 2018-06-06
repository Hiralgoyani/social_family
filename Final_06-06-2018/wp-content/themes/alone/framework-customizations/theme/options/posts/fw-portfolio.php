<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$alone_template_directory = get_template_directory_uri();
$alone_admin_url          = admin_url();

$options            = array(
	'side'              => array(
		'title'    => esc_html__( 'Header Image', 'alone' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
			'header_image' => array(
				'label' => esc_html__( 'Add Image', 'alone' ),
				'desc'  => esc_html__( 'Upload header image', 'alone' ),
				// 'help'  => esc_html__( 'You can set a general header image for all your portfolios and portfolio categories from the Theme Settings page under the', 'alone' ) . ' <a target="_blank" href="' . $alone_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-portfolio-posts">' . esc_html__( 'Portfolio tab', 'alone' ) . '</a>',
				'type'  => 'upload',
			),
		),
	),
);
