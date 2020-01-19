<?php
    include '../../actions/db_connection.php';
    include('../menu/menu.php');
    $id= $_SESSION['id'];
    $sql = "SELECT * FROM admin WHERE role != 'A'";
    $res = mysqli_query($conn, $sql);
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
                                                    <th>Id</th>
                                                    <th>Full Name</th>
                                                    <th>Role</th>
                                                    <th>Creation Date</th>
                                                    <th>E-mail</th>
                                                    <th>Phone number</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    echo "<tr>";
                                                        echo "<td>".$row['id_admin']."</td>";
                                                        echo "<td>".$row['full_name']."</td>";
                                                        echo "<td>";
                                                            echo "<label class='badge badge-primary'>";
                                                                if ($row['role'] == 'A'){
                                                                    $role = "Super Admin";
                                                                } else if($row['role'] == 'M'){
                                                                    $role = "Manager";
                                                                } else if($row['role'] == 'S') {
                                                                    $role = "Seller";
                                                                }
                                                                echo $role;
                                                            echo "</label>";
                                                        echo "</td>";
                                                        echo "<td>".date("d/m/Y", strtotime( $row['date_C']))."</td>";
                                                        echo "<td>".$row['email']."</td>";
                                                        echo "<td>+212 ".$row['mobile']."</td>";
                                                        echo "<td>";
                                                            if($row['status'] == '1'){
                                                                echo "<label class='badge badge-success'>Active</label>";
                                                            }else if($row['status'] == '0'){
                                                                echo "<label class='badge badge-danger'>Blocked</label>";
                                                            }
                                                        echo "</td>";
                                                        echo "<td>";
                                                        $id_ad = $row['id_admin'];
                                                        $sql1 = "SELECT * FROM activitylog WHERE id_admin = '$id_ad' ";
                                                        $res1 = mysqli_query($conn, $sql1);
                                                        $row1 = mysqli_num_rows($res1);
                                                        echo "<div class='row'>";
                                                            echo "<div class='col-sm-5'>";
                                                            if($row['status'] == 1){
                                                                echo "<form action='actions/block.php?id=".$row['id_admin']."' method='post'>
                                                                        <button class='btn btn-outline-primary'>Block</button>
                                                                      </form>";
                                                            }elseif ($row['status'] == 0){
                                                                echo "<form action='actions/unblock.php?id=".$row['id_admin']."' method='post'>
                                                                        <button class='btn btn-outline-primary'>unBlock</button>
                                                                      </form>";
                                                            }
                                                            echo "</div>";
                                                            echo "<div class='col-sm-6'>";
                                                            if($row1 == 0){
                                                                echo "<form action='actions/delete.php?id=".$row['id_admin']."' method='post'>
                                                                            <button class='btn btn-outline-primary'>Delete</button>
                                                                          </form>";
                                                            }
                                                            echo "</div>";
                                                        echo "</div>";
                                                        echo "</td>";
                                                    echo "</tr>";
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
</body>

