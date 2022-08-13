<?php
include_once('./layout/header.php');

$user_id = $_SESSION['id'] ?? null;
$user_name = $_SESSION['name'] ?? null;
?>
<!--
End Fixed Navigation
==================================== -->
<script>
  function changeImage(element) {

    var main_prodcut_image = document.getElementById('main_product_image');
    main_prodcut_image.src = element.src;

  }
</script>

<style>
  .card {
    border: none;
    overflow: hidden
  }

  .thumbnail_images ul {
    list-style: none;
    justify-content: center;
    display: flex;
    align-items: center;
    margin-top: 10px
  }

  .thumbnail_images ul li {
    margin: 5px;
    padding: 10px;
    border: 2px solid #eee;
    cursor: pointer;
    transition: all 0.5s
  }

  .thumbnail_images ul li:hover {
    border: 2px solid #000
  }

  .main_image {
    display: flex;
    justify-content: center;
    align-items: center;
    border-bottom: 1px solid #eee;
    height: 400px;
    width: 100%;
    overflow: hidden
  }

  .content p {
    font-size: 12px
  }

  .ratings span {
    font-size: 14px;
    margin-left: 12px
  }

  .right-side {
    position: relative
  }
</style>
<section class="single-page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>
          <?php
          if ($_GET["place_sub"] == 1) {
            echo 'Single Hotel';
          } else {
            echo 'Single Place';
          }
          ?>
        </h2>
        <ol class="breadcrumb header-bradcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>

          <li class="breadcrumb-item active" aria-current="page"><?php
                                                                  if ($_GET["place_sub"] == 1) {
                                                                    echo 'Single Hotel';
                                                                  } else {
                                                                    echo 'Single Place';
                                                                  }
                                                                  ?></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- blog details part start -->
