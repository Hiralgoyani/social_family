<?php

return array(
  'common' => array( 'margin' ),
  'order_by' => array(
    'type' => 'select',
		'ui' => array(
			'title' => esc_html__( 'Order By', 'alone' ),
		),
    'options' => array(
      'choices' => array(
        array( 'value' => 'post_date', 'label' => esc_html__( 'Post Date', 'alone' ) ),
        array( 'value' => 'post_title', 'label' => esc_html__( 'Post Title', 'alone' ) ),
      )
    )
  ),
  'order' => array(
    'type' => 'select',
		'ui' => array(
			'title' => esc_html__( 'Order', 'alone' ),
		),
    'options' => array(
      'choices' => array(
        array( 'value' => 'DESC', 'label' => esc_html__( 'DESC', 'alone' ) ),
        array( 'value' => 'ASC', 'label' => esc_html__( 'ASC', 'alone' ) ),
      )
    )
  ),
  'category' => array(
    'type' => 'text',
    'ui' => array(
			'title' => esc_html__( 'Category (Slug)', 'alone' ),
		),
  ),
  'number' => array(
    'type' => 'number',
    'ui' => array(
      'title' => esc_html__('Number', 'alone'),
    )
  ),
  'columns' => array(
    'type' => 'number',
    'ui' => array(
      'title' => esc_html__('Columns', 'alone'),
    )
  ),
  'space' => array(
    'type' => 'number',
    'ui' => array(
      'title' => esc_html__('Space', 'alone'),
    )
  ),
  'filter' => array(
		'type' => 'toggle',
		'ui' => array(
			'title' => esc_html__( 'Enable Filter', 'alone' ),
      // 'tooltip' => esc_html__( 'Activating will make this element fade into view when the user scrolls to it for the first time.', 'alone' ),
		)
	),
  'filter_align' => array(
    'type' => 'select',
		'ui' => array(
			'title' => esc_html__( 'Filter Align', 'alone' ),
		),
    'options' => array(
			'choices' => array(
        array( 'value' => 'text-left', 'label' => esc_html__( 'Left', 'alone' ) ),
        array( 'value' => 'text-right', 'label' => esc_html__( 'Right', 'alone' ) ),
        array( 'value' => 'text-center', 'label' => esc_html__( 'Center', 'alone' ) ),
      )
    ),
    'condition' => array( 'filter' => true )
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
  ),
);
