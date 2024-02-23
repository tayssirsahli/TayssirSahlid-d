<!DOCTYPE html>
<html lang="en">



<head>
    <title>Deco-Dar-Ziadia -Home Page</title>
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

    <section id="billboard" class="overflow-hidden">

        <button class="button-prev">
            <i class="icon icon-chevron-left"></i>
        </button>
        <button class="button-next">
            <i class="icon icon-chevron-right"></i>
        </button>
        <div class="swiper main-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"
                    style="background-image: url('{{ asset('images/1.jpg') }}');background-repeat: no-repeat;background-size: cover;background-position: center;">
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide"
                    style="background-image: url('{{ asset('images/2.jpg') }}');background-repeat: no-repeat;background-size: cover;background-position: center;">
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">


                                </div>
                            </div>
                        </div>
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
                
            </div>
            
            <div class="tab-content">
                <div id="all" data-tab-content class="active">
    
                    <div class="row d-flex flex-wrap">
                        @if (count($products) > 0)
                            @foreach ($products->take(4) as $prd)
                                <div class="product-item col-lg-3 col-md-6 col-sm-6">
                                    <div class="image-holder">
                                        <img src="{{ asset('uploads') }}/{{ $prd->photo }}" alt="Books"
                                            width="100" height="100" class="product-image">
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
                                            <a href="single-product.html">{{ $prd->name }}</a>
                                        </h3>
                                        <div class="item-price text-primary">{{ $prd->price }} dt</div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
    
                </div>
            </div>
        </div>
    </section>
    
    <section id="about-us">
        <div class="container ">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="image-holder">
                        <img src="{{ asset ('images/single-image1.png') }}" alt="single" class="about-image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="detail">
                        <div class="display-header">
                            <h2 class="section-title">About Deco Dar Ziadia </h2>
                            <p>Company specializing in the sale of household appliances;
                                Dressing and Cupboard Equipment; Sink, mixers;
                                 Kitchen storage; Furniture hardware...
                                <br>
                                
                            </p>
                            
                            <div class="btn-wrap">
                                <a href="{{ route('about') }}" class="btn btn-dark btn-medium d-flex align-items-center"
                                    tabindex="0">Now more<i class="icon icon-arrow-io"></i>
                                </a>
                            </div>
                        </div>
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
