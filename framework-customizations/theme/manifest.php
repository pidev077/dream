<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Forbidden' );
}
$current_theme_data = wp_get_theme();

$manifest = array();

$manifest['id']                  = 'dream';
$manifest['skin']                = 'main';
$manifest['name']                = $current_theme_data->get( 'Name' ); //esc_html__( 'The Bears', 'dream' );
$manifest['uri']                 = 'http://bearsthemespremium.com/theme/dream/';
$manifest['description']         = esc_html__( 'dream WordPress Theme', 'dream' );
$manifest['version']             = $current_theme_data->get( 'Version' );
$manifest['author']              = 'Bearsthemes';
$manifest['author_uri']          = 'http://bearsthemespremium.com/';
$manifest['requirements']        = array(
	'wordpress' => array(
		'min_version' => '4.0',
	),
);
$manifest['server_requirements'] = array(
	'server' => array(
		'wp_memory_limit'          => '256M', // use M for MB, G for GB
		'php_version'              => '5.6',
		'post_max_size'            => '8M',
		'php_time_limit'           => '1500',
		'php_max_input_vars'       => '4000',
		'suhosin_post_max_vars'    => '3000',
		'suhosin_request_max_vars' => '3000',
		'mysql_version'            => '5.6.0',
		'max_upload_size'          => '8M',
	),
);


$manifest['supported_extensions'] = array(
	'sidebars'     			=> array(),
	'portfolio'    			=> array(),
	'megamenu'     			=> array(),
	'social'       			=> array(),
	'breadcrumbs'	 		=> array(),
	'wp-shortcodes' 		=> array(),
	'bears-import-demo' 	=> array(),
	'custom-js-composer' 	=> array(),
	//'backups'      		=> array(),
	//'events'       		=> array(),
);
