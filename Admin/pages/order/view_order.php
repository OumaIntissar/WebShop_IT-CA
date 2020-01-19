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

    //Get customer info : full name, phone number and address
    $cost_sql = "SELECT * FROM `costumer` WHERE id_cost =".$row["id_cost"];
    $cost_result = $conn->query($cost_sql);
    $cost_row = $cost_result->fetch_assoc();

    //Get product list related to the order 
    $list_product_sql = "SELECT * FROM `order_product` WHERE id_order = '$id_order'";
    $list_product_result = $conn->query($list_product_sql);
    
?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card px-2">
            <div class="card-body">
                <div class="container-fluid">
                    <h3 class="text-right my-5">Order&nbsp;&nbsp;<?php echo '#'.$row["id_order"];?></h3>
                    <hr>
                </div>
                <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-6 pl-0">
                        <p class="mt-7 mb-2 "><b>Ordered by</b></p>
                        <p><?php echo $cost_row["full_name"];?></p>
                        <p><?php echo $row["address"];?></p>
                        <p><?php echo $cost_row["phone"];?><br></p>
                    </div>
                    <div class="col-lg-3 pr-0">
                        <p class="mt-5 mb-2 text-right"><b>Gadget WebShop</b></p>
                        <p class="text-right">Morocco</p>
                    </div>
                </div>
                <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-6 pl-0">
                        <p class="mb-0 mt-5">Order Date : <?php echo $row["date"];?></p>
                        <p>Delivery Date :
                            <?php 
                                            //Show Delivery date only if order status =1
                                            if($row["status"] == '0'){
                                                echo "<span style='color: red'>no delivered yet!       </span>";
                                            }else
                                                echo $row["delivery_date"];
                                        ?>

                        </p>
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
                                <?php
                                        //row counter 
                                        $counter = 1;
                                        //Order Products data list
                                        while($lp_row = $list_product_result->fetch_assoc()) {
                                            //Get product info 
                                            $prod_sql = "SELECT * FROM `product` p JOIN `category` c ON p.id_cat = c.id_cat  WHERE id_prod=".$lp_row["id_prod"];
                                            $prod_result = $conn->query($prod_sql);
                                            $prod_row = $prod_result->fetch_assoc();
                                            
                                            echo "<tr class='text-right'>";
                                            echo "<td>".$counter."</td>"; $counter++;
                                            
                                            echo "<td class='text-left'>".$prod_row["label_prod"]."           </td>";
                                            echo "<td class='text-left'>".$prod_row["label_cat"]."           </td>";
                                            echo "<td class='text-left'>".$prod_row["price_prod"]."           </td>";
                                            echo "<td>".$lp_row["quantity"]."</td>";
                                            
                                            echo "<td>".number_format($lp_row["quantity"] * $prod_row["price_prod"], 2 )."</td>";
                                           
                                            echo "</tr>";
                                            
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container-fluid mt-5 w-100">
                    <h4 class="text-right mb-5"><?php echo $row["total_price"];?></h4>
                    <hr>
                </div>
                <?php 
                                //Approuve action is only possilble if the order status = 0
                                if($row["status"] == '0'):
                                echo "<div class='container-fluid w-100'>
                                            <form action='approuve_order.php' method='post'>
                                                <input type='hidden' name='id' value='".$row["id_order"]."'>
                                                <button class='btn btn-success  float-right mt-4' type='submit'>Approuve</button>
                                            </form>
                                       </div>";
                                endif;
                            ?>
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
