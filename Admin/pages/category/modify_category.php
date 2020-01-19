<?php
include('../menu/menu.php');
?>
<?php
    include_once("../../actions/db_connection.php");
    $category_id = $_GET["id"];
    $res = mysqli_query($conn, "SELECT * from category WHERE id_cat='$category_id'");
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
    }
?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modify Category</h4>
                            <form class="forms-sample" action="actions/update_category.php" method="post">
                                <div class="form-group row">
                                    <label for="label" class="col-sm-3 col-form-label">Label</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="lab_name" class="form-control" id="label" placeholder="Label"
                                                value="<?php echo $row["label_cat"]; ?>"
                                        required>
                                        <input type="hidden" name="cat_id" value="<?php echo $category_id; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="taskOption">
                                            <option <?php if($row["status"]=="1") echo 'selected="selected"'; ?>>Active</option>
                                            <option <?php if($row["status"]=="0") echo 'selected="selected"'; ?>>Hidden</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="text" rows="7" id="description" placeholder="Description" required><?php echo $row["desc_cat"]; ?></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn btn-light" onclick="location.href='category_list.php';" >Cancel</button>
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

</html>