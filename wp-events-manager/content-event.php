<?php
$display_year = get_theme_mod( 'dream_event_display_year', false );
$time_format  = get_option( 'time_format' );
$time_start   = wpems_event_start( $time_format );
$time_end     = wpems_event_end( $time_format );

$location   = wpems_event_location();
$date_show  = wpems_get_time( 'd' );
$month_show = wpems_get_time( 'F' );
if ( $display_year ) {
	$month_show .= ', ' . wpems_get_time( 'Y' );
}
$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
$class = !empty( $featured_image_url ) ? 'item-event has_post_thumbnail' : 'item-event';
?>
<div <?php post_class( $class ); ?>>
	<div class="event-inner-list">
		<div class="bg-event-list"></div>
		<div class="event-featured-image-wrap">
			<div class="event-thumbnail" style="background: url(<?php echo $featured_image_url ?>) no-repeat center center / cover, #fafafa;"><div class="bt-overlay"></div></div>
		</div>
		<div class="edu-event-date">
			<div class="edu-event-day"><span><?php echo esc_html( $date_show ); ?></span><?php echo esc_html( $month_show ); ?></div>
			<div class="edu-event-time"><?php echo esc_html( $time_start ) . ' - ' . esc_html( $time_end ); ?></div>
		</div>
		<div class="content-entry">
			<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" class="title-link" title="<?php get_the_title(); ?>"><div class="title"><?php the_title(); ?></div></a>
			<div class="venue-empty"><?php echo ent2ncr( $location ); ?></div>
		</div>
		<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>" class="readmore-link"><?php esc_html_e( 'View Details', 'dream' ); ?></a>
	</div>
</div>
