<!DOCTYPE html>
<html lang="en">



<head>
    <title>Deco-Dar-Ziadia -Shop Page</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   

</head>

<body>
    
    <style>
        .tooltip-text {
            display: none;
            position: absolute;
            background-color: var(--primary-color);
            color: #fff;
            padding: 5px;
            border-radius: 5px;
            margin-top: -30px;
            /* Ajustez la position verticale en fonction de votre mise en page */
            margin-left: 20px;
            /* Ajustez la position horizontale en fonction de votre mise en page */
        }

        .view-btn:hover .tooltip-text {
            display: inline-block;
        }
    </style>
    

    @include('template.header')

    <section class="site-banner jarallax min-height300 padding-large"
        style="background: url('{{ asset('images/2.jpg') }}') no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Shop</h1>
                    <div class="breadcrumbs">
                        <span class="item">
                            <a href="{{ route('dashClient') }}">Home /</a>
                        </span>
                        <span class="item">Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="selling-products" class="product-store bg-light-grey padding-large">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-title">Best selling products</h2>
                </div>
                <div class="col-md-6 text-right">
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif


                    <form class="form-inline" action="{{ route('filterByName') }}" method="get">
                        @csrf
                        <input class="form-control nav_search-input" name="name" type="text" placeholder="Search"
                            aria-label="Search">
                        <button class="btn nav_search-btn" type="submit" id="bouton-bas">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
            <ul class="tabs list-unstyled">
                <li data-tab-target="#all" class="active tab"><a href="{{ route('shop') }}">All</a></li>
                @if ($categories && count($categories) > 0)
                    @foreach ($categories as $cat)
                        <li data-tab-target="#shoes" class="tab"></li>
                        <li><a href="/products/{{ $cat->id }}" class="tab">{{ $cat->name }}</a></li>
                    @endforeach


                @endif

            </ul>
            <div class="tab-content">
                <div id="all" data-tab-content class="active">

                    <div class="row d-flex flex-wrap">

                        @if ($products && count($products) > 0)
                            @foreach ($products as $prd)
                                <div class="product-item col-lg-3 col-md-6 col-sm-6">
                                    <div class="image-holder">
                                        <img src="{{ asset('uploads') }}/{{ $prd->photo }}" alt="Books"
                                            class="product-image">
                                    </div>
                                    <div class="cart-concern">
                                        <div class="cart-button d-flex justify-content-between align-items-center">
                                            
                                            <button type="button" class="view-btn tooltid-flex">
                                                <a href="/DetailproductPage/{{ $prd->id }}}">
                                                    <i class="icon icon-screen-full"></i>
                                                </a>

                                                <span class="tooltip-text">Quick view</span>
                                            </button>
                                            <button type="button" class="wishlist-btn">
                                                <i class="icon icon-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-detail">
                                        <h3 class="product-title">
                                            <a href="#">{{ $prd->name }}</a>
                                        </h3>
                                        <div class="item-price text-primary">{{ $prd->price }} dt</div>
                                    </div>
                                </div>
                            @endforeach
                        
                            
                        @else
                        <div> No Data Founded</div>

                        @endif

                    </div>

                </div>
            </div>
        </div>
    </section>



    <hr>
    @include('template.footer')

    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
