<?php include "includes1/header.php" ?>


<?php 
          
          if (isset($_SESSION['username'])) {

            $username = $_SESSION['username'];

            $query = "SELECT * FROM users1 WHERE username = '{$username}' ";
            $select_profile = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($select_profile)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];    
            }
            
          }
     ?>

<?php 

    
if (isset($_POST['edit_users'])) {
        
        
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
  //  $user_role = $_POST['user_role'];
    $username = $_POST['username'];

    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['name'];
    
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_date = date('d-m-y');
    //$post_comment_count = 4 ;
    
    // move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "UPDATE users1 SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', 
    username = '{$username}', user_email = '{$user_email}', user_password = '{$user_password}' 
    WHERE username = '{$username}' ";

     $edit_query_user = mysqli_query($connection, $query);

     confirmQuery($edit_query_user);

}


?>
<!-- user_role = '{$user_role}', -->
<div id="wrapper">

    <!-- Navigation -->

    <?php include "includes1/navigation.php" ?>

    <div id="page-wrapper">

    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
    <div class="col-lg-12">
    <h1 class="page-header">
    Welcome to Admin
     <small>Author</small>
    </h1>

    <form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="title">FirstName</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
    </div>

    
    <div class="form-group">
        <label for="post_status">LastName</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
    </div>

<!--     
    <div class="form-group">
    <label for="post_category">User Role</label><br>
        <select name="user_role" id="">
           <option value="subscriber"><?php //echo $user_role; ?></option>

           <?php 
        //    if ($user_role == 'admin') {
            
        //   echo "<option value='subscriber'>subscriber</option>";
        //    } 
        //    else {
            
        //       echo "<option value='admin'>admin</option>";
        //    }
           
        
           ?>
           
           
        </select>
    </div> -->

    

<!--     
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> -->

    
    <div class="form-group">
        <label for="post_tags">UserName</label>
        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
    </div>

    
    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
    </div>

    
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" autocomplete="off" value="<?php // echo $user_password; ?>" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_users" value="Update Profile">
    </div>

</form>
 


  
    
   </div>
  </div>
 <!-- /.row -->
 </div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "includes1/footer.php" ?>