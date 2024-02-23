<!DOCTYPE html>
<html lang="en">

<head>
    <title>Deco Dar Ziadia - About Us</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="icomoon/icomoon.css">
    <link rel="stylesheet" type="text/css" media="all"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
</head>

<body>

    
    @include('template.header')

    <section class="site-banner jarallax min-height300 padding-large" style="background: url(images/2.jpg) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">About us</h1>
                    <div class="breadcrumbs">
                        <span class="item">
                            <a href="{{ route('dashClient') }}">Home /</a>
                        </span>
                        <span class="item">About</span>
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
                        <img src="images/single-image1.png" alt="single" class="about-image">
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
                                <a href="{{ route('shop') }}" class="btn btn-dark btn-medium d-flex align-items-center"
                                    tabindex="0">Shop our store<i class="icon icon-arrow-io"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="testimonials" class="padding-large">
        <h2 class="text-center">Customer love, <br> <span>Deco</span> Dar <span>Ziadia</span></h2>
        <div class="container">
            <div class="reviews-content">
                <div class="row d-flex flex-wrap">
                    <div class="col-md-2">
                        <div class="review-icon">
                            <i class="icon icon-right-quote"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="swiper testimonial-swiper overflow-hidden">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-detail">
                                        <p>“I am very satisfied with the personalized service and above all I am very
                                            satisfied with the products... state-of-the-art equipment and world-class
                                            brands.”</p>
                                        <div class="author-detail">
                                            <div class="name">By Salwa Ben Amor</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-detail">
                                        <p>“good service with reasonable prices. good luck.”</p>
                                        <div class="author-detail">
                                            <div class="name">By Ibtihel Chouchen</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-arrows">
                            <button class="prev-button">
                                <i class="icon icon-arrow-left"></i>
                            </button>
                            <button class="next-button">
                                <i class="icon icon-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('template.footer')

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
