<!DOCTYPE html>
<html lang="en">
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
	<?php
		wp_head();
?>
	<script type="text/javascript" src="/assets/v3/javascript/head.js"></script>
	<script type="text/javascript">head.js(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
		'/assets/v3/javascript/extras.js?v=2',
		'/assets/v3/javascript/scripts.js?v=2'
	);</script>

	<script type="text/javascript" src="/assets/v3/javascript/twitter.js?v=2"></script>
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" />
	<link rel="stylesheet" type="text/css" href="/assets/v3/styles/screen.css?v=3" media="screen" />
	<link rel="stylesheet" type="text/css" href="/assets/v3/styles/print.css?v=2" media="print" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-40470323-1', 'us-ignite.org');
    ga('send', 'pageview');

  </script>
</head>
<body class="<?=( is_front_page() )? 'home' : 'subs'  ?>">
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
  <div id="root">
  	<header id="top">
  		<h1 id="logo"><a href="/" accesskey="h"><img src="/assets/v3/images/logo-a.png" width="213" height="54" alt="USIgnite" /></a></h1>
  		<nav id="skips">
  			<ul>
  				<li><a href="#nav" accesskey="n">Skip to navigation [n]</a></li>
  				<li><a href="#content" accesskey="c">Skip to content [c]</a></li>
  				<li><a href="#footer" accesskey="f">Skip to footer [f]</a></li>
  			</ul>
  		</nav>
  		<nav id="nav">			
  			<h2 class="offset">Navigation</h2>
  			<style type="text/css" media="screen">
  			 #menu-navv3 .sub-menu {
  			   display:none;
  			 }
  			</style>
  			<?php wp_nav_menu(array('menu'=>'navV3'));?>
  			<!--ul>
  				<li><a href="/what-is-us-ignite" accesskey="1">Our Mission</a><em> [1]</em></li>
  				<li><a href="/city-stories" accesskey="2">City Stories</a><em> [2]</em></li>
  				<li><a href="/next-gen-applications/" accesskey="3">Next Gen Applications</a><em> [3]</em></li>
  				<li><a href="/next-gen-networks/" accesskey="4">Next Gen Networks</a><em> [4]</em></li>
  				<li><a href="/news/" accesskey="5">News &amp; Events</a><em> [5]</em></li>
  				<li><a href="/get-involved/" accesskey="6">Get Involved</a><em> [6]</em></li>
  			</ul-->
  		</nav>
  		<div class="connect a">
        <p>Share us:</p>
        <ul class="addthis_toolbox" style="margin-right: 10px;">
          <li class="facebook"><a class="addthis_button_facebook">Facebook</a></li>
          <li class="twitter"><a class="addthis_button_twitter" href="#">Twitter</a></li>
          <li class="add"><a class="addthis_button_compact" href="#">Add</a></li>
          <li class="email"><a class="addthis_button_email" href="#">Email</a></li>
        </ul>
      </div>
      <div class="connect b">
        <p>Connect With Us:</p>
        <ul class="" style="margin-right: 10px;">
          <li class="facebook"><a href="http://www.facebook.com/USIgnite" rel="external">Facebook</a></li>
          <li class="twitter"><a  href="http://twitter.com/US_Ignite" rel="external">Twitter</a></li>
        </ul>
        <script src="https://apis.google.com/js/plusone.js"></script>
        <div class="g-ytsubscribe" data-channel="USIgnite1" data-layout="default" style="float: left;"></div>
      </div>
  	</header><!-- #top -->

