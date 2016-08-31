<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>still frame design</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Hind:300,400,500,600,700" rel="stylesheet">


    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>

    <script>
        // Picture element HTML5 shiv (required by picturefill.js)
        document.createElement( "picture" );

        //Allows content to be hidden while loading if javascript is enabled
        document.documentElement.className = 'jsEnabled';
    </script>

    <!-- for serving responsive images -->
    <script src="js/vendor/picturefill.min.js" async></script>

</head>
<body>

<!--[if lt IE 8]>
<p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="http://browsehappy.com/">upgrade your browser</a>
    to improve your experience.
</p>
<![endif]-->

<!-- site Navigation -->
    <a href="index.php" class="a-index">
        <div class="div-logo can-change-color">
            <!-- fall back logo if javascript is disabled -->
            <img src="img/fallback_logo.png" class="img-logo" id="img-logo-fallback"/>

            <!-- white or purple logo displayed based on the content it sits on top of -->
            <img src="img/logo_purple.png" class="img-logo hidden" id="img-logo-purple"/>
            <img src="img/logo_white.png" class="img-logo hidden" id="img-logo-white"/>
        </div>
    </a>

    <a href="contact.php" class="a-contact">
        <div class="div-contact-button font-dark">
            <span class="line line01"></span>
            <span class="line line02"></span>
            <span class="line line03"></span>
            <span class="text">contact</span>
        </div>
    </a>
<!-- end navigation -->


<!--    when javascript enabled,
        ajax is used to populate these placeholders on navigation -->
<div id="div-contact-placeholder"></div>
<div id="div-project-placeholder"></div>

<!-- this div is closed in foot.php -->
<div id="div-main-container">