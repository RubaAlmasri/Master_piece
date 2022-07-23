<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $name = $_POST['hotel_name'];
    $price = $_POST['hotel_price'];
    $loc1 = $_POST['hotel_location'];
    $loc2 = $_POST['hotel_location2'];
    $city = $_POST['hotel_city'];
    $about = $_POST['hotel_about'];
    $sub = 1;


    if (!(file_exists("images/" . $_FILES["file1"]["name"]))) {
        move_uploaded_file($_FILES["file1"]["tmp_name"], "images/" . $_FILES["file1"]["name"]);
    }
    if (!(file_exists("images/" . $_FILES["file2"]["name"]))) {
        move_uploaded_file($_FILES["file2"]["tmp_name"], "images/" . $_FILES["file2"]["name"]);
    }
    if (!(file_exists("images/" . $_FILES["file3"]["name"]))) {
        move_uploaded_file($_FILES["file3"]["tmp_name"], "images/" . $_FILES["file3"]["name"]);
    }
    if (!(file_exists("images/" . $_FILES["file4"]["name"]))) {
        move_uploaded_file($_FILES["file4"]["tmp_name"], "images/" . $_FILES["file4"]["name"]);
    }
    $img1 = $_FILES["file1"]["name"];
    $img2 = $_FILES["file2"]["name"];
    $img3 = $_FILES["file3"]["name"];
    $img4 = $_FILES["file4"]["name"];

    $query = "INSERT INTO hotels(name, img1, img2, img3, img4, about, location, location_link, 	city, price, sub_category)
                     VALUES (:name, :image1, :image2, :image3, :image4, :about, :loc, :loc_link, :city, :price, :sub) ";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':name' => $name,
        ':image1' => $img1,
        ':image2' => $img2,
        ':image3' => $img3,
        ':image4' => $img4,
        ':about' => $about,
        ':loc' => $loc1,
        ':loc_link' => $loc2,
        ':city' => $city,
        ':price' => $price,
        ':sub' => $sub,
    ]);
    $_SESSION['status1'] = 'Hotel Added Successfully';
    header('location:hotels.php');
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
