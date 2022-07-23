<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $name = $_POST['place_name'];
    $loc1 = $_POST['place_location'];
    $loc2 = $_POST['place_location2'];
    $city = $_POST['place_city'];
    $about = $_POST['place_about'];
    $sub = 3;


    if (!(file_exists("images/" . $_FILES["place_file1"]["name"]))) {
        move_uploaded_file($_FILES["place_file1"]["tmp_name"], "images/" . $_FILES["place_file1"]["name"]);
    }
    if (!(file_exists("images/" . $_FILES["place_file2"]["name"]))) {
        move_uploaded_file($_FILES["place_file2"]["tmp_name"], "images/" . $_FILES["place_file2"]["name"]);
    }
    if (!(file_exists("images/" . $_FILES["place_file3"]["name"]))) {
        move_uploaded_file($_FILES["place_file3"]["tmp_name"], "images/" . $_FILES["place_file3"]["name"]);
    }
    if (!(file_exists("images/" . $_FILES["place_file4"]["name"]))) {
        move_uploaded_file($_FILES["place_file4"]["tmp_name"], "images/" . $_FILES["place_file4"]["name"]);
    }
    $img1 = $_FILES["place_file1"]["name"];
    $img2 = $_FILES["place_file2"]["name"];
    $img3 = $_FILES["place_file3"]["name"];
    $img4 = $_FILES["place_file4"]["name"];

    $query = "INSERT INTO touristic_places(name, img1, img2, img3, img4, about, location, location_link, city, sub_categories)
                     VALUES (:name, :image1, :image2, :image3, :image4, :about, :loc, :loc_link, :city, :sub) ";
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
        ':sub' => $sub,
    ]);
    $_SESSION['status1'] = 'Place Added Successfully';
    header('location:touristic places.php');
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
