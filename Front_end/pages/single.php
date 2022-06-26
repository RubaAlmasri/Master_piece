<?php
include_once('./layout/header.php');
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
        <h2>Hotel Single</h2>
        <ol class="breadcrumb header-bradcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Hotel Single</li>
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
            <div class="card">
              <div class="row g-0">
                <div class="col-md-6 border-end">
                  <div class="d-flex flex-column justify-content-center">
                    <div class="main_image">
                      <img src="images/home/Kempinski.jpg" id="main_product_image" width="350">
                    </div>
                    <div class="thumbnail_images">
                      <ul id="thumbnail">
                        <li><img onclick="changeImage(this)" src="images/home/Kempinski.jpg" width="70"></li>
                        <li><img onclick="changeImage(this)" src="images/home/k2.jpg" width="70"></li>
                        <li><img onclick="changeImage(this)" src="images/home/k3.jpg" width="70"></li>
                        <li><img onclick="changeImage(this)" src="images/home/k4.jpg" width="70"></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="p-3 right-side">
                    <div class="d-flex justify-content-between align-items-center">
                      <h3 class="mt-5">Kempinski Hotel Ishtar Dead Sea</h3>
                    </div>
                    <div class="ratings d-flex flex-row align-items-center">
                      <h6>Sweimeh Dead Sea Road, 18186 Sowayma, Jordan <a href="https://g.page/KempinskiDeadSea?share" target="_blank">Show map</a></h6>
                    </div>
                    <h5>JOD 225 + JOD 28 taxes and charges</h5>

                    <div class="mt-2 pr-3 content">
                      <p>This property is 1 minute walk from the beach. Boasting tree-lined outdoor pools overlooking the waters of the Dead Sea, the 5-star Kempinski features a private stretch of beach and a spa offering sea mud and sea salt treatments.</p>
                    </div>


                    <div class="buttons d-flex flex-row mt-5 gap-3"> <a class="btn btn-main" href="book-form.php">Book Now</a> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="post-content">


            <h3>2 comments</h3>
            <ul class="comment-list">
              <!-- comment list -->
              <li class="comment-list-item">
                <div class="comment-list-item-image">
                  <img loading="lazy" src="images/blog/comment-1.jpg" alt="comment-img">
                </div>
                <div class="comment-list-item-content">
                  <h5>Anke Kirsch</h5>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolor emque laudant tota rem
                    ape riamipsa eaque. </p>
                </div>
              </li>
              <li class="comment-list-item">
                <div class="comment-list-item-image">
                  <img loading="lazy" src="images/blog/comment-2.jpg" alt="comment-img">
                </div>
                <div class="comment-list-item-content">
                  <h5>Falk Burger</h5>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolor emque laudant tota rem
                    ape riamipsa eaque. </p>
                </div>
              </li>
            </ul>
            <h3>Leave A Comments</h3>
            <!-- Comment Form -->
            <form action="#" class="comment-form">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <label for="first-name">Name: <span style="color: red;">*</span></label>
                  <input type="text" name="first-name" class="form-control" id="first-name" required>
                </div>
                <div class="col-lg-6 col-md-6">
                  <label for="mail">Email: <span style="color: red;">*</span></label>
                  <input type="email" name="mail" class="form-control" id="mail" required>
                </div>
                <div class="col-lg-12 col-md-12">
                  <label for="msg">Message: <span style="color: red;">*</span></label>
                  <textarea class="form-control" name="msg" id="msg" rows="6" required></textarea>
                </div>
              </div>
              <button type="submit" value="send" class="btn btn-main">Send Message</button>
            </form>
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