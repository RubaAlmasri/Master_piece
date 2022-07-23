<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $id = $_POST['userid'];
    $name = $_POST['username'];
    $email = $_POST['useremail'];
    $phone = $_POST['userphone'];
   

    $query = "UPDATE users SET user_name=:name , user_email=:email , user_phone=:phone WHERE user_id=:id";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':id' => $id
    ]);
    $_SESSION['status7'] = 'Profile Updated Successfully';
    header('location:user_profile.php');
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
