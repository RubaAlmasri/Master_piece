<?php
// include_once './connect/connect.php';
$page = 'home';
include_once('./layout/header.php');


try {
?>
	<div class="hero-slider">
		<div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/wadirum.webp);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Wonderful Destinations<br></h1>
						<p data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".5"></p><br>
						<a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn btn-main" href="service.php">See More</a>
					</div>
				</div>
			</div>
		</div>
		<div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/hotel.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Find The Best <br> Place For Your Holidays</h1>
						<p data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".5"></p><br>
						<a data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".8" class="btn btn-main" href="service.php">See More</a>
					</div>
				</div>
			</div>
		</div>
		<div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/rest.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Discover The <br>Best Services Near You</h1>
						<p data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".5"></p><br>
						<a data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".8" class="btn btn-main" href="service.php">See More</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--
Start About Section
==================================== -->
	<section class="service-2 section">
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-lg-6">
					<!-- section title -->
					<div class="title text-center">
						<h2>Cities</h2>
						<div class="border"></div>
					</div>
					<!-- /section title -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row text-center">
						<?php foreach ($categories as $i) { ?>
							<div class="col-lg-4 col-md-6 col-sm-6">

								<div class="card" style="width: 18rem; margin-bottom: 5%;">
									<a href="sub_categories.php?category_id=<?php echo $i['category_id'] ?>&category_name=<?php echo $i["category_name"] ?>">
									<img class="card-img-top" src="../admin/images/<?php echo $i['category_img']; ?>" alt="Card image cap" width="100%" height="200rem">
									</a>
									<div class="card-body">
										<h5 class="card-title"><a href="sub_categories.php?category_id=<?php echo $i['category_id'] ?>&category_name=<?php echo $i["category_name"] ?>" style="color: black;" onMouseOver="this.style.color='#28ABE3'" onMouseOut="this.style.color='black'"><?php echo $i['category_name']; ?></a></h5>

									</div>
								</div>
							</div>
						<?php } ?>

						<!-- END COL -->
					</div>
				</div>
			</div> <!-- End row -->
		</div> <!-- End container -->
	</section> <!-- End section -->

	<!-- End section -->

	<!--
Start Call To Action
==================================== -->
	<section class="call-to-action section" style='background: url("images/contact.jpg");background-repeat: no-repeat;  background-size: 100%;'>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6 col-lg-8 text-center">
					<h2>Best Finder For You</h2>
					<p>Let's Talk Together To Give You The Best Advice</p>
					<a href="contact.php" class="btn btn-main">Contact Us</a>
				</div>
			</div> <!-- End row -->
		</div> <!-- End container -->
	</section> <!-- End section -->


	<!-- End Section -->

	<!--
Start latest Section
=========================================== -->
	<section class="blog" id="blog">
		<div class="container">
			<div class="row justify-content-center">
				<!-- section title -->
				<div class="col-xl-6 col-lg-8">
					<div class="title text-center ">
						<h2> Latest <span class="color">Hotels</span></h2>
						<div class="border"></div>
					</div>
				</div>
				<!-- /section title -->
			</div>

			<div class="row">
				<!-- single blog post -->
				<?php foreach ($hotels as $i) { ?>
				<article class="col-lg-4 col-md-6">
					<div class="post-item">
						<div class="media-wrapper">
							<img loading="lazy" src="images/home/Kempinski.jpg" alt="amazing caves coverimage" class="img-fluid" width="100%" height="200rem">
						</div>

						<div class="content">
							<h3><a href="single-post.html"><?php echo $i["name"] ?></a></h3>
							<p><?php echo substr($i["about"], 0, 60) . " ..." ?></p>
							<a class="btn btn-main" href="single.php?place_id=<?php echo $i["id"] ?>&place_sub=<?php echo $i["sub_category"] ?>&place_name=<?php echo $i["name"] ?>">See more</a>
						</div>
					</div>
				</article>
				<!-- /single blog post -->
				<?php } ?>

				

				<!-- single blog post -->
				<article class="col-lg-4 col-md-6">
					<div class="post-item">
						<div class="media-wrapper">
							<img loading="lazy" src="images/home/the ritz.jpg" alt="amazing caves coverimage" class="img-fluid" width="100%" height="200rem">
						</div>

						<div class="content">
							<h3><a href="single-post.html">The Ritz-Carlton <br>Amman</a></h3>
							<p><?php echo substr($i["about"], 0, 60) . " ..." ?></p>
							<a class="btn btn-main" href="single.php?place_id=<?php echo $i["id"] ?>&place_sub=<?php echo $i["sub_category"] ?>&place_name=<?php echo $i["name"] ?>">See more</a>
						</div>
					</div>
				</article>
				<!-- end single blog post -->
			</div> <!-- end row -->
		</div> <!-- end container -->
	</section>
	<!-- end section -->


<?php

	include_once('./layout/footer.php');
} catch (PDOException $e) {
	echo $query . "<br>" . $e->getMessage();
} finally {
	$conn = NULL;
}
?>