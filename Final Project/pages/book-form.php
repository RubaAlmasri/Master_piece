<?php
include_once('./layout/header.php');
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
<div class="container mb-5 mt-5">
    <form action="#" class="comment-form">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <label for="first-name"><b>Name: <span style="color: red;">*</span></b></label>
                <input type="text" name="first-name" class="form-control" id="first-name" required>
            </div>
            <div class="col-lg-12 col-md-12">
                <label for="mail"><b>Email: <span style="color: red;">*</span></b></label>
                <input type="email" name="mail" class="form-control" id="mail" required>
            </div>
            <div class="col-lg-12 col-md-12">
                <label for="phone"><b>Phone Number: <span style="color: red;">*</span></b></label>
                <input type="text" name="phone" class="form-control" id="phone" required>
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
                <input type="number" name="no_rooms" class="form-control" id="no_rooms" required>
            </div>
            <div class="col-lg-6 col-md-6">
                <label for="adult"><b>Adult per Room: <span style="color: red;">*</span></b></label>
                <input type="number" name="adult" class="form-control" id="adult" required>
            </div>
            <div class="col-lg-6 col-md-6">
                <label for="Child"><b>Child per Room: <span style="color: red;">*</span></b></label>
                <input type="number" name="Child" class="form-control" id="Child" required>
            </div>
            <div class="col-lg-6 col-md-6">
                <label for="check-in"><b>Check-in: <span style="color: red;">*</span></b></label>
                <input type="date" name="check-in" class="form-control" id="check-in" required>
            </div>
            <div class="col-lg-6 col-md-6">
                <label for="check-out"><b>Check-out: <span style="color: red;">*</span></b></label>
                <input type="date" name="check-out" class="form-control" id="check-out" required>
            </div>
        </div>
        <button type="submit" value="send" class="btn btn-main">Send Message</button>
    </form>
</div>



<?php
include_once('./layout/footer.php');
?>