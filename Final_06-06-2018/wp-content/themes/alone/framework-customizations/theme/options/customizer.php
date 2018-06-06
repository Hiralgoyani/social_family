<?php if (!defined('FW')) { die('Forbidden'); }

/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in backend
 */

global $alone_colors, $alone_typography;

$alone_colors = array(
	'color_1' => '#88C000',
	'color_2' => '#ACF300',
	'color_3' => '#1f1f1f',
	'color_4' => '#808080',
	'color_5' => '#ebebeb'
);
$alone_typography = array(
	'h1' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '55',
		'line-height' => '65',
		'letter-spacing' => '0',
	),
	'h2' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '40',
		'line-height' => '56',
		'letter-spacing' => '0',
	),
	'h3' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '32',
		'line-height' => '38',
		'letter-spacing' => '0',
	),
	'h4' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '26',
		'line-height' => '32',
		'letter-spacing' => '0',
	),
	'h5' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '19',
		'line-height' => '28',
		'letter-spacing' => '0',
	),
	'h6' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '14',
		'line-height' => '26',
		'letter-spacing' => '0',
	),
	'buttons' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => 'regular',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '12',
		'line-height' => '30',
		'letter-spacing' => '0',
	),
	'subtitles' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '300',
		'family' => 'Merriweather',
		'style' => '',
		'weight' => '',
		'size' => '22',
		'line-height' => '39',
		'letter-spacing' => '0.5',
	),
	'body_text' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => 'regular',
		'family' => 'Quattrocento Sans',
		'style' => '',
		'weight' => '',
		'size' => '16.5',
		'line-height' => '28',
		'letter-spacing' => '0',
	),
);

$alone_admin_url = admin_url();
$alone_template_directory = get_template_directory_uri();
$alone_color_settings = fw_get_db_customizer_option('color_settings', $alone_colors);
$alone_typography_settings = fw_get_db_customizer_option('typography_settings', $alone_typography);

