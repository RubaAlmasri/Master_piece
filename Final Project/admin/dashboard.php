<?php
include_once '../pages/connect/connect.php';
session_start();
$id = $_SESSION["admin_id"] ?? null;

try {
    $query = "SELECT * FROM users";
    $statement = $conn->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM hotels";
    $statement = $conn->prepare($query);
    $statement->execute();
    $hotels = $statement->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM touristic_places";
    $statement = $conn->prepare($query);
    $statement->execute();
    $places = $statement->fetchAll(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM users ORDER BY user_id desc limit 4";
    $statement = $conn->prepare($query);
    $statement->execute();
    $userss = $statement->fetchAll(PDO::FETCH_ASSOC);


    if ($id) {
?>

        <!DOCTYPE html>
        <html dir="ltr" lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- Tell the browser to be responsive to screen width -->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
            <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
            <meta name="robots" content="noindex,nofollow">
            <title>Dashboard</title>
            <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
            <!-- Favicon icon -->
            <link rel="shortcut icon" type="image/x-icon" href="../pages/images/Untitled design.png" />
            <!-- Custom CSS -->
            <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
            <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
            <!-- Custom CSS -->
            <link href="css/style.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <!-- Autorefresh The Browser every 5 min -->
            <meta http-equiv="refresh" content="300; url='<?php echo $_SERVER["PHP_SELF"]; ?>'">

        </head>

        <body>

            <!-- Main wrapper - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
                <!-- ============================================================== -->
                <!-- Topbar header - style you can find in pages.scss -->
                <!-- ============================================================== -->
                <header class="topbar" data-navbarbg="skin5">
                    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                        <div class="navbar-header" data-logobg="skin6">
                            <!-- ============================================================== -->
                            <!-- Logo -->
                            <!-- ============================================================== -->
                            <a class="navbar-brand" href="dashboard.php">
                                <!-- Logo text -->
                                <span class="logo-text">
                                    <!-- dark Logo text -->
                                    <img src="../pages/images/logo22.png" alt="Logo" />
                                </span>
                            </a>
                            <!-- ============================================================== -->
                            <!-- End Logo -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- toggle and nav items -->
                            <!-- ============================================================== -->
                            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                            <!-- ============================================================== -->
                            <!-- Right side toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav ms-auto d-flex align-items-center">

                                <!-- ============================================================== -->
                                <!-- Search -->
                                <!-- ============================================================== -->
                                <!-- <li class=" in">
                                    <form role="search" class="app-search d-none d-md-block me-3">
                                        <input type="text" placeholder="Search..." class="form-control mt-0">
                                        <a href="" class="active">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </form>
                                </li> -->
                                <!-- ============================================================== -->
                                <!-- User profile and search -->
                                <!-- ============================================================== -->
                                <li>
                                    <a class="profile-pic" href="profile.php">
                                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="user-img" width="36" class="img-circle">
                                        <span class="text-white font-medium">
                                            <?php echo $_SESSION['admin_name']; ?>
                                        </span>
                                    </a>

                                </li>
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:1.0rem ;"><b>Hello</b> <?php echo $_SESSION['admin_name']; ?><i class="tf-ion-chevron-down"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>

                                    </ul>
                                </li> -->
                                

                                <!-- ============================================================== -->
                                <!-- User profile and search -->
                                <!-- ============================================================== -->
                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- ============================================================== -->
                <!-- End Topbar header -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <aside class="left-sidebar" data-sidebarbg="skin6">
                    <!-- Sidebar scroll-->
                    <div class="scroll-sidebar">
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav">
                                <!-- User Profile-->
                                <li class="sidebar-item pt-2">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false">
                                        <i class="far fa-clock" aria-hidden="true"></i>
                                        <span class="hide-menu">Dashboard</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php" aria-expanded="false">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span class="hide-menu">Profile</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="users.php" aria-expanded="false">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <span class="hide-menu">Users</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="categories.php" aria-expanded="false">
                                        <i class="fa fa-table" aria-hidden="true"></i>
                                        <span class="hide-menu">Categories</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="hotels.php" aria-expanded="false">
                                        <i class="fa fa-hotel" aria-hidden="true"></i>
                                        <span class="hide-menu">Hotels</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="touristic places.php" aria-expanded="false">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <span class="hide-menu">Tourist places</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="comments.php" aria-expanded="false">
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                        <span class="hide-menu">Comments</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="msg.php" aria-expanded="false">
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                        <span class="hide-menu">Messages</span>
                                    </a>
                                </li>


                            </ul>

                        </nav>
                        <!-- End Sidebar navigation -->
                    </div>
                    <!-- End Sidebar scroll-->
                </aside>
                <!-- ============================================================== -->
                <!-- End Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Page wrapper  -->
                <!-- ============================================================== -->
                <div class="page-wrapper">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <div class="page-breadcrumb bg-white">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                <div class="d-md-flex">
                                    <ol class="breadcrumb ms-auto">
                                        <li><a href="dashboard.php" class="fw-normal">Dashboard</a></li>
                                    </ol>

                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Container fluid  -->
                    <!-- ============================================================== -->
                    <div class="container-fluid">
                        <!-- ============================================================== -->
                        <!-- Three charts -->
                        <!-- ============================================================== -->
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-12">
                                <div class="white-box analytics-info">
                                    <h3 class="box-title">Users</h3>
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <li>
                                            <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                            </div>
                                        </li>
                                        <li class="ms-auto"><span class="counter text-success"><?php echo count($users); ?></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="white-box analytics-info">
                                    <h3 class="box-title">Hotels</h3>
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <li>
                                            <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                            </div>
                                        </li>
                                        <li class="ms-auto"><span class="counter text-purple"><?php echo count($hotels); ?></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="white-box analytics-info">
                                    <h3 class="box-title">Tourist Places</h3>
                                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                                        <li>
                                            <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                            </div>
                                        </li>
                                        <li class="ms-auto">
                                            <span class="counter text-info"><?php echo count($places); ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- PRODUCTS YEARLY SALES -->
                        <!-- ============================================================== -->
                        <!-- <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">Products Yearly Sales</h3>
                                    <div class="d-md-flex">
                                        <ul class="list-inline d-flex ms-auto">
                                            <li class="ps-3">
                                                <h5><i class="fa fa-circle me-1 text-info"></i>Mac</h5>
                                            </li>
                                            <li class="ps-3">
                                                <h5><i class="fa fa-circle me-1 text-inverse"></i>Windows</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="ct-visits" style="height: 405px;">
                                        <div class="chartist-tooltip" style="top: -17px; left: -12px;"><span class="chartist-tooltip-value">6</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- ============================================================== -->
                        <!-- RECENT users -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="white-box">
                                    <div class="d-md-flex mb-3">
                                        <h3 class="box-title mb-0">Recent users</h3>
                                        <!-- <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                            <select class="form-select shadow-none row border-top">
                                                <option>March 2021</option>
                                                <option>April 2021</option>
                                                <option>May 2021</option>
                                                <option>June 2021</option>
                                                <option>July 2021</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="table-responsive text-center">
                                        <table class="table no-wrap">
                                            <thead class="bg-dark">
                                                <tr>
                                                    <th class="border-top-0 text-white">#</th>
                                                    <th class="border-top-0 text-white">Name</th>
                                                    <th class="border-top-0 text-white">Email</th>
                                                    <th class="border-top-0 text-white">Phone</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($userss as $i) { ?>
                                                    <tr>
                                                        <td><?php echo $i['user_id']; ?></td>
                                                        <td><?php echo $i['user_name']; ?></td>
                                                        <td><?php echo $i['user_email']; ?></td>
                                                        <td><?php echo $i['user_phone']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- Recent Comments -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <!-- .col -->
                            <!-- <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="card white-box p-0">
                                    <div class="card-body">
                                        <h3 class="box-title mb-0">Recent Comments</h3>
                                    </div>
                                    <div class="comment-widgets">
                                        <div class="d-flex flex-row comment-row p-3 mt-0">
                                            <div class="p-2"><img src="plugins/images/users/varun.jpg" alt="user" width="50" class="rounded-circle"></div>
                                            <div class="comment-text ps-2 ps-md-3 w-100">
                                                <h5 class="font-medium">James Anderson</h5>
                                                <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                                                <div class="comment-footer d-md-flex align-items-center">
                                                    <span class="badge bg-primary rounded">Pending</span>

                                                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row comment-row p-3">
                                            <div class="p-2"><img src="plugins/images/users/genu.jpg" alt="user" width="50" class="rounded-circle"></div>
                                            <div class="comment-text ps-2 ps-md-3 active w-100">
                                                <h5 class="font-medium">Michael Jorden</h5>
                                                <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                                                <div class="comment-footer d-md-flex align-items-center">

                                                    <span class="badge bg-success rounded">Approved</span>

                                                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row comment-row p-3">
                                            <div class="p-2"><img src="plugins/images/users/ritesh.jpg" alt="user" width="50" class="rounded-circle"></div>
                                            <div class="comment-text ps-2 ps-md-3 w-100">
                                                <h5 class="font-medium">Johnathan Doeting</h5>
                                                <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                                                <div class="comment-footer d-md-flex align-items-center">

                                                    <span class="badge rounded bg-danger">Rejected</span>

                                                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="card white-box p-0">
                                    <div class="card-heading">
                                        <h3 class="box-title mb-0">Chat Listing</h3>
                                    </div>
                                    <div class="card-body">
                                        <ul class="chatonline">
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                                        <i class="fas fa-phone"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-circle btn" type="button">
                                                        <i class="far fa-comments text-white"></i>
                                                    </button>
                                                </div>
                                                <a href="javascript:void(0)" class="d-flex align-items-center"><img src="plugins/images/users/varun.jpg" alt="user-img" class="img-circle">
                                                    <div class="ms-2">
                                                        <span class="text-dark">Varun Dhavan <small class="d-block text-success d-block">online</small></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                                        <i class="fas fa-phone"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-circle btn" type="button">
                                                        <i class="far fa-comments text-white"></i>
                                                    </button>
                                                </div>
                                                <a href="javascript:void(0)" class="d-flex align-items-center"><img src="plugins/images/users/genu.jpg" alt="user-img" class="img-circle">
                                                    <div class="ms-2">
                                                        <span class="text-dark">Genelia
                                                            Deshmukh <small class="d-block text-warning">Away</small></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                                        <i class="fas fa-phone"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-circle btn" type="button">
                                                        <i class="far fa-comments text-white"></i>
                                                    </button>
                                                </div>
                                                <a href="javascript:void(0)" class="d-flex align-items-center"><img src="plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle">
                                                    <div class="ms-2">
                                                        <span class="text-dark">Ritesh
                                                            Deshmukh <small class="d-block text-danger">Busy</small></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                                        <i class="fas fa-phone"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-circle btn" type="button">
                                                        <i class="far fa-comments text-white"></i>
                                                    </button>
                                                </div>
                                                <a href="javascript:void(0)" class="d-flex align-items-center"><img src="plugins/images/users/arijit.jpg" alt="user-img" class="img-circle">
                                                    <div class="ms-2">
                                                        <span class="text-dark">Arijit
                                                            Sinh <small class="d-block text-muted">Offline</small></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                                        <i class="fas fa-phone"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-circle btn" type="button">
                                                        <i class="far fa-comments text-white"></i>
                                                    </button>
                                                </div>
                                                <a href="javascript:void(0)" class="d-flex align-items-center"><img src="plugins/images/users/govinda.jpg" alt="user-img" class="img-circle">
                                                    <div class="ms-2">
                                                        <span class="text-dark">Govinda
                                                            Star <small class="d-block text-success">online</small></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="call-chat">
                                                    <button class="btn btn-success text-white btn-circle btn" type="button">
                                                        <i class="fas fa-phone"></i>
                                                    </button>
                                                    <button class="btn btn-info btn-circle btn" type="button">
                                                        <i class="far fa-comments text-white"></i>
                                                    </button>
                                                </div>
                                                <a href="javascript:void(0)" class="d-flex align-items-center"><img src="plugins/images/users/hritik.jpg" alt="user-img" class="img-circle">
                                                    <div class="ms-2">
                                                        <span class="text-dark">John
                                                            Abraham<small class="d-block text-success">online</small></span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Container fluid  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                    <footer class="footer text-center">&copy; Copyright 2022. All rights reserved. <a href="../pages/index.php">WONDROUS</a>
                    </footer>
                    <!-- ============================================================== -->
                    <!-- End footer -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- All Jquery -->
            <!-- ============================================================== -->
            <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap tether Core JavaScript -->
            <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="js/app-style-switcher.js"></script>
            <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
            <!--Wave Effects -->
            <script src="js/waves.js"></script>
            <!--Menu sidebar -->
            <script src="js/sidebarmenu.js"></script>
            <!--Custom JavaScript -->
            <script src="js/custom.js"></script>
            <!--This page JavaScript -->
            <!--chartis chart-->
            <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
            <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
            <script src="js/pages/dashboards/dashboard1.js"></script>
        </body>

        </html>


<?php
    } else {
        header("location:login.php");
    }
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
?>