<!doctype html>
<?php require"connect.php";
?>
<html lang="en">
   <?php require"header.php";?>
      <body>  
        <?php require"adminnav.php";?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                              <div class="card-body">
                                <form method="POST">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">PAYMENT METHOD NAME</label>
                                    <input type="text" name="payment" class="form-control" placeholder="paypal,bkash.........." aria-describedby="emailHelp">
                                  </div>
                                  <input type="submit" name="paymentmethod" value="PAYMENT METHOD" class="btn btn-primary">
                                </form>
                                <?php
                                if(isset($_POST['paymentmethod']))
                                    {
                                        $PAYMENT = $_POST['payment'];

                                        $insertproduct="INSERT INTO `paymentmethod`(`PAYMENTMETHODNAME`) VALUES ('$PAYMENT')";
                                        if(mysqli_query($link, $insertproduct))
                                        {
                                            echo "<script>
                                                alert('New Payment Method Inserted.');
                                            </script>";
                                        }
                                        else
                                        {
                                            echo "PROBLEM";
                                        }
                                    } 
                                ?>
                              </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                              <div class="card-body">
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">PAYMENT METHOD NAME</th>
                                    </tr>
                                  </thead>
                                    <?php
                                        $table = "SELECT `PAYMENTMETHODID`, `PAYMENTMETHODNAME` FROM `paymentmethod`";
                                        $r = mysqli_query($link, $table);
                                        while($result = mysqli_fetch_assoc($r))
                                        {
                                    ?>
                                  <tbody>
                                    <tr>
                                      <th scope="row"><?php echo $result['PAYMENTMETHODID'];?></th>
                                      <td><?php echo $result['PAYMENTMETHODNAME'];?></td>
                                    </tr>
                                  </tbody>
                                  <?php } ?>
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