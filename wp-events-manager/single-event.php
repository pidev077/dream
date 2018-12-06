<?php
/**
 * The Template for displaying all single posts
 */
get_header();
dream_title_bar();
$dream_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
$dream_general_posts_options = dream_general_posts_options();
?>
<section class="bt-main-row bt-section-space <?php dream_get_content_class( 'main', $dream_sidebar_position ); ?>" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="container">
		<div class="row">
			<div class="bt-content-area <?php dream_get_content_class( 'content', $dream_sidebar_position ); ?>">
				<div class="bt-col-inner">
        <?php while ( have_posts() ) : ?>
          <?php
          the_post();
          wpems_get_template_part( 'content', 'single-event' );
          ?>
        <?php endwhile; ?>

        <?php

        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() ) :
          comments_template();
        endif; ?>
				</div><!-- /.bt-col-inner -->
			</div><!-- /.bt-content-area -->
			<?php get_sidebar('events'); ?>
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<?php get_footer(); ?>
