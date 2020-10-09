<!DOCTYPE html>
<html lang="en">

<?php include"includes/admin_header.php"; ?>


    <div id="wrapper">

       <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                            <small><?php echo $_SESSION['username'] ?></small>
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
                                        <?php
    
                                            $query = "SELECT * FROM posts";
                                            $show_all_posts = mysqli_query($connection, $query);
                                            $post_count = mysqli_num_rows($show_all_posts);

                                        ?>
                                      <div class='huge'><?php echo $post_count ?></div>
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
                                        <?php
    
                                            $query = "SELECT * FROM comments";
                                            $show_all_comments = mysqli_query($connection, $query);
                                            $comment_count = mysqli_num_rows($show_all_comments);

                                        ?>
                                         <div class='huge'><?php echo $comment_count ?></div>
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
                                        <?php
    
                                            $query = "SELECT * FROM users";
                                            $show_all_users = mysqli_query($connection, $query);
                                            $user_count = mysqli_num_rows($show_all_users);

                                        ?>
                                        <div class='huge'><?php echo $user_count ?></div>
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
                                           <?php
    
                                            $query = "SELECT * FROM categories";
                                            $show_all_categories = mysqli_query($connection, $query);
                                            $categories_count = mysqli_num_rows($show_all_categories);

                                        ?>
                                            <div class='huge'><?php echo $categories_count ?></div>
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
                
                    $query = "SELECT * FROM posts WHERE post_status = 'Approved'";
                    $show_approved_posts = mysqli_query($connection, $query);
                    $active_post_count = mysqli_num_rows($show_approved_posts);

                    $query = "SELECT * FROM posts WHERE post_status = 'Pending' OR post_status = 'Rejected'";
                    $show_pending_posts = mysqli_query($connection, $query);
                    $pending_post_count = mysqli_num_rows($show_pending_posts);

                    $query = "SELECT * FROM comments WHERE comment_status = 'Approved'";
                    $show_approved_comments = mysqli_query($connection, $query);
                    $approved_comment_count = mysqli_num_rows($show_approved_comments);

                    $query = "SELECT * FROM comments WHERE comment_status = 'Rejected' OR comment_status = 'Pending'";
                    $show_pending_comments = mysqli_query($connection, $query);
                    $pending_comment_count = mysqli_num_rows($show_pending_comments);

                    $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                    $show_subscribers = mysqli_query($connection, $query);
                    $subscriber_count = mysqli_num_rows($show_subscribers);
                
                ?>
                
                <div>
                    <script type="text/javascript">
                  google.charts.load('current', {'packages':['bar']});
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Data', 'Count'],
                        <?php 
                        $element_name = ['Posts', 'Active Posts', 'Pending Posts', 'Comments', 'Active Comment', 'Pending Comments', 'Users', 'Subscribers', 'Categories'];
                        $element_count = [$post_count, $active_post_count, $pending_post_count, $comment_count, $approved_comment_count, $pending_comment_count, $user_count, $subscriber_count, $categories_count];
                                                
                            for ($loop = 0; $loop < 9; $loop++) {
                                
                                echo "['{$element_name[$loop]}'" . "," . "{$element_count[$loop]}],";
                            }
                        ?>
                    
                        
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

   <?php include"includes/admin_footer.php"; ?>