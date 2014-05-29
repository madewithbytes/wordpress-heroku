<?php
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="<?php get_bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
<title><?php
	global $page, $paged;
	
	wp_title( '|', true, 'right' );
	// Add the blog name.
	bloginfo( 'name' );
	?></title>
	
	<?php if ( ( is_home() || is_front_page() ) ){ ?>
	<meta name="description" content="<?php echo get_bloginfo('description', 'display'); ?>">
	<?php } ?>
	
	<meta name="author" content="Megan Zlock, iStrategyLabs">
	<!--<meta name="viewport" content="width=device-width,initial-scale=1">-->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<script type="text/javascript" src="http://use.typekit.com/wdt5usy.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

		<!-- Load the default style sheet for Safari, Chrome, Firefox, Opera, and IE 9. -->
	<!--[if ! lt IE 9]><!-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<!--<![endif]-->

		<!-- Load the legacy stylesheet for IE 7 and 8 when javascript is disabled. -->
	<!--[if lt IE 9]>
		<noscript>
   			<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		</noscript>
	<![endif]-->

		<!-- Load default stylesheet for IE 7 and 8 with javascript enabled. -->
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<script>
   			(function() {
      			var link = document.createElement("link");
      			link.rel = "stylesheet";
      			link.href = "<?php bloginfo( 'stylesheet_url' ); ?>";
      			document.getElementsByTagName("head")[0].appendChild(link);
   			})();
		</script>
	<![endif]-->

	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-2.0.6.min.js"></script>

	<?php
		wp_head();
?>

</head>

<body <?php body_class(); ?>>
	<section id="page" class="hfeed">
		<p class="enableScript">This page is currently styled for legacy browsers with javascript disabled.  For the best experience, enable scripts in your browser settings.</p>

	<header id="branding" role="banner">
			<hgroup>
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
			</hgroup>
 
			<nav id="access" role="navigation">
        
				<h3 class="assistive-text"><?php _e( 'Main menu', 'usignite' ); ?></h3>
				
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'usignite' ); ?>"><?php _e( 'Skip to primary content', 'usignite' ); ?></a></div>
				
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'usignite' ); ?>"><?php _e( 'Skip to secondary content', 'usignite' ); ?></a></div>
				
			
				<?php wp_nav_menu(array('menu'=>'newnav'));?>
				<!-- test -->
			</nav><!-- #access -->
	</header><!-- #branding -->


	<div id="main" role="main">