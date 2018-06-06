<?php
/**
 * Element Controls
 */

return array(
  'title' => array(
		'type' => 'title',
		'context' => 'content',
		'suggest' => esc_html__( 'Image', 'alone' ),
	),
  'image' => array(
    'type' => 'image',
    'ui' => array(
      'title' => esc_html__( 'Image', 'alone' ),
      'tooltip' => esc_html__( 'Choose an image to display above your gallery.', 'alone' ),
    )
  ),
);
