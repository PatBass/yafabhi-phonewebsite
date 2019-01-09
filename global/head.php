<?php
/**
 * Created by PhpStorm.
 */
?>

<!DOCTYPE html>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, height=device-height" />
	    <link href="style/style.css" type="text/css" rel="stylesheet" />
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/dist/css/bootstrap.css" type="text/css" rel="stylesheet" />
        <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
        <script src='bootstrap/dist/js/bootstrap.js' type='text/javascript'></script>
        <script src='bootstrap/js/dropdown.js' type='text/javascript'></script>
        <script src='bootstrap/js/modal.js' type='text/javascript'></script>
        <script src='bootstrap/js/affix.js' type='text/javascript'></script>
        <script src='bootstrap/js/tooltip.js' type='text/javascript'></script>
        <script src='bootstrap/js/button.js' type='text/javascript'></script>
        <script src='bootstrap/js/tab.js' type='text/javascript'></script>
        <script src='bootstrap/js/carousel.js' type='text/javascript'></script>
	    <script src='js/menu.js' type='text/javascript'></script>
	    <script type="text/javascript" src="js/scripts.js"></script>
	    <script src="js/jquery.min.js" type="text/javascript"></script>
	    <script src="js/expand_retract.js" type="text/javascript"></script>
	    <script src="js/animated_text.js" type="text/javascript"></script>
	    <script src="js/wss_elem.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/toggle_nav_panel.js"></script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald:400,300&amp;subset=latin">
        <link href="//fonts.googleapis.com/css?family=Squada+One" rel="stylesheet" type="text/css">
        <link href="style/1200px_and_up.css" type="text/css" rel="stylesheet" media="all and (max-width:1200px)" />
        <link href="style/992px_and_up.css" type="text/css" rel="stylesheet" media="all and (max-width:992px)" />
        <link href="style/768px_and_up.css" type="text/css" rel="stylesheet" media="all and (max-width:768px)" />
        <link href="style/up_to_480px.css" type="text/css" rel="stylesheet" media="all and (max-width:480px)" />
        <title>Yafabhi™</title>

	</head>
    <body>
        <div id="container container-modified" style="overflow: hidden;"> <!-- Previous: <div id="wrapper"> -->

            <header id="topbar" class="row">
                <div id="logo" class="col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-2 col-xs-offset-1 col-xs-2">

                </div>
                <nav id="navbar" class="col-md-offset-4 col-md-5 col-md-push-1 col-sm-offset-4 col-sm-5 col-sm-push-1 col-xs-offset-4 col-xs-5 col-xs-push-1">

                    <div id="nav">
                        <div id="nav1">
                            <ul>
                                <li <?php if($nav_en_cours =='home'){echo 'class="active"';}  ?>><a href="index.php"><span>Home</span></a></li>
                                <li>|</li>
                                <li <?php if($nav_en_cours =='log_in'){echo 'class="active"';}  ?>><a href="http://yafabhi.com/2_plan_team2/index.php?mode=logout"><span>Log In</span></a></li>
                                <li>|</li>
                                <li <?php if($nav_en_cours =='careers'){echo 'class="active"';}  ?>><a href="?module=careers&amp;action=careers_show"><span>Careers</span></a></li>
                                <li>|</li>
                                <li <?php if($nav_en_cours =='distributor_login'){echo 'class="active"';}  ?>><a href="http://yafabhi.com/shop/index.php?module=cart&amp;action=distributor_login" title="Distributor Login"><span>Distributor Login</span></a></li>
                            </ul>
                        </div>
                        <div id="nav2">
                            <ul>
                                <li <?php if($nav_en_cours =='about'){echo 'class="active"';}  ?>><a href="?module=about&amp;action=about_show"><span>About</span></a></li>
                                <li onclick="toggleNavPanel('toggleDiv');" title="Just Click" <?php if($nav_en_cours =='products'){echo 'class="active"';}  ?>> <a class="prod"><span title="Just Click">Products</span></a><span id="navArrow"><img src="images/icon-nav-down-arrow.png" /></span></li>
                                <li <?php if($nav_en_cours =='support'){echo 'class="active"';}  ?>><a href="?module=support&amp;action=support_show"><span>Support</span></a></li>
                                <li <?php if($nav_en_cours =='contact'){echo 'class="active"';}  ?>><a href="?module=contact&amp;action=contact_show"><span>Contact</span></a></li>
                                <li><a href="http://yafabhi.com/shop/index.php">Shop</a> </li>
                            </ul>
                        </div>
                    </div>

                </nav>
            </header>
            <hr>










