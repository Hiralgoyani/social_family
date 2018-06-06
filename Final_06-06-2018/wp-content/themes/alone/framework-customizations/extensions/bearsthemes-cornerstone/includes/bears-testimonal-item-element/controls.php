<?php
/**
 * Element Controls
 */

return array(
  'avatar' => array(
    'type' => 'image',
    'ui' => array(
      'title' => esc_html__( 'Avatar', 'alone' ),
      'tooltip' => esc_html__( 'Choose an avatar to display above your content.', 'alone' ),
    )
  ),
  'title' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__( 'Title', 'alone' ),
    ),
    'context' => 'content',
  ),
  'subtitle' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__( 'Sub-Title', 'alone' ),
    )
  ),
  'content' => array(
		'type'    => 'editor',
		'context' => 'content',
	),
  'title_color' => array(
    'type' => 'color',
    'ui' => array(
      'title' => esc_html__( 'Color Title & Sub-Title', 'alone' ),
      'tooltip' => esc_html__( 'Optional tooltip. Shown when hovering over the control label', 'alone' ),
    )
  ),
  'subtitle_color' => array(
    'type' => 'color',
  ),
  'title_custom_typography' => array(
    'type' => 'select',
    'ui' => array(
      'title' => esc_html__('Title Custom Typography', 'alone'),
      'tooltip' => esc_html__('Select Typography (you can add more custom typography on the customize setting / Typography)', 'alone'),
    ),
    'options' => array(
      'choices' => alone_get_extra_typography('element_select_option'),
    ),
  ),
  'subtitle_custom_typography' => array(
    'type' => 'select',
    'ui' => array(
      'title' => esc_html__('Sub-Title Custom Typography', 'alone'),
      'tooltip' => esc_html__('Select Typography (you can add more custom typography on the customize setting / Typography)', 'alone'),
    ),
    'options' => array(
      'choices' => alone_get_extra_typography('element_select_option'),
    ),
  ),
  'content_custom_typography' => array(
    'type' => 'select',
    'ui' => array(
      'title' => esc_html__('Content Custom Typography', 'alone'),
      'tooltip' => esc_html__('Select Typography (you can add more custom typography on the customize setting / Typography)', 'alone'),
    ),
    'options' => array(
      'choices' => alone_get_extra_typography('element_select_option'),
    ),
  ),
);
