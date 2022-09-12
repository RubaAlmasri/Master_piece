<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sub = $_POST['subject'];
    $msg = $_POST['message'];


    $query = "INSERT INTO messages(name, email, subject, message)
            VALUES (:name, :email, :sub, :msg) ";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':name' => $name,
        ':email' => $email,
        ':sub' => $sub,
        ':msg' => $msg
    ]);

    // $to = 'ruba.h.almasri@gmail.com';

    // $name = trim(stripslashes($name));
    // $from = trim(stripslashes("ruba.almasri96@gmail.com"));
    // $subject = "Contact email";
    // $message = trim(stripslashes($msg));
    // $headers = "From: $from";
    // $password = 'wtmzhfpbqlktuxmm';

    // $mail = mail($to, $subject, $message, $headers);

    // if ($mail) {
    //     $_SESSION['status1'] = 'Message Send Successfully ';
    //     header('location:contact.php');
    // }

      $_SESSION['status1'] = 'Message Send Successfully ';
        header('location:contact.php');
    
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
