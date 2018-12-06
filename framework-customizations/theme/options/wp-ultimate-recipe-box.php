<?php
$dream_admin_url = admin_url();
$dream_template_directory = get_template_directory_uri();

/* Blog layout */
$dream_recipes_layout = array(
	'recipe-1' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $dream_template_directory . '/assets/images/image-picker/recipe-style1.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $dream_template_directory . '/assets/images/image-picker/recipe-style1.jpg'
			),
		),
	),
);

$recipe_single_opts = array(
	'single-recipes' => array(
		'title' => esc_html__('Single Recipes', 'dream'),
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
								'label' => esc_html__('Related Articles', 'dream'),
								'desc' => esc_html__('Show related articles?', 'dream'),
								'type' => 'switch',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__('Yes', 'dream')
								),
								'left-choice' => array(
									'value' => 'no',
									'label' => esc_html__('No', 'dream')
								),
								'value' => 'yes',
							),
						),
						'choices' => array(
							'yes' => array(
								'related_type' => array(
									'label' => false, // esc_html__('', 'dream'),
									'type' => 'image-picker',
									'value' => 'related-articles-1',
									'desc' => esc_html__('Select the related articles type', 'dream'),
									'choices' => array(
										'related-articles-1' => array(
											'small' => array(
												'height' => 70,
												'src' => $dream_template_directory . '/assets/images/image-picker/related-articles-type-1.jpg',
											),
											'large' => array(
												'height' => 214,
												'src' => $dream_template_directory . '/assets/images/image-picker/related-articles-type-1.jpg',
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
    'title' => esc_html__('Recipes', 'dream'),
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
						'title' => esc_html__('Recipes', 'dream'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
              'recipe_type' => array(
                'type' => 'image-picker',
                'label' => esc_html__('Recipe Style', 'dream'),
                'desc' => esc_html__('Select the recipes display style', 'dream'),
                'value' => 'recipe-1',
                'choices' => dream_load_decentralize_setting( $dream_recipes_layout, 'parent' ),
              ),
							'number_post_in_row' => array(
                'type' => 'short-text',
                'label' => esc_html__('Number Post In Row', 'dream'),
                'desc' => esc_html__('Please enter number post in row (default: 2 posts in a row)', 'dream'),
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
