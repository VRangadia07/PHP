<?php include "db1.php"; ?>
<?php session_start(); ?>
<?php include '../admin/function.php'; ?> 

<?php 
    if (isset($_POST['login'])) {
        login_user($_POST['username'], $_POST['password']);
     }

?>