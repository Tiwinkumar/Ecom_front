<div class="form-group col-md-4">
    <label for="image">Fest Banner *</label>
    <input type="File" class="form-control" id="image" name="image" placeholder="Upload Poster" ><small id="fileHelpBlock" class="form-text text-muted">
  Image should be less than 1MB.(allowed formats JPG & PNG)
</small>
  </div>

<?php
  $image = $_FILES['image']['name'];
    $target = "eventimage/".basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    ?>