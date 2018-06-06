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
				// 'help'  => esc_html__( '', 'alone' ) . ' <a target="_blank" href="' . $alone_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-portfolio-posts">' . esc_html__( 'Portfolio tab', 'alone' ) . '</a>',
				'type'  => 'upload',
			),
		),
	),
  'gallery'              => array(
		'title'    => esc_html__( 'Gallery Image', 'alone' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
      'gallery_images' => array(
        'label' => esc_html__( 'Add Image', 'alone' ),
        'desc'  => esc_html__( 'Upload header image', 'alone' ),
        'type'  => 'multi-upload',
      ),
		),
	),
	'video'              => array(
		'title'    => esc_html__( 'Video', 'alone' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
      'video' => array(
        'label' => esc_html__( 'Add Video Link', 'alone' ),
        'desc'  => '<p>Add video for recipe you can use Vimeo or Youtube</p> Example: <br /><b>Youtube</b>: <u>https://www.youtube.com/watch?v=meBbDqAXago</u><br /><b>Vimeo</b>: <u>https://vimeo.com/1084537</u>',
        'type'  => 'text',
      ),
		),
	),
);
