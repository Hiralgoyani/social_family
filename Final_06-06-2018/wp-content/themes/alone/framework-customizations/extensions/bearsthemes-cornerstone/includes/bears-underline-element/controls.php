<?php

return array(
  'common' => array( 'margin' ),
  'max_width' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__('Max Width', 'alone'),
    )
  ),
  'color' => array(
    'type' => 'color',
    'ui' => array(
        'title'   => esc_html__('Color', 'alone')
    )
  ),
  'layout' => array(
    'type' => 'select',
		'ui' => array(
			'title' => esc_html__( 'Layout', 'alone' ),
		),
    'options' => array(
			'choices' => array(
        array( 'value' => 'default', 'label' => esc_html__( 'Default', 'alone' ) ),
      )
    ),
  )
);
