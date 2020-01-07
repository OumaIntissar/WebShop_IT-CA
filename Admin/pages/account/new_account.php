<?php
    include('../menu/menu.php');
?>
            <!-- partial -->
            <div class="main-panel">
                <!-- partial:../../partials/_footer.php -->
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">New Account</h4>
                            <form class="forms-sample" method="POST" action="actions/new_account.php" onsubmit="return checkForm(this);">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="exampleInputUsername2" name="fullname" placeholder="Full name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleSelectGender" class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="exampleSelectGender" name="role" required>
                                            <option value="">None</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Seller">Seller</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="">None</option>
                                            <option value="Active">Active</option>
                                            <option value="Blocked">Blocked</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <div style="margin-right: 10px;">
                                            +212
                                        </div>
                                        <div class="w-100">
                                            <input type="tel" class="form-control" id="exampleInputMobile" pattern="[6,7]{1}[0-9]{8}" name="phone" placeholder="Mobile number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" title="Password must contain at least 8 characters, including UPPER/lowercase and numbers." id="exampleInputPassword2" name="password"
                                                       placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                                   if(this.checkValidity()) form.repassword.pattern = RegExp.escape(this.value);">
                                            </div>
                                            <div class="col-sm-3 d-flex align-items-center">
                                                <input type="checkbox" onclick="showPassword()"> Show Password
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" title="Please enter the same Password as above." id="exampleInputConfirmPassword2" name="repassword"
                                                       placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="
                                                       this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
                                            </div>
                                            <div class="col-sm-3 d-flex align-items-center">
                                                <input type="checkbox" onclick="showPassword2()"> Show Password
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
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
    <!-- Polyfill for RegExp.escape -->
    <script>
        if(!RegExp.escape) {
            RegExp.escape = function(s) {
                return String(s).replace(/[\\^$*+?.()|[\]{}]/g, '\\$&');
            };
        }
    </script>
    <!-- End polyfill for RegExp.escape -->
    <!-- Show password -->
    <script>
        function showPassword() {
            var x = document.getElementById("exampleInputPassword2");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <!-- End show password -->
    <!-- Show password 2 -->
    <script>
        function showPassword2() {
            var x = document.getElementById("exampleInputConfirmPassword2");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <!-- End show password 2 -->
    <?php
    if(isset($_GET['success'])){
        echo "<script>
                    Swal.fire({
                      text: 'Account has been added succefully!',
                      type: 'success',
                      confirmButtonText: 'Ok'    
                    }).then((result) => {
                        if (result.value) {
                          window.location = 'new_account.php';
                        }
                    })
                </script>";
    }else if (isset($_GET['error'])){
        echo "<script>
                    Swal.fire({
                      text: 'Email already exists!',
                      type: 'warning',
                      confirmButtonText: 'Ok'    
                    }).then((result) => {
                        if (result.value) {
                          window.location = 'new_account.php';
                        }
                    })
                </script>";
    }
    ?>

</body>

</html>
