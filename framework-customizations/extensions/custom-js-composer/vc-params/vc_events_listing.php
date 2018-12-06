<?php
/*
Element Description: VC Events Listing
*/

// Element Class
class vcEventsListing extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        global $__VcShadowWPBakeryVisualComposerAbstract;
        add_action( 'init', array( $this, 'vc_events_listing_mapping' ) );
        $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_events_listing', array( $this, 'vc_events_listing_html' ));
    }

    // Element Mapping
    public function vc_events_listing_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
          array(
            'name' => __('Events Listing', 'dream'),
            'base' => 'vc_events_listing',
            'description' => __('Events Listing', 'dream'),
            'category' => __('Events', 'dream'),
            'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/event-listing.png',
            'params' => array(
              /* source */
              array(
          			'type' => 'textfield',
          			'heading' => __( 'Total Items', 'dream' ),
          			'param_name' => 'post_total_items',
          			'description' => __( 'Set max limit for items in event or enter -1 to display all (limited to 1000).', 'dream' ),
                'value' => 3,
                'group' => 'Source',
                'admin_label'   => true,
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Events Type', 'dream'),
                'param_name' => 'type',
                'value' => array(
                  __('Recent', 'dream') => 'recent',
                  // __('By Taxonomy ID', 'dream') => 'taxonomy_id',
                  __('By ID', 'dream') => 'event_id',
                ),
                'std' => 'recent',
                'description' => __( 'Select event type query.', 'dream' ),
                'group' => 'Source',
                'admin_label' => true,
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Offset', 'dream'),
                'param_name' => 'offset',
                'value' => 0,
                'dependency' => array(
          				'element' => 'type',
          				'value' => 'recent',
          			),
                'description' => __( 'Enter offset number.', 'dream' ),
                'group' => 'Source',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Taxonomy IDs', 'dream'),
                'param_name' => 'taxonomy_ids',
                'value' => '',
                /*
                'dependency' => array(
          				'element' => 'type',
          				'value' => 'taxonomy_id',
          			),
                */
                'description' => __( 'Enter taxonomy id (Ex: 1,2,3).', 'dream' ),
                'group' => 'Source',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Event IDs', 'dream'),
                'param_name' => 'event_ids',
                'value' => '',
                'dependency' => array(
          				'element' => 'type',
          				'value' => 'event_id',
          			),
                'description' => __( 'Enter event id (Ex: 1,2,3).', 'dream' ),
                'group' => 'Source',
              ),
              array(
          			'type' => 'el_id',
          			'heading' => __( 'Element ID', 'dream' ),
          			'param_name' => 'el_id',
          			'description' => __( 'Enter element ID .', 'dream' ),
                'group' => 'Source',
              ),
          		array(
          			'type' => 'textfield',
          			'heading' => __( 'Extra class name', 'dream' ),
          			'param_name' => 'el_class',
          			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'dream' ),
                'group' => 'Source',
              ),
              /*** Layout Options ***/
              array(
                'type' => 'dropdown',
                'heading' => __('Image Size', 'dream'),
                'param_name' => 'image_size',
                'value' => array(
                  array('value' => 'thumbnail', 'label' => esc_html__('Thumbnail', 'dream')),
                  array('value' => 'medium', 'label' => esc_html__('Medium', 'dream')),
                  array('value' => 'medium_large', 'label' => esc_html__('Medium Large', 'dream')),
                  array('value' => 'large', 'label' => esc_html__('Large', 'dream')),
                  array('value' => 'dream-image-large', 'label' => esc_html__('Large (1228 x 691)', 'dream')),
                  array('value' => 'dream-image-medium', 'label' => esc_html__('Medium (614 x 346)', 'dream')),
                  array('value' => 'dream-image-small', 'label' => esc_html__('Small (295 x 166)', 'dream')),
                  array('value' => 'dream-image-square-800', 'label' => esc_html__('Square (800 x 800)', 'dream')),
                  array('value' => 'dream-image-square-300', 'label' => esc_html__('Square (300 x 300)', 'dream')),
                ),
                'std' => 'dream-image-medium',
                'description' => __('Select a image size', 'dream'),
                'group' => 'Layout',
              ),
              array(
                'type' => 'vc_image_picker',
                'heading' => __( 'Select Layout', 'dream' ),
                'param_name' => 'layout',
                'value' => array(
                  'default' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/event-listing-default.jpg',
                  'simplify' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/event-listing-simplify.jpg',
                  'style1' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/event-listing-simplify.jpg',
                ),
                'std' => 'default',
                'description' => __('Select a layout display', 'dream'),
                'group' => 'Layout',
              ),
              /* css editor */
              array(
                'type' => 'css_editor',
                'heading' => __( 'Css', 'dream' ),
                'param_name' => 'css',
                'group' => __( 'Design Options general', 'dream' ),
              ),
            ),
          )
        );
    }

    /**
  	 * Parses google_fonts_data and font_container_data to get needed css styles to markup
  	 *
  	 * @param $el_class
  	 * @param $css
  	 * @param $atts
  	 *
  	 * @since 1.0
  	 * @return array
  	 */
    public function getStyles($el_class, $css, $atts) {
      $styles = array();

      /**
  		 * Filter 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG' to change vc_custom_heading class
  		 *
  		 * @param string - filter_name
  		 * @param string - element_class
  		 * @param string - shortcode_name
  		 * @param array - shortcode_attributes
  		 *
  		 * @since 4.3
  		 */
  		$css_class = apply_filters( 'vc_events_listing_filter_class', 'wpb_theme_custom_element wpb_events_listing ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

  		return array(
  			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
  			'styles' => $styles,
  		);
    }

    public function event_get_posts($atts = array()) {
      extract($atts);

      $args = array(
        'post_type' => 'tp_event',
        'items' => $post_total_items,
        'image_class' => 'event-featured-image',
        'date_format' => 'l, j, M',
        'image_size' => $image_size,
        'cat' => $taxonomy_ids,
        'image_width' => '100%',
        'image_height' => 'auto',
        'image_post' => false,
      );
      //var_dump($args);
      switch ($type) {
        case 'recent':
          $args['sort'] = 'recent';
          $args['offset'] = $offset;
          break;

        case 'event_id':
          $args['sort'] = 'by_id';
          $args['post_by_id'] = explode(',', $event_ids);
          # code...
          break;
      }

      return  dream_get_posts($args);
    }

    public function variables($event_id, $item_data) {
      //$event_options = fw_get_db_post_option($event_id);
      //$venue =  fw_akg('general-event/event_location/venue', $event_options);
      //$limit_space = fw_akg('total_space', $event_options);
      //$date_format = get_option('date_format', 'F j, Y');
			//$time_format = get_option('time_format', 'F j, Y');
      //$options       = fw_get_db_post_option( $event_id, fw()->extensions->get( 'events' )->get_event_option_id() );
      //$event_start_date = date( $date_format , strtotime($options['event_children']['0']['event_date_range']['from']));
      //$event_start_time = date( $time_format , strtotime($options['event_children']['0']['event_date_range']['from']));
      //$event_end_time = date( $time_format , strtotime($options['event_children']['0']['event_date_range']['to']));
      //$ex_event_start_date = explode(" ", $event_start_date);
      //$event_location_address = $options['event_location']['address'];
      //$event_location_country = $options['event_location']['country'];

      $display_year = get_theme_mod( 'dream_event_display_year', false );
      $class        = 'item-event';
      $time_format  = get_option( 'time_format' );
      $time_start   = get_post_meta( $event_id, 'tp_event_time_start', true ) ? get_post_meta( $event_id, 'tp_event_time_start', true ) : '';
      $time_end     = get_post_meta( $event_id, 'tp_event_time_end', true ) ? get_post_meta( $event_id, 'tp_event_time_end', true ) : '';

      $location   = get_post_meta( $event_id, 'tp_event_location', true ) ? get_post_meta( $event_id, 'tp_event_location', true ) : '';
      $date   = get_post_meta( $event_id, 'tp_event_date_start', true ) ? get_post_meta( $event_id, 'tp_event_date_start', true ) : '';

      $date_show  = date('d', strtotime($date));
      $month_show = date('F', strtotime($date));
      if ( $display_year ) {
      	$month_show .= ', ' . date('Y', strtotime($date));
      }
      //echo '<pre>'; print_r(get_post_meta( $event_id)); echo '</pre>';
      //var_dump($new_date);
      $variables = array(
        '{ID}'                => $event_id,
        '{post_title}'        => fw_akg('post_title', $item_data),
        '{post_link}'         => fw_akg('post_link', $item_data),
        '{post_author_link}'  => fw_akg('post_author_link', $item_data),
        '{post_author_name}'  => fw_akg('post_author_name', $item_data),
        '{post_excerpt}'      => fw_akg('post_excerpt', $item_data),
        //'{term_list}'         => get_the_term_list($event_id, 'fw-event-taxonomy-name', '<div class="event-term-list">', ',', '</div>'),
        '{post_featured_image}' => get_template_directory_uri() . '/assets/images/image-default-2.jpg',
        '{event_start_date}' => $date_show,
        '{event_start_month}' => $month_show,
        '{event_start_time}' => $time_start,
        '{event_end_time}'   => $time_end,
        '{event_location}'   => $location,
      );

      return $variables;
    }

    public function _template($temp = 'default', $item = array(), $atts = array()) {
      $output = '';
      $event_id = fw_akg('post_id', $item);
      $variables = $this->variables($event_id, $item);

      /* check featured image exist */
      if ( has_post_thumbnail($event_id) ) {
        $variables['{post_featured_image}'] = get_the_post_thumbnail_url($event_id, fw_akg('image_size', $atts));
      }

      $variables['{layout}'] = $atts['layout'];

      switch ($temp) {
        case 'default':
          $output = implode('', array(
            '<div class="item-inner layout-{layout}">',
              '<div class="event-featured-image-wrap">',
                '<div class="event-thumbnail"><img src="{post_featured_image}" alt="{post_title}"></div>',
                '<a class="readmore-link" href="{post_link}" title="'. __('View detail', 'dream') .'"><span class="ion-ios-arrow-right"></span></a>',
              '</div>',
              '<div class="content-entry">',
                '<div class="break-line"></div>',
                '<a href="{post_link}" class="title-link" title="{post_title}"><div class="title">{post_title}</div></a>',
                '<div class="event-start-time"><span class="ion-ios-location"></span> {event_location}, <span class="ion-ios-timer"></span> {event_start_time}</div>',
              '</div>',
            '</div>',
          ));
          break;
        case 'simplify':
          $output = implode('', array(
            '<div class="item-inner layout-{layout}">',
              '<div class="bg-event-list"></div>',
              '<div class="event-featured-image-wrap">',
                '<div class="event-thumbnail" style="background: url({post_featured_image}) no-repeat center center / cover, #fafafa;"><div class="bt-overlay"></div></div>',
              '</div>',
              '<div class="edu-event-date">',
                '<div class="edu-event-day"><span>{event_start_date}</span>{event_start_month}</div>',
                '<div class="edu-event-time">{event_start_time} - {event_end_time}</div>',
              '</div>',
              '<div class="content-entry">',
                '<a href="{post_link}" class="title-link" title="{post_title}"><div class="title">{post_title}</div></a>',
                '<div class="venue-empty">{event_location}</div>',
              '</div>',
              '<a href="{post_link}" class="readmore-link">'. __('View Details', 'dream') .'</a>',
            '</div>',
          ));
          break;
          case 'style1':
            $output = implode('', array(
              '<div class="item-inner layout-{layout}">',
                '<div class="edu-event-date">',
                  '<div class="edu-event-day"><span>{event_start_date}</span>{event_start_month}</div>',
                '</div>',
                '<div class="content-entry">',
                  '<div class="edu-event-time"><i class="fa fa-clock-o" aria-hidden="true"> </i> {event_start_time} - {event_end_time} <span> By {post_author_name}</span></div>',
                  '<a href="{post_link}" class="title-link" title="{post_title}"><div class="title">{post_title}</div></a>',
                  '<div class="venue-empty"><i class="fa fa-map-marker" aria-hidden="true"> </i> {event_location}</div>',
                '</div>',
              '</div>',
            ));
            break;
      }

      return str_replace(array_keys($variables), array_values($variables), $output);
    }

    // Element HTML
    public function vc_events_listing_html( $atts, $content ) {
      $atts['self'] = $this;
      $atts['content'] = $content;
      return fw_render_view(get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_events_listing.php', array('atts' => $atts), true);
    }

} // End Element Class


// Element Class Init
new vcEventsListing();
