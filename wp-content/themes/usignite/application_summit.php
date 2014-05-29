<?php
/*
Template Name: Application Summit Static Page
*/


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>US Ignite 2013</title>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/summit_style.css?v=1" media="all">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/summit/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/summit/images/apple-touch-icon.png">

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>

<div class="root">
    <header>
        <h1>USIgnite Application Summit</h1>

        <div class="info">
            <h2>Save the Date</h2>
            <p>June 24-26, 2013  &bull;  Chicago, IL</p>
        </div>
    </header>
    <main>
        <ul class="social">

            <li class="facebook"><a onClick="fbShare(); return false;" href="https://www.facebook.com/USIgnite">Share on Facebook</a></li>
            <li class="twitter"><a onClick="twitterShare(); return false;" href="https://twitter.com/US_Ignite">Tweet this</a></li>
            <li class="email"><a href="mailto:summit@us-ignite.org">Email</a></li>
        </ul>

        <p class="intro">Mark your calendar and get ready for the inaugural <br>US Ignite Application Summit - the premier event for developers, industry, communities, government, foundations and universities to gather, learn, and showcase their applications using next-generation networks.</p>

        <p>If you have any questions, would like to become an event sponsor, or have an application you think we should showcase  please contact Joe Kochan at <a href="mailto:joe.kochan@us-ignite.org">joe.kochan@us-ignite.org</a></p>


        <p>To stay up-to-date on latest development find us on <a href="https://www.facebook.com/USIgnite">Facebook</a> and <a href="https://twitter.com/US_Ignite">Twitter</a>.</p>

        <p class="notice">We will be adding additional details soon so make sure to check back often.</p>

    </main>
</div>

<script>


    function fbShare() {
        var share_url = window.location;
        var url = "http://www.facebook.com/sharer.php?s=100";
        url +="&p[url]="+encodeURIComponent(share_url);
        window.open(url, "facebook", "toolbar=no, width=550, height=550");
    }

    function twitterShare()    {
        var share_url = window.location;

        var url = "https://twitter.com/intent/tweet?url="
            + encodeURIComponent(share_url);
        window.open(url, "twitter", "toolbar=no, width=550, height=550");
    }


</script>

</body>
</html>