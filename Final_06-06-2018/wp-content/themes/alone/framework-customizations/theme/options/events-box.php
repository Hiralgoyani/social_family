<?php

$alone_admin_url = admin_url();
$alone_template_directory = get_template_directory_uri();

$options = array(
  'events-box' => array(
    'title' => esc_html__('Events', 'alone'),
    'type' => 'box',
    'options' => array(
      'events_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
          'events-archive' => array(
						'title' => esc_html__('Archive Page Settings', 'alone'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'events_archive' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
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
          'events-single' => array(
						'title' => esc_html__('Single Page Settings', 'alone'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'events_single' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                
                )
              )
            )
          )
        )
      ),
    ),
  )
);
