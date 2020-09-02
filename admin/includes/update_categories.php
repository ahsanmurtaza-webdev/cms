<form action="" method="post">
                                <div class="form-group">
                                   <label for="cat_title">Edit Categories</label>
                                   
                                   <?php
                                    
                                    if(isset($_GET['edit'])) {
                                        
                                        $cat_id = $_GET['edit'];
                                        
                                        $query = "SELECT * FROM categories WHERE cat_id = {$cat_id} ";
                                        
                                        $selectOneCategory = mysqli_query($connection, $query);
                                        
                                        while($row = mysqli_fetch_assoc($selectOneCategory)) {
                                        
                                        $categoryID = $row['cat_id'];
                                        $categoryTitle = $row['cat_title'];
                                        
                                            ?>
                                            
                                            <input value="<?php if(isset($categoryTitle)) {echo $categoryTitle;} ?>" type="text" class="form-control" name="categories_title">
                                            
                                            
                                       <?php }} ?>
                                       
                                       <?php
                                    
                                        if(isset($_POST['update'])) {
                                        
                                        $categoryTitle = $_POST['categories_title'];
                                        
                                        $query = "UPDATE categories SET cat_title = '{$categoryTitle}' WHERE cat_id = {$categoryID} ";
                                        
                                        $updateCategory = mysqli_query($connection, $query);
                                            
                                            if(!$updateCategory) {
                                                
                                                die("Query Failed." . mysqli_error($connection));
                                            }
                                        }
                                    
                                        ?>
                                    
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update" value="Update Category" >
                                </div>
                            </form>