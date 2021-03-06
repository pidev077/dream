<?php
$TBFW = defined( 'FW' );
$dream_post_options = dream_single_post_options( $post->ID );
$dream_related_articles_type = ! empty( $TBFW ) ? fw_get_db_settings_option( 'posts_settings/related_articles/yes/related_type', 'related-articles-1' ) : 'related-articles-1';
$dream_is_builder = dream_fw_ext_page_builder_is_builder_post($post->ID);
$dream_general_posts_options = dream_general_posts_options();

$image_background_elem = '';
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  $style_inline = "background: url(". get_the_post_thumbnail_url($post->ID, $dream_post_options['image_size']) .") center center;";
  $image_background_elem = "<div class='post-sing-image-background' style='{$style_inline}' data-stellar-background-ratio='0.8'></div>";
}

$article_classes = array(
	'post',
	'post-details',
	'clearfix',
  'post-single-creative-layout-' . $dream_general_posts_options['blog_type'],
);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( implode(' ', $article_classes) ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<div class="col-inner">
		<div class="entry-content clearfix" itemprop="text">
			<div class="post-single-entry-header"> <!-- Start .single-entry-header -->
				<?php echo "{$image_background_elem}"; ?>
				<div class="heading-entry-wrap">
					<!-- Cat & tag -->
				  <div class="cat-meta">
				    <?php echo ! empty( $dream_post_options['category_list'] ) ? '<div class="post-category">' . $dream_post_options['category_list'] . '</div>' : ''; ?>
				  </div>

					<!-- title -->
				  <?php echo "{$dream_post_options['title']}"; ?>

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
				      <?php echo "{$dream_post_options['comments']}"; ?>
				      <?php echo ((int) $dream_post_options['comments'] <= 1) ? esc_html__('Comment', 'dream') : esc_html__('Comments', 'dream')  ?>
				    </div>

				    <!-- post view -->
				    <div class="post-total-view" title="<?php _e('View', 'dream'); ?>">
				      <?php echo "{$dream_post_options['views']}"; ?>
				      <?php echo ((int) $dream_post_options['views'] <= 1) ? esc_html__('View', 'dream') : esc_html__('Views', 'dream')  ?>
				    </div>
				  </div>
				</div>
			</div> <!-- End .single-entry-header -->
			<div class="row">
				<div class="col-md-2">
					<?php echo dream_share_post(array('facebook' => true, 'twitter' => true, 'google_plus' => true, 'linkedin' => true, 'pinterest' => false)); //echo do_shortcode('[x_share title="'. esc_html__(' ', 'dream') .'" facebook="true" twitter="true" google_plus="true" linkedin="true" pinterest="true"]'); ?>
				</div>
				<div class="col-md-10">
          <div class="post-single-entry-extra">
            <div class="post-content-gallery-wrap">
              <?php
              $gallery_grid_params = array(
                'image_size' => 'large',
                'col' => 4,
                'space' => 15,
                'responsive' => json_decode('{"420":{"col":2},"860":{"col":2}}', true),
                'grid_name' => 'gallery-layout-grid-post-single-',
                'celHeight' => 150,
              );
              echo bearsthemes_get_gallery_by_post_id($post->ID, $gallery_grid_params); ?>
            </div>
          </div>
					<div class="post-single-content-text">
						<?php
						/* content */
						the_content();

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'dream' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );

						/* tags */
						if(isset($dream_post_options['tag_list']) && ! empty($dream_post_options['tag_list'])) {
							echo "<div class='single-entry-tag'>". esc_html__('Tags: ', 'dream') . "{$dream_post_options['tag_list']}</div>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>
<?php get_template_part( 'content', 'author' ); ?>
<hr />
<?php get_template_part( 'post', 'navigation' ); ?>
<?php get_template_part( 'templates/related-articles/'.$dream_related_articles_type ); ?>
