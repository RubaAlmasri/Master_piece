<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $id = $_POST['id'];

    $query = "DELETE FROM users WHERE user_id=:id";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':id' => $id
    ]);
    $_SESSION['status4']='User Deleted Successfully ';
    header('location:users.php');
} catch (PDOException $e) {
    header("location:404.html");
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
