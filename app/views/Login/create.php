<?php require APPROOT . '/views/includes/header.php';  ?>


  <form class="px-4 py-3" method="post" action="">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="verify_password">Re-enter the password</label>
      <input type="password" class="form-control" id="verify_password" name="verify_password" placeholder="Re-enter the password">
    </div>
    
    <button type="submit" name="signup" class="btn btn-primary">Sign up</button>
    <p class="text-center">Already registered? <a href="/MVC/Login/">Login</a> </p>

  </form>

<?php require APPROOT . '/views/includes/footer.php'; ?>