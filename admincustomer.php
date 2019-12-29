<!doctype html>
<?php require"connect.php";
?>
<html lang="en">
   <?php require"header.php";?>
      <body>  
        <?php require"adminnav.php";?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                   
                <div class="card">
				<h5 class="card-header">Manage Customer</h5>
				<div class="card-body">
					<div class="container">
						<div class="table-responsive">
							<table class="table table-striped table-sm">
							  <thead>
								<tr>
								  <th>ID</th>
								  <th>NAME</th>
								  <th>EMAIL</th>
								  <th>PHONE</th>
								  <th>GENDER</th>
								</tr>
							  </thead>
							  <?php
									$table = "select * from USER where type='User'";
									$r = mysqli_query($link, $table);
									while($result = mysqli_fetch_assoc($r))
									{
								?>
							  <tbody>
								<tr>
								  <td><?php echo $result['USERID'];?></td>
								  <td><?php echo $result['NAME'];?></td>
								  <td><?php echo $result['EMAIL'];?></td>
								  <td><?php echo $result['PHONE'];?></td>
								  <td><?php echo $result['GENDER'];?></td>
								</tr>
							  </tbody>
                                <?php }?>
							</table>
						</div>
					</div>
				</div>
			</div>  
                
            </main>
            </div>
        </div>

        



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>