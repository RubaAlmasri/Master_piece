<?php
include_once '../pages/connect/connect.php';
session_start();
$id = $_SESSION["admin_id"] ?? null;

try {

    $id = $_GET['id'];

    $query = 'SELECT * FROM touristic_places WHERE id=:id';
    $statement = $conn->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $place = $statement->fetch(PDO::FETCH_ASSOC);


    $query1 = "SELECT * FROM categories";
    $statement = $conn->prepare($query1);
    $statement->execute();
    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

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
            <title>Tourist Places</title>
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
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="reservations.php" aria-expanded="false">
                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                        <span class="hide-menu">Reservations</span>
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
                                        <i class="fas fa-comment-alt" aria-hidden="true"></i>
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
                                <h4 class="page-title">Edit Place</h4>
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
                    <!-- ============================================================== -->
                    <div class="container-fluid ">
                        <!-- ============================================================== -->
                        <!-- Start Page Content -->
                        <!-- start edit form -->
                        <!-- ============================================================== -->

                        <section class="gradient-custom">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                        <div class="card" style="border-radius: 1rem;">
                                            <div class="card-body p-5">
                                                <div class="mb-md-5 mt-md-4">
                                                    <form action="update_place.php" method="post" enctype="multipart/form-data">
                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <input name="places_id" type="hidden" id="places_id" class="form-control" value='<?php echo $place['id']; ?>' required />
                                                        </div>

                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <label for="places_name"><b>Name:</b> <span style="color: red;">*</span></label>
                                                            <input name="places_name" type="text" id="places_name" class="form-control" value='<?php echo $place['name']; ?>' required />
                                                        </div>

                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <label for="places_location"><b>Location:</b> <span style="color: red;">*</span></label>
                                                            <input name="places_location" type="text" id="places_location" class="form-control" value="<?php echo $place['location']; ?>" required />
                                                        </div>

                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <label for="places_location2"><b>Location(Link):</b> <span style="color: red;">*</span></label>
                                                            <input name="places_location2" type="text" id="places_location2" class="form-control" value='<?php echo $place['location_link']; ?>' required />
                                                        </div>
                                                        <div class="form-outline form-white mb-4">
                                                            <label for="places_city"><b>City:</b> <span style="color: red;">*</span></label>
                                                            <select class="form-control" name="places_city" id="places_city" required>
                                                                <option><?php echo $place['city']; ?></option>
                                                                <?php foreach ($categories as $i) {
                                                                    if ($i['category_name'] != $place['city']) { ?>
                                                                        <option><?php echo $i['category_name']; ?></option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <label for="places_about"><b>About:</b> <span style="color: red;">*</span></label>
                                                            <textarea rows="5" class="form-control" name="places_about" id="places_about" required><?php echo $place['about']; ?></textarea>
                                                        </div>

                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <label for="places_files1"><b>Image 1:</b></label>
                                                            <input type="file" class="form-control-file form-control" id="places_files1" name="places_files1" accept="image/*">
                                                        </div>
                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <label for="places_files2"><b>Image 2:</b></label>
                                                            <input type="file" class="form-control-file form-control" id="places_files2" name="places_files2" accept="image/*">
                                                        </div>
                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <label for="places_files3"><b>Image 3:</b></label>
                                                            <input type="file" class="form-control-file form-control" id="places_files3" name="places_files3" accept="image/*">
                                                        </div>
                                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                                            <label for="places_files4"><b>Image 4:</b></label>
                                                            <input type="file" class="form-control-file form-control" id="places_files4" name="places_files4" accept="image/*">
                                                        </div>

                                                        <button type="submit" value="update" name="update" class="btn btn-primary mt-3">Update</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- ============================================================== -->
                        <!-- End PAge Content -->
                        <!-- end edit form -->
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
        // back to login page if not logged in
        header("location:login.php");
    }
} catch (PDOException $e) {
    header("location:404.html");
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
?>