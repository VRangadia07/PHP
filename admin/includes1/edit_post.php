<?php 

   if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
   }

    $query = "SELECT * FROM posts1 ";
    $select_post_id = mysqli_query($connection, $query);
     
     while ($row = mysqli_fetch_assoc($select_post_id)) {
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
}

   if (isset($_POST['update_post'])) {
    
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
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
         $query = "SELECT * FROM posts1 WHERE post_id = $the_post_id ";
         $select_image = mysqli_query($connection, $query);

         while ($row = mysqli_fetch_assoc($select_image)) {
             $post_image = $row['post_image'];
         }
    }

    $query = "UPDATE posts1 SET post_title = '{$post_title}',post_category_id = '{$post_category_id}',post_date = now(),post_author = '{$post_author}',
       post_status = '{$post_status}',post_tags = '{$post_tags}',post_content = '{$post_content}',post_image = '{$post_image}' 
       WHERE post_id = $the_post_id ";

    $update_post = mysqli_query($connection, $query);
    confirmQuery($update_post);

   }



?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title">
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
        <label for="title">Post Author</label>
        <input type="text" value="<?php echo $post_author; ?>" class="form-control" name="post_author">
    </div>

    
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" value="<?php echo $post_status; ?>" class="form-control" name="post_status">
    </div>

    
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
        <input type="file" name="image">
    </div>

    
    <div class="form-group">
        <label for="post_tags">Post Tages</label>
        <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags">
    </div>

    
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10">
        <?php echo $post_content; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>

</form>