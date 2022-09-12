<?php

$page = 'city';
include_once('./layout/header.php');

try {

?>
    <section class="single-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Our Services</h2>
                    <ol class="breadcrumb header-bradcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Our Services</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    


    

		<section class="blog" id="blog">
		<div class="container">
			<div class="row justify-content-center">
				<!-- section title -->
				<div class="col-xl-6 col-lg-8">
					<div class="title text-center ">
						<h2>Our <span class="color">Services</span></h2>
						<div class="border"></div>
					</div>
				</div>
				<!-- /section title -->
			</div>

			<div class="row">
				<!-- single blog post -->
				<?php foreach ($sub_cat as $i) { ?>
					<article class="col-lg-6 col-md-6">
						<div class="post-item h-100">
							<div class="media-wrapper">
								<a href="service.php?category_name=<?php echo $_GET['category_name'] ?>&sub=<?php echo $i['sub_cat_id'] ?>">
									<img loading="lazy" src="images/home/<?php echo $i['sub_cat_img'] ?>" alt="amazing caves coverimage" class="img-fluid" style="width: 100%; height: 20rem;">
								</a>
							</div>

							<div class="content text-center">
								<h3 ><a href="service.php?category_name=<?php echo $_GET['category_name'] ?>&sub=<?php echo $i['sub_cat_id'] ?>"><?php echo $i['sub_cat_name'] ?></a></h3>
								<a class="btn btn-main" href="service.php?category_name=<?php echo $_GET['category_name'] ?>&sub=<?php echo $i['sub_cat_id'] ?>">See more</a>
							</div>
						</div>
					</article>
					<!-- /single blog post -->
				<?php } ?>
			</div> <!-- end row -->
		</div> <!-- end container -->
	</section>

<?php
    include_once('./layout/footer.php');
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
} finally {
    $conn = NULL;
}
?>