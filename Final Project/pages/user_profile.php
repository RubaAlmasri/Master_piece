<?php

session_start();

$user_id = $_SESSION['id'] ?? null;
$user_status = $_SESSION['user_status'] ?? null;
$hotelid = $_SESSION['hotel_id'] ?? null;

session_write_close();

if ($user_id) {

    include_once('./layout/header.php');
    $page = 'user';

?>


    <section class="single-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Profile</h2>
                    <ol class="breadcrumb header-bradcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <div class="container bootstrap snippet">
        <div class="row" style="margin-top:10% ; margin-bottom: 10%;">
            <div class="col-sm-3">
                <!--left col-->


                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    <!-- <input type="file" id="file" name="file" accept="image/*" class="text-center center-block file-upload ml-4 mt-4"> -->
                </div>
                </hr><br>

            </div>
            <!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a class="nav-link" data-toggle="tab" href="#home" style="font-size:1.0rem ;">Profile</a>
                    </li>
                    <li>
                        <a class="nav-link" data-toggle="tab" href="#reservations" style="font-size:1.0rem ;">Reservations</a>
                    </li>
                    <!-- <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
                <li><a data-toggle="tab" href="#reservations">Reservations</a></li> -->
                    <!-- <li><a data-toggle="tab" href="#settings">Menu 2</a></li> -->
                </ul>


                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <?php
                        if (isset($_SESSION['status7'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php
                                echo $_SESSION['status7'];
                                unset($_SESSION['status7']);
                                ?>
                            </div>
                        <?php
                        }
                        if (isset($_SESSION['status9'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php
                                echo $_SESSION['status9'];
                                unset($_SESSION['status9']);
                                ?>
                            </div>
                        <?php } ?>
                        <form class="form mt-4" action="update_profile.php" method="post">
                            <?php foreach ($users as $i) {
                                if ($i["user_id"] == $user_id) {
                            ?>

                                    <input type="hidden" class="form-control" name="userid" id="userid" value='<?php echo $i["user_id"] ?>' required>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="username"><b>Name: <span style="color: red;">*</span></b></label>
                                            <input type="text" class="form-control" name="username" id="username" value='<?php echo $i["user_name"] ?>' required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="useremail"><b>Email: <span style="color: red;">*</span></b></label>
                                            <input type="email" class="form-control" name="useremail" id="useremail" value='<?php echo $i["user_email"] ?>' required>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="userphone"><b>Phone Number: <span style="color: red;">*</span></b></label>
                                            <input type="number" class="form-control" name="userphone" id="userphone" value='<?php echo $i["user_phone"] ?>' required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <br>
                                            <button class="btn btn-main pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update profile</button>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </form>

                        <hr>

                    </div>
                    <!--/tab-pane-->
                    <?php
                    if ($user_status == 3) {
                    ?>
                        <div class="tab-pane" id="reservations">


                            <div class="table-responsive mt-4 text-center">
                                <table class="table text-nowrap">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th class="border-top-0 text-white">Hotel name</th>
                                            <th class="border-top-0 text-white">No. rooms</th>
                                            <th class="border-top-0 text-white">Adults/Room</th>
                                            <th class="border-top-0 text-white">Childs/Room</th>
                                            <th class="border-top-0 text-white">Check-in - Check-out</th>
                                            <th class="border-top-0 text-white">Reservation status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($reservations as $i) {
                                            if ($i["user_id"] == $user_id) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $i["hotel_name"] ?></th>
                                                    <td><?php echo $i["no_rooms"] ?></td>
                                                    <td><?php echo $i["adults_per_room"] ?></td>
                                                    <td><?php echo $i["child_per_room"] ?></td>
                                                    <td><?php echo substr($i["check_in"], 0, 10) ?> - <?php echo substr($i["check_out"], 0, 10) ?></td>
                                                    <td><?php echo $i["status"] ?></td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    if ($user_status == 2) {
                    ?>
                        <div class="tab-pane" id="reservations">


                            <div class="table-responsive mt-4 text-center">
                                <table class="table text-nowrap">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th class="border-top-0 text-white">User name</th>
                                            <th class="border-top-0 text-white">User Email</th>
                                            <th class="border-top-0 text-white">User Phone</th>
                                            <th class="border-top-0 text-white">No. rooms</th>
                                            <th class="border-top-0 text-white">Adults/Room</th>
                                            <th class="border-top-0 text-white">Childs/Room</th>
                                            <th class="border-top-0 text-white">Check-in - Check-out</th>
                                            <th class="border-top-0 text-white">Reservation status</th>
                                            <th class="border-top-0 text-white">Conferim Reservation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($reservations as $i) {
                                            if ($i["hotel_id"] == $hotelid) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $i["user_name"] ?></th>
                                                    <th scope="row"><?php echo $i["user_email"] ?></th>
                                                    <th scope="row"><?php echo $i["user_phone"] ?></th>
                                                    <td><?php echo $i["no_rooms"] ?></td>
                                                    <td><?php echo $i["adults_per_room"] ?></td>
                                                    <td><?php echo $i["child_per_room"] ?></td>
                                                    <td><?php echo substr($i["check_in"], 0, 10) ?> - <?php echo substr($i["check_out"], 0, 10) ?></td>
                                                    <td><?php echo $i["status"] ?></td>
                                                    <td>
                                                        <form method="post" action="update_reservation.php" class="d-inline">
                                                            <input type="hidden" value="<?php echo $i['id']; ?>" name="id">
                                                            <button type="submit" class="btn btn-success btn-flat" data-toggle="tooltip" title='Edit'>Change Status</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                    <!--/tab-pane-->

                </div>
                <!--/tab-pane-->
            </div>
            <!--/tab-content-->

        </div>
        <!--/col-9-->
    </div>
    <!--/row-->

<?php
    include_once('./layout/footer.php');
} else {
    header('location:index.php');
} ?>