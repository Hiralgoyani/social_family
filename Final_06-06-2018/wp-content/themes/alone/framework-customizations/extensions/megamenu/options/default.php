<?php if (!defined('FW')) die('Forbidden');

$menu_type_data = array(
	'' => esc_html__('Default', 'alone'),
	'search' => esc_html__('Search', 'alone'),
	'off-cavans-menu' => esc_html__('Off-Canvas Menu', 'alone'),
	'sidebar' => esc_html__('Sidebar', 'alone'),
	'button' => esc_html__('Button', 'alone'),
	'notification_center' => esc_html__('Notification Center', 'alone'),
);


$menu_type_arr = apply_filters( '_megamenu_filter_menu_type', $menu_type_data );

$notification_center_settings = array(
	'search_notification_settings' => array(
		'type'  => 'multi',
		'value' => array(
			'display' => 'show',
			'icon' => array(
				'type' => 'icon-font',
				'icon-class' => 'fa fa-search',
				'icon-class-without-root' => false,
				'pack-name' => 'font-awesome',
				'pack-css-uri' => false
			),
		),
		'label' => false,
		// 'desc'  => __('Description', 'alone'),
		// 'help'  => __('Help tip', 'alone'),
		'inner-options' => array(
			'display' => array(
				'type'  => 'switch',
				// 'value' => 'show',
				'label' => __('Search Icon Display', 'alone'),
				'desc'  => __('Option setting show/hide search notification', 'alone'),
				'help'  => __('Show/Hide', 'alone'),
				'left-choice' => array(
						'value' => 'show',
						'label' => __('Show', 'alone'),
				),
				'right-choice' => array(
						'value' => 'hide',
						'label' => __('Hide', 'alone'),
				),
			),
			'icon' => array(
				'type'  => 'icon-v2',
				'preview_size' => 'medium',
				'modal_size' => 'medium',
				// 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				'label' => __('Search Icon', 'alone'),
				'desc'  => __('Select a icon display for search', 'alone'),
				// 'help'  => __('Help tip', 'alone'),
			)
		)
	),
	'login_notification_settings' => array(
		'type'  => 'multi',
		'value' => array(
			'display' => 'show',
			'icon' => array(
				'type' => 'icon-font',
				'icon-class' => 'entypo entypo-user',
				'icon-class-without-root' => false,
				'pack-name' => 'entypo',
				'pack-css-uri' => false
			),
		),
		'label' => false,
		// 'desc'  => __('Description', 'alone'),
		// 'help'  => __('Help tip', 'alone'),
		'inner-options' => array(
			'display' => array(
				'type'  => 'switch',
				// 'value' => 'show',
				'label' => __('Login Icon Display', 'alone'),
				'desc'  => __('Option setting show/hide login notification', 'alone'),
				'help'  => __('Show/Hide', 'alone'),
				'left-choice' => array(
						'value' => 'show',
						'label' => __('Show', 'alone'),
				),
				'right-choice' => array(
						'value' => 'hide',
						'label' => __('Hide', 'alone'),
				),
			),
			'icon' => array(
				'type'  => 'icon-v2',
				'preview_size' => 'medium',
				'modal_size' => 'medium',
				// 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				'label' => __('Login Icon', 'alone'),
				'desc'  => __('Select a icon display for login', 'alone'),
				// 'help'  => __('Help tip', 'alone'),
			)
		)
	)
);

// check WooCommerce exist
if ( class_exists( 'WooCommerce' ) ) :
	$menu_type_arr['woocommerce-mini-cart'] = esc_html__('WooCommerce Mini Cart', 'alone');
	$notification_center_settings['cart_notification_settings'] = array(
		'type'  => 'multi',
		'value' => array(
			'display' => 'show',
			'icon' => array(
				'type' => 'icon-font',
				'icon-class' => 'unycon unycon-shopping-cart3',
				'icon-class-without-root' => false,
				'pack-name' => 'unycon',
				'pack-css-uri' => false
			),
		),
		'label' => false,
		// 'desc'  => __('Description', 'alone'),
		// 'help'  => __('Help tip', 'alone'),
		'inner-options' => array(
			'display' => array(
				'type'  => 'switch',
				// 'value' => 'show',
				'label' => __('Cart Icon Display', 'alone'),
				'desc'  => __('Option setting show/hide cart notification', 'alone'),
				'help'  => __('Show/Hide', 'alone'),
				'left-choice' => array(
						'value' => 'show',
						'label' => __('Show', 'alone'),
				),
				'right-choice' => array(
						'value' => 'hide',
						'label' => __('Hide', 'alone'),
				),
			),
			'icon' => array(
				'type'  => 'icon-v2',
				'preview_size' => 'medium',
				'modal_size' => 'medium',
				// 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				'label' => __('Cart Icon', 'alone'),
				'desc'  => __('Select a icon display for cart', 'alone'),
				// 'help'  => __('Help tip', 'alone'),
			)
		)
	);
endif;

