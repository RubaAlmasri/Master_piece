<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $p_id = $_POST['p_id'];
    $p_sub = $_POST['p_sub'];
    $p_name = $_POST['p_name'];
    $u_id = $_POST['u_id'];
    $u_name = $_POST['u_name'];
    $comment = $_POST['comment'];
    $datee = date("Y-m-d");


    if ($p_sub == 1) {

        $query = "INSERT INTO hotels_comments(comment, comment_date, place_id, place_sub_category, place_name, user_id, user_name)
            VALUES (:comment, :c_date, :p_id, :p_sub, :p_name, :u_id, :u_name) ";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':comment' => $comment,
            ':c_date' => $datee,
            ':p_id' => $p_id,
            ':p_sub' => $p_sub,
            ':p_name' => $p_name,
            ':u_id' => $u_id,
            ':u_name' => $u_name
           
        ]);

    } else if ($p_sub == 3) {

       
        $query = "INSERT INTO places_comments(comment, comment_date, place_id, place_sub_category, place_name, user_id, user_name)
            VALUES (:comment, :c_date, :p_id, :p_sub, :p_name, :u_id, :u_name) ";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':comment' => $comment,
            ':c_date' => $datee,
            ':p_id' => $p_id,
            ':p_sub' => $p_sub,
            ':p_name' => $p_name,
            ':u_id' => $u_id,
            ':u_name' => $u_name
           
        ]);
    }

    // $_SESSION['status1'] = 'Reservation Done Successfully ';
    header("location:single.php?place_id=" . $p_id . "&place_sub=" . $p_sub . "&place_name=" . $p_name);
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
