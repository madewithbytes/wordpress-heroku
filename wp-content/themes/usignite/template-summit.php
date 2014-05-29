<?php
/*
Template Name: Summit: Interior Page
*/

include 'header-summit_landing.php' ?>


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      
      <div class="wrapper">
  			<div class="side">
  				<script type="text/javascript" charset="utf-8">
  				  $(document).ready(function() {
  				    if ($('ul ul li.current-menu-item').size() > 0) {
  				      $('.side:first').prepend('<nav class="sidenav-a"></nav>');
  				      $('.side:first').prepend('<h2 class="hide_mobile">'+$('.current-menu-parent a').html()+'</h2>');
  				      $('ul ul li.current-menu-item').addClass('active').parents('ul:first').appendTo('.sidenav-a:first');
  				      $(".sidenav-a ul").tinyNav({
        					active: 'active',
        					indent: '- ',
        					label: ''
        				});
  				    } else {
  				      $('.side:first').addClass('hide_mobile');
  				    }
  				  });
  				</script>

  				<div class="socialbox-a twitter">
  					<a class="twitter-timeline" href="https://twitter.com/US_Ignite" data-widget-id="446008397658202112">Tweets by @US_Ignite</a>
  					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  				</div>

  				<div class="socialbox-a facebook">
  					<div class="fb-like-box" data-href="https://www.facebook.com/USIgnite" data-width="340" data-height="240" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
  				</div>
  			</div>
  			<div class="main">
  			  <h1><?php the_title(); ?></h1>
  			  <?php if (get_post_meta($post->ID, "Sub-Headline", true) != ''): ?>
  			    <h2><?php echo get_post_meta($post->ID, "Sub-Headline", true); ?></h2>
  			  <?php endif; ?>
  			  <?php if (has_post_thumbnail( $post_id )): ?>
  			    <figure><?php the_post_thumbnail('large');?></figure>
  			  <?php endif; ?>
          <?php the_content(); ?>
  			</div>
  		</div>
    
    <?php endwhile; endif; ?>



<?php get_footer('summit'); ?>