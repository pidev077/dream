<?php
/**
 * dream_load_custom_elements
 *
 */
if(! function_exists('dream_vc_load_custom_elements')) :
  function dream_vc_load_custom_elements() {
    $path = get_template_directory() . '/framework-customizations/extensions/custom-js-composer/';
    $new_elements = array(
      'vc_posts_slider_2',
      'vc_base_carousel',
      'vc_featured_box',
      'vc_pricing_table',
      'vc_progressbar_svg',
      'vc_posts_grid_resizable',
      'vc_liquid_button',
      'vc_counter_up',
	    'vc_logo_carousel',
      'client_review',
      'vc_countdown',
    );

    /* portfolio */
    if (function_exists('fw_ext') && fw_ext('portfolio')) {
      $new_elements[] = 'vc_portfolio_grid';
    }

    /* event */
    if ( is_plugin_active( 'wp-events-manager/wp-events-manager.php' ) ) {
      $new_elements[] = 'vc_events_listing';
    }

    foreach($new_elements as $item) :
      $dir = $path . 'vc-params/' . $item . '.php';
      if(file_exists($dir)) require $dir;
    endforeach;
  }
endif;

if(! function_exists('dream_vc_load_templates')) :
  /**
   * dream_vc_load_templates
   * @since 0.0.7
   */
  function dream_vc_load_templates($folder = 'default_templates') {
    $templates = array();

    //Load default tempaltes
    foreach (glob($folder) as $filename)
    {
      $template_params = dream_vc_get_template_data($filename);
      $filename_clean = basename($filename, '.php');

      $data = array();
      $data['name']         = $template_params['template_name'];
      $data['weight']       = 0;
      $data['custom_class'] = 'vc-default-temp-' . $filename_clean;
      $data['content']      = file_get_contents($filename);
      $templates[] = $data;
    }

    return $templates;
  }
endif;

if(! function_exists('dream_vc_get_template_data')) :
  /**
   * vctl_get_template_data
   * @since 0.0.7
   */
  function dream_vc_get_template_data($file) {
    $default_headers = array(
      'template_name' => 'Template Name',
      'preview_image' => 'Preview Image',
      'descriptions'  => 'Descriptions',
    );

    return get_file_data($file, $default_headers);
  }
endif;
