<?php
get_header('v3full'); ?>
  <section id="content">
    <div class="inner">
	    <h1>Whitepapers</h1>
	    <div class="cols-b">
			  <section class="primary">
					<a class="refBack" href="<?php echo site_url();?>/whitepaper">&larr; Back to all Whitepapers</a>
					
					<section class="list-articles">
					<?php while ( have_posts() ) : the_post(); ?>
						<nav id="nav-single" class="clearfix">
							<h3 class="assistive-text"><?php _e( 'Post navigation', 'usignite' ); ?></h3>
							<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'usignite' ) ); ?></span>
							<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'usignite' ) ); ?></span>
						</nav><!-- #nav-single -->

					<?php get_template_part( 'content', 'single' ); ?>

					<?php endwhile; // end of the loop. ?>
					</section>
				</section>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
<?php get_footer('v3'); ?>