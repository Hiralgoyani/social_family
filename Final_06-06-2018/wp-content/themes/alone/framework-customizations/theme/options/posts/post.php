<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$alone_template_directory = get_template_directory_uri();
$alone_admin_url          = admin_url();

$blog_layout_creative_opts = array();

if(function_exists('fw_get_db_customizer_option')) :
	$blog_type = fw_get_db_customizer_option('post_settings/blog_type', '');
	$alone_blog_layout_style_cretive = array(
		'default' => array(
			'parent' => array(
				'small' => array(
					'height' => 70,
					'src' => $alone_template_directory . '/assets/images/image-picker/blog-style6.jpg'
				),
				'large' => array(
					'height' => 214,
					'src' => $alone_template_directory . '/assets/images/image-picker/blog-style6.jpg'
				),
			),
		),
		'background' => array(
			'parent' => array(
				'small' => array(
					'height' => 70,
					'src' => $alone_template_directory . '/assets/images/image-picker/blog-style7.jpg'
				),
				'large' => array(
					'height' => 214,
					'src' => $alone_template_directory . '/assets/images/image-picker/blog-style7.jpg'
				),
			),
		),
	);

	if($blog_type == 'blog-2') {
		$blog_layout_creative_opts = array(
			'blog_layout_style_cretive' => array(
				'type' => 'image-picker',
				'label' => esc_html__('Layout Style', 'alone'),
				'desc' => esc_html__('Select the style display', 'alone'),
				'help' => esc_html__( 'This option applies on post listing pages and not on the post detail page.', 'alone' ),
				'value' => 'default',
				'choices' => alone_load_decentralize_setting( $alone_blog_layout_style_cretive, 'parent' ),
			),
		);
	}
endif;

