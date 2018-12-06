<?php

$dream_admin_url = admin_url();
$dream_template_directory = get_template_directory_uri();

/* Portfolio layout */
$dream_give_forms_layout = array(
	'default' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $dream_template_directory . '/assets/images/image-picker/give-forms-style-default.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $dream_template_directory . '/assets/images/image-picker/give-forms-style-default.jpg'
			),
		),
	),
	'style-2' => array(
		'parent' => array(
			'small' => array(
				'height' => 70,
				'src' => $dream_template_directory . '/assets/images/image-picker/give-forms-style-2.jpg'
			),
			'large' => array(
				'height' => 214,
				'src' => $dream_template_directory . '/assets/images/image-picker/give-forms-style-2.jpg'
			),
		),
	),
);

$options = array(
  'give-box' => array(
    'title' => esc_html__('Give', 'dream'),
    'type' => 'box',
    'options' => array(
      'give_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
          'give-archive' => array(
						'title' => esc_html__('Archive Page Settings', 'dream'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'give_archive' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'number_form_per_page' => array(
                    'type' => 'short-text',
                    'label' => esc_html__('Number Form per page', 'dream'),
                    'desc' => esc_html__('Please enter number form per page', 'dream'),
                    'value' => 9,
                  ),
                  'number_form_in_row' => array(
                    'type' => 'short-text',
                    'label' => esc_html__('Number Form In Row', 'dream'),
                    'desc' => esc_html__('Please enter number form in row (default: 3 form in a row)', 'dream'),
                    'value' => 3,
                  ),
                )
              )
            )
          ),
          'give-single' => array(
						'title' => esc_html__('Single Page Settings', 'dream'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'give_single' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'single_layout' => array(
                    'type' => 'image-picker',
                    'label' => esc_html__('Layout', 'dream'),
                    'desc' => esc_html__('Select the layout display', 'dream'),
                    'value' => 'default',
                    'choices' => dream_load_decentralize_setting( $dream_give_forms_layout, 'parent' ),
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
