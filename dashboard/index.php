<?php
$db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');

if(!$db){
    echo "Error db connection";
}
else{
    $occupantsCount = 0;
    $query = "SELECT COUNT(*) as total FROM occupants";
    $result = mysqli_query($db, $query);
    $count=mysqli_fetch_assoc($result);
    $occupantsCount = $count['total'];

    $roomsCount = 0;
    $query = "SELECT COUNT(*) as total FROM rooms";
    $result = mysqli_query($db, $query);
    $count=mysqli_fetch_assoc($result);
    $roomsCount = $count['total'];

    $roomspercent = $roomsCount - $occupantsCount;
    $roomspercent = 100-(($roomspercent / $roomsCount) *100);

    $reservationsCount = 0;
    $query = "SELECT COUNT(*) as total FROM reservations";
    $result = mysqli_query($db, $query);
    $count=mysqli_fetch_assoc($result);
    $reservationsCount = $count['total'];


}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="../plugins/images/pixeladmin-logo-dark.png">
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
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
                <div class="top-left-part"><a class="logo" href="index.php"><b><img
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
                        <a class="profile-pic" href="#"> <img src="../plugins/images/users/admin.jpg" alt="user-img"
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
                        <a href="index.php" class="waves-effect"><i class="fa fa-clock-o fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="profile/profile.php" class="waves-effect"><i class="fa fa-user fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                    </li>
                    <li>
                        <a href="reservations/reservations.php" class="waves-effect"><i class="fa fa-table fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Reservations</span></a>
                    </li>
                    <li>
                        <a href="occupants/occupants.php" class="waves-effect"><i class="fa fa-table fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Occupants</span></a>
                    </li>
                    <li>
                        <a href="payments/payments.php" class="waves-effect"><i class="fa fa-table fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Payments</span></a>
                    </li>
                    <li>
                        <a href="rooms/rooms.php" class="waves-effect"><i class="fa fa-table fa-fw"
                                aria-hidden="true"></i><span class="hide-menu">Rooms</span></a>
                    </li>

                </ul>
                <!-- <div class="center p-20">
                    <span class="hide-menu"><a href="http://wrappixel.com/templates/pixeladmin/" target="_blank"
                            class="btn btn-danger btn-block btn-rounded waves-effect waves-light">Upgrade to
                            Pro</a></span>
                </div> -->
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <label type="button" class="btn btn-danger pull-right m-l-20 waves-effect waves-light btn-rounded btn-outline hidden-xs hidden-sm" data-toggle="modal" data-target="#logoutModal">
                        Logout
                        </label>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E"
                                        class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb">NEW RESERVATIONS</h5>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger"><?php echo $reservationsCount; ?></h3>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic"
                                        data-icon="&#xe01b;"></i>
                                    <h5 class="text-muted vb">ROOMS</h5>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-megna"><?php echo $roomsCount; ?></h3>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-megna" role="progressbar"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $roomspercent;?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic"
                                        data-icon="&#xe00b;"></i>
                                    <h5 class="text-muted vb">OCCUPANTS</h5>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-primary"><?php echo $occupantsCount; ?></h3>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" role="progressbar"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!--row -->
            
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



                <!--row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">OCCUPANTS
                                <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                                    <!-- <select class="form-control pull-right row b-none">
                                        <option>March 2016</option>
                                        <option>April 2016</option>
                                        <option>May 2016</option>
                                        <option>June 2016</option>
                                        <option>July 2016</option>
                                    </select> -->
                                </div>
                            </h3>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>CONTACT</th>
                                            <th>DUE DATE</th>
                                            <th>RATE</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php 
                                        $query = "SELECT * FROM occupants";
                                        $result = mysqli_query($db, $query);
                                            while($row = mysqli_fetch_array($result)){

                                                $query2 = "SELECT * FROM rooms WHERE id = '{$row['room_id']}'";
                                                $result2 = mysqli_query($db, $query2);
                                                $row2 = mysqli_fetch_array($result2);
                                                   
                                                echo "<tr><td> {$row['firstname']} {$row['lastname']}</td>
                                                <td> {$row['contact']} </td>
                                                <td> {$row['duedate']} </td>
                                                <td> {$row2['rate']} </td></tr>";
                                            }
                                            if(mysqli_fetch_array($result)<=0){
                                                echo "<tr><td>No current occupants</td>";
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table> <a href="occupants.php">Check All Information</a>
                            </div>
                        </div>
                    </div>
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
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    
</body>

</html>