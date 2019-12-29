<?php
if(!isset($_SESSION))session_start();

if (isset($_SESSION['TYPE']) && isset($_SESSION['USERID'])) {
    if($_SESSION['TYPE']=='User') {
        header("location:userindex.php");
    }
    if($_SESSION['TYPE']=='Admin') {
        header("location:Adminindex.php");
    }
}
?>
       <?php
        if(isset($_POST['Login']))
            {
            $EMAIL=$_POST['email'];
            $PASSWORD=$_POST['password'];
            $login="select * from user where EMAIL='".$EMAIL."'AND PASSWORD='".$PASSWORD."'";
            $result=mysqli_query($link,$login);
            if(mysqli_num_rows($result)==1)
                {
                $row=mysqli_fetch_assoc($result);
                $_SESSION['USERID']=$row['USERID'];
                $_SESSION['TYPE']=$row['TYPE'];
                if($_SESSION['TYPE']=='Admin') 
                    {
                        header("location:adminindex.php");
                    }
                else if($_SESSION['TYPE']=='User') 
                    {
                        header("location:userindex.php");
                    }
                }
            else
                {			
                echo "<script>
                alert('wrong password');
                </script>";
                }   
            }
        ?>
         <?php
        if(isset($_POST['signup']))
            {
                $NAME = $_POST['name'];
                $GENDER = $_POST['gender'];
                $ADDRESS = $_POST['address'];
                $PHONE = $_POST['phone'];
                $EMAIL = $_POST['email'];
                $PASSWORD = $_POST['password'];
                $sql="INSERT INTO `USER`(`NAME`, `GENDER`, `DELIVERYADDRESS`, `PHONE`, `EMAIL`, `PASSWORD`, `TYPE`) VALUES ('$NAME','$GENDER','$ADDRESS','$PHONE','$EMAIL','$PASSWORD','User')";

                if(mysqli_query($link, $sql))
                {
                    $s="select userid from user where EMAIL='$EMAIL'";
                    $result=mysqli_query($link,$s);
                    $row=mysqli_fetch_assoc($result);
                    $_SESSION['USERID']=$row['USERID'];
                    header("location:userindex.php");
                }
                else
                {
                    echo "Problem";
                }
            }
        ?>
          
           <ul class="nav justify-content-end bg-light">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-shopping-cart"> Cart<span class="badge badge-danger"></span></i></a>
            </li>
        </ul>
        
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">HaatBazar</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" data-toggle="modal" data-target="#Login" href="#"><i class="fas fa-sign-in-alt"> Login/Signin</i></a>
                </li>
            </ul>
        </nav>
        
        <!--Login Modal-->
        <div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group row">
                                <div class="col-sm-1"></div>
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-1"></div>
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <input type="submit" name="Login" class="btn btn-outline-dark btn-block" value="Sign in">
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </form>
                            <div class="row">
                                <p class="text-center col">Don't Have an Account. Need <a class="nav-link" data-toggle="modal" data-target="#Signup" data-dismiss="modal" href="#">Signup</a>.</p>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No Thanks.</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!--Signup Modal-->
        <div class="modal fade" id="Signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Signup</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group row">
                                <div class="col-sm-1"></div>
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-7">
                                    <input type="Text" name="name" class="form-control" id="inputEmail3" placeholder="Name">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-1"></div>
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-7">
                                    <input type="text" name="address" class="form-control" id="inputEmail3" placeholder="Address">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-1"></div>
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-7">
                                    <input type="text" name="phone" class="form-control" id="inputEmail3" placeholder="Phone">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-1"></div>
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-7">
                                    <input type="text" name="gender" class="form-control" id="inputEmail3" placeholder="Gender">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-1"></div>
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-1"></div>
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <input type="submit" name="signup" class="btn btn-outline-dark btn-block" value="Signup">
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </form>
                            <div class="row">
                                <p class="text-center col">Already Have an Account. Need <a class="nav-link" data-toggle="modal" data-target="#Login" data-dismiss="modal" href="#">Login</a>.</p>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No Thanks.</button>
                    </div>
                </div>
            </div>
        </div>
        

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
                                    <a class="nav-link" href="shop.php?cid=<?php echo $CATEGORYRESULT['CATEGORYID'];?>"><span data-feather="file"></span><?php echo $CATEGORYRESULT['CATEGORYNAME'];?></a>
                                </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </nav>