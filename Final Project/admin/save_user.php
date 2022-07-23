<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $pass = $_POST['user_pass'];
    $phone = $_POST['user_phone'];
    $status = $_POST['user_status'];
    $hotel = $_POST['hotel'];

    $hash_pass = md5($pass);
    

    $query = "INSERT INTO users(user_name, user_email, user_password, user_phone, user_status, hotel_id)
            VALUES (:name, :email, :pass, :phone, :status, :hotel) ";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':name' => $name,
        ':email' => $email,
        ':pass' => $hash_pass,
        ':phone' => $phone,
        ':status' => $status,
        ':hotel' => $hotel
    ]);
    $_SESSION['status1']='User Added Successfully ';
    header('location:users.php');
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
