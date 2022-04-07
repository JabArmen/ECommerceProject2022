<?php require APPROOT . '/views/Admin/header.php';?>
<br>
  <div class="latest-products">
  <div class="container">
      <div class="row">
<form action='' method='post' enctype="multipart/form-data">

    <div class="form-group">
        <label for="nameinput">Name</label>
        <input name="name" type="text" class="form-control" id="nameinput" value="<?php echo $data->name?>">
    </div>
    <div class="form-group">
        <label for="priceinput">Price</label>
        <input name="price" type="number" class="form-control" id="priceinput" value="<?php echo $data->price?>">
    </div>
    <div class="form-group">
        <label for="descriptioninput">Description</label>
        <textarea name="description" class="form-control" id="descriptioninput" rows="8" cols="50">
        <?php echo $data->description?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="profileinput">Profile picture</label>
        <input type='file' name='picture' class='form-control' />
    </div>

    <button type="submit" name='update' class="btn btn-primary">Update</button>
</form>
</div>
</div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>