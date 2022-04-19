
<?php 
  if(isset($_SESSION['admin'])){
     require APPROOT . '/views/Admin/header.php';
  }else {
    require APPROOT . '/views/includes/header.php';  
  }
?>
<br><br>
<div class="jumbotron m-5">
  <h1 class="display-6 text-center m-5 text-danger "><em>Important: </em><br>Please scan the QRcode <i class="fa fa-qrcode" aria-hidden="true"></i>
</h1>

  <?php
      if(!empty($data['qrcode'])){
        echo $data['qrcode'];
      }
?>
</div>

<h2></h2>






<?php require APPROOT . '/views/includes/footer.php'; ?>