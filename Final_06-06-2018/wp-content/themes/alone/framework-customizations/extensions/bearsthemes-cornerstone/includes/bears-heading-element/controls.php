<?php
/**
 * Element Controls
 */

return array(
  'fade' => array(
		'type' => 'toggle',
		'ui' => array(
			'title' => esc_html__( 'Enable Fade Effect', 'alone' ),
      'tooltip' => esc_html__( 'Activating will make this element fade into view when the user scrolls to it for the first time.', 'alone' ),
		)
	),

	'fade_animation' => array(
		'type' => 'choose',
		'ui' => array(
			'title' => esc_html__( 'Fade Direction', 'alone' ),
      'tooltip' => esc_html__( 'Choose a direction to fade from. "None" will allow the element to fade in without coming from a particular direction.', 'alone' ),
		),
		'options' => array(
			'columns' => '5',
			'choices' => array(
				array( 'value' => 'in',             'tooltip' => esc_html__( 'None', 'alone' ),   'icon' => fa_entity( 'ban' ) ),
				array( 'value' => 'in-from-bottom', 'tooltip' => esc_html__( 'Top', 'alone' ),    'icon' => fa_entity( 'arrow-up' ) ),
				array( 'value' => 'in-from-left',   'tooltip' => esc_html__( 'Right', 'alone' ),  'icon' => fa_entity( 'arrow-right' ) ),
				array( 'value' => 'in-from-top',    'tooltip' => esc_html__( 'Bottom', 'alone' ), 'icon' => fa_entity( 'arrow-down' ) ),
				array( 'value' => 'in-from-right',  'tooltip' => esc_html__( 'Left', 'alone' ),   'icon' => fa_entity( 'arrow-left' ) )
			)
		),
		'condition' => array( 'fade' => true )
	),

	'fade_animation_offset' => array(
		'type' => 'text',
		'ui' => array(
			'title' => esc_html__( 'Offset', 'alone' ),
      'tooltip' => esc_html__( 'Determines how drastic the fade effect will be.', 'alone' ),
		),
		'condition' => array(
			'fade' => true,
			'fade_animation' => array( 'in-from-top', 'in-from-left', 'in-from-right', 'in-from-bottom' )
		)
	),

	'fade_duration' => array(
		'type' => 'text',
		'ui' => array(
			'title' => esc_html__( 'Duration', 'alone' ),
      'tooltip' => esc_html__( 'Determines how long the fade effect will be.', 'alone' ),
		),
		'condition' => array( 'fade' => true )
	),

  /* General params */
  'content' => array(
		'type' => 'textarea',
		'ui' => array(
			'title' => esc_html__( 'Text', 'alone' ),
      'tooltip' => esc_html__( 'Text to be placed inside the heading element.', 'alone' ),
		)
	),
  'level' => array(
		'type' => 'select',
		'ui' => array(
			'title' => esc_html__( 'Heading Level', 'alone' ),
      'tooltip' => esc_html__( 'Determines which heading level should be used in the actual HTML.', 'alone' ),
		),
		'options' => array(
			'choices' => array(
        array( 'value' => 'h1', 'label' => esc_html__( 'h1', 'alone' ) ),
        array( 'value' => 'h2', 'label' => esc_html__( 'h2', 'alone' ) ),
        array( 'value' => 'h3', 'label' => esc_html__( 'h3', 'alone' ) ),
        array( 'value' => 'h4', 'label' => esc_html__( 'h4', 'alone' ) ),
        array( 'value' => 'h5', 'label' => esc_html__( 'h5', 'alone' ) ),
        array( 'value' => 'h6', 'label' => esc_html__( 'h6', 'alone' ) ),
        array( 'value' => 'div', 'label'   => esc_html__( 'Div', 'alone' ) ),
        array( 'value' => 'p', 'label'     => esc_html__( 'P', 'alone' ) ),
        array( 'value' => 'span', 'label'  => esc_html__( 'Span', 'alone' ) ),
			)
		),
	),
  'color' => array(
    'type' => 'color',
    'ui' => array(
        'title'   => esc_html__('Color', 'alone')
    )
  ),
  'font_size' => array(
    'type' => 'text',
    'ui' => array(
        'title'   => esc_html__('Font Size', 'alone')
    )
  ),
  'line_height' => array(
    'type' => 'text',
    'ui' => array(
        'title'   => esc_html__('Line Height', 'alone')
    )
  ),
  'letter_spacing' => array(
    'type' => 'text',
    'ui' => array(
        'title'   => esc_html__('Letter Spacing', 'alone')
    )
  ),
  'custom_typography' => array(
    'type' => 'select',
    'ui' => array(
      'title' => esc_html__('Custom Typography', 'alone'),
      'tooltip' => esc_html__('Select Typography (you can add more custom typography on the customize setting / Typography)', 'alone'),
    ),
    'options' => array(
      'choices' => alone_get_extra_typography('element_select_option'),
    ),
  ),
  'common' => array( 'padding', 'margin', 'border', 'text_align' ),
);
