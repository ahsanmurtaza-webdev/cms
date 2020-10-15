<div class="col-md-4">
                
                

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text"  class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                
                <!-- Login -->
                
                
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text"  class="form-control" placeholder="Username">
                    </div>
                    
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="submit" type="submit">Login
                            </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                
                <?php
                    
                    $query = "SELECT * FROM categories";
                    $fetchAllCategories = mysqli_query($connection, $query);
    
                ?>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                               <?php
                                
                                while($row = mysqli_fetch_assoc($fetchAllCategories)) {

                                    $catTitle = $row['cat_title'];
                                    $catID = $row['cat_id'];

                                    echo "<li><a href='index.php?c_id={$catID}'>{$catTitle}</a></liv>";
                                }
                                
                                ?>
                            </ul>
                        </div>
    
                    </div>
                    <!-- /.row -->
                </div>

              <?php // include"widget.php"; ?>

            </div>