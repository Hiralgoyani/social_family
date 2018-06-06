<?php

$alone_admin_url = admin_url();
$alone_template_directory = get_template_directory_uri();

/* Portfolio layout */
$alone_portfolio_layout = array(
	'default' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $alone_template_directory . '/assets/images/image-picker/portfolio-style-default.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $alone_template_directory . '/assets/images/image-picker/portfolio-style-default.jpg'
			),
		),
	),
);

$options = array(
  'portfolio-box' => array(
    'title' => esc_html__('Portfolio', 'alone'),
    'type' => 'box',
    'options' => array(
      'portfolio_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
          'portfolio-listting' => array(
						'title' => esc_html__('Portfolio Listing', 'alone'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
              'portfolio_type' => array(
                'type' => 'image-picker',
                'label' => esc_html__('Portfolio Style', 'alone'),
                'desc' => esc_html__('Select the portfolio display style', 'alone'),
                'value' => 'default',
                'choices' => alone_load_decentralize_setting( $alone_portfolio_layout, 'parent' ),
              ),
              'number_portfolio_per_page' => array(
                'type' => 'short-text',
                'label' => esc_html__('Number Portfolio per page', 'alone'),
                'desc' => esc_html__('Please enter number portfolio per page', 'alone'),
                'value' => 9,
              ),
              'number_portfolio_in_row' => array(
                'type' => 'short-text',
                'label' => esc_html__('Number Portfolio In Row', 'alone'),
                'desc' => esc_html__('Please enter number portfolio in row (default: 3 portfolio in a row)', 'alone'),
                'value' => 3,
              ),
							'show_filter' => array(
								'label' => esc_html__('Filter', 'alone'),
								'desc' => esc_html__('Show filter by taxonomy?', 'alone'),
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
            )
          ),
          'portfolio-single' => array(
						'title' => esc_html__('Single Portfolio', 'alone'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'portfolio_single' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'show_comment' => array(
										'label' => esc_html__('Comment', 'alone'),
										'desc' => esc_html__('Show comment?', 'alone'),
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
                )
              )
            )
          )
        )
      ),
    ),
  )
);
