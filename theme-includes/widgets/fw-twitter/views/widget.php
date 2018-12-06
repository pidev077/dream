<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

/**
 * @var $instance
 * @var $before_widget
 * @var $after_widget
 * @var $title
 */

if ( ! empty( $instance ) ) :
	echo "{$before_widget}";
	echo "{$title}";

	if ( ! empty( $tweets ) && ! isset( $tweets->errors ) ) : ?>
		<div class="fw-wrap-twitter">
			<ul class="tweet-list">
				<?php
				$date_format = get_option( 'date_format', 'd m y' );
				$return_html = '';
				foreach ( $tweets as $tweet ) {
          $class_has_logo = (isset( $instance['display_logo'] ) && $instance['display_logo'] == 'on' && ! empty( $tweet->user->profile_image_url )) ? 'tw-has-logo' : '';
					$return_html .= '<li class="tweet-item '. $class_has_logo .'">';
					if ( isset( $instance['display_logo'] ) && $instance['display_logo'] == 'on' && ! empty( $tweet->user->profile_image_url ) ) {
						$return_html .= '<div class="tweet-avatar">';
						$return_html .= '<img data-src="' . $tweet->user->profile_image_url . '" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="lazyload" alt="'.esc_html__('Lazyload', 'dream').'" />';
						$return_html .= '</div>';
					}

					// twitter text
					$return_html .= '<div class="tweet-text">';
					$return_html .= '<div class="tweet-text-inner">';
					$return_html .= dream_twitter_formating( $tweet->text, $instance['user'] );

					if ( isset( $instance['display_date'] ) && $instance['display_date'] == 'on' ) {
						$return_html .= '<div class="tweet-date">' . date( $date_format, strtotime( $tweet->created_at ) ) . '</div>';
					}

					$return_html .= '</div>';
					$return_html .= '</div>';
					$return_html .= '</li>';
				}
				echo "{$return_html}";
				?>
			</ul>
			<?php if ( isset( $instance['follow_button'] ) && ! empty( $instance['follow_button'] ) ) : ?>
				<div class="fw-btn-tweet">
					<a target="_blank" href="https://twitter.com/<?php echo esc_attr( $instance['user'] ); ?>"><span><?php echo "{$instance['follow_button']}"; ?></span></a>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php echo "{$after_widget}";
endif;
