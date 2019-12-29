<!doctype html>
<?php require"connect.php";?>
<html lang="en">
<?php require 'header.php';?>
       <body>   
        <?php require 'usernav.php';?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  
                  
                <div class="row">
                    <div class="col-6">
                        <h1 class="text-danger"><strong>PROFILE</strong></h1>
                        <div class="card">
                          <div class="card-body">
                                <img src="image/profile.png" class="rounded d-block" alt="image/profile.png">
                                <br>
                                <?php 
                                    $PROFILE="select * from user where USERID='$id'";
                                    $PRO=mysqli_query($link,$PROFILE);
                                    $PROFILERESULT=mysqli_fetch_assoc($PRO);
                                ?>
                                
                                <table class="table table-borderless">
                                  <tbody>
                                    <tr>
                                      <td>NAME</td>
                                      <td><?php echo $PROFILERESULT['NAME'];?></td>
                                    </tr>
                                    <tr>
                                      <td>PHONE</td>
                                      <td><?php echo $PROFILERESULT['PHONE'];?></td>
                                    </tr>
                                    <tr>
                                      <td>EMAIL</td>
                                      <td><?php echo $PROFILERESULT['EMAIL'];?></td>
                                    </tr>
                                    <tr>
                                      <td>GENDER</td>
                                      <td><?php echo $PROFILERESULT['GENDER'];?></td>
                                    </tr>
                                    <tr>
                                      <td>ADDRESS</td>
                                      <td><?php echo $PROFILERESULT['DELIVERYADDRESS'];?></td>
                                    </tr>
                                  </tbody>
                                </table>
                          </div>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <h1 class="text-danger"><strong>ORDERS</strong></h1>
                        <div class="card">
                          <div class="card-body">
                               <h5 class="text-info"><strong>RECENT ORDERS</strong></h5>
                                <table class="table table-dark">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Order Date</th>
                                      <th scope="col">Total Price</th>
                                      <th scope="col">Payment</th>
                                      <th scope="col">Status</th>
                                    </tr>
                                  </thead>
                                    <?php
                                        $table = "SELECT * FROM `orders` WHERE USERID='$id' AND STATUS='PANDING'";
                                        $r = mysqli_query($link, $table);
                                        while($result = mysqli_fetch_assoc($r))
                                        {
                                    ?>
                                  <tbody>
                                    <tr>
                                      <th scope="row"><?php echo $result['ORDERID'];?></th>
                                      <td><?php echo $result['ORDERDATE'];?></td>
                                      <td><?php echo $result['TOTALPRICE'];?></td>
                                      <td><?php echo $result['PAYMENTMETHOD'];?></td>
                                      <td><?php echo $result['STATUS'];?></td>.
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                                <br>
                                <h5 class="text-primary"><strong>OLD ORDERS</strong></h5>
                                <table class="table table-dark">
                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Order Date</th>
                                      <th scope="col">Total Price</th>
                                      <th scope="col">Payment</th>
                                      <th scope="col">Status</th>
                                    </tr>
                                  </thead>
                                    <?php
                                        $DIV = "SELECT * FROM `orders` WHERE USERID='$id' AND STATUS='DELIVARED' OR status='CANCEL'";
                                        $DIVR = mysqli_query($link, $DIV);
                                        while($result = mysqli_fetch_assoc($DIVR))
                                        {
                                    ?>
                                  <tbody>
                                    <tr>
                                      <th scope="row"><?php echo $result['ORDERID'];?></th>
                                      <td><?php echo $result['ORDERDATE'];?></td>
                                      <td><?php echo $result['TOTALPRICE'];?></td>
                                      <td><?php echo $result['PAYMENTMETHOD'];?></td>
                                      <td><?php echo $result['STATUS'];?></td>.
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                          </div>
                        </div>
                    </div>
                </div>
                
                <br>
           
           
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