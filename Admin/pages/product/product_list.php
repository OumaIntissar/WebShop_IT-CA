<?php
include('../menu/menu.php');
?>
<?php
    include_once("../../actions/db_connection.php");
    $sql = "SELECT * FROM product INNER JOIN category ON product.id_cat=category.id_cat";
    $result = $conn->query($sql);
?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Product List</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>image</th>
                                                    <th>Label</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Status</th>
                                                    <th>Hidden</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        $id_prod = $row["id_prod"];
                                                ?>
                                                <tr>
                                                    <td><?php echo $id_prod ?></td>
                                                    <td><img src="<?php echo "images/".$row["image_prod"]; ?>" alt="Smiley face" height="60" width="55"></td>
                                                    <td><?php echo $row["label_prod"]; ?></td>
                                                    <td><?php echo $row["label_cat"]; ?></td>  
                                                    <td><?php echo $row["price_prod"]; ?></td>
                                                    <td><?php echo $row["quantity_prod"]; ?></td>
                                                    <td>
                                                        <?php
                                                            if($row["quantity_prod"] == 0){
                                                                echo "<label class='badge badge-danger'>Out Stock</label>";
                                                            }
                                                            else if($row["quantity_prod"] > 0  && $row["quantity_prod"] <= 10){
                                                                echo "<label class='badge badge-secondary'>In Stock</label>";
                                                            }
                                                            else{
                                                                echo "<label class='badge badge-success'>In Stock</label>";
                                                            }
                                                        ?> 
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            if($row["active"] == 1){
                                                                echo "<label class='badge badge-primary'>Active</label>";
                                                            }
                                                            else{
                                                                echo "<label class='badge badge-warning'>Hidden</label>";
                                                            } 
                                                        ?>
                                                    </td>
                                                    <td>
                                                       <?php 
                                                                // only the super admin and manager can execute these actions
                                                                 if($_SESSION['role'] != 'S'){
                                                                     echo "<form action='modify_product.php?id='".$id_prod."' method='POST'> 
                                                                            <button class='btn btn-outline-primary' type='submit'>Modify</button> 
                                                                        </form>";
                                                                    if($row["active"] == 1){
                                                                        echo "<form action='actions/hide_product.php?id=$id_prod' method='POST'> <button class='btn btn-outline-primary' type='submit'>Hide</button></form>";
                                                                    }
                                                                      else{
                                                                        echo "<form action='actions/show_product.php?id=$id_prod' method='POST'> <button class='btn btn-outline-primary' type='submit'>Show</button></form>";
                                                                      }
                                                                 }
                                                            ?>
                                                    </td>                                                  
                                                </tr>
                                                <?php
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
    <?php
        if(isset($_GET['success']))
            echo "<script>showSwal('update-product-succeded');</script>";
    ?>
</body>

</html>
