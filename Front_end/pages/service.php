<?php
$page = 'city';
include_once('./layout/header.php');
?>

<section class="single-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Our Services</h2>
				<ol class="breadcrumb header-bradcrumb justify-content-center">
					<li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Our Services</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="blog" id="blog">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<!-- section title -->
			<div class="col-xl-6 col-lg-8">
				<div class="title text-center ">
					<h2> Our <span class="color">Services</span></h2>
					<div class="border"></div>
				</div>
			</div>
			<!-- /section title -->
		</div>
		<div class="row">
			<div class="col-lg-3 mt-5 mt-lg-0">
				<!-- sidebar -->
				<aside class="sidebar pl-0 pl-lg-4">
					<div class="widget-search widget">
						<form action="#">
							<!-- Search bar -->
							<input class="form-control shadow-none" type="text" placeholder="Search..." name="search">
							<button type="submit" class="widget-search-btn">
								<i class="tf-ion-ios-search"></i>
							</button>
						</form>
					</div>
					<div class="widget-categories widget">
						<h2>Cities</h2>
						<!-- widget categories list -->
						<ul class="widget-categories-list">
							<li>
								<a href="">Amman</a>
							</li>
							<li>
								<a href="">Irbid</a>
							</li>
							<li>
								<a href="">Ma'an</a>
							</li>
							<li>
								<a href="">Ajloun</a>
							</li>
							<li>
								<a href="">Jerash</a>
							</li>
						</ul>
					</div>
				</aside>
			</div>
			<div class="col-lg-9">


				<div class="row">
					<!-- single blog post -->
					<article class="col-lg-4 col-md-6">
						<div class="post-item">
							<div class="media-wrapper">
								<img loading="lazy" src="images/home/Kempinski.jpg" alt="amazing caves coverimage" class="img-fluid" width="100%" height="200rem">
							</div>

							<div class="content">
								<h3><a href="single-post.html">Kempinski Hotel Ishtar Dead Sea</a></h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo explicabo quos harum labore, adipisci natus.</p>
								<a class="btn btn-main" href="single.php">See more</a>
							</div>
						</div>
					</article>
					<!-- /single blog post -->

					<!-- single blog post -->
					<article class="col-lg-4 col-md-6">
						<div class="post-item">
							<div class="media-wrapper">
								<img loading="lazy" src="images/home/tal-rumman-restaurant.jpg" alt="amazing caves coverimage" class="img-fluid" width="100%" height="200rem">
							</div>

							<div class="content">
								<h3><a href="single-post.html">Tal Al-Rumman Restaurant</a></h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo explicabo quos harum labore, adipisci natus.</p>
								<a class="btn btn-main" href="single.php">See more</a>
							</div>
						</div>
					</article>
					<!-- end single blog post -->

					<!-- single blog post -->
					<article class="col-lg-4 col-md-6">
						<div class="post-item">
							<div class="media-wrapper">
								<img loading="lazy" src="images/home/the ritz.jpg" alt="amazing caves coverimage" class="img-fluid" width="100%" height="200rem">
							</div>

							<div class="content">
								<h3><a href="single-post.html">The Ritz-Carlton <br>Amman</a></h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo explicabo quos harum labore, adipisci natus.</p>
								<a class="btn btn-main" href="single.php">See more</a>
							</div>
						</div>
					</article>
					<article class="col-lg-4 col-md-6">
						<div class="post-item">
							<div class="media-wrapper">
								<img loading="lazy" src="images/home/Kempinski.jpg" alt="amazing caves coverimage" class="img-fluid" width="100%" height="200rem">
							</div>

							<div class="content">
								<h3><a href="single-post.html">Kempinski Hotel Ishtar Dead Sea</a></h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo explicabo quos harum labore, adipisci natus.</p>
								<a class="btn btn-main" href="single.php">See more</a>
							</div>
						</div>
					</article>
					<!-- /single blog post -->

					<!-- single blog post -->
					<article class="col-lg-4 col-md-6">
						<div class="post-item">
							<div class="media-wrapper">
								<img loading="lazy" src="images/home/tal-rumman-restaurant.jpg" alt="amazing caves coverimage" class="img-fluid" width="100%" height="200rem">
							</div>

							<div class="content">
								<h3><a href="single-post.html">Tal Al-Rumman Restaurant</a></h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo explicabo quos harum labore, adipisci natus.</p>
								<a class="btn btn-main" href="single.php">See more</a>
							</div>
						</div>
					</article>
					<!-- end single blog post -->

					<!-- single blog post -->
					<article class="col-lg-4 col-md-6">
						<div class="post-item">
							<div class="media-wrapper">
								<img loading="lazy" src="images/home/the ritz.jpg" alt="amazing caves coverimage" class="img-fluid" width="100%" height="200rem">
							</div>

							<div class="content">
								<h3><a href="single-post.html">The Ritz-Carlton <br>Amman</a></h3>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo explicabo quos harum labore, adipisci natus.</p>
								<a class="btn btn-main" href="single.php">See more</a>
							</div>
						</div>
					</article>
					<!-- end single blog post -->
				</div> <!-- end row -->
			</div>
		</div>
	</div>
	<!-- end container -->
</section>


<?php
include_once('./layout/footer.php');
?>