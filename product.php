<!doctype html>
<?php require"connect.php";?>
<html lang="en">
<?php require 'header.php';?>
       <body>   
        <?php require 'nav.php';?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  
                  
                  
                  
                <div style="margin: 30px;">
    <div class="row">
        <?php
        $sql = "select * from PRODUCT where PRODUCTID=" . $_GET['pid'];
        $product = mysqli_query($link, $sql);
        $result = mysqli_fetch_array($product);
        ?>
        <div class="col-4">
            <div class="card" href="product.php" style="width: 25rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($result['PRODUCTPICTURE']); ?>"
                             class="figure-img img-fluid rounded" alt="...">
                    </figure>
                </div>
            </div>
        </div>
        <div class="col">
            <form method="POST" action="product.php?id=<?php echo $_GET['pid']; ?>">
                <div class="row">
                    <div class="col">
                        <h2><?php echo $result['PRODUCTNAME']; ?></h2>
                        <br>
                        <hr/>
                        <h1 style="color: red;">৳ <?php echo $result['PRICE']; ?></h1>
                        <p><strong><?php echo $result['STOCK']; ?> itams <font color="green">available</font> </strong></p>
                        <br>
                        <h5>Quantity :  </h5>

                        <button type="button" onclick="Drecrement()" class="btn btn-secondary btn-sm"
                                style="width: 40px;height: 40px;">-
                        </button>
                        <input type="text" readonly="true" id="myNumber" name="qtty" value="1" style="width: 50px;text-align: center;">
                        <script>
                            function Increment() {
                                var val = parseInt(document.getElementById("myNumber").value) + 1;
								if (val > 5) {
                                    val = 5;
                                    alert("Quantity must be less than or equal 5");
                                }
                                document.getElementById("myNumber").value = val;
                            }
                            function Drecrement() {
                                var val = parseInt(document.getElementById("myNumber").value) - 1;
                                if (val < 1) {
                                    val = 1;
                                    alert("Quantity must be more than 0");
                                }
                                document.getElementById("myNumber").value = val;
                            }
                        </script>
                        <button type="button" onclick="Increment()" class="btn btn-secondary btn-sm"
                                style="width: 40px;height: 40px;">+
                        </button>
                    </div>

                </div>

                <br>
				<button type="button" class="btn btn-primary" style="width: 200px;height: 40px;" data-toggle="modal" data-target="#Login" href="#">Buy Now</button>
				<button type="button" class="btn btn-primary" style="width: 200px;height: 40px;" data-toggle="modal" data-target="#Login" href="#">Add To Cart</button>
            </form>
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