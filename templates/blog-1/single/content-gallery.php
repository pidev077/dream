<?php
$TBFW = defined( 'FW' );
$dream_post_options = dream_single_post_options( $post->ID );
$dream_related_articles_type = ! empty( $TBFW ) ? fw_get_db_settings_option( 'posts_settings/related_articles/yes/related_type', 'related-articles-1' ) : 'related-articles-1';
$dream_is_builder = dream_fw_ext_page_builder_is_builder_post($post->ID);

$post_settings = dream_get_settings_by_post_id($post->ID);
$gallery_data = (isset($post_settings['post_gallery_tab'])) ? $post_settings['post_gallery_tab']['gallery_images'] : array();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post post-details" ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<div class="fw-col-inner">
		<div class="entry-content clearfix <?php echo esc_attr(($dream_is_builder == true)? 'fw-row' : ''); ?>" itemprop="text">
			<div class="single-entry-header"> <!-- Start .single-entry-header -->
				<!-- post Title -->
				<h2 class="post-title"><?php the_title(); ?></h2>
				<!-- Post Author - Date - Category -->
				<div class="extra-meta">
					<?php // echo '<pre>'; print_r($dream_post_options); echo '</pre>'; ?>
					<div class="post-author" title="<?php _e('Post by', 'dream'); ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo "{$dream_post_options['author']}"; ?></div>
					<div class="post-date" title="<?php _e('Post date', 'dream'); ?>"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i> <?php echo "{$dream_post_options['date']}"; ?></div>
					<?php
					if(isset($dream_post_options['category_list']) && ! empty($dream_post_options['category_list'])) { ?>
					<div class="post-cat" title="<?php _e('Post in category', 'dream'); ?>"><i class="fa fa-folder" aria-hidden="true"></i> <?php echo "{$dream_post_options['category_list']}"; ?></div>
					<?php } ?>
				</div>
        <!-- Gallery image -->
    		<?php if(!empty($dream_post_options['gallery'])) { ?>
    			<div class="post-gallery-image-wrap">
    				<?php // echo "{$dream_post_options['gallery']}";
						if(is_array($gallery_data) && count($gallery_data) > 0) {
							echo "<div class='single-gallery-masonry' data-bears-masonryhybrid='{\"col\": 3, \"space\": 20}' data-bears-lightgallery>";
							echo "<div class='grid-sizer'></div><div class='gutter-sizer'></div>";
							foreach($gallery_data as $img_item) {
								echo "<div class='grid-item'><a href='{$img_item['url']}' class='gallery-item item'><img src='{$img_item['url']}' alt='#'></a></div>";
							}
							echo "</div>";
						}
						?>
    			</div>
    		<?php } ?>
			</div> <!-- End .single-entry-header -->
			<?php
			/* content */
			the_content();

			/* tags */
			if(isset($dream_post_options['tag_list']) && ! empty($dream_post_options['tag_list'])) {
				echo "<div class='single-entry-tag'>". esc_html__('Tags: ', 'dream') . "{$dream_post_options['tag_list']}</div>";
			}

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'dream' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</div>
	</div>
</article>
<?php get_template_part( 'content', 'author' ); ?>
<?php get_template_part( 'post', 'navigation' ); ?>
<?php get_template_part( 'templates/related-articles/'.$dream_related_articles_type ); ?>
