<!DOCTYPE html>
<html lang="en">

<head>
    
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

</head>

<body>
    <style>
        header {
            background-color: #ffffff;
            padding: 20px 0;
        }

        .active-link:active,
        .active-link:focus,
        .active-link:hover,
        .active-hover {
            color: #a40606;
            font-weight: bold;
        }
    </style>

    <header id="header">
        <div id="header-wrap">
            <nav class="primary-nav padding-small">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-2 col-md-2">
                            <div class="main-logo">
                                <a class="navbar-brand" href="{{ route('dashClient') }}">
                                    <strong><span>Deco </span> Dar <span> Ziadia</span> </strong>
                                </a>
                            </div>

                        </div>
                        <div class="col-lg-10 col-md-10">
                            <div>

                                <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                                    <ul class="menu-list">

                                        <li>
                                            <a href="{{ route('dashClient') }}"
                                                class="item-anchor d-flex align-item-center active-link"
                                                data-effect="Home">Home</a>

                                        </li>

                                        <li><a href="{{ route('about') }}"
                                                class="item-anchor d-flex align-item-center active-link"
                                                data-effect="About">About</a></li>

                                        <li><a href="{{ route('contact') }}"
                                                class="item-anchor d-flex align-item-center active-link"
                                                data-effect="Contact">Contact</a></li>


                                        <li class="menu-item has-sub">
                                            <a href="{{ route('shop') }}"
                                                class="item-anchor d-flex align-item-center active-link"
                                                data-effect="Shop">Shop<i class="icon icon-chevron-down"></i></a>
                                            <ul class="submenu">
                                                @if ($categories && count($categories) > 0)
                                                    @foreach ($categories as $cat)
                                                        <li><a href="/products/{{ $cat->id }}"
                                                                class="item-anchor active-link">{{ $cat->name }}</a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>

                                        @auth
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    class="item-anchor d-flex align-item-center active-link"
                                                    data-effect="logout">
                                                    <i class="icon icon-user" title="logout"></i>
                                                </a>
                                            </li>
                                            @if (Auth()->user()->role === 'admin')
                                                <li>
                                                    <a href="{{ route('dashboard') }}"
                                                        class="item-anchor d-flex align-item-center active-link"
                                                        data-effect="dashboard">
                                                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (Auth()->user()->role === 'user')
                                                <li>

                                                    <a href="{{ route('panier') }}"
                                                        class="item-anchor d-flex align-item-center active-link"
                                                        data-effect="panier" title="shopping cart">
                                                        <i class="icon icon-shopping-cart"></i>
                                                        @if($orderCount>=0)
                                                            <span>{{ $orderCount }}</span>
                                                        @endif
                                                    </a>  
                                                </li>
                                            @endif
                                            
                                        
                                        @else
                                            <li>
                                                <a href="{{ route('login') }}"
                                                    class="item-anchor d-flex align-item-center active-link"
                                                    data-effect="login">
                                                    <i class="icon icon-user" title="login"></i>
                                                </a>
                                            </li>

                                        @endauth
                                        <li class="user-items search-item pe-3">

                                            <a href="/shop#bouton-bas" class="search-button"
                                                class="item-anchor d-flex align-item-center active-link"
                                                data-effect="search">
                                                <i class="icon icon-search"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        const activeLinks = document.querySelectorAll('.active-link');

        activeLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                const hasActiveHover = this.classList.contains('active-hover');

                if (!hasActiveHover) {
                    this.classList.add('active-hover');

                    return true;
                }

                event.preventDefault();
            });
        });
    </script>




</body>

</html>
