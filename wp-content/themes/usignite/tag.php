<?php
get_header('v3full'); ?>
  <section id="content">
    <div class="inner">
	    <h1><?php single_tag_title(); ?></h1>
	    <div class="cols-b">
			  <section class="primary">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title"><?php
					printf( __( 'Tag Archives: %s', 'usignite' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					?></h1>
					
					<?php $tag_description = tag_description();
					if ( ! empty( $tag_description ) )
						echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
					?>
				</header>

			<?php usignite_content_nav( 'nav-above' ); ?>
			
			<section class="list-articles">
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
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'usignite' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'usignite' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

		</section>
		<?php get_sidebar(); ?>
	</div>
</div>
</section>
<?php get_footer('v3'); ?>
