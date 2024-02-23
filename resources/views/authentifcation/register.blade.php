<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Deco Dar Ziadia- Sign Up Page</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <link href="auth/css/bootstrap.min.css" rel="stylesheet">
    <link href="auth/css/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="auth/css/slick.css" />

    <link href="auth/css/tooplate-little-fashion.css" rel="stylesheet">


</head>

<body>
    @include('template.header')
    <section class="preloader">
        <div class="spinner">
            <span class="sk-inner-circle"></span>
        </div>
    </section>

    <main>

        <section class="sign-in-form section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 mx-auto col-12">

                        <h1 class="hero-title text-center mb-5">Sign Up</h1>

                        <div class="row">
                            <div class="col-lg-8 col-11 mx-auto">
                                @if (Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-floating">
                                        <input type="name" name="name" id="name" class="form-control"
                                            placeholder="name " required>

                                        <label for="name">Name</label>
                                    </div>
                                    <div class="form-floating my-4">
                                        <input type="tel" name="tel" id="tel" class="form-control"
                                            placeholder="Phone Number" required>
                                        <label for="tel">Phone Number</label>
                                    </div>

                                    <div class="form-floating my-4">
                                        <input type="text" name="city" id="city" class="form-control"
                                            placeholder="City" required>
                                        <label for="city">City</label>
                                    </div>
                                    <div class="form-floating my-4">
                                        <select name="state" id="state" class="form-select" required>
                                            <option value="Tunis" selected>Tunis</option>
                                            <option value="Ariana">Ariana</option>
                                            <option value="Beja">Beja</option>
                                            <option value="Ben Arous">Ben Arous</option>
                                            <option value="Bizerte">Bizerte</option>
                                            <option value="Gabes">Gabes</option>
                                            <option value="Gafsa">Gafsa</option>
                                            <option value="Jendouba">Jendouba</option>
                                            <option value="Kairouan">Kairouan</option>
                                            <option value="Kasserine">Kasserine</option>
                                            <option value="Kebili">Kebili</option>
                                            <option value="Kef">Kef</option>
                                            <option value="Mahdia">Mahdia</option>
                                            <option value="Manouba">Manouba</option>
                                            <option value="Medenine">Medenine</option>
                                            <option value="Monastir">Monastir</option>
                                            <option value="Nabeul">Nabeul</option>
                                            <option value="Sfax">Sfax</option>
                                            <option value="Sidi Bouzid">Sidi Bouzid</option>
                                            <option value="Siliana">Siliana</option>
                                            <option value="Sousse">Sousse</option>
                                            <option value="Tataouine">Tataouine</option>
                                            <option value="Tozeur">Tozeur</option>
                                            <option value="Zaghouan">Zaghouan</option>
                                        </select>
                                        <label for="state">State</label>
                                    </div>
                                    <div class="form-floating my-4">
                                        <input type="text" name="street" id="street" class="form-control"
                                            placeholder="Street" required>
                                        <label for="street">Street</label>
                                    </div>
                                    <div class="form-floating my-4">
                                        <input type="number" name="zip_code" id="zip_code" class="form-control"
                                            placeholder="Zip Code" required>
                                        <label for="zip_code">Zip Code</label>
                                    </div>

                                    <div class="form-floating my-4">
                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                            class="form-control" placeholder="Email address" required>

                                        <label for="email">Email address</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userPhoto" class="form-label">Choose your photo</label><br>

                                        <input type="file" id="userPhoto" name="userPhoto" accept="image/*"
                                            required>

                                    </div>


                                    <div class="form-floating my-4">
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Password">

                                        <label for="password">Password</label>

                                        <p class="text-center">* shall include 0-9 a-z A-Z in 4 to 10 characters</p>
                                    </div>

                                    <div class="form-floating">
                                        <input type="password" name="confirm_password" id="confirm_password"
                                            class="form-control" placeholder="Password" required>

                                        <label for="confirm_password">Password Confirmation</label>
                                    </div>

                                    <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                        Create account
                                    </button>

                                    <p class="text-center">Already have an account? Please <a
                                            href="{{ route('login') }}">Sign In</a></p>

                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

    </main>

    @include('template.footer')

    <!-- JAVASCRIPT FILES -->
    <script src="auth/js/jquery.min.js"></script>
    <script src="auth/js/bootstrap.bundle.min.js"></script>
    <script src="auth/js/Headroom.js"></script>
    <script src="auth/js/jQuery.headroom.js"></script>
    <script src="auth/js/slick.min.js"></script>
    <script src="auth/js/custom.js"></script>

</body>

</html>
