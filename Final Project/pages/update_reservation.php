<?php


$user_id = $_SESSION['id'] ?? 5;
$user_status = $_SESSION['user_status'] ?? 2;
$hotelid = $_SESSION['hotel_id'] ?? 1;

if ($user_id) {

    $page = 'user';
    include_once('./layout/header.php');
?>

<section class="single-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Update Reservation</h2>
                <ol class="breadcrumb header-bradcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Reservation</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container mb-5 mt-5">
    <form class="form mt-4" action="update_book.php" method="post">
        <?php foreach ($reservations as $i) {
            if ($_POST['id'] == $i["id"]) {
        ?>

                <input type="hidden" class="form-control" name="resid" id="resid" value='<?php echo $i["id"] ?>'>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="username"><b>Name: <span style="color: red;">*</span></b></label>
                        <input type="text" class="form-control" name="username" id="username" value='<?php echo $i["user_name"] ?>' disabled>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="useremail"><b>Email: <span style="color: red;">*</span></b></label>
                        <input type="email" class="form-control" name="useremail" id="useremail" value='<?php echo $i["user_email"] ?>' disabled>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="userphone"><b>Phone Number: <span style="color: red;">*</span></b></label>
                        <input type="number" class="form-control" name="userphone" id="userphone" value='<?php echo $i["user_phone"] ?>' disabled>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="userphone"><b>No. Rooms: <span style="color: red;">*</span></b></label>
                        <input type="number" class="form-control" name="userphone" id="userphone" value='<?php echo $i["no_rooms"] ?>' disabled>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="userphone"><b>Adults/Room: <span style="color: red;">*</span></b></label>
                        <input type="number" class="form-control" name="userphone" id="userphone" value='<?php echo $i["adults_per_room"] ?>' disabled>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="userphone"><b>Childs/Room: <span style="color: red;">*</span></b></label>
                        <input type="number" class="form-control" name="userphone" id="userphone" value='<?php echo $i["child_per_room"] ?>' disabled>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="userphone"><b>Check-in: <span style="color: red;">*</span></b></label>
                        <input type="text" class="form-control" name="userphone" id="userphone" value='<?php echo $i["check_in"] ?>' disabled>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="userphone"><b>Check-out: <span style="color: red;">*</span></b></label>
                        <input type="text" class="form-control" name="userphone" id="userphone" value='<?php echo $i["check_out"] ?>' disabled>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="userphone"><b>Room Type: <span style="color: red;">*</span></b></label>
                        <input type="text" class="form-control" name="userphone" id="userphone" value='<?php echo $i["room_type"] ?>' disabled>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="userphone"><b>Status: <span style="color: red;">*</span></b></label>
                        <select class="form-control" name="status" id="status" required>
                            <option value='<?php echo $i["status"] ?>'><?php echo $i["status"] ?></option>
                            <?php if ($i["status"] == 'Not confirmed') { ?>
                                <option>Confirmed</option>
                            <?php } else { ?>
                                <option>Not confirmed</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <br>
                        <button class="btn btn-main pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Update</button>
                    </div>
                </div>
        <?php }
        } ?>
    </form>
</div>

<?php
    include_once('./layout/footer.php');
} else {
    header('location:index.php');
} ?>