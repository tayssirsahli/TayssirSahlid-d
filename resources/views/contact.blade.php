<!DOCTYPE html>
<html lang="en">

<head>
    <title>Deco Dar Ziadia - Contact</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>

</head>

<body>

    @include('template.header')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="site-banner jarallax padding-large"
        style="background: url(images/2.jpg) no-repeat; background-position: top;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Contact us</h1>
                    <div class="breadcrumbs">
                        <span class="item">
                            <a href="{{ route('dashClient') }}">Home /</a>
                        </span>
                        <span class="item">Contact us</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-information padding-large">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-header">
                        <h2 class="section-title">Get in touch</h2>
                    </div>
                    <div class="contact-detail">
                        <div class="detail-list">
                            <h2 class="mb-4">Let's <span>begin</span></h2>
                            <ul class="list-unstyled list-icon">
                                <li>
                                    <a href="#"><i class="icon icon-phone"></i>+216 29148149 // +216 29148098</a>
                                </li>
                                <li>
                                    <a href="mailto:info@yourcompany.com"><i
                                            class="icon icon-mail"></i>decodarziadia@example.com</a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-map-pin"></i>MC 27 Près de la STEG Menzel
                                        Temime,8080, Nabeul, Tunis</a>
                                </li>
                            </ul>
                        </div>
                        <div class="social-links">
                            <h3>Social Links</h3>
                            <ul class="d-flex list-unstyled">
                                <li><a href="mailto:decodarziadia@example.com" class="icon icon-mail"></a></li>
                                <li><a href="https://www.facebook.com/decodarDD/?locale=fr_FR"
                                        class="icon icon-facebook"></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-information">
                        <div class="section-header">
                            <h2 class="section-title">Send us a message</h2>
                        </div>
                        <form name="contactform" action="{{ route('mail') }}" method="post" class="contact-form">
                            @csrf
                            <div class="form-item">
                                <input type="text" minlength="2" name="name" placeholder="Name"
                                    class="u-full-width bg-light" required>
                                <input type="email" name="email" placeholder="E-mail" class="u-full-width bg-light"
                                    required>
                                <textarea class="u-full-width bg-light" name="message" placeholder="Message" style="height: 180px;" required></textarea>
                            </div>
                            <label>
                                <input type="checkbox" required>
                                <span class="label-body">I agree all the <a href="#">terms and conditions</a>
                                </span>
                            </label>
                            <button type="submit" name="submit"
                                class="btn btn-dark btn-full btn-medium">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @include('template.footer')



    <script href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/v4-shims.min.js"></script>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
