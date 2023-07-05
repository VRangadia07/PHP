<?php 
     if (isset($_POST['create_post'])) {
        
        
        $post_user = $_POST['post_user'];
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['name'];
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        //$post_comment_count = 4 ;
        
        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO posts1(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
        $query .= "VALUES('$post_category_id', '$post_title', '$post_user', now(), '$post_image', '$post_content', '$post_tags', 
                    '$post_status')";

        $add_post = mysqli_query($connection, $query);

        confirmQuery($add_post);

         $post_id = mysqli_insert_id($connection);

        echo "<p class='bg-success'>Post Created :  <a href='../post.php?p_id={$post_id}'>View Posts</a> or <a href='posts.php'>Edit More Posts</a>
            </p>";


     }





?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
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

        echo "<option value='$cat_id'>$cat_title</option>" ;
        
       }
        ?>
        </select>
    </div>

    
    <div class="form-group">
        <label for="users">Post Author</label><br>
        <select name="post_user" id="">

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

    
    <div class="form-group">
        <label for="post_status">Post Status</label><br>
          <select name="post_status" id="">
            <option value="draft">Select Options</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>

         </select>
        
    </div>

    
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>

    
    <div class="form-group">
        <label for="post_tags">Post Tages</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    
    <div class="form-group">
        <label for="summernote">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="summernote" cols="30" rows="10">
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>

</form>
