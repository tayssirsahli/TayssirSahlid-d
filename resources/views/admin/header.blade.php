<!DOCTYPE html>
<html lang="en">

<head>
    <title>Deco-Dar-Ziadia Home Page</title>
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

    <header id="header">
        <div id="header-wrap">
            <nav class="primary-nav padding-small">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-2 col-md-2">
                            <div class="main-logo">
                                <a class="navbar-brand" href="index.html">
                                    <strong><span>Deco </span> Dar <span> Ziadia</span> </strong>
                                </a>
                            </div>

                        </div>
                        <div class="col-lg-10 col-md-10">
                            <div>

                                <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                                    <ul class="menu-list">
                                        <li class="sidebar-item">
                                            
                                            <strong>{{ Auth()->user()->name }}</strong><br>
                                            {{ Auth()->user()->role }}
                                            
                                            
                                        </li>
                                        <li>
                                            <a class="profile-pic" href="{{ route('logout') }}">
                                                <img src="{{ asset('uploads') }}/{{ Auth()->user()->photo }}" alt="user-img" width="36"
                                                    class="img-circle" title="logout">
                                            </a>   
                                            
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{ route('profile') }}" aria-expanded="false">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                Profile
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
</body>

</html>
