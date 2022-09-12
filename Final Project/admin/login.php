<?php
include_once '../pages/connect/connect.php';
session_start();
try {

    

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
        <title>Login</title>
        <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
        <!-- Favicon icon -->
        <link rel="shortcut icon" type="image/x-icon" href="../pages/images/Untitled design.png" />
        <!-- Custom CSS -->
        <link href="css/style.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>

    <body style="background-color: #edf1f5;">




        <div class="page-wrapper">

            <div class="container-fluid">


                <section class="vh-100 gradient-custom">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                <div class="card" style="border-radius: 1rem; background-color: #fff;">
                                    <div class="card-body p-5 text-center">
                                        <div class="mb-md-5 mt-md-4">
                                            <h2 class="fw-bold mb-5 text-uppercase">Login</h2>
                                            <?php
                                            if (isset($_SESSION['error'])) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?php
                                                    echo $_SESSION['error'];
                                                    unset($_SESSION['error']);
                                                    ?>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <br>
                                            <form action="check_admin.php" method="POST">
                                                <div class="form-outline form-white mb-4" style="text-align: left;">
                                                    <label for="login-email">Email: <span style="color: red;">*</span></label>
                                                    <input name="login-email" type="email" id="login-email" class="form-control form-control-lg" required />
                                                </div>
                                                <div class="form-outline form-white mb-4" style="text-align: left;">
                                                    <label for="login-password">Password: <span style="color: red;">*</span></label>
                                                    <input name="login-password" type="password" id="login-password" class="form-control form-control-lg" required />
                                                </div>
                                                <button type="submit" name="login" value="send" class="btn btn-primary">Login</button>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

        </div>



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

} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}

?>