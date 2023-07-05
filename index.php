<?php include "includes/db1.php" ?>
<?Php include "includes/header.php" ?>
<?php require_once ("admin/function.php"); ?>

    <!-- Navigation -->

    <?php include "includes/navigation.php" ?>
    


    <!-- Page Content -->

    <div class="container">

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
 <?php 

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }else {
            $page = "";
        }
        if ($page == "" || $page == 1) {
            $page_1 = 0;
        } else {
            $page_1 = ($page*5) - 5;
        }
        
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin')  {
            $post_counts = "SELECT * FROM posts1 ";
        }
        else {
            $post_counts = "SELECT * FROM posts1 WHERE post_status = 'published' ";
        }
        
    $find_counts = mysqli_query($connection, $post_counts);
    $count = mysqli_num_rows($find_counts);
         
        if ($count < 1) {
            echo  "<h1 class='text-center'>Sorry No Posts.</h1>";
        }else {
         $count = ceil($count/5); 
        
    $query = "SELECT * From posts1 LIMIT $page_1, 5";
    $select_apt = mysqli_query($connection, $query);
    
    while ($row = mysqli_fetch_assoc($select_apt)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_user = $row['post_author'];   
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'],0,100);
        $post_status = $row['post_status'];
?>
   
    <!-- First Blog Post -->
    <!-- <h1><?php //echo $count; ?> </h1> -->
       
        <h2>
            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
        </h2>
        <p class="lead">
            by <a href="author_posts.php?author=<?php echo $post_user ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_user ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
        <hr>
        <a href="post.php?p_id=<?php echo $post_id; ?>">
        <img class="img-responsive" src="images/<?php echo imagePlaceholder($post_image ); ?>" alt="" >
        </a>
        
        <hr>
        <p><?php echo $post_content ?></p>
        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
        


        <?php } } ?>

        
        <!-- Second Blog Post -->
        <!-- Pager -->
    
 
    </div>

   
<!-- Blog Sidebar Widgets Column -->

    <?php include "includes/sidebar.php" ?>
            
    </div>
<!-- /.row -->

      
  <hr>


    <ul class="pager">     
           
<?php
 
  for ($i=1; $i <=$count ; $i++) { 
   
    if ($i == $page) {
        echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
    }
    else {
        echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
    }
        
    }
    
?>
 
</ul>


<!-- Footer -->
<?php include "includes/footer.php" ?>
