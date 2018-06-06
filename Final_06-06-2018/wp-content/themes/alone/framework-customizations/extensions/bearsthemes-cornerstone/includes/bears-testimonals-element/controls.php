<?php
return array(
	'elements' => array(
		'type' => 'sortable',
		'options' => array(
			'element' => 'bears-testimonal-item-element',
			'newTitle' => esc_html__('Item %s', 'alone'),
			'floor'   => 1,
		),
		'context' => 'content',
		'suggest' => array(
	    array( 'title' => esc_html__('John Doe', 'alone'), 'subtitle' => esc_html__('CEO/Founder FT', 'alone'), 'content' => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected', 'alone')),
	    array( 'title' => esc_html__('Annabel Croft', 'alone'), 'subtitle' => esc_html__('CEO/Founder FT', 'alone'), 'content' => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected', 'alone')),
	    array( 'title' => esc_html__('Jammie Stone', 'alone'), 'subtitle' => esc_html__('CEO/Founder FT', 'alone'), 'content' => esc_html__('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected', 'alone')),
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
        array('value' => 'default-carousel',   'label' => esc_html__('Default (Carousel)', 'alone')),
        array('value' => 'carousel-2',   'label' => esc_html__('Carousel Style 2', 'alone')),
      )
    )
  ),

	/* for layout carousel-2 */
	'carousel_2_item_background' => array(
		'type' => 'color',
    'ui' => array(
      'title' => esc_html__( 'Item Background Color', 'alone' ),
      // 'tooltip' => esc_html__( 'Optional tooltip. Shown when hovering over the control label', 'alone' ),
    ),
		'condition' => array(
			'layout' => array('default-carousel', 'carousel-2'),
		)
	),

	/* for carousel */
	'owl_carousel_margin' => array(
		'type'    => 'text',
    'ui' => array(
        'title'   => esc_html__('Margin', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel', 'carousel-2'),
		)
	),
	'owl_carousel_loop' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => esc_html__('Loop', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel', 'carousel-2'),
		)
	),
	'owl_carousel_autoplay' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => esc_html__('Autoplay', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel', 'carousel-2'),
		)
	),
	'owl_carousel_autoplay_timeout' => array(
		'type'    => 'text',
    'ui' => array(
        'title'   => esc_html__('Autoplay Timeout', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel', 'carousel-2'),
			'owl_carousel_autoplay' => true),
	),
	'owl_carousel_autoplay_hover_pause' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => esc_html__('Autoplay Hover Pause', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel', 'carousel-2'),
		)
	),
	'owl_carousel_show_nav' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => esc_html__('Show Navs', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel', 'carousel-2'),
		)
	),
	'owl_carousel_show_dots' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => esc_html__('Show Dots', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel', 'carousel-2'),
		)
	),
	'owl_carousel_responsive' => array(
		'type' => 'text',
		'ui' => array(
			'title' => esc_html__('Responsive', 'alone')
		),
		'condition' => array(
			'layout' => array('default-carousel', 'carousel-2'),
		)
	)
);
