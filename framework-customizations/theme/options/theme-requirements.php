<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$dream_server_requirements = fw()->theme->manifest->get('server_requirements');

// wp version
global $wp_version;
$dream_wp_required_version = fw()->theme->manifest->get('requirements/wordpress/min_version');
if( version_compare($wp_version, $dream_wp_required_version , '<=') ){
	$dream_wp_version_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.$wp_version.'</strong>';
	$dream_wp_version_description_text = '<span class="fw-error-message">' .esc_html__( "The version of WordPress installed on your site.", "dream" ). ' '. esc_html__( 'We recommend you update WordPress to the latest version. The minimum required version for this theme is:', 'dream' ) .' <strong>'.$dream_wp_required_version. '</strong>. <a target="_blank" href="'.esc_url( admin_url('update-core.php') ).'">'.esc_html__('Do that right now', 'dream').'</a></span>';
}
else{
	$dream_wp_version_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.$wp_version.'</strong>';
	$dream_wp_version_description_text = esc_html__( "The version of WordPress installed on your site", "dream" );
}

// wp multisite
if ( is_multisite() ){
	$dream_multisite_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('Yes', 'dream').'</strong>';
}
else{
	$dream_multisite_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('No', 'dream').'</strong>';
}

// wp debug mode
if ( defined('WP_DEBUG') && WP_DEBUG ){
	$dream_wp_debug_mode_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.esc_html__('Yes', 'dream').'</strong>';
	$dream_wp_debug_mode_description_text = '<span class="fw-error-message">' .esc_html__( 'Displays whether or not WordPress is in Debug Mode. This mode is used by developers to test the theme. We recommend you turn it off for an optimal user experience on your website.', 'dream' ).' <a href="https://codex.wordpress.org/WP_DEBUG" target="_blank">'.esc_html__('Learn how to do it', 'dream').'</a></span>';
}
else{
	$dream_wp_debug_mode_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('No', 'dream').'</strong>';
	$dream_wp_debug_mode_description_text = esc_html__( 'Displays whether or not WordPress is in Debug Mode', 'dream' );
}

// wp memory limit
$dream_memory = dream_return_memory_size( WP_MEMORY_LIMIT );
$dream_requirements_wp_memory_limit = dream_return_memory_size($dream_server_requirements['server']['wp_memory_limit']);
if ( $dream_memory < $dream_requirements_wp_memory_limit ) {
	$dream_wp_memory_limit_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.size_format( $dream_memory ).'</strong>';
	$dream_wp_memory_limit_description_text = '<span class="fw-error-message">' . esc_html__('The maximum amount of memory (RAM) that your site can use at one time.', 'dream') . ' '.__( 'We recommend setting memory to at least <strong>256MB</strong>. Please define memory limit in <strong>wp-config.php</strong> file.', 'dream').' <a href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">'.esc_html__('Learn how to do it', 'dream' ).'</a></span>';
} else {
	$dream_wp_memory_limit_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.size_format( $dream_memory ).'</strong>';
	$dream_wp_memory_limit_description_text = esc_html__('The maximum amount of memory (RAM) that your site can use at one time', 'dream');
}

// php version
if ( function_exists( 'phpversion' ) ) {
	if( version_compare(phpversion(), $dream_server_requirements['server']['php_version'], '<=') ){
		$dream_php_version_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.esc_html( phpversion() ).'</strong>';
		$dream_php_version_description_text = '<span class="fw-error-message">' .esc_html__( 'The version of PHP installed on your hosting server.', 'dream' ).' '.esc_html__( 'We recommend you update PHP to the latest version. The minimum required version for this theme is:', 'dream' ) .' <strong>'.$dream_server_requirements['server']['php_version']. '</strong>. '.__('Contact your hosting provider, they can install it for you.', 'dream').'</span>';
	}
	else{
		$dream_php_version_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html( phpversion() ).'</strong>';
		$dream_php_version_description_text =  esc_html__( 'The version of PHP installed on your hosting server', 'dream' );
	}
}
else{
	$dream_php_version_text = __('No PHP Installed', 'dream');
}

