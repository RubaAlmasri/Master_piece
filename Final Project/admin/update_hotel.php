<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $id = $_POST['hotels_id'];
    $name = $_POST['hotels_name'];
    $price = $_POST['hotels_price'];
    $loc1 = $_POST['hotels_location'];
    $loc2 = $_POST['hotels_location2'];
    $city = $_POST['hotels_city'];
    $about = $_POST['hotels_about'];

    if (!(file_exists("images/" . $_FILES["files1"]["name"]))) {
        move_uploaded_file($_FILES["files1"]["tmp_name"], "images/" . $_FILES["files1"]["name"]);
    }
    if (!(file_exists("images/" . $_FILES["files2"]["name"]))) {
        move_uploaded_file($_FILES["files2"]["tmp_name"], "images/" . $_FILES["files2"]["name"]);
    }
    if (!(file_exists("images/" . $_FILES["files3"]["name"]))) {
        move_uploaded_file($_FILES["files3"]["tmp_name"], "images/" . $_FILES["files3"]["name"]);
    }
    if (!(file_exists("images/" . $_FILES["files4"]["name"]))) {
        move_uploaded_file($_FILES["files4"]["tmp_name"], "images/" . $_FILES["files4"]["name"]);
    }
    $img1 = $_FILES["files1"]["name"];
    $img2 = $_FILES["files2"]["name"];
    $img3 = $_FILES["files3"]["name"];
    $img4 = $_FILES["files4"]["name"];


    if ($img1) {
        $query = "UPDATE hotels SET  img1=:image1 WHERE id=:id";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':image1' => $img1,
            ':id' => $id
        ]);
    }
    if ($img2) {
        $query = "UPDATE hotels SET  img2=:image2 WHERE id=:id";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':image2' => $img2,
            ':id' => $id
        ]);
    }
    if ($img3) {
        $query = "UPDATE hotels SET  img3=:image3 WHERE id=:id";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':image3' => $img3,
            ':id' => $id
        ]);
    }
    if ($img4) {
        $query = "UPDATE hotels SET  img4=:image4 WHERE id=:id";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':image4' => $img4,
            ':id' => $id
        ]);
    }

    $query = "UPDATE hotels SET name=:name , about=:about , location=:locat, location_link=:locat_link, city=:city, price=:price WHERE id=:id";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':name' => $name,
        ':about' => $about,
        ':locat' => $loc1,
        ':locat_link' => $loc2,
        ':city' => $city,
        ':price' => $price,
        ':id' => $id
    ]);
    $_SESSION['status2'] = 'Hotel Updated Successfully';
    header('location:hotels.php');
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
