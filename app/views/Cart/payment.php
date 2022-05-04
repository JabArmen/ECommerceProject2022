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
          <h1>Please insert your credit card information</h1>
          <br>

          <div class="form-outline mb-4">
            <input name = "cardname" type="text" id="cardname" class="form-control form-control-lg"
              placeholder="Enter the name on the card" value = "<?php echo $data['user']->cardname?>"/>
            <label class="form-label" for="cardname">Card Name</label>
          </div>

          <div class="form-outline mb-4">
            <input name = "cardnum" type="text" id="cardnum" class="form-control form-control-lg"
              placeholder="Enter the card number" value = "<?php echo $data['user']->cardnum?>" />
            <label class="form-label" for="cardnum">Card Number</label>
          </div>

          <div class="form-outline mb-4">
            <input name = "card_expiration" type="text" id="card_expiration" class="form-control form-control-lg"
              placeholder="Enter the expiration date of the card" value = "<?php echo $data['user']->card_expiration?>"/>
            <label class="form-label" for="card_expiration">Expiration Date</label>
          </div>

          <div class="form-outline mb-4">
            <input name = "card_securitynum" type="text" id="card_securitynum" class="form-control form-control-lg"
              placeholder="Enter the security code"/>
            <label class="form-label" for="card_securitynum">Security Code</label>
          </div>

          
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="checkout" class="btn btn-primary btn-lg"
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