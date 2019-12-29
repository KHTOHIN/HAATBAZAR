<!doctype html>
<?php require"connect.php";
?>
<html lang="en">
   <?php require"header.php";?>
      <body>  
        <?php require"adminnav.php";?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                   
                  <div class="container">
                      <div class="row">
                        <div class="col-sm">
                           
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Product</h5>
                                    
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Product Name</label>
                                                <input type="text" name="productname" class="form-control" id="exampleFormControlInput1" placeholder="Product Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Product Price</label>
                                                <input type="text" name="productprice" class="form-control" id="exampleFormControlInput1" placeholder="Product Price">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Category</label>
                                                <select name="productcategory" class="form-control" id="exampleFormControlSelect1">
                                                    <option>--Select Product Category--</option>
                                                    <?php
                                                        $category = "select * from category";
                                                        $cate = mysqli_query($link, $category);
                                                        while($CATEGORYRESULT = mysqli_fetch_assoc($cate))
                                                        {
                                                    ?>
                                                    <option value="<?php echo $CATEGORYRESULT['CATEGORYID'];?>"><?php echo $CATEGORYRESULT['CATEGORYNAME'];?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Product Image</label>
                                                <input type="file" name="images" class="form-control" id="exampleFormControlInput1" placeholder="Product Image">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Product Details</label>
                                                <textarea class="form-control" name="productdetailes" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Product Stock</label>
                                                <input type="text" name="productstock" class="form-control" id="exampleFormControlInput1" placeholder="Product Stock">
                                            </div>
                                            
                                            <input type="submit" name="insert" class="btn btn-outline-dark btn-block" value="Insert">
                                        </form>
                                        <?php
                                        if(isset($_POST['insert']))
                                            {
                                                $PRODUCTNAME = $_POST['productname'];
                                                $PRODUCTPRICE = $_POST['productprice'];
                                                $PRODUCTCATEGORY = $_POST['productcategory'];
                                                $PRODUCTIMAGE = addslashes(file_get_contents($_FILES["images"]["tmp_name"]));
                                                $PRODUCTDETAILES = $_POST['productdetailes'];
                                                $PRODUCTSTOCK = $_POST['productstock'];
                                            
                                                $insertproduct="INSERT INTO `product`(`PRODUCTNAME`, `CATEGORYID`, `PRODUCTPICTURE`, `DETAILES`, `PRICE`, `STOCK`) VALUES ('$PRODUCTNAME','$PRODUCTCATEGORY','$PRODUCTIMAGE','$PRODUCTDETAILES','$PRODUCTPRICE','$PRODUCTSTOCK')";

                                                if(mysqli_query($link, $insertproduct))
                                                {
                                                    ?>
                                                    <script>
                                                        alert('New Product Uploaded.');
                                                    </script>
                                                    <?php
                                                }
                                                else
                                                {
                                                    echo mysqli_error($link);
                                                }
                                            } 
                                        ?>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Category</h5>
                                    
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Category Name</label>
                                            <input type="text" name="categoryname" class="form-control" id="exampleFormControlInput1" placeholder="Category Name">
                                        </div>

                                        <input type="submit" name="insertcategory" class="btn btn-outline-dark btn-block" value="Insert new Category">
                                    </form>
                                    <?php
                                        if(isset($_POST['insertcategory']))
                                            {
                                                $CATEGORYNAME = $_POST['categoryname'];
                                            
                                                $insertcategory="INSERT INTO `category`( `CATEGORYNAME`) VALUES ('$CATEGORYNAME')";

                                                if(mysqli_query($link, $insertcategory))
                                                {
                                                    ?>
                                                    <script>
                                                        alert('New Category Uploaded.');
                                                    </script>
                                                    <?php
                                                }
                                                else
                                                {
                                                    echo mysqli_error($link);
                                                }
                                            } 
                                        ?>
                                    
                                </div>
                            </div>
                            <br>
                            <div class="card overflow-auto" style="height: 450px;">
                                <div class="card-body">
                                    <h5 class="card-title">Category List</h5>
                                    
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Category Name</th>
                                            </tr>
                                        </thead>
                                        <?php
											$table = "select * from Category";
											$category = mysqli_query($link, $table);
											while($result = mysqli_fetch_assoc($category))
											{
										?>
                                        <tbody onClick="CategoryClick(<?php echo $result['CATEGORYID'];?>,'<?php echo $result['CATEGORYNAME'];?>')">
                                            <tr>
                                                <th scope="row"><?php echo $result['CATEGORYID'];?></th>
                                                <td><?php echo $result['CATEGORYNAME'];?></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                            }
										?>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                          <div class="col">
                              <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Product List</h5>
                                    
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Category</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">STOCK</th>
                                            </tr>
                                        </thead>
                                        <?php
											$product = "select * from Product";
											$showproduct = mysqli_query($link, $product);
											while($productresult = mysqli_fetch_assoc($showproduct))
											{
										?>
                                        <tbody onClick="ProductClick(<?php echo $productresult['PRODUCTID'];?>,'<?php echo $productresult['PRODUCTNAME'];?>','<?php echo $productresult['PRICE'];?>','<?php echo $productresult['STOCK'];?>')">
                                            <tr>
                                               <?php 
                                                    $CATEGORYID=$productresult['CATEGORYID'];
                                                    $CATEGORYSQL="SELECT * FROM CATEGORY WHERE CATEGORYID = '$CATEGORYID'";
                                                    $CATEGORYRESULT=mysqli_query($link,$CATEGORYSQL);
			                                         $row=mysqli_fetch_assoc($CATEGORYRESULT);
                                                ?>
                                                <th scope="row"><img style="height: 80px;" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($productresult['PRODUCTPICTURE']); ?>" alt="..."></th>
                                                <td><?php echo $productresult['PRODUCTNAME'];?></td>
                                                <td><?php echo $row['CATEGORYNAME'];?></td>
                                                <td><?php echo $productresult['PRICE'];?>৳</td>
                                                <td><?php echo $productresult['STOCK'];?></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                            }
										?>
                                    </table>
                                    
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>  
                
            </main>
            </div>
        </div>

        <div class="modal fade" id="productupdatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Product ID</label>
                        <div class="col-sm-8">
                            <input type="text" name="productid" id="productid" readonly class="form-control-plaintext">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Product Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="productname" id="productname" class="form-control-plaintext">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Product Price</label>
                        <div class="col-sm-8">
                            <input type="text" name="productprice" id="productprice" class="form-control-plaintext">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">New Stock</label>
                        <div class="col-sm-8">
                            <input type="text" name="productstock" id="productstock" class="form-control-plaintext">
                        </div>
                    </div>

                    <div class="form-group row">
                        <input type="submit" name="update" class="btn btn-outline-success btn-block" value="Update Info">
                        <input type="submit" name="delete" class="btn btn-outline-warning btn-block" value="Stock Out">
                        <input type="submit" name="ban" class="btn btn-outline-danger btn-block" value="Baned">
                    </div>
                </form>
                
                <?php
            if(isset($_POST['update']))
            {
                $PRODUCTID = $_POST['productid'];
                $PRODUCTNAME = $_POST['productname'];
                $PRODUCTPRICE = $_POST['productprice'];
                $PRODUCTSTOCK = $_POST['productstock'];
                
                $sql="UPDATE `product` SET `PRODUCTNAME`='$PRODUCTNAME',`PRICE`='$PRODUCTPRICE',`STOCK`='$PRODUCTSTOCK' WHERE PRODUCTID='$PRODUCTID'";

                if(mysqli_query($link, $sql))
                {
                    echo "<script>
                    alert('Product updated.');
                    </script>";
                }
                else
                {
                    echo "Problem";
                }
            }
            if(isset($_POST['delete']))
            {
                $PRODUCTID = $_POST['productid'];
                $sql="UPDATE `product` SET `STOCK`='0' WHERE PRODUCTID='$PRODUCTID'";

                if(mysqli_query($link, $sql))
                {
                    echo "<script>
                    alert('Product are now Stockout.');
                    </script>";
                }
                else
                {
                    echo "Problem";
                }
            }
                  
            if(isset($_POST['ban']))
            {
                $PRODUCTID = $_POST['productid'];
                $sql="DELETE FROM `product` WHERE PRODUCTID='$PRODUCTID'";

                if(mysqli_query($link, $sql))
                {
                    echo "<script>
                    alert('Product are now baned.');
                    </script>";
                }
                else
                {
                    echo "Problem";
                }
            }
        ?>
                
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal fade" id="categoryupdatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Product ID</label>
                        <div class="col-sm-8">
                            <input type="text" name="categoryid" id="categoryid" readonly class="form-control-plaintext">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Product Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="categoryname" id="categoryname" class="form-control-plaintext">
                        </div>
                    </div>

                    <div class="form-group row">
                        <input type="submit" name="update" class="btn btn-outline-success btn-block" value="Update Category">
                        <input type="submit" name="delete" class="btn btn-outline-danger btn-block" value="Delete Category">
                    </div>
                </form>
                
                <?php
            if(isset($_POST['update']))
            {
                $CATEGORYID = $_POST['categoryid'];
                $CATEGORYNAME = $_POST['categoryname'];
                
                $sql="UPDATE `category` SET `CATEGORYNAME`='$CATEGORYNAME' WHERE CATEGORYID='$CATEGORYID'";

                if(mysqli_query($link, $sql))
                {
                    echo "<script>
                    alert('Category Updated.');
                    </script>";
                }
                else
                {
                    echo "Problem";
                }
            }
                  
            if(isset($_POST['delete']))
            {
                $CATEGORYID = $_POST['categoryid'];
                $sql="DELETE FROM `category` WHERE CATEGORYID='$CATEGORYID'";

                if(mysqli_query($link, $sql))
                {
                    echo "<script>
                    alert('Category Deleted.');
                    </script>";
                }
                else
                {
                    echo "Problem";
                }
            }
        ?>
                
              </div>
            </div>
          </div>
        </div>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
          function ProductClick(id,name,price,stock){
              debugger;
              $(document).ready(function () {
                  $("#productupdatemodal").modal("show");

              });
                document.getElementById("productid").value=id;
                document.getElementById("productname").value=name;
                document.getElementById("productprice").value=price;
                document.getElementById("productstock").value=stock;
          }
            
         function CategoryClick(id,name){
              debugger;
              $(document).ready(function () {
                  $("#categoryupdatemodal").modal("show");

              });
                document.getElementById("categoryid").value=id;
                document.getElementById("categoryname").value=name;
          }
        </script>
    </body>
</html>