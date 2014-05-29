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
	<script type="text/javascript" src="/assets/v3/javascript/head.js"></script>
	<script type="text/javascript">head.js(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
		'/assets/v3/javascript/extras.js?v=2',
		'/assets/v3/javascript/scripts.js?v=2'
	);</script>

	<script type="text/javascript" src="/assets/v3/javascript/twitter.js?v=2"></script>

	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" />
	<link rel="stylesheet" type="text/css" href="/assets/v3/styles/screen.css?v=2" media="screen" />
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
<body>

