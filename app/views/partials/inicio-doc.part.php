<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Azenta Template">
    <meta name="keywords" content="Azenta, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Azenta | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">

    <!-- Css Styles -->

    <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";?>
    <link rel="stylesheet" href="<?php echo $actual_link;?>/public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/public/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/public/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/public/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/public/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/public/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/public/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/public/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/public/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/public/css/style.css" type="text/css">


</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="canvas-open">
    <i class="icon_menu"></i>
</div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="icon_close"></i>
    </div>

    <nav class="main-menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="property.php">Property</a></li>
            <li><a href="about-us.php">Agets</a></li>
            <li><a href="blog.php">News</a></li>
            <li><a href="property-details.php">Pages</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
    <div class="nav-logo-right">
        <ul>
            <li>
                <i class="icon_phone"></i>
                <div class="info-text">
                    <span>Phone:</span>
                    <p>(+12) 345 6789</p>
                </div>
            </li>
            <li>
                <i class="icon_map"></i>
                <div class="info-text">
                    <span>Address:</span>
                    <p>16 Creek Ave, <span>SPAIN</span></p>
                </div>
            </li>
            <li>
                <i class="icon_mail"></i>
                <div class="info-text">
                    <span>Email:</span>
                    <p>Info.cololib@gmail.com</p>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- Offcanvas Menu Section End -->
