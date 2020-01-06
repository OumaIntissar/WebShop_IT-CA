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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
    <?php
        include_once("../../actions/db_connection.php");
        $sql = "SELECT atvl.id_activity , atvl.id_admin , atv.name_activity , atv.name_activity , atvl.date , atvl.label , adm.full_name , adm.role FROM activitylog atvl 
        INNER JOIN activity atv ON atvl.id_activity=atv.id_activity 
        INNER JOIN admin adm ON atvl.id_admin=adm.id_admin
        ORDER BY atvl.date DESC";
        $result = $conn->query($sql);
    ?>
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
                        <div class="nav-link d-flex">
                            <div class="profile-image">
                                <img src="https://via.placeholder.com/37x37" alt="image">
                            </div>
                            <div class="profile-name">
                                <p class="name">
                                    Otman Nouinou
                                </p>
                                <p class="designation">
                                    Super Admin
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
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
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="mdi mdi-account-circle menu-icon"></i>
                            <span class="menu-title">Manage Accounts</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../account/account_list.php">Account List</a></li>
                                <li class="nav-item"> <a class="nav-link" href="../account/new_account.php">New Account</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../login/login.php">
                            <i class="mdi mdi-logout menu-icon"></i>
                            <span class="menu-title">Log out</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-6 mb-4 mb-xl-0">
                            <h3>Welcome Otman!</h3>
                            <h6 class="font-weight-normal mb-0 text-muted">You have done more sales today.</h6>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center justify-content-md-end">
                                <div class="mb-3 mb-xl-0">
                                    <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-success"><?php echo date("d")." ".date("M")." ".date("Y"); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content tab-transparent-content pb-0">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <h4 class="card-title">Sales</h4>
                                            </div>
                                            <div id="sales" class="carousel slide dashboard-widget-carousel position-static pt-2" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <?php 
                                                    $k = 0;
                                                    while($k<6){
                                                        if($k == 0){
                                                            $year = date("Y");
                                                            $month = date("m");
                                                        }elseif($month == 1){
                                                            $year = $year - 1;
                                                            $month = 12;
                                                        }else{
                                                            $month = $month - 1;
                                                        }
                                                        //echo $year."-".$month."<br>";
                                                        $sql_getSalles = "SELECT Sum(total_price) AS 'price' , date FROM `order`
                                                                        where date like '$year-$month-%'";
                                                        $result_salles = $conn->query($sql_getSalles);
                                                        $row_sls = $result_salles->fetch_assoc();
                                                        $k = $k+1;
                                                        //echo $row_sub["nombre"].'-'.$year.'-'.$month."<br>";
                                                    ?>
                                                    <div class="<?php 
                                                    if($k==1){
                                                        echo "carousel-item active";
                                                    }else{
                                                        echo "carousel-item";
                                                    } ?>">
                                                        <div class="d-flex flex-wrap align-items-baseline">
                                                            <h2 class="mr-3"><?php if($row_sls["price"] ==0){echo '0.00 MAD';}else{echo $row_sls["price"].' MAD'; }  ?> </h2>
                                                        </div>
                                                        <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center">
                                                            <i class="mdi mdi-calendar mr-1"></i>
                                                            <span class="text-left">
                                                                <?php 
                                                                    if($month == 1){
                                                                        echo "January";
                                                                    }elseif($month == 2){
                                                                        echo "February";
                                                                    }elseif($month == 3){
                                                                        echo "March";
                                                                    }
                                                                    elseif($month == 4){
                                                                        echo "April";
                                                                    }
                                                                    elseif($month == 5){
                                                                        echo "May";
                                                                    }
                                                                    elseif($month == 6){
                                                                        echo "June";
                                                                    }
                                                                    elseif($month == 7){
                                                                        echo "July";
                                                                    }
                                                                    elseif($month == 8){
                                                                        echo "Aughst";
                                                                    }
                                                                    elseif($month == 9){
                                                                        echo "September";
                                                                    }
                                                                    elseif($month == 10){
                                                                        echo "October";
                                                                    }
                                                                    elseif($month == 11){
                                                                        echo "November";
                                                                    }
                                                                    elseif($month == 12){
                                                                        echo "Decemeber";
                                                                    }
                                                                ?>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <?php 
                                                    }
                                                    ?>
                                                </div>
                                                <a class="carousel-control-prev" href="#sales" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#sales" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <h4 class="card-title">Orders</h4>
                                            </div>
                                            <div id="orders" class="carousel slide dashboard-widget-carousel position-static pt-2" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <?php 
                                                    $j = 0;
                                                    while($j<6){
                                                        if($j == 0){
                                                            $year = date("Y");
                                                            $month = date("m");
                                                        }elseif($month == 1){
                                                            $year = $year - 1;
                                                            $month = 12;
                                                        }else{
                                                            $month = $month - 1;
                                                        }
                                                        //echo $year."-".$month."<br>";
                                                        $sql_getOrders = "SELECT COUNT(id_order) AS 'nombre' , date FROM `order`
                                                                where date like '$year-$month-%'";
                                                        $result_orders = $conn->query($sql_getOrders);
                                                        $row_ord = $result_orders->fetch_assoc();
                                                        $j = $j+1;
                                                        //echo $row_sub["nombre"].'-'.$year.'-'.$month."<br>";
                                                    ?>
                                                    <div class="<?php 
                                                    if($j==1){
                                                        echo "carousel-item active";
                                                    }else{
                                                        echo "carousel-item";
                                                    } ?>">
                                                        <div class="d-flex flex-wrap align-items-baseline">
                                                            <h2 class="mr-3"><?php echo $row_ord["nombre"]; ?></h2>
                                                        </div>
                                                        <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center">
                                                            <i class="mdi mdi-calendar mr-1"></i>
                                                            <span class="text-left">
                                                                <?php 
                                                                    if($month == 1){
                                                                        echo "January";
                                                                    }elseif($month == 2){
                                                                        echo "February";
                                                                    }elseif($month == 3){
                                                                        echo "March";
                                                                    }
                                                                    elseif($month == 4){
                                                                        echo "April";
                                                                    }
                                                                    elseif($month == 5){
                                                                        echo "May";
                                                                    }
                                                                    elseif($month == 6){
                                                                        echo "June";
                                                                    }
                                                                    elseif($month == 7){
                                                                        echo "July";
                                                                    }
                                                                    elseif($month == 8){
                                                                        echo "Aughst";
                                                                    }
                                                                    elseif($month == 9){
                                                                        echo "September";
                                                                    }
                                                                    elseif($month == 10){
                                                                        echo "October";
                                                                    }
                                                                    elseif($month == 11){
                                                                        echo "November";
                                                                    }
                                                                    elseif($month == 12){
                                                                        echo "Decemeber";
                                                                    }
                                                                ?>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <?php 
                                                    }
                                                    ?>
                                                </div>
                                                <a class="carousel-control-prev" href="#orders" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#orders" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <h4 class="card-title">Visits</h4>
                                            </div>
                                            <div id="sales" class="carousel slide dashboard-widget-carousel position-static pt-2" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="d-flex flex-wrap align-items-baseline">
                                                            <h2 class="mr-3">30832</h2>
                                                        </div>
                                                        <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center">
                                                            <i class="mdi mdi-calendar mr-1"></i>
                                                            <span class="text-left">
                                                                Oct
                                                            </span>
                                                        </button>
                                                    </div>

                                                    <div class="carousel-item">
                                                        <div class="d-flex flex-wrap align-items-baseline">
                                                            <h2 class="mr-3">10098</h2>
                                                        </div>
                                                        <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center">
                                                            <i class="mdi mdi-calendar mr-1"></i>
                                                            <span class="text-left">
                                                                Nov
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#sales" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#sales" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <h4 class="card-title">Subscriptions</h4>
                                            </div>
                                            <div id="subscriptions" class="carousel slide dashboard-widget-carousel position-static pt-2" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <?php 
                                                    $i = 0;
                                                    while($i<6){
                                                        if($i == 0){
                                                            $year = date("Y");
                                                            $month = date("m");
                                                        }elseif($month == 1){
                                                            $year = $year - 1;
                                                            $month = 12;
                                                        }else{
                                                            $month = $month - 1;
                                                        }
                                                        //echo $year."-".$month."<br>";
                                                        $sql_getSubscriptions = "SELECT COUNT(id_cost) AS 'nombre' , date FROM `costumer`n 
                                                                where date like '$year-$month-%'";
                                                        $result_subscription = $conn->query($sql_getSubscriptions);
                                                        $row_sub = $result_subscription->fetch_assoc();
                                                        $i = $i+1;
                                                        //echo $row_sub["nombre"].'-'.$year.'-'.$month."<br>";
                                                    ?>
                                                    <div class="<?php 
                                                    if($i==1){
                                                        echo "carousel-item active";
                                                    }else{
                                                        echo "carousel-item";
                                                    } ?>">
                                                        <div class="d-flex flex-wrap align-items-baseline">
                                                            <h2 class="mr-3"><?php echo $row_sub["nombre"]; ?></h2>
                                                        </div>
                                                        <button class="btn btn-outline-secondary btn-sm btn-icon-text d-flex align-items-center">
                                                            <i class="mdi mdi-calendar mr-1"></i>
                                                            <span class="text-left">
                                                                <?php 
                                                                    if($month == 1){
                                                                        echo "January";
                                                                    }elseif($month == 2){
                                                                        echo "February";
                                                                    }elseif($month == 3){
                                                                        echo "March";
                                                                    }
                                                                    elseif($month == 4){
                                                                        echo "April";
                                                                    }
                                                                    elseif($month == 5){
                                                                        echo "May";
                                                                    }
                                                                    elseif($month == 6){
                                                                        echo "June";
                                                                    }
                                                                    elseif($month == 7){
                                                                        echo "July";
                                                                    }
                                                                    elseif($month == 8){
                                                                        echo "Aughst";
                                                                    }
                                                                    elseif($month == 9){
                                                                        echo "September";
                                                                    }
                                                                    elseif($month == 10){
                                                                        echo "October";
                                                                    }
                                                                    elseif($month == 11){
                                                                        echo "November";
                                                                    }
                                                                    elseif($month == 12){
                                                                        echo "Decemeber";
                                                                    }
                                                                ?>
                                                            </span>
                                                        </button>
                                                    </div>
                                                    <?php 
                                                    }
                                                    ?>
                                                </div>
                                                <a class="carousel-control-prev" href="#subscriptions" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#subscriptions" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                            Tab Item
                        </div>
                        <div class="tab-pane fade" id="returns-1" role="tabpanel" aria-labelledby="returns-tab">
                            Tab Item
                        </div>
                        <div class="tab-pane fade" id="more" role="tabpanel" aria-labelledby="more-tab">
                            Tab Item
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Administration Activities</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Activity</th>
                                                    <th>Admin Full Name</th>
                                                    <th>Description</th>
                                                    <th>Role</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $nbr = 1;
                                                while($row = $result->fetch_assoc()) {
                                                $name_adm = $row["full_name"];
                                                $name_act = $row["name_activity"];
                                                $name_act = str_replace("-"," ",$name_act);
                                                $id_act = $row["id_activity"];
                                                $date_act = $row["date"];
                                                $date_act_array = explode(" ", $date_act);
                                                $date= $date_act_array[0];
                                                $time=$date_act_array[1];
                                                $role_adm = $row["role"];
                                                $desc_act = $row["label"];
                                            ?>
                                                <tr>
                                                    <td><?php echo $nbr; ?></td>
                                                    <td><?php echo $date; ?></td>
                                                    <td>
                                                        <label class="<?php 
                                                        if($id_act === "1" || $id_act === "4" || $id_act === "7" ){
                                                            echo "badge badge-success";
                                                        }elseif($id_act === "2" || $id_act === "5" || $id_act === "8" ){
                                                            echo "badge badge-info";
                                                        }elseif($id_act === "3" || $id_act === "6" || $id_act === "9" ){
                                                            echo "badge badge-danger";
                                                        }else{
                                                            echo "badge badge-warning";
                                                        }
                                                        ?>"><?php echo $name_act; ?></label>
                                                    </td>
                                                    <td><?php echo $name_adm; ?></td>
                                                    <td>
                                                        <?php echo $desc_act; ?>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-outline-primary"><?php 
                                                        if($role_adm == "A"){
                                                            echo "Super Admin";
                                                        }elseif($role_adm == "S"){
                                                            echo "Seller";
                                                        }elseif($role_adm == "M"){
                                                            echo "Manager";
                                                        }
                                                        ?></button>
                                                    </td>
                                                </tr>
                                            <?php 
                                                $nbr = $nbr + 1;
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.php -->
                <div class="footer-wrapper">
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright &copy; 2019. All rights reserved. </span>
                        </div>
                    </footer>
                </div>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="../../vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="../../js/data-table.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