/* Header layout */
$alone_header_layout = array(
	'header-1' => array(
		'parent' => array(
			'small' => array(
				'height' => 75,
				'src' => $alone_template_directory . '/assets/images/image-picker/header-type1.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $alone_template_directory . '/assets/images/image-picker/header-type1.jpg'
			),
		)
	),
	'header-2' => array(
		'parent' => array(
			'small' => array(
				'height' => 75,
				'src' => $alone_template_directory . '/assets/images/image-picker/header-type2.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $alone_template_directory . '/assets/images/image-picker/header-type2.jpg'
			),
		),
		'children' => array(
			'custom_position_logo_menu' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'picker' => array(
					'select' => array(
						'type' => 'switch',
						'label'   => __('Custom Position Logo & Menu', 'alone'),
						'left-choice' => array(
							'value' => 'no',
							'label' => esc_html__('No', 'alone'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'alone'),
						),
						'value' => 'no',
					)
				),
				'choices' => array(
					'yes' => array(
						'position_logo_menu' => array(
							'type' => 'addable-popup',
							'size' => 'medium',
							'limit' => 3,
							'label' => __('Position Logo & Menu', 'alone'),
							'desc' => __('Add logo(position) & menu(position) you want display', 'alone'),
							'template' => '{{=name}}',
							'popup-title' => null,
							'value' => array(
								array(
									'name' => esc_html__('Primary Menu', 'alone'),
									'width' => 40,
									'type' => array(
										'select' => 'menu',
										'menu'=> array(
											'menu_type' => 'primary',
										)
									),
									'content_align' => 'text-left',
									'custom_class'	=> '',
								),
								array(
									'name' => esc_html__('Logo', 'alone'),
									'width' => 20,
									'type' => array(
										'select' => 'logo',
									),
									'content_align' => 'text-center',
									'custom_class'	=> '',
								),
								array(
									'name' => esc_html__('Secondary Menu', 'alone'),
									'width' => 40,
									'type' => array(
										'select' => 'menu',
										'menu'=> array(
											'menu_type' => 'secondary',
										)
									),
									'content_align' => 'text-right',
									'custom_class'	=> '',
								),
							),
							'popup-options' => array(
								'name' => array(
									'label' => esc_html__('Name', 'alone'),
									'desc' => esc_html__('Enter a name (it is for internal use and will not appear on the front end)', 'alone'),
									'type' => 'text',
								),
								'width' => array(
									'type' => 'slider',
									// 'value' => 996,
									'label' => esc_html__('Width', 'alone'),
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'desc' => esc_html__('Select the width in %', 'alone'),
								),
								'type' => array(
									'type' => 'multi-picker',
									'label' => false,
									'desc'  => false,
									'picker' => array(
										'select' => array(
											'type' => 'switch',
											'label'   => esc_html__('Select Type', 'alone'),
											'left-choice' => array(
												'value' => 'menu',
												'label' => esc_html__('Menu', 'alone'),
											),
											'right-choice' => array(
												'value' => 'logo',
												'label' => esc_html__('Logo', 'alone'),
											),
										)
									),
									'choices' => array(
										'menu' => array(
											'menu_type' => array(
												'type' => 'short-select',
												'label' => esc_html__( 'Menu Type', 'alone' ),
												'desc' => esc_html__( 'Please select menu type', 'alone' ),
												'choices' => array(
													'primary' 	=> esc_html__( 'Primary Menu', 'alone' ),
													'secondary' => esc_html__( 'Secondary Menu', 'alone' ),
												),
											),
										)
									)
								),
								'content_align' => array(
									'label' => esc_html__('Content Align', 'alone'),
									'desc' => esc_html__('Select the content align', 'alone'),
									'type' => 'image-picker',
									'value' => 'text-left',
									'choices' => array(
										'text-left' => array(
											'small' => array(
												'height' => 50,
												'src' => $alone_template_directory . '/assets/images/image-picker/left-position.jpg',
												'title' => esc_html__('Left', 'alone')
											),
										),
										'text-center' => array(
											'small' => array(
												'height' => 50,
												'src' => $alone_template_directory . '/assets/images/image-picker/center-position.jpg',
												'title' => esc_html__('Center', 'alone')
											),
										),
										'text-right' => array(
											'small' => array(
												'height' => 50,
												'src' => $alone_template_directory . '/assets/images/image-picker/right-position.jpg',
												'title' => esc_html__('Right', 'alone')
											),
										),
									),
								),
								'custom_class' => array(
									'label' => esc_html__( 'Custom Class', 'alone' ),
									'desc' => esc_html__('Custom class', 'alone'),
									'type' => 'text',
									'value' => '',
								),
							)
						),
					)
				),
			),
		),
	),
	'header-3' => array(
		'parent' => array(
			'small' => array(
				'height' => 75,
				'src' => $alone_template_directory . '/assets/images/image-picker/header-type3.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $alone_template_directory . '/assets/images/image-picker/header-type3.jpg'
			),
		),
		'children' => array(
			'custom_position_logo_sidebar' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'picker' => array(
					'select' => array(
						'type' => 'switch',
						'label'   => __('Custom Position Logo & Sidebar', 'alone'),
						// 'desc'    => __('Custom position Logo & Sidebar for header 3', 'alone'),
						'left-choice' => array(
							'value' => 'no',
							'label' => esc_html__('No', 'alone'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'alone'),
						),
						'value' => 'no',
					)
				),
				'choices' => array(
					'yes' => array(
						'position_logo_sidebar' => array(
							'type' => 'addable-popup',
							'size' => 'medium',
							'limit' => 4,
							'label' => __('Position Logo & Sidebar', 'alone'),
							'desc' => __('Add logo(position) & sidebar you want display', 'alone'),
							'template' => '{{=name}}',
							'popup-title' => null,
							'value' => array(
								array(
									'name' => esc_html__('Sidebar Left', 'alone'),
									'width' => 40,
									'type' => array(
										'select' => 'sidebar',
										'sidebar'=> array(
											'sidebar_id' => 'blank',
										)
									),
									'content_align' => 'text-center',
									'custom_class'	=> '',
								),
								array(
									'name' => esc_html__('Logo', 'alone'),
									'width' => 20,
									'type' => array(
										'select' => 'logo',
									),
									'content_align' => 'text-center',
									'custom_class'	=> '',
								),
								array(
									'name' => esc_html__('Sidebar Right', 'alone'),
									'width' => 40,
									'type' => array(
										'select' => 'sidebar',
										'sidebar'=> array(
											'sidebar_id' => 'blank',
										)
									),
									'content_align' => 'text-right',
									'custom_class'	=> '',
								),
							),
							'popup-options' => array(
								'name' => array(
									'label' => esc_html__('Name', 'alone'),
									'desc' => esc_html__('Enter a name (it is for internal use and will not appear on the front end)', 'alone'),
									'type' => 'text',
								),
								'width' => array(
									'type' => 'slider',
									// 'value' => 996,
									'label' => esc_html__('Width', 'alone'),
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'desc' => esc_html__('Select the width in %', 'alone'),
								),
								'type' => array(
									'type' => 'multi-picker',
									'label' => false,
									'desc'  => false,
									'picker' => array(
										'select' => array(
											'type' => 'switch',
											'label'   => esc_html__('Select Type', 'alone'),
											'left-choice' => array(
												'value' => 'sidebar',
												'label' => esc_html__('Sidebar', 'alone'),
											),
											'right-choice' => array(
												'value' => 'logo',
												'label' => esc_html__('Logo', 'alone'),
											),
										)
									),
									'choices' => array(
										'sidebar' => array(
											'sidebar_id' => array(
												'type' => 'short-select',
												'label' => esc_html__( 'Sitebar', 'alone' ),
												'desc' => esc_html__( 'Please select sitebar', 'alone' ),
												'choices' => alone_get_sidebars(array('blank' => esc_html__('- Display Blank -', 'alone'))),
											),
										)
									)
								),
								'content_align' => array(
									'label' => esc_html__('Content Align', 'alone'),
									'desc' => esc_html__('Select the content align', 'alone'),
									'type' => 'image-picker',
									'value' => 'text-left',
									'choices' => array(
										'text-left' => array(
											'small' => array(
												'height' => 50,
												'src' => $alone_template_directory . '/assets/images/image-picker/left-position.jpg',
												'title' => esc_html__('Left', 'alone')
											),
										),
										'text-center' => array(
											'small' => array(
												'height' => 50,
												'src' => $alone_template_directory . '/assets/images/image-picker/center-position.jpg',
												'title' => esc_html__('Center', 'alone')
											),
										),
										'text-right' => array(
											'small' => array(
												'height' => 50,
												'src' => $alone_template_directory . '/assets/images/image-picker/right-position.jpg',
												'title' => esc_html__('Right', 'alone')
											),
										),
									),
								),
								'custom_class' => array(
									'label' => esc_html__( 'Custom Class', 'alone' ),
									'desc' => esc_html__('Custom class', 'alone'),
									'type' => 'text',
									'value' => '',
								),
							),
						),
					)
				)
			),
			'html_label_logo_sidebar_padding' => array(
				'type' => 'html',
				'html' => '',
				'value' => '',
				'label' => __('Logo & Sidebar Padding', 'alone'),
			),
			'logo_sidebar_padding_top' => array(
				'label' => false,
				'desc' => esc_html__('top', 'alone'),
				'type' => 'short-text',
				'value' => 15,
			),
			'logo_sidebar_padding_bottom' => array(
				'label' => false,
				'desc' => esc_html__('bottom ', 'alone'),
				'type' => 'short-text',
				'value' => 15,
			),
			'logo_sidebar_bg_color' => array(
				'label' => esc_html__('Background Color', 'alone'),
				'desc' => __('Select the background color for Logo & Sidebar', 'alone'),
				'value' => '#ffffff',
				'type' => 'color-picker',
			),
			'logo_sidebar_shadow_effect' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'picker' => array(
					'select' => array(
						'type' => 'switch',
						'label'   => esc_html__('Shadow Effect', 'alone'),
						'left-choice' => array(
							'value' => 'no',
							'label' => esc_html__('No', 'alone'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'alone'),
						),
						'value' => 'yes',
					)
				),
				'choices' => array(
					'yes' => array(
						'shadow_color' => array(
							'label' => esc_html__('Shadow Color', 'alone'),
							'desc' => esc_html__('Select the shadow color', 'alone'),
							'value' => '#222222',
							'type' => 'color-picker',
						)
					)
				)
			),
			'custom_position_menu' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc'  => false,
				'picker' => array(
					'select' => array(
						'type' => 'switch',
						'label'   => __('Custom Position Menu', 'alone'),
						'left-choice' => array(
							'value' => 'no',
							'label' => esc_html__('No', 'alone'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'alone'),
						),
						'value' => 'no',
					)
				),
				'choices' => array(
					'yes' => array(
						'position_menu' => array(
							'type' => 'addable-popup',
							'size' => 'medium',
							'limit' => 2,
							'label' => __('Add Menu', 'alone'),
							'desc' => __('Add menu you want display', 'alone'),
							'template' => '{{=name}}',
							'popup-title' => null,
							'value' => array(
								array(
									'name' => esc_html__('Primary Menu', 'alone'),
									'width' => 100,
									'menu_type' => 'primary',
									'content_align' => 'text-left',
									'custom_class'	=> '',
								),
							),
							'popup-options' => array(
								'name' => array(
									'label' => esc_html__('Name', 'alone'),
									'desc' => esc_html__('Enter a name (it is for internal use and will not appear on the front end)', 'alone'),
									'type' => 'text',
								),
								'width' => array(
									'type' => 'slider',
									// 'value' => 996,
									'label' => esc_html__('Width', 'alone'),
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'desc' => esc_html__('Select the width in %', 'alone'),
								),
								'menu_type' => array(
									'type' => 'short-select',
									'label' => esc_html__( 'Menu Type', 'alone' ),
									'desc' => esc_html__( 'Please select menu type', 'alone' ),
									'choices' => array(
										'primary' 	=> esc_html__( 'Primary Menu', 'alone' ),
										'secondary' => esc_html__( 'Secondary Menu', 'alone' ),
									),
								),
								'content_align' => array(
									'label' => esc_html__('Content Align', 'alone'),
									'desc' => esc_html__('Select the content align', 'alone'),
									'type' => 'image-picker',
									'value' => 'text-left',
									'choices' => array(
										'text-left' => array(
											'small' => array(
												'height' => 50,
												'src' => $alone_template_directory . '/assets/images/image-picker/left-position.jpg',
												'title' => esc_html__('Left', 'alone')
											),
										),
										'text-center' => array(
											'small' => array(
												'height' => 50,
												'src' => $alone_template_directory . '/assets/images/image-picker/center-position.jpg',
												'title' => esc_html__('Center', 'alone')
											),
										),
										'text-right' => array(
											'small' => array(
												'height' => 50,
												'src' => $alone_template_directory . '/assets/images/image-picker/right-position.jpg',
												'title' => esc_html__('Right', 'alone')
											),
										),
									),
								),
								'custom_class' => array(
									'label' => esc_html__( 'Custom Class', 'alone' ),
									'desc' => esc_html__('Custom class', 'alone'),
									'type' => 'text',
									'value' => '',
								),
							)
						),
					)
				),
			),
		)
	),
	/*
	'header-4' => array(
		'parent' => array(
			'small' => array(
				'height' => 75,
				'src' => $alone_template_directory . '/assets/images/image-picker/header-type7.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $alone_template_directory . '/assets/images/image-picker/header-type7.jpg'
			),
		)
	),
	*/
);

$alone_shop_box = $alone_post_box = $alone_portfolio_box = $alone_wp_ultimate_recipe_box = $alone_give_box = $alone_events_box = array();
$alone_post_box = fw()->theme->get_options('post-box');
$alone_notification_center_box = fw()->theme->get_options('notification-center-box');

/* woocommerce */
if (class_exists('WooCommerce')) {
	$alone_shop_box = fw()->theme->get_options('shop-box');
}
/* portfolio */
if (function_exists('fw_ext') && fw_ext('portfolio')) {
  $alone_portfolio_box = fw()->theme->get_options('portfolio-box');
}
/* events */
if (function_exists('fw_ext') && fw_ext('events')) {
  $alone_events_box = fw()->theme->get_options('events-box');
}
/* wp-ultimate-recipe */
if (class_exists('WPUltimateRecipe') || class_exists('WPUltimateRecipePremium')) {
  $alone_wp_ultimate_recipe_box = fw()->theme->get_options('wp-ultimate-recipe-box');
}
/* give */
if (class_exists('Give')) {
	$alone_give_box = fw()->theme->get_options('give-box');
}

