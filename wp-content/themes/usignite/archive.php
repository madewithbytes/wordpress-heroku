<?php
get_header('v3full'); ?>
  <section id="content">
    <div class="inner">
	    <h1>News &amp; Events</h1>
	    <div class="cols-b">
			  <section class="primary">
				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h2 class="page-title">
							<?php if ( is_day() ) : ?>
								<?php printf( __( 'Daily Archives: %s', 'usignite' ), '<span>' . get_the_date() . '</span>' ); ?>
							<?php elseif ( is_month() ) : ?>
								<?php printf( __( 'Monthly Archives: %s', 'usignite' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
							<?php elseif ( is_year() ) : ?>
								<?php printf( __( 'Yearly Archives: %s', 'usignite' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
							<?php else : ?>
								<?php _e( 'Blog Archives', 'usignite' ); ?>
							<?php endif; ?>
						</h2>

						<a class="refBack" href="<?php echo site_url();?>/news">&larr; Back to all News &amp; Events</a>

					</header>
					<?php usignite_content_nav( 'nav-above' ); ?>
					
				<section class="list-articles">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
						
					<?php endwhile; ?>
				</section>
					
				<?php usignite_content_nav( 'nav-below' ); ?>
				<?php else : ?>

					<article id="post-0" class="post no-results not-found">
						<header class="entry-header">
							<h2 class="entry-title-v3"><?php _e( 'Nothing Found', 'usignite' ); ?></h2>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'usignite' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-0 -->

				<?php endif; ?>
		</section>
		<?php get_sidebar(); ?>
			

	</div><!-- #content -->
</div><!-- #primary -->
</section>

<?php get_footer('v3'); ?>