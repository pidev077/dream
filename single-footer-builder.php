<?php
/**
 * The Template for displaying all single footer builder
 */
get_header();
dream_title_bar();

?>
<section class="bt-main-row" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
    <div class="row">
        <div class="bt-content-area bt-footer-custom-layout <?php echo join( ' ', get_post_class( $post->post_name ) ); ?> <?php dream_get_content_class( 'content', '' ); ?>">
            <div class="bt-col-inner"> 
                <?php while ( have_posts() ) : the_post();
	                the_content();
	                break;
                endwhile; ?>
            </div><!-- /.bt-col-inner -->
        </div><!-- /.bt-content-area -->
    </div><!-- /.row -->
</section>

</div><!-- /.site-main -->
</div><!-- /#page -->
<?php wp_footer(); ?>
</body>
</html>

