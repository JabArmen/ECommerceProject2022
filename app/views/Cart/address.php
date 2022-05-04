<?php require APPROOT . '/views/includes/header.php';  ?>

  
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <!-- hack -->
      <div class="mt-5"></div>
      <div class="mt-5"></div>
      <!-- end hack -->
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="post" action="">
          <h1>Register</h1>
          <br>
          <div class="form-outline mb-4">

            <input name = "address" type="text" id="address" class="form-control form-control-lg"
              placeholder="Address" value = "<?php echo $data['address']  ?>"/> 
              
            <label class="form-label" for="address">Please insert the address</label>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Checkout</button>
          </div>
          <?php

if($data != []){
  foreach($data as $key => $value){
  if (str_contains($key,'err') && $value != ''){
    echo '<div class="alert alert-danger" role="alert">'.
        $value.'
    </div>';
}
  }
}

?>
        </form>
      </div>
    </div>
  </div>
  
</section>

<?php require APPROOT . '/views/includes/footer.php'; ?>