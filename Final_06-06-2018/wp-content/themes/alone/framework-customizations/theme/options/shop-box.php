<?php

$options = array(
  'shop-box' => array(
    'title' => esc_html__('Shop', 'alone'),
    'type' => 'box',
    'options' => array(
      'shop_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
          'products_in_row' => array(
            'label' => esc_html__('Product In Row', 'alone'),
            'desc' => esc_html__('Enter number products in a row', 'alone'),
            'value' => 4,
            'type' => 'short-text',
          ),
        )
      ),
    ),
  )
);