// give exist
$button_donate_settings = array();
if (class_exists('Give')) :
	$menu_type_arr['button_donate'] = esc_html__('Button Donate', 'alone');
	$button_donate_settings = array(
		'form_id' => array(
			'type'  => 'multi-select',
	    'value' => array(),
	    'label' => __('Select Form Donate', 'alone'),
	    'population' => 'posts',
	    'source' => 'give_forms',
	    'prepopulate' => 10,
	    'limit' => 1,
		),
		'show_title' => array(
	    'type'  => 'switch',
	    'value' => 'true',
	    'label' => __('Display Title', 'alone'),
	    'left-choice' => array(
	        'value' => 'true',
	        'label' => __('True', 'alone'),
	    ),
	    'right-choice' => array(
	        'value' => 'false',
	        'label' => __('False', 'alone'),
	    ),
		),
		'show_goal' => array(
	    'type'  => 'switch',
	    'value' => 'false',
	    'label' => __('Display Goal', 'alone'),
	    'left-choice' => array(
	        'value' => 'true',
	        'label' => __('True', 'alone'),
	    ),
	    'right-choice' => array(
	        'value' => 'false',
	        'label' => __('False', 'alone'),
	    ),
		),
		'show_content' => array(
	    'type'  => 'select',
	    'value' => 'none',
	    'label' => __('Display Content', 'alone'),
	    'choices' => array(
        'none' => __('No Content', 'alone'),
        'above' => __('Display content ABOVE the fields', 'alone'),
        'below' => __('Display content BELOW the fields', 'alone'),
	    ),
	    'no-validate' => false,
		),
		'button_title' => array(
	    'type'  => 'text',
	    'value' => __('Donate Now', 'alone'),
	    'label' => __('Button Title', 'alone'),
	    //'desc'  => __('Description', '{domain}'),
	    //'help'  => __('Help tip', '{domain}'),
		),
	);
endif;

// default (not MegaMenu) item options
$options = array(
	'menu_type' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc' => false,
		'picker' => array(
			'selected' => array(
				'type' => 'short-select',
				'label' => esc_html__( 'Menu Type', 'alone' ),
				'desc' => esc_html__( 'Please select menu type', 'alone' ),
				'value' => '',
				'choices' => $menu_type_arr,
			),
		),
		'choices' => array(
			'off-cavans-menu' => array(
				'menu' => array(
					'type' => 'short-select',
					'label' => esc_html__( 'Menu', 'alone' ),
					'desc' => esc_html__( 'Please select menu for off-canvas content', 'alone' ),
					'value' => '',
					'choices' => alone_build_select_option_wordpress_menu(),
				),
			),
			'sidebar' => array(
				'sidebar_id' => array(
					'type' => 'short-select',
					'label' => esc_html__( 'Sitebar', 'alone' ),
					'desc' => esc_html__( 'Please select sitebar', 'alone' ),
					'value' => '',
					'choices' => alone_get_sidebars(),
				),
			),
			'notification_center' => array(
				'notification_center_settings' => array(
	        'type' => 'box',
	        'options' => $notification_center_settings,
		    ),
			),
			'button_donate' => $button_donate_settings,
		),
	),
	'hidden_menu_title' => array(
		'type' => 'switch',
		'value' => 'no',
		'label' => esc_html__('Hidden Menu Title', 'alone'),
		'left-choice' => array(
			'value' => 'no',
			'label' => esc_html__('No', 'alone'),
		),
		'right-choice' => array(
			'value' => 'yes',
			'label' => esc_html__('Yes', 'alone'),
		)
	),
	'custom_spacing' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc' => false,
		'picker' => array(
			'selected' => array(
				'type' => 'switch',
				'value' => '',
				'label' => esc_html__('Custom Spacing', 'alone'),
				'left-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'alone'),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'alone'),
				)
			),
		),
		'choices' => array(
			'yes' => array(
				'custom_spacing_group' => array(
					'type' => 'group',
					'attr' => array('class' => 'border-bottom-none block-option-child-inline'),
					'options' => array(
						'html_label' => array(
							'type' => 'html',
							'html' => '',
							'value' => '',
							'label' => esc_html__('Spacing', 'alone'),
						),
						'left' => array(
							'label' => false,
							'desc' => esc_html__('left', 'alone'),
							'type' => 'short-text',
							'value' => '',
						),
						'right' => array(
							'label' => false,
							'desc' => esc_html__('right ', 'alone'),
							'type' => 'short-text',
							'value' => '',
						),
					),
				),
			),
		),
	),
	'badge' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc' => false,
		'picker' => array(
			'selected' => array(
				'type' => 'switch',
				'value' => 'no',
				'label' => esc_html__('Badge', 'alone'),
				'left-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'alone'),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'alone'),
				)
			),
		),
		'choices' => array(
			'yes' => array(
				'badge_group' => array(
					'type' => 'group',
					'attr' => array('class' => ''),
					'options' => array(
						'badge_text' => array(
							'type' => 'short-text',
							'html' => '',
							'value' => '',
							'label' => esc_html__('Text', 'alone'),
						),
						'badge_background_color' => array(
							'value' => '#E23F3F',
							'type' => 'color-picker',
							'label' => esc_html__('Background Color', 'alone'),
						),
						'badge_color' => array(
							'value' => '#FFFFFF',
							'type' => 'color-picker',
							'label' => esc_html__('Color', 'alone'),
						),
					),
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
);
