<?php
include_once './connect/connect.php';
session_start();



try {

    $errname = $erremail = $errpass = $errcpas = $err = '';
    $name = $email = $pass = $cpass = '';

    if (isset($_POST['register'])) {
        $name = $_POST["reg-name"];
        $email = $_POST["reg-email"];
        $pass = $_POST["password"];
        $cpass = $_POST["con-password"];

        //preg_match(pattern, input) function returns whether a match was found in a string
        // pattern: Contains a regular expression indicating what to search for
        // input: The string in which the search will be performed

        //check emptey fielda and validate it 
        if (empty($_POST["reg-name"])) {
            $errname = "You didn't enter the Name";
        } else {
            if (!preg_match("/^[a-zA-Z\s]{3,}+$/", $name)) {
                $errname = 'At least 3 characters' . '<br>' . "Only alphabets and space are allowed";
            }
        }

        //check email field 
        if (empty($_POST["reg-email"])) {
            $erremail = "You didn't enter the Email";
        } else {
            if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
                $erremail = 'Email is not valid (eg.example@example.com)';
            }
        }

        //check password field
        if (empty($_POST["password"])) {
            $errpass = "You didn't enter the Password ";
        } else {
            if (!preg_match("/^.{8,}$/", $pass)) {
                $errpass = 'Minimum length of password must be at least 8 characters';
            }
        }

        //check confirm password field
        if (empty($_POST["con-password"])) {
            $errcpas = "You didn't enter the Confirm Password";
        } else {
            if (!preg_match("/^.{8,}$/", $cpass)) {
                $errcpas = 'Minimum length of password must be at least 8 characters';
            }
        }

        //if all fields are valid and not empty then check if email already exist in database or not
        if (!empty($_POST["reg-name"]) && !empty($_POST["reg-email"]) && !empty($_POST["password"]) && !empty($_POST["con-password"])) {


            $query = "SELECT * FROM users WHERE user_email= :mail";
            $statement = $conn->prepare($query);
            $statement->execute([
                ':mail' => $email
            ]);
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($users != null) {
                $erremail = 'Email Already exist';
            }

            //check confirm passwords 
            if ($pass != $cpass) {
                // $_SESSION['error'] = 'Passwords not matched !!';
                $errpass = 'Passwords not matched ';
                $errcpas = 'Passwords not matched ';
            } else if ($pass == $cpass && $users == null) {

                if (!preg_match("/^[a-zA-Z\s]{3,}+$/", $name)) {
                    $errname = 'At least 3 characters' . '<br>' . "Only alphabets and space are allowed";
                }
                if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
                    $erremail = 'Email is not valid (eg.example@example.com)';
                }
                if (!preg_match("/^.{8,}$/", $pass)) {
                    $errpass = 'Minimum length of password must be at least 8 characters';
                }
                if (!preg_match("/^.{8,}$/", $cpass)) {
                    $errcpas = 'Minimum length of password must be at least 8 characters';
                } else if (preg_match("/^[a-zA-Z\s]{3,}+$/", $name) && preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email) && preg_match("/^.{8,}$/", $pass) && preg_match("/^.{8,}$/", $cpass)) {
                    $query1 = "INSERT INTO users(user_name, user_email, user_password, user_status)
                VALUES (:name, :email, :password, :status) ";
                    $statment1 = $conn->prepare($query1);
                    $statment1->execute([
                        ':name' => $name,
                        ':email' => $email,
                        ':password' => md5($pass),
                        ':status' => 3
                    ]);
                    header('location:login.php');
                }
            }
        }
    }
?>



    <!doctype html>
    <html lang="en">

    <head>
        <title>Register</title>
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
                        <div class="card" style="border-radius: 1rem;  background-color: rgba(40, 171, 227, 0.1);">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5">
                                    <h2 class="fw-bold mb-4 text-uppercase">Register</h2>
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
                                            <label for="reg-name">Name: <span style="color: red;">*</span></label>
                                            <input name="reg-name" type="text" id="reg-name" class="form-control form-control-lg" title="Please fill out your name" value="<?php echo $name; ?>" />
                                            <small style="color: red;"><?php echo $errname; ?></small>
                                        </div>
                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                            <label for="reg-email">Email: <span style="color: red;">*</span></label>
                                            <input name="reg-email" type="text" id="reg-email" class="form-control form-control-lg" title="Please fill out your email" value="<?php echo $email; ?>" />
                                            <small style="color: red;"><?php echo $erremail; ?></small>
                                        </div>
                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                            <label for="password">Password: <span style="color: red;">*</span></label>
                                            <input name="password" type="password" id="password" class="form-control form-control-lg" title="Please fill out your password (minimum length 8 character)" value="<?php echo $pass; ?>" />
                                            <small style="color: red;"><?php echo $errpass . $err; ?></small><br>
                                            <!-- <small>Minimum length of password must be at least 8 or more characters with a mix of letters, numbers & symbols </small> -->

                                        </div>
                                        <div class="form-outline form-white mb-4" style="text-align: left;">
                                            <label for="con-password">Confirm Password: <span style="color: red;">*</span></label>
                                            <input name="con-password" type="password" id="con-password" class="form-control form-control-lg" title="Please fill out your password again" value="<?php echo $cpass; ?>" />
                                            <small style="color: red;"><?php echo $errcpas; ?></small>
                                        </div>
                                        <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->
                                        <button type="submit" value="send" name="register" class="btn btn-main">Register</button>

                                </div>
                                </form>
                                <div>
                                    <p class="mb-0">Have an account? <a href="login.php" class="text-50 fw-bold">Log in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- <script>
            function checkpassword() {
                let pass = document.getElementById('password').value;
                if (pass.length < 8) {
                    document.getElementById('p').innerHTML = 'Minimum length of password must be at least 8 characters';
                    document.getElementById('p').style.color = 'red'
                } else {
                    document.getElementById('p').innerHTML = 'Strong password'
                    document.getElementById('p').style.color = 'green'
                }
            }
        </script> -->

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