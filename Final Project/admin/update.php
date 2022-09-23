<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $id = $_POST['id'];
    $name = $_POST['category_name'];
    $about = $_POST['category_about'];

    if (!(file_exists("images/" . $_FILES["file"]["name"]))) {
        move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"]);
    }
    $img = $_FILES["file"]["name"];
    if ($img) {
        $query = "UPDATE categories SET category_name=:name , category_about=:about , category_img=:image WHERE category_id=:id";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':name' => $name,
            ':about' => $about,
            ':image' => $img,
            ':id' => $id
        ]);
        $_SESSION['status2'] = 'Category Updated Successfully';
        header('location:categories.php');
    } else {
        $query = "UPDATE categories SET category_name=:name , category_about=:about WHERE category_id=:id";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':name' => $name,
            ':about' => $about,
            ':id' => $id
        ]);
        $_SESSION['status2'] = 'Category Updated Successfully';
        header('location:categories.php');
    }
} catch (PDOException $e) {
    header("location:404.html");
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
