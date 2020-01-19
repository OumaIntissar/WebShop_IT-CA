<?php
    include '../../actions/db_connection.php';
    include('../menu/menu.php');
    $id = $_GET['id'];
    $sql ="SELECT full_name, email, mobile FROM admin WHERE id_admin='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res)
?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modify Account</h4>
                            <form class="forms-sample" method="POST" action="actions/modify_account.php" onsubmit="return checkForm(this);">
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="exampleInputUsername2" name="fullname" placeholder="Full name" value="<?php echo $row['full_name'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="Email" value="<?php echo $row['email'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <div style="margin-right: 10px;">
                                            +212
                                        </div>
                                        <div class="w-100">
                                            <input type="tel" class="form-control" id="exampleInputMobile" name="mobile" pattern="[6,7]{1}[0-9]{8}" name="phone" placeholder="Mobile number" value="<?php echo $row['mobile'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleCheckbox" class="col-sm-3 col-form-label">Change Password</label>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <input type="checkbox" id="myCheck"  onclick="showpass()">
                                    </div>
                                </div>
                                <div id ="password" style="display:none">
                                    <div class="form-group row">
                                        <label for="exampleInputPassword" class="col-sm-3 col-form-label">Old Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" title="Password must contain at least 8 characters, including UPPER/lowercase and numbers." id="exampleInputPassword2" name="oldpassword"
                                                   placeholder="Old Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                                if(this.checkValidity()) form.repassword.pattern = RegExp.escape(this.value);">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" title="Password must contain at least 8 characters, including UPPER/lowercase and numbers." id="exampleInputPassword2" name="password"
                                                   placeholder="Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                                if(this.checkValidity()) form.repassword.pattern = RegExp.escape(this.value);">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" title="Please enter the same Password as above." id="exampleInputConfirmPassword2" name="repassword"
                                                   placeholder="Re Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onchange="
                                               this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light" type="reset" onclick="location.href='category_list.php';">Cancel</button>
                            </form>
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
    <!-- Polyfill for RegExp.escape -->
    <script>
        if(!RegExp.escape) {
            RegExp.escape = function(s) {
                return String(s).replace(/[\\^$*+?.()|[\]{}]/g, '\\$&');
            };
        }
    </script>
    <!-- End polyfill for RegExp.escape -->
    <!-- Show input password -->
    <script>
        function showpass() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("password");
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }
    </script>
    <!-- End show input password -->

    <script>
        $(document).ready(function() {
            $('input[type="checkbox"]').change(function() {
                if ($('input[type="password"]').attr('required')) {
                    $('input[type="password"]').removeAttr('required');
                }else {
                    $('input[type="password"]').attr('required','required');
                }
            });
        });
    </script>

    <!-- SweetAlert2 -->
    <?php
        if(isset($_GET['f'])){
            echo "<script>
                            Swal.fire({
                              title: 'Changed!',  
                              text: 'Nothing is changed!',
                              type: 'success',
                              confirmButtonText: 'Ok'    
                            }).then((result) => {
                                if (result.value) {
                                  window.location = '../user/profile.php';
                                }
                            })
                        </script>";
        }else if(isset($_GET['f1'])) {
            echo "<script>
                            Swal.fire({
                              title: 'Changed!',  
                              text: 'The old password is incorret!',
                              type: 'error',
                              confirmButtonText: 'Ok'    
                            }).then((result) => {
                                if (result.value) {
                                  window.location = '../user/profile.php';
                                }
                            })
                        </script>";
        }else if (isset($_GET['t'])){
            echo "<script>
                            Swal.fire({
                             title: 'Changed!',
                             text: 'Your account has been changed.',
                             type: 'success',
                             confirmButtonText: 'Ok'                                    
                            }).then((result) => {
                                if (result.value) {
                                  window.location = '../user/profile.php';
                                }
                            })
                        </script>";
        }
    ?>
    <!-- END SweetAlert2 -->
</html>
