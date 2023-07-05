<?php 

  if(isset($_GET['edit_users']))
  {
     $the_user_id = $_GET['edit_users'];

     
    $query = "SELECT * FROM users1 WHERE user_id = $the_user_id ";
    $select_users_q = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_users_q)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    }
    ?>
<?php 
  

    if (isset($_POST['edit_users'])) {
        
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];

        // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['name'];
        
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        // $post_date = date('d-m-y');
        //$post_comment_count = 4 ;
        
        // move_uploaded_file($post_image_temp, "../images/$post_image");

        
        // $query = "SELECT randSalt FROM users";
        // $select_randsalt = mysqli_query($connection, $query);

        // if (!$select_randsalt) {
        //     die("Query Fail" . mysqli_error($connection));
        // }

        //  $row = mysqli_fetch_array($select_randsalt);
        //  $salt = $row['randSalt'];
        //  $hashed_password = crypt($user_password, $salt);

    if (!empty($user_password)) {
        $query_password = "SELECT user_password FROM users1 WHERE user_id = $the_user_id";
        $get_user = mysqli_query($connection, $query);
        confirmQuery($get_user);

        $row = mysqli_fetch_array($get_user);
        $db_user_password = $row['user_password'];

        if(!$db_user_password != $user_password){
           $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
        }
    
        $query = "UPDATE users1 SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_role = '{$user_role}',
            username = '{$username}', user_email = '{$user_email}',  user_password = '{$hashed_password}'  
            WHERE user_id = $the_user_id ";
    
        $edit_query_user = mysqli_query($connection, $query);
    
        confirmQuery($edit_query_user);
    
        echo "User Created: " . " " . "<a href='users.php'>View Users</a> ";
    
        }
        
    
  }
} else {
    header("Location: index.php");
}
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="title">FirstName</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
    </div>

    
    <div class="form-group">
        <label for="post_status">LastName</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
    </div>

    
    <div class="form-group">
    <label for="post_category">User Role</label><br>
        <select name="user_role" id="">
           <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>

    <?php 
        if ($user_role == 'admin') {
            
        echo "<option value='subscriber'>subscriber</option>";
        } 
        else {
            echo "<option value='admin'>admin</option>";
        }
    ?>
           
           
        </select>
    </div>

    
 
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
        <input type="password" autocomplete="off" value="<?php //echo $user_password; ?>" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_users" value="Update User">
    </div>

</form>
 



<!-- 
<div class="form-group">
     <label for="post_category">Post Category Id</label><br> 
        <select name="user_role" id="">
-->

       
       <?php            
    //     $query = "SELECT * FROM users ";
    //     $select_users = mysqli_query($connection, $query);
        
    //     confirmQuery($select_users);
   
    //    while ($row = mysqli_fetch_assoc($select_users)) {
                                       
    //     $user_id = $row['user_id'];
    //     $user_role = $row['user_role'];

    //     echo "<option value='$user_id'>$user_role</option>" ;
        
    //    }
        ?>
        <!-- </select>
    </div> -->