<?php
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

  /* general settings */
  'text' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__('Text', 'alone'),
    )
  ),
  'link' => array(
      'mixin' => 'link',
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
  'font_size' => array(
    'type' => 'text',
    'ui' => array(
      'title' => esc_html__('Font Size', 'alone'),
    )
  ),

  /* select layout */
  'layout' => array(
    'type' => 'select',
    'ui' => array(
      'title' => esc_html__('Layout', 'alone'),
      'tooltip' => esc_html__('Select layout for button', 'alone'),
      'divider' => true
    ),
    'options' => array(
      'choices' => array(
        array('value' => 'default',   'label' => esc_html__('Default', 'alone')),
        array('value' => 'border-line',   'label' => esc_html__('Border-line', 'alone')),
      )
    )
  ),

  'common' => array( 'padding', 'margin' ),
  'border_radius' => array(
		'type' => 'dimensions',
		'ui' => array(
			'title' => esc_html__( 'Border Radius', 'alone' ),
			'tooltip' =>esc_html__( 'Specify a custom border radius for each side of this element. Can accept CSS units like px, ems, and % (default unit is px).', 'alone' ),
		)
	),
);
