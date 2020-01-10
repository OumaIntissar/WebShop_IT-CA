<?php
include('../menu/menu.php');
?>
<?php
    include_once("../../actions/db_connection.php");
    $sql = "SELECT * FROM `order`";
    $result = $conn->query($sql);
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
                                    <?php
                                        //row counter 
                                        $counter = 1;
                                        //Order data list
                                        while($row = $result->fetch_assoc()) {
                                            //Get customer info : full name and phone number
                                            $cost_sql = "SELECT * FROM `costumer` WHERE id_cost =".$row["id_cost"];
                                            $cost_result = $conn->query($cost_sql);
                                            $cost_row = $cost_result->fetch_assoc();
                                            
                                            echo "<tr>";
                                            echo "<td>".$counter."</td>"; $counter++;
                                            
                                            echo "<td>".$row["code"]."</td>";
                                            echo "<td>".$row["date"]."</td>";
                                            
                                            echo "<td>".$cost_row["full_name"]."</td>";
                                            echo "<td>".$cost_row["phone"]."</td>";
                                            
                                            echo "<td>".$row["total_price"]."</td>";
                                            
                                            //Determine order status 
                                            if($row["status"] == '0'){
                                                echo "<td><label class='badge badge-warning'>Pending</label></td>";
                                            }else{
                                                echo "<td><label class='badge badge-success'>Delivered</label></td>";
                                            } 
                                            //Action section
                                            echo "<td>";
                                            echo "<form action='view_order.php' method='post'>
                                                    <input type='hidden' name='id' value='".$row["id_order"]."'>
                                                    <button class='btn btn-outline-primary' type='submit'>View</button>
                                                  </form>";
                                            
                                            //Approuve action is only possilble if the order status = 0
                                            if($row["status"] == '0'):
                                            echo "<form action='approuve_order.php' method='post'>
                                                    <input type='hidden' name='id' value='".$row["id_order"]."'>
                                                    <button class='btn btn-outline-primary' type='submit'>Approuve</button>
                                                  </form>";
                                            endif;
                                            
                                            echo "</td>";
                                            //End of Action section
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

</html>
