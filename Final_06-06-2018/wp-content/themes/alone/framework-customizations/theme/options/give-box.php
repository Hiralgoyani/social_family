<?php

$alone_admin_url = admin_url();
$alone_template_directory = get_template_directory_uri();

/* Portfolio layout */
$alone_give_forms_layout = array(
	'default' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $alone_template_directory . '/assets/images/image-picker/give-forms-style-default.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $alone_template_directory . '/assets/images/image-picker/give-forms-style-default.jpg'
			),
		),
	),
	'style-2' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $alone_template_directory . '/assets/images/image-picker/give-forms-style-2.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $alone_template_directory . '/assets/images/image-picker/give-forms-style-2.jpg'
			),
		),
	),
);

$options = array(
  'give-box' => array(
    'title' => esc_html__('Give', 'alone'),
    'type' => 'box',
    'options' => array(
      'give_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
          'give-archive' => array(
						'title' => esc_html__('Archive Page Settings', 'alone'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'give_archive' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'number_form_per_page' => array(
                    'type' => 'short-text',
                    'label' => esc_html__('Number Form per page', 'alone'),
                    'desc' => esc_html__('Please enter number form per page', 'alone'),
                    'value' => 9,
                  ),
                  'number_form_in_row' => array(
                    'type' => 'short-text',
                    'label' => esc_html__('Number Form In Row', 'alone'),
                    'desc' => esc_html__('Please enter number form in row (default: 3 form in a row)', 'alone'),
                    'value' => 3,
                  ),
                )
              )
            )
          ),
          'give-single' => array(
						'title' => esc_html__('Single Page Settings', 'alone'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'give_single' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'single_layout' => array(
                    'type' => 'image-picker',
                    'label' => esc_html__('Layout', 'alone'),
                    'desc' => esc_html__('Select the layout display', 'alone'),
                    'value' => 'default',
                    'choices' => alone_load_decentralize_setting( $alone_give_forms_layout, 'parent' ),
                  ),
                )
              )
            )
          )
        )
      ),
    ),
  )
);
