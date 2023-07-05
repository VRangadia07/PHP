<?php 
    include ("delete_modal.php");

    if (isset($_POST['checkBoxArray'])) {
        
    foreach($_POST['checkBoxArray'] as $checkBoxValue){

    $bulk_options = $_POST['bulk_options'];

    switch ($bulk_options) {
    case 'published':
        $query = "UPDATE posts1 SET post_status = '{$bulk_options}' WHERE post_id = '{$checkBoxValue}' ";
        $published_status = mysqli_query($connection, $query);
    break;

    case 'draft':
        $query = "UPDATE posts1 SET post_status = '{$bulk_options}' WHERE post_id = '{$checkBoxValue}' ";
        $draft_status = mysqli_query($connection, $query);
    break;
                        
    case 'delete':
        $query = "DELETE FROM posts1 WHERE post_id = '{$checkBoxValue}' ";
        $delete_status = mysqli_query($connection, $query);
    break;

    case 'clone':
        $query = "SELECT * FROM posts1 WHERE post_id = '{$checkBoxValue}' ";
        $select_post_q = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_post_q)) {
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_content = $row['post_content'];
        $post_date = $row['post_date'];
                                
    }
    $query = "INSERT INTO posts1(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
    $query .= "VALUES('$post_category_id', '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tags', 
            '$post_status')";
    $copy_query = mysqli_query($connection, $query);
    if (!$copy_query) {
        die("Fail Query" . mysqli_error($connection));
    }
                         
    break;
   
    }
  }
}

?>


<form action="" method="post">

<table class="table table-bordered table-hover">

   <div id="bulkOptionContaniner" class="col-xs-4">
      
       <select  class="form-control" name="bulk_options" id="">
        <option value="">Select Options</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
        <option value="clone">Clone</option>

       </select>

   </div>

   <div class="col-xs-4">

   <input type="submit" name="submit" class="btn btn-success" value="Apply">
   <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
   </div>
 <br>
 <br>
    <thead>
    <tr>
    <th><input  type="checkbox" id="selectAllBoxes"></th>
    <th>Id</th>
    <th>Author</th>
    <th>Title</th>
    <th>Category</th>
    <th>Status</th>
    <th>Image</th>
    <th>Tags</th>
    <th>Comments</th>
    <th>Date</th>
    <th>View Post</th>
    <th>Edit</th>
    <th>Delete</th>
    <th>Views</th>
            </tr>
        </thead>
        <tbody>
            <?php  findAllPosts(); ?>
                
            
        </tbody>
    </table>
    </form>
 <?php 
      if (isset($_POST['delete'])) {

        $the_post_id = $_POST['post_id'];

        $query = "DELETE FROM posts1 WHERE post_id = $the_post_id";
        $delete_q = mysqli_query($connection, $query);
        header("Location: posts.php" );
        
      }
 ?> 
 
 <?php 
      if (isset($_GET['reset'])) {

        $the_post_id = $_GET['reset'];

        $query = "UPDATE posts1 SET post_view_count = 0 WHERE post_id =" . mysqli_real_escape_string($connection, $_GET['reset'] ) . " ";
        $reset_q = mysqli_query($connection, $query);
        header("Location: posts.php" );
        
      }
 ?> 
     <?php 

if (isset($_GET['p_id'])) {
$post_id = $_GET['p_id'];

 }
                 
include "edit_post1.php"; 
?>  
<script>
    $(document).ready(function() {

    $(".delete_link").on('click', function(){
        
    var id = $(this).attr("rel");
    var delete_url = "posts.php?delete=" + id + " ";

    $(".modal_delete_link").attr("href", delete_url);
    $("#myModal").modal('show');
    
});
      
});
</script>
   