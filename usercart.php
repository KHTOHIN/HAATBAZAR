<!doctype html>
<?php require"connect.php";?>
<html lang="en">
<?php require 'header.php';?>
       <body>   
        <?php require 'usernav.php';?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  
                <div class="row">
                    <div class="col-lg-8">
                        
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Cart</h2>
                                   <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Product PRICE</th>
                                        <th scope="col">Product Quentity</th>
                                        <th scope="col">Total Price</th>

                                        </tr>
                                    </thead>
                                    <?php
                                        $cartsql = "select * from cart where USERID='$id'";
                                        $showcart = mysqli_query($link, $cartsql);
                                        $TOTALPRODUCTPRICE = 0;
                                        $SHIPPINGPRICE = 70;
                                        while($cartresult = mysqli_fetch_assoc($showcart))
                                        {
                                    ?>
                                    <tbody>
                                        <tr>
                                           <?php 
                                                $PRODUCTID=$cartresult['PRODUCTID'];
                                                $PRODUCTSQL="SELECT * FROM PRODUCT WHERE PRODUCTID = '$PRODUCTID'";
                                                $PRODUCTRESULT=mysqli_query($link,$PRODUCTSQL);
                                                 $row=mysqli_fetch_assoc($PRODUCTRESULT);
                                            ?>
                                            <th scope="row"><img style="height: 80px;" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['PRODUCTPICTURE']); ?>" alt="..."></th>
                                            <td><?php echo $row['PRODUCTNAME'];?></td>
                                            <td><?php echo $row['PRICE'];?></td>
                                            <td><?php echo $cartresult['QUENTITY'];?></td>
                                                <?php $TOTALPRICE = $row['PRICE']*$cartresult['QUENTITY'];?>
                                            <td><?php echo $TOTALPRICE;?></td>
                                                <?php $TOTALPRODUCTPRICE = $TOTALPRICE+$TOTALPRODUCTPRICE;?>
                                        </tr>
                                    </tbody>
                                    <?php
                                        }
                                    ?>
                                </table>

                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                                
                        <div class="card">
                            <div class="card-body">
                                <form method="POST">
                                    <h4>Total Product Price : <?php echo $TOTALPRODUCTPRICE;?> </h4>
                                    <h4>Shipping Cost : <?php echo $SHIPPINGPRICE;?> ৳</h4>
                                    <br>
                                    <h2 class="text-center text-danger"><Strong>Subtotal -   
                                    
                                    <input type="text" readonly="true" id="Totalproductprice" name="Totalproductprice" value="<?php echo $TOTALPRODUCTPRICE+$SHIPPINGPRICE;?>/-" style="width: 300px;text-align: center;">
                                    
                                    </Strong></h2>
                                    <div class="form-group">
                                    <label for="exampleFormControlSelect1">PAYMENT METHOD</label>
                                    <select class="form-control" name="paymentmethod" id="exampleFormControlSelect1">
                                      <option>--Select Payment Method--</option>
                                      <?php
                                            $PAYMENTMETHOD = "select * from PAYMENTMETHOD";
                                            $PAYMENT = mysqli_query($link, $PAYMENTMETHOD);
                                            while($PAYMENTRESULT = mysqli_fetch_assoc($PAYMENT))
                                            {
                                        ?>
                                      <option value="<?php echo $PAYMENTRESULT['PAYMENTMETHODNAME'];?>"><?php echo $PAYMENTRESULT['PAYMENTMETHODNAME'];?></option>
                                      <?php 
                                            }
                                        ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Trans ID </label>
                                    <input type="text" name="transid" class="form-control" id="exampleFormControlInput1" placeholder="7Q25DWE95FR1">
                                  </div>
                                    <br>
                                    <input type="submit" name="proceed" class="btn btn-outline-dark" value="CHECKOUT">
                                    <input type="submit" name="cleancart" class="btn btn-outline-dark" value="CLEAN CART">
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
                    <br>
                    
                    <br>
                        <?php
                        if(isset($_POST['cleancart']))
                        {
                            $cleancartsql="DELETE FROM `cart` WHERE USERID='$id'";
                            if(mysqli_query($link, $cleancartsql))
                            {
                                echo "<script>
                                alert('Your cart is now empty.');
                                </script>";
                            }
                            else
                            {
                                echo "Problem";
                            }
                        }
                        ?>
                        
                        <?php
                        if(isset($_POST['proceed']))
                        {
                            $TOTALPRICE = $_POST['Totalproductprice'];
                            $PAYMENTMETHOD = $_POST['paymentmethod'];
                            $TRANSID = $_POST['transid'];
                            $sql="INSERT INTO `orders`(`USERID`, `ORDERDATE`, `TOTALPRICE`, `PAYMENTMETHOD`, `STATUS`, `TRANSID`) VALUES ('$id',CURDATE(),'$TOTALPRICE','$PAYMENTMETHOD','PANDING','$TRANSID')";
                            
                            
                            if(mysqli_query($link, $sql))
                            {
                                $s="SELECT MAX(ORDERID) FROM orders";
                                $result=mysqli_query($link,$s);
                                $row=mysqli_fetch_array($result);
                                $ORDERID=$row['MAX(ORDERID)'];
                                
                                $showcartsql = "select * from cart where USERID='$id'";
                                $showtcart = mysqli_query($link, $showcartsql);
                                while($cartresult = mysqli_fetch_assoc($showtcart))
                                {
                                    $QUENTITY=$cartresult['QUENTITY'];
                                    $PRODUCTID=$cartresult['PRODUCTID'];
                                    $sql="INSERT INTO `orderdetails`(`ORDERID`, `PRODUCTID`, `QUENTITY`) VALUES ('$ORDERID','$PRODUCTID','$QUENTITY')";
                                    if(mysqli_query($link, $sql))
                                    {
                                        $productselect="SELECT * FROM `product` WHERE PRODUCTID='$PRODUCTID'";
                                        $resultproductselect=mysqli_query($link,$productselect);
                                        $res=mysqli_fetch_array($resultproductselect);
                                        $STOCK=$res['STOCK'];
                                        $FINALSTOCK=$STOCK-$QUENTITY;
                                        
                                        $product="UPDATE `product` SET `STOCK`='$FINALSTOCK' WHERE PRODUCTID='$PRODUCTID'";
                                        if(mysqli_query($link, $product))
                                        {
                                            echo "<script>
                                            alert('Your Order Submitted.');
                                            </script>";
                                        }
                                    }
                                }
                                $cleancartsql="DELETE FROM `cart` WHERE USERID='$id'";
                                if(mysqli_query($link, $cleancartsql))
                                {
                                    
                                }
                                
                            }
                            else
                            {
                                echo "Problem";
                            }
                        }
                        ?>
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