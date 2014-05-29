<?php
get_header('v1'); ?>

<style>
a.rmline {
  text-decoration:none;
}
span.clr {
  color:#FAA500;
}
.last_twitter{float:left;padding:12px 0 0 0;margin-left:52px;line-height:12px;}
.light{color:#CCCCCC;}
.iconimage{padding:2px 5px;float:left;}
</style>

<section id="primary" class="widget-area" role="complementary">
	<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
	<?php endif; // end sidebar widget area ?>
</section><!-- .widget-area -->

<section id="secondary" class="footerFeed clearfix">
	<div id="announcement-area" class="shadow leftFeed" style="height:460px; margin-top:15px;">
		<h3 class='assistive-text'>Announcements</h3>
		<?php			
		$announcement_query = new WP_Query('post_type=announcement&order=ASC'); ?>
		<ul>
			<?php while($announcement_query->have_posts()):$announcement_query->the_post();?>
			<li>
				<?php if(get_post_meta($post->ID, "Announcement Link", true)){ ?>
					<a href="<?php echo get_post_meta($post->ID, "Announcement Link", true);?>"><?php the_post_thumbnail('full'); ?></a>
					<a href="<?php echo get_post_meta($post->ID, "Announcement Link", true);?>">
						<span class="announceTitle"><?php the_title(); ?></span></a>
					<a href="<?php echo get_post_meta($post->ID, "Announcement Link", true);?>">
						<span class="announceSubhead"><?php echo get_post_meta($post->ID, 'Image Sub-Header', true); ?></span></a>
				<?php }else{
					the_post_thumbnail('full'); ?>
					<span class="announceTitle"><?php the_title(); ?></span>
					<span class="announceSubhead"><?php echo get_post_meta($post->ID, 'Image Sub-Header', true);?></span>
				<?php } ?>
				<p>
					<?php if(get_post_meta($post->ID, "Announcement Link", true)){ ?>
						<a href="<?php echo get_post_meta($post->ID, "Announcement Link", true);?>"><?php the_content(); ?></a>
					<?php }else{
						the_content();
					}?>
				</p>
			</li>		
				<?php endwhile;?>
		</ul>
	</div>
				
	<div class="feed shadow rightFeed2" style="margin-top:15px; float:right; margin-right:20px; height:340px;margin-bottom:15px;">
		<?php			
			$news_query = new WP_Query('posts_per_page=1'); ?>
			<h3 class="shadow">News <span class="clr">&amp;</span> Announcements</h3>
			<div class="feedList">
				<?php if($news_query->have_posts() ){ ?>
				<?php while($news_query->have_posts()):$news_query->the_post();?>
					<article>
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<p><?php $excerpt = get_the_excerpt();
						echo string_limit_words($excerpt,30);?>... <a class="rmline" href="<?php the_permalink() ?>"> continue reading</a></p>				
					</article>
				<?php endwhile;?>
				<?php } else { ?>
					<strong>Coming Soon</strong>
				<?php } ?>
				
			</div>
			<h4><a href="<?php echo site_url(); ?>/news" class="newsLink">See all News & Announcements</a></h4>
	</div>
	
	<div class="feed shadow rightFeed2" style="float:right;margin-right:20px;height:115px;">
		
	<div class="last_twitter"><img style="padding:2px;" src="http://us-ignite.org/wp-content/uploads/2012/04/twitter-icon2.png"><strong>US Ignite</strong> <span class="light">@US_Ignite</span></div>
	<div style="clear:both;"></div>
	<img class="iconimage" src="http://us-ignite.org/wp-content/uploads/2012/04/ignite-icon.png" align="left">
	<ul id="twitter_update_list" style="list-style:none; margin-top:5px;">
  <li>Loading Tweets..</li>
  </ul>
  <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
  <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/US_Ignite.json?callback=twitterCallback2&count=5"></script>
  
	</div>
</section>

<?php get_footer('v1'); ?>