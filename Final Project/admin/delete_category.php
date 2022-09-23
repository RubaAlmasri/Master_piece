<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $id = $_GET['id'];

    $query = "DELETE FROM categories WHERE category_id=:id";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':id' => $id
    ]);
    $_SESSION['status3']='Category Deleted Successfully ';
    header('location:categories.php');
} catch (PDOException $e) {
    header("location:404.html");
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
