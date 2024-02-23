<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title></title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../dashasset/plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="dashasset/plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="../dashasset/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="../dashasset/css/style.min.css" rel="stylesheet">
    <link href="../dashasset/css/tooplate-little-fashion.css" rel="stylesheet">
    
</head>

<body>
    @include('admin.header')

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                Dashboard
                            </a>
                        </li>
                    
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('category') }}"
                                aria-expanded="false">
                                <i class="fa fa-tasks" aria-hidden="true"></i>
                                Categories
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/listproduct"
                                aria-expanded="false">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                Products
                            </a>
                        </li>
                        

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
            <div class="container-fluid">
                <form action="/admin/editprofile" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ Auth()->user()->name }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ Auth()->user()->email }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Telephone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="tel" class="form-control" id="tel" name="tel"
                                                value="{{ Auth()->user()->tel }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">City</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="city" name="city"
                                                value="{{ Auth()->user()->city }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">State</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="state" name="state"
                                                value="{{ Auth()->user()->state }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Zip Code</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="zip_code"
                                                name="zip_code" value="{{ Auth()->user()->zip_code }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Street</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" id="street" name="street"
                                                value="{{ Auth()->user()->street }}">
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group">
                                        <label for="editPassword">New Password</label>
                                        <input type="password" class="form-control" id="editPassword"
                                            name="password" placeholder="New password">
                                    </div>

                                    <!-- Save Changes Button -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>



                            </div>
                        </div>


                    </div>
                </form>


            </div>

        </div>
        
    </div>
    
    <script src="../dashasset/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../dashasset/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../dashasset/js/app-style-switcher.js"></script>
    <script src="../dashasset/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="../dashasset/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dashasset/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dashasset/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../dashasset/plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="../dashasset/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js">
    </script>
    <script src="../dashasset/js/pages/dashboards/dashboard1.js"></script>

</body>

</html>
