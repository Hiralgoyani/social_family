<?php
return array(
	'elements' => array(
		'type' => 'sortable',
		'options' => array(
			'element' => 'bears-carousel-item-element',
			'newTitle' => __('Item %s', 'alone'),
			'floor'   => 1,
		),
		'context' => 'content',
		'suggest' => array(
	    array( 'title' => 'Title', 'content' => 'Content...' ),
	    array( 'title' => 'Title', 'content' => 'Content...' ),
	    array( 'title' => 'Title', 'content' => 'Content...' ),
	    array( 'title' => 'Title', 'content' => 'Content...' ),
	  )
	),

	/* for carousel */
	'owl_carousel_margin' => array(
		'type'    => 'text',
    'ui' => array(
        'title'   => __('Margin', 'alone'),
    ),
	),
	'owl_carousel_loop' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => __('Loop', 'alone'),
    ),
	),
	'owl_carousel_autoplay' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => __('Autoplay', 'alone'),
    ),
	),
	'owl_carousel_autoplay_timeout' => array(
		'type'    => 'text',
    'ui' => array(
        'title'   => __('Autoplay Timeout', 'alone'),
    ),
    'condition' => array(
			'owl_carousel_autoplay' => true),
	),
	'owl_carousel_autoplay_hover_pause' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => __('Autoplay Hover Pause', 'alone'),
    ),
	),
	'owl_carousel_show_nav' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => __('Show Navs', 'alone'),
    ),
	),
	'owl_carousel_show_dots' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => __('Show Dots', 'alone'),
    ),
	),
	'owl_carousel_responsive' => array(
		'type' => 'text',
		'ui' => array(
			'title' => __('Responsive', 'alone')
		),
	)
);