$options = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			'general' => array(
				'title'   => esc_html__( 'General Settings', 'alone' ),
				'type'    => 'tab',
				'options' => array(
					'post_general_tab' => array(
						'type'          => 'multi',
						'label'         => false,
						'inner-options' => array(
							'image_size'             => array(
								'type'    => 'short-select',
								'label'   => esc_html__( 'Image Size', 'alone' ),
								'value'   => 'alone-image-medium',
								'help'    => esc_html__( 'This option applies on post listing pages and not on the post detail page.', 'alone' ),
								'choices' => array(
									array( // optgroup
										'attr'    => array('label' => esc_html__('Original', 'alone')),
										'choices' => array(
											'full' => esc_html__( 'Original Size', 'alone' ),
										),
									),
									array( // optgroup
										'attr'    => array('label' => esc_html__('WP Image Size', 'alone')),
										'choices' => array(
											'thumbnail' => esc_html__( 'Thumbnail', 'alone' ),
											'medium'  => esc_html__( 'Medium', 'alone' ),
											'medium_large'  => esc_html__( 'Medium Large', 'alone' ),
											'large'  => esc_html__( 'Large', 'alone' ),
										),
									),
									array( // optgroup
										'attr'    => array('label' => esc_html__('Theme Custom Image Size', 'alone')),
										'choices' => array(
											'alone-image-large' => esc_html__( 'Large (1228 x 691)', 'alone' ),
											'alone-image-medium'  => esc_html__( 'Medium (614 x 346)', 'alone' ),
											'alone-image-small'  => esc_html__( 'Small (295 x 166)', 'alone' ),
											'alone-image-square-800'  => esc_html__( 'Square (800 x 800)', 'alone' ),
											'alone-image-square-300'  => esc_html__( 'Square (300 x 300)', 'alone' ),
										),
									),
								),
								'desc'    => esc_html__( 'Choose the featured image size', 'alone' )
							),
							$blog_layout_creative_opts,
						)
					),
				),
			),
			'post_type_video' => array(
				'title'   => esc_html__( 'Video', 'alone' ),
				'type'    => 'tab',
				'options' => array(
					'post_video_tab' => array(
						'type'          => 'multi',
						'label'         => false,
						'inner-options' => array(
							'video_type' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'selected' => array(
										'type' => 'short-select',
										'label' => esc_html__('Video Types', 'alone'),
										'desc' => esc_html__('Choose the video type', 'alone'),
										'value' => 'embed',
										'choices' => array(
											// 'other' => esc_html__('Other', 'alone'),
											'embed' => esc_html__('Embed', 'alone'),
										),
									),
								),
								'choices' => array(
									'other' => array(
										'src' => array(
											'label' => esc_html__('Src', 'alone'),
											'desc' => esc_html__('Enter url video (Ex: http://yourdomain.com/video.mp4)', 'alone'),
											'type' => 'text',
											'value' => ''
										),
									),
									'embed' => array(
										'iframe' => array(
											'label' => esc_html__('Embed', 'alone'),
											'desc' => 'Please enter embed code(Youtube, Vimeo, ...) <br /> Params after link video: <br /> Youtube params: ?enablejsapi=1&loop=1, ... <br /> Vimeo params: ?api=1&loop=1, ... ',
											'type' => 'textarea',
											'value' => '',
										)
									)
								)
							)
						)
					),
				),
			),
			'post_type_audio' => array(
				'title'   => esc_html__( 'Audio', 'alone' ),
				'type'    => 'tab',
				'options' => array(
					'post_audio_tab' => array(
						'type'          => 'multi',
						'label'         => false,
						'inner-options' => array(
							'audio_type' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'selected' => array(
										'type' => 'short-select',
										'label' => esc_html__('Audio Types', 'alone'),
										'desc' => esc_html__('Choose the audio type', 'alone'),
										'value' => 'embed',
										'choices' => array(
											'other' => esc_html__('Other', 'alone'),
											'embed' => esc_html__('Embed', 'alone'),
										),
									),
								),
								'choices' => array(
									'other' => array(
										'src' => array(
											'label' => esc_html__('Src', 'alone'),
											'desc' => esc_html__('Enter url audio (Ex: http://yourdomain.com/audio.mp3)', 'alone'),
											'type' => 'text',
											'value' => ''
										),
									),
									'embed' => array(
										'iframe' => array(
											'label' => esc_html__('Embed', 'alone'),
											'desc' => esc_html__('Please enter embed code(SoundCloud, ...)', 'alone'),
											'type' => 'textarea',
											'value' => '',
										)
									)
								)
							)
						)
					),
				),
			),
			'post_type_quote' => array(
				'title'   => esc_html__( 'Quote', 'alone' ),
				'type'    => 'tab',
				'options' => array(
					'post_quote_tab' => array(
						'type'          => 'multi',
						'label'         => false,
						'inner-options' => array(
							'quote_text' => array(
								'label' => esc_html__( 'Quote Text', 'alone' ),
								'desc'  => esc_html__( 'Please enter quote.', 'alone' ),
								'type'  => 'textarea',
							),
							'quote_cite' => array(
								'label' => esc_html__( 'Cite', 'alone' ),
								'desc'  => esc_html__( 'Cite the person you are quoting.', 'alone' ),
								'type'  => 'text',
							),
						)
					),
				),
			),
			'post_type_link' => array(
				'title'   => esc_html__( 'Link', 'alone' ),
				'type'    => 'tab',
				'options' => array(
					'post_link_tab' => array(
						'type'          => 'multi',
						'label'         => false,
						'inner-options' => array(
							'url' => array(
								'label' => esc_html__( 'Url', 'alone' ),
								'desc'  => esc_html__( 'Please enter url.', 'alone' ),
								'type'  => 'text',
							),
						)
					),
				),
			),
			'post_type_gallery' => array(
				'title'   => esc_html__( 'Gallery', 'alone' ),
				'type'    => 'tab',
				'options' => array(
					'post_gallery_tab' => array(
						'type'          => 'multi',
						'label'         => false,
						'inner-options' => array(
							'gallery_images' => array(
								'label' => esc_html__( 'Add Image', 'alone' ),
								'desc'  => esc_html__( 'Upload header image', 'alone' ),
								'type'  => 'multi-upload',
							),
						)
					),
				),
			),
		),
	),
	'side' => array(
		'title'    => esc_html__( 'Header Image', 'alone' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
			'header_image' => array(
				'label' => esc_html__( 'Add Image', 'alone' ),
				'desc'  => esc_html__( 'Upload header image', 'alone' ),
				// 'help'  => esc_html__( 'You can set a general header image for all your posts and blog categories from the Theme Settings page under the', 'alone' ) . ' <a target="_blank" href="' . $alone_admin_url . 'themes.php?page=fw-settings#fw-options-tab-posts">.' . esc_html__( 'Posts tab', 'alone' ) . '</a>',
				'type'  => 'upload',
			),
		),
	),
);
