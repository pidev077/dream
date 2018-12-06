<?php
$server = wp_fix_server_vars();
$args = array(
	'echo'           => true,
	'remember'       => true,
	'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $server['HTTP_HOST'] . $server['REQUEST_URI'],
	'form_id'        => 'notification-loginform',
	'id_username'    => 'user_login',
	'id_password'    => 'user_pass',
	'id_remember'    => 'rememberme',
	'id_submit'      => 'wp-submit',
	'label_username' => __( 'Username', 'dream' ),
	'label_password' => __( 'Password', 'dream' ),
	'label_remember' => __( 'Remember Me', 'dream' ),
	'label_log_in'   => __( 'Log In', 'dream' ),
	'value_username' => '',
	'value_remember' => false
);
// wp_login_form( $args );

if ( is_user_logged_in() ) {
  $current_user = wp_get_current_user();
  $user_avatar = get_avatar_url( $current_user->user_email, array('size' => 200) );
  ?>
  <div class="welcome-user">
    <a class="current-user-avatar" href="">
      <img src="<?php echo esc_attr($user_avatar); ?>" alt="<?php echo esc_attr($current_user->display_name); ?>"/>
    </a>
    <div class="current-user-welcome"><?php echo sprintf(__('Hi, %s', 'dream'), $current_user->display_name); ?></div>
    <a href="<?php echo wp_logout_url(); ?>" class="logout-link"><?php _e('Logout', 'dream') ?> <span class="ion-ios-arrow-thin-right"></span></a>
  </div>
  <?php
} else {
  ?>
  <div class="sign-in-form">
    <h3><?php _e('Welcome back,', 'dream') ?></h3>
    <?php wp_login_form( $args ); ?>
  </div>
  <?php
}
