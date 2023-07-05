<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/CMS/admin/index.php">CMS Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <!-- <li><a href="">Users Online: <?php  //echo users_online(); ?></a></li> -->
        <li><a href="">Users Online : <span class="usersonline"></span></a></li>
        <li><a href="../index.php">Home site</a></li>
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
            
        <?php 
            if (isset($_SESSION['username'])) {
                echo $_SESSION['username'];
           }
        ?>
            
            
            
            
             <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <!-- <li>
                <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
            </li>
            <li>
                <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
            </li>
            <li>
                <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
            </li> -->

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-desktop"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts_dropdown" class="collapse">
                    <li>
                        <a href="./posts.php"><i class="fa fa-book fa-fw"></i> View All Posts</a>
                    </li>
                    <li>
                        <a href="posts.php?source=add_post"><i class="fa fa-fw fa-solid fa-plus"></i>Add Posts</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i>Categories</a>
            </li>
            
            <li class="">
                <a href="./comments.php"><i class="fa fa-fw fa-comments"></i>Comments</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-user fa-x"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="users.php"><i class="fa fa-book fa-fw"></i>View All Users</a>
                    </li>
                    <li>
                        <a href="users.php?source=add_users"><i class="fa fa-fw fa-solid fa-plus"></i>Add Users</a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a href="profile.php"><i class="fa fa-fw fa-gear"></i>Profile</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>