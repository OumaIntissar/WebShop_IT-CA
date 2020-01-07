<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../css/sweetalert2.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.php -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-left navbar-brand-wrapper d-flex align-items-center justify-content-between">
            <a class="navbar-brand brand-logo" href="index.php"><img src="../../images/logo.svg" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../../images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
                    <a class="dropdown-toggle btn btn-outline-secondary btn-fw" href="#" data-toggle="dropdown" id="pagesDropdown">
                        <span class="nav-profile-name">Settings</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" href="../user/profile.php">
                            <i class="mdi mdi-account text-primary"></i>
                            My profile
                        </a>
                        <a class="dropdown-item" href="../login/login.php">
                            <i class="mdi mdi-logout text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>

            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a class="nav-link d-flex" href="../user/profile.php">
                        <div class="profile-image">
                            <img src="https://via.placeholder.com/37x37" alt="image">
                        </div>
                        <div class="profile-name">
                            <p class="name">
                                <?php echo $_SESSION['fullname']; ?>
                            </p>
                            <p class="designation">
                                Manager
                            </p>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../dashboard/dashboard.php">
                        <i class="mdi mdi-shield-check menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="mdi mdi-book-multiple menu-icon"></i>
                        <span class="menu-title">Manage categories</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../category/category_list.php">Category List</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../category/new_category.php">New Category</a></li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                        <i class="mdi mdi-database menu-icon"></i>
                        <span class="menu-title">Manage products</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="icons">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../product/product_list.php">Product List</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../product/new_product.php">New Product</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../order/order_list.php">
                        <i class="mdi mdi-cart-outline menu-icon"></i>
                        <span class="menu-title">Manage Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login/login.php">
                        <i class="mdi mdi-logout menu-icon"></i>
                        <span class="menu-title">Log out</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- base:js -->
        <script src="../../vendors/base/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- inject:js -->
        <script src="../../js/off-canvas.js"></script>
        <script src="../../js/hoverable-collapse.js"></script>
        <script src="../../js/template.js"></script>
        <script src="../../js/settings.js"></script>
        <script src="../../js/todolist.js"></script>
        <script src="../../js/sweetalert2.all.min.js"></script>
        <!-- endinject -->
        <!-- plugin js for this page -->
        <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <!-- End plugin js for this page -->
        <!-- Custom js for this page-->
        <script src="../../js/data-table.js"></script>
