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
                       Comments
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
                            
                        case 'delete_comment':
                            delete_comment();
                            break;
                            
                        case 'approve_comment':
                            approve_comment();
                            break;
                            
                        case 'reject_comment':
                            reject_comment();
                            break;
                            
                            
                        default:
                            include "includes/view_all_comments.php";
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