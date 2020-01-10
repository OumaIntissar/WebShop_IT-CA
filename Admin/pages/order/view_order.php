<?php
include('../menu/menu.php');
?>
<?php
    include_once("../../actions/db_connection.php");
    $id_order = $_POST['id'];
    //echo $id_order;
    $sql = "SELECT * FROM `order` WHERE id_order = '$id_order'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card px-2">
                        <div class="card-body">
                            <div class="container-fluid">
                                <h3 class="text-right my-5">Order&nbsp;&nbsp;#123-45</h3>
                                <hr>
                            </div>
                            <div class="container-fluid d-flex justify-content-between">
                                <div class="col-lg-3 pl-0">
                                    <p class="mt-7 mb-2 "><b>Ordered by</b></p>
                                    <p>Ilham Bouicha</p>
                                    <p>Address: C-201, Oulfa-34800 Casablanca</p>
                                    <p>Phone number: +2120000-000000<br></p>
                                </div>
                                <div class="col-lg-3 pr-0">
                                    <p class="mt-5 mb-2 text-right"><b>Gadget WebShop</b></p>
                                    <p class="text-right">Morocco</p>
                                </div>
                            </div>
                            <div class="container-fluid d-flex justify-content-between">
                                <div class="col-lg-3 pl-0">
                                    <p class="mb-0 mt-5">Order Date : 17/07/2019</p>
                                    <p>Delivery Date : <span style="color: red">no delivered yet!</span></p>
                                </div>
                            </div>
                            <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                                <div class="table-responsive w-100">
                                    <table class="table">
                                        <thead>
                                            <tr class="bg-dark text-white">
                                                <th>#</th>
                                                <th>Label</th>
                                                <th class="">Category</th>
                                                <th class="text-right">Price</th>
                                                <th class="text-right">Quantity</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-right">
                                                <td class="text-left">1</td>
                                                <td class="text-left">Dell inspiron 15 5578</td>
                                                <td class="text-left">Computers & laptops</td>
                                                <td>2099 MAD</td>
                                                <td>1</td>
                                                <td>2099 MAD</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="container-fluid mt-5 w-100">
                                <h4 class="text-right mb-5">Total : 2099 MAD</h4>
                                <hr>
                            </div>
                            <div class="container-fluid w-100">
                                <a href="#" class="btn btn-success float-right mt-4">Approuve</a>
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
