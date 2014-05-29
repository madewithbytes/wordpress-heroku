<?php
get_header(); ?>
	
<h1 class="shadow">File Not Found</h1>
<div class="contentBox shadow">
	<div class="innerContentBox clearfix">
		<section id="primary" class="sidebar-page">
			<h2>This is somewhat embarrassing, isn&rsquo;t it?</h2>
			<div class="entry-content">
				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'usignite' ); ?></p>
					<?php get_search_form(); ?>
			</div><!-- .entry-content -->
			
		</section>
				
		<?php get_sidebar(); ?>
			
	</div>
</div>

<?php get_footer(); ?>