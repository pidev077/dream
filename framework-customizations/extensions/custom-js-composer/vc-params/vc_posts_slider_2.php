<?php
/*
Element Description: VC Post Slider 2
*/

// Element Class
class vcPostsSlider2 extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        global $__VcShadowWPBakeryVisualComposerAbstract;
        add_action( 'init', array( $this, 'vc_posts_slider2_mapping' ) );
        $__VcShadowWPBakeryVisualComposerAbstract->addShortCode('vc_posts_slider2', array( $this, 'vc_posts_slider2_html' ));
    }

    // Element Mapping
    public function vc_posts_slider2_mapping() {

        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
          array(
            'name' => __('Posts Slider 2', 'dream'),
            'base' => 'vc_posts_slider2',
            'description' => __('Posts slider custom layout', 'dream'),
            'category' => __('Theme Elements', 'dream'),
            'icon' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/posts-slider-2.png',
            'params' => array(
              array(
                'type' => 'textfield',
                'heading' => __('Number of Posts to Show', 'dream'),
                'param_name' => 'number_posts_show',
                'value' => '5',
                'admin_label' => true,
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __( 'Data Type', 'dream' ),
                'param_name' => 'data_type',
                'value' => array(
                  __('Recent Posts', 'dream') => 'recent',
                  __('Popular Posts', 'dream') => 'popular',
                  __('Most Commented Posts', 'dream') => 'commented',
                ),
                'std' => 'recent',
                'description' => __( 'Select a post data type', 'dream' ),
                'admin_label' => true,
                'group' => 'Source',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __( 'Select Days', 'dream' ),
                'param_name' => 'days',
                'value' => array(
                  __('All time', 'dream') => '',
                  __('1 Week', 'dream') => '7',
                  __('1 Month', 'dream') => '30',
                  __('6 Month', 'dream') => '180',
                  __('1 Year', 'dream') => '360',
                ),
                'std' => '',
                'admin_label' => false,
                'description' => __('Select a limit day for query or show all time', 'dream'),
                'group' => 'Source',
              ),
              array(
          			'type' => 'exploded_textarea_safe',
          			'heading' => __( 'Categories (ID)', 'dream' ),
          			'param_name' => 'categories',
          			'description' => __( 'Enter categories by ID to narrow output (Note: only listed categories will be displayed, divide categories with linebreak (Enter)).', 'dream' ),
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
                  'default' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/posts-slider-layout-1.jpg',
                  'block-image' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/posts-slider-layout-2.jpg',
                  'style-1' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/posts-slider-layout-2.jpg',
                  'style-2' => get_template_directory_uri() . '/framework-customizations/extensions/custom-js-composer/images/layouts/posts-slider-layout-2.jpg',
                ),
                'std' => 'default',
                'description' => __('Select a layout display', 'dream'),
                'group' => 'Layout',
              ),
              /*** Slider Options ***/
              array(
                'type' => 'textfield',
                'heading' => __('Items', 'dream'),
                'param_name' => 'items',
                'value' => '1',
                'admin_label' => false,
                'description' => __('The number of items you want to see on the screen.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Margin', 'dream'),
                'param_name' => 'margin',
                'value' => '0',
                'admin_label' => false,
                'description' => __('margin-right(px) on item.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Loop', 'dream'),
                'param_name' => 'loop',
                'value' => array(
                  __('Yes', 'dream') => '1',
                  __('No', 'dream') => '0',
                ),
                'std' => '0',
                'description' => __('Infinity loop. Duplicate last and first items to get loop illusion.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Center', 'dream'),
                'param_name' => 'center',
                'value' => array(
                  __('Yes', 'dream') => '1',
                  __('No', 'dream') => '0',
                ),
                'std' => '0',
                'description' => __('Center item. Works well with even an odd number of items.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('stagePadding', 'dream'),
                'param_name' => __('stage_padding', 'dream'),
                'value' => '0',
                'description' => __('Padding left and right on stage (can see neighbours).', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('startPosition', 'dream'),
                'param_name' => __('start_position', 'dream'),
                'value' => '0',
                'description' => __('Start position or URL Hash string like `#id`.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Nav', 'dream'),
                'param_name' => 'nav',
                'value' => array(
                  __('Yes', 'dream') => '1',
                  __('No', 'dream') => '0',
                ),
                'std' => '0',
                'description' => __('Show next/prev buttons.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Dots', 'dream'),
                'param_name' => 'dots',
                'value' => array(
                  __('Yes', 'dream') => '1',
                  __('No', 'dream') => '0',
                ),
                'std' => '0',
                'description' => __('Show dots navigation.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('slideBy', 'dream'),
                'param_name' => __('slide_by', 'dream'),
                'value' => 1,
                'description' => __('Navigation slide by x. `page` string can be set to slide by page.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('Autoplay', 'dream'),
                'param_name' => 'autoplay',
                'value' => array(
                  __('Yes', 'dream') => '1',
                  __('No', 'dream') => '0',
                ),
                'std' => '0',
                'description' => __('Autoplay.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'dropdown',
                'heading' => __('autoplayHoverPause', 'dream'),
                'param_name' => 'autoplay_hover_pause',
                'value' => array(
                  __('Yes', 'dream') => '1',
                  __('No', 'dream') => '0',
                ),
                'std' => '0',
                'description' => __('Pause on mouse hover.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('autoplayTimeout', 'dream'),
                'param_name' => 'autoplay_timeout',
                'value' => '5000',
                'description' => __('Autoplay interval timeout.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('smartSpeed', 'dream'),
                'param_name' => 'smart_speed',
                'value' => '250',
                'description' => __('AutoplaySpeed Calculate. More info to come..', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Table Items', 'dream'),
                'param_name' => 'responsive_table_items',
                'value' => '1',
                'admin_label' => false,
                'description' => __('The number of items you want to see on the table screen.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'textfield',
                'heading' => __('Mobile Items', 'dream'),
                'param_name' => 'responsive_mobile_items',
                'value' => '1',
                'admin_label' => false,
                'description' => __('The number of items you want to see on the mobile screen.', 'dream'),
                'group' => 'Slider Options',
              ),
              array(
                'type' => 'css_editor',
                'heading' => __( 'Css', 'dream' ),
                'param_name' => 'css',
                'group' => __( 'Design options', 'dream' ),
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
  		$css_class = apply_filters( 'vc_posts_slider_2_filter_class', 'wpb_theme_custom_element wpb_posts_slider_2 ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

  		return array(
  			'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
  			'styles' => $styles,
  		);
    }

    public function _template($temp = 'default', $params = array()) {
      /**
       * template variables
       * {image_html}, {readmore_html}, {post_link}, {post_excerpt}, {author_link}, {author_name}, {comment_count}
       */

    $thumbnail_default = get_template_directory_uri() . '/assets/images/image-default-2.jpg';
	  $image_background = get_the_post_thumbnail_url( $params['{pid}'] , 'large' );
	  global $post;

	  $author_id=$post->post_author;
	  $author_bt = esc_url( get_avatar_url( $author_id , 32 ) );
    $edu_post_id = $params['{pid}'];
    //var_dump($params['{pid}']);
      $params = array_merge(array(
        '{image_html}'    => '<img src="'. $thumbnail_default .'" class="thumbnail-default" alt="#">',
        '{image_author}'    => '<img src="'. $author_bt .'">',
        '{readmore_html}' => '',
        '{post_title}'    => '',
        '{post_link}'     => '',
        '{post_excerpt}'  => '',
        '{description}' => get_the_excerpt($edu_post_id),
		    '{date}' => get_the_date( '\<\s\p\a\n\>d\<\/\s\p\a\n\> M\<\/\b\r\> Y' ),
		    '{date_final}' => get_the_date( 'd M, Y',$edu_post_id ),
        '{author_link}'   => '',
        '{author_name}'   => '',
        '{comment_count}' => 0,
		    '{thumbnail_default_bg}' => ! empty( $image_background ) ? $image_background : '',
      ), $params);
      $output = '';
      $template = array();

      /* layout default */
      $template['default'] = implode('', array(
        '<div class="item-inner posts_slider_2_template_default">',
          '<div class="post-thumbnail">{image_html}</div>',
          '<div class="post-caption">',
            '<div class="post-date">{date_final}</div>',
            '<a class="post-title-link" href="{post_link}"><h2 class="post-title" title="{post_title}">{post_title}</h2></a>',
            '<div class="post-excerpt">{description}</div>',
            '<div class="post-author"><span class="edu-meta-top">Posted By: </span><span class="edu-meta-bot">{author_name}</span></div>',
          '</div>',
        '</div>',
      ));

      /* layout blog-image */
      $template['block-image'] = implode('', array(
        '<div class="item-inner posts_slider_2_template_blog_image">',
          '<div class="post-thumbnail">{image_html} <a class="icon-readmore-post-link" title="{post_title}" href="{post_link}"><i class="ion-ios-arrow-right"></i></a></div>',
          '<div class="post-caption">',
            (! empty($params['{term_list_html}'])) ? '<div class="post-term-list">{term_list_html}</div>' : '',
            '<a class="post-title-link" href="{post_link}"><h2 class="post-title" title="{post_title}">{post_title}</h2></a>',
          '</div>',
        '</div>',
      ));

      /* layout style-1 */
      $template['style-1'] = implode('', array(
        '<div class="item-inner posts_slider_2_template_style_1">',
          '<div class="post-thumbnail">{image_html}</div>',
          '<div class="post-caption">',
            '<div class="post-author"><span class="edu-author">{author_name}</span> - <span class="edu-comment"> {comment_count} Comments</span></div>',
            '<a class="post-title-link" href="{post_link}"><h2 class="post-title" title="{post_title}">{post_title}</h2></a>',
            '<div class="post-excerpt">{description}</div>',
            '<div class="post-date">{date_final}</div>',
          '</div>',
        '</div>',
      ));

      /* layout style-2 */
      $template['style-2'] = implode('', array(
        '<div class="item-inner posts_slider_2_template_style_2">',
          '<div class="post-thumbnail">{image_html}</div>',
          '<div class="post-caption">',
            (! empty($params['{term_list_html}'])) ? '<div class="post-term-list">{term_list_html}</div>' : '',
            '<a class="post-title-link" href="{post_link}"><h2 class="post-title" title="{post_title}">{post_title}</h2></a>',
            '<div class="post-author"><span class="edu-author"><i class="fa fa-user" aria-hidden="true"></i> {author_name}</span>  <span class="edu-comment"><i class="fa fa-commenting" aria-hidden="true"></i> {comment_count}</span> <span class="edu-date"> {date_final}</span></div>',
            '<div class="post-excerpt">{description}</div>',
            '<a class="post-more-link" href="{post_link}">Learn More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>',
          '</div>',
        '</div>',
      ));

      $template = apply_filters('vc_post_slider_2:template', $template);

      return str_replace(array_keys($params), array_values($params), fw_akg($temp, $template));
    }

    // Element HTML
    public function vc_posts_slider2_html( $atts ) {
      $atts['self'] = $this;
      return fw_render_view(get_template_directory() . '/framework-customizations/extensions/custom-js-composer/vc-elements/vc_posts_slider_2.php', array('atts' => $atts), true);
    }

} // End Element Class


// Element Class Init
new vcPostsSlider2();
