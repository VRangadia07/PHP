<?php 
     if (isset($_POST['create_user'])) {
        
        
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

        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

        $query = "INSERT INTO users1(user_firstname, user_lastname, user_role, username, user_email, user_password)";
        $query .= "VALUES('$user_firstname', '$user_lastname', '$user_role', '$username', '$user_email', '$user_password')";

        $add_user = mysqli_query($connection, $query);

        confirmQuery($add_user);
        

        //echo "User Created: " . " " . "<a href='users.php'>View Users</a> ";

     }
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="title">FirstName</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    
    <div class="form-group">
        <label for="post_status">LastName</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    
    <div class="form-group">
    <label for="post_category">User Role</label><br>
        <select name="user_role" id="">
           <option value="subscriber">Select Options</option>
           <option value="admin">Admin</option>
           <option value="subscriber">Subscriber</option>
        </select>
    </div>

    

<!--     
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> -->

    
    <div class="form-group">
        <label for="post_tags">UserName</label>
        <input type="text" class="form-control" name="username">
    </div>

    
    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>

</form>
 
