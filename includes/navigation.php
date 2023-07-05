<?php // include "db1.php"; ?>
<?php // require_once ('admin/function.php'); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Start Course</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

<?php 
            
    $query = "SELECT * FROM categories1 ";
    $select_act = mysqli_query($connection, $query);
          
    while ($row = mysqli_fetch_assoc($select_act)) {
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];
    
                     
    $category_class = '';
    $registration_class = '';

    $pageName = basename($_SERVER['PHP_SELF']);
    $registration = 'registration.php';

    if (isset($_GET['category']) && $_GET['category'] == $cat_id) {
        $category_class = 'active';
    }
    elseif ($pageName == $registration) {
        $registration_class = 'active';
    }
                     
    echo "<li class='$category_class'><a href='/cms/category.php?category={$cat_id}'>{$cat_title}</a></li>";

    }

                 
?>
<!-- <a href='/CMS/category/$cat_id'>{$cat_title}</a>
<a href='/cms/category.php?category={$cat_id}'>{$cat_title}</a>
RewriteRule ^category/(\d+)$ category.php?category=$1 [NC,L] -->

    <li>
    <a href="/CMS/admin">Admin</a>
    </li>

    <li class="<?php echo $registration_class; ?>">
    <a href="/CMS/registration">Registration</a>
    </li>  
    <li>
    <a href="/CMS/contact">Contact Us</a>
    </li>
<?php 
    if (isset($_SESSION['user_role'])) {
                
    if (isset($_GET['p_id'])) {
                    
    $the_post_id = $_GET['p_id'];

    echo "<li> <a href='/CMS/admin/posts.php?source=edit_post1&p_id={$the_post_id}'>Edit Post</a></li>" ;
    }
}  
         
?>
</ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
<!-- /.container -->
    </nav>
