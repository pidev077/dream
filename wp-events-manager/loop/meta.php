<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post;
$author_id = $post->post_author;
$author_bt = esc_url( get_avatar_url( $author_id , 32 ) );
$event_cat_list = get_the_term_list( $post->ID, 'tp_event_category', '', ', ' );
$location = get_post_meta( get_the_ID(), 'tp_event_location', true ) ? get_post_meta( get_the_ID(), 'tp_event_location', true ) : '';
$time_format = get_option( 'time_format' );
$time_from   = get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ) : time();
$time_finish = get_post_meta( get_the_ID(), 'tp_event_date_end', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_end', true ) ) : time();
$time_start  = wpems_event_start( $time_format );
$time_end    = wpems_event_end( $time_format );
$event_tag_list = get_the_term_list( $post->ID, 'tp_event_tag', '', ', ' );
//var_dump($post->ID);
?>
<div class="event-extra-meta">
	<ul class="details-event">
				<li class="event-author" title="<?php _e('Post by', 'dream'); ?>">
					<img src="<?php echo esc_url($author_bt) ?>" />
					<div>
						<span class="edu-meta-top"><?php esc_html_e( 'Posted By', 'dream' ) ?>:</span>
						<span class="edu-meta-bot">
								<?php echo get_the_author(); ?>
						</span>
					</div>
				</li>
				<li class="event-address" title="<?php _e('address', 'dream'); ?>">
					<div>
						<span class="edu-meta-top"><?php esc_html_e( 'Address', 'dream' ) ?>:</span>
						<span class="edu-meta-bot">
							<?php echo esc_html( $location ); ?>
						</span>
					</div>
				</li>
			</ul>
</div>
