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
        .logo {
            color: #ff0000;
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
                        <h3 class="col-container">List of categories</h4>
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Categories</a></li>
                            </ol>
                            <button type="button" target="_blank" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add
                                Category
                            </button>
                    </div>
                </div>
                @if (Session::has('erreur'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('erreur') }}
                    </div>
                @endif
                <form action="{{ route('filterCategories') }}" method="GET">
                    @csrf
                    <div class="mb-3">
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
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (count($categories) > 0)
                                            @foreach ($categories as $cat)
                                                <tr>
                                                    <td>{{ $cat->id }}</td>
                                                    <td>{{ $cat->name }}</td>
                                                    <td>{{ $cat->description }}</td>

                                                    <td>
                                                        <a href="/edit/{{ $cat->id }}" class="fas fa-edit"
                                                            title="Update" style="font-size:20px; color:black;"></a>
                                                        <span style="margin-left: 20px;"></span>
                                                        <a href="/delete/{{ $cat->id }}"
                                                            class="fas fa-trash-alt red-icon fa-lg" title="Delete"
                                                            style="font-size:20px; color:black;"></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>no data foundet</td>
                                            </tr>
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
    <!-- Modal -->
    @if (Session::has('success'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <form action="{{ route('addcategory') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Add Category</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Ajouter des champs pour le nom et la description ici -->
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name:</label>
                            <input type="text" class="form-control" id="categoryName" name="name"
                                placeholder="Enter category name">
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Category Description:</label>
                            <textarea class="form-control" id="categoryDescription" name="description" placeholder="Enter category description"></textarea>
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
