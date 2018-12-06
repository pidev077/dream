<?php
/**
 * @Author: ducnvtt
 * @Date  :   2016-02-19 09:11:59
 * @Last  Modified by:   leehld
 * @Last  Modified time: 2017-03-02 17:22:53
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$query = new WP_Query( $args );

wpems_print_notices();

if ( ! is_user_logged_in() ) {
	/* translators: 1: link to login page. */
	printf( __( 'You are not <a href="%1$s">login</a>', 'dream' ), dream_get_page_url('login') );

	return;
}

if ( $query->have_posts() ) : ?>

    <table class="list-book-event">
        <thead>
        <th class="id"><?php esc_html_e( 'ID', 'dream' ); ?></th>
        <th><?php esc_html_e( 'Events', 'dream' ); ?></th>
        <th class="type"><?php esc_html_e( 'Type', 'dream' ); ?></th>
        <th><?php esc_html_e( 'Cost', 'dream' ); ?></th>
        <th class="quantity"><?php esc_html_e( 'Quantity', 'dream' ); ?></th>
        <th class="method"><?php esc_html_e( 'Method', 'dream' ); ?></th>
        <th><?php esc_html_e( 'Status', 'dream' ); ?></th>
        </thead>
        <tbody>
		<?php foreach ( $query->posts as $post ) : ?>

			<?php $booking = WPEMS_Booking::instance( $post->ID ); ?>
            <tr>
                <td class="id"><?php printf( '%s', wpems_format_ID( $post->ID ) ); ?></td>
                <td><?php printf( '<a href="%s">%s</a>', get_the_permalink( $booking->event_id ), get_the_title( $booking->event_id ) ); ?></td>
                <td class="type"><?php printf( '%s', floatval( $booking->cost ) == 0 ? __( 'Free', 'dream' ) : __( 'Cost', 'dream' ) ); ?></td>
                <td><?php printf( '%s', wpems_format_price( floatval( $booking->cost ), $booking->currency ) ); ?></td>
                <td class="quantity"><?php printf( '%s', $booking->qty ); ?></td>
                <td class="method"><?php printf( '%s', $booking->payment_id ? wpems_get_payment_title( $booking->payment_id ) : __( 'No payment.', 'dream' ) ); ?></td>
                <td><?php printf( '%s', wpems_booking_status( $booking->ID ) ); ?></td>
            </tr>

		<?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <div class="message message-info"><?php esc_html_e( 'No records.', 'dream' ); ?></div>
	<?php
endif;
