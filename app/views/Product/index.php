<?php require APPROOT . '/views/includes/header.php';

?>

<?php
  if($_SESSION['theme'] == 'dark-theme'){
    echo '<link rel="stylesheet" href="http://localhost/ECommerceProject2022/css/style.css">';
  }?>
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
  <div class="owl-banner owl-carousel">
    <div class="banner-item-01">
      <div class="text-content">
        <h4>Sussy Keychains</h4>
        <h2>Sussiest Keychains on the market</h2>
      </div>
    </div>
    <div class="banner-item-02">
      <div class="text-content">
        <h4>Stay sus or get ejected</h4>
        <h2>Get your best products</h2>
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
          <span class="d-flex justify-content-center">
          <form action='' method='post' enctype="multipart/form-data">
            Minimum: $<output>25</output>
             <input type="range" name = "min" class="form-range" min = '0' max = '50' oninput="this.previousElementSibling.value = this.value">
             Maximum: $<output>75</output>
             <input type="range" name = "max" class="form-range" min = '50' max = '100' oninput="this.previousElementSibling.value = this.value">
             <button type="submit" name="filter" class='btn btn-danger'>Filter</button>
             </form>
              </span>
          <span class="d-flex justify-content-center">
          
            <form action='' method='post' enctype="multipart/form-data">
             
              <input type="search" id="site-search" name="title" placeholder="Search...">
              <button type="submit" name="search" class='btn btn-danger'><i class="fa fa-search"></i></button>
            </form>
          </span>

        </div>

      </div>









      <!-- Product Tile -->
      <?php
      foreach ($data as $item) {
        if (isset($_POST['search'])) {
          if (strpos(strtolower($item->name), strtolower($_POST['title'])) !== false) {
            displayProduct($item);
          }
        } else if(isset($_POST['filter'])){
          if (intval($item->price, 10) <= $_POST['max'] && intval($item->price, 10) >= $_POST['min']) {
            displayProduct($item);
          }
        } else {
          displayProduct($item);
        }
      }
      function displayProduct($item)
      {
        echo ("<div class='col-md-4'>");
        echo ("<div class='product-item'>");
        echo ("<a href='#' data-bs-toggle='modal' data-bs-target='#imgView" . $item->product_id . "'><img src='" . URLROOT . "/images/product_01.jpg' alt=''></a>");
        echo ("<div class='down-content'>");
        echo ("<a href='#' data-bs-toggle='modal' data-bs-target='#imgView" . $item->product_id . "'>");
        echo ("<h4>$item->name</h4>");
        echo ("</a>");
        echo ("<h6>$$item->price</h6>");
        echo ("<ul class='stars'>");
        echo ("<li><i class='fa fa-star'></i></li>");
        echo ("<li><i class='fa fa-star'></i></li>");
        echo ("<li><i class='fa fa-star'></i></li>");
        echo ("<li><i class='fa fa-star'></i></li>");
        echo ("<li><i class='fa fa-star'></i></li>");
        echo ("</ul>");
        if (isLoggedIn()) {
          echo ("<span><a href='" . URLROOT . "/Product/addCart/" . $item->product_id . "'><button class='btn btn-danger'>Add to cart</button></a></span>");
        } else {
          echo ("<span><a href='" . URLROOT . "/Login/" . $item->product_id . "'><button class='btn btn-danger'>Add to cart</button></a></span>");
        }
        echo ("</div>");
        echo ("</div>");
        echo ("</div>");
      }
      foreach ($data as $item) {
        require APPROOT . '/views/Product/modal.php';
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
          <p class="para">We sell sus keychains of everyone's favourite crewmates.</p>
          <ul class="featured-list">
            <li>Play with our keychains here!</li>
            <li>Click and drag to rotate the keychain.</li>
          </ul>
          <a href="<?php echo URLROOT; ?>/login/index" class="filled-button">Login/Register</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="viewer-bg bg-dark bg-gradient border-light rounded">
            <div class="viewer" id="viewer-3d" onmousemove="myFunction(event)"></div>
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
              <h4><em>Sussiest Keychains</em> For Sale</h4>
              <p>amogus ඝ ඞ</p>
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
     

<script>
  var scrollValues = [-1440/2, -2160/2, -2880/2, -3600/2, -4320/2, -5040/2, 0, -720/2];
  var leftValues = [0, 0, 0, 0, 0, 0, 0, 0];
  var widthValues = [360, 360, 360, 360, 360, 360, 360, 360];
  var numRotations = 8;
  var imgSrc = <?php echo ("'" . URLROOT . "/images/mogusRotationRed.png'") ?>;
  var mousedown;

  function logButtons(e) {
    mousedown = e.type;
  }
  document.addEventListener('mouseup', logButtons);
  document.addEventListener('mousedown', logButtons);

  function myFunction(e) {
    var x = e.clientX;
    var y = e.clientY;

    if (mousedown == 'mousedown') {

      var sv = getValuesFromX(x);
      console.log(imgSrc);
      var bg = "rgba(0, 0, 0, 0) url('"+ imgSrc + "') no-repeat scroll " + sv[0] + "px 0px"
      document.getElementById("viewer-3d").style.background = bg;
      document.getElementById("viewer-3d").style.left = sv[1] + "px";
      document.getElementById("viewer-3d").style.width = sv[2] + "px";
      document.getElementById("viewer-3d").style.backgroundSize = "cover";
    }
  }

  function getValuesFromX(x) {
    var want = Math.floor(x / 16) % 8;
    console.log("want val " + want);
    var s = scrollValues[want];
    var l = leftValues[want];
    var w = widthValues[want];
    return [s, l, w];
  }
</script>


<?php require APPROOT . '/views/includes/footer.php'; ?>
