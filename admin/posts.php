<!DOCTYPE html>
<html lang="en">

<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">

       <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <h1 class="page-header">
                       Posts
                        <small>Admin</small>
                    </h1>
                    <?php
                    
                    if(isset($_GET['source'])) {
                        
                        $source = $_GET['source'];
                    }
                    else {
                        
                        $source = "";
                    }
                    
                    switch($source) {
                        case 'add_post':
                            include "includes/add_post.php";
                            break;
                            
                        case 'edit_post':
                            include "includes/edit_post.php";
                            break;
                            
                        case 'approve_post':
                            approve_post();
                            break;
                            
                        case 'reject_post':
                            reject_post();
                            break;
                            
                        default:
                            include "includes/view_all_posts.php";
                    }
                    
                    
                    ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include"includes/admin_footer.php"; ?>