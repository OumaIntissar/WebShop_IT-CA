<?php
    include('../menu/menu.php');
    if($_SESSION['status'] == '1'){
        $status = 'Active';
    }else if($_SESSION['status'] == '0'){
        $status = 'Blocked';
    }
    if ($_SESSION['role'] == 'A'){
        $role = "Super Admin";
    } else if($_SESSION['role'] == 'M'){
        $role = "Manager";
    } else if($_SESSION['role'] == 'S') {
        $role = "Seller";
    }
?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 text-center mx-auto">
                                    <div class="border-bottom text-center pb-4">
                                        <img src="https://via.placeholder.com/92x92" alt="profile" class="img-lg rounded-circle mb-3" />
                                        <div class="mb-3">
                                            <h3><?php echo $_SESSION['fullname'] ?></h3>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <h5 class="mb-0 mr-2 text-muted">Morocco</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom py-4">
                                        <p>Role</p>
                                        <div>
                                            <label class="badge badge-outline-dark"><?php echo $role ?></label>
                                        </div>
                                    </div>
                                    <div class="py-4">
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Status
                                            </span>
                                            <span class="float-right text-muted">
                                                <?php echo $status ?>
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Date of creation
                                            </span>
                                            <span class="float-right text-muted">
                                                <?php echo date("m/d/Y", strtotime( $_SESSION['dateC'])) ?>
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                Phone
                                            </span>
                                            <span class="float-right text-muted">
                                                +212<?php echo $_SESSION['mobile'] ?>
                                            </span>
                                        </p>
                                        <p class="clearfix">
                                            <span class="float-left">
                                                E-Mail
                                            </span>
                                            <span class="float-right text-muted">
                                                <?php echo $_SESSION['email'] ?>
                                            </span>
                                        </p>

                                    </div>
                                    <button class="btn btn-primary btn-block mb-2">Modify</button>
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
</body>

</html>
