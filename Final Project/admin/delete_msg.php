<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $id = $_GET['msg_id'];

    $query = "DELETE FROM messages WHERE id=:id";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':id' => $id
    ]);

    $_SESSION['status3'] = 'Message Deleted Successfully';
    header('location:msg.php');
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
