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
global $post;
$event_tag_list = get_the_term_list( $post->ID, 'tp_event_tag', '', ', ' );
?>
<div class="event-sharing">
  <span><?php esc_html_e( 'Share This', 'dream' ) ?>: </span><?php echo dream_share_post(array('facebook' => true, 'twitter' => true, 'google_plus' => true, 'linkedin' => true, 'pinterest' => false)); ?>
  <?php
  if(isset($event_tag_list) && ! empty($event_tag_list)) {
    echo "<div class='single-entry-tag'>". esc_html__('Tags: ', 'dream') . "{$event_tag_list}</div>";
  }
  ?>
</div>
