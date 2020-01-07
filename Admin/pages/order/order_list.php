<?php
include('../menu/menu.php');
?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Order List</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Order code</th>
                                                    <th>Date</th>
                                                    <th>Customer's Full Name</th>
                                                    <th>Customer's Phone</th>
                                                    <th>Total Price</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>#123-45</td>
                                                    <td>02/12/2019</td>
                                                    <td>Ilham Ait hafid</td>
                                                    <td>+2120000-000000</td>
                                                    <td>1999 MAD</td>
                                                    <td>
                                                        <label class="badge badge-warning">Pending</label>
                                                    </td>
                                                    <td>
                                                        <form action="view_order.php">
                                                            <button class="btn btn-outline-primary" type="submit">View</button>
                                                            <button class="btn btn-outline-primary" type="reset">Approuve</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>#983-35</td>
                                                    <td>29/11/2019</td>
                                                    <td>Fatiha Habli</td>
                                                    <td>+2120000-000000</td>
                                                    <td>2049 MAD</td>
                                                    <td>
                                                        <label class="badge badge-warning">Pending</label>
                                                    </td>
                                                    <td>
                                                        <form action="view_order.php">
                                                            <button class="btn btn-outline-primary" type="submit">View</button>
                                                            <button class="btn btn-outline-primary" type="reset">Approuve</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>#656-04</td>
                                                    <td>17/07/2019</td>
                                                    <td>Ilham Bouicha</td>
                                                    <td>+2120000-000000</td>
                                                    <td>599 MAD</td>
                                                    <td>
                                                        <label class="badge badge-success">Delivered</label>
                                                    </td>
                                                    <td>
                                                        <form action="view_order.php">
                                                            <button class="btn btn-outline-primary" type="submit">View</button>
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

</html>
