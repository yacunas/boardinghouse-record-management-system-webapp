<?php
if(!isset($_SESSION)) { 
  session_start(); 
}

$user_id = $_SESSION['user_id'];

$db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');

if(!$db){
    echo "Error db connection";
}

else{
    $query = "SELECT * FROM users WHERE id = '{$user_id}'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);

    if(mysqli_num_rows($result) > 0 ){
        $username = $row['username'];
        $password = $row['password'];
    }

    $query = "SELECT * FROM occupants WHERE user_id = '{$user_id}'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);

    if(mysqli_num_rows($result) > 0 ){
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $gender = $row['gender'];
        $address = $row['address'];
        $contact = $row['contact'];
        $id = $row['id'];
        $_SESSION['occupant_id'] = $id;
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, severny admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, pixel  design, pixel  dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Pixel Admin is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Profile</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/pixel-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="https://wrappixel.com/demos/free-admin-templates/all-lite-landing-pages/assets/images/logos/pixel-favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg "
                    href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i
                        class="fa fa-bars"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b><img
                                src="../plugins/images/pixeladmin-logo.png" alt="home" /></b><span
                            class="hidden-xs"><img src="../plugins/images/pixeladmin-text.png" alt="home" /></span></a>
                </div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i
                                    class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <?php $imagesource = ($gender == 'Male') ? '../plugins/images/users/male.jpg' : '../plugins/images/users/female.jpg' ?>
                        <a class="profile-pic" href="#"> <img src="<?php echo $imagesource; ?>" alt="user-img"
                                width="36" class="img-circle"><b class="hidden-xs"><?php echo "{$firstname}";?></b> </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.php" class="waves-effect"><i class="fa fa-user fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                    </li>
                    <li>
                        <a href="payments.php" class="waves-effect"><i class="fa fa-table fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Payments</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                            <label type="button" class="btn btn-danger pull-right m-l-20 waves-effect waves-light btn-rounded btn-outline hidden-xs hidden-sm" data-toggle="modal" data-target="#logoutModal">
                                Logout
                                </label>                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Profile page</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <!-- Logout Modal -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Logout</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to logout?
                    </div>
                    <div class="modal-footer">
                        <label type="button" class="btn btn-secondary" data-dismiss="modal">Close</label>
                        <a href="<?php echo "../login.php";?>" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Logout</a>
                        <!-- <button type="button" class="btn btn-primary">Logout</button> -->
                    </div>
                    </div>
                </div>
                </div> 
                <!-- --------------------------- -->



                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                    <?php $imagesource = ($gender == "Male") ? "../plugins/images/users/male.jpg" : "../plugins/images/users/female.jpg"; ?>
                                        <a href="javascript:void(0)"><img src="<?php echo  $imagesource; ?>"
                                                class="thumb-lg img-circle" ></a>
                                        <h4 class="text-white"><?php echo "{$username}";?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form method="post" action="index-validation.php" class="form-horizontal form-material">
                                
                                <div class="form-group">
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input name="firstName" type="text" placeholder="<?php echo "{$firstname}";?>" value="<?php echo "{$firstname}";?>"
                                            class="form-control form-control-line"> </div>
                                        <br/>
                                        <?php if (isset($firstName_error)){?>
                                            <code class = "col-md-12"><?php echo $firstName_error; ?></code>
                                            <!-- <label class="col-sm-12"></label> -->
                                        <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Last Name</label>
                                    <div class="col-md-12">
                                        <input name="lastName" type="text" placeholder="<?php echo "{$lastname}";?>" value="<?php echo "{$lastname}";?>"
                                            class="form-control form-control-line"> 
                                    </div> 
                                    <br/>
                                        <?php if (isset($lastName_error)){?>
                                            <code class = "col-md-12"><?php echo $lastName_error; ?></code>
                                        <?php } ?>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12">Gender</label>
                                    <div class = "col-md-12">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" <?php if($gender == 'Male'){echo 'checked="checked"'; } ?>>
                                            <label class="form-check-label" for="inlineRadio1">Male</label>

                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" <?php if($gender == 'Female'){echo 'checked="checked"'; } ?>>
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>

                                    </div>  
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12">Address</label>
                                    <div class="col-md-12">
                                        <input name="address" type="text" placeholder="<?php echo "{$address}";?>" value="<?php echo "{$address}";?>"
                                            class="form-control form-control-line"> 
                                    </div>
                                    <br/>
                                        <?php if (isset($address_error)){?>
                                            <code class = "col-md-12"><?php echo $address_error; ?></code>
                                        <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Contact No</label>
                                    <div class="col-md-12">
                                        <input name="contact" type="text" placeholder="<?php echo "{$contact}";?>" value="<?php echo "{$contact}";?>"
                                            class="form-control form-control-line"> </div>
                                    <br/>
                                        <?php if (isset($contact_error)){?>
                                            <code class = "col-md-12"><?php echo $contact_error; ?></code>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Room No</label>
                                    <div class="col-md-12">
                                        <select class="btn btn-warning dropdown-toggle col-sm-1" name="room">
                                            
                                            <?php
                                            $query2 = "SELECT * FROM rooms ORDER BY room";
                                            $result2 = mysqli_query($db, $query2);

                                            while($roomrow = mysqli_fetch_array($result2)){
                                                if($roomrow['id']== $row['room_id']){
                                                    echo "<option disabled selected value='{$roomrow['room']}'>{$roomrow['room']}</option>";
                                                    $room_rate = $roomrow['rate'];
                                                }
                                                else{
                                                    echo "<option disabled value='{$roomrow['id']}'>{$roomrow['room']}</option>";    
                                                }
                                            }?>                                            
    
                                        </select>
                                    </div>                                
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Room Rate</label>
                                    <div class="col-md-12">
                                        <input disabled name="contact" type="text" placeholder="<?php echo "{$room_rate}";?>" value="<?php echo "{$room_rate}";?>"
                                            class="form-control form-control-line"> </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input name="username" type="text" placeholder="<?php echo "{$username}";?>" value="<?php echo "{$username}";?>"
                                            class="form-control form-control-line">
                                        </div>
                                        <br/>
                                        <?php if (isset($username_error)){?>
                                            <code class = "col-md-12"><?php echo $username_error; ?></code>
                                        <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input name="password" type="password" value="<?php echo "{$password}";?>" class="form-control form-control-line">
                                    </div>
                                    <br/>
                                        <?php if (isset($password_error)){?>
                                            <code class = "col-md-12"><?php echo $password_error; ?></code>
                                        <?php } ?>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; Boarding House System 
                <!-- <a href="https://www.wrappixel.com/">wrappixel.com</a>  -->
            </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>