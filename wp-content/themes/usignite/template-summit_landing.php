<?php
/*
Template Name: Summit: Landing Page
*/
$body_css_class = "home";
include 'header-summit_landing.php' ?>
  
  <div class="wrapper">
    <div class="main">

      <div class="intro-a">
        <div class="inner">
          <?php $slides_args = array(
              'numberposts'     => 3,
              'offset'          => 0,
              'orderby'         => 'menu_order',
              'order'           => 'DESC',
              'post_type'       => 'summitslides',
              'post_status'     => 'publish' ); ?>
          
          <?php $slides = get_posts( $slides_args ); ?>
          
          <?php foreach ($slides as $slide):?>
            <?php $slide_attr = get_group('slide_attr',$post_id= $slide->ID) ?>
            <article style="background-image:url(<?php echo $slide_attr[1]['slide_attr_image'][1]['thumb']?>);">
              <div class="wrap">
                <h2 class="hx"><?php echo $slide_attr[1]['slide_attr_slide_title'][1]?></h2>
                <p class="sub"><?php echo $slide_attr[1]['slide_attr_slide_subtitle'][1]; ?></p>
                <p><?php echo $slide_attr[1]['slide_attr_slide_text'][1]?></p>
                <p class="action"><a href="<?php echo $slide_attr[1]['slide_attr_link_url'][1]?>" class="button-a">Register Now</a></p>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
      
      
      <?php $news_args = array(
          'numberposts'     => 999999,
          'offset'          => 0,
          'orderby'         => 'menu_order',
          'order'           => 'DESC',
          'post_type'       => 'summit_news',
          'post_status'     => 'publish' ); ?>
      
      <?php $news = get_posts( $news_args ); ?>
      
      <div class="newsbar-a">
        <div class="wrapper">
          <h3 class="hx">News:</h3>
          <div class="items">
            <div class="wrap">
              <ul>
                <?php foreach ($news as $notice):?>
                  <?php $notice_attr = get_group('news_attr',$post_id= $notice->ID) ?>
                  <li><a href="<?php echo $notice_attr[1]['news_attributes_link'][1]?>"><?php echo $notice->post_title; ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      

      <div class="profiles-a">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>


<?php get_footer('summit'); ?>