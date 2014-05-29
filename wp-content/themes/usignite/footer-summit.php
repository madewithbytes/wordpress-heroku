	</section>
	<footer id="footer" class="wrapper">
		<div class="logos-a">
			<h3 class="hx">US Ignite Sponsors</h3>
			<div class="inner">
			  <?php $sponsors_args = array(
        'numberposts'     => 10000,
        'offset'          => 0,
        'orderby'         => 'menu_order',
        'order'           => 'DESC',
        'post_type'       => 'summitsponsors',
        'post_status'     => 'publish' ); ?>

        <?php $sponsors = get_posts( $sponsors_args ); ?>

        <?php foreach ($sponsors as $sponsor):?>
            <?php $sponsor_attr = get_group('sponsor_attr',$post_id= $sponsor->ID) ?>
            <figure><a href="<?php echo $sponsor_attr[1]['sponsor_attr_link_url'][1];?>" rel="external" target="_blank"><img src="<?php echo $sponsor_attr[1]['sponsor_attr_image'][1][thumb];?>" alt="<?php echo $sponsor->post_title;?>" /></a></figure>
        <?php endforeach; ?>
			</div>
		</div>
		<nav class="sitemap-a">
			<ul>
				<li><a href="/what-is-us-ignite/">About</a>
					<ul>
						<li><a href="/what-is-us-ignite/" target="_blank">What is US Ignite?</a></li>
						<li><a href="/staff/" target="_blank">Staff</a></li>
						<li><a href="/board-of-directors/" target="_blank">Board of Directors</a></li>
						<li><a href="/common-questions/" target="_blank">FAQ</a></li>
						<li><a href="/what-is-us-ignite/current-partners/" target="_blank">Sponsors/Partners</a></li>
						<li><a href="/get-involved/">Get Involved</a></li>
					</ul>
				</li>
			</ul>
			<!--ul>
				<li><a href="/what-is-us-ignite/">About</a>
					<ul>
						<li><a href="/what-is-us-ignite/" target="_blank">What is US Ignite?</a></li>
						<li><a href="/staff/" target="_blank">Staff</a></li>
						<li><a href="/board-of-directors/" target="_blank">Board of Directors</a></li>
						<li><a href="/common-questions/" target="_blank">FAQ</a></li>
						<li><a href="/what-is-us-ignite/current-partners/" target="_blank">Sponsors/Partners</a></li>
					</ul>
				</li>
				<li><a href="/get-involved/">Get Involved</a>
					<ul>
						<li><a href="./">Developers</a></li>
						<li><a href="./">Partner/Sponsor</a></li>
						<li><a href="./">Community Leader</a></li>
						<li><a href="./">Community Member</a></li>
						<li><a href="./">Get Started in My Community</a></li>
					</ul>
				</li>
				<li><a href="./">Applications</a>
					<ul>
						<li><a href="./">Submit an App Idea</a></li>
						<li><a href="./">App Projects</a></li>
					</ul>
				</li>
				<li><a href="./">Cities</a>
					<ul>
						<li><a href="./">Apply to become an</a></li>
						<li><a href="./">US Ignite City</a></li>
						<li><a href="./">Map of Cities</a></li>
					</ul>
				</li>
				<li><a href="./">Resources</a>
					<ul>
						<li><a href="./">Submit a Resource</a></li>
						<li><a href="./">Resource List</a></li>
					</ul>
				</li>
			</ul-->
			
			
			
			
			<ul>
				<li><a href="/newsandevents/">Blog</a></li>
				<!--li><a href="./">Events</a></li-->
				<li><a href="http://appsummit14.eventbrite.com" target="_blank">Register</a></li>
				<!--li><a href="./">Sign In</a></li-->
				<!--li><a href="./">Contact Us</a></li-->
				<li>Follow Us:
					<ul class="socials-a">
						<li class="facebook"><a class="addthis_button_facebook addthis_button_compact"><span>Facebook</span></a></li>
            <li class="twitter"><a class="addthis_button_twitter addthis_button_compact" href="#"><span>Twitter</span></a></li>
            <li class="google"><a class="addthis_button_google_plusone_share addthis_button_compact"><span>Google+</span></a></li>
						<li class="youtube"><a href="https://www.youtube.com/user/USIgnite1" target="_blank">Youtube</a></li>
            <li class="add more"><a class="addthis_button_compact" href="#"><span>More</span></a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<ul class="minis">
			<li><a href="#top">Top of the Page</a></li>
			<li><a href="/">Home</a></li>
		</ul>
		<p class="copys">©Copyright 2014 US Ignite. All Rights Reserved</p>
	</footer>
</div>


<script type="text/javascript" src="<?php echo home_url(); ?>/assets/summit2014/libraries/owl.carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo home_url(); ?>/assets/summit2014/javascript/extras.js?v=1"></script>
<script type="text/javascript" src="<?php echo home_url(); ?>/assets/summit2014/javascript/scripts.js?v=1"></script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=istrat"></script>
</body>
</html>