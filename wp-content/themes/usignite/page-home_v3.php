<?php
get_header('v3full'); ?>
  	<section id="content">
  		<div class="inner">
  			<div class="showcase-a">
  				<div class="wrap">
  					<div class="slider">
  					  <?php $slides_args = array(
                  'numberposts'     => 3,
                  'offset'          => 0,
                  'orderby'         => 'menu_order',
                  'order'           => 'DESC',
                  'post_type'       => 'home_slides',
                  'post_status'     => 'publish' ); ?>

              <?php $slides = get_posts( $slides_args ); ?>

              <?php foreach ($slides as $slide):?>

                <?php $slide_attr = get_group('slide_attr',$post_id= $slide->ID) ?>

                <article>
    							<figure><a href="<?=$slide_attr[1]['slide_attr_link_url'][1]?>" class="video"><img src="<?=$slide_attr[1]['slide_attr_image'][1]['thumb']?>" width="300" height="210" alt="Dot" /></a></figure>
    							<h1><?=$slide_attr[1]['slide_attr_body_text'][1]?></h1>
    							<p class="more"><a href="<?=$slide_attr[1]['slide_attr_link_url'][1]?>">Learn More &gt;</a></p>
    						</article>
              <?php endforeach; ?>
  					</div>
  				</div>
  			</div>
  			<div class="intro-a">
  				<div class="one">
  					<h2>About Us Ignite:</h2>
  					<p>US Ignite fosters the creation of next-generation Internet applications that provide transformative public benefit.</p>
            <p>By engaging diverse public and private leaders, we “ignite” the development and deployment of new apps with profound impact on how Americans work, live, learn and play.<br /><a href="/what-is-us-ignite">Learn More &gt;</a></p>
  				</div>
  				<div class="two">
  					<h2>Recent News &amp; Events <a href="/news">+ More</a></h2>
  					<?php $events_and_news_args = array(
                'numberposts'     => 2,
                'offset'          => 0,
                'category'        => '4,6',
                'orderby'         => 'post_date',
                'order'           => 'DESC',
                'post_type'       => 'post',
                'post_status'     => 'publish' ); ?>
            <?php $events_and_news_array = get_posts( $events_and_news_args ); ?>

  					<ul>
  					  <?php foreach ($events_and_news_array as $e_n_item): ?>
  						<li><a href="<?= get_post_permalink($e_n_item->ID); ?>"><?= $e_n_item->post_title; ?></a>
                <p class="addthis_toolbox addthis_pill_combo" addthis:url="<?= get_post_permalink($e_n_item->ID); ?>" addthis:title="<?= $e_n_item->post_title; ?>">
  								<a class="addthis_button_facebook_like" href="#"></a>
  								<a class="addthis_button_tweet" tw:count="horizontal" href="#"></a>
  							</p>
  						</li>
  						<?php endforeach; ?>
  					</ul>
  				</div>
  			</div>
  			<div class="triplets-a">
  				<div class="column city featured">
  				  <?php

             $querystr = "
                 SELECT wposts.* 
                 FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
                 WHERE wposts.ID = wpostmeta.post_id 
                 AND wpostmeta.meta_key = 'home_city_feature' 
                 ORDER BY wpostmeta.meta_value DESC
                 ";

             $featured_cities = $wpdb->get_results($querystr);
             $featured_cities_random_key = array_rand($featured_cities, 1);
             $featured_city = $featured_cities[$featured_cities_random_key];
             
             $featured_city_custom_fields = get_post_custom($featured_city->ID);
             foreach ( $featured_city_custom_fields as $key => $value ) {
                 $featured_city->$key = $value[0];
             }
               
                 
             
            ?>
  					<!--h2 class="cleveland">Cleveland</h2-->
  					<h2 <?= isset($featured_city->home_city_feature_title_fontsize)? 'style="font-size:' . $featured_city->home_city_feature_title_fontsize . 'px"' : '' ?>><?=$featured_city->home_city_feature_title?></h2>
  					<figure><iframe src="http://www.youtube.com/embed/<?= $featured_city->youtube_id ?>" frameborder="0" width="248" height="150"></iframe></figure>
  					<p><?= $featured_city->home_city_feature_text; ?></p>
  					<p class="more"><a href="<?= get_post_permalink($featured_city->ID); ?>">Learn More &gt;</a></p>
  					<h3>Share:</h3>
  					<span class="addthis_toolbox addthis_pill_combo" addthis:url="<?= get_post_permalink($featured_city->ID); ?>" addthis:title="<?=$featured_city->post_title?>" addthis:description="<?= $featured_city->home_city_feature_text; ?>">
  						 <a class="addthis_button_facebook_like" href="#" ></a>
  						<a class="addthis_button_tweet" tw:count="horizontal" href="#" ></a>
  					</span>
  				</div>
  				<div class="column twitter">
  					<h2>On Twitter <a href="http://twitter.com/us_ignite" rel="external">+ Follow Us</a></h2>
  					<div id="tweets">
  					  <a class="twitter-timeline"  href="https://twitter.com/US_Ignite"  data-widget-id="354974572300365824"
  					  data-chrome="nofooter noheader noborders" 
          	  data-tweet-limit="2"
  					  >Tweets by @US_Ignite</a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  					</div>
  				</div>
  				<script type="text/javascript" charset="utf-8">
            /*head.ready(function(){
              getTwitters('tweets', {
              id: 'us_ignite',
              count: 2,
              enableLinks: true,
              ignoreReplies: true,
              clearContents: true,
              template: '<a class="user" target="_blank" href="https://twitter.com/%user_screen_name%/status/%id_str%/">@%user_screen_name%</a> %text% <time>%time%</time>'
//              https://twitter.com/US_Ignite/status/287302594714562560
              });
            });*/
          </script>
  				
  				<div class="column facebook">
  					<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FUSIgnite&amp;width=250&amp;height=395&amp;colorscheme=light&amp;show_faces=false&amp;border_color&amp;stream=true&amp;header=false&amp;appId=295975750457052" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:395px; background-color:#ffffff;" allowTransparency="true"></iframe>
  				</div>
  			</div>
  		</div>
  	</section><!-- #content -->
  	

<?php get_footer('v3'); ?>