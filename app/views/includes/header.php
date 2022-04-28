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

  <style>

        div.viewer-bg {
            position: relative;
            width: 360px;
            height: 360px
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
              
          </ul>
          
        </div>
        <ul class="nav navbar-nav navbar-right">
    <?php
    if (isLoggedIn()) {
      echo '<li class="nav-item"><a class="nav-link" href="/ECommerceProject2022/Cart/index"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart </a></li>';
      echo '<li class="nav-item"><a class="nav-link" href="/ECommerceProject2022/TwoFA/Setup"><i class="fa fa-key" aria-hidden="true"></i> 2FA </a></li>';
      echo '<li class="nav-item"><a class="nav-link" href="/ECommerceProject2022/Login/logout"><i class="fa-solid fa-sign-out"></i> Logout  '. $_SESSION['user_username'].'</a></li>';

    } 
    else {
      echo '<li class="nav-item"><a class="nav-link" href="/ECommerceProject2022/Login/Create"><i class="fa-solid fa-user-plus"></i> Sign Up</a></li>
          <li class="nav-item"><a class="nav-link" href="/ECommerceProject2022/Login/"><i class="fa-solid fa-sign-in"></i> Login</a></li>';
    }
    ?>
  </ul>
      </div>
    </nav>
  </header>