<?php
get_header('v1'); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<h1 class="shadow"><?php the_title(); ?></h1>
<div class="contentBox shadow">
	<div class="innerContentBox clearfix">
		
		<section id="primary">
			
			<h2><?php echo get_post_meta($post->ID, "Sub-Headline", true); ?></h2>
			<div class="pageImage">
				<?php the_post_thumbnail('full'); ?>
				<span><?php echo get_post_meta($post->ID, 'image-caption', true); ?></span>
			</div>
			<div class="pageContent">
				<?php the_content(); ?>
			</div>
		</section>
	</div>
	<?php endwhile; endif; ?>
</div>

<?php if(($post->ID == 33)){ ?>	
<section id="secondary" class="footerFeed clearfix">
	<div class="feed shadow leftFeed">
		<?php

			$workshop_query = new WP_Query('post_type=workshop&posts_per_page=2'); ?>
			<h3 class="shadow">Meetings &amp; Workshops</h3>
			<div class="feedList">
				<?php if($workshop_query->have_posts()){ ?>
				<?php while($workshop_query->have_posts()):$workshop_query->the_post();?>
					<article>
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<p><?php the_excerpt(); ?></p>
					</article>
				<?php endwhile;?>
				<?php }else{?>
					<strong>Coming Soon</strong>
				<?php } ?>
			</div>
			<h4><a href="<?php echo site_url(); ?>/workshop" class="newsLink">See all Meetings &amp; Workshops</a></h4>

	</div>
	<div class="feed shadow rightFeed">
		<?php

			$whitepapers_query = new WP_Query('post_type=whitepaper&posts_per_page=2'); ?>
			<h3 class="shadow">Whitepapers</h3>
			<div class="feedList">
				<?php if($whitepapers_query->have_posts()){ ?>
				<?php while($whitepapers_query->have_posts()):$whitepapers_query->the_post();?>
					<article>
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<p><?php the_excerpt(); ?></p>
					</article>
				<?php endwhile;?>
				<?php }else{?>
					<strong>Coming Soon</strong>
				<?php } ?>
			</div>
			<h4><a href="<?php echo site_url(); ?>/whitepaper" class="newsLink">See all Whitepapers</a></h4>
	</div>
</section>
<?php } ?>

<?php if(($post->ID == 31)){ ?>	
<section id="secondary" class="footerFeed clearfix">
	<div class="singleFeed shadow">
		<?php

			$opportunity_query = new WP_Query('post_type=opportunity&posts_per_page=2'); ?>
			<h3 class="shadow">Upcoming Opportunities</h3>
			<div class="feedList">
				<?php if($opportunity_query->have_posts()){ ?>
				<?php while($opportunity_query->have_posts()):$opportunity_query->the_post();?>
					<article>
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<p><?php the_excerpt(); ?></p>
					</article>
				<?php endwhile;?>
				<?php }else{?>
					<strong>Coming Soon</strong>
				<?php } ?>
			</div>
			<h4><a href="<?php echo site_url(); ?>/opportunity" class="newsLink">See all Opportunities</a></h4>

	</div>
</section>
<?php } ?>

<?php if(($post->ID == 23)){ ?>	
<section id="secondary" class="footerFeed clearfix">
	<div class="singleFeed shadow about">

			<h3 class="shadow">About Us</h3>

			<div id="aboutInfo">
				<h5>History</h5>
				<div class="feedList">
					<?php echo get_post_meta($post->ID, 'about-info', true); ?>
				</div>
			</div>
			<div id="aboutSponsors">
				<h5>Sponsors</h5>
				<div class="feedList">
					<?php $sponsor_query = new WP_Query('post_type=sponsor&posts_per_page=-1&order=DESC&orderBy=title'); ?>
					<?php if($sponsor_query->have_posts()){ ?>
					<?php while($sponsor_query->have_posts()):$sponsor_query->the_post();?>
						<article>
							<?php if(has_post_thumbnail($post->ID)) { ?>
								<a href="<?php echo get_post_meta($post->ID, 'Sponsor Link', true)?>"><?php the_post_thumbnail('full'); ?></a>
							<?php } else { ?>
							<h5><a href="<?php echo get_post_meta($post->ID, 'Sponsor Link', true)?>"><?php the_title(); ?></a></h5>
							<?php } ?>
						</article>
					<?php endwhile;?>
					<?php }else{?>
						<strong>Coming Soon</strong>
					<?php } ?>
				</div>
			</div>
			<div id="aboutBoard">
				<h5>Board</h5>
				<div class="feedList">
					<?php $board_query = new WP_Query('post_type=board&posts_per_page=-1&order=DESC&orderBy=title'); ?>						<?php if($board_query->have_posts()){ ?>
					<?php while($board_query->have_posts()):$board_query->the_post();?>
						<article class="clearfix">
							<h5><?php the_title(); ?></h5>
							<h6><?php echo get_post_meta($post->ID, 'Title', true); ?></h6>
							<?php the_content(); ?>
						</article>
					<?php endwhile;?>
					<?php }else{?>
						<strong>Coming Soon</strong>
					<?php } ?>
				</div>
			</div>
			<div id="aboutPartners">
				<h5>Partners</h5>
				<div class="feedList">
					<?php $partner_query = new WP_Query('post_type=partner&posts_per_page=-1&order=DESC&orderBy=title'); ?>
					<?php if($partner_query->have_posts()){ ?>
					<?php while($partner_query->have_posts()):$partner_query->the_post();?>
						<article>
							<?php if(has_post_thumbnail($post->ID)) { ?>
								<a href="<?php echo get_post_meta($post->ID, 'Partner Link', true)?>"><?php the_post_thumbnail('full'); ?></a>
							<?php } else { ?>
							<h5><a href="<?php echo get_post_meta($post->ID, 'Partner Link', true)?>"><?php the_title(); ?></a></h5>
							<?php } ?>
						</article>
					<?php endwhile;?>
					<?php }else{?>
						<strong>Coming Soon</strong>
					<?php } ?>
				</div>
			</div>
			<div id="aboutStaff">
				<h5>Staff</h5>
				<div class="feedList">
					<?php $staff_query = new WP_Query('post_type=staff&posts_per_page=-1&order=DESC&order_by=title'); ?>						<?php if($staff_query->have_posts()){ ?>
					<?php while($staff_query->have_posts()):$staff_query->the_post();?>
						<article class="clearfix">
							<h5><?php the_title(); ?></h5>
							<h6><?php echo get_post_meta($post->ID, 'Position Title', true); ?></h6>
							<?php the_content(); ?>
						</article>
					<?php endwhile;?>
					<?php }else{?>
						<strong>Coming Soon</strong>
					<?php } ?>
				</div>
			</div>

	</div>
</section>
<?php } ?>

</div>

<?php get_footer(); ?>