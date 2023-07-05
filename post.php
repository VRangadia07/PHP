<?php include "includes/db1.php" ?>
<?Php include "includes/header.php" ?>
<?php require_once ("admin/function.php"); ?>

    <!-- Navigation -->

    <?php include "includes/navigation.php" ?>

<?php

if(isset($_POST['liked'])) {

    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];

     //1 =  FETCHING THE RIGHT POST

    $query = "SELECT * FROM posts1 WHERE post_id=$post_id";
    $postResult = mysqli_query($connection, $query);
    $post = mysqli_fetch_array($postResult);
    $likes = $post['likes'];

    // 2 = UPDATE - INCREMENTING WITH LIKES

    mysqli_query($connection, "UPDATE posts1 SET likes=$likes+1 WHERE post_id=$post_id");

    // 3 = CREATE LIKES FOR POST

    mysqli_query($connection, "INSERT INTO likes(user_id, post_id) VALUES($user_id, $post_id)");
    exit();


}



if(isset($_POST['unliked'])) {

    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];

    //1 =  FETCHING THE RIGHT POST

    $query = "SELECT * FROM posts1 WHERE post_id=$post_id";
    $postResult = mysqli_query($connection, $query);
    $post = mysqli_fetch_array($postResult);
    $likes = $post['likes'];

    //2 = DELETE LIKES

    mysqli_query($connection, "DELETE FROM likes WHERE post_id=$post_id AND user_id=$user_id");


    //3 = UPDATE WITH DECREMENTING WITH LIKES

    mysqli_query($connection, "UPDATE posts1 SET likes=$likes-1 WHERE post_id=$post_id");

    exit();


}



?>   
    


    <!-- Page Content -->

    <div class="container">

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
<?php 

    if (isset($_GET['p_id'])) {
        $post_id = $_GET['p_id'];

        $view_query = "UPDATE posts1 SET post_view_count = post_view_count + 1 WHERE post_id = '{$post_id}' ";
        $send_query = mysqli_query($connection, $view_query);

    if (!$send_query) {
        die("Query fail");
        }
        
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin')  {
        $query = "SELECT * FROM posts1 WHERE post_id = $post_id ";
        }
    else {
        $query = "SELECT * FROM posts1 WHERE post_id = $post_id AND post_status = 'published' ";
        }
        
          
    $select_apt = mysqli_query($connection,$query);

    if (mysqli_num_rows($select_apt) < 1) {
            
        echo "<h1 class='text-center'>Sorry No Posts.</h1>";
        }
    else {

    while ($row = mysqli_fetch_assoc($select_apt)) {
              
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];

            
    ?>
    <h1 class="page-header">
            Post
        </h1>

        <!-- First Blog Post -->
        <h2>
            <a href="#"><?Php echo $post_title ?></a>
        </h2>
        <p class="lead">
            by <a href="index.php"><?php echo $post_author ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
        <hr>
        <img class="img-responsive" src="images/<?php echo imagePlaceholder($post_image); ?>" alt="" >
        <hr>
        <p><?php echo $post_content ?></p>
        <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

        <hr>
        <?php

        // FREEING RESULT

      //  mysqli_stmt_free_result($stmt);


    ?>

    <div class="row">
    <p class="pull-right"><a class="<?php echo userLikedThisPost($post_id) ? 'unlike' : 'like'; ?>"
        href=""><span class="glyphicon glyphicon-thumbs-up"
        data-toggle="tooltip"
        data-placement="top"
        title="<?php echo userLikedThisPost($post_id) ? ' I liked this before' : 'Want to like it?'; ?>"></span>
        <?php echo userLikedThisPost($post_id) ? ' Unlike' : ' Like'; ?>
       </a></p>
    </div>

                    
    <div class="row">
    <p class="pull-right likes">Like: <?php getPostlikes($post_id); ?></p>
    </div>

    <div class="clearfix"></div>


      

         <!-- <div class="row">
        <p class="pull-right"><a href="" class="<?php //echo userLikedThisPost($post_id) ? 'unlike' : 'like'; ?>"><span class="glyphicon glyphicon-thumbs-up"></span><?php //echo userLikedThisPost($post_id) ? ' Unlike ' : ' Like '; ?></a></p>
        </div>
        <div class="row">
        <p class="pull-right">Like: 10</p>
        </div>
        <div class="clearfix"></div>  
     -->
        
        <?php }
     
     ?>

        <!-- Blog Comments -->

        
    <?php 
          if (isset($_POST['create_comment'])) {

            $post_id = $_GET['p_id'];
           $comment_author = $_POST['comment_author'];
           $comment_email = $_POST['comment_email'];
           $comment_content = $_POST['comment_content'];

           if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
    
            $query = "INSERT INTO comments1 (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
            $query .= "VALUES ($post_id, '$comment_author', '$comment_email', '$comment_content', 'unapproved', now())";
 
            $create_comment_query = mysqli_query($connection,$query);
            if (!$create_comment_query) {
               die("Fail to Query" . mysqli_error($connection));
               }
 
        //  $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
        //  $query .= "WHERE post_id = $post_id ";
        //  $update_count_comment = mysqli_query($connection,$query);
 
           
           else {
            echo "<script>alert('Filed cannot be Empty')</script>";
           }
        }
     }
        
        
           
    
    ?>

<!-- Comments Form -->
    <div class="well">
    <h4>Leave a Comment:</h4>
    <form action="" method="post" role="form">

    <div class="form-group">
    <label for="author">Author</label>
    <input type="text" name="comment_author" class="form-control">
    </div>

    <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="comment_email" class="form-control">
    </div>

    <div class="form-group">
    <label for="comment">Your Comment</label>
    <textarea class="form-control" name="comment_content" rows="3"></textarea>
    </div>

    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
    </form>
    </div>
    <hr>
    
<!-- Posted Comments -->

      
<?php 

    $query = "SELECT * FROM comments1 WHERE comment_post_id = {$post_id} ";
   $query .= "AND comment_status = 'approved' ";
   $query .= "ORDER BY comment_id DESC ";

   $select_comment_q = mysqli_query($connection,$query);
   if (!$select_comment_q) {
     die("fail to query" . mysqli_error($connection));
   }

   while ($row = mysqli_fetch_assoc($select_comment_q)) {
       $comment_date = $row['comment_date'];
       $comment_content = $row['comment_content'];
      $comment_author = $row['comment_author'];

      ?>

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $comment_author; ?>
        <small><?php echo $comment_date; ?></small>
        </h4>
        <?php echo $comment_content; ?>
    </div>
    </div>
       
       
<?php } }} else {
        header("Location: index.php");
     }

?>

 </div>

   
            <!-- Blog Sidebar Widgets Column -->

            <?php include "includes/sidebar.php" ?>
            
        </div>
        <!-- /.row -->

        

        <hr>

        <!-- Footer -->
       <?php include "includes/footer.php" ?>

<script>
    $(document).ready(function(){

    $("[data-toggle='tooltip']").tooltip();
    var post_id = <?php echo $post_id; ?>;
    var user_id = <?php echo $user_id; ?> ;

    // LIKING

    $('.like').click(function(){
    $.ajax({
        url: "/cms/post.php?p_id=<?php echo $post_id; ?>",
        type: 'post',
        data: {
        'liked': 1,
        'post_id': post_id,
        'user_id': user_id
        }
    });
});

    // UNLIKING

    $('.unlike').click(function(){
    $.ajax({
        url: "/cms/post.php?p_id=<?php echo $post_id; ?>",
        type: 'post',
        data: {
        'unliked': 1,
        'post_id': post_id,
        'user_id': user_id
        }
    });

    });

});

</script>
      