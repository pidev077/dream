<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="bears-login">
    <h2 class="title"><?php esc_html_e( 'Log in Account', 'dream' ); ?></h2>
	<?php
	wp_login_form(
		array(
			'redirect'       => ! empty( $_REQUEST['redirect_to'] ) ? esc_url( $_REQUEST['redirect_to'] ) : apply_filters( 'dream_default_login_redirect', home_url() ),
			'id_username'    => 'dream_login',
			'id_password'    => 'dream_pass',
			'label_username' => esc_html__( 'Username or email', 'dream' ),
			'label_password' => esc_html__( 'Password', 'dream' ),
			'label_remember' => esc_html__( 'Remember me', 'dream' ),
			'label_log_in'   => esc_html__( 'Login', 'dream' ),
		)
	);
	?>
</div>
<?php echo '<div class="link-bottom">' . esc_html__( 'Not a member yet? ', 'dream' ) . '<a href="' . esc_url( dream_get_page_url('register') ) . '">' . esc_html__( 'Register now', 'dream' ) . '</a></div>'; ?>
