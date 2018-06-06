<?php
return array(
  'post_count' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__('Post Count', 'alone'),
    )
  ),
  'columns' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__('Columns', 'alone'),
    )
  ),
  'offset' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__('Offset', 'alone'),
    )
  ),
  'category' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__('Category', 'alone'),
      'tooltip' => __( 'Please enter slug category', 'alone' ),
    )
  ),
  'sticky_posts' => array(
    'type'    => 'toggle',
    'ui' => array(
        'title'   => __( 'Sticky Posts (First only)', 'alone' ),
    ),
  ),
  'image_size' => array(
    'type' => 'select',
    'ui' => array(
      'title' => esc_html__('Image Size', 'alone'),
    ),
    'options' => array(
      'choices' => array(
        array('value' => 'thumbnail', 'label' => esc_html__('Thumbnail', 'alone')),
        array('value' => 'medium', 'label' => esc_html__('Medium', 'alone')),
        array('value' => 'medium_large', 'label' => esc_html__('Medium Large', 'alone')),
        array('value' => 'large', 'label' => esc_html__('Large', 'alone')),
        array('value' => 'alone-image-large', 'label' => esc_html__('Large (1228 x 691)', 'alone')),
        array('value' => 'alone-image-medium', 'label' => esc_html__('Medium (614 x 346)', 'alone')),
        array('value' => 'alone-image-small', 'label' => esc_html__('Small (295 x 166)', 'alone')),
        array('value' => 'alone-image-square-800', 'label' => esc_html__('Square (800 x 800)', 'alone')),
        array('value' => 'alone-image-square-300', 'label' => esc_html__('Square (300 x 300)', 'alone')),
      )
    ),
  ),

  /* select layout */
  'layout' => array(
    'type' => 'select',
    'ui' => array(
      'title' => esc_html__('Layout', 'alone'),
      'tooltip' => esc_html__('Select layout for post', 'alone'),
    ),
    'options' => array(
      'choices' => array(
        array('value' => 'default',   'label' => esc_html__('Default', 'alone')),
        array('value' => 'background',   'label' => esc_html__('Background', 'alone')),
      )
    )
  ),
);
