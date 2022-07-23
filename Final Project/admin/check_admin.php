<?php
include_once '../pages/connect/connect.php';

session_start();

try {

    $email = $_POST['login-email'];
    $pass = $_POST['password'];

    if ($email == 'ruba@gmail.com' && $pass == 'ruba1234') {
        $_SESSION["admin_id"] = 1;
        header('location:dashboard.php');
    }
    else{
        $_SESSION['status2'] = 'Wrong Email or Password';
        header('location:login.php');
    }

} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
