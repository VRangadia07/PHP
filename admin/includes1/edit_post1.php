<form action="" method="post" enctype="multipart/form-data">
 <div class="form-group">
        <label for="cat-title">Edit Posts</label>

       

   <?php

       if (isset($_GET['p_id'])) {
          $post_id = $_GET['p_id'];

        $query = "SELECT * FROM posts1 WHERE post_id = $post_id ";
        $edit_post = mysqli_query($connection, $query);
   
      while ($row = mysqli_fetch_assoc($edit_post)) {
                                       
       $post_id = $row['post_id'];
       $post_author = $row['post_author'];
       $post_title = $row['post_title'];
       $post_category_id = $row['post_category_id'];
       $post_status = $row['post_status'];
       $post_image = $row['post_image'];
       $post_tags = $row['post_tags'];
       $post_content = $row['post_content'];
       $post_comment_count = $row['post_comment_count'];
       $post_date = $row['post_date'];
?>
<div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php if(isset($post_title)) {echo $post_title ;} ?>" class="form-control" name="post_title">
    </div>

    
    <div class="form-group">
        <label for="post_category">Post Category Id</label><br>
        <select name="post_category" id="">

        <?php 
          
        $query = "SELECT * FROM categories1 ";
        $select_category = mysqli_query($connection, $query);
        
        confirmQuery($select_category);
   
       while ($row = mysqli_fetch_assoc($select_category)) {
                                       
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        if ($cat_id == $post_category_id) {
            echo "<option selected value='$cat_id'>$cat_title</option>" ;
        }
        else {
            echo "<option value='$cat_id'>$cat_title</option>" ;
        }
        
       }
        ?>
        </select>
    </div>

    
    <div class="form-group">
        <label for="users">Post Author</label><br>
        <select name="post_user" id="">

<?php //echo "<option value='{$post_name}'>{$post_name}</option>" ; 
if ($post_user == $post_id) {
    echo "<option selected value='$post_user'>$post_user</option>" ;
}
else {
    echo "<option value='$post_user'>$post_user</option>" ;
}

?>

<?php 
  
$query = "SELECT * FROM users1 ";
$select_user = mysqli_query($connection, $query);

confirmQuery($select_user);

while ($row = mysqli_fetch_assoc($select_user)) {
                               
$user_id = $row['user_id'];
$username = $row['username'];

echo "<option value='{$username}'>{$username}</option>" ;

}
?>
</select>
    </div>
    <!-- <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" value="<?php //if(isset($post_user)) {echo $post_author ;} ?>" class="form-control" name="post_author">
    </div> -->

    
    <div class="form-group">
    <label for="post_status">Post Status</label><br>
    <select name="post_status" id="">
           <option value= '<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
           
           <?php 
                if ($post_status == 'published') {
                    
                    echo "<option value='draft'>Draft</option>" ;
                } else {
                    echo "<option value='published'>Publish</option>" ;
                }
                
           
           
           ?>
        </select> 
    </div>

    
    <div class="form-group">
        <label for="post_image">Post Image</label><br>
        <img width="100" src="../images/<?php echo $post_image; ?>" alt=""><br>
        <input type="file" name="image">
    </div>

    
    <div class="form-group">
        <label for="post_tags">Post Tages</label>
        <input type="text" value="<?php if(isset($post_tags)) {echo $post_tags ;} ?>" class="form-control" name="post_tags">
    </div>

    
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="summernote" cols="30" rows="10">
        <?php echo str_replace('\r\n', '</br>', $post_content); ?>
        <?php if(isset($post_content)) {echo $post_content ;} ?>
        </textarea>
    </div>



<!-- <input value="" type="text" class="form-control" name="cat_title"> -->

<?php }  

echo "<p class='bg-success'>Post Update :  <a href='../post.php?p_id={$post_id}'>View Posts</a> or <a href='posts.php'>Edit More Posts</a>
               </p>";

} ?>

<?php 
if (isset($_POST['update_post'])) {
    
    $post_title = $_POST['post_title'];
    $post_user = $_POST['post_user'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['name'];
    
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4 ;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * FROM posts1 WHERE post_id = $post_id ";
        $select_image = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_image)) {
          $post_image = $row['post_image'];
        }
    }

    

    $query = "UPDATE posts1 SET post_title = '{$post_title}', post_category_id = '{$post_category_id}', post_date = now(), post_author = '{$post_user}',
    post_status = '{$post_status}', post_tags = '{$post_tags}', post_content = '{$post_content}', post_image = '{$post_image}' 
    WHERE post_id = $post_id ";

    $update_post_id = mysqli_query($connection, $query);
    header("Location: posts.php");

     if(!$update_post_id){
    die("fail query" . mysqli_error($connection));
     }

    
    }

    


?>


    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>

</form>

 
     