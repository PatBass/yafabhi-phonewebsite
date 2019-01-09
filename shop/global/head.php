<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 5/27/14
 * Time: 8:14 PM
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, height=device-height" />
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../docsassets/ico/favicon.png">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
        <link href="css/style.css" type="text/css" rel="stylesheet" />
        <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="starter-template.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald:400,300&amp;subset=latin">
        <link href="//fonts.googleapis.com/css?family=Squada+One" rel="stylesheet" type="text/css">
        <link href="style/1200px_and_up.css" type="text/css" rel="stylesheet" media="all and (max-width:1200px)" />
        <link href="style/992px_and_up.css" type="text/css" rel="stylesheet" media="all and (max-width:992px)" />
        <link href="style/768px_and_up.css" type="text/css" rel="stylesheet" media="all and (max-width:768px)" />
        <link href="style/up_to_480px.css" type="text/css" rel="stylesheet" media="all and (max-width:480px)" />
        <title>Yafabhi Store</title>

    </head>
    <body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container container-modified">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><font style="color:#d27226;font-size: 150%;">Yafabhi Store</font></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="http://yafabhi.com/index.php"><span>Site Home</span></a></li>
                        <li <?php if($running_page =='shop'){echo 'class="active"';}  ?>><a href="index.php#products_list"><span>Shop</span></a></li>
                        <li <?php if($running_page =='cart'){echo 'class="active"';}  ?> ><a href="?module=cart&amp;action=cart_processing"><span>Cart</span></a></li>
                        <li <?php if($running_page =='contact'){echo 'class="active"';}  ?>><a href="http://yafabhi.com/index.php?module=contact&action=contact_show"><span>Contact</span></a></li>

                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <div class="container container-modified">












