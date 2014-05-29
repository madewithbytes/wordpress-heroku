<?php

if ( 'content' != $current_layout ) :
?>
		<section id="secondary" class="widget-area" role="complementary">
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<?php endif; // end sidebar widget area ?>
		</section><!-- #secondary .widget-area -->
<?php endif; ?>