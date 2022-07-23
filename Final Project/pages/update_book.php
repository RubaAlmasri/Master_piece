<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $id = $_POST['resid'];
    $status = $_POST['status'];
   

    $query = "UPDATE hotels_reservations SET status=:status WHERE id=:id";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':status' => $status,
        ':id' => $id
    ]);
    $_SESSION['status9'] = 'Reservation Updated Successfully';
    header('location:user_profile.php');
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
