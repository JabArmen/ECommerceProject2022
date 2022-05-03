<?php require APPROOT . '/views/includes/header.php';

?>

<?php
if ($_SESSION['theme'] == 'dark-theme') {
  echo '<link rel="stylesheet" href="http://localhost/ECommerceProject2022/css/style.css">';
} ?>
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
              <input type="range" name="min" class="form-range" min='0' max='50' oninput="this.previousElementSibling.value = this.value">
              Maximum: $<output>75</output>
              <input type="range" name="max" class="form-range" min='50' max='100' oninput="this.previousElementSibling.value = this.value">
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
        } else if (isset($_POST['filter'])) {
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

      <div class="d-flex justify-content-center mt-5">
        <a class="btn btn-primary skip" style="margin: 5px;" href="http://localhost/ECommerceProject2022/Product/theme" background:#333; color:#fff>Change Theme</a>

        <a class="btn btn-primary skip" style="margin: 5px;" href="#popup1" background:#333; color:#fff;>Newsletter Signup!</a>
      </div>
    </div>


  </div>
</div>
<style>
  .overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    transition: opacity 500ms;
    visibility: hidden;
    opacity: 0;
    z-index: 9999;
  }

  .overlay:target {
    visibility: visible;
    opacity: 1;
  }

  #popup1 {
    font-family: poppins;
  }

  #popup1 .popup {
    margin: 0px auto;
    padding: 50px 20px;
    background: #fff;
    border-radius: 0px;
    height: 260px;
    width: 690px;
    position: relative;
    text-align: center;
    top: 50% !important;
    position: fixed !important;
    -moz-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    right: 0px;
    left: 0;
  }

  #popup1 .popup h2 {
    margin-top: 0;
    color: #333;
  }

  #popup1 .popup .close {
    position: absolute;
    top: 0px;
    right: 0px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: normal;
    text-decoration: none;
    text-align: center;
    background: #333;
    border-radius: 0;
    cursor: pointer;
    float: right;
    padding: 0;
    color: #fff;
    margin-top: 0;
    margin-right: 0;
    height: 40px;
    width: 40px;
    line-height: 45px;
  }

  #popup1 .popup .close:hover {
    color: #06D85F;
  }

  #popup1 .popup .content {
    max-height: 30%;
    overflow: auto;
  }

  #popup1 .newletter-title h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #000;
    font-weight: 700;
    letter-spacing: 3px;
    margin: 0 0 15px;
  }

  #popup1 .box-content label {
    font-weight: 400;
    max-width: 560px;
    display: inline-block;
    margin-bottom: 5px;
    font-size: 14px;
    line-height: 26px;
  }

  .newletter-popup {
    background: #fff;
    top: 50% !important;
    position: fixed !important;
    padding: 0;
    text-align: center;
    -moz-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
  }

  #popup1 #frm_subscribe #subscribe_pemail {
    background: #EBEBEB none repeat scroll 0% 0%;
    border: medium none;
    height: 40px;
    width: 65%;
    margin: 20px 0;
    padding-left: 15px;
  }

  #popup1 #frm_subscribe a {
    cursor: pointer;
    border: none;
    background: #333;
    padding: 3px 25px;
    text-transform: uppercase;
    font-size: 14px;
    color: #fff;
    font-weight: 600;
    line-height: 34px;
    display: inline-block;
    border-radius: 0;
    letter-spacing: 2px;
  }

  #popup1 .box-content .subscribe-bottom {
    margin-top: 20px;
  }

  #popup1 .box-content .subscribe-bottom #newsletter_popup_dont_show_again {
    display: inline-block;
    margin: 0;
    vertical-align: middle;
    margin-top: -1px;
  }

  #popup1 .box-content .subscribe-bottom label {
    margin: 0;
    font-weight: 400;
    max-width: 650px;
    display: inline-block;
    margin-bottom: 5px;
    font-size: 12px;
  }
</style>
<div id="popup1" class="overlay">
  <div class="popup"> <a class="close" id="closeB" href="#">&times;</a>
    <div id="dialog" class="window">

      <div class="box">
        <div class="newletter-title">
          <h2>Sign up &amp; get 10% off</h2>
        </div>
        <div class="box-content newleter-content">
          <label>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers.</label>
          <div id="frm_subscribe">
            <form name="subscribe" id="subscribe_popup">
              <div>
                <!-- <span class="required">*</span><span>Email</span>-->
                <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail">
                <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">
                <div id="notification"></div>
                <a class="button" onclick="email_subscribepopup()"><span>Submit</span></a>
              </div>
            </form>
            <div class="subscribe-bottom">
            </div>
          </div>
          <!-- /#frm_subscribe -->
        </div>
        <!-- /.box-content -->
      </div>
    </div>
  </div>
</div>
     


<script>
  var scrollValues = [-1440 / 2, -2160 / 2, -2880 / 2, -3600 / 2, -4320 / 2, -5040 / 2, 0, -720 / 2];
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
      var bg = "rgba(0, 0, 0, 0) url('" + imgSrc + "') no-repeat scroll " + sv[0] + "px 0px"
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


<script>
  function show() {
    var button2 = document.querySelector("#closeB");
    button2.addEventListener('click', function runThisOnButtonClick(event) {
    
      document.getElementsByClassName("overlay")[0].style.visibility = "hidden";
      document.getElementsByClassName("overlay")[0].style.opacity = "0";
});
    function news(){
    document.getElementsByClassName("overlay")[0].style.visibility = "visible";
    document.getElementsByClassName("overlay")[0].style.opacity = "1";
    }
    
    setTimeout(function(){document.getElementsByClassName("overlay")[0].style.visibility = "visible";
    document.getElementsByClassName("overlay")[0].style.opacity = "1";}, 3000);
  }
  show();
</script>


<?php require APPROOT . '/views/includes/footer.php'; ?>
