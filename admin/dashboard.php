<?php include "includes1/header.php" ?>    
    
    
    
    <div id="wrapper">

    


    <!-- Navigation -->

    <?php include "includes1/navigation.php" ?>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        Welcome to Dashboard Admin <small><?php echo $_SESSION['username'] ?></small> 
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
            
                      
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <div class='huge'><?php echo $post_counts = recordCount('posts1'); ?></div>
                  
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                <div class='huge'><?php echo $comments_counts = recordCount('comments1'); ?></div>

                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

        <div class='huge'><?php echo $users_counts = recordCount('users1'); ?></div> 

                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
        
             <div class='huge'><?php echo $categories_counts = recordCount('categories1'); ?></div>

                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

<?php 

$published_post_counts = checkStatus('posts1', 'post_status', 'published');
    
$draft_post_counts = checkStatus('posts1', 'post_status', 'draft');

$unapproved_counts = checkStatus('comments1', 'comment_status', 'unapproved');

$subscriber_counts = checkUserRole('users1', 'user_role', 'subscriber');


?>     


    <div class="row">
    <script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

    <?php 
        
        $element_array = ["All Posts", "Active Posts", "Draft Posts", "Comments", "Pending Comments", "Users",  "Subscribers", "Categories"];
        $element_count = [$post_counts, $published_post_counts , $draft_post_counts , $comments_counts, $unapproved_counts ,  $users_counts, $subscriber_counts, $categories_counts];

        for ($i=0; $i < 8; $i++) { 
            
            echo "['{$element_array[$i]}'" . "," . "{$element_count[$i]}],";
        }
        
    ?>


    //   ['Posts', 15],
        ]);

        var options = {
          chart: {
          title: '',
          subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    </script>

 <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
        </div>
        

        </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include "includes1/footer.php" ?>
