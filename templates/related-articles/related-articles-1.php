<?php
// $dream_general_posts_options = dream_general_posts_options();
$dream_enable_related_articles  = defined( 'FW' ) ? fw_get_db_customizer_option( 'post_settings/posts_single/related_articles', '' ) : array('selected' => 'yes');

if( $dream_enable_related_articles['selected'] != 'yes') return;

$dream_related_articles = dream_related_articles();

if ( ! empty( $dream_related_articles ) ) : ?>
	<div class="bt-wrap-related-article bt-<?php echo basename(__FILE__, '.php'); ?>">
		<div class="row">
			<div class="col-md-12">
				<h3 class="bt-title-related"><strong><?php esc_html_e( 'Related Articles', 'dream' ); ?></strong></h3>
			</div>
			<div class="related-article-list">
				<?php foreach ( $dream_related_articles as $item ) : // echo '<pre>'; print_r($item); echo '</pre>';
					$post_settings  = dream_get_settings_by_post_id($item->ID);
					$wrap_title				= isset($posts_general_settings['blog_title']['selected']) ? $posts_general_settings['blog_title']['selected'] : 'h2';
					$image_size				= 'dream-image-medium';// isset($post_settings['post_general_tab']['image_size']) ? $post_settings['post_general_tab']['image_size'] : 'medium-large' ;

					$post_data = array(
						'title_link' 			=> "<a href='". get_permalink($item->ID) ."' class='post-title-link'><{$wrap_title} class='post-title'>". $item->post_title ."</{$wrap_title}></a>",
						'featured_image' 	=> "<a href='". get_permalink($item->ID) ."' title='". $item->post_title ."'>" . dream_get_image(get_post_thumbnail_id($item->ID), array('size' => $image_size)) . "</a>",
						'trim_content'		=> wp_trim_words( (!empty($item->post_excerpt) ? $item->post_excerpt : $item->post_content), $num_words = 10, $more = '...' ),
					);
				?>
					<div class="col-md-6 col-sm-6">
						<div class="related-article-item">
							<?php echo "{$post_data['featured_image']}"; ?>
							<?php echo "{$post_data['title_link']}"; ?>
							<?php echo "<p>{$post_data['trim_content']}</p>"; ?>
						</div>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
