<?php
$alone_admin_url = admin_url();
$alone_template_directory = get_template_directory_uri();

/* Blog layout */
$alone_recipes_layout = array(
	'recipe-1' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $alone_template_directory . '/assets/images/image-picker/recipe-style1.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $alone_template_directory . '/assets/images/image-picker/recipe-style1.jpg'
			),
		),
	),
);

$recipe_single_opts = array(
	'single-recipes' => array(
		'title' => esc_html__('Single Recipes', 'alone'),
		'type' => 'box',
		'attr' => array('class' => 'customizer-contaner-wrap-options'),
		'options' => array(
			'posts_single' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(

					'related_articles' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'selected' => array(
								'label' => esc_html__('Related Articles', 'alone'),
								'desc' => esc_html__('Show related articles?', 'alone'),
								'type' => 'switch',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__('Yes', 'alone')
								),
								'left-choice' => array(
									'value' => 'no',
									'label' => esc_html__('No', 'alone')
								),
								'value' => 'yes',
							),
						),
						'choices' => array(
							'yes' => array(
								'related_type' => array(
									'label' => false, // esc_html__('', 'alone'),
									'type' => 'image-picker',
									'value' => 'related-articles-1',
									'desc' => esc_html__('Select the related articles type', 'alone'),
									'choices' => array(
										'related-articles-1' => array(
											'small' => array(
												'height' => 70,
												'src' => $alone_template_directory . '/assets/images/image-picker/related-articles-type-1.jpg',
											),
											'large' => array(
												'height' => 214,
												'src' => $alone_template_directory . '/assets/images/image-picker/related-articles-type-1.jpg',
											),
										),
									),
								),
							),
						),
					),
				)
			)
		)
	),
);

$options = array(
  'recipe-box' => array(
    'title' => esc_html__('Recipes', 'alone'),
    'type' => 'box',
    'options' => array(
      'recipe_settings' => array(
        'type' => 'multi',
        'label' => false,
        'attr' => array(
          'class' => 'fw-option-type-multi-show-borders',
        ),
        'inner-options' => array(
          'recipes-box' => array(
						'title' => esc_html__('Recipes', 'alone'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
              'recipe_type' => array(
                'type' => 'image-picker',
                'label' => esc_html__('Recipe Style', 'alone'),
                'desc' => esc_html__('Select the recipes display style', 'alone'),
                'value' => 'recipe-1',
                'choices' => alone_load_decentralize_setting( $alone_recipes_layout, 'parent' ),
              ),
							'number_post_in_row' => array(
                'type' => 'short-text',
                'label' => esc_html__('Number Post In Row', 'alone'),
                'desc' => esc_html__('Please enter number post in row (default: 2 posts in a row)', 'alone'),
                'value' => 2,
              ),
						)
					),
					// $recipe_single_opts,
        )
      )
    ),
  )
);
