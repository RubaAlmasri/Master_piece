<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $pass = $_POST['user_pass'];
    $phone = $_POST['user_phone'];
     

    $query = "UPDATE users SET user_name=:name , user_email=:email , user_password=:pass, user_phone=:phone WHERE user_id=:id";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':name' => $name,
        ':email' => $email,
        ':pass' => $pass,
        ':phone' => $phone,
        ':id' => 1
    ]);
    $_SESSION['status2'] = 'Profile Updated Successfully';
    header('location:profile.php');
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
