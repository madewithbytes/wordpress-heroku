<?php
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title-v3"><?php the_title(); ?></h2>

		<?php //if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php usignite_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php //endif; ?>
	</header><!-- .entry-header -->
	
	<!-- AddThis Button BEGIN -->
	<div class="addthis_toolbox addthis_default_style ">
	<a class="addthis_button_preferred_1"></a>
	<a class="addthis_button_preferred_2"></a>
	<a class="addthis_button_compact"></a>
	<a class="addthis_counter addthis_bubble_style"></a>
	</div>
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=istrat"></script>
	<!-- AddThis Button END -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'usignite' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'usignite' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'usignite' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'Tagged: %2$s', 'usignite' );
			} elseif ( '' != $categories_list ) {
				$utility_text = __( 'Category: %1$s', 'usignite' );
			} else {
				$utility_text = __( '', 'usignite' );
			}

			printf(
				$utility_text,
				$categories_list,
				$tag_list,
				the_title_attribute( 'echo=0' )
			);
		?>
		<?php edit_post_link( __( 'Edit', 'usignite' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
