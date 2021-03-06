<?php
    session_start();
    session_destroy();
?>
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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
    <link rel="shortcut icon" href="../../images/web_logo.jpeg" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3 mx-auto">
              <h1>WebShop Admin</h1>
              <h4>Welcome back!</h4>
              <form class="pt-3" method="post" action="actions/login.php">
                <div class="form-group">
                  <label for="username">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" name="email" id="email" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" name="password" id="password" placeholder="Password" required>
                  </div>
                </div>
                <div class="my-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 d-flex flex-row">
              <img src="../../images/web_logo.jpeg">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2019  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
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
  <script src="../../js/sweetalert2.all.min.js"></script>
  <!-- endinject -->

  <?php
    if (isset($_GET['error'])){
        echo "<script>
                    Swal.fire({
                      text: 'Your account is not activated yet!',
                      type: 'warning',
                      confirmButtonText: 'Ok'    
                    }).then((result) => {
                        if (result.value) {
                          window.location = 'login.php';
                        }
                    })
                </script>";
    } else if(isset($_GET['error1'])) {
        echo "<script>
                    Swal.fire({
                      text: 'The email address or password is incorrect!',
                      type: 'warning',
                      confirmButtonText: 'Ok'    
                    }).then((result) => {
                        if (result.value) {
                          window.location = 'login.php';
                        }
                    })
                </script>";
    }
  ?>
</body>

</html>
