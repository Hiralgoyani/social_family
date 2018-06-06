<?php

return array(
  'elements' => array(
		'type' => 'sortable',
		'options' => array(
			'element' => 'bears-image-item-element',
			'newTitle' => esc_html__('Item %s', 'alone'),
			'floor'   => 1,
		),
		'context' => 'content',
    'suggest' => array(
      array( 'title' => esc_html__('Image Title', 'alone')),
    )
	),

  /* select layout */
  'layout' => array(
    'type' => 'select',
    'ui' => array(
      'title' => esc_html__('Layout', 'alone'),
      'divider' => true
    ),
    'options' => array(
      'choices' => array(
        array('value' => 'default',   'label' => esc_html__('Default', 'alone')),
        array('value' => 'creative',   'label' => esc_html__('Creative', 'alone')),
      )
    )
  ),

  'show_title_on_hover' => array(
    'type'    => 'toggle',
    'ui' => array(
        'title'   => __( 'Show Title On Hover', 'alone' ),
        'divider' => true,
        // 'tooltip' => __( 'Enables the feature.', 'alone' ),
    ),
    'condition' => array(
			'layout' => array('default', 'creative'),
		)
  ),

  'grid_name' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__('Grid Name', 'alone'),
    ),
    'condition' => array(
			'layout' => array('creative'),
		)
  ),
  'cel_height' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__('Cel-Height', 'alone'),
    ),
    'condition' => array(
			'layout' => array('creative'),
		)
  ),
  'columns' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__('Columns', 'alone'),
    ),
  ),
  'space' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__('Space', 'alone'),
    )
  ),
  'responsive' => array(
		'type' => 'text',
		'ui' => array(
			'title' => esc_html__('Responsive', 'alone'),
      'divider' => true,
		),
	)
);
