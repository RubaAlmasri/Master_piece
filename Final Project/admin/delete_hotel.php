<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $id = $_GET['id'];

    $query = "DELETE FROM hotels WHERE id=:id";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':id' => $id
    ]);
    $_SESSION['status3']='Hotel Deleted Successfully ';
    header('location:hotels.php');
} catch (PDOException $e) {
    header("location:404.html");
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
