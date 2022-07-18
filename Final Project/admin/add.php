<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $name = $_POST['category_name'];
    $about = $_POST['category_about'];

    if (!(file_exists("images/" . $_FILES["file"]["name"]))) {
        move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"]);
    }
    $img = $_FILES["file"]["name"];

    $query = "INSERT INTO categories(category_name, category_about, category_img)
            VALUES (:name, :about, :image) ";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':name' => $name,
        ':about' => $about,
        ':image' => $img
    ]);
    $_SESSION['status1']='Category Added Successfully ';
    header('location:add_category.php');
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
