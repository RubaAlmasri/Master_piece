<?php

session_start();

unset ($_SESSION["id"]);
unset ($_SESSION['name']);
unset ($_SESSION['user_status']);
unset ($_SESSION['hotel_id']);

unset ($_SESSION['last_page']);
unset ($_SESSION['last_single_page']);

header('location:index.php');
