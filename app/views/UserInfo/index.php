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
          <h1>Please confirm your password and 2FA code</h1>
          <br>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name="password" type="password" id="password" class="form-control form-control-lg" placeholder="Enter password" />
            <label class="form-label" for="password">Password</label>
          </div>

          <div class="form-outline mb-4">
            <input name="code" type="text" id="code" class="form-control form-control-lg" placeholder="Enter a valid code" />
            <label class="form-label" for="code">Code</label>
          </div>


          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="confirm" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Confirm</button>
          </div>
          <?php

          if ($data != []) {
            echo '<div class="alert alert-danger" role="alert">' .$data['msg'] . '</div>';
          }

          ?>
        </form>
      </div>
    </div>
  </div>

</section>



<?php require APPROOT . '/views/includes/footer.php'; ?>