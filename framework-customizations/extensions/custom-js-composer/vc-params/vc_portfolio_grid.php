<?php
/*
Element Description: VC Portfolio Grid
*/

// Element Class
class vcPortfolioGrid extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        global $__VcShadowWPBakeryVisualComposerAbstract;
        add_action( 'init', array( $this, 'vc_portfolio_grid_mapping' ) );
        $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_portfolio_grid', array( $this, 'vc_portfolio_grid_html' ));
    }

    // Element Mapping
    public function vc_portfolio_grid_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
          array(
            'name' => __('Portfolio Grid', 'dream'),
            'base' => 'vc_portfolio_grid',
            'description' => __('Portfolio grid', 'dream'),
            'category' => __('Theme Elements', 'dream'),
            'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/posts-grid-resizable.png',
            'params' => array(
              /* source */
              array(
                'type' => 'textfield',
                'heading' => __('Number of Posts to Show', 'dream'),
                'param_name' => 'number_posts_show',
                'value' => '6',
                'admin_label' => true,
                'group' => 'Source',
                'admin_label' => true,
              ),
              array(
                'type' => 'dropdown',
                'heading' => __( 'Data Type', 'dream' ),
                'param_name' => 'data_type',
                'value' => array(
                  __('Recent Posts', 'dream') => 'recent',
                  __('By ID(s)', 'dream') => 'ids',
                ),
                'std' => 'recent',
                'description' => __( 'Select a post data type', 'dream' ),
                'admin_label' => true,
                'group' => 'Source',
                'admin_label' => true,
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Post ID(s)', 'dream'),
                'param_name' => 'port_ids',
                'value' => '',
                'description' => __('Enter portfolio ID you\'d want to filter (Ex: 9,12,14)', 'dream'),
                'dependency' => array(
                  'element' => 'data_type',
                  'value' => 'ids',
                ),
                'group' => 'Source',
                // 'admin_label'   => true,
              ),
              array(
          			'type' => 'exploded_textarea_safe',
          			'heading' => __( 'Categories (slug)', 'dream' ),
          			'param_name' => 'categories',
          			'description' => __( 'Enter categories by slug to narrow output (Note: only listed categories will be displayed, divide categories with linebreak (Enter)).', 'dream' ),
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Display Filter', 'dream'),
                'param_name' => 'display_filter',
                'value' => array(
                  __('Yes', 'dream') => 'yes',
                  __('No', 'dream') => 'no',
                ),
                'std' => 'no',
                'description' => __('Select yes for display filter (masonry) by categories.', 'dream'),
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
              /* Layout Options */
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
                  'default' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/portfolio-grid-layout-default.png',
                  // 'block-image' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/posts-slider-layout-2.jpg',
                ),
                'std' => 'default',
                'description' => __('Select a layout display', 'dream'),
                'group' => 'Layout',
              ),
              /* Grid Setings */
              array(
                'type' => 'textfield',
                'heading' => __('Columns', 'dream'),
                'param_name' => 'grid_col',
                'description' => __('Enter number items in row', 'dream'),
                'value' => 3,
                'group' => 'Grid Settings',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Gap', 'dream'),
                'param_name' => 'grid_gap',
                'description' => __('Enter number space for each item', 'dream'),
                'value' => 30,
                'group' => 'Grid Settings',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Columns In Table (Responsive)', 'dream'),
                'param_name' => 'col_in_table',
                'description' => __('Enter number items in row on table', 'dream'),
                'value' => 2,
                'group' => 'Grid Settings',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Columns In Mobi (Responsive)', 'dream'),
                'param_name' => 'col_in_mobi',
                'description' => __('Enter number items in row on mobi', 'dream'),
                'value' => 1,
                'group' => 'Grid Settings',
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
  		$css_class = apply_filters( 'vc_portfolio_grid_filter_class', 'wpb_theme_custom_element wpb_portfolio_grid ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

  		return array(
  			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
  			'styles' => $styles,
  		);
    }

    public function taxonomy_class_per_post($postID) {
      $args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all');
      $result = wp_get_post_terms( $postID, 'fw-portfolio-category', $args );

      $output = array();
      if(is_array($result) && count($result) > 0) :
        foreach($result as $item) :
          $output[] = $item->slug;
        endforeach;

        return implode(' ', $output);
      endif;
    }

    public function filter_nav_render($atts = array()) {
      $categories = fw_akg('categories', $atts);
      if(empty($categories)) return;

      $slug_array = explode(',', $categories);
      $nav_item = array();
      // $option_item = array();
      foreach($slug_array as $slug) :
        $term = get_term_by('slug', $slug, 'fw-portfolio-category');
        /* item for nav */
        $nav_item[] = '<a href="#" class="portfolio-filter-item" data-filter=".'. $term->slug .'">'. $term->name .'</a>';
      endforeach;

      $filter_nav_html = array('<nav class="filter-nav">');
      $filter_nav_html[] = '<a href="#" data-filter="*" class="portfolio-filter-item is-active">'. esc_html__('All', 'dream') .'</a>';
      $filter_nav_html[] = implode('', $nav_item);
      $filter_nav_html[] = '</nav>';

      return implode('', $filter_nav_html);
    }

    public function get_data($atts = array()) {
      $args = array(
        'post_type'      => 'fw-portfolio',
				'orderby'        => 'post_date',
				'order '         => 'DESC',
				'posts_per_page' => fw_akg('number_posts_show', $atts),
				'offset'				 => 0,
      );

      $categories = fw_akg('categories', $atts);
      if(! empty($categories)) :
        $args['tax_query'] = array(
          array(
            'taxonomy' => 'fw-portfolio-category',
            'field' => 'slug',
            'terms' => explode(',', fw_akg('categories', $atts)),
          )
        );
      endif;

      switch (fw_akg('data_type', $atts)) {
        case 'recent':
          $args['orderby'] = 'post_date';
          $args['order'] = 'DESC';
          break;

        case 'ids':
          $args['post_by_id'] = explode(',', fw_akg('port_ids', $atts));
          break;
      }

      return $query = new WP_Query($args);
    }

    public function build_variables($post_id, $atts) {

      $variables = array(
        '{post_id}' => $post_id,
        '{post_title}' => get_the_title($post_id),
        '{post_link}' => get_permalink($post_id),
        '{post_featured_image}' => get_template_directory_uri() . '/assets/images/image-default-2.jpg',
        '{term_list_html}' => get_the_term_list( $post_id, 'fw-portfolio-category', '', ', ' )
      );

      /* check featured image exist */
      if ( has_post_thumbnail($post_id) ) {
        $variables['{post_featured_image}'] = get_the_post_thumbnail_url($post_id, fw_akg('image_size', $atts));
      }

      return $variables;
    }

    public function _template($temp = '', $postID, $atts) {
      if(empty($temp)) return;

      $templates = array();
      $variables = $this->build_variables($postID, $atts);

      /* default */
      $templates['default'] = implode('', array(
        '<div class="portfolio-thumbnail" style="background: #333;">',
          '<img src="{post_featured_image}" alt="#">',
        '</div>',
        '<div class="entry-content">',
          (! empty($variables['{term_list_html}'])) ? '<div class="cat-meta">{term_list_html}</div>' : '',
          '<a href="{post_link}" class="title-link">',
            '<h2 class="title">{post_title}</h2>',
          '</a>',
        '</div>',
        '<a href="{post_link}" class="readmore" title="{post_title}"><span class="ion-ios-plus-empty"></span></a>',
      ));

      return str_replace(array_keys($variables), array_values($variables), $templates[$temp]);
    }

    // Element HTML
    public function vc_portfolio_grid_html( $atts, $content ) {
      if (function_exists('fw_ext') && fw_ext('portfolio')) {
        $atts['self'] = $this;
        $atts['content'] = $content;
        return fw_render_view(get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_portfolio_grid.php', array('atts' => $atts), true);
      }
    }

} // End Element Class


// Element Class Init
new vcPortfolioGrid();
