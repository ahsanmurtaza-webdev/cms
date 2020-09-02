<?php include"includes/header.php" ?>

    <!-- Navigation -->
    <?php include"includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               
               <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                
                <?php
    
                if(isset($_GET['c_id'])) {
                    
                    $post_category_id = $_GET['c_id'];
                    
                    $query = "SELECT * FROM posts WHERE post_category_id = {$post_category_id} ";
                }
                
                else {
                    
                    $query = "SELECT * FROM posts ";
                }
                    
                    $query .="ORDER BY post_id DESC";
                    $selectAllPosts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($selectAllPosts)) {
                    
                    $post_status = $row['post_status'];
                    
                    if($post_status == "Approved") {
                    
                    $postID = $row['post_id'];
                    $postTitle = $row['post_title'];
                    $postAuthor = $row['post_author'];
                    $postDate = $row['post_date'];
                    $postImage = $row['post_image'];
                    $postContent = substr($row['post_content'], 0, 100);
                   
                    ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $postID ?>"><?php echo $postTitle ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $postAuthor ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $postDate ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $postID ?>"><img class="img-responsive" src="images/<?php echo $postImage ?>" alt=""></a>
                <hr>
                <p><?php echo $postContent ?></p>

                <hr>
                
                <?php } } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include"includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include"includes/footer.php" ?>