<?php 
 
 //include "../includes/db1.php" ;?>
 <?php

 function imagePlaceholder($image=''){

    if(!$image){
        return 'place.hold.jpg';
    }else{
        return $image;
    }
 }

 function redirect($location){

    return("Location:" . $location);
    exit;
 }

function query($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
   return $result;
}
function fetchRecords($result){
    return mysqli_fetch_array($result);
}

function count_records($result){
    return mysqli_num_rows($result);
}


 function ifItIsMethod($method=null){

    if ($_SERVER['REQUEST_METHOD'] == strtoupper($method)) {
        return true;
    }
        return false;

 }

 function isLoggedIN(){
      
    if (isset($_SESSION['user_role'])) {
        return true;
    }
        return false;

 }

 function loggedInUserId(){
    if(isLoggedIn()){
        $result = query("SELECT * FROM users1 WHERE username='" . $_SESSION['username'] ."'");
        confirmQuery($result);
        $user = mysqli_fetch_array($result);
        return mysqli_num_rows($result) >= 1 ? $user['user_id'] : false;
    }
    return false;

}

function userLikedThisPost($post_id){
    $result = query("SELECT * FROM likes WHERE user_id=' " .loggedInUserId() . " AND post_id={$post_id}'");
    confirmQuery($result);
    return mysqli_num_rows($result) >= 1 ? true : false;
}


function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){
    if(isLoggedIn()){
        redirect($redirectLocation);
    }

}

function getPostlikes($post_id){

    $result = query("SELECT * FROM likes WHERE post_id=$post_id");
    confirmQuery($result);
    echo mysqli_num_rows($result);

}



function users_online(){

   if (isset($_GET['onlineusers'])) {
      global $connection;    
      if (!$connection) {
      session_start();
       include ("../includes/db1.php");

      } 
    $session = session_id();
    $time = time();
    $time_in_sec = 05;
    $time_out = $time - $time_in_sec;

    $query = "SELECT * FROM users_online1 WHERE session = '$session'";
    $send_query = mysqli_query($connection,$query);
    $count = mysqli_num_rows($send_query);

    if ($count == NULL) {
       mysqli_query($connection, "INSERT INTO users_online1(session, time) VALUES('$session', '$time')");
    } else {
       mysqli_query($connection, "UPDATE  users_online1 SET time = '$time' WHERE session = '$session'");
    }
    
    $users_query = mysqli_query($connection, "SELECT * FROM users_online1 WHERE time > '$time_out'");
    echo $count_user = mysqli_num_rows($users_query);
    

      
}

 }
 users_online();

 function confirmQuery($result){
         
        global $connection;
        if (!$result) {
            die("Fail query" . mysqli_error($connection));
        }
 }

function insert_categories(){

    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This Field is Required";
        } else {

            $query = "INSERT INTO categories1(cat_title)";
            $query .= "VALUES('$cat_title')";

            $category_query = mysqli_query( $connection, $query);
            if (!$category_query) {

                die('Query Failed' . mysqli_error($connection));
            }
        }
    }

}

function findAllCategories(){

    global $connection;
    $query = "SELECT * FROM categories1";
    $select_category = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_category)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo  "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo  "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";
    } 
}


function DeleteCategories(){

    global $connection;
 if (isset($_GET['delete'])) {
    $the_cat_id = $_GET['delete'];

    $query = "DELETE FROM categories1 WHERE cat_id = $the_cat_id ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: categories.php");
    }


}
?>
<?php
function findAllPosts(){
    global $connection;
    $query = "SELECT * FROM posts1 ORDER BY post_id DESC ";
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    //$post_user = $row['post_user'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_view_count = $row['post_view_count'];

    echo "<tr>";
    ?>
      <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>
    <?php
    echo "<td>$post_id</td>";
    if (isset($post_author) || !empty($post_author)) {
        echo "<td>$post_author</td>";
    }elseif (isset($post_user) || !empty($post_user)) {
        echo "<td>$post_user</td>";
    }
    
    echo "<td>$post_title</td>";

    $query = "SELECT * FROM categories1 WHERE cat_id =  $post_category_id ";
    $display_category = mysqli_query($connection, $query);
   
    while ($row = mysqli_fetch_assoc($display_category)) {
                                       
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<td>{$cat_title}</td>";
    }
    
    echo "<td>$post_status</td>";
    echo "<td> <img width='100' src =' ../images/$post_image' alt = 'image1'></td>";
    echo "<td>$post_tags</td>";

    $query = "SELECT * FROM comments1 WHERE comment_post_id = $post_id";
    $send_comment = mysqli_query($connection, $query);
   
   
    // if (!$count_comment == 0) {
        $row = mysqli_fetch_array($send_comment);
      //  $comment_id = $row['comment_id'];
        $count_comment = mysqli_num_rows($send_comment);
     //} 
    


    echo "<td><a href='post_comments.php?id=$post_id'>$count_comment</a></td>";

    echo "<td>$post_date</td>";
    echo "<td><a class='btn btn-primary' href='../post.php?p_id={$post_id}'>View Post</a></td>";
    echo "<td><a class='btn btn-info' href='posts.php?source=edit_post1&p_id={$post_id}'>Edit</a></td>";
    ?>

    <form action="post">

    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
  <?php echo '<td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>'; ?>
    </form>
    <?php 
    //echo "<td><a class='btn btn-danger' rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
    // echo "<td><a onClick=\" javascript: return confirm('Are you sure you want to delete.'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
    echo "<td><a href='posts.php?reset={$post_id}'>$post_view_count</a></td>";
    echo "</tr>";
   }
       
}

