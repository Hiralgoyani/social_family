<?php if (!defined('FW')) die('Forbidden');

$menu_type_arr = array(
	'' => esc_html__('Default', 'alone'),
	'sidebar' => esc_html__('Sidebar', 'alone'),
);

// MegaMenu item options, column child, level 3+
$options = array(
	'mega_menu_type' => array(
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
			'sidebar' => array(
				'sidebar_id' => array(
					'type' => 'short-select',
					'label' => esc_html__( 'Sitebar', 'alone' ),
					'desc' => esc_html__( 'Please select sitebar', 'alone' ),
					'value' => '',
					'choices' => alone_get_sidebars(),
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
);
