<?php
$page = 'user';
include_once('./layout/header.php');
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
                <input type="file" id="file" name="file" accept="image/*" class="text-center center-block file-upload ml-4 mt-4">
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
                    <form class="form mt-4" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="username"><b>Name: </b></label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="name">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="useremail"><b>Email: </b></label>
                                <input type="email" class="form-control" name="useremail" id="useremail" placeholder="example@email.com">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="userphone"><b>Phone Number: </b></label>
                                <input type="number" class="form-control" name="userphone" id="userphone" placeholder="+9627********">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="userpass"><b>Password: </b></label>
                                <input type="password" class="form-control" name="userpass" id="userpass" placeholder="********">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-main pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update profile</button>
                                <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                        </div>

                    </form>

                    <hr>

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="reservations">


                    <div class="table-responsive mt-4">
                        <table class="table text-nowrap">
                            <thead class="bg-dark">
                                <tr>
                                    <th class="border-top-0 text-white">ID</th>
                                    <th class="border-top-0 text-white">Name</th>
                                    <th class="border-top-0 text-white">Hotel name</th>
                                    <th class="border-top-0 text-white">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Kempinski Hotel</td>
                                    <td>15/7 - 18/7</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>Kempinski Hotel</td>
                                    <td>15/7 - 17/7</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Mark</td>
                                    <td>Kempinski Hotel</td>
                                    <td>15/7 - 17/7</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="settings">


                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>First name</h4>
                                </label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Last name</h4>
                                </label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Phone</h4>
                                </label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile">
                                    <h4>Mobile</h4>
                                </label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Location</h4>
                                </label>
                                <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Password</h4>
                                </label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>Verify</h4>
                                </label>
                                <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                            </div>
                        </div>
                    </form>
                </div>

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
?>