<section class="blog-details section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <article class="post">
          <div class="container mt-5 mb-5">

            <?php
            if ($_GET["place_sub"] == 3) {
              foreach ($places as $i) {
                if ($i["id"] == $_GET["place_id"]) { ?>

                  <div class="card">
                    <div class="row g-0 mb-5">
                      <div class="col-md-6 border-end mb-5">
                        <div class="d-flex flex-column justify-content-center">
                          <div class="main_image">
                            <img src="../admin/images/<?php echo $i["img1"] ?>" id="main_product_image" width="350" style="height: 15rem;">
                          </div>
                          <div class="thumbnail_images">
                            <ul id="thumbnail">
                              <li><img onclick="changeImage(this)" src="../admin/images/<?php echo $i["img1"] ?>" width="70" style="height: 3rem;"></li>
                              <li><img onclick="changeImage(this)" src="../admin/images/<?php echo $i["img2"] ?>" width="70" style="height: 3rem;"></li>
                              <li><img onclick="changeImage(this)" src="../admin/images/<?php echo $i["img3"] ?>" width="70" style="height: 3rem;"></li>
                              <li><img onclick="changeImage(this)" src="../admin/images/<?php echo $i["img4"] ?>" width="70" style="height: 3rem;"></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-5">
                        <div class="p-3 right-side">
                          <div class="d-flex justify-content-between align-items-center mt-5">
                            <h3 class="mt-5"><?php echo $i["name"] ?></h3>
                          </div>
                          <div class="ratings d-flex flex-row align-items-center">
                            <h6><?php echo $i["location"] ?> <a href="<?php echo $i["location_link"] ?>" target="_blank">Show map</a></h6>
                          </div>

                          <div class="mt-2 pr-3 content">
                            <h6 style="color: #606161;"><?php echo $i["about"] ?></h6>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>



                  <!-- Comments -->

                  <div class="post-content mt-5">


                    <h3>Comments</h3>
                    <ul class="comment-list">
                      <!-- comment list -->
                      <?php
                      foreach ($p_comments as $i) {
                      ?>
                        <li class="comment-list-item">
                          <div class="comment-list-item-image">
                            <img loading="lazy" src="images/blog/profile.png" alt="comment-img" width="40" height="40">
                          </div>
                          <div class="comment-list-item-content">
                            <h5><?php echo $i["user_name"] ?></h5>
                            <p><?php echo substr($i["comment_date"], 0, 10) ?></p>
                            <h6><?php echo $i["comment"] ?></h6>
                          </div>
                        </li>
                      <?php } ?>
                    </ul>
                    <?php
                    if ($user_id) {
                    ?>
                      <h3>Leave A Comment</h3>
                      <!-- Comment Form -->
                      <form action="add_comment.php" class="comment-form"  method="post">
                        <input type="hidden" name="p_id" value="<?php echo $_GET["place_id"] ?>">
                        <input type="hidden" name="p_sub" value="<?php echo $_GET["place_sub"] ?>">
                        <input type="hidden" name="p_name" value="<?php echo $_GET["place_name"] ?>">
                        <input type="hidden" name="u_id" value="<?php echo $user_id ?>">
                        <input type="hidden" name="u_name" value="<?php echo $user_name ?>">
                        <div class="row">
                          <div class="col-lg-12 col-md-12">
                            <textarea class="form-control" name="comment" id="comment" rows="3" required></textarea>
                          </div>
                        </div>
                        <button type="submit" value="send" class="btn btn-main">Comment</button>
                      </form>
                    <?php } else { ?>
                      <h3>Leave A Comment</h3>
                      <div class="alert alert-warning" role="alert">
                        Login To Leave A Comment
                      </div>
                      <!-- Comment Form -->
                      <form action="add_comment.php" class="comment-form"  method="post">
                        <input type="hidden" name="p_id" value="<?php echo $_GET["place_id"] ?>">
                        <input type="hidden" name="p_sub" value="<?php echo $_GET["place_sub"] ?>">
                        <input type="hidden" name="p_name" value="<?php echo $_GET["place_name"] ?>">
                        <input type="hidden" name="u_id" value="<?php echo $user_id ?>">
                        <input type="hidden" name="u_name" value="<?php echo $user_name ?>">
                        <div class="row">
                          <div class="col-lg-12 col-md-12">
                            <textarea class="form-control" name="comment" id="comment" rows="3" disabled></textarea>
                          </div>
                        </div>
                        <button type="submit" value="send" class="btn btn-main" disabled>Comment</button>
                      </form>
                    <?php } ?>
                  </div>
                <?php
                }
              }
            }
            if ($_GET["place_sub"] == 1) {
              foreach ($hotels as $i) {
                if ($i["id"] == $_GET["place_id"]) {
                ?>

                  <div class="card">
                    <div class="row g-0 mb-5">
                      <div class="col-md-6 border-end mb-5">
                        <div class="d-flex flex-column justify-content-center">
                          <div class="main_image">
                            <img src="../admin/images/<?php echo $i["img1"] ?>" id="main_product_image" width="350" style="height: 15rem;">
                          </div>
                          <div class="thumbnail_images">
                            <ul id="thumbnail">
                              <li><img onclick="changeImage(this)" src="../admin/images/<?php echo $i["img1"] ?>" width="70" style="height: 3rem;"></li>
                              <li><img onclick="changeImage(this)" src="../admin/images/<?php echo $i["img2"] ?>" width="70" style="height: 3rem;"></li>
                              <li><img onclick="changeImage(this)" src="../admin/images/<?php echo $i["img3"] ?>" width="70" style="height: 3rem;"></li>
                              <li><img onclick="changeImage(this)" src="../admin/images/<?php echo $i["img4"] ?>" width="70" style="height: 3rem;"></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-5">
                        <div class="p-3 right-side">
                          <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mt-5"><?php echo $i["name"] ?></h3>
                          </div>
                          <div class="ratings d-flex flex-row align-items-center">
                            <h6><?php echo $i["location"] ?> <a href="<?php echo $i["location_link"] ?>" target="_blank">Show map</a></h6>
                          </div>

                          <div class="ratings d-flex flex-row align-items-center">
                            <h6><b><?php echo $i["price"] ?> JD</b></h6>
                          </div>
                          <div class="mt-2 pr-3 content">
                            <h6 style="color: #606161;"><?php echo $i["about"] ?></h6>
                          </div>


                          <div class="buttons d-flex flex-row mt-5 gap-3">
                            <a class="btn btn-main" href="book-form.php?place_id=<?php echo $i["id"]?>&place_name=<?php echo $i["name"]?>">Book Now</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



                  <!-- Comments -->

                  <div class="post-content mt-5">


                    <h3>Comments</h3>
                    <ul class="comment-list">
                      <!-- comment list -->
                      <?php
                      foreach ($h_comments as $i) {
                      ?>
                        <li class="comment-list-item">
                          <div class="comment-list-item-image">
                            <img loading="lazy" src="images/blog/profile.png" alt="comment-img" width="40" height="40">
                          </div>
                          <div class="comment-list-item-content">
                            <h5><?php echo $i["user_name"] ?></h5>
                            <p><?php echo substr($i["comment_date"], 0, 10) ?></p>
                            <h6><?php echo $i["comment"] ?></h6>
                          </div>
                        </li>
                      <?php } ?>
                    </ul>
                    <?php
                    if ($user_id) {
                    ?>
                      <h3>Leave A Comment</h3>
                      <!-- Comment Form -->
                      <form action="add_comment.php" class="comment-form"  method="post">
                        <input type="hidden" name="p_id" value="<?php echo $_GET["place_id"] ?>">
                        <input type="hidden" name="p_sub" value="<?php echo $_GET["place_sub"] ?>">
                        <input type="hidden" name="p_name" value="<?php echo $_GET["place_name"] ?>">
                        <input type="hidden" name="u_id" value="<?php echo $user_id ?>">
                        <input type="hidden" name="u_name" value="<?php echo $user_name ?>">
                        <div class="row">
                          <div class="col-lg-12 col-md-12">
                            <textarea class="form-control" name="comment" id="comment" rows="3" required></textarea>
                          </div>
                        </div>
                        <button type="submit" value="send" class="btn btn-main">Comment</button>
                      </form>
                    <?php } else { ?>
                      <h3>Leave A Comment</h3>
                      <div class="alert alert-warning" role="alert">
                        Login To Leave A Comment
                      </div>
                      <!-- Comment Form -->
                      <form action="add_comment.php" class="comment-form" method="post">
                        <input type="hidden" name="p_id" value="<?php echo $_GET["place_id"] ?>">
                        <input type="hidden" name="p_sub" value="<?php echo $_GET["place_sub"] ?>">
                        <input type="hidden" name="p_name" value="<?php echo $_GET["place_name"] ?>">
                        <input type="hidden" name="u_id" value="<?php echo $user_id ?>">
                        <input type="hidden" name="u_name" value="<?php echo $user_name ?>">
                        <div class="row">
                          <div class="col-lg-12 col-md-12">
                            <textarea class="form-control" name="comment" id="comment" rows="3" disabled></textarea>
                          </div>
                        </div>
                        <button type="submit" value="send" class="btn btn-main" disabled>Comment</button>
                      </form>
                    <?php } ?>
                  </div>
            <?php }
              }
            } ?>
          </div>



        </article>
      </div>

    </div>
  </div>
</section>
<!-- blog details part end -->
<?php
include_once('./layout/footer.php');
?>