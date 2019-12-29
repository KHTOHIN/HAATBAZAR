<!doctype html>
<?php require"connect.php";
?>
<html lang="en">
   <?php require"header.php";?>
      <body>  
        <?php require"adminnav.php";?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                   
                <div class="card">
				<h5 class="card-header">REPORT</h5>
				<div class="card-body">
					<div class="container">

                        <form method="post">
                            <input type="date" name="dateFrom">
                            <input type="date" name="dateTo">
                            <input type="submit" name="Search" value="submit">
                        </form>
            <?php
            if(isset($_POST['Search'])){
                $dateFrom = $_POST['dateFrom'];
                $dateTo = $_POST['dateTo'];
            }
                ?>
                        <br>
<!--                        <div class="container-fluid" style="height: 30vh; overflow-y: scroll ;">-->
                            <div id="report1">
                                <div style="text-align: center">
                                    <h3>Order Report of Hat Bazaar</h3>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>SL</th>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Total Price</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php
                                        $sql ="select * from orders where date(ORDERDATE) between date('".$dateFrom."') and date('".$dateTo."') order by ORDERDATE asc";
                                        if($result = mysqli_query($link,$sql)){
//                                            echo 'successful';
                                        }else{
                                            echo mysqli_error($link);
                                        }
                                        $sl = 0 ;
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo '<tr>'.
                                                '<td>'.(++$sl).'</td>'.
                                                '<td>'.$row['ORDERID'].'</td>'.
                                                '<td>'.$row['ORDERDATE'].'</td>'.
                                                ' <td>'.$row['TOTALPRICE'].'</td>'.
                                                ' <td>'.$row['PAYMENTMETHOD'].'</td>'.
                                                '<td>'.$row['STATUS'].'</td>'.'</tr>';
                                        }
                                        ?>
                                    </table>

                                </div>
                            </div>
                            <a href="#" onclick="reportPrint('report1')">Print Report</a>
<!--                        </div>-->

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
        <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });

      function reportPrint(id){
          var divElements = document.getElementById(id).innerHTML;
          //Get the HTML of whole page
          var oldPage = document.body.innerHTML;
          document.body.innerHTML = divElements;
          window.print();
          window.onafterprint = function(){
              document.body.innerHTML = oldPage;
          }
          window.location.href = "";
      }
    </script>
    </body>
</html>