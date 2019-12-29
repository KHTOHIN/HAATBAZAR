<!doctype html>
<?php require"connect.php";?>
<html lang="en">
<?php require 'header.php';?>
       <body>   
        <?php require 'usernav.php';?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  
                  
                  <div class="row">
                  
                <?php
                    $productcategory = "select * from Product where STOCK>=1 AND CATEGORYID=". $_GET['cid'];
                    $product = mysqli_query($link, $productcategory);
                    while($productresult = mysqli_fetch_assoc($product))
                {
                ?>
                    <div class="col-2" style="width: 12rem;height: 16rem;">
                        <a class="card" href="userproduct.php?pid=<?php echo $productresult['PRODUCTID'];?>">
                            <div class="card-body">
                                <figure class="figure">
                                    <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($productresult['PRODUCTPICTURE']); ?>" class="figure-img img-fluid rounded" alt="...">
                                    <figcaption class="figure-caption"><Strong><?php echo $productresult['PRODUCTNAME'];?></Strong></figcaption>
                                    <figcaption class="figure-caption" style="color: red;"><?php echo $productresult['PRICE'];?>৳</figcaption>
                                </figure>
                            </div>
                        </a>			
                    </div>
                <?php
                    }
                ?>
           
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