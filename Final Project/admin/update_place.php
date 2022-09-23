<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $id = $_POST['places_id'];
    $name = $_POST['places_name'];
    $loc1 = $_POST['places_location'];
    $loc2 = $_POST['places_location2'];
    $city = $_POST['places_city'];
    $about = $_POST['places_about'];

    if (!(file_exists("images/" . $_FILES["places_files1"]["name"]))) {
        move_uploaded_file($_FILES["places_files1"]["tmp_name"], "images/" . $_FILES["places_files1"]["name"]);
    }
    if (!(file_exists("images/" . $_FILES["places_files2"]["name"]))) {
        move_uploaded_file($_FILES["places_files2"]["tmp_name"], "images/" . $_FILES["places_files2"]["name"]);
    }
    if (!(file_exists("images/" . $_FILES["places_files3"]["name"]))) {
        move_uploaded_file($_FILES["places_files3"]["tmp_name"], "images/" . $_FILES["places_files3"]["name"]);
    }
    if (!(file_exists("images/" . $_FILES["places_files4"]["name"]))) {
        move_uploaded_file($_FILES["places_files4"]["tmp_name"], "images/" . $_FILES["places_files4"]["name"]);
    }
    $img1 = $_FILES["places_files1"]["name"];
    $img2 = $_FILES["places_files2"]["name"];
    $img3 = $_FILES["places_files3"]["name"];
    $img4 = $_FILES["places_files4"]["name"];


    if ($img1) {
        $query = "UPDATE touristic_places SET  img1=:image1 WHERE id=:id";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':image1' => $img1,
            ':id' => $id
        ]);
    }
    if ($img2) {
        $query = "UPDATE touristic_places SET  img2=:image2 WHERE id=:id";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':image2' => $img2,
            ':id' => $id
        ]);
    }
    if ($img3) {
        $query = "UPDATE touristic_places SET  img3=:image3 WHERE id=:id";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':image3' => $img3,
            ':id' => $id
        ]);
    }
    if ($img4) {
        $query = "UPDATE touristic_places SET  img4=:image4 WHERE id=:id";
        $statment = $conn->prepare($query);
        $statment->execute([
            ':image4' => $img4,
            ':id' => $id
        ]);
    }

    $query = "UPDATE touristic_places SET name=:name , about=:about , location=:locat, location_link=:locat_link, city=:city WHERE id=:id";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':name' => $name,
        ':about' => $about,
        ':locat' => $loc1,
        ':locat_link' => $loc2,
        ':city' => $city,
        ':id' => $id
    ]);
    $_SESSION['status2'] = 'Updated Successfully';
    header('location:touristic places.php');
} catch (PDOException $e) {
    header("location:404.html");
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
