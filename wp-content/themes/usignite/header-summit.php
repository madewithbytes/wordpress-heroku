<!DOCTYPE html>
<!--[if lte IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php
    global $page, $paged;
    wp_title( '|', true, 'right' );
    // Add the blog name.
    bloginfo( 'name' );
    ?></title>

  <?php if ( ( is_home() || is_front_page() ) ){ ?>
    <meta name="description" content="<?php echo get_bloginfo('description', 'display'); ?>">
  <?php } ?>
  <meta name="keywords" content="" />
  <meta name="viewport" content="width=1240">
  <?php wp_head(); ?>

<script type="text/javascript" src="<?php echo home_url(); ?>/assets/v3/javascript/head.js"></script>

  <script type="text/javascript">head.js(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
		'<?php echo home_url(); ?>/assets/summit/javascript/scripts.min.js'
	);</script>

    <script type="text/javascript" src="<?php echo home_url(); ?>/assets/v3/javascript/twitter.js?v=2"></script>


  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

  <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,400italic|Asap:700' rel='stylesheet'>
  <link rel="stylesheet" href="<?php echo home_url(); ?>/assets/summit/styles/screen.css?v=1" media="screen">
  <link rel="stylesheet" href="<?php echo home_url(); ?>/assets/summit/styles/print.css?v=1" media="print">
  <link rel="shortcut icon" href="<?php echo home_url(); ?>/assets/summit/images/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo home_url(); ?>/assets/summit/images/apple-touch-icon.png">

  <meta name="viewport" content="width=1240">
  
  <script>(function(){var h=document.documentElement;h.className=h.className.replace(/no-js/,'js');}());</script>
  
  <!--[if lt IE 9]>
  <script src="<?php echo home_url(); ?>/assets/summit/javascript/html5shiv.js"></script>
  <![endif]-->

  <style type="text/css" media="screen">
    p.addthis_pill_combo {
      margin:1em 0;
    }

    .addthis_toolbox.addthis_pill_combo a {
      float: left;
    }

    .addthis_toolbox.addthis_pill_combo a.addthis_button_tweet,
    .addthis_toolbox.addthis_pill_combo a.addthis_counter {

    }

    .addthis_button_compact .at15t_compact {
      margin-right: 4px;
      float: left;
    }
  </style>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-40470323-1', 'us-ignite.org');
    ga('send', 'pageview');

  </script>
</head>

<body>
  <div class="wrapper-signup">

    <form action="/wp-content/themes/usignite/inc/signup-validate.php" method="get"  class="signup">
      <fieldset>
      <h2>Sign up for Event Details</h2>
      <p>
        <label for="email" id="address-label">Enter your email address</label>
        <span id="response">
          <?php if(isset($_SESSION['err']) && (strlen($_SESSION['err']) > 0)){
                      echo $_SESSION['err'];
                  }else if(isset($_SESSION["thanks"])){
                      echo $_SESSION["thanks"];
                  }
            require_once('inc/store-address.php'); if($_GET['submit']){ echo storeAddress(); } ?>
          </span>
        <input type="text" name="email" id="email" placeholder="Enter your email address" required />
        <button type="submit" name="submit" alt="submit">Submit</button
      </p>
      </fieldset>
    </form>

  </div>
  <div class="wrapper-a">
    <div class="wrapper-top">
      <header class="top">
        <div class="logo"><a href="<?php echo home_url(); ?>/applicationsummit" accesskey="h"><img src="<?php echo home_url(); ?>/assets/summit/images/logo.svg" alt="US Ignite Application Summit" width="472" height="83"></a></div>
        <nav class="skips">
          <ul>
            <li><a href="#nav" accesskey="n">Skip to navigation [n]</a></li>
            <li><a href="#content" accesskey="c">Skip to content [c]</a></li>
            <li><a href="#footer" accesskey="f">Skip to footer [f]</a></li>
          </ul>
        </nav>
        <nav class="nav-main">     
          <h2 class="offset">Navigation</h2>
          <?php wp_nav_menu(array('menu'=>'summit'));?>
        </nav>
      <div class="social-a">
        <h3>Connect With Us:</h3>
        <ul id="connect" class="addthis_toolbox">
          <li class="facebook"><a class="addthis_button_facebook">Facebook</a></li>
          <li class="twitter"><a class="addthis_button_twitter" href="#">Twitter</a></li>
          <li class="add"><a class="addthis_button_compact" href="#">Add</a></li>
          <li class="email"><a class="addthis_button_email" href="#">Email</a></li>
        </ul>
        <h3>Go to:</h3> 
        <p><a href="<?php echo home_url(); ?>"><img src="<?php echo home_url(); ?>/assets/summit/images/logo-small.png" width="86" height="22" alt="USIgnite"></a></p>
      </div>
      </header>
    </div>


