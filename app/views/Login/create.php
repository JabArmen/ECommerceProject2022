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
            <input name = "username" type="text" id="username" class="form-control form-control-lg"
              placeholder="Enter a valid username" />
            <label class="form-label" for="username">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name = "password" type="password" id="password" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="password">Password</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name = "verify_password" type="password" id="password" class="form-control form-control-lg"
              placeholder="Enter verify password" />
            <label class="form-label" for="verify_password">Verify Password</label>
          </div>
          

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="login" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Already registerd? <a 
                class="link-danger" href="/ECommerceProject2022/Login/">Login</a></p>
          </div>
          <?php

if($data != []){
    echo '<div class="alert alert-danger" role="alert">'.
        $data['msg'].'
    </div>';
}

?>
        </form>
      </div>
    </div>
  </div>
  
</section>

<?php require APPROOT . '/views/includes/footer.php'; ?>