$options = array(
	'logo-box' => array(
		'title' => esc_html__('Logo', 'alone'),
		'type' => 'box',
		'options' => array(
			'logo_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
					'logo' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'selected_value' => array(
								'label' => esc_html__('Logo Type', 'alone'),
								'desc' => esc_html__('Select the logo type', 'alone'),
								'attr' => array('class' => 'fw-checkbox-float-left'),
								'value' => 'text',
								'type' => 'radio',
								'choices' => array(
									'text' => esc_html__('Text', 'alone'),
									'image' => esc_html__('Image', 'alone'),
								),
							)
						),
						'choices' => array(
							'text' => array(
								'title' => array(
									'label' => esc_html__('Title', 'alone'),
									'desc' => esc_html__('Enter the title', 'alone'),
									'type' => 'text',
									'value' => get_bloginfo('name')
								),
								'logo_title_font' => array(
									'label' => false, //__('', 'alone'),
									'desc' => esc_html__('Choose the title font', 'alone'),
									'type' => 'tf-typography',
									'value' => array(
										'family' => 'Montserrat',
										'size' => 20,
										'line-height' => 30,
										'style' => '400',
										'letter-spacing' => 0,
									)
								),
								'subtitle' => array(
									'label' => esc_html__('Subtitle', 'alone'),
									'desc' => esc_html__('Enter the subtitle', 'alone'),
									'type' => 'text',
									'value' => '', //__('Bearsthemes', 'alone'),
								),
								'logo_subtitle_font' => array(
									'label' => false, //__('', 'alone'),
									'desc' => esc_html__('Choose the subtitle font', 'alone'),
									'type' => 'tf-typography',
									'value' => array(
										'family' => 'Montserrat',
										'size' => 10,
										'line-height' => 10,
										'style' => '400',
										'letter-spacing' => 0,
									)
								),
							),
							'image' => array(
								'image_logo' => array(
									'label' => false, // __('', 'alone'),
									'desc' => esc_html__('Upload logo image', 'alone'),
									'type' => 'upload'
								),
								'retina_logo' => array(
									'type' => 'switch',
									'label' => false, //__('', 'alone'),
									'desc' => esc_html__('Use logo as retina?', 'alone'),
									'left-choice' => array(
										'value' => 'bt-logo-no-retina',
										'label' => esc_html__('No', 'alone'),
									),
									'right-choice' => array(
										'value' => 'bt-logo-retina',
										'label' => esc_html__('Yes', 'alone'),
									),
									'value' => 'bt-logo-no-retina'
								),
							),
						),
						'show_borders' => false,
					),
				),
			),
		)
	),
	'general-box' => array(
		'title' => esc_html__('General', 'alone'),
		'type' => 'box',
		'options' => array(
			'container_site_type' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'selected' => array(
						'label' => esc_html__('Website Width', 'alone'),
						'desc' => esc_html__("Select your website's width", "alone"),
						'value' => 'bt-full',
						'type' => 'image-picker',
						'choices' => array(
							'bt-full' => array(
								'small' => array(
									'height' => 70,
									'src' => $alone_template_directory . '/assets/images/image-picker/full.jpg'
								),
								'large' => array(
									'height' => 214,
									'src' => $alone_template_directory . '/assets/images/image-picker/full.jpg'
								),
							),
							'bt-side-boxed' => array(
								'small' => array(
									'height' => 70,
									'src' => $alone_template_directory . '/assets/images/image-picker/side-boxed.jpg'
								),
								'large' => array(
									'height' => 214,
									'src' => $alone_template_directory . '/assets/images/image-picker/side-boxed.jpg'
								),
							),
						),
					),
				),
				'choices' => array(
					'bt-side-boxed' => array(
						'site_margin' => array(
							'label' => esc_html__('', 'alone'),
							'desc' => esc_html__('Enter the top and bottom margin', 'alone'),
							'value' => '',
							'type' => 'short-text',
						),
						'boxed_container_bg' => array(
							'label' => esc_html__('Container Background', 'alone'),
							'desc' => esc_html__('Select the website container background', 'alone'),
							'value' => '#ffffff',
							'type' => 'color-picker',
						),
					)
				)
			),
			'website_background' => array(
				'type' => 'multi',
				'label' => false,
				'inner-options' => array(
					'website_bg_color' => array(
						'label' => esc_html__('Website Background', 'alone'),
						'desc' => esc_html__('Select the website background color', 'alone'),
						'value' => '#ffffff',
						'type' => 'color-picker',
					),
					'website_bg' => array(
						'type' => 'background-image',
						'value' => 'none',
						'label' => false, //esc_html__('', 'alone'),
						'desc' => esc_html__('Select the patern overlay', 'alone'),
						'choices' => array(
							'none' => array(
								'icon' => $alone_template_directory . '/assets/images/patterns/no_pattern.jpg',
								'css' => array(
									'background-image' => 'none'
								),
							),
							'bg-1' => array(
								'icon' => $alone_template_directory . '/assets/images/patterns/diagonal_bottom_to_top_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $alone_template_directory . '/assets/images/patterns/diagonal_bottom_to_top_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-2' => array(
								'icon' => $alone_template_directory . '/assets/images/patterns/diagonal_top_to_bottom_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $alone_template_directory . '/assets/images/patterns/diagonal_top_to_bottom_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-3' => array(
								'icon' => $alone_template_directory . '/assets/images/patterns/dots_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $alone_template_directory . '/assets/images/patterns/dots_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-4' => array(
								'icon' => $alone_template_directory . '/assets/images/patterns/noise_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $alone_template_directory . '/assets/images/patterns/noise_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-5' => array(
								'icon' => $alone_template_directory . '/assets/images/patterns/romb_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $alone_template_directory . '/assets/images/patterns/romb_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-6' => array(
								'icon' => $alone_template_directory . '/assets/images/patterns/square_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $alone_template_directory . '/assets/images/patterns/square_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-7' => array(
								'icon' => $alone_template_directory . '/assets/images/patterns/vertical_lines_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $alone_template_directory . '/assets/images/patterns/vertical_lines_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
							'bg-8' => array(
								'icon' => $alone_template_directory . '/assets/images/patterns/waves_pattern_preview.jpg',
								'css' => array(
									'background-image' => 'url("' . $alone_template_directory . '/assets/images/patterns/waves_pattern.png' . '")',
									'background-repeat' => 'repeat',
								)
							),
						)
					)
				)
			),
			'enable_scroll_to' => array(
				'attr' => array('class' => 'scroll-to-top-styling'),
				'type' => 'switch',
				'value' => 'no',
				'label' => esc_html__('Scroll to Top Button', 'alone'),
				'desc' => esc_html__('Enable scroll to top?', 'alone'),
				'left-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'alone'),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'alone'),
				)
			),
		)
	),
	'header-box' => array(
		'title' => esc_html__('Header', 'alone'),
		'type' => 'box',
		'options' => array(
			'header_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
					'header_group' => array(
						'type' => 'group',
						'options' => array(
							'header_type_picker' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'header_type' => array(
										'label' => esc_html__('Header Type', 'alone'),
										'type' => 'image-picker',
										'value' => 'header-1',
										'desc' => esc_html__('Select the prefered header type', 'alone'),
										'choices' => alone_load_decentralize_setting( $alone_header_layout, 'parent' ),
									),
								),
								'choices' => alone_load_decentralize_setting( $alone_header_layout, 'children' ),
								'show_borders' => false,
							),
							'transform_header_mobi' => array(
								'type' => 'slider',
								'value' => 996,
								'label' => esc_html__('Transform Header Mobi', 'alone'),
								'properties' => array(
									'min' => 320,
									'max' => 1170,
									'sep' => 1,
								),
								'desc' => esc_html__('Select the website width transform header mobi in px', 'alone'),
							),
							'html_label' => array(
								'type' => 'html',
								'html' => '',
								'value' => '',
								'label' => esc_html__('Header Padding', 'alone'),
							),
							'header_padding_top' => array(
								'label' => false,
								'desc' => esc_html__('top', 'alone'),
								'type' => 'short-text',
								'value' => '15',
							),
							'header_padding_bottom' => array(
								'label' => false,
								'desc' => esc_html__('bottom ', 'alone'),
								'type' => 'short-text',
								'value' => '15',
							),
							'header_bg_color' => array(
								'label' => esc_html__('Background Color', 'alone'),
								'desc' => esc_html__('Select header background color', 'alone'),
								'value' => '#ffffff',
								'choices' => $alone_color_settings,
								'type' => 'color-palette'
							),
							'dropdown_bg_color' => array(
								'label' => esc_html__('Dropdown Bg Color', 'alone'),
								'desc' => esc_html__('Select the dropdown background color', 'alone'),
								'value' => '#333333',
								'choices' => $alone_color_settings,
								'type' => 'color-palette'
							),
							'header_menu_position' => array(
								'label' => esc_html__('Menu Position', 'alone'),
								'desc' => esc_html__('Select the menu position', 'alone'),
								'type' => 'image-picker',
								'value' => 'fw-menu-position-right',
								'choices' => array(
									'fw-menu-position-left' => array(
										'small' => array(
											'height' => 50,
											'src' => $alone_template_directory . '/assets/images/image-picker/left-position.jpg',
											'title' => esc_html__('Left', 'alone')
										),
									),
									'fw-menu-position-center' => array(
										'small' => array(
											'height' => 50,
											'src' => $alone_template_directory . '/assets/images/image-picker/center-position.jpg',
											'title' => esc_html__('Center', 'alone')
										),
									),
									'fw-menu-position-right' => array(
										'small' => array(
											'height' => 50,
											'src' => $alone_template_directory . '/assets/images/image-picker/right-position.jpg',
											'title' => esc_html__('Right', 'alone')
										),
									),
								),
							),
						)
					),
					'enable_header_full_content' => array(
						'type' => 'switch',
						'value' => '',
						'attr' => array(),
						'label' => esc_html__('Header Full Content', 'alone'),
						'desc' => esc_html__('Make the header full content?', 'alone'),
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('No', 'alone'),
						),
						'right-choice' => array(
							'value' => 'bt-header-full-content',
							'label' => esc_html__('Yes', 'alone'),
						),
					),
					'enable_absolute_header' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'selected_value' => array(
								'type' => 'switch',
								'value' => 'fw-no-absolute-header',
								'attr' => array(),
								'label' => esc_html__('Absolute Header', 'alone'),
								'desc' => esc_html__('Make the header position absolute?', 'alone'),
								'help' => sprintf("%s", esc_html__('This absolute positioning will put the header on top of the header image.', 'alone')),
								'left-choice' => array(
									'value' => 'fw-no-absolute-header',
									'label' => esc_html__('No', 'alone'),
								),
								'right-choice' => array(
									'value' => 'fw-absolute-header',
									'label' => esc_html__('Yes', 'alone'),
								),
							)
						),
						'choices' => array(
							'fw-absolute-header' => array(
								'absolute_opacity' => array(
									'type' => 'slider',
									'value' => 65,
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'label' => false, //esc_html__('', 'alone'),
									'desc' => esc_html__('Select the header background opacity', 'alone'),
								),
							),
						),
						'show_borders' => false,
					),
					'enable_sticky_header' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'selected_value' => array(
								'type' => 'switch',
								'value' => 'fw-no-sticky-header',
								'attr' => array(),
								'label' => esc_html__('Sticky Header', 'alone'),
								'desc' => esc_html__('Make the header sticky?', 'alone'),
								'left-choice' => array(
									'value' => 'fw-no-sticky-header',
									'label' => esc_html__('No', 'alone'),
								),
								'right-choice' => array(
									'value' => 'fw-sticky-header',
									'label' => esc_html__('Yes', 'alone'),
								),
							)
						),
						'choices' => array(
							'fw-sticky-header' => array(
								'image_logo_sticky' => array(
										'label' => esc_html__('Image Logo Sticky', 'alone'),
										'desc' => esc_html__('Upload logo image', 'alone'),
										'type' => 'upload'
								),
								'html_label' => array(
									'type' => 'html',
									'html' => '',
									'value' => '',
									'label' => esc_html__('Header Sticky Padding', 'alone'),
								),
								'header_sticky_padding_top' => array(
									'label' => false,
									'desc' => esc_html__('top', 'alone'),
									'type' => 'short-text',
									'value' => 0,
								),
								'header_sticky_padding_bottom' => array(
									'label' => false,
									'desc' => esc_html__('bottom ', 'alone'),
									'type' => 'short-text',
									'value' => 0,
								),
								'background_color' => array(
									'label' => esc_html__('Background Color', 'alone'),
									'desc' => esc_html__("Select the header's top bar background color", "alone"),
									'value' => $alone_color_settings['color_3'],
									'choices' => $alone_color_settings,
									'type' => 'color-palette'
								),
								'sticky_opacity' => array(
									'type' => 'slider',
									'value' => 5,
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'label' => esc_html__('', 'alone'),
									'desc' => esc_html__('Select the header background opacity', 'alone'),
								),
								'menu_item_color' => array(
									'label' => esc_html__('Menu Item Color', 'alone'),
									'desc' => esc_html__("Select the menu items color (level 1)", "alone"),
									'value' => $alone_color_settings['color_5'],
									'choices' => $alone_color_settings,
									'type' => 'color-palette'
								),
								'menu_item_color_hover' => array(
									'label' => false, // esc_html__('', 'alone'),
									'desc' => esc_html__("Select the menu items color hover (level 1)", "alone"),
									'value' => $alone_color_settings['color_2'],
									'choices' => $alone_color_settings,
									'type' => 'color-palette'
								),
							),
						),
						'show_borders' => false,
					),
					'enable_header_top_bar' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'selected_value' => array(
								'label' => esc_html__('Header Top Bar', 'alone'),
								'desc' => esc_html__('Enable the header top bar?', 'alone'),
								'type' => 'switch',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__('Yes', 'alone')
								),
								'left-choice' => array(
									'value' => 'no',
									'label' => esc_html__('No', 'alone')
								),
								'value' => 'no',
							)
						),
						'choices' => array(
							'yes' => array(
								'header_top_bar_bg' => array(
									'label' => false, //esc_html__('Background Color', 'alone'),
									'desc' => esc_html__("Select the header's top bar background color", "alone"),
									'value' => $alone_color_settings['color_3'],
									'choices' => $alone_color_settings,
									'type' => 'color-palette'
								),
								'header_top_sidebar' => array(
									'type' => 'addable-popup',
									'size' => 'medium',
									'limit' => 3,
									'label' => esc_html__('Sidebar List', 'alone'),
									'desc' => esc_html__('Add sidebar you want display', 'alone'),
									'template' => '{{=name}}',
									'popup-options' => array(
										'name' => array(
											'label' => esc_html__('Name', 'alone'),
											'desc' => esc_html__('Enter a name (it is for internal use and will not appear on the front end)', 'alone'),
											'type' => 'text',
										),
										'sidebar_id' => array(
											'type' => 'short-select',
											'label' => esc_html__( 'Sitebar', 'alone' ),
											'desc' => esc_html__( 'Please select sitebar', 'alone' ),
											'value' => '',
											'choices' => alone_get_sidebars(),
										),
										'content_align' => array(
											'label' => esc_html__('Content Align', 'alone'),
											'desc' => esc_html__('Select the content align', 'alone'),
											'type' => 'image-picker',
											'value' => 'fw-sidebar-content-align-left',
											'choices' => array(
												'fw-sidebar-content-align-left' => array(
													'small' => array(
														'height' => 50,
														'src' => $alone_template_directory . '/assets/images/image-picker/left-position.jpg',
														'title' => esc_html__('Left', 'alone')
													),
												),
												'fw-sidebar-content-align-center' => array(
													'small' => array(
														'height' => 50,
														'src' => $alone_template_directory . '/assets/images/image-picker/center-position.jpg',
														'title' => esc_html__('Center', 'alone')
													),
												),
												'fw-sidebar-content-align-right' => array(
													'small' => array(
														'height' => 50,
														'src' => $alone_template_directory . '/assets/images/image-picker/right-position.jpg',
														'title' => esc_html__('Right', 'alone')
													),
												),
											),
										),
										'custom_class' => array(
											'label' => esc_html__( 'Custom Class', 'alone' ),
											'desc' => esc_html__('Custom class', 'alone'),
											'type' => 'text',
											'value' => '',
										),
									),
								),
							),
							'no' => array(),
						),
						'show_borders' => false,
					),
				)
			)
		)
	),
	'title-bar-box' => array(
		'title' => esc_html__('Title Bar', 'alone'),
		'type' => 'box',
		'options' => array(
			'general_title_bar' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
					'html_label' => array(
						'type' => 'html',
						'html' => '',
						'value' => '',
						'label' => esc_html__('Title bar Spacing', 'alone'),
					),
					'title_bar_top' => array(
						'label' => false,
						'desc' => esc_html__('top', 'alone'),
						'type' => 'short-text',
						'value' => '120',
					),
					'title_bar_bottom' => array(
						'label' => false,
						'desc' => esc_html__('bottom ', 'alone'),
						'type' => 'short-text',
						'value' => '100',
					),
					'title_bar_image' => array(
						'label' => esc_html__('Title Bar Image Background', 'alone'),
						'desc' => esc_html__('Upload a title bar image', 'alone'),
						'type' => 'upload',
					),
					'background_color' => array(
						'label'   => false, //esc_html__( '', 'alone' ),
						'desc'    => esc_html__( 'Select the background color', 'alone' ),
						'value'   => $alone_color_settings['color_5'],
						'choices' => $alone_color_settings,
						'type'    => 'color-palette'
					),
					'title_bar_image_repeat'           => array(
						'label'   => false, //esc_html__( '', 'alone' ),
						'desc'    => esc_html__( 'Select how will the background repeat', 'alone' ),
						'type'    => 'short-select',
						'attr' => array(
							'class' => 'fw-option-type-multi-show-borders',
						),
						'value'   => 'no-repeat',
						'choices' => array(
							'no-repeat' => esc_html__( 'No-Repeat', 'alone' ),
							'repeat'    => esc_html__( 'Repeat', 'alone' ),
							'repeat-x'  => esc_html__( 'Repeat-X', 'alone' ),
							'repeat-y'  => esc_html__( 'Repeat-Y', 'alone' ),
						)
					),
					'title_bar_image_position_x'    => array(
						'label'   => false, //esc_html__( 'Position', 'alone' ),
						'desc'    => esc_html__( 'Select the horizontal background position', 'alone' ),
						'type'    => 'short-select',
						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
						'value'   => 'center',
						'choices' => array(
							'left'   => esc_html__( 'Left', 'alone' ),
							'center' => esc_html__( 'Center', 'alone' ),
							'right'  => esc_html__( 'Right', 'alone' ),
						)
					),
					'title_bar_image_position_y'    => array(
						'label'   => false, //esc_html__( '', 'alone' ),
						'desc'    => esc_html__( 'Select the vertical background position', 'alone' ),
						'type'    => 'short-select',
						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
						'value'   => 'center',
						'choices' => array(
							'top'    => esc_html__( 'Top', 'alone' ),
							'center' => esc_html__( 'Center', 'alone' ),
							'bottom' => esc_html__( 'Bottom', 'alone' ),
						)
					),
					'title_bar_image_size'          => array(
						'label'   => false, //esc_html__( 'Size', 'alone' ),
						'desc'    => esc_html__( 'Select the background size', 'alone' ),
						'help'    => esc_html__( 'Auto - Default value, the background image has the original width and height.Cover - Scale the background image so that the background area is completely covered by the image. Contain - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'alone' ),
						'type'    => 'short-select',
						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
						'value'   => 'cover',
						'choices' => array(
							'auto'    => esc_html__( 'Auto', 'alone' ),
							'cover'   => esc_html__( 'Cover', 'alone' ),
							'contain' => esc_html__( 'Contain', 'alone' ),
						)
					),
					'parallax'         => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'selected' => array(
								'type'         => 'switch',
								'label'        => esc_html__( 'Parallax Effect', 'alone' ),
								'desc'         => esc_html__( 'Create a parallax effect on scroll?', 'alone' ),
								'help'         => esc_html__( "Please use an image that is taller then the section's height in order for the parallax to work properly. If you set the speed at 1 you'll need an image twice the section's height.", "alone" ),
								'value'        => 'yes',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__( 'Yes', 'alone' ),
								),
								'left-choice'  => array(
									'value' => 'no',
									'label' => esc_html__( 'No', 'alone' ),
								),
							),
						),
						'choices' => array(
							'yes' => array(
								'parallax_speed' => array(
									'label'      => false, //esc_html__( '', 'alone' ),
									'desc'       => esc_html__( 'Select the parallax speed', 'alone' ),
									'type'       => 'slider',
									'value'      => 5,
									'properties' => array(
										'min' => 1,
										'max' => 10,
										'sep' => 1,
									),
								),
							)
						)
					),
					'title_bar_overlay_options' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'title_bar_overlay' => array(
								'type' => 'switch',
								'label' => esc_html__('Overlay Color', 'alone'),
								'desc' => esc_html__('Enable image overlay color?', 'alone'),
								'value' => 'no',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__('Yes', 'alone'),
								),
								'left-choice' => array(
									'value' => 'no',
									'label' => esc_html__('No', 'alone'),
								),
							),
						),
						'choices' => array(
							'no' => array(),
							'yes' => array(
								'title_bar_overlay_color' => array(
									'label' => false, //esc_html__('', 'alone'),
									'desc' => esc_html__('Select the image overlay color', 'alone'),
									'value' => $alone_color_settings['color_5'],
									'choices' => $alone_color_settings,
									'type' => 'color-palette'
								),
								'title_bar_overlay_opacity_image' => array(
									'type' => 'slider',
									'value' => 80,
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'label' => false, //esc_html__('', 'alone'),
									'desc' => esc_html__('Select the overlay color opacity in %', 'alone'),
								)
							),
						),
					),
					'content_align' => array(
						'label' => esc_html__('Content Align', 'alone'),
						'desc' => esc_html__('Select the content align', 'alone'),
						'type' => 'image-picker',
						'value' => 'fw-content-align-center',
						'choices' => array(
							'fw-content-align-left' => array(
								'small' => array(
									'height' => 50,
									'src' => $alone_template_directory . '/assets/images/image-picker/left-position.jpg',
									'title' => esc_html__('Left', 'alone')
								),
							),
							'fw-content-align-center' => array(
								'small' => array(
									'height' => 50,
									'src' => $alone_template_directory . '/assets/images/image-picker/center-position.jpg',
									'title' => esc_html__('Center', 'alone')
								),
							),
							'fw-content-align-right' => array(
								'small' => array(
									'height' => 50,
									'src' => $alone_template_directory . '/assets/images/image-picker/right-position.jpg',
									'title' => esc_html__('Right', 'alone')
								),
							),
						),
					),
					'title_bar_title_typography' => array(
						'attr' => array('class' => 'fw-advanced-button'),
						'type' => 'popup',
						'label' => esc_html__('Title', 'alone'),
						'desc' => esc_html__('Change the style / typography of the title', 'alone'),
						'button' => esc_html__('Styling', 'alone'),
						'size' => 'small',
						'popup-options' => array(
							'typography' => array(
								'label' => esc_html__('Title', 'alone'),
								'type' => 'tf-typography',
								'value' => array(
									'google_font' => $alone_typography_settings['h1']['google_font'],
									'subset' => $alone_typography_settings['h1']['subset'],
									'variation' => $alone_typography_settings['h1']['variation'],
									'family' => $alone_typography_settings['h1']['family'],
									'style' => $alone_typography_settings['h1']['style'],
									'weight' => $alone_typography_settings['h1']['weight'],
									'size' => $alone_typography_settings['h1']['size'],
									'line-height' => $alone_typography_settings['h1']['line-height'],
									'letter-spacing' => $alone_typography_settings['h1']['letter-spacing'],
									'color-palette' => '',
								)
							),
						),
					),
					'title_bar_description_typography' => array(
						'attr' => array('class' => 'fw-advanced-button'),
						'type' => 'popup',
						'label' => esc_html__('Description', 'alone'),
						'desc' => esc_html__('Change the style / typography of the description', 'alone'),
						'button' => esc_html__('Styling', 'alone'),
						'size' => 'small',
						'popup-options' => array(
							'typography' => array(
								'label' => esc_html__('Title', 'alone'),
								'type' => 'tf-typography',
								'value' => array(
									'google_font' => $alone_typography_settings['h1']['google_font'],
									'subset' => $alone_typography_settings['h1']['subset'],
									'variation' => $alone_typography_settings['h1']['variation'],
									'family' => $alone_typography_settings['h1']['family'],
									'style' => $alone_typography_settings['h1']['style'],
									'weight' => $alone_typography_settings['h1']['weight'],
									'size' => $alone_typography_settings['h1']['size'],
									'line-height' => $alone_typography_settings['h1']['line-height'],
									'letter-spacing' => $alone_typography_settings['h1']['letter-spacing'],
									'color-palette' => '',
								)
							),
						),
					),
					'breadcrumbs_typography' => array(
						'attr' => array('class' => 'fw-advanced-button'),
						'type' => 'popup',
						'label' => esc_html__('Breadcrumbs Typography', 'alone'),
						'desc' => esc_html__('Change the style / typography of the breadcrumbs', 'alone'),
						'button' => esc_html__('Styling', 'alone'),
						'size' => 'small',
						'popup-options' => array(
							'typography' => array(
								'label' => esc_html__('Breadcrumbs Typography', 'alone'),
								'type' => 'tf-typography',
								'value' => array(
									'google_font' => true,
		              'subset' => 'latin',
		              'variation' => 'regular',
		              'family' => 'Quattrocento Sans',
		              'style' => '',
		              'weight' => '',
		              'size' => '16.5',
		              'line-height' => '30',
		              'letter-spacing' => '0',
		              'color-palette' => '',
								)
							),
							'text_uppercase' => array(
								'label' => esc_html__('Text Uppercase', 'alone'),
								// 'desc' => esc_html__('Show footer widgets?', 'alone'),
								'type' => 'switch',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__('Yes', 'alone')
								),
								'left-choice' => array(
									'value' => 'no',
									'label' => esc_html__('No', 'alone')
								),
								'value' => 'no',
							),
						),
					),
					'default_pages_info' => array(
						'label' => false,
						'desc' => '<i class="fw-info-symbol dashicons dashicons-info"></i>' . esc_html__('These options apply only to pages created with the default template (default WordPress pages) and not with the Visual Builder', 'alone'),
						'type' => 'html',
						'html' => '',
					),
				)
			)
		)
	),
	$alone_notification_center_box,
	$alone_post_box,
	$alone_portfolio_box,
	$alone_events_box,
	$alone_shop_box,
	$alone_wp_ultimate_recipe_box,
	$alone_give_box,
	'footer-box' => array(
		'title' => esc_html__('Footer', 'alone'),
		'type' => 'box',
		'options' => array(
			'footer_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
					'show_footer_widgets' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'selected_value' => array(
								'label' => esc_html__('Footer Widgets', 'alone'),
								'desc' => esc_html__('Show footer widgets?', 'alone'),
								'type' => 'switch',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__('Yes', 'alone')
								),
								'left-choice' => array(
									'value' => 'no',
									'label' => esc_html__('No', 'alone')
								),
								'value' => 'no',
							)
						),
						'choices' => array(
							'yes' => array(
								'footer_sidebar' => array(
									'type' => 'addable-popup',
									'size' => 'medium',
									'limit' => 4,
									'label' => esc_html__('Footer Sidebar List', 'alone'),
									'desc' => esc_html__('Add sidebar you want display', 'alone'),
									'template' => '{{=name}}',
									'popup-options' => array(
										'name' => array(
											'label' => esc_html__('Name', 'alone'),
											'desc' => esc_html__('Enter a name (it is for internal use and will not appear on the front end)', 'alone'),
											'type' => 'text',
										),
										'sidebar_id' => array(
											'type' => 'short-select',
											'label' => esc_html__( 'Sitebar', 'alone' ),
											'desc' => esc_html__( 'Please select sitebar', 'alone' ),
											'value' => '',
											'choices' => alone_get_sidebars(),
										),
										'content_align' => array(
											'label' => esc_html__('Content Align', 'alone'),
											'desc' => esc_html__('Select the content align', 'alone'),
											'type' => 'image-picker',
											'value' => 'fw-sidebar-content-align-left',
											'choices' => array(
												'fw-sidebar-content-align-left' => array(
													'small' => array(
														'height' => 50,
														'src' => $alone_template_directory . '/assets/images/image-picker/left-position.jpg',
														'title' => esc_html__('Left', 'alone')
													),
												),
												'fw-sidebar-content-align-center' => array(
													'small' => array(
														'height' => 50,
														'src' => $alone_template_directory . '/assets/images/image-picker/center-position.jpg',
														'title' => esc_html__('Center', 'alone')
													),
												),
												'fw-sidebar-content-align-right' => array(
													'small' => array(
														'height' => 50,
														'src' => $alone_template_directory . '/assets/images/image-picker/right-position.jpg',
														'title' => esc_html__('Right', 'alone')
													),
												),
											),
										),
										'custom_class' => array(
											'label' => esc_html__( 'Custom Class', 'alone' ),
											'desc' => esc_html__('Custom class', 'alone'),
											'type' => 'text',
											'value' => '',
										),
									),
								),
								'footer_widgets_bg' => array(
									'type' => 'multi-picker',
									'label' => false,
									'desc' => false,
									'picker' => array(
										'background' => array(
											'label' => esc_html__('Background', 'alone'),
											'desc' => esc_html__('Select the background for your widget area', 'alone'),
											'attr' => array('class' => 'fw-checkbox-float-left'),
											'type' => 'radio',
											'choices' => array(
												'none' => esc_html__('None', 'alone'),
												'image' => esc_html__('Image', 'alone'),
												'color' => esc_html__('Color', 'alone'),
											),
											'value' => 'color'
										),
									),
									'choices' => array(
										'none' => array(),
										'color' => array(
											'background_color' => array(
												'label' => false, //esc_html__('', 'alone'),
												'desc' => esc_html__('Select the background color', 'alone'),
												'value' => $alone_color_settings['color_4'],
												'choices' => $alone_color_settings,
												'type' => 'color-palette'
											),
										),
										'image' => array(
											'background_image' => array(
												'label' => false, //esc_html__('', 'alone'),
												'type' => 'background-image',
												'choices' => array(//	in future may will set predefined images
												)
											),
											'background_color' => array(
												'label' => false, //esc_html__('', 'alone'),
												'desc' => esc_html__('Select the background color', 'alone'),
												'help' => esc_html__('The default color palette can be changed from the', 'alone') . ' <a target="_blank" href="' . $alone_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . esc_html__('Colors section', 'alone') . '</a> ' . esc_html__('found in the Theme Settings page', 'alone'),
												'value' => '',
												'choices' => $alone_color_settings,
												'type' => 'color-palette'
											),
											'repeat' => array(
												'label' => false, //esc_html__('', 'alone'),
												'desc' => esc_html__('Select how will the background repeat', 'alone'),
												'type' => 'short-select',
												'attr' => array('class' => 'fw-checkbox-float-left'),
												'value' => 'no-repeat',
												'choices' => array(
													'no-repeat' => esc_html__('No-Repeat', 'alone'),
													'repeat' => esc_html__('Repeat', 'alone'),
													'repeat-x' => esc_html__('Repeat-X', 'alone'),
													'repeat-y' => esc_html__('Repeat-Y', 'alone'),
												)
											),
											'bg_position_x' => array(
												'label' => false, //esc_html__('Position', 'alone'),
												'desc' => esc_html__('Select the horizontal background position', 'alone'),
												'type' => 'short-select',
												'attr' => array('class' => 'fw-checkbox-float-left'),
												'value' => 'left',
												'choices' => array(
													'left' => esc_html__('Left', 'alone'),
													'center' => esc_html__('Center', 'alone'),
													'right' => esc_html__('Right', 'alone'),
												)
											),
											'bg_position_y' => array(
												'label' => false, //esc_html__('', 'alone'),
												'desc' => esc_html__('Select the vertical background position', 'alone'),
												'type' => 'short-select',
												'attr' => array('class' => 'fw-checkbox-float-left'),
												'value' => 'top',
												'choices' => array(
													'top' => esc_html__('Top', 'alone'),
													'center' => esc_html__('Center', 'alone'),
													'bottom' => esc_html__('Bottom', 'alone'),
												)
											),
											'bg_size' => array(
												'label' => false, //esc_html__('Size', 'alone'),
												'desc' => esc_html__('Select the background size', 'alone'),
												'help' => esc_html__('Auto - Default value, the background image has the original width and height. Cover - Scale the background image so that the background area is completely covered by the image. Contain - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'alone'),
												'type' => 'short-select',
												'attr' => array('class' => 'fw-checkbox-float-left'),
												'value' => 'auto',
												'choices' => array(
													'auto' => esc_html__('Auto', 'alone'),
													'cover' => esc_html__('Cover', 'alone'),
													'contain' => esc_html__('Contain', 'alone'),
												)
											),
											'overlay_options' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'overlay' => array(
														'type' => 'switch',
														'label' => esc_html__('Overlay Color', 'alone'),
														'desc' => esc_html__('Enable image overlay color?', 'alone'),
														'value' => 'no',
														'right-choice' => array(
															'value' => 'yes',
															'label' => esc_html__('Yes', 'alone'),
														),
														'left-choice' => array(
															'value' => 'no',
															'label' => esc_html__('No', 'alone'),
														),
													),
												),
												'choices' => array(
													'no' => array(),
													'yes' => array(
														'background' => array(
															'label' => esc_html__('', 'alone'),
															'desc' => esc_html__('Select the overlay color', 'alone'),
															// 'help' => esc_html__('The default color palette can be changed from the', 'alone') . ' <a target="_blank" href="' . $alone_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . esc_html__('Colors section', 'alone') . '</a> ' . esc_html__('found in the Theme Settings page', 'alone'),
															'value' => $alone_color_settings['color_1'],
															'choices' => $alone_color_settings,
															'type' => 'color-palette'
														),
														'overlay_opacity_image' => array(
															'type' => 'slider',
															'value' => 80,
															'properties' => array(
																'min' => 0,
																'max' => 100,
																'sep' => 1,
															),
															'label' => esc_html__('', 'alone'),
															'desc' => esc_html__('Select the overlay color opacity in %', 'alone'),
														)
													),
												),
											),
										),
									),
									'show_borders' => false,
								),
								'footer_widgets_titles_color' => array(
									'label' => esc_html__('Titles Color', 'alone'),
									'desc' => esc_html__('Select the footer widgets titles color', 'alone'),
									'value' => '#ffffff',
									'choices' => $alone_color_settings,
									'type' => 'color-palette'
								),
								'body_widgets_text_color' => array(
									'label' => esc_html__('Body Text Color', 'alone'),
									'desc' => esc_html__('Select the footer widgets body text color', 'alone'),
									'value' => '#898d8e',
									'choices' => $alone_color_settings,
									'type' => 'color-palette'
								),
							),
						),
						'show_borders' => false,
					),
					'copyright_group' => array(
						'type' => 'group',
						'attr' => array('class' => 'border-bottom-none'),
						'options' => array(
							'copyright' => array(
								'label' => esc_html__('Copyright', 'alone'),
								'desc' => esc_html__('Please enter the copyright text', 'alone'),
								'type' => 'textarea',
								'value' => 'Copyright &copy;2017 <a rel="nofollow" href="http://bearsthemes.com">Bearsthemes</a>. All Rights Reserved',
							),
							'copyright_position' => array(
								'label' => esc_html__('Position', 'alone'),
								'desc' => esc_html__('Select the copyright position', 'alone'),
								'type' => 'image-picker',
								'value' => 'bt-copyright-center',
								'choices' => array(
									'bt-copyright-left' => array(
										'small' => array(
											'height' => 50,
											'src' => $alone_template_directory . '/assets/images/image-picker/left-position.jpg',
											'title' => esc_html__('Left', 'alone')
										),
									),
									'bt-copyright-center' => array(
										'small' => array(
											'height' => 50,
											'src' => $alone_template_directory . '/assets/images/image-picker/center-position.jpg',
											'title' => esc_html__('Center', 'alone')
										),
									),
									'bt-copyright-right' => array(
										'small' => array(
											'height' => 50,
											'src' => $alone_template_directory . '/assets/images/image-picker/right-position.jpg',
											'title' => esc_html__('Right', 'alone')
										),
									),
								),
							),
							'html_label' => array(
								'type' => 'html',
								'html' => '',
								'value' => '',
								'label' => esc_html__('Spacing', 'alone'),
							),
							'copyright_top' => array(
								'label' => false,
								'desc' => esc_html__('top', 'alone'),
								'type' => 'short-text',
								'value' => '40',
							),
							'copyright_bottom' => array(
								'label' => false,
								'desc' => esc_html__('bottom ', 'alone'),
								'type' => 'short-text',
								'value' => '30',
							),
							'footer_bg_color' => array(
								'label' => esc_html__('Background Color', 'alone'),
								'desc' => esc_html__('Select the copyright background color', 'alone'),
								'value' => '#fafafa',// $alone_color_settings['color_5'],
								'choices' => $alone_color_settings,
								'type' => 'color-palette'
							),
						)
					)
				)
			)
		)
	),
  'colors-box' => array(
    'title' => esc_html__('Colors', 'alone'),
    'type' => 'box',
    'attr' => array('class' => 'fw-color-picker-palette'),
    'options' => array(
      'color_settings' => array(
        'type' => 'multi',
        'label' => false,
        'inner-options' => array(
          'color_1' => array(
            'label' => esc_html__('Color Palette', 'alone'),
            'desc' => esc_html__('Color 1', 'alone'),
            'type' => 'color-picker',
            'value' => $alone_color_settings['color_1'],
          ),
          'color_2' => array(
            'label' => false, //esc_html__('', 'alone'),
            'desc' => esc_html__('Color 2', 'alone'),
            'type' => 'color-picker',
            'value' => $alone_color_settings['color_2'],
          ),
          'color_3' => array(
            'label' => false, //esc_html__('', 'alone'),
            'desc' => esc_html__('Color 3', 'alone'),
            'type' => 'color-picker',
            'value' => $alone_color_settings['color_3'],
          ),
          'color_4' => array(
            'label' => false, //esc_html__('', 'alone'),
            'desc' => esc_html__('Color 4', 'alone'),
            'type' => 'color-picker',
            'value' => $alone_color_settings['color_4'],
          ),
          'color_5' => array(
            'label' => false, //esc_html__('', 'alone'),
            'desc' => esc_html__('Color 5', 'alone'),
            'type' => 'color-picker',
            'value' => $alone_color_settings['color_5'],
          ),
        )
      ),
      'buttons_settings' => array(
        'type' => 'multi',
        'label' => false,
        'inner-options' => array(
          'links_color_group' => array(
            'type' => 'group',
            'options' => array(
              'links_normal_state' => array(
                'label' => esc_html__('Links Color', 'alone'),
                'desc' => esc_html__('normal state', 'alone'),
                'value' => $alone_color_settings['color_1'],
                'choices' => $alone_color_settings,
                'type' => 'color-palette'
              ),
              'links_hover_state' => array(
                'label' => false, //esc_html__('', 'alone'),
                'desc' => esc_html__('hover state', 'alone'),
                'value' => $alone_color_settings['color_2'],
                'choices' => $alone_color_settings,
                'type' => 'color-palette'
              ),
            )
          ),
          'buttons_color_group' => array(
            'type' => 'group',
            'attr' => array('class' => 'border-bottom-none'),
            'options' => array(
              'buttons_normal_state' => array(
                'label' => esc_html__('Buttons Color', 'alone'),
                'desc' => esc_html__('normal state', 'alone'),
                'value' => $alone_color_settings['color_1'],
                'choices' => $alone_color_settings,
                'type' => 'color-palette'
              ),
              'buttons_hover_state' => array(
                'label' => false, //esc_html__('', 'alone'),
                'desc' => esc_html__('hover state', 'alone'),
                'value' => $alone_color_settings['color_2'],
                'choices' => $alone_color_settings,
                'type' => 'color-palette'
              ),
            )
          ),
        )
      ),
    )
  ),
  'typography-box' => array(
    'title' => esc_html__('Typography', 'alone'),
    'type' => 'box',
    'options' => array(
      'typography_settings' => array(
        'type' => 'multi',
        'label' => false,
        'attr' => array(
          'class' => 'fw-option-type-multi-show-borders',
        ),
        'inner-options' => array(
          'body_text' => array(
            'label' => esc_html__('Body Text', 'alone'),
            'type' => 'tf-typography',
            'value' => array(
              'google_font' => true,
              'subset' => 'latin',
              'variation' => 'regular',
              'family' => 'Quattrocento Sans',
              'style' => '',
              'weight' => '',
              'size' => '16.5',
              'line-height' => '28',
              'letter-spacing' => '0',
              'color-palette' => $alone_color_settings['color_3'],
            ),
          ),
					'buttons_typography_group' => array(
            'type' => 'group',
            'attr' => array('class' => 'border-bottom-none'),
            'options' => array(
              'buttons' => array(
                'label' => esc_html__('Buttons', 'alone'),
                'type' => 'tf-typography',
                'value' => array(
                  'google_font' => true,
                  'subset' => 'latin',
                  'variation' => 'regular',
                  'family' => 'Montserrat',
                  'style' => '',
                  'weight' => '',
                  'size' => '12',
                  'line-height' => '20',
                  'letter-spacing' => '0',
                  'color-palette' => $alone_color_settings['color_5'],
                ),
              ),
              'buttons_hover' => array(
                'label' => false, //esc_html__('', 'alone'),
                'desc' => esc_html__('Select buttons hover color', 'alone'),
                'value' => '#ffffff',
                'choices' => $alone_color_settings,
                'type' => 'color-palette'
              ),
            )
          ),
					/* Start extra fonts */
					'extra_typography_group' => array(
						'title' => esc_html__('Extra Typography', 'alone'),
						'type' => 'box',
						'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'extra_typography' => array(
								'type' => 'addable-popup',
								'size' => 'medium',
								'label' => esc_html__('Typography', 'alone'),
								'desc' => esc_html__('Add your typography from google/font', 'alone'),
								'template' => '{{=name}}',
								'popup-options' => array(
									'name' => array(
										'label' => esc_html__('Name', 'alone'),
										'desc' => esc_html__('Enter a name (it is for internal use and will not appear on the front end)', 'alone'),
										'type' => 'text',
									),
									'typography' => array(
										'label' => esc_html__('Typography', 'alone'),
										'type' => 'tf-typography',
										'value' => array(
											'google_font' => true,
											'subset' => 'latin',
											'variation' => 'regular',
											'family' => 'Montserrat',
											'style' => '',
											'weight' => '',
											'size' => '32',
											'line-height' => '50',
											'letter-spacing' => '0',
											'color-palette' => $alone_color_settings['color_3'],
										)
									),
									'class' => array(
										'label' => esc_html__('Class', 'alone'),
										'desc' => esc_html__('Enter a class (Ex: body .custom-font-style-1)', 'alone'),
										'type' => 'text',
									),
								),
							),
						),
					),
					/* End extra font */
					/* H1 - H6 tag */
					'h1-h6-tag' => array(
            'title' => esc_html__('H1 - H6 Tag', 'alone'),
            'type' => 'box',
						'attr' => array('class' => 'customizer-contaner-wrap-options'), // box-setting-toggle-inside-js is-closed
            'options' => array(
							'h1' => array(
		            'label' => esc_html__('H1', 'alone'),
		            'type' => 'tf-typography',
		            'value' => array(
		              'google_font' => true,
		              'subset' => 'latin',
		              'variation' => '700',
		              'family' => 'Montserrat',
		              'style' => '',
		              'weight' => '',
		              'size' => '55',
		              'line-height' => '65',
		              'letter-spacing' => '0',
		              'color-palette' => $alone_color_settings['color_3'],
		            )
		          ),
		          'h2' => array(
		            'label' => esc_html__('H2', 'alone'),
		            'type' => 'tf-typography',
		            'value' => array(
		              'google_font' => true,
		              'subset' => 'latin',
		              'variation' => '700',
		              'family' => 'Montserrat',
		              'style' => '',
		              'weight' => '',
		              'size' => '40',
		              'line-height' => '56',
		              'letter-spacing' => '0',
		              'color-palette' => $alone_color_settings['color_3'],
		            )
		          ),
		          'h3' => array(
		            'label' => esc_html__('H3', 'alone'),
		            'type' => 'tf-typography',
		            'value' => array(
		              'google_font' => true,
		              'subset' => 'latin',
		              'variation' => '700',
		              'family' => 'Montserrat',
		              'style' => '',
		              'weight' => '',
		              'size' => '32',
		              'line-height' => '38',
		              'letter-spacing' => '0',
		              'color-palette' => $alone_color_settings['color_3'],
		            )
		          ),
		          'h4' => array(
		            'label' => esc_html__('H4', 'alone'),
		            'type' => 'tf-typography',
		            'value' => array(
		              'google_font' => true,
		              'subset' => 'latin',
		              'variation' => '700',
		              'family' => 'Montserrat',
		              'style' => '',
		              'weight' => '',
		              'size' => '26',
		              'line-height' => '32',
		              'letter-spacing' => '0',
		              'color-palette' => $alone_color_settings['color_3'],
		            )
		          ),
		          'h5' => array(
		            'label' => esc_html__('H5', 'alone'),
		            'type' => 'tf-typography',
		            'value' => array(
		              'google_font' => true,
		              'subset' => 'latin',
		              'variation' => '700',
		              'family' => 'Montserrat',
		              'style' => '',
		              'weight' => '',
		              'size' => '19',
		              'line-height' => '28',
		              'letter-spacing' => '0',
		              'color-palette' => $alone_color_settings['color_3'],
		            )
		          ),
		          'h6' => array(
		            'label' => esc_html__('H6', 'alone'),
		            'type' => 'tf-typography',
		            'value' => array(
		              'google_font' => true,
		              'subset' => 'latin',
		              'variation' => '700',
		              'family' => 'Montserrat',
		              'style' => '',
		              'weight' => '',
		              'size' => '14',
		              'line-height' => '26',
									'letter-spacing' => '0',
		              'color-palette' => $alone_color_settings['color_3'],
		            )
		          ),
						)
					),
					/* End H1 - H6 tag */
          'header-typography-box' => array(
            'title' => esc_html__('Header', 'alone'),
            'type' => 'box',
						'attr' => array('class' => 'customizer-contaner-wrap-options'),
            'options' => array(
              'header_top_bar_text' => array(
                'label' => esc_html__('Header Top Bar', 'alone'),
                'type' => 'tf-typography',
                'value' => array(
                  'google_font' => true,
                  'subset' => 'latin',
                  'variation' => 'regular',
                  'family' => 'NTR',
                  'style' => '',
                  'weight' => '',
                  'size' => '13',
                  'line-height' => '38',
                  'letter-spacing' => '0.3',
                  'color-palette' => $alone_color_settings['color_5'],
                ),
              ),
              'header_menu_group' => array(
                'type' => 'group',
                'attr' => array('class' => 'border-bottom-none'),
                'options' => array(
                  'header_menu' => array(
                    'label' => esc_html__('Header Menu', 'alone'),
                    'type' => 'tf-typography',
                    'value' => array(
                      'google_font' => true,
                      'subset' => 'latin',
                      'variation' => 'regular',
                      'family' => 'Montserrat',
                      'style' => '',
                      'weight' => '',
                      'size' => '13',
                      'line-height' => '30',
                      'letter-spacing' => '0',
                      'color-palette' => $alone_color_settings['color_3'],
                    ),
                  ),
                  'header_menu_hover' => array(
                    'label' => false, //esc_html__('', 'alone'),
                    'desc' => esc_html__('Select the menu items hover color', 'alone'),
                    'value' => $alone_color_settings['color_1'],
                    'choices' => $alone_color_settings,
                    'type' => 'color-palette'
                  ),
                  'header_menu_items_spacing' => array(
                    'type' => 'short-text',
                    'value' => '40',
                    'label' => esc_html__('Menu Items Spacing', 'alone'),
                    'desc' => esc_html__('Select the menu items spacing in pixels', 'alone'),
                  )
                )
              ),
              'header_sub_menu_group' => array(
                'type' => 'group',
                'attr' => array('class' => 'border-bottom-none'),
                'options' => array(
                  'header_sub_menu' => array(
                    'label' => esc_html__('Header Sub-Menu', 'alone'),
                    'type' => 'tf-typography',
                    'value' => array(
                      'google_font' => true,
                      'subset' => 'latin',
                      'variation' => 'regular',
                      'family' => 'Montserrat',
                      'style' => '',
                      'weight' => '',
                      'size' => '13',
                      'line-height' => '30',
                      'letter-spacing' => '0',
                      'color-palette' => $alone_color_settings['color_5'],
                    ),
                  ),
                  'header_sub_menu_hover' => array(
                    'label' => false, //esc_html__('', 'alone'),
                    'desc' => esc_html__('Select the sub menu items hover color', 'alone'),
                    'value' => $alone_color_settings['color_1'],
                    'choices' => $alone_color_settings,
                    'type' => 'color-palette'
                  ),
									'header_sub_menu_items_spacing' => array(
                    'type' => 'short-text',
                    'value' => '5',
                    'label' => esc_html__('Sub Menu Items Spacing', 'alone'),
                    'desc' => esc_html__('Select the menu items spacing in pixels', 'alone'),
                  )
                )
              ),
            )
          ),
          'footer-typography-box' => array(
            'title' => esc_html__('Footer', 'alone'),
            'type' => 'box',
						'attr' => array('class' => 'customizer-contaner-wrap-options'),
            'options' => array(
              'footer_copyright_typography' => array(
                'label' => __('Footer Copyright', 'alone'),
                'type' => 'tf-typography',
                'value' => array(
                  'google_font' => true,
                  'subset' => 'latin',
                  'variation' => 'regular',
                  'family' => 'Quattrocento Sans',
                  'style' => '',
                  'weight' => '',
                  'size' => '15',
                  'line-height' => '45',
                  'letter-spacing' => '0',
                  'color-palette' => $alone_color_settings['color_5'],
                ),
              ),
            )
          ),
        )
      )
    )
  ),
);
?>
