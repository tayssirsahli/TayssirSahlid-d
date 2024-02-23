<!DOCTYPE html>
<html lang="en">

<head>
    <title>Deco-Dar-Ziadia </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('icomoon/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" media="all"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <script src="{{ asset('js/modernizr.js') }}"></script>
    <style>
        footer {
            background-color: #ffffff;
            padding: 20px 0;
        }
    </style>
</head>

<body>
    <footer class="justify-content-center">
        <div id="footer-bottom">
            <div class="container">
                <div class="d-flex align-items-center flex-wrap justify-content-between">
                    <div class="copyright">
                        <p class="copyright-text  mt-lg-5 mb-4 mb-lg-0">Copyright © 2024 by<strong> Tayssir
                                Sahli</strong></p>

                        </p>
                    </div>
                    
                    <div>
                        <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                            <ul class="menu-list">
                                <li class="menu-item has-sub">
                                    <a href="{{ route('shop') }}"
                                        class="item-anchor d-flex align-item-center active-link"
                                        data-effect="Shop">siteMap<i class="icon icon-chevron-down"></i></a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="{{ route('dashClient') }}"
                                                class="item-anchor d-flex align-item-center active-link"data-effect="Home">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('about') }}"
                                                class="item-anchor d-flex align-item-center active-link"
                                                data-effect="About">About</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('contact') }}"
                                                class="item-anchor d-flex align-item-center active-link"
                                                data-effect="Contact">Contact</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('shop') }}"
                                                class="item-anchor d-flex align-item-center active-link" data-effect="Shop">Shop
                                            </a>
                                        </li>

                                    </ul></li>
                                </li>
                            </ul>
                        </div>


                    </div>

                    <div>
                        <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                            <ul class="menu-list">
                                <li class="menu-item has-sub">
                                    <a href="{{ route('shop') }}"
                                        class="item-anchor d-flex align-item-center active-link"
                                        data-effect="Shop">contact<i class="icon icon-chevron-down"></i></a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="mailto:decodarziadia@example.com" class="icon icon-mail" title="email">decodarziadia@example.com</a>

                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/decodarDD/?locale=fr_FR" class="icon icon-facebook" title="facebook">facebook </a>
                                        </li>
                                        

                                    </ul>
                                </li>
                            </ul>
                        </div>

                        
                    </div>
                    <div>
                        <a href="#"><i class="icon icon-phone"></i>+216 29148149 // +216 29148098</a>
                    </div>

                </div>

            </div>
        </div>
    </footer>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
