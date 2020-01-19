<?php
include('../menu/menu.php');
?>
<?php
    include_once("../../actions/db_connection.php");
    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);
?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Category List</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Label</th>
                                                    <th>Note</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $counter = 1;
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>".$counter."</td>";
                                                        echo "<td>".$row["label_cat"]."</td>";
                                                        echo "<td>".$row["desc_cat"]."</td>";
                                                        echo "<td>";
                                                            if($row["status"] == 1){
                                                                echo "<label class='badge badge-primary'>Active</label>";
                                                            }
                                                            else{
                                                                echo "<label class='badge badge-warning'>Hidden</label>";
                                                            }   
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo "<div class='row col-sm-10'>";
                                                         // only the super admin and manager can execute these actions
                                                        if($_SESSION['role'] != 'S'):
                                                                echo "<form action='modify_category.php?id=".$row['id_cat']."'              method='post'> <button class='btn btn-outline-primary'                type='submit'>Modify</button> 
                                                                       </form>";
                                                        
                                                            if($row["status"] == 1){
                                                                echo "<form action='actions/hide_category.php?id=".$row['id_cat']."'              method='post'> 
                                                                  <button class='btn btn-outline-primary'>Hide</button> </form>";
                                                            }
                                                            else{
                                                                echo "<form action='actions/show_category.php?id=".$row['id_cat']."'              method='post'> 
                                                                  <button class='btn btn-outline-primary'>Show</button> </form>";
                                                            } 
                                                        endif;
                                                        echo "</td>";
                                                        echo "</tr>";
                                                        $counter ++;
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
        if(isset($_GET['success'])){
            echo "<script>
                    Swal.fire({
                      text: 'Update category succeded!',
                      type: 'success',
                      confirmButtonText: 'Ok'    
                    }).then((result) => {
                        if (result.value) {
                          window.location = 'category_list.php';
                        }
                    })
                  </script>";
        }
            
    ?>
</body>

</html>
