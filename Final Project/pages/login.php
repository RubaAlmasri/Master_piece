<?php
include_once './connect/connect.php';
session_start();


try {


    if (isset($_POST['login'])) {
        $email = $_POST["login-email"];
        $pass = $_POST["login-password"];


        $query = "SELECT * FROM users WHERE user_email= :mail AND user_password=:pass";
        $statement = $conn->prepare($query);
        $statement->execute([
            ':mail' => $email,
            ':pass'=>md5($pass)
        ]);
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($users) {
            $_SESSION['id']=$users['user_id'];
            $_SESSION['name']=$users['user_name'];
            $_SESSION['user_status']=$users['user_status'];
            $_SESSION['hotel_id']=$users['hotel_id'];

            header('location:index.php');
           
        } else {

            $_SESSION['error'] = 'Incorrect email or password';

        }
    }
?>




    <!doctype html>
    <html lang="en">

    <head>
        <title>Login</title>
        <link rel="stylesheet" href="CSS/loginpage.css">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="shortcut icon" type="image/x-icon" href="images/Untitled design.png" />

        <link rel="stylesheet" href="plugins/themefisher-font/style.css">
        <!-- bootstrap.min css -->
        <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
        <!-- Lightbox.min css -->
        <link rel="stylesheet" href="plugins/lightbox2/css/lightbox.min.css">
        <!-- animation css -->
        <link rel="stylesheet" href="plugins/animate/animate.css">
        <!-- Slick Carousel -->
        <link rel="stylesheet" href="plugins/slick/slick.css">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Ionicons Fonts Css -->
        <link rel="stylesheet" href="plugins/ionicons/ionicons.min.css">

    </head>

    <body class="color">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card" style="border-radius: 1rem; background-color: rgba(40, 171, 227, 0.1);">
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
                                    <form action="" method="POST">
                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                            <label for="login-email">Email: <span style="color: red;">*</span></label>
                                            <input name="login-email" type="email" id="login-email" class="form-control form-control-lg" required />
                                        </div>
                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                            <label for="login-password">Password: <span style="color: red;">*</span></label>
                                            <input name="login-password" type="password" id="login-password" class="form-control form-control-lg" required />
                                        </div>
                                        <button type="submit" name="login" value="send" class="btn btn-main">Login</button>

                                        <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->
                                        <!-- <a href="../new/index.php">
                                        <button name="submit" class="btn btn-outline-light btn-lg px-5" type="submit" style="background-color: #e24e47;">Login</button></a> -->

                                </div>
                                </form>
                                <div>
                                    <p class="mb-0">Don't have an account? <a href="register.php" class="text-50 fw-bold">Sign Up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>

    </html>


<?php

} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
?>