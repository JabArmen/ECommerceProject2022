<?php require APPROOT . '/views/Admin/header.php';?>
<br>
  <div class="latest-products">
  <div class="container">
      <div class="row">
<form action='' method='post' enctype="multipart/form-data">

    <div class="form-group">
        <label for="nameinput">Name</label>
        <input name="name" type="text" class="form-control" id="nameinput" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="priceinput">Price</label>
        <input name="price" type="number" class="form-control" id="priceinput" placeholder="Price">
    </div>
    <div class="form-group">
        <label for="descriptioninput">Description</label>
        <textarea name="description" class="form-control" id="descriptioninput"  rows="4" cols="50">
            
        </textarea>
    </div>
    <div class="form-group">
        <label for="profileinput">Profile picture</label>
        <input type='file' name='picture' class='form-control' />
    </div>

    <button type="submit" name='add' class="btn btn-primary">Add</button>
</form>
</div>
</div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>