<?php
include_once '../pages/connect/connect.php';

session_start();

try {
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['mail'];

    $hotelid = $_POST['hotel_id'];
    $hotelname = $_POST['hotel_name'];

    $rooms = $_POST['no_rooms'];
    $adults = $_POST['adult'];
    $childs = $_POST['Child'];
    $checkin = $_POST['check-in'];
    $checkout = $_POST['check-out'];
    $roomtype = $_POST['rooms'];


    $query = "INSERT INTO hotels_reservations(user_id, user_name, user_phone, user_email, hotel_id, hotel_name, no_rooms, adults_per_room, child_per_room, check_in, check_out, room_type, status)
            VALUES (:id, :name, :phone, :email, :hotel, :hotel_name, :rooms, :adults, :childs, :in, :out, :room_type, :status) ";
    $statment = $conn->prepare($query);
    $statment->execute([
        ':id' => $id,
        ':name' => $name,
        ':phone' => $phone,
        ':email' => $email,
        ':hotel' => $hotelid,
        ':hotel_name' => $hotelname,
        ':rooms' => $rooms,
        ':adults' => $adults,
        ':childs' => $childs,
        ':in' => $checkin,
        ':out' => $checkout,
        ':room_type' => $roomtype,
        ':status' => 'Not confirmed'
    ]);
    $_SESSION['status1'] = 'Reservation Done Successfully ';
    header('location:book-form.php?place_id=' . $hotelid.'&place_name='.$hotelname);
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
