<?php
$page = 'contact';
include_once('./layout/header.php');
?>


<section class="single-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Contact Us</h2>
				<ol class="breadcrumb header-bradcrumb justify-content-center">
					<li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!--Start Contact Us
	=========================================== -->
<section class="contact-us" id="contact">
	<div class="container">
		<div class="row justify-content-center">
			<!-- section title -->
			<div class="col-xl-6 col-lg-8">
				<div class="title text-center">
					<h2>Get In Touch</h2>

					<div class="border"></div>
				</div>
			</div>
			<!-- /section title -->
		</div>
		<div class="row">
			<!-- Contact Details -->
			<div class="contact-details col-md-6 ">
				<h3 class="mb-3">Contact Details</h3>
				<p>If you have any questions or queries, our staff will always be happy to help. Feel free to contact us by telephone or email and we will be sure to get back to you as soon as possible.</p>
				<ul class="contact-short-info mt-4">
					<li class="mb-3">
						<i class="tf-ion-ios-home"></i>
						<span>Irbid, Jordan</span>
					</li>
					<li class="mb-3">
						<i class="tf-ion-android-phone-portrait"></i>
						<span>Phone: +962 77 809 1917</span>
					</li>
					<li>
						<i class="tf-ion-android-mail"></i>
						<span>Email: wondrous@gmail.com</span>
					</li>
				</ul>
				<!-- Footer Social Links -->
				<div class="social-icon">
					<ul>
						<li><a href="https://www.facebook.com/" target="_blank"><i class="tf-ion-social-facebook"></i></a></li>
						<li><a href="https://www.twitter.com/" target="_blank"><i class="tf-ion-social-twitter"></i></a></li>
						<li><a href="https://www.instagram.com/" target="_blank"><i class="tf-ion-social-instagram"></i></a></li>
					</ul>
				</div>
				<!--/. End Footer Social Links -->
			</div>
			<!-- / End Contact Details -->

			<!-- Contact Form -->
			<div class="contact-form col-md-6 ">
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

				<form id="contact-form" method="post" action="send_msg.php" role="form">
					<div class="form-group mb-4">
						<label for="name"><b>Name: <span style="color: red;">*</span></b></label>
						<input type="text" class="form-control" name="name" id="name" title="Please fill out your name" required>
					</div>

					<div class="form-group mb-4">
						<label for="email"><b>Email: <span style="color: red;">*</span></b></label>
						<input type="email" class="form-control" name="email" id="email" title="Please fill out your email" required>
					</div>

					<div class="form-group mb-4">
						<label for="subject"><b>Subject: <span style="color: red;">*</span></b></label>
						<input type="text" class="form-control" name="subject" id="subject" title="Please fill out the subject" required>
					</div>

					<div class="form-group mb-4">
						<label for="message"><b>Message: <span style="color: red;">*</span></b></label>
						<textarea rows="6" class="form-control" name="message" id="message" title="Please fill out your message" required></textarea>
					</div>
					<div id="cf-submit">
						<button type="submit" value="send" class="btn btn-main">Send Message</button>
					</div>

				</form>
			</div>
			<!-- ./End Contact Form -->

		</div> <!-- end row -->
	</div> <!-- end container -->
</section> <!-- end section -->

<?php
include_once('./layout/footer.php');
?>