?>
<?php function escape($string) {
   global $connection;
 
   return mysqli_real_escape_string($connection, trim($string));
}

function get_all_user_posts(){

    return query("SELECT * FROM posts1 WHERE user_id=" . loggedInUserId() ."" );
}
function get_all_user_comments(){
    return query("SELECT * FROM posts1 INNER JOIN comments1 ON posts1.post_id = comments1.comment_post_id WHERE user_id=" . loggedInUserId() ."" );
}

function recordCount($table)
{
    global $connection;

    $query = "SELECT * FROM " . $table;
    $select_all_count = mysqli_query($connection, $query);

    $result = mysqli_num_rows($select_all_count);

    confirmQuery($result);
    return $result;

}

function checkStatus($table, $column, $status){

    global $connection;
    $query = "SELECT * FROM $table WHERE $column = '$status' ";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    return mysqli_num_rows($result);

}

function checkUserRole($table, $column, $role){

    global $connection;
    $query = "SELECT * FROM $table WHERE $column = '$role' ";
    $result_subscriber = mysqli_query($connection, $query);
    confirmQuery($result_subscriber);
    return mysqli_num_rows($result_subscriber);

}

function is_admin(){
    global $connection;
   if (isLoggedIN()) {
    $result = query("SELECT user_role FROM users1 WHERE user_id=".$_SESSION['user_id']."");
    $row = fetchRecords($result);
   
    if ($row['user_role'] == 'admin') {
        return true;
    }else {
        return false;
    }
   }
    
   return false;
}

function username_exists($username){
    global $connection;

    $query = "SELECT username FROM users1 WHERE username = '$username' ";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if (mysqli_num_rows($result) > 0) {
        return true;
    }else {
        return false;
    }


}

function email_exists($email){
    global $connection;

    $query = "SELECT user_email FROM users1 WHERE user_email = '$email' ";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if (mysqli_num_rows($result) > 0) { 
        return true;
    }else {
        return false;
    }


}

function register_user($username, $email, $password){
    global $connection;
            
    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

    // $query = "SELECT randSalt FROM users";
    // $select_randsalt = mysqli_query($connection, $query);

    // if (!$select_randsalt) {
    //     die("Query Fail" . mysqli_error($connection));
    // }

    //  $row = mysqli_fetch_array($select_randsalt);
    //  $salt = $row['randSalt'];
    //  $p_password = crypt($password, $salt);
        
    $query = "INSERT INTO users1 (username, user_email, user_password, user_role) ";
    $query .= "VALUES ('{$username}', '{$email}', '{$password}', 'subscriber') ";
    $register_query = mysqli_query($connection, $query);

    confirmQuery($register_query);
        
    // $msg = "Your Registration is Successfully";
    
    // else {
    //      $msg = "Filed cannot be empty";
    // }

}

function login_user($username, $password){
    
    global $connection;
    $username = trim($username); 
    $password = trim($password);

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users1 WHERE username = '{$username}' ";
    $select_query = mysqli_query($connection, $query);

    if (!$select_query) {
        die("Fail Query" . mysqli_error($connection));
    }
  
    while ($row = mysqli_fetch_array($select_query)) {
      $db_user_id = $row['user_id'];
      $db_username = $row['username'];
      $db_user_password = $row['user_password'];
      $db_user_firstname = $row['user_firstname'];
      $db_user_lastname = $row['user_lastname'];
      $db_user_role = $row['user_role'];
    }
      if ($username == $db_username && $password == $db_user_password) {
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        
        header("Location: ../admin ");
        }
     elseif ($username !== $db_username && $password !== $db_user_password) {
            
                header("Location: /cms/index.php");
            }
    else {
        header("Location: /cms/index.php");
    } 
    
   
  // $p_password = crypt($password, $db_user_password);


}

?>

