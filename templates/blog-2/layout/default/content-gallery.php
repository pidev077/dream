<?php
global $post;

$dream_post_options = dream_listing_post_media($post->ID);
// echo '<pre>'; print_r($dream_post_options); echo '</pre>';

$image_background_elem = '';
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  $style_inline = "background: url(". get_the_post_thumbnail_url($post->ID, $dream_post_options['image_size']) .") no-repeat center center / cover;";
  $image_background_elem = "<div class='post-gallery-image-background' style='{$style_inline}'></div>";
}
?>

<div class="post-header-gallery-wrap">
  <?php echo bearsthemes_get_gallery_by_post_id($post->ID); ?>
</div>

<!-- entry -->
<div class="post-entry-wrap">

  <!-- Cat & tag -->
  <div class="cat-meta">
    <?php echo ! empty( $dream_post_options['category_list'] ) ? '<div class="post-category">' . $dream_post_options['category_list'] . '</div>' : ''; ?>
  </div>

  <!-- title -->
  <?php echo "{$dream_post_options['title_link']}"; ?>

  <div class="extra-meta">
    <!-- post date -->
    <div class="post-date" title="<?php _e('Date', 'dream'); ?>">
      <?php echo "{$dream_post_options['date']}"; ?>
    </div>

    <!-- post author -->
    <div class="post-author" title="<?php _e('Author', 'dream'); ?>">
      <span><?php echo esc_html__('By ', 'dream') ?></span>
      <?php echo "{$dream_post_options['author_link']}"; ?>
    </div>

    <!-- post comment -->
    <div class="post-total-comment" title="<?php _e('Comment', 'dream'); ?>">
      <i class="fa fa-comment" aria-hidden="true"></i>
      <?php echo "{$dream_post_options['comments']}"; ?>
      <?php // echo ((int) $dream_post_options['comments'] <= 1) ? esc_html__('Comment', 'dream') : esc_html__('Comments', 'dream')  ?>
    </div>

    <!-- post view -->
    <div class="post-total-view" title="<?php _e('View', 'dream'); ?>">
      <i class="fa fa-eye" aria-hidden="true"></i>
      <?php echo "{$dream_post_options['views']}"; ?>
      <?php // echo ((int) $dream_post_options['views'] <= 1) ? esc_html__('View', 'dream') : esc_html__('Views', 'dream')  ?>
    </div>
  </div>

  <?php echo "{$dream_post_options['readmore']}"; ?>
</div>
