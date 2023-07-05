<?php include "includes1/header.php" ?>

<?php 
      if (!is_admin($_SESSION['username'])) {
        header("Location: index.php");
      }

?>

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

    <?php 

         if (isset($_GET['source'])) {
            $source = $_GET['source'];
         }
         else {
            $source = '';
         }

         switch ($source) {
            case 'add_users':
                include "includes1/add_users.php";
                break;
            case 'edit_users':
                include "includes1/edit_users.php";
                break;

            case '3':
                echo "it is bad";
                break;    
            
            default:
                include "includes1/view_all_users.php";
                break;
         }
    
    
    ?>
  
    
   </div>
  </div>
 <!-- /.row -->
 </div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "includes1/footer.php" ?>