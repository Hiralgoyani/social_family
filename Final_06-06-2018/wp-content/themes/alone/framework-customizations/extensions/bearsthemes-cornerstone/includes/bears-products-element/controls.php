<?php

return array(
  'common' => array( 'margin' ),
  'number' => array(
    'type' => 'number',
    'ui' => array(
      'title' => esc_html__('Number of products to show', 'alone'),
    )
  ),
  'columns' => array(
    'type' => 'select',
		'ui' => array(
			'title' => esc_html__( 'Columns', 'alone' ),
		),
    'options' => array(
			'choices' => array(
        array( 'value' => 'col-1', 'label' => esc_html__( '1 Column', 'alone' ) ),
        array( 'value' => 'col-2', 'label' => esc_html__( '2 Columns', 'alone' ) ),
        array( 'value' => 'col-3', 'label' => esc_html__( '3 Columns', 'alone' ) ),
        array( 'value' => 'col-4', 'label' => esc_html__( '4 Columns', 'alone' ) ),
        array( 'value' => 'col-5', 'label' => esc_html__( '5 Columns', 'alone' ) ),
      )
    ),
  ),
  'show' => array(
    'type' => 'select',
		'ui' => array(
			'title' => esc_html__( 'Show', 'alone' ),
		),
    'options' => array(
			'choices' => array(
        array( 'value' => '', 'label' => esc_html__( 'All Products', 'alone' ) ),
        array( 'value' => 'featured', 'label' => esc_html__( 'Featured Products', 'alone' ) ),
        array( 'value' => 'onsale', 'label' => esc_html__( 'On-sale Products', 'alone' ) ),
        array( 'value' => 'by-category', 'label' => esc_html__( 'By Category', 'alone' ) ),
      )
    ),
  ),
  'category' => array(
    'type' => 'text',
		'ui' => array(
			'title' => esc_html__('Category', 'alone'),
      'tooltip' => esc_html__('To filter your posts by category, enter in the slug of your desired category. To filter by multiple categories, enter in your slugs separated by a comma.', 'alone'),
		),
    'condition' => array(
			'show' => array('by-category'),
		)
  ),
  'orderby' => array(
    'type' => 'select',
		'ui' => array(
			'title' => esc_html__( 'Order by', 'alone' ),
		),
    'options' => array(
			'choices' => array(
        array( 'value' => 'date', 'label' => esc_html__( 'Date', 'alone' ) ),
        array( 'value' => 'price', 'label' => esc_html__( 'Price', 'alone' ) ),
        array( 'value' => 'rand', 'label' => esc_html__( 'Random', 'alone' ) ),
        array( 'value' => 'sales', 'label' => esc_html__( 'Sales', 'alone' ) ),
      )
    ),
  ),
  'order' => array(
    'type' => 'select',
		'ui' => array(
			'title' => esc_html__( 'Order', 'alone' ),
		),
    'options' => array(
			'choices' => array(
        array( 'value' => 'asc', 'label' => esc_html__( 'ASC', 'alone' ) ),
        array( 'value' => 'desc', 'label' => esc_html__( 'DESC', 'alone' ) ),
      )
    ),
  ),
  'layout' => array(
    'type' => 'select',
		'ui' => array(
			'title' => esc_html__( 'Layout', 'alone' ),
		),
    'options' => array(
			'choices' => array(
        array( 'value' => 'default', 'label' => esc_html__( 'Default', 'alone' ) ),
        array( 'value' => 'masonry', 'label' => esc_html__( 'Masonry', 'alone' ) ),
      )
    ),
  ),
  'filter' => array(
		'type' => 'toggle',
		'ui' => array(
			'title' => esc_html__( 'Enable Filter', 'alone' ),
      // 'tooltip' => esc_html__( 'Activating will make this element fade into view when the user scrolls to it for the first time.', 'alone' ),
		),
    'condition' => array(
      'layout' => 'masonry',
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
    'condition' => array(
      'layout' => 'masonry',
      'filter' => true
    )
  ),
);
