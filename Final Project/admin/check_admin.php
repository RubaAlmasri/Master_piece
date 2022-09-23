<?php
include_once '../pages/connect/connect.php';

session_start();

try {

        $email = $_POST["login-email"];
        $pass = $_POST["login-password"];
        $status = 1;

        $query = "SELECT * FROM users WHERE user_email=:mail AND user_password=:pass AND user_status=:status";
        $statement = $conn->prepare($query);
        $statement->execute([
            ':mail' => $email,
            ':pass' => $pass,
            ':status' => $status,
        ]);
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($users != null) {
            foreach ($users as $user) {
                $_SESSION["admin_id"] = $user['user_id'];
                $_SESSION["admin_name"] = $user['user_name'];
                header('location:dashboard.php');
            }
        } else {
            $_SESSION['error'] = 'Incorrect email or password';
            header('location:login.php');
        }
    
} catch (PDOException $e) {
    header("location:login.php");
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
