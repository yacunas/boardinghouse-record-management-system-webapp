<?php
$db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');

if(!$db){
    echo "Error db connection";
}

if(!isset($_SESSION)) { 
    session_start(); 
}

$id=$_GET['id'];
$_SESSION['id'] = $id;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservations</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/pixel-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="https://wrappixel.com/demos/free-admin-templates/all-lite-landing-pages/assets/images/logos/pixel-favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="../css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../css/colors/blue-dark.css" id="theme" rel="stylesheet">
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
                    href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars
"></i></a>
                <div class="top-left-part"><a class="logo" href="index.php"><b><img
                                src="../../plugins/images/pixeladmin-logo.png" alt="home" /></b><span
                            class="hidden-xs"><img src="../../plugins/images/pixeladmin-text.png" alt="home" /></span></a>
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
                        <a class="profile-pic" href="#"> <img src="../../plugins/images/users/admin.jpg" alt="user-img"
                                width="36" class="img-circle"><b class="hidden-xs">Admin</b> </a>
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
                    <li style="padding: 10px 0 0;">
                        <a href="../index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="../profile/profile.php" class="waves-effect"><i class="fa fa-user fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                    </li>
                    <li>
                        <a href="reservations.php" class="waves-effect"><i class="fa fa-table fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Reservations</span></a>
                    </li>
                    <li>
                        <a href="../occupants/occupants.php" class="waves-effect"><i class="fa fa-table fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Occupants</span></a>
                    </li>
                    <li>
                        <a href="../payments/payments.php" class="waves-effect"><i class="fa fa-table fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Payments</span></a>
                    </li>
                    <li>
                        <a href="../rooms/rooms.php" class="waves-effect"><i class="fa fa-table fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Rooms</span></a>
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
                        <h4 class="page-title">Reservations</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a
                            href="../../login.php"
                            class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Logout</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Reservations</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <!-- <div class="col-md-4 col-xs-12"> -->
                        <div class="white-box">

                            <form method="post" action="reservations-validate.php" class="form-horizontal form-material">
                                <div class="form-group">
                                <?php 
                                $query = "SELECT * FROM reservations WHERE id=$id";
                                $result = mysqli_query($db, $query);
                                $row = mysqli_fetch_array($result);
                                $id = $row['user_id'];

                                $query2 = "SELECT * FROM users WHERE id='{$id}'";
                                $result2 = mysqli_query($db, $query2);
                                $row2 = mysqli_fetch_array($result2);

                                ?>
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input name="firstName" type="text" placeholder="<?php echo $row['firstname'];?>" value="<?php echo $row['firstname'];?>"
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
                                        <input name="lastName" type="text" placeholder="<?php echo $row['lastname'];?>" value="<?php echo $row['lastname'];?>"
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
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" <?php if($row['gender'] == 'Male'){echo 'checked="checked"'; } ?>>
                                            <label class="form-check-label" for="inlineRadio1">Male</label>

                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" <?php if($row['gender'] == 'Female'){echo 'checked="checked"'; } ?>>
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>

                                    </div>  
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12">Address</label>
                                    <div class="col-md-12">
                                        <input name="address" type="text" placeholder="<?php echo $row['address'];?>" value="<?php echo $row['address'];?>"
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
                                        <input name="contact" type="text" placeholder="<?php echo $row['contact'];?>" value="<?php echo $row['contact'];?>"
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
                                                $query3 = "SELECT * FROM occupants WHERE room_id='{$roomrow['id']}'";
                                                $result3 = mysqli_query($db, $query3);

                                                if(mysqli_num_rows($result3)<=0){
                                                    echo "<option value='{$roomrow['id']}'>{$roomrow['room']}</option>";    
                                                }
                                            }
                                            ?>                                            
    
                                        </select>
                                    </div>                                
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input name="username" type="text" placeholder="<?php echo $row2['username'];?>" value="<?php echo $row2['username'];?>"
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
                                        <input name="password" type="password" value="<?php echo $row2['password'];?>" class="form-control form-control-line">
                                    </div>
                                    <br/>
                                        <?php if (isset($password_error)){?>
                                            <code class = "col-md-12"><?php echo $password_error; ?></code>
                                        <?php } ?>
                                </div>

                                <a type="button" href="reservations.php" class="btn btn-primary waves-effect waves-light">Back</a>

                                <button type="submit" name="confirm" class=" btn btn-info waves-effect waves-light">Confirm</button>

                            </form>
                        </div>
                    <!-- </div> -->
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
    <script src="../../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="../js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../js/custom.min.js"></script>
</body>

</html>