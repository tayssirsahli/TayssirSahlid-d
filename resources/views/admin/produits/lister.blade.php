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
    <style>
        .btn-custom-delete {
            background: var(--primary-color);
            color: var(--light-color);

            margin-right: 0;
        }
    </style>
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
                <div class="page-breadcrumb bg-white">

                    <div class="d-md-flex">
                        <h3 class="col-container">List of Products</h3>
                        <ol class="breadcrumb ms-auto">
                            <li><a href="#" class="fw-normal">Products </a></li>
                        </ol>
                        <button type="button" target="_blank" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="btn btn-danger text-white">Add
                            Product
                        </button>
                    </div>
                </div>

                @if (Session::has('erreur'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('erreur') }}
                    </div>
                @endif
                <form action="{{ route('filterProduit') }}" method="GET">
                    @csrf
                    <div class="mb-3">
                        <label for="searchInput" class="form-label">    </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchInput" name="name"
                                placeholder="Enter search term...">
                            <button type="submit" class="btn btn-primary" id="searchButton">Search</button>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Id</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">quantity</th>
                                            <th class="border-top-0">Category_id</th>
                                            <th class="border-top-0">price</th>
                                            <th class="border-top-0">photo</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($products) > 0)
                                            @foreach ($products as $prd)
                                                <tr>
                                                    <td>{{ $prd->id }}</td>
                                                    <td>{{ $prd->name }}</td>
                                                    <td>{{ $prd->description }}</td>
                                                    <td>{{ $prd->quantity }}</td>
                                                    <td>{{ $prd->Category_id }}</td>
                                                    <td>{{ $prd->price }}</td>
                                                    <td><img src ="{{ asset('uploads') }}/{{ $prd->photo }}"
                                                            alt ="" width="80"> </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <button type="button" target="_blank"
                                                                data-bs-toggle="modal"
                                                                class="btn btn-primary d-md-block ms-3 waves-effect waves-light text-white"
                                                                data-bs-target="#EditexampleModal{{ $prd->id }}">
                                                                Update
                                                            </button>
                                                            <button type="button"
                                                                onclick="window.location.href='/produit/delete/{{ $prd->id }}'"
                                                                class="btn-custom-delete d-md-block ms-3 waves-effect waves-light text-white">
                                                                Delete
                                                            </button>

                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <td>no data founded </td>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <!-- Modal add-->
    @if (Session::has('success'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('success') }}
        </div>
    @elseif (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
    @endif
    <form action="{{ route('addproduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="produitName" class="form-label">Product Name:</label>
                            <input type="text" class="form-control" id="produitName" name="name"
                                placeholder="Enter product name">
                        </div>
                        <div class="mb-3">
                            <label for="produitDescription" class="form-label">Product Description:</label>
                            <textarea class="form-control" id="produitDescription" name="description" placeholder="Enter product description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="produitPrice" class="form-label">Product price:</label>
                            <input type="number" id="produitPrice" name="price"
                                placeholder="Enter product Price">
                        </div>

                        <div class="mb-3">
                            <label for="produitquantity" class="form-label">Product quantity:</label>
                            <input type="number" id="produitquantity" name="quantity"
                                placeholder="Enter product quantity">
                        </div>
                        <div class="mb-3">
                            <label for="Category_id" class="form-label">Category:</label>
                            <select class="fromcontrol" id="Category_id" name="Category_id">
                                @foreach ($categories as $cat)
                                    <option value ="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product file:</label>
                            <input type="file" id="productImage" name="productImage" accept="image/*" required>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal update-->
    @if (Session::has('success'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @foreach ($products as $product)
        <form action="/product/updateproduct" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="modal fade" id="EditexampleModal{{ $product->id }}" tabindex="-1"
                aria-labelledby="EditexampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="EditexampleModalLabel">Update product</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="produitName" class="form-label">Product Name:</label>
                                <input type="text" class="form-control" id="produitName" name="name"
                                    placeholder="Enter product name" value="{{ $product->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="produitDescription" class="form-label">Product Description:</label>
                                <textarea class="form-control" id="produitDescription" name="description" placeholder="Enter product description">{{ $product->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="produitPrice" class="form-label">Product price:</label>
                                <input type="number" id="produitPrice" name="price"
                                    placeholder="Enter product Price" value="{{ $product->price }}">
                            </div>

                            <div class="mb-3">
                                <label for="produitquantity" class="form-label">Product quantity:</label>
                                <input type="number" id="produitquantity" name="quantity"
                                    placeholder="Enter product quantity" value="{{ $product->quantity }}">
                            </div>
                            <input type="hidden" value ="{{ $product->id }}" name="id_produit">

                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

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
