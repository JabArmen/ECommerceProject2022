<!DOCTYPE html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title><?php echo URLROOT; ?></title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/fontawesome.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/templatemo-sixteen.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/owl.css">

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <style>

        div.viewer-bg {
            position: relative;
            width: 360px;
            height: 360px
        }
        
        #tooltip {
          position: relative;
          cursor:pointer;
        }
        #tooltipText {
          height: fit-content;
          width: fit-content;
          position:absolute;
          left:50%;
          bottom:0;
          transform: translateX(-50%);
          background-color: #fff;
          color: #fff;
          white-space: nowrap;
          padding: 10px 15px;
          border-radius: 7px;
          visibility: hidden;
          opacity: 0;
          transition: opacity 3s ease;
          margin-top: 50px;
        }
        #tooltipText :: before{
          content:"";
          position: absolute;
          left: 50%;
          bottom: 100%;
          transform: translateX(-50%);
          border: 15px solid;
          border-color: #fff #fff #fff #fff;
        }

        #tooltip:hover #tooltipText{
          top: 30%;
          visibility: visible;
          opacity: 1;
          color:black;
        }
        div.viewer {
            cursor: move;
            position: relative;
            width: 360px;
            height: 360px;
            <?php
            echo "background: rgba(0, 0, 0, 0) url('" . URLROOT . "/images/mogusRotationRed.png') no-repeat scroll -720px 0px / cover;"
            ?>
            left: 0px
        }
        
    </style>

</head>

<body>


  <!-- Header -->
  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="/ECommerceProject2022/Product/index">
          <h2>Sussy<em>Keychains</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/ECommerceProject2022/Product/index">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/ECommerceProject2022/Product/index">Our Products</a>
              </li>
              <?php
                if (isLoggedIn()) {
                  echo "<li class='nav-item'> <a class='nav-link' href='/ECommerceProject2022/UserInfo/checkPassword'>Edit Info</a> </li>"; 
                }
              ?>
          </ul>
          
        </div>
        <ul class="nav navbar-nav navbar-right">
    <?php
    if (isLoggedIn()) {
      echo '<li class="nav-item"><a class="nav-link" href="#delete" data-bs-toggle="modal" data-bs-target="#"><i class="fa fa-trash" aria-hidden="true"></i> delete</a></li>';
      echo '<div id="tooltip"><li class="nav-item"><a class="nav-link" href="/ECommerceProject2022/Cart/index"><i class="fa fa-shopping-cart" aria-hidden="true"></i>';
            if (!isset($_SESSION['cart_products'])) {
              echo 'Cart';
            } 
            else {
              $count = 0;
              for($num = 0; $num <100; $num+=1){
                if (isset($_SESSION['cart_products'][$num]))
                  $count += $_SESSION['cart_products'][$num];
              } 
              echo ' '.$count.' items in your cart!';
            
            echo '</a></li><ul id="tooltipText"><h5> Cart Summary</h5>';
            $this->productModel = $this->model('productModel');
            for($num = 0; $num <100; $num+=1){
              if (isset($_SESSION['cart_products'][$num]))
                echo '<li>'.$this->productModel->getProduct($num)->name.' x'.$_SESSION['cart_products'][$num].'</li>';
            } 
            echo '</ul>';
            }
            echo '</div><li class="nav-item"><a class="nav-link" href="/ECommerceProject2022/TwoFA/Setup"><i class="fa fa-key" aria-hidden="true"></i> 2FA </a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="/ECommerceProject2022/Login/logout"><i class="fa-solid fa-sign-out"></i> Logout  ' . $_SESSION['user_username'] . '</a></li>';
            
    } 
    else {
      echo '<li class="nav-item"><a class="nav-link" href="/ECommerceProject2022/Login/Create"><i class="fa-solid fa-user-plus"></i> Sign Up</a></li>
          <li class="nav-item"><a class="nav-link" href="/ECommerceProject2022/Login/"><i class="fa-solid fa-sign-in"></i> Login</a></li>';
    }
    ?>
  </ul>
  </header>
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
      </div>
    </nav>
    
    <?php 
      if (isLoggedIn()) {
          include APPROOT . '/views/includes/modal.php';
      }
    ?>
    <?php 
      if (!isset($_SESSION['popup'])) {
        include APPROOT . '/views/includes/socialMedia.php';
      }
      $_SESSION['popup'] = true;
    ?>
    