<?php
global $post;

$dream_post_options = dream_listing_post_media($post->ID);
// echo '<pre>'; print_r($dream_post_options); echo '</pre>';
?>
<!-- Featured image -->
<?php if(!empty($dream_post_options['featured_image'])) { ?>
  <!-- title -->
  <?php echo "{$dream_post_options['title_link']}"; ?>

  <div class="post-featured-image-wrap">
    <div href="<?php the_permalink(); ?>" class="post-featured-image-link">
      <?php echo "{$dream_post_options['featured_image']}"; ?>
    </div>
  </div>
<?php } ?>

<!-- entry -->
<div class="post-entry-wrap">

  <div class="extra-meta">
    <!-- post author -->
    <div class="post-author" title="<?php _e('Author', 'dream'); ?>">
      <span><i class="fa fa-user"></i><?php echo esc_html__('by ', 'dream') ?></span>
      <?php echo "{$dream_post_options['author_link']}"; ?>
    </div>

    <!-- post date -->
    <div class="post-date" title="<?php _e('Date', 'dream'); ?>">
      <span><i class="fa fa-calendar"></i><?php echo esc_html__('Posted on ', 'dream') ?></span>
      <?php echo "{$dream_post_options['date']}"; ?>
    </div>

    <!-- Cat & tag -->
    <div class="cat-meta">
      <span><i class="fa fa-folder"></i><?php echo esc_html__('in ', 'dream') ?></span>
      <?php echo ! empty( $dream_post_options['category_list'] ) ? '<div class="post-category">' . $dream_post_options['category_list'] . '</div>' : ''; ?>
    </div>
  </div>

  <?php the_excerpt(); ?>

  <?php echo "{$dream_post_options['readmore']}"; ?>
</div>
