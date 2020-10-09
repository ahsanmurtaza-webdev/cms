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
                       Users
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
                            
                        case 'add_user':
                            include "includes/add_user.php";
                            break;
                            
                        case 'edit_user':
                            include "includes/edit_user.php";
                            break;
                            
                        case 'view_all_user':
                            include "includes/view_all_users.php";
                            break;
                            
                        case 'delete_user':
                            delete_user();
                            break;
                            
                        case 'approve_user':
                            approve_user();
                            break;
                            
                        case 'reject_user':
                            reject_user();
                            break;
                            
                        case 'reject_comment':
                            reject_comment();
                            break;
                            
                            
                        default:
                            include "includes/view_all_users.php";
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