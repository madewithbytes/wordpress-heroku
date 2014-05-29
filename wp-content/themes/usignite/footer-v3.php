<footer id="footer">
	<h2>US Ignite Sponsors:</h2>
	<div class="carousel-a">
		<div class="wrap">
			<div class="slider">
				<ul>
				  <?php $sponsors_args = array(
              'numberposts'     => 10000,
              'offset'          => 0,
              'orderby'         => 'menu_order',
              'order'           => 'DESC',
              'post_type'       => 'sponsors',
              'post_status'     => 'publish' ); ?>

          <?php $sponsors = get_posts( $sponsors_args ); ?>

          <?php foreach ($sponsors as $sponsor):?>

            <?php $sponsor_attr = get_group('sponsor_attr',$post_id= $sponsor->ID) ?>

            <li><a href="<?=$sponsor_attr[1]['sponsor_attr_link_url'][1];?>"><img src="<?=$sponsor_attr[1]['sponsor_attr_image'][1][thumb];?>" width="150" height="75" alt="<?=$sponsor->post_title;?>" rel="external" target="_blank"/></a></li>

          <?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	<p class="copys">Copyright 2012 US Ignite  All Rights Reserved.</p>
</footer><!-- #footer -->
</div><!-- #root -->
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=istrat"></script>
</body>
</html>