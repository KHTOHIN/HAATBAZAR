<!doctype html>
<?php require"connect.php";
?>
<html lang="en">
   <?php require"header.php";?>
      <body>  
        <?php require"adminnav.php";?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                   
                <div class="card">
                    <div class="card-header">
                        PANDING ORDER
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                      <th>ORDER ID</th>
                                      <th>ORDER DATE</th>
                                      <th>TOTAL PRICE</th>
                                      <th>PAYMENT METHOD</th>
                                    </tr>
                                </thead>
                                <?php
                                    $table = "SELECT * FROM `orders` WHERE STATUS='PANDING'";
                                    $r = mysqli_query($link, $table);
                                    while($result = mysqli_fetch_assoc($r))
                                    {
                                ?>
                                <tbody onClick="OrderClick(<?php echo $result['ORDERID'];?>,'<?php echo $result['ORDERDATE'];?>','<?php echo $result['TOTALPRICE'];?>','<?php echo $result['PAYMENTMETHOD'];?>')">
                                    <tr>
                                        <td><?php echo $result['ORDERID'];?></td>
                                        <td><?php echo $result['ORDERDATE'];?></td>
                                        <td><?php echo $result['TOTALPRICE'];?></td>
                                        <td><?php echo $result['PAYMENTMETHOD'];?></td>
                                    </tr>
                                </tbody>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        CONFIRM OR CANCEL ORDER
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                      <th>ORDER ID</th>
                                      <th>ORDER DATE</th>
                                      <th>TOTAL PRICE</th>
                                      <th>PAYMENT METHOD</th>
                                    </tr>
                                </thead>
                                <?php
                                    $table = "SELECT * FROM `orders` WHERE STATUS='DELIVARED' OR status='CANCEL'";
                                    $r = mysqli_query($link, $table);
                                    while($result = mysqli_fetch_assoc($r))
                                    {
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $result['ORDERID'];?></td>
                                        <td><?php echo $result['ORDERDATE'];?></td>
                                        <td><?php echo $result['TOTALPRICE'];?></td>
                                        <td><?php echo $result['PAYMENTMETHOD'];?></td>
                                        <td><?php echo $result['STATUS'];?></td>
                                    </tr>
                                </tbody>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                
            </main>
            </div>
        </div>

        <div class="modal fade" id="ordermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                        <label for="staticEmail" class="col-sm-4 col-form-label">Order ID</label>
                        <div class="col-sm-8">
                            <input type="text" name="orderid" id="orderid" readonly class="form-control-plaintext">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Order Date</label>
                        <div class="col-sm-8">
                            <input type="text" name="orderdate" id="orderdate" readonly class="form-control-plaintext">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Total Price</label>
                        <div class="col-sm-8">
                            <input type="text" name="totalprice" id="totalprice" readonly class="form-control-plaintext">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Payment Method</label>
                        <div class="col-sm-8">
                            <input type="text" name="PaymentMethod" id="PaymentMethod" readonly class="form-control-plaintext">
                        </div>
                    </div>

                    <div class="form-group row">
                        <input type="submit" name="confirm" class="btn btn-outline-dark btn-block" value="Confirm Order">
                        <input type="submit" name="cancel" class="btn btn-outline-danger btn-block" value="Cancel Order">
                    </div>
                </form>
                
              </div>
            </div>
          </div>
        </div>
        
        <?php
            if(isset($_POST['confirm']))
            {
                $ORDERID = $_POST['orderid'];
                $sql="UPDATE `orders` SET `STATUS`='DELIVARED' WHERE ORDERID='$ORDERID'";

                if(mysqli_query($link, $sql))
                {
                    echo "<script>
                    alert('Order Confirmed.');
                    </script>";
                }
                else
                {
                    echo "Problem";
                }
            }
            if(isset($_POST['cancel']))
            {
                $ORDERID = $_POST['orderid'];
                $sql="UPDATE `orders` SET `STATUS`='CANCEL' WHERE ORDERID='$ORDERID'";

                if(mysqli_query($link, $sql))
                {
                    echo "<script>
                    alert('Ordered Has Been Canceled.');
                    </script>";
                }
                else
                {
                    echo "Problem";
                }
            }
        ?>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script>
          function OrderClick(id,date,price,PaymentMethod){
              debugger;
              $(document).ready(function () {
                  $("#ordermodal").modal("show");

              });
                document.getElementById("orderid").value=id;
                document.getElementById("orderdate").value=date;
                document.getElementById("totalprice").value=price;
                document.getElementById("PaymentMethod").value=PaymentMethod;
          }
        </script>
        
    </body>
</html>