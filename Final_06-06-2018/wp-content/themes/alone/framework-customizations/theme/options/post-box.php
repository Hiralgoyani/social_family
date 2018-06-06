<?php
$alone_admin_url = admin_url();
$alone_template_directory = get_template_directory_uri();

/* Blog layout */
$alone_blog_layout = array(
	'blog-1' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $alone_template_directory . '/assets/images/image-picker/blog-style4.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $alone_template_directory . '/assets/images/image-picker/blog-style4.jpg'
			),
		),
	),
	'blog-2' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $alone_template_directory . '/assets/images/image-picker/blog-style5.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $alone_template_directory . '/assets/images/image-picker/blog-style5.jpg'
			),
		),
	),
);

$options = array(
  'post-box' => array(
    'title' => esc_html__('Posts', 'alone'),
    'type' => 'box',
    'options' => array(
      'post_settings' => array(
        'type' => 'multi',
        'label' => false,
        'attr' => array(
          'class' => 'fw-option-type-multi-show-borders',
        ),
        'inner-options' => array(
          'posts-box' => array(
						'title' => esc_html__('Posts', 'alone'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
              'blog_type' => array(
                'type' => 'image-picker',
                'label' => esc_html__('Blog Style', 'alone'),
                'desc' => esc_html__('Select the blog display style', 'alone'),
                'value' => 'blog-1',
                'choices' => alone_load_decentralize_setting( $alone_blog_layout, 'parent' ),
              ),
							'number_post_in_row' => array(
                'type' => 'short-text',
                'label' => esc_html__('Number Post In Row', 'alone'),
                'desc' => esc_html__('Please enter number post in row (default: 2 posts in a row)', 'alone'),
                'value' => 2,
              ),
              'blog_title' => array(
                'type' => 'multi-picker',
                'label' => false,
                'desc' => false,
                'picker' => array(
                  'selected' => array(
                    'type' => 'short-select',
                    'label' => esc_html__('Blog Titles', 'alone'),
                    'desc' => esc_html__('Choose the blog titles size, H1 being the largest', 'alone'),
                    'value' => 'h2',
                    'choices' => array(
                      'h1' => 'H1',
                      'h2' => 'H2',
                      'h3' => 'H3',
                      'h4' => 'H4',
                      'h5' => 'H5',
                      'h6' => 'H6',
                    )
                  ),
                ),
              ),
							'blog_pagination' => array(
								'label' => esc_html__('Pagination Type', 'alone'),
								'type' => 'image-picker',
								'value' => 'paging-navigation-type-1',
								'desc' => esc_html__('Select the blog pagination type', 'alone'),
								'choices' => array(
									'paging-navigation-type-1' => array(
										'small' => array(
											'height' => 61,
											'src' => $alone_template_directory . '/assets/images/image-picker/blog-pagination-type-1.jpg',
										),
										'large' => array(
											'height' => 122,
											'src' => $alone_template_directory . '/assets/images/image-picker/blog-pagination-type-1.jpg',
										),
									),
									'paging-navigation-type-2' => array(
										'small' => array(
											'height' => 61,
											'src' => $alone_template_directory . '/assets/images/image-picker/blog-pagination-type-3.jpg',
										),
										'large' => array(
											'height' => 122,
											'src' => $alone_template_directory . '/assets/images/image-picker/blog-pagination-type-3.jpg',
										),
									),
								),
							),
						)
					),
					'single-posts' => array(
						'title' => esc_html__('Single Posts', 'alone'),
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

									'post_author_box' => array(
										'label' => esc_html__('Author Box', 'alone'),
										'desc' => esc_html__('Show author box?', 'alone'),
										'type' => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => esc_html__('Yes', 'alone')
										),
										'left-choice' => array(
											'value' => 'no',
											'label' => esc_html__('No', 'alone')
										),
										'value' => 'no',
									),
									'post_navigation' => array(
										'label' => esc_html__('Post Navigation', 'alone'),
										'desc' => esc_html__('Show post navigation?', 'alone'),
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
                            /*
														'related-articles-2' => array(
															'small' => array(
																'height' => 70,
																'src' => $alone_template_directory . '/assets/images/image-picker/related-articles-type-2.jpg',
															),
															'large' => array(
																'height' => 214,
																'src' => $alone_template_directory . '/assets/images/image-picker/related-articles-type-2.jpg',
															),
														),
                            */
													),
												),
											),
										),
									),
								)
							)
						)
					),
        )
      )
    ),
  )
);
