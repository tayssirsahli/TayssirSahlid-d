<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Deco Dar Ziadia- Detail Product Page</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <!-- Use asset() function to generate URLs -->
    <link href="{{ asset('auth/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('auth/css/slick.css') }}" />
    <link href="{{ asset('auth/css/tooplate-little-fashion.css') }}" rel="stylesheet">


</head>

<body>
    @include('template.header')

    <section class="product-detail section-padding">
        <div class="container">
            <div class="row">
                @if (Session::has('Error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('Error') }}
                    </div>
                @endif
                <form action="/store" method="post">
                    @csrf
                    <div class="col-lg-6 col-12">
                        <div class="product-thumb">
                            <img src="{{ asset('uploads') }}/{{ $product->photo }}" alt="{{ $product->name }}"
                                class="img-fluid product-image" name="photo">
                        </div>
                    </div>
                    <input type="hidden" name="idproduct" value="{{ $product->id }}">
                    <div class="col-lg-6 col-12">
                        <div class="product-info d-flex">
                            <div>
                                <h2 class="product-title mb-0" name="name">{{ $product->name }}</h2>
                            </div>
                            <small class="product-price text-muted ms-auto mt-auto mb-5" name="price"
                                value="{{ $product->price }}">{{ $product->price }} dt</small>
                        </div>
                        <div class="product-description">
                            <strong class="d-block mt-4 mb-2">Description</strong>
                            <p class="lead mb-5" name="description">{{ $product->description }}</p>
                        </div>
                        <div class="product-cart-thumb row">
                            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                <input type="number" class="form-select cart-form-select" id="inputGroupSelect01"
                                    name="qte">
                            </div>
                            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                <button type="submit" class="btn custom-btn cart-btn">Add to Cart</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('template.footer')

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('auth/js/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('auth/js/Headroom.js') }}"></script>
    <script src="{{ asset('auth/js/jQuery.headroom.js') }}"></script>
    <script src="{{ asset('auth/js/slick.min.js') }}"></script>
    <script src="{{ asset('auth/js/custom.js') }}"></script>

</body>

</html>
