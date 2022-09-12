<?php
include_once '../pages/connect/connect.php';
session_start();

$id = $_SESSION["admin_id"] ?? null;

try {
    $query = "SELECT * FROM hotels";
    $statement = $conn->prepare($query);
    $statement->execute();
    $hotels = $statement->fetchAll(PDO::FETCH_ASSOC);

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
            <title>Users</title>
            <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
            <!-- Favicon icon -->
            <link rel="shortcut icon" type="image/x-icon" href="../pages/images/Untitled design.png" />
            <!-- Custom CSS -->
            <link href="css/style.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        </head>

        <body>
            <!-- Main wrapper - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
                <!-- ============================================================== -->
                <!-- Topbar header - style you can find in pages.scss -->
                <!-- ============================================================== -->
                <header class="topbar" data-navbarbg="skin5">
                    <nav class="navbar top-navbar navbar-expand-md navbar-dark bg-dark">
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
                        <div class="navbar-collapse collapse bg-dark" id="navbarSupportedContent" data-navbarbg="skin5">
                            <ul class="navbar-nav d-none d-md-block d-lg-none">
                                <li class="nav-item">
                                    <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                                </li>
                            </ul>
                            <!-- ============================================================== -->
                            <!-- Right side toggle and nav items -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav ms-auto d-flex align-items-center">

                                <!-- ============================================================== -->
                                <!-- Search -->
                                <!-- ============================================================== -->

                                <!-- ============================================================== -->
                                <!-- User profile and search -->
                                <!-- ============================================================== -->
                                <li>
                                    <a class="profile-pic" href="#">
                                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="user-img" width="36" class="img-circle"><span class="text-white font-medium"><?php echo $_SESSION['admin_name']; ?></span></a>
                                </li>
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
                                <h4 class="page-title">Add User</h4>
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
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->

                    <!-- Success message -->
                    <?php
                    if (isset($_SESSION['status1'])) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php
                            echo $_SESSION['status1'];
                            unset($_SESSION['status1']);
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <!--End success message -->




                    <div class="container-fluid ">
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- ============================================================== -->

                        <section class="gradient-custom">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                        <div class="card" style="border-radius: 1rem;">
                                            <div class="card-body p-5">
                                                <div class="mb-md-5 mt-md-4">
                                                    <form action="save_user.php" method="post" enctype="multipart/form-data">
                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <label for="user_name"><b>User Name:</b> <span style="color: red;">*</span></label>
                                                            <input name="user_name" type="text" id="user_name" class="form-control" required />
                                                        </div>
                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <label for="user_email"><b>User Email:</b> <span style="color: red;">*</span></label>
                                                            <input name="user_email" type="email" id="user_email" class="form-control" required />
                                                        </div>
                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <label for="user_pass"><b>Password:</b> <span style="color: red;">*</span></label>
                                                            <input name="user_pass" type="password" id="user_pass" class="form-control" required />
                                                        </div>
                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <label for="user_phone"><b>Phone Number:</b> <span style="color: red;">*</span></label>
                                                            <input name="user_phone" type="number" id="user_phone" class="form-control" required />
                                                        </div>

                                                        <div class="form-outline form-white mb-4">
                                                            <label for="user_status"><b>User Status:</b> <span style="color: red;">*</span></label>
                                                            <select class="form-control" name="user_status" id="user_status" required>
                                                                <option value="" selected disabled hidden>Choose option ...</option>
                                                                <option value="1">Admin</option>
                                                                <option value="2">Provider</option>
                                                                <option value="3">Normal user</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-outline form-white mb-4">
                                                            <label for="hotel"><b>User Place:</b> <span style="color: red;">*</span></label>
                                                            <select class="form-control" name="hotel" id="hotel" required>
                                                                <option value="" selected disabled hidden>Choose option ...</option>
                                                                <option value="0">none</option>
                                                                <?php foreach ($hotels as $i) { ?>
                                                                    <option value="<?php echo $i['id']; ?>"><?php echo $i['name']; ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                        <button type="submit" value="save" class="btn btn-primary mt-3">Save</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- ============================================================== -->
                        <!-- End PAge Content -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->

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
            <!--Wave Effects -->
            <script src="js/waves.js"></script>
            <!--Menu sidebar -->
            <script src="js/sidebarmenu.js"></script>
            <!--Custom JavaScript -->
            <script src="js/custom.js"></script>

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