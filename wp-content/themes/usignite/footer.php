	</div><!-- #main -->

	<div style="width:100%; clear:both;"></div>

	<footer id="colophon" class="clearfix" role="contentinfo">
		<section class="footer-area">
			<div class="footer-wrapper clearfix">
				<?php
					wp_nav_menu (array('menu'=>'main_menu'));
				?>
				<a href="/">US Ignite</a>
			</div>
		</section>

	</footer><!-- #colophon -->
	<?php wp_footer(); ?>
</section><!-- #page -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/preloadCssImages.jQuery_v5.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ignite.js"></script>

<script> // Change UA-XXXXX-X to be your site's ID
    window._gaq = [['_setAccount','UA-27345363-1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>

  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

</body>
</html>