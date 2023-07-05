<form action="" method="post">
        <div class="form-group">
        <label for="cat-title">Edit Categories</label>

   <?php
       if (isset($_GET['edit'])) {
          $cat_id = $_GET['edit'];

        $query = "SELECT * FROM categories1 WHERE cat_id = $cat_id ";
        $edit_category = mysqli_query($connection, $query);
   
      while ($row = mysqli_fetch_assoc($edit_category)) {
                                       
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
     ?>
<input value="<?php if(isset($cat_title)) {echo $cat_title ;} ?>" type="text" class="form-control" name="cat_title">

<?php }  } ?>

<?php 

if (isset($_POST['update_cat'])) {
    $the_cat_title = $_POST['cat_title'];

    $query = "UPDATE categories1 SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
    $update_query = mysqli_query($connection, $query);
    header("Location: categories.php");

     if(!$update_query){
    die("fail query" . mysqli_error($connection));
     }
    }
 ?>
                            
 </div>
   <div class="form-group">
  <input class="btn btn-primary" type="submit" name="update_cat" value="Update">
 </div>
 </form>