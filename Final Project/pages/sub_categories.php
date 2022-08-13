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

                <div class="col-lg-11 ml-4">


                    <div class="row ml-5">

                        <?php foreach ($sub_cat as $i) { ?>

                            <article class="col-lg-6 col-md-6">
                                <div class="post-item text-center">
                                    <div class="media-wrapper">
                                        <a href="service.php?category_name=<?php echo $_GET['category_name'] ?>&sub=<?php echo $i['sub_cat_id'] ?>">
                                            <img loading="lazy" src="images/home/<?php echo $i['sub_cat_img'] ?>" alt="amazing caves coverimage" class="img-fluid" width="100%" style="height: 25rem;">
                                        </a>
                                    </div>

                                    <div class="content">
                                        <h3><a href="service.php?category_name=<?php echo $_GET['category_name'] ?>&sub=<?php echo $i['sub_cat_id'] ?>">
                                                <?php echo $i['sub_cat_name'] ?>
                                            </a></h3>
                                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo explicabo quos harum labore, adipisci natus.</p> -->
                                        <a class="btn btn-main" href="service.php?category_name=<?php echo $_GET['category_name'] ?>&sub=<?php echo $i['sub_cat_id'] ?>">See more</a>
                                    </div>
                                </div>
                            </article>

                        <?php } ?>


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