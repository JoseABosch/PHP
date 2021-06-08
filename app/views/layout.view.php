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
    <link rel="stylesheet" href="<?php echo $actual_link;?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $actual_link;?>/css/style.css" type="text/css">

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
    <div class="language-bar">
        <div class="language-option">
            <img src="img/flag.png" alt="">
            <span>English</span>
            <i class="fa fa-angle-down"></i>
            <div class="flag-dropdown">
                <ul>
                    <li><a href="#">English</a></li>
                    <li><a href="#">Germany</a></li>
                    <li><a href="#">China</a></li>
                </ul>
            </div>
        </div>
        <div class="property-btn">
            <a href="#" class="property-sub">Submit Property</a>
        </div>
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
                    <p>16 Creek Ave, <span>NY</span></p>
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

<?php use DWES\app\helpers\Utils; ?>
<!-- Header Section Begin -->
<header class="header-section header-normal">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <nav class="main-menu">
                        <ul>
                            <li class="<?= Utils::isOpcionMenuActiva('index') ? 'active' : '' ?>">
                                <a href="/">Inicio</a>
                            </li>
                            <li class="<?= Utils::isOpcionMenuActiva('viviendas') ? 'active' : '' ?>">
                                <a href="/viviendas">Viviendas</a>
                            </li>
                            <li class="<?= Utils::isOpcionMenuActiva('property-details') ? 'active' : '' ?>">
                                <a href="/property-details">Nosotros</a>
                            </li>
                            <li class="<?= Utils::isOpcionMenuActiva('contact') ? 'active' : '' ?>">
                                <a href="/contact">Mensajes</a>
                            </li>
                        <?php if(!is_null($_usuario)) : ?>
                            <li class="<?= Utils::isOpcionMenuActiva('logout') ? 'active' : '' ?>">
                                <a title = "logout" href="/logout"><?= $_usuario->getUsername() ?>  <i class="fa fa-sign-out sr-icons"></i></a>
                            </li>
                        <?php else : ?>
                            <li class="<?= Utils::isOpcionMenuActiva('login') ? 'active' : '' ?>">
                                <a href="/login">Login</a>
                            </li>
                            <li class="<?= Utils::isOpcionMenuActiva('registro') ? 'active' : '' ?>">
                                <a href="/registro">Registro</a>
                            </li>
                        <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-5">
                    <div class="top-right">
                        <div class="language-option">
                            <img src="img/flag.png" alt="">
                            <span>English</span>
                            <i class="fa fa-angle-down"></i>
                            <div class="flag-dropdown">
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Germany</a></li>
                                    <li><a href="#">China</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-logo">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9">
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
                                    <p>16 Creek Ave, <span>NY</span></p>
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
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<?= $mainContent; ?>

<!-- Partner Carousel Section Begin -->
<div class="partner-section">
    <div class="container">
        <div class="partner-carousel owl-carousel">
            <a href="#" class="partner-logo">
                <div class="partner-logo-tablecell">
                    <img src="img/partner/partner-1.png" alt="">
                </div>
            </a>
            <a href="#" class="partner-logo">
                <div class="partner-logo-tablecell">
                    <img src="img/partner/partner-2.png" alt="">
                </div>
            </a>
            <a href="#" class="partner-logo">
                <div class="partner-logo-tablecell">
                    <img src="img/partner/partner-3.png" alt="">
                </div>
            </a>
            <a href="#" class="partner-logo">
                <div class="partner-logo-tablecell">
                    <img src="img/partner/partner-4.png" alt="">
                </div>
            </a>
            <a href="#" class="partner-logo">
                <div class="partner-logo-tablecell">
                    <img src="img/partner/partner-5.png" alt="">
                </div>
            </a>
        </div>
    </div>
</div>
<!-- Partner Carousel Section End -->

<!-- Footer Section Begin -->
<footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
    <div class="container">
        <div class="footer-text">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-logo">
                        <div class="logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <p>Subscribe our newsletter gor get notification about new updates.</p>
                        <form action="#" class="newslatter-form">
                            <input type="text" placeholder="Enter your email...">
                            <button type="submit"><i class="fa fa-location-arrow"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h4>Social</h4>
                        <ul class="social">
                            <li><i class="ti-facebook"></i> <a href="#">Facebook</a></li>
                            <li><i class="ti-instagram"></i> <a href="#">Instagram</a></li>
                            <li><i class="ti-twitter-alt"></i> <a href="#">Twitter</a></li>
                            <li><i class="ti-google"></i> <a href="#">Google+</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>Contact Us</h4>
                        <ul class="contact-option">
                            <li><i class="fa fa-map-marker"></i> 16 Creek Ave. Farming, NY</li>
                            <li><i class="fa fa-phone"></i> (+88) 666 121 4321</li>
                            <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
                            <li><i class="fa fa-clock-o"></i> Mon - Sat, 08 AM - 06 PM</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-text">
            <p><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></p>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
?>
<script src="<?php echo $actual_link;?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo $actual_link;?>/js/bootstrap.min.js"></script>
<script src="<?php echo $actual_link;?>/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo $actual_link;?>/js/jquery.nice-select.min.js"></script>
<script src="<?php echo $actual_link;?>/js/jquery.slicknav.js"></script>
<script src="<?php echo $actual_link;?>/js/jquery-ui.min.js"></script>
<script src="<?php echo $actual_link;?>/js/owl.carousel.min.js"></script>
<script src="<?php echo $actual_link;?>/js/main.js"></script>
</body>

</html>

