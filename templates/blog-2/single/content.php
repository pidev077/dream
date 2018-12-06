<?php
$TBFW = defined( 'FW' );
$dream_post_options = dream_single_post_options( $post->ID );
$dream_related_articles_type = ! empty( $TBFW ) ? fw_get_db_settings_option( 'posts_settings/related_articles/yes/related_type', 'related-articles-1' ) : 'related-articles-1';
$dream_is_builder = dream_fw_ext_page_builder_is_builder_post($post->ID);
$author_id = $post->post_author;
$author_bt = esc_url( get_avatar_url( $author_id , 32 ) );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post post-details" ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<div class="fw-col-inner">
		<div class="entry-content clearfix <?php echo esc_attr(($dream_is_builder == true)? 'fw-row' : ''); ?>" itemprop="text">
			<div class="single-entry-header"> <!-- Start .single-entry-header -->
				<!-- post featured image -->
				<?php if(isset($dream_post_options['featured_image'])) {
						echo sprintf('<div class="post-image">%s</div>', $dream_post_options['featured_image']);
				} ?>
				<!-- post Title -->
				<h2 class="post-title"><?php the_title(); ?></h2>
				<!-- Post Author - Date - Category -->
				<div class="extra-meta">
					<?php // echo '<pre>'; print_r($dream_post_options); echo '</pre>'; ?>
					<div class="post-author" title="<?php _e('Post by', 'dream'); ?>"><img src="<?php echo esc_url($author_bt) ?>" /><div><span class="edu-meta-top"><?php esc_html_e( 'Posted By', 'dream' ) ?>:</span><span class="edu-meta-bot"> <?php echo "{$dream_post_options['author']}"; ?></span></div></div>
					<div class="post-date" title="<?php _e('Post date', 'dream'); ?>"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i> <div><span class="edu-meta-top"><?php esc_html_e( 'Date', 'dream' ) ?>:</span><span class="edu-meta-bot"> <?php echo "{$dream_post_options['date']}"; ?></span></div></div>
					<?php
					if(isset($dream_post_options['category_list']) && ! empty($dream_post_options['category_list'])) { ?>
					<div class="post-cat" title="<?php _e('Post in category', 'dream'); ?>"><div><span class="edu-meta-top"><?php esc_html_e( 'Categories', 'dream' ) ?>:</span><span class="edu-meta-bot">  <?php echo "{$dream_post_options['category_list']}"; ?></span></div></div>
					<?php } ?>
					<div class="post-total-comment" title="<?php _e('Comment', 'dream'); ?>">
						<div><span class="edu-meta-top"><?php esc_html_e( 'Comments', 'dream' ) ?>:</span><span class="edu-meta-bot"> <?php echo "{$dream_post_options['comments']}"; ?></span></div>
					</div>
				</div>
			</div> <!-- End .single-entry-header -->
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
</article>
<?php get_template_part( 'content', 'author' ); ?>
<?php get_template_part( 'post', 'navigation' ); ?>
<?php get_template_part( 'templates/related-articles/'.$dream_related_articles_type ); ?>
