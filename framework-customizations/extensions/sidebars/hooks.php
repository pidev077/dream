<?php

if(! function_exists('_dream_filter_fw_ext_sidebars_add_conditional_tag')) :
  function _dream_filter_fw_ext_sidebars_add_conditional_tag($data) {

    /* check WooCommerce exist */
    if ( class_exists( 'WooCommerce' ) ) {
      $data['is_custom_shop_slug'] = array(
          'order_option' => 2,
          'check_priority' => 'first',
          'name' => esc_html__('Shop page', 'dream'),
          'conditional_tag' => array(
            'callback' => 'is_shop',
          )
      );
    }

    return $data;
  }
endif;
add_filter('fw_ext_sidebars_conditional_tags', '_dream_filter_fw_ext_sidebars_add_conditional_tag' );
