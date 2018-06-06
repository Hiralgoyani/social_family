<?php

$alone_admin_url = admin_url();
$alone_template_directory = get_template_directory_uri();

/* Cart */
/* Cart */
$notification_cart_settings = array(
  'title' => esc_html__('Notification Cart Settings', 'alone'),
  'type' => 'box',
  'attr' => array('class' => 'customizer-contaner-wrap-options'),
  'options' => array(

  )
);
/* WooCommerce */
if(class_exists('WooCommerce')) :
  $notification_cart_settings = array(
    'title' => esc_html__('Notification Cart Settings', 'alone'),
    'type' => 'box',
    'attr' => array('class' => 'customizer-contaner-wrap-options'),
    'options' => array(
      'notification_cart' => array(
        'type' => 'multi',
        'label' => false,
        'attr' => array(
          'class' => 'fw-option-type-multi-show-borders',
        ),
        'inner-options' => array(
          'display' => array(
            'type'  => 'switch',
            'value' => 'yes',
            // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
            'label' => __('Show/Hide', 'alone'),
            'desc'  => __('Setting show/hide cart notification (default: yes)', 'alone'),
            // 'help'  => __('Setting show/hide search notification', 'alone'),
            'left-choice' => array(
                'value' => 'yes',
                'label' => __('Yes', 'alone'),
            ),
            'right-choice' => array(
                'value' => 'no',
                'label' => __('No', 'alone'),
            ),
          ),
          'label' => array(
            'type'  => 'text',
            'value' => __('Cart', 'alone'),
            // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
            'label' => __('Label', 'alone'),
            'desc'  => __('Enter label for cart', 'alone'),
            // 'help'  => __('Help tip', 'alone'),
          )
        )
      )
    )
  );
endif;
// print_r($notification_cart_settings);

$options = array(
  'notification-center' => array(
    'title' => esc_html__('Notification Center', 'alone'),
    'type' => 'box',
    'options' => array(
      'notification_center_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
          'style' => array(
						'title' => esc_html__('Notification Style', 'alone'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'style' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'style' => array(
                    'type'  => 'switch',
                    'value' => 'dark',
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Dark/Light', 'alone'),
                    'desc'  => __('Setting style notification (default: Dark)', 'alone'),
                    // 'help'  => __('Setting show/hide search notification', 'alone'),
                    'left-choice' => array(
                        'value' => 'dark',
                        'label' => __('Dark', 'alone'),
                    ),
                    'right-choice' => array(
                        'value' => 'light',
                        'label' => __('Light', 'alone'),
                    ),
                  ),
                ),
              )
            )
          ),
          'notification-search' => array(
						'title' => esc_html__('Notification Search Settings', 'alone'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'notification_search' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'display' => array(
                    'type'  => 'switch',
                    'value' => 'yes',
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Show/Hide', 'alone'),
                    'desc'  => __('Setting show/hide search notification (default: yes)', 'alone'),
                    // 'help'  => __('Setting show/hide search notification', 'alone'),
                    'left-choice' => array(
                        'value' => 'yes',
                        'label' => __('Yes', 'alone'),
                    ),
                    'right-choice' => array(
                        'value' => 'no',
                        'label' => __('No', 'alone'),
                    ),
                  ),
                  'label' => array(
                    'type'  => 'text',
                    'value' => __('Search', 'alone'),
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Label', 'alone'),
                    'desc'  => __('Enter label for search', 'alone'),
                    // 'help'  => __('Help tip', 'alone'),
                  )
                )
              )
            )
          ),
          'notification-post' => array(
						'title' => esc_html__('Notification Recent Post Settings', 'alone'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'notification_post' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'display' => array(
                    'type'  => 'switch',
                    'value' => 'yes',
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Show/Hide', 'alone'),
                    'desc'  => __('Setting show/hide post notification (default: yes)', 'alone'),
                    // 'help'  => __('Setting show/hide search notification', 'alone'),
                    'left-choice' => array(
                        'value' => 'yes',
                        'label' => __('Yes', 'alone'),
                    ),
                    'right-choice' => array(
                        'value' => 'no',
                        'label' => __('No', 'alone'),
                    ),
                  ),
                  'label' => array(
                    'type'  => 'text',
                    'value' => __('Posts', 'alone'),
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Label', 'alone'),
                    'desc'  => __('Enter label for post', 'alone'),
                    // 'help'  => __('Help tip', 'alone'),
                  )
                )
              )
            )
          ),
          'notification-login' => array(
						'title' => esc_html__('Notification Login Settings', 'alone'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'notification_login' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'display' => array(
                    'type'  => 'switch',
                    'value' => 'yes',
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Show/Hide', 'alone'),
                    'desc'  => __('Setting show/hide login notification (default: yes)', 'alone'),
                    // 'help'  => __('Setting show/hide search notification', 'alone'),
                    'left-choice' => array(
                        'value' => 'yes',
                        'label' => __('Yes', 'alone'),
                    ),
                    'right-choice' => array(
                        'value' => 'no',
                        'label' => __('No', 'alone'),
                    ),
                  ),
                  'label' => array(
                    'type'  => 'text',
                    'value' => __('Login', 'alone'),
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Label', 'alone'),
                    'desc'  => __('Enter label for login', 'alone'),
                    // 'help'  => __('Help tip', 'alone'),
                  )
                )
              )
            )
          ),
          'notification-cart' => $notification_cart_settings,
        )
      ),
    ),
  )
);
