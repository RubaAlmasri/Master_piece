<?php
$page = 'city';
include_once('./layout/header.php');
include_once './connect/connect.php';


try {


?>

	<section class="single-page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>
						<?php
						if ($_GET["sub"] == 1) {
							echo 'Hotels';
						} else {
							echo 'Tourist Places';
						}
						?>
					</h2>
					<ol class="breadcrumb header-bradcrumb justify-content-center">
						<li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">
							<?php
							echo $_GET['category_name'];
							?>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							<?php
							if ($_GET["sub"] == 1) {
								echo 'Hotels';
							} else {
								echo 'Tourist Places';
							}
							?>
						</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="blog" id="blog">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<!-- section title -->
				<!-- <div class="col-xl-6 col-lg-8">
				<div class="title text-center ">
					<h2> Our <span class="color">Services</span></h2>
					<div class="border"></div>
				</div>
			</div> -->
				<!-- /section title -->
			</div>
			<div class="row mt-5">
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
								<?php foreach($categories as $cat) {?>
								<li>
									<a href="sub_categories.php?category_id=<?php echo $cat['category_id'] ?>&category_name=<?php echo $cat["category_name"] ?>"><?php echo $cat["category_name"] ?></a>
								</li>
								
								<?php } ?>
							</ul>
						</div>
					</aside>
				</div>
				<div class="col-lg-9">


					<div class="row">

						<?php
						if ($_GET["sub"] == 3 && $places != null) {
							foreach ($places as $i) {
								if ($i["city"] == $_GET["category_name"]) { ?>

									<article class="col-lg-4 col-md-6">
										<div class="post-item">
											<div class="media-wrapper">
												<a href="single.php?place_id=<?php echo $i["id"] ?>&place_sub=<?php echo $i["sub_categories"] ?>&place_name=<?php echo $i["name"] ?>">
													<img loading="lazy" src="../admin/images/<?php echo $i["img1"] ?>" alt="amazing caves coverimage" class="img-fluid" width="100%" style="height: 15rem;">
												</a>
											</div>

											<div class="content">
												<h3 style="height: 3rem;"><a href="single.php?place_id=<?php echo $i["id"] ?>&place_sub=<?php echo $i["sub_categories"] ?>&place_name=<?php echo $i["name"] ?>"><?php echo $i["name"] ?></a></h3>
												<p class="mt-4"><?php echo substr($i["about"], 0, 50) . " ..." ?></p>
												<a class="btn btn-main" href="single.php?place_id=<?php echo $i["id"] ?>&place_sub=<?php echo $i["sub_categories"] ?>&place_name=<?php echo $i["name"] ?>">See more</a>
											</div>
										</div>
									</article>

								<?php }
							}
						}
						if ($_GET["sub"] == 1 && $hotels != null) {
							foreach ($hotels as $i) {
								if ($i["city"] == $_GET["category_name"]) { ?>

									<article class="col-lg-4 col-md-6">
										<div class="post-item">
											<div class="media-wrapper">
												<a href="single.php?place_id=<?php echo $i["id"] ?>&place_sub=<?php echo $i["sub_category"] ?>&place_name=<?php echo $i["name"] ?>">
													<img loading="lazy" src="../admin/images/<?php echo $i["img1"] ?>" alt="amazing caves coverimage" class="img-fluid" width="100%" style="height: 15rem;">
												</a>
											</div>

											<div class="content">
												<h3 style="height: 3rem;"><a href="single.php?place_id=<?php echo $i["id"] ?>&place_sub=<?php echo $i["sub_category"] ?>&place_name=<?php echo $i["name"] ?>"><?php echo $i["name"] ?></a></h3>
												<p class="mt-4"><?php echo substr($i["about"], 0, 50) . " ..." ?></p>
												<a class="btn btn-main" href="single.php?place_id=<?php echo $i["id"] ?>&place_sub=<?php echo $i["sub_category"] ?>&place_name=<?php echo $i["name"] ?>">See more</a>
											</div>
										</div>
									</article>

						<?php }
							}
						} ?>
					</div> <!-- end row -->
				</div>
			</div>
		</div>
		<!-- end container -->
	</section>


<?php
	include_once('./layout/footer.php');
} catch (PDOException $e) {
	echo $query . "<br>" . $e->getMessage();
} finally {
	$conn = NULL;
}
?>