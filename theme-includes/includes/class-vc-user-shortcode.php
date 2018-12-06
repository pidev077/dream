<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
if( class_exists( 'Vc_Manager' ) ) {
	class Vc_User_Shortcode extends WPBakeryShortCode {
		/**
		 * @param $atts
		 * @param null $content
		 *
		 * @return mixed|void
		 */
		protected function content( $atts, $content = null ) {
			$field_key = $label = '';
			/**
			 * @var string $el_class
			 * @var string $source
			 */
			extract( shortcode_atts( array(
				'el_class' => '',
				'user_role' => '',
				'number' => '',
				'user_columns'  => '4',
				'user_layout'      => 'default',
				'css' => '',
			), $atts ) );
			$args = array(
				'role' => $user_role,
				'number'  => $number,
			);
			$class_columns = '';
			switch ($user_columns) {
				case 1:
					$class_columns = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
					break;
				case 2:
					$class_columns = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
					break;
				case 3:
					$class_columns = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
					break;
				case 4:
					$class_columns = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
					break;
				default:
					$class_columns = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
					break;
			}
			$layout    = $user_layout;
			//var_dump($number);
			// The Query
			$user_query = new WP_User_Query( $args );
			//
			ob_start();
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, $el_class.' vc_row wpb_row vc_row-fluid vc_user ' ), $this->settings['base'], $atts );
			?>
			<div class="<?php echo esc_attr( $css_class ) ?>">
				<?php
				// User Loop
				if ( ! empty( $user_query->get_results() ) ) {
					foreach ( $user_query->get_results() as $user ) {
						$user_id = $user->ID;
						$profile_class = get_user_meta( $user_id, '_lp_profile_class', true );
						$profile_googleplus = get_user_meta( $user_id, '_lp_profile_googleplus', true );
						$profile_facebook = get_user_meta( $user_id, '_lp_profile_facebook', true );
						$profile_twitter = get_user_meta( $user_id, '_lp_profile_twitter', true );
						$profile_picture = get_user_meta( $user_id, '_lp_profile_picture', true );
						if($profile_picture){
							$upload    = learn_press_user_profile_picture_upload_dir();
							$file_path = $upload['basedir'] . DIRECTORY_SEPARATOR . $profile_picture;
							if ( file_exists( $file_path ) ){
								$uploaded_profile_src = $upload['baseurl'] . '/' . $profile_picture;
							}
						}else{
							$avatar_data = get_avatar_data( $user_id );
							$uploaded_profile_src = $avatar_data['url'];
						}
						$uploaded_profile_src = apply_filters( 'vc_user_item_avatar_src', $uploaded_profile_src, $user);
						$vc_user_item_class = apply_filters( 'vc_user_item_class', 'vc_user_item wpb_column vc_column_container');
						?>
						<div class="<?php echo esc_attr($vc_user_item_class) ?> <?php echo $layout;?> <?php echo esc_attr($class_columns) ?>">
							<?php do_action('vc_user_item_start'); ?>
							<div class="vc_user_item_avatar">
								<a href="<?php echo learn_press_user_profile_link( $user_id ); ?>">
									<img src="<?php echo esc_url($uploaded_profile_src) ?>" />
								</a>
							</div>
							<?php do_action('vc_user_item_before_content'); ?>
							<div class="vc_user_item_content">
								<div class="vc_user_item_name">
									<a href="<?php echo learn_press_user_profile_link( $user_id ); ?>">
										<?php echo esc_html($user->display_name); ?>
									</a>
								</div>
								<div class="vc_user_item_class">
									<?php echo esc_html($profile_class); ?>
								</div>
								<div class="vc_user_item_socials">
									<ul class="vc_user_item_socials_wrap">
										<li class="vc_user_item_social vc_user_item_social_facebook">
											<a href="<?php echo esc_url($profile_facebook); ?>">
												<i class="fa fa-facebook"></i>
											</a>
										</li>
										<li class="vc_user_item_social vc_user_item_social_googleplus">
											<a href="<?php echo esc_url($profile_googleplus); ?>">
												<i class="fa fa-google-plus"></i>
											</a>
										</li>
										<li class="vc_user_item_social vc_user_item_social_twitter">
											<a href="<?php echo esc_url($profile_twitter); ?>">
												<i class="fa fa-twitter"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
							<?php do_action('vc_user_item_after_content'); ?>
							<?php do_action('vc_user_item_end'); ?>
						</div>
						<?php
					}
				} else {
					echo 'No users found.';
				}
				?>
			</div>
			<?php
			return ob_get_clean();
		}
	}

	function dream_vc_before_init_actions() {
		global $wp_roles;
	 	$roles = $wp_roles->get_names();
		vc_map(
			array(
				'name' => __('VC User Grid', 'dream'),
				'base' => 'vc_user',
				'description' => __('A simple VC grid user', 'dream'),
				'category' => __('Theme Elements', 'dream'),
				'php_class_name' => 'Vc_User_Shortcode',
				'params' => apply_filters('vc_user_params',
					array(
						array(
							'type' => 'dropdown',
							'heading' => __( 'User Role', 'dream' ),
							'param_name' => 'user_role',
							'admin_label' => true,
							'value' => array_merge(
								array( __( 'Instructor', 'dream' ) => '' ),
								array_flip($roles)
							),
							'save_always' => true,
							'description' => __( 'Select role.', 'dream' ),
						),
						array(
          			'type' => 'textfield',
          			'heading' => __( 'Columns', 'dream' ),
          			'param_name' => 'user_columns',
          			'description' => __( '', 'dream' ),
              ),
						array(
							'type' => 'textfield',
							'heading' => __( 'Limit', 'dream' ),
							'param_name' => 'number',
							'value' => 4,
							'description' => __( 'The maximum returned number of results.', 'dream' ),
						),
						array(
		          'type'        => 'dropdown',
		          'heading'     => __( 'Layout', 'lemonspa' ),
		          'param_name'  => 'user_layout',
		          'value'       => array(
		            __( 'Default', 'lemonspa' ) => 'default',
		            __( 'Style 1', 'lemonspa' ) => 'style-1',
		          ),
		          'std'         => 'default',
		          'description' => __( 'Select layout of testimonial.', 'lemonspa' ),
		          'group'       => 'Layout',
		        ),
						array(
							'type' => 'textfield',
							'heading' => __( 'Extra class name', 'dream' ),
							'param_name' => 'el_class',
							'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'dream' ),
						),
						array(
							'type' => 'css_editor',
							'heading' => __( 'CSS box', 'js_composer' ),
							'param_name' => 'css',
							'group' => __( 'Design Options', 'js_composer' ),
						),
					)
				),
			)
		);
	}
}
