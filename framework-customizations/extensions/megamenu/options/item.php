<?php if (!defined('FW')) die('Forbidden');

$menu_type_arr = array(
	'' => esc_html__('Default', 'dream'),
	'sidebar' => esc_html__('Sidebar', 'dream'),
);

// MegaMenu item options, column child, level 3+
$options = array(
	'mega_menu_type' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc' => false,
		'picker' => array(
			'selected' => array(
				'type' => 'short-select',
				'label' => esc_html__( 'Menu Type', 'dream' ),
				'desc' => esc_html__( 'Please select menu type', 'dream' ),
				'value' => '',
				'choices' => $menu_type_arr,
			),
		),
		'choices' => array(
			'sidebar' => array(
				'sidebar_id' => array(
					'type' => 'short-select',
					'label' => esc_html__( 'Sitebar', 'dream' ),
					'desc' => esc_html__( 'Please select sitebar', 'dream' ),
					'value' => '',
					'choices' => dream_get_sidebars(),
				),
			),
		),
	),
	'badge' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc' => false,
		'picker' => array(
			'selected' => array(
				'type' => 'switch',
				'value' => 'no',
				'label' => esc_html__('Badge', 'dream'),
				'left-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'dream'),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'dream'),
				)
			),
		),
		'choices' => array(
			'yes' => array(
				'badge_group' => array(
					'type' => 'group',
					'attr' => array('class' => ''),
					'options' => array(
						'badge_text' => array(
							'type' => 'short-text',
							'html' => '',
							'value' => '',
							'label' => esc_html__('Text', 'dream'),
						),
						'badge_background_color' => array(
							'value' => '#E23F3F',
							'type' => 'color-picker',
							'label' => esc_html__('Background Color', 'dream'),
						),
						'badge_color' => array(
							'value' => '#FFFFFF',
							'type' => 'color-picker',
							'label' => esc_html__('Color', 'dream'),
						),
					),
				),
			),
		),
	),
);
