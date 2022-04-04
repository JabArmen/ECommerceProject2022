<?php require APPROOT . '/views/includes/header.php'; 
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/MVC/User/getUsers">Get Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/MVC/User/createUser">Create User</a>
</li>
     
    </ul>
   
  </div>
</nav>

    <h1>Update Users View</h1>
    <p>This view is invoked by UserController and the updateUser() is executed</p>
    
    <form action='' method='post' enctype="multipart/form-data">

    <div class="form-group">
        <label for="nameinput">Name</label>
        <input name="name" type="text" class="form-control" id="nameinput" value="<?php echo $data->Name?>">
    </div>
    <div class="form-group">
        <label for="cityinput">City</label>
        <input name="city" type="text" class="form-control" id="cityinput" value="<?php echo $data->City?>">
    </div>
    <div class="form-group">
        <label for="phoneinput">Phone</label>
        <input name="phone" type="number" class="form-control" id="phoneinput" value="<?php echo $data->Phone?>">
    </div>
    
    <div class="form-group">
        <label for="profileinput">Profile picture</label>
        <input type='file' name='picture' class='form-control' />
    </div>

    <button type="submit" name='update' class="btn btn-primary">Update</button>
    </form>

   
<?php require APPROOT . '/views/includes/footer.php'; ?>