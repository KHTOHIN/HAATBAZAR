<?php
if (isset($_SESSION['TYPE']) && isset($_SESSION['USERID'])) {
    if($_SESSION['TYPE']=='Admin') {
        header("location:adminindex.php");
    }
}else{
    header("location:index.php");
}

$id = $_SESSION['USERID'];
?>
                     
                    <?php
                        $sql = "select COUNT(PRODUCTID) from cart where USERID='$id'";
                        $PROCART = mysqli_query($link, $sql);
                        $PROCARTRESULT = mysqli_fetch_array($PROCART);
                    ?>
                      <ul class="nav justify-content-end bg-light">
            <li class="nav-item">
                <a class="nav-link" href="usercart.php"><i class="fas fa-shopping-cart"> Cart<span class="badge badge-danger"> <?php echo $PROCARTRESULT['COUNT(PRODUCTID)']; ?></span></i></a>
            </li>
        </ul>
        
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">HaatBazar</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item dropleft text-nowrap">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-alt"> My Account</i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="userprofile.php"><i class="fas fa-user"> Profile</i></a>
                        <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"> Logout</i></a>
                    </div>
                </li>
            </ul>
        </nav>
        
        

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column" style="padding-top: 40px;">
                            <?php
                                $category = "select * from category";
                                $cate = mysqli_query($link, $category);
                                while($CATEGORYRESULT = mysqli_fetch_assoc($cate))
                                {
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="usershop.php?cid=<?php echo $CATEGORYRESULT['CATEGORYID'];?>"><span data-feather="file"></span><?php echo $CATEGORYRESULT['CATEGORYNAME'];?></a>
                                </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </nav>