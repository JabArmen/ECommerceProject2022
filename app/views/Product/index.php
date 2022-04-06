<?php require APPROOT . '/views/includes/header.php';
?>
  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div class="banner header-text">
    <div class="owl-banner owl-carousel">
      <div class="banner-item-01">
        <div class="text-content">
          <h4>Best Offer</h4>
          <h2>New Arrivals On Sale</h2>
        </div>
      </div>
      <div class="banner-item-02">
        <div class="text-content">
          <h4>Flash Deals</h4>
          <h2>Get your best products</h2>
        </div>
      </div>
      <div class="banner-item-03">
        <div class="text-content">
          <h4>Last Minute</h4>
          <h2>Grab last minute deals</h2>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner Ends Here -->

  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
          </div>
        </div>

        <!-- Product Tile -->
        <?php
          $i = 0;
          foreach ($data as $item) {
            echo("<div class='col-md-4'>");
              echo("<div class='product-item'>");
                echo("<a href='#'><img src='".URLROOT."/images/product_01.jpg' alt=''></a>");
                echo("<div class='down-content'>");
                  echo("<a href='#'>");
                    echo("<h4>$item->name</h4>");
                  echo("</a>");
                  echo("<h6>$$item->price</h6>");
                  echo("<p>$item->description</p>");
                  echo("<ul class='stars'>");
                    echo("<li><i class='fa fa-star'></i></li>");
                    echo("<li><i class='fa fa-star'></i></li>");
                    echo("<li><i class='fa fa-star'></i></li>");
                    echo("<li><i class='fa fa-star'></i></li>");
                    echo("<li><i class='fa fa-star'></i></li>");
                  echo("</ul>");
                  echo("<span><a href='#'><button class='btn btn-danger'>Add to cart</button></a></span>");
                echo("</div>");
              echo("</div>");
            echo("</div>");
          }
        ?>

      </div>
    </div>
  </div>

  <div class="best-features">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>About SussyKeychains</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="left-content">
            <h4>Looking for the best products?</h4>
            <p>We sell sus keychains of everyone's favourite crewmates.</p>
            <ul class="featured-list">
              <li><a href="#">Lorem ipsum dolor sit amet</a></li>
              <li><a href="#">Consectetur an adipisicing elit</a></li>
              <li><a href="#">It aquecorporis nulla aspernatur</a></li>
              <li><a href="#">Corporis, omnis doloremque</a></li>
              <li><a href="#">Non cum id reprehenderit</a></li>
            </ul>
            <a href="<?php echo URLROOT;?>/login/index" class="filled-button">Login/Register</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="right-image">
            <img src="<?php echo URLROOT; ?>/images/feature-image.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-md-8">
                <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
              </div>
              <div class="col-md-4">
                <a href="#" class="filled-button">Purchase Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php require APPROOT . '/views/includes/footer.php'; ?>