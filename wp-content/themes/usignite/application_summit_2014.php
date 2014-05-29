<?php
/*
Template Name: Application Summit 2014
*/
/* this template inherits styles and images from the template application_summit.php */

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php
      global $page, $paged;

      wp_title( '|', true, 'right' );
      // Add the blog name.
      bloginfo( 'name' );
      ?></title>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/summit_style.css?v=1" media="all">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/summit/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/summit/images/apple-touch-icon.png">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <![endif]-->
    <style type="text/css" media="screen">
      /* overwrites for the 2014 version */
      body {background-image:url("<?php echo get_template_directory_uri(); ?>/images/summit/bg-2014.jpg"); background-color:#00c2e4;}
      body, textarea, input, select, option, button {color:#636363; font-size:16px;}
      .root {
           background: none repeat scroll 0% 0% #fff;
           border-radius: 0px;
           margin: 95px auto;
           position: relative;
           width: 660px;
      }
      header {
        margin:0;
        padding:60px 0 0;
      }
      h1 {
        width:557px;
        height:135px;
        margin: 0 auto;
        background-position:0 0;
      }
      .info {
        background: transparent url("<?php echo get_template_directory_uri(); ?>/images/summit/general_2014.png") 0 -135px no-repeat;
        height:130px;
        width:557px;
        margin:0 auto;
        border:0;
      }
      .info h2,
      .info p {display:none;}
      .general-sprite, h1, .info h2, .social li.facebook a, .social li.twitter a, .social li.email a {
        background-image:url("<?php echo get_template_directory_uri(); ?>/images/summit/general_2014.png");
      }
      .social li {
        margin:0;
      }
      .social li a {
        width:169px !important;
      }
      .social li.facebook a {
        background-position:0 -265px;
      }
      .social li.facebook a:hover {
        background-position:0 -309px;
      }
      .social li.twitter {margin:0 25px}
      .social li.twitter a {
        background-position:0 -353px;
      }
      .social li.twitter a:hover {
        background-position:0 -397px;
      }
      .social li.email a {
        background-position:0 -441px;
      }
      .social li.email a:hover {
        background-position:0 -485px;
      }
      a,
      a:link,
      a:visited,
      a:hover {color:#00c2e4;}
      h3, p.intro {
        color:#282828;
        font-size:22px;
        font-weight:normal;
      }
    </style>
    <meta property="og:title" content="US Ignite Application Summit"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?=the_permalink();?>"/>
    <meta property="og:site_name" content="US Ignite"/>
    <meta property="og:description" content="Interested in next-gen technologies? Join me at the US Ignite Application Summit in Silicon Valley, June 24-27! - http://bit.ly/usisummit14"/>
    <meta property="og:image" content="http://www.us-ignite.org/wp-content/themes/usignite/images/USIgnite-AppSummit-SavetheDate-Share-70zxi.jpg"/>
</head>
<body>
<div class="root">
    <header>
        <h1>US Ignite Application Summit</h1>
        <div class="info">
            <h2>Save the Date</h2>
            <p>June 24-27, 2014  &bull;  Silicon Valley, CA</p>
        </div>
    </header>
    <main>
        <ul class="social">
            <li class="facebook"><a onClick="fbShare(); return false;" href="https://www.facebook.com/USIgnite">Share on Facebook</a></li>
            <li class="twitter"><a onClick="twitterShare(); return false;" href="https://twitter.com/US_Ignite">Tweet this</a></li>
            <li class="email"><a href="mailto:summit@us-ignite.org">Email</a></li>
        </ul>
        <p class="intro">Join us for this year’s US Ignite Application Summit in Silicon Valley, as we bring together the top minds in next-generation technology and show you the future of the Internet.</p>
        <p>This event is a great opportunity for innovative developers, entrepreneurs, technology companies, forward-thinking communities, leading university researchers, students, and federal agency leaders that are interested in showcasing, networking, and learning about advanced technologies. These technologies include software defined networks (SDN), local cloud computing, and symmetric gigabit speeds to end-users. We will demonstrate how these new technologies are transforming how we work, live, learn, and play.</p>
        <h3>Get Involved</h3>
        <p>To learn more about the event, submit your application, or get your organization involved, contact Joe Kochan at  <a href="mailto:joe.kochan@us-ignite.org">joe.kochan@us-ignite.org</a></p>
        <p>To learn more about US Ignite, visit <a href="http://www.us-ignite.org" target="_blank">www.us-ignite.org</a>, <a target="_blank" href="https://www.facebook.com/USIgnite">Facebook</a>, <a href="https://twitter.com/US_Ignite" target="_blank">Twitter</a> or <a href="https://plus.google.com/u/2/b/115026873083967953743/115026873083967953743/posts" target="_blank">Google+</a>. To see highlights from last year’s event visit <a href="http://bit.ly/1by9yc4" target="_blank">YouTube</a>.</p>
    </main>
</div>
<script>
    function fbShare() {
        var share_url = 'http://us-ignite.org/applicationsummit/';
        var url = 'http://www.facebook.com/sharer.php?u=' + encodeURIComponent(share_url);
        window.open(url, "facebook", "toolbar=no, width=550, height=550");
    }
    function twitterShare()    {
        var share_url = 'http://us-ignite.org/applicationsummit/';
        var share_count_url = 'http://bit.ly/usisummit14';
        var tweet = encodeURIComponent('I\'m going to the @US_Ignite App summit 2014 - join me! #appsummit14');
        var url = "https://twitter.com/intent/tweet?text="+tweet+"&counturl="+share_count_url+"&url="+ encodeURIComponent(share_url);
        window.open(url, "twitter", "toolbar=no, width=550, height=550");
    }
</script>
</body>
</html>