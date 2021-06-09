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
                            <li class="<?= Utils::isOpcionMenuActiva('blog') ? 'active' : '' ?>">
                                <a href="/blog">Libros</a>
                            </li>
                            <li class="<?= Utils::isOpcionMenuActiva('property-details') ? 'active' : '' ?>">
                                <a href="/property-details">Nosotros</a>
                            </li>
                            <li class="<?= Utils::isOpcionMenuActiva('contact') ? 'active' : '' ?>">
                                <a href="/contact">Contacto</a>
                            </li>
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
                                    <li><a href="#">Español</a></li>
                                    <li><a href="#">Inglés</a></li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="property-sub">Submit Property</a>
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
                                    <span>FER la hostia:</span>
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
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