// php post max size
$dream_requirements_post_max_size = dream_return_memory_size($dream_server_requirements['server']['post_max_size']);
if ( dream_return_memory_size( ini_get('post_max_size') ) < $dream_requirements_post_max_size ) {
	$dream_php_post_max_size_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.size_format(dream_return_memory_size( ini_get('post_max_size') ) ).'</strong>';
	$dream_php_post_max_size_description_text = '<span class="fw-error-message">' .esc_html__( 'The largest file size that can be contained in one post.', 'dream'  ).' '. esc_html__( 'We recommend setting the post maximum size to at least:', 'dream' ) .' <strong>'.size_format($dream_requirements_post_max_size). '</strong>'.'. <a href="#" target="_blank">'.__('Learn how to do it','dream').'</a></span>';
}
else{
	$dream_php_post_max_size_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.size_format(dream_return_memory_size( ini_get('post_max_size') ) ).'</strong>';
	$dream_php_post_max_size_description_text = esc_html__( 'The largest file size that can be contained in one post', 'dream'  );
}

// php time limit
$dream_time_limit = ini_get('max_execution_time');
$dream_required_php_time_limit = (int)$dream_server_requirements['server']['php_time_limit'];
if ( $dream_time_limit < $dream_required_php_time_limit && $dream_time_limit != 0 ) {
	$dream_php_time_limit_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.$dream_time_limit.'</strong>';
	$dream_php_time_limit_description_text = '<span class="fw-error-message">'.esc_html__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups).', 'dream'  ).' '.__( 'We recommend setting the maximum execution time to at least', 'dream').' <strong>'.$dream_required_php_time_limit.'</strong>'.'. <a href="http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded" target="_blank">'.__('Learn how to do it','dream').'</a></span>';
} else {
	$dream_php_time_limit_description_text = esc_html__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)', 'dream'  );
	$dream_php_time_limit_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.$dream_time_limit.'</strong>';
}

// php max input vars
$dream_max_input_vars = ini_get('max_input_vars');
$dream_required_input_vars = $dream_server_requirements['server']['php_max_input_vars'];
if ( $dream_max_input_vars < $dream_required_input_vars ) {
	$dream_php_max_input_vars_description_text = '<span class="fw-error-message">'.esc_html__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'dream'  ). ' '.__( 'Please increase the maximum input variables limit to:','dream').' <strong>' . $dream_required_input_vars . '</strong>'.'. <a href="#" target="_blank">'.__('Learn how to do it','dream').'</a></span>';
	$dream_php_max_input_vars_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.$dream_max_input_vars.'</strong>';
} else {
	$dream_php_max_input_vars_description_text = esc_html__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'dream'  );
	$dream_php_max_input_vars_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.$dream_max_input_vars.'</strong>';
}

// suhosin
if( extension_loaded( 'suhosin' ) ) {
	$dream_suhosin_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.__('Yes', 'dream').'</strong>';
	$dream_suhosin_description_text = '<span class="fw-error-message">'. esc_html__( 'Suhosin is an advanced protection system for PHP installations and may need to be configured to increase its data submission limits', 'dream'  ).'</span>';
	$dream_max_input_vars      = ini_get( 'suhosin.post.max_vars' );
	$dream_required_input_vars = $dream_server_requirements['server']['suhosin_post_max_vars'];
	if ( $dream_max_input_vars < $dream_required_input_vars ) {
		$dream_suhosin_description_text .= '<span class="fw-error-message">' . sprintf( __( '%s - Recommended Value is: %s. <a href="%s" target="_blank">Increasing max input vars limit.</a>', 'dream' ), $dream_max_input_vars, '<strong>' . ( $dream_required_input_vars ) . '</strong>', '#' ) . '</span>';
	}
}
else {
	$dream_suhosin_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.__('No', 'dream').'</strong>';
	$dream_suhosin_description_text = esc_html__( 'Suhosin is an advanced protection system for PHP installations.', 'dream'  );
}

// mysql version
global $wpdb;
if( version_compare($wpdb->db_version(), $dream_server_requirements['server']['mysql_version'], '<=') ){
	$dream_mysql_version_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.$wpdb->db_version().'</strong>';
	$dream_mysql_version_description_text = '<span class="fw-error-message">' . esc_html__( 'The version of MySQL installed on your hosting server.', 'dream'  ).' '. esc_html__( 'We recommend you update MySQL to the latest version. The minimum required version for this theme is:', 'dream' ) .' <strong>'.$dream_server_requirements['server']['mysql_version']. '</strong> '.__('Contact your hosting provider, they can install it for you.', 'dream').'</span>';
}
else{
	$dream_mysql_version_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.$wpdb->db_version().'</strong>';
	$dream_mysql_version_description_text = esc_html__( 'The version of MySQL installed on your hosting server', 'dream'  );
}

