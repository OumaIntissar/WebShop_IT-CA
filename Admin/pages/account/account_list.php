<?php
include('../menu/menu.php');
?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Account List</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Full Name</th>
                                                    <th>Role</th>
                                                    <th>Date</th>
                                                    <th>E-mail</th>
                                                    <th>Phone number</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Otman Nouinou</td>
                                                    <td>
                                                        <button class="btn btn-outline-primary">Super Admin</button>
                                                    </td>
                                                    <td>02/12/2019</td>
                                                    <td>o.nouinou@gmail.com</td>
                                                    <td>+2120000-000000</td>
                                                    <td>
                                                        <label class="badge badge-success">Active</label>
                                                    </td>
                                                    <td>
                                                        <form action="modify_account.php">
                                                            <button class="btn btn-outline-primary" type="submit">Modify</button>
                                                            <button class="btn btn-outline-primary" type="reset">unBlock</button>
                                                       </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Ameddah Ayoub</td>
                                                    <td>
                                                        <button class="btn btn-outline-primary">Seller</button>
                                                    </td>
                                                    <td>02/12/2019</td>
                                                    <td>a.ameddah@gmail.com</td>
                                                    <td>+2120000-000000</td>
                                                    <td>
                                                        <label class="badge badge-success">Active</label>
                                                    </td>
                                                    <td>
                                                        <form action="modify_account.php">
                                                            <button class="btn btn-outline-primary" type="submit">Modify</button>
                                                            <button class="btn btn-outline-primary" type="reset">unBlock</button>
                                                       </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Ait lachgar Ayoub</td>
                                                    <td>
                                                        <button class="btn btn-outline-primary">Manager</button>
                                                    </td>
                                                    <td>02/12/2019</td>
                                                    <td>a.ameddah@gmail.com</td>
                                                    <td>+2120000-000000</td>
                                                    <td>
                                                        <label class="badge badge-danger">Blocked</label>
                                                    </td>
                                                    <td>
                                                       <form action="modify_account.php">
                                                            <button class="btn btn-outline-primary" type="submit">Modify</button>
                                                            <button class="btn btn-outline-primary" type="reset">unBlock</button>
                                                       </form>
                                                    </td>
                                                </tr>
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
</body>

