<?php
get_header('v3full'); ?>
  <section id="content">
    <div class="inner">
	    <h1>Search</h1>
	    <div class="cols-b">
			  <section class="primary">
				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'usignite' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
					</header>
					<?php usignite_content_nav( 'nav-above' ); ?>
					
					<section class="list-articles">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php
								get_template_part( 'content', get_post_format() );
							?>
						<?php endwhile; ?>
					</section>
					<?php usignite_content_nav( 'nav-below' ); ?>
					
					<?php else : ?>

						<article id="post-0" class="post no-results not-found">
							<header class="entry-header">
								<h1 class="entry-title-v3"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
							</header><!-- .entry-header -->

							<div class="entry-content">
								<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyeleven' ); ?></p>
							</div><!-- .entry-content -->
						</article><!-- #post-0 -->

					<?php endif; ?>
			</section>
			<?php get_sidebar(); ?>

			
		</div>
	</div>
</section>
<?php get_footer('v3'); ?>