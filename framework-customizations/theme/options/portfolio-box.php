<?php

$dream_admin_url = admin_url();
$dream_template_directory = get_template_directory_uri();

/* Portfolio layout */
$dream_portfolio_layout = array(
	'default' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $dream_template_directory . '/assets/images/image-picker/portfolio-style-default.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $dream_template_directory . '/assets/images/image-picker/portfolio-style-default.jpg'
			),
		),
	),
);

$options = array(
  'portfolio-box' => array(
    'title' => esc_html__('Portfolio', 'dream'),
    'type' => 'box',
    'options' => array(
      'portfolio_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
          'portfolio-listting' => array(
						'title' => esc_html__('Portfolio Listing', 'dream'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
              'portfolio_type' => array(
                'type' => 'image-picker',
                'label' => esc_html__('Portfolio Style', 'dream'),
                'desc' => esc_html__('Select the portfolio display style', 'dream'),
                'value' => 'default',
                'choices' => dream_load_decentralize_setting( $dream_portfolio_layout, 'parent' ),
              ),
              'number_portfolio_per_page' => array(
                'type' => 'short-text',
                'label' => esc_html__('Number Portfolio per page', 'dream'),
                'desc' => esc_html__('Please enter number portfolio per page', 'dream'),
                'value' => 9,
              ),
              'number_portfolio_in_row' => array(
                'type' => 'short-text',
                'label' => esc_html__('Number Portfolio In Row', 'dream'),
                'desc' => esc_html__('Please enter number portfolio in row (default: 3 portfolio in a row)', 'dream'),
                'value' => 3,
              ),
							'show_filter' => array(
								'label' => esc_html__('Filter', 'dream'),
								'desc' => esc_html__('Show filter by taxonomy?', 'dream'),
								'type' => 'switch',
								'right-choice' => array(
									'value' => 'yes',
									'label' => esc_html__('Yes', 'dream')
								),
								'left-choice' => array(
									'value' => 'no',
									'label' => esc_html__('No', 'dream')
								),
								'value' => 'no',
							),
            )
          ),
          'portfolio-single' => array(
						'title' => esc_html__('Single Portfolio', 'dream'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'portfolio_single' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'show_comment' => array(
										'label' => esc_html__('Comment', 'dream'),
										'desc' => esc_html__('Show comment?', 'dream'),
										'type' => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => esc_html__('Yes', 'dream')
										),
										'left-choice' => array(
											'value' => 'no',
											'label' => esc_html__('No', 'dream')
										),
										'value' => 'no',
									),
                )
              )
            )
          )
        )
      ),
    ),
  )
);
