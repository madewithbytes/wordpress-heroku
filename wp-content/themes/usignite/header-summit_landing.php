<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php
    global $page, $paged;
    wp_title( '|', true, 'right' );
    ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <script type="text/javascript" src="<?php echo home_url(); ?>/assets/summit2014/javascript/modernizr.js"></script>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700,900,400italic" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo home_url(); ?>/assets/summit2014/libraries/owl.carousel/owl.carousel.css?v=1" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo home_url(); ?>/assets/summit2014/styles/screen.css?v=1" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php echo home_url(); ?>/assets/summit2014/styles/print.css?v=1" media="print" />
  <link rel="shortcut icon" href="<?php echo home_url(); ?>/assets/summit2014/favicon.ico" type="image/x-icon" />
  <?php wp_head(); ?>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    //ga('create', 'UA-40470323-1', 'us-ignite.org');
    //ga('send', 'pageview');

  </script>
  <script type="text/javascript">
  var addthis_share = {
      url: "<?= the_permalink(); ?>"
  }
  </script>
</head>
<body<?= isset($body_css_class)? ' class="'.$body_css_class.'"': ''; ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>

<div class="root-a">
  <header id="top">
    <div class="wrapper">
      <h1 class="logo"><a href="/applicationsummit" accesskey="h"><img src="<?php echo home_url(); ?>/assets/summit2014/images/logo-a.png" width="315" height="55" alt="Application Summit"></a></h1>
      <nav class="skips">
        <ul>
          <li><a href="#nav" accesskey="n">Skip to navigation [n]</a></li>
          <li><a href="#content" accesskey="c">Skip to content [c]</a></li>
          <li><a href="#footer" accesskey="f">Skip to footer [f]</a></li>
        </ul>
      </nav>
      <nav class="nav" id="nav">
        <h2 class="hx"><span>Main </span>Menu</h2>
        <div class="wrap" id="main_menu">
          <?php 
            $summit_menu_args = array(
              'menu'            => 'summit',
              'container'       => false,
            );
            wp_nav_menu( $summit_menu_args );
            ?>
          <style type="text/css" media="screen">
           #main_menu ul ul {display:none;}
          </style>
          <form action="/wp-content/themes/usignite/inc/store-address.php" method="post" name="email_signup">
            <p><label for="f-newsletter">Subscribe to our newsletter</label> <input type="text" name="email" id="f-newsletter" placeholder="Enter your email address" /> <button type="submit">Go</button></p>
          </form>
          <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
              $('form[name="email_signup"]').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                form.append('<input type="hidden" name="ajax" value="1" />');
                form.find('button').attr('disabled', true);
                //<p style="font-size:1.4em; text-align:center;">Thank you!</p>
                $.ajax({
                  url: form.attr('action'),
                  dataType:'json',
                  data: form.serialize()
                }).done(function(json) {
                  console.log(json);
                  if (json.success) {
                    form.find('p').replaceWith($('<h4 style="margin:0;">Thank you!</h4><p style="font-size:0.8em">Check your email to confirm your subscription.</p>'));
                  } else {
                    alert(json.text);
                    form.find('button').attr('disabled', false);
                  }
                }).fail(function( jqXHR, textStatus, errorThrown ) {
                  form.find('button').attr('disabled', false);
                  alert('There was an error, please try again.');
                });
              });
            });
          </script>
        </div>
      </nav>
      <div class="bar">
        <div class="wrapper">
          <p class="back"><a href="/">Back to USIgnite</a></p>
          <ul class="socials-a">
            <li class="facebook"><a class="addthis_button_facebook addthis_button_compact"><span>Facebook</span></a></li>
            <li class="twitter"><a class="addthis_button_twitter addthis_button_compact" href="#"><span>Twitter</span></a></li>
            <li class="google"><a class="addthis_button_google_plusone_share addthis_button_compact"><span>Google+</span></a></li>
            <li class="youtube"><a href="https://www.youtube.com/user/USIgnite1" target="_blank">Youtube</a></li>
            <li class="add more"><a class="addthis_button_compact" href="#"><span>More</span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <section id="content">