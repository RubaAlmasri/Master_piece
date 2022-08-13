<?php

session_start();

unset ($_SESSION["id"]);
unset ($_SESSION['name']);
unset ($_SESSION['user_status']);
unset ($_SESSION['hotel_id']);


header('location:index.php');
