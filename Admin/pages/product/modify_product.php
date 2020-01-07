<?php
include('../menu/menu.php');
?>
<?php
    include_once("../../actions/db_connection.php");
    $prod_id = $_GET["id"];

    

    $res = mysqli_query($conn, "SELECT * from product WHERE id_prod='$prod_id'");
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
    }

    $catId = $row["id_cat"];

    
?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modify Product</h4>
                            <form class="forms-sample" action="actions/update_product.php" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="label" class="col-sm-3 col-form-label">Label</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="prd_label" class="form-control col-sm-9" id="label" placeholder="Label" 
                                               value="<?php echo $row["label_prod"]; ?>"
                                        >
                                        <input type="hidden" name="prod_id" value="<?php echo $prod_id; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="category" class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="prodCat">
                                            <?php 
                                                $selected = '';
                                                $res_cat = mysqli_query($conn, "SELECT * from category where status='1'");
                                                if(mysqli_num_rows($res_cat) > 0){
                                                    while($row_cat = mysqli_fetch_array($res_cat)){
                                        
                                                        if($row_ncat["id_cat"] == $catId) 
                                                            $selected = 'selected="selected"'; 
                                             
                                                        if($row_cat["status"] == 0) {
                                                            echo '<option style="color: red"'.$selected.'>'; 
                                                            echo $row_cat["label_cat"].' (hidden)'; 
                                                            echo '</option>';
                                                        }
                                                        
                                                        if($row_cat["status"] == 1) {
                                                            echo '<option'.$selected.'>'; 
                                                            echo $row_cat["label_cat"]; 
                                                            echo '</option>';
                                                        }
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-form-label">Price in MAD</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="prd_price" step="0.01" class="form-control" id="price" placeholder="00.0"
                                               value="<?php echo $row["price_prod"]; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="weight" class="col-sm-3 col-form-label">Weight in Kilograms</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="prd_quantite" step="0.01" class="form-control" id="weight" placeholder="00.0"
                                        value="<?php echo $row["weight_prod"]; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number" step="0.01" class="form-control" name="quantity" id="quantity" placeholder="00.0"
                                        value="<?php echo $row["quantity_prod"]; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" name="text" class="form-control" rows="7" id="description" placeholder="Description"><?php echo $row["desc_prod"]; ?></textarea>
                                    </div>
                                </div>
                                <!--<div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Image</label>
                                    <input type="file" name="image" class="file-upload-default" required>
                                    
                                    <div class="input-group col-sm-9">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" value="<?php //echo $row["image_prod"]; ?>">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>-->
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn btn-light" onclick="location.href='product_list.php';">Cancel</button>
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
    <?php
        if(isset($_GET['error']))
            echo "<script>showSwal('warning-message-update');</script>";
    ?>
</body>

</html>
