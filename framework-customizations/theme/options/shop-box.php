<?php

$options = array(
  'shop-box' => array(
    'title' => esc_html__('Shop', 'dream'),
    'type' => 'box',
    'options' => array(
      'shop_settings' => array(
				'type' => 'multi',
				'label' => false,
				'attr' => array(
					'class' => 'fw-option-type-multi-show-borders',
				),
				'inner-options' => array(
          'products_in_row' => array(
            'label' => esc_html__('Product In Row', 'dream'),
            'desc' => esc_html__('Enter number products in a row', 'dream'),
            'value' => 4,
            'type' => 'short-text',
          ),
        )
      ),
    ),
  )
);
