<?php
    include('../menu/menu.php');
    $id = $_SESSION['id'];
?>
			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">New Category</h4>
							<form class="forms-sample" action="actions/new_category.php" method="post">
								<div class="form-group row">
									<label for="label" class="col-sm-3 col-form-label">Label</label>
									<div class="col-sm-9">
										<input type="text" name="label" class="form-control" id="label" placeholder="Label" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="description" class="col-sm-3 col-form-label">Description</label>
									<div class="col-sm-9">
										<textarea type="text" class="form-control" name="text" rows="7" id="description" placeholder="Description" required></textarea>
									</div>
								</div>
								<button type="submit" class="btn btn-primary mr-2">Submit</button>
								<button class="btn btn-light" type="reset" onclick="location.href='category_list.php';">Cancel</button>
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
                      text: 'Add category succeded!',
                      type: 'success',
                      confirmButtonText: 'Ok'    
                    }).then((result) => {
                        if (result.value) {
                          window.location = 'category_list.php';
                        }
                    })      
                  </script>";
    ?>
	<!-- End custom js for this page-->
</body>

</html>
