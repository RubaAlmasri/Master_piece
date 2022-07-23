<?php
include_once './connect/connect.php';
session_start();

try {
  $query = "SELECT * FROM categories";
  $statement = $conn->prepare($query);
  $statement->execute();
  $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

  $query1 = "SELECT * FROM  sub_categories";
  $statement1 = $conn->prepare($query1);
  $statement1->execute();
  $sub_cat = $statement1->fetchAll(PDO::FETCH_ASSOC);


  $query2 = "SELECT * FROM  hotels";
  $statement2 = $conn->prepare($query2);
  $statement2->execute();
  $hotels = $statement2->fetchAll(PDO::FETCH_ASSOC);


  $query3 = "SELECT * FROM touristic_places";
  $statement3 = $conn->prepare($query3);
  $statement3->execute();
  $places = $statement3->fetchAll(PDO::FETCH_ASSOC);


  $query4 = "SELECT * FROM users";
  $statement4 = $conn->prepare($query4);
  $statement4->execute();
  $users = $statement4->fetchAll(PDO::FETCH_ASSOC);

  $query5 = "SELECT * FROM hotels_comments";
  $statement5 = $conn->prepare($query5);
  $statement5->execute();
  $h_comments = $statement5->fetchAll(PDO::FETCH_ASSOC);

  $query6 = "SELECT * FROM places_comments";
  $statement6 = $conn->prepare($query6);
  $statement6->execute();
  $p_comments = $statement6->fetchAll(PDO::FETCH_ASSOC);

  $query7 = "SELECT * FROM  hotels_reservations";
  $statement7 = $conn->prepare($query7);
  $statement7->execute();
  $reservations = $statement7->fetchAll(PDO::FETCH_ASSOC);


?>


  <!DOCTYPE html>

  <html lang="en">

  <head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>WONDROUS</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="One page parallax responsive HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/Untitled design.png" />

    <!-- CSS
  ================================================== -->
    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <!-- Lightbox.min css -->
    <link rel="stylesheet" href="plugins/lightbox2/css/lightbox.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Ionicons Fonts Css -->
    <link rel="stylesheet" href="plugins/ionicons/ionicons.min.css">

  </head>

  <body id="body">
    <!--
Fixed Navigation
==================================== -->
    <header class="navigation fixed-top">
      <div class="container">
        <!-- main nav -->
        <nav class="navbar navbar-expand-lg navbar-light px-0">
          <!-- logo -->
          <a class="navbar-brand logo" href="index.php">
            <img loading="lazy" class="logo-default" src="images/logo22.png" alt="logo" width="100rem" height="25rem" />
            <img loading="lazy" class="logo-white" src="images/logo1.png" alt="logo" width="100rem" height="25rem" />
          </a>
          <!-- /logo -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto text-center">
              <li class="nav-item <?php if ($page == 'home') {
                                    echo 'active';
                                  } ?>">
                <a class="nav-link" href="index.php" style="font-size:1.0rem ;">Home</a>
              </li>

              <li class="nav-item dropdown <?php if ($page == 'city') {
                                              echo 'active';
                                            } ?>">
                <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:1.0rem ;">Cities<i class="tf-ion-chevron-down"></i></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php foreach ($categories as $i) { ?>

                    <li><a class="dropdown-item" href="sub_categories.php?category_id=<?php echo $i['category_id'] ?>&category_name=<?php echo $i["category_name"] ?>"><?php echo $i['category_name']; ?></a></li>

                  <?php } ?>
                </ul>
              </li>

              <li class="nav-item <?php if ($page == 'about') {
                                    echo 'active';
                                  } ?>">
                <a class="nav-link" href="about.php" style="font-size:1.0rem ;">About Us</a>
              </li>
              <li class="nav-item <?php if ($page == 'contact') {
                                    echo 'active';
                                  } ?>">
                <a class="nav-link" href="contact.php" style="font-size:1.0rem ;">Contact Us</a>
              </li>

              <?php if (!$_SESSION['id']) { ?>
                <li class="nav-item <?php if ($page == 'user') {
                                      echo 'active';
                                    } ?>">
                  <a class="nav-link" href="user_profile.php" style="font-size:1.0rem ;">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php" style="font-size:1.0rem ;">Logout</a>
                </li>


              <?php } else { ?>
                <li class="nav-item <?php if ($page == 'login') {
                                      echo 'active';
                                    } ?>">
                  <a class="nav-link" href="login.php" style="font-size:1.0rem ;">Login</a>
                </li>
                <li class="nav-item <?php if ($page == 'register') {
                                      echo 'active';
                                    } ?>">
                  <a class="nav-link" href="register.php" style="font-size:1.0rem ;">Register</a>
                </li>
              <?php } ?>

            </ul>
          </div>
        </nav>
        <!-- /main nav -->
      </div>
    </header>
    <!--
End Fixed Navigation
==================================== -->


  <?php

} catch (PDOException $e) {
  echo $query . "<br>" . $e->getMessage();
} finally {
  $conn = NULL;
}
  ?>