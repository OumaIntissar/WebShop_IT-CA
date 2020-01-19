
<style>
    .input-sh{
        border: 1px solid #f6f2f2 !important;
        font-weight: 400 !important;
        font-size: 0.875rem !important;
        height: auto !important;
        padding: 0.875rem 0.875rem !important;
    }
</style>
<?php
include('../menu/menu.php');
?>
<?php
    include_once("../../actions/db_connection.php");
   
    $res_ncat = mysqli_query($conn, "SELECT * from category");
    if(mysqli_num_rows($res_ncat) > 0){
        $row_ncat = mysqli_fetch_assoc($res_ncat);
    }

?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">New Product</h4>
                            <form class="forms-sample" action="actions/new_product.php" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="label" class="col-sm-3 col-form-label">Label</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="label" id="label" placeholder="Label" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="category" class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select required class="form-control" name="category" id="category">
                                        <?php 
                                            $res_cat = mysqli_query($conn, "SELECT * from category");
                                            if(mysqli_num_rows($res_cat) > 0){
                                                while($row_cat = mysqli_fetch_array($res_cat)){
                                        ?>
                                             
                                            <?php 
                                                if($row_cat["status"] == 0) {
                                                    echo '<option style="color: red">'; 
                                                    echo $row_cat["label_cat"].' (hidden)'; 
                                                    echo '</option>';
                                                }
                                                if($row_cat["status"] == 1) {
                                                    echo '<option>'; 
                                                    echo $row_cat["label_cat"]; 
                                                    echo '</option>';
                                                }
                                            ?>                                            
                                            <?php 
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-form-label">Price in MAD</label>
                                    <div class="col-sm-9">
                                        <input type="number" step="0.01" class="form-control" name="price" id="price" placeholder="00.0" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="weight" class="col-sm-3 col-form-label">Weight in Kilograms</label>
                                    <div class="col-sm-9">
                                        <input type="number" step="0.01" class="form-control" name="weight" id="weight" placeholder="00.0" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input type="number" step="0.01" class="form-control" name="quantity" id="quantity" placeholder="00.0" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" rows="7" name="description" id="description" placeholder="Description" required="required"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <!-- <label class="col-sm-3 col-form-label">Image</label> -->
                                    <span class="file-upload-info col-sm-3 col-form-label">Choose files</span>    
                                    <div class="input-group col-sm-9">
                                        <input class ="btn btn-primary" type="file" name="image" multiple>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Image</label>
                                    <div class="custom-file  col-sm-9 ">
                                        <input type="file" name="image" class="custom-file-input  form-control" id="customFileLangHTML">
                                        <label class="custom-file-label" for="customFileLangHTML" data-browse="Bestand kiezen">
                                                Upload Imagez
                                        </label>
                                    </div>
                                </div> -->
                        
                                
<!--                                 
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Image</label>
                                    <input type="file" name="image" class="file-upload-default" required="required">
                                    
                                    <div class="input-group col-sm-9">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" >
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                </div> -->
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
								<button class="btn btn-light" type="reset" onclick="location.href='product_list.php';">Cancel</button>
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
        if(isset($_GET['success']))
            echo "<script>
                    Swal.fire({
                      title: 'Added',
                      text: 'Add product succeded!',
                      type: 'success',
                      confirmButtonText: 'Ok'    
                    }).then((result) => {
                        if (result.value) {
                          window.location = 'product_list.php';
                        }
                    })      
                  </script>";
    ?>


    <!-- End custom js for this page-->
</body>

</html>