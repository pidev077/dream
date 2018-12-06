<?php
/**
 * The Template for displaying register button in single event page.
 *
 * Override this template by copying it to yourtheme/wp-events-manager/loop/register.php
 *
 * @author        ThimPress, leehld
 * @package       WP-Events-Manager/Template
 * @version       2.1.7
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

if ( wpems_get_option( 'allow_register_event' ) == 'no' ) {
	return;
}
global $post;
$time_format = get_option( 'time_format' );
$time_from   = get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ) : time();
$time_finish = get_post_meta( get_the_ID(), 'tp_event_date_end', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_end', true ) ) : time();
$time_start  = wpems_event_start( $time_format );
$time_end    = wpems_event_end( $time_format );

$event    = new WPEMS_Event( get_the_ID() );
$user_reg = $event->booked_quantity( get_current_user_id() );

if ( absint( $event->qty ) == 0 || get_post_meta( get_the_ID(), 'tp_event_status', true ) === 'expired' ) {
	return;
}
?>

<div class="bt-entry-register">
	<div class="entry-times">
		<ul class="details-times-event">
			<li itemprop="startDate">
				<i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
				<div>
					<span class="edu-meta-top"><?php esc_html_e( 'Start Time', 'dream' ) ?>:</span>
					<span class="edu-meta-bot">
						<?php echo esc_html( $time_start ); ?></br><?php echo date_i18n( 'F j, Y', $time_from ); ?>
					</span>
				</div>
			</li>
			<li itemprop="EndDate">
				<i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
				<div>
					<span class="edu-meta-top"><?php esc_html_e( 'End Time', 'dream' ) ?>:</span>
					<span class="edu-meta-bot">
						<?php echo esc_html( $time_end ); ?></br><?php echo date_i18n( 'F j, Y', $time_finish ); ?>
					</span>
				</div>
			</li>
			<li class="tick-but">
				<?php if ( is_user_logged_in() ) { ?>
					<?php
					$registered_time = $event->booked_quantity( get_current_user_id() );
					if ( $registered_time && wpems_get_option( 'email_register_times' ) === 'once' && $event->is_free() ) { ?>
							<a class="event-registered"
								 data-event="<?php echo esc_attr( get_the_ID() ) ?>"><?php _e( 'Registered', 'wp-events-manager' ); ?></a>
					<?php } else { ?>
			            <a class="event_register_submit event_auth_button event-load-booking-form event-register-btn"
			               data-event="<?php echo esc_attr( get_the_ID() ) ?>"><?php _e( 'Buy Ticket', 'wp-events-manager' ); ?></a>
					<?php } ?>
				<?php } else { ?>
					<a class="event-register-login"
						 data-event="<?php echo esc_attr( get_the_ID() ) ?>" href="<?php echo wpems_login_url(); ?>"><?php _e( 'Login to Buy', 'wp-events-manager' ); ?></a>
				<?php } ?>
			</li>
		</ul>
	</div>
</div>
