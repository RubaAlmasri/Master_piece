<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $id = $_GET['id'];
    $sub_category = $_GET['cat'];

    if ($sub_category == 1) {
        $query = "DELETE FROM hotels_comments WHERE comment_id=:id";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':id' => $id
        ]);
    } else if ($sub_category == 3) {
        $query = "DELETE FROM places_comments WHERE comment_id=:id";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':id' => $id
        ]);
    }


    $_SESSION['status3'] = 'Comment Deleted Successfully';
    header('location:comments.php');
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
