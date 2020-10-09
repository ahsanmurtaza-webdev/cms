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
                           Categories
                            <small>Admin</small>
                        </h1>
                        
                        <div class="col-xs-6">
                           
                           <?php insert_category(); ?>
                            
                            
                            <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat_title">Add Categories</label>
                                    <input type="text" class="form-control" name="categories_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                            <?php
                            
                            if(isset($_GET['edit'])) {
                                
                                include "includes/update_categories.php";
                            }
                             ?>
                        </div>
                        
                        <div class="col-xs-6">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <!-- FETCHING ALL CATEGORIES -->
                                    <?php fetch_all_categories(); ?>
                                    
                                    <!-- DELETE CATEGORY FUNCTION -->
                                    <?php delete_category(); ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                        </div>
                        
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include"includes/admin_footer.php"; ?>