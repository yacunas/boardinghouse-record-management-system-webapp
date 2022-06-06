<?php
$db = mysqli_connect('localhost', 'root', '', 'boardinghouse_system');

if(!$db){
    echo "Error db connection";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rooms</title>
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
                <div class="top-left-part"><a class="logo" href="../index.php"><b><img
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
                        <a href="../reservations/reservations.php" class="waves-effect"><i class="fa fa-table fa-fw"
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
                        <a href="rooms.php" class="waves-effect"><i class="fa fa-table fa-fw"
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
                        <h4 class="page-title">Rooms</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a
                            href="../../login.php"
                            class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Logout</a>
                        <ol class="breadcrumb">
                            <li><a href="../index.php">Dashboard</a></li>
                            <li class="active">Rooms</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- add Room Modal -->
                <div class="modal fade" id="addroomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Add Room</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="rooms-validate.php" method="post">
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label class="col-md-12">Room #</label>
                               <input name="room" type="text" class="form-control form-control-line"> 
                            <br/>
                                <?php if (isset($room_error)){?>
                                    <code class = "col-md-12"><?php echo $room_error; ?></code>
                                <?php } ?>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Room Rate</label>
                                <input name="rate" type="text" class="form-control form-control-line"> </
                            <br/>
                                <?php if (isset($rate_error)){?>
                                    <code class = "col-md-12"><?php echo $rate_error; ?></code>
                                <?php } ?>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addroom" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>

                    </div>
                </div>
                </div> 
                <!-- --------------------------- -->

                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Rooms</h3>
                            
                            <!-- <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <?php echo $result; ?>    
                                </div>
                            </div>
                             -->
                            <!-- <p class="text-muted">Add class <code>.table</code></p> -->
                            <div class="table-responsive">
                                <table class="table" id="editable_table">
                                    <thead>
                                        <tr>
                                            <th>Room #</th>
                                            <th>Room Rate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php 
                                            $query = "SELECT * FROM rooms ORDER BY room";
                                            $result = mysqli_query($db, $query);
                                                while($row = mysqli_fetch_array($result)){
                                                    
                                                    echo "<tr><td> {$row['room']}</td>
                                                    <td> {$row['rate']}</td>";
                                        ?>
                                            <td>
                                                <a type="button" class="btn btn-info waves-effect waves-light btn-sm" href="rooms-edit.php?id=<?php echo $row['id'];?>">
                                                Edit
                                                </a>
                                                <a type="button" class="btn btn-danger waves-effect waves-light btn-sm" href="rooms-validate.php?delete=<?php echo $row['id'];?>">
                                                Delete
                                                </a>
                                            </td>
                                        <?php }?>
                                        </tr>
                                    </tbody>
                                </table>
                                <label type="button" class="btn btn-info waves-effect waves-light btn-block" data-toggle="modal" data-target="#addroomModal">
                                Add Room
                                </label>
                                
                            </div>
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
 