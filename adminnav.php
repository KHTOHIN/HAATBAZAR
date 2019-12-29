    <?php
    if(!isset($_SESSION))session_start();
    if (isset($_SESSION['TYPE']) && isset($_SESSION['USERID'])) {
       if($_SESSION['TYPE']=='User') {
            header("location:userindex.php");
        }
    }else{
        header("location:index.php");
    }
?>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminindex.php">Admin Panel</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item dropleft text-nowrap">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-alt"> My Account</i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php"><i class="fas fa-user"> Profile</i></a>
                        <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"> Logout</i></a>
                    </div>
                </li>
            </ul>
        </nav>
        

        

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                  <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link" href="adminindex.php">
                          <span data-feather="home"></span>
                          Dashboard <span class="sr-only">(current)</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="adminorder.php">
                          <span data-feather="file"></span>
                          Orders
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="adminproduct.php">
                          <span data-feather="shopping-cart"></span>
                          Products
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="admincustomer.php">
                          <span data-feather="users"></span>
                          Customers
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="adminreport.php">
                          <span data-feather="bar-chart-2"></span>
                          Reports
                        </a>
                      </li>
                    </ul>
                  </div>
                </nav>