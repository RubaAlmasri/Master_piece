<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "master_piece";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";

    // echo error message 
} catch (PDOException $e) {
    header('location:404.html');
    echo "Connection failed: " . $e->getMessage();

}