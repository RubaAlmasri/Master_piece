<?php
include_once('./layout/header.php');

$user = $_SESSION['id'] ?? 5;

?>

<section class="single-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Book Now</h2>
                <ol class="breadcrumb header-bradcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Book Form</li>
                </ol>
            </div>
        </div>
    </div>
</section>



<?php if ($user) {
?>
    <div class="container mb-5 mt-5">
        <?php
        if (isset($_SESSION['status1'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php
                echo $_SESSION['status1'];
                unset($_SESSION['status1']);
                ?>
            </div>
        <?php
        } ?>
        <form action="save_book.php" class="comment-form" method="POST">
            <div class="row">
                <?php foreach ($users as $i) {
                    if ($i["user_id"] == $user) { ?>
                        <input type="hidden" name="user_id" class="form-control" id="user_id" value='<?php echo $i["user_id"] ?>'>
                        <input type="hidden" name="hotel_id" class="form-control" id="hotel_id" value='<?php echo $_GET["place_id"] ?>'>
                        <input type="hidden" name="hotel_name" class="form-control" id="hotel_name" value='<?php echo $_GET["place_name"] ?>'>
                        <div class="col-lg-12 col-md-12">
                            <label for="name"><b>Name: <span style="color: red;">*</span></b></label>
                            <input type="text" name="name" class="form-control" id="name" value='<?php echo $i["user_name"] ?>' required>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="mail"><b>Email: <span style="color: red;">*</span></b></label>
                            <input type="email" name="mail" class="form-control" id="mail" value='<?php echo $i["user_email"] ?>' required>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="phone"><b>Phone Number: <span style="color: red;">*</span></b></label>
                            <input type="text" name="phone" class="form-control" id="phone" value='<?php echo $i["user_phone"] ?>' required>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="rooms"><b>Room type: <span style="color: red;">*</span></b></label>
                            <select class="form-control" name="rooms" id="rooms" required>
                                <option value="" selected disabled hidden>Choose option ...</option>
                                <option>Standard room</option>
                                <option>Deluxe room</option>
                                <option>Joint room</option>
                                <option>Connecting room</option>
                                <option>Suite</option>
                                <option>Apartment-style</option>
                                <option>Accessible room</option>
                            </select>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label for="no_rooms"><b>Number of Rooms: <span style="color: red;">*</span></b></label>
                            <input type="number" min="1" name="no_rooms" class="form-control" id="no_rooms" required>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label for="adult"><b>Adult per Room: <span style="color: red;">*</span></b></label>
                            <input type="number" min="0" name="adult" class="form-control" id="adult" required>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label for="Child"><b>Child per Room: <span style="color: red;">*</span></b></label>
                            <input type="number" min="0" name="Child" class="form-control" id="Child" required>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label for="check-in"><b>Check-in: <span style="color: red;">*</span></b></label>
                            <input type="date" name="check-in" class="form-control" id="check-in" required>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label for="check-out"><b>Check-out: <span style="color: red;">*</span></b></label>
                            <input type="date" name="check-out" class="form-control" id="check-out" required>
                        </div>
                <?php }
                } ?>
            </div>
            <button type="submit" value="send" class="btn btn-main">Submit</button>
        </form>
    </div>
<?php } else { 
    $_SESSION['last_page']= 'book-form.php';
    ?>
    <div class="vh-100 gradient-custom pt-5">
        <div class="container mt-5 mb-5 text-center">
            <h5>Please <a href="login.php">Login</a> To Make Your Reservation</h5>
        </div>
    </div>
<?php } ?>



<?php
include_once('./layout/footer.php');
?>