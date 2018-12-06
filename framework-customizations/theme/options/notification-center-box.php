<?php

$dream_admin_url = admin_url();
$dream_template_directory = get_template_directory_uri();

/* Cart */
/* Cart */
$notification_cart_settings = array(
  'title' => esc_html__('Notification Cart Settings', 'dream'),
  'type' => 'box',
  'attr' => array('class' => 'customizer-contaner-wrap-options'),
  'options' => array(

  )
);
/* WooCommerce */
if(class_exists('WooCommerce')) :
  $notification_cart_settings = array(
    'title' => esc_html__('Notification Cart Settings', 'dream'),
    'type' => 'box',
    'attr' => array('class' => 'customizer-contaner-wrap-options'),
    'options' => array(
      'notification_cart' => array(
        'type' => 'multi',
        'label' => false,
        'attr' => array(
          'class' => 'fw-option-type-multi-show-borders',
        ),
        'inner-options' => array(
          'display' => array(
            'type'  => 'switch',
            'value' => 'yes',
            // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
            'label' => __('Show/Hide', 'dream'),
            'desc'  => __('Setting show/hide cart notification (default: yes)', 'dream'),
            // 'help'  => __('Setting show/hide search notification', 'dream'),
            'left-choice' => array(
                'value' => 'yes',
                'label' => __('Yes', 'dream'),
            ),
            'right-choice' => array(
                'value' => 'no',
                'label' => __('No', 'dream'),
            ),
          ),
          'label' => array(
            'type'  => 'text',
            'value' => __('Cart', 'dream'),
            // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
            'label' => __('Label', 'dream'),
            'desc'  => __('Enter label for cart', 'dream'),
            // 'help'  => __('Help tip', 'dream'),
          )
        )
      )
    )
  );
endif;
// print_r($notification_cart_settings);

$options = array(
  'notification-center' => array(
    'title' => esc_html__('Notification Center', 'dream'),
    'type' => 'box',
    'options' => array(
      'notification_center_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
          'style' => array(
						'title' => esc_html__('Notification Style', 'dream'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'style' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'style' => array(
                    'type'  => 'switch',
                    'value' => 'dark',
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Dark/Light', 'dream'),
                    'desc'  => __('Setting style notification (default: Dark)', 'dream'),
                    // 'help'  => __('Setting show/hide search notification', 'dream'),
                    'left-choice' => array(
                        'value' => 'dark',
                        'label' => __('Dark', 'dream'),
                    ),
                    'right-choice' => array(
                        'value' => 'light',
                        'label' => __('Light', 'dream'),
                    ),
                  ),
                ),
              )
            )
          ),
          'notification-search' => array(
						'title' => esc_html__('Notification Search Settings', 'dream'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'notification_search' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'display' => array(
                    'type'  => 'switch',
                    'value' => 'yes',
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Show/Hide', 'dream'),
                    'desc'  => __('Setting show/hide search notification (default: yes)', 'dream'),
                    // 'help'  => __('Setting show/hide search notification', 'dream'),
                    'left-choice' => array(
                        'value' => 'yes',
                        'label' => __('Yes', 'dream'),
                    ),
                    'right-choice' => array(
                        'value' => 'no',
                        'label' => __('No', 'dream'),
                    ),
                  ),
                  'label' => array(
                    'type'  => 'text',
                    'value' => __('Search', 'dream'),
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Label', 'dream'),
                    'desc'  => __('Enter label for search', 'dream'),
                    // 'help'  => __('Help tip', 'dream'),
                  )
                )
              )
            )
          ),
          'notification-post' => array(
						'title' => esc_html__('Notification Recent Post Settings', 'dream'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'notification_post' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'display' => array(
                    'type'  => 'switch',
                    'value' => 'yes',
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Show/Hide', 'dream'),
                    'desc'  => __('Setting show/hide post notification (default: yes)', 'dream'),
                    // 'help'  => __('Setting show/hide search notification', 'dream'),
                    'left-choice' => array(
                        'value' => 'yes',
                        'label' => __('Yes', 'dream'),
                    ),
                    'right-choice' => array(
                        'value' => 'no',
                        'label' => __('No', 'dream'),
                    ),
                  ),
                  'label' => array(
                    'type'  => 'text',
                    'value' => __('Posts', 'dream'),
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Label', 'dream'),
                    'desc'  => __('Enter label for post', 'dream'),
                    // 'help'  => __('Help tip', 'dream'),
                  )
                )
              )
            )
          ),
          'notification-login' => array(
						'title' => esc_html__('Notification Login Settings', 'dream'),
						'type' => 'box',
            'attr' => array('class' => 'customizer-contaner-wrap-options'),
						'options' => array(
							'notification_login' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
                  'display' => array(
                    'type'  => 'switch',
                    'value' => 'yes',
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Show/Hide', 'dream'),
                    'desc'  => __('Setting show/hide login notification (default: yes)', 'dream'),
                    // 'help'  => __('Setting show/hide search notification', 'dream'),
                    'left-choice' => array(
                        'value' => 'yes',
                        'label' => __('Yes', 'dream'),
                    ),
                    'right-choice' => array(
                        'value' => 'no',
                        'label' => __('No', 'dream'),
                    ),
                  ),
                  'label' => array(
                    'type'  => 'text',
                    'value' => __('Login', 'dream'),
                    // 'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                    'label' => __('Label', 'dream'),
                    'desc'  => __('Enter label for login', 'dream'),
                    // 'help'  => __('Help tip', 'dream'),
                  )
                )
              )
            )
          ),
          'notification-cart' => $notification_cart_settings,
        )
      ),
    ),
  )
);
