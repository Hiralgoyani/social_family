<?php
$social_team_template = "
<ul class='team-social-layout-default'>
	<li><a href='#' data-toggle='tooltip' title='Facebook' target='_blank'><i class='fa fa-facebook'></i></a></li>
	<li><a href='#' data-toggle='tooltip' title='Google+' target='_blank'><i class='fa fa-google-plus'></i></a></li>
	<li><a href='#' data-toggle='tooltip' title='Twitter' target='_blank'><i class='fa fa-twitter'></i></a></li>
</ul>";

return array(
	'elements' => array(
		'type' => 'sortable',
		'options' => array(
			'element' => 'bears-team-item-element',
			'newTitle' => esc_html__('Item %s', 'alone'),
			'floor'   => 1,
		),
		'context' => 'content',
		'suggest' => array(
	    array( 'title' => esc_html__('John Doe', 'alone'), 'subtitle' => esc_html__('CEO/Founder FT', 'alone'), 'content' => $social_team_template),
	    array( 'title' => esc_html__('Annabel Croft', 'alone'), 'subtitle' => esc_html__('Chartered Financial Advisor', 'alone'), 'content' => $social_team_template),
	    array( 'title' => esc_html__('Jammie Stone', 'alone'), 'subtitle' => esc_html__('SEO/Designer', 'alone'), 'content' => $social_team_template),
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
      )
    )
  ),

	/* overlay color */
	'overlay_color' => array(
		'type' => 'color',
		'ui' => array(
			'title' => esc_html__('Overlay Color', 'alone'),
		),
		'condition' => array(
			'layout' => array('default-carousel'),
		)
	),

	/* for carousel */
	'owl_carousel_margin' => array(
		'type'    => 'text',
    'ui' => array(
        'title'   => esc_html__('Margin', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel'),
		)
	),
	'owl_carousel_loop' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => esc_html__('Loop', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel'),
		)
	),
	'owl_carousel_autoplay' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => esc_html__('Autoplay', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel'),
		)
	),
	'owl_carousel_autoplay_timeout' => array(
		'type'    => 'text',
    'ui' => array(
        'title'   => esc_html__('Autoplay Timeout', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel'),
			'owl_carousel_autoplay' => true),
	),
	'owl_carousel_autoplay_hover_pause' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => esc_html__('Autoplay Hover Pause', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel'),
		)
	),
	'owl_carousel_show_nav' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => esc_html__('Show Navs', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel'),
		)
	),
	'owl_carousel_show_dots' => array(
		'type'    => 'toggle',
    'ui' => array(
        'title'   => esc_html__('Show Dots', 'alone'),
    ),
    'condition' => array(
			'layout' => array('default-carousel'),
		)
	),
	'owl_carousel_responsive' => array(
		'type' => 'text',
		'ui' => array(
			'title' => esc_html__('Responsive', 'alone')
		),
		'condition' => array(
			'layout' => array('default-carousel'),
		)
	)
);