// max upload size
$dream_requirements_max_upload_size = dream_return_memory_size($dream_server_requirements['server']['max_upload_size']);
if ( wp_max_upload_size() < $dream_requirements_max_upload_size ) {
	$dream_max_upload_size_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.size_format(wp_max_upload_size()).'</strong>';
	$dream_max_upload_size_description_text = '<span class="fw-error-message">' . esc_html__( 'The largest file size that can be uploaded to your WordPress installation.', 'dream'  ). ' '.esc_html__( 'We recommend setting the maximum upload file size to at least:', 'dream' ) .' <strong>'.size_format($dream_requirements_max_upload_size). '</strong>. <a href="'. esc_url('http://docs.themefuse.com/dream/your-theme/theme-settings/how-to-set-a-maximum-file-upload-size', 'dream') .'" target="_blank">'.__('Learn how to do it', 'dream').'</a></span>';
}
else{
	$dream_max_upload_size_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.size_format(wp_max_upload_size()).'</strong>';
	$dream_max_upload_size_description_text = esc_html__( 'The largest file size that can be uploaded to your WordPress installation', 'dream'  );
}

// fsockopen
if( function_exists( 'fsockopen' ) || function_exists( 'curl_init' ) ) {
	$dream_fsockopen_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html__('Yes', 'dream').'</strong>';
	$dream_fsockopen_description_text = __( 'Payment gateways can use cURL to communicate with remote servers to authorize payments, other plugins may also use it when communicating with remote services', 'dream' );
}
else{
	$dream_fsockopen_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.esc_html__('No', 'dream').'</strong>';
	$dream_fsockopen_description_text = '<span class="fw-error-message">'.__( 'Payment gateways can use cURL to communicate with remote servers to authorize payments, other plugins may also use it when communicating with remote services. Your server does not have <strong>fsockopen</strong> or <strong>cURL</strong> enabled thus PayPal IPN and other scripts which communicate with other servers will not work. Contact your hosting provider, they can install it for you.', 'dream' ).'</span>';
}
$installationlegit = isInstallationLegit();
if ( !$installationlegit ){
	$dream_wp_register_theme_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.esc_html__('Not active', 'dream').'</strong>';
	$setting_page = admin_url('options-general.php?page=verifytheme_settings');
	$dream_wp_register_theme_description_text = wp_kses( __( '<b>Important notice:</b> In order to receive all benefits of our theme, you need to activate your copy of the theme. <br />By activating the theme license you will unlock premium options - import demo data, install & update plugins and official support. Please visit  page to activate your copy of the theme', 'dream' ), array('b' => array(), 'br' => array(), 'a' => array('href' => array())) );
}
else{
	$dream_wp_register_theme_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_html__('Active', 'dream').'</strong>';
	$dream_wp_register_theme_description_text = esc_html__( 'Activated on this domain', 'dream' );
}
$server = wp_fix_server_vars();
$options = array(
	'requirements_tab' => array(
		'title'   => esc_html__( 'Requirements', 'dream' ),
		'type'    => 'tab',
		'options' => array(
			'wordpress-environment-box' => array(
				'title'   => esc_html__( 'WordPress Environment', 'dream' ),
				'type'    => 'box',
				'options' => array(
					'register_theme' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'Register Your Theme', 'dream' ),
						'desc'  => $dream_wp_register_theme_description_text,
						'html'  => $dream_wp_register_theme_text,
						'type'  => 'html',
					),
					'home_url' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'Home URL', 'dream' ),
						'desc'  => esc_html__( "The URL of your site's homepage", "dream" ),
						'type'  => 'html',
						'html'  => '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_url(home_url()).'</strong>',
					),
					'site_url' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'Site URL', 'dream' ),
						'desc'  => esc_html__( "The root URL of your site", "dream" ),
						'type'  => 'html',
						'html'  => '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_url(site_url()).'</strong>',
					),
					'wp_version' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'WP Version', 'dream' ),
						'desc'  => $dream_wp_version_description_text,
						'type'  => 'html',
						'html'  => $dream_wp_version_text,
					),
					'wp_multisite' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'WP Multisite', 'dream' ),
						'type'  => 'html',
						'desc'  => esc_html__( 'Whether or not you have WordPress Multisite enabled', 'dream' ),
						'html'  => $dream_multisite_text,
					),
					'wp_debug_mode' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'WP Debug Mode', 'dream' ),
						'type'  => 'html',
						'desc'  => $dream_wp_debug_mode_description_text,
						'html'  => $dream_wp_debug_mode_text,
					),
					'wp_memory_limit' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'WP Memory Limit', 'dream' ),
						'desc'  => $dream_wp_memory_limit_description_text,
						'type'  => 'html',
						'html'  => $dream_wp_memory_limit_text,
					),
				)
			),
			'server-environment-box' => array(
				'title'   => esc_html__( 'Server Environment', 'dream' ),
				'type'    => 'box',
				'options' => array(
					'server_info' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'Server Info', 'dream' ),
						'desc'  => esc_html__( "Information about the web server that is currently hosting your site", "dream" ),
						'type'  => 'html',
						'html'  => '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html( $server['SERVER_SOFTWARE'] ).'</strong>',
					),
					'php_version' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Version', 'dream' ),
						'desc'  => $dream_php_version_description_text,
						'type'  => 'html',
						'html'  => $dream_php_version_text,
					),
					'php_post_max_size' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Post Max Size', 'dream' ),
						'desc'  => $dream_php_post_max_size_description_text,
						'type'  => 'html',
						'html'  => $dream_php_post_max_size_text,
					),
					'php_time_limit' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Time Limit', 'dream' ),
						'desc'  => $dream_php_time_limit_description_text,
						'type'  => 'html',
						'html'  => $dream_php_time_limit_text,
					),
					'php_max_input_vars' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'PHP Max Input Vars', 'dream' ),
						'desc'  => $dream_php_max_input_vars_description_text,
						'type'  => 'html',
						'html'  => $dream_php_max_input_vars_text,
					),
					'suhosin_installed' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'SUHOSIN Installed', 'dream' ),
						'desc'  => $dream_suhosin_description_text,
						'type'  => 'html',
						'html'  => $dream_suhosin_text,
					),
					'zip_archive' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'ZipArchive', 'dream' ),
						'desc'  => class_exists( 'ZipArchive' ) ? esc_html__('ZipArchive is required for importing demos. They are used to import and export zip files specifically for sliders', 'dream') : '<span class="fw-error-message">'.esc_html__('ZipArchive is required for importing demos. They are used to import and export zip files specifically for sliders.', 'dream').' '.esc_html__('Contact your hosting provider, they can install it for you.', 'dream').'</span>',
						'type'  => 'html',
						'html'  => class_exists( 'ZipArchive' ) ? '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html__('Yes', 'dream').'</strong>' : '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.esc_html__('No', 'dream').'</strong>',
					),
					'mysql_version' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'MySQL Version', 'dream' ),
						'desc'  => $dream_mysql_version_description_text,
						'type'  => 'html',
						'html'  => $dream_mysql_version_text,
					),
					'max_upload_size' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'Max Upload Size', 'dream' ),
						'desc'  => $dream_max_upload_size_description_text,
						'type'  => 'html',
						'html'  => $dream_max_upload_size_text,
					),
					'fsockopen' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => esc_html__( 'fsockopen/cURL', 'dream' ),
						'desc'  => $dream_fsockopen_description_text,
						'type'  => 'html',
						'html'  => $dream_fsockopen_text,
					),
					'legend' => array(
						'label' => false,
						'type'  => 'html',
						'html'  => '',
						'desc'  => '<i class="fw-yes-icon dashicons dashicons-yes"></i><span class="fw-success-message">'.esc_html__('Meets minimum requirements', 'dream').'</span><br><i class="fw-no-icon dashicons dashicons-info"></i><span class="fw-error-message">'.esc_html__("We have some improvements to suggest", "dream").'</span>',
					),
				)
			),
		)
	),
);
