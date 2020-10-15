<!DOCTYPE html>
<html lang="en">

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
                
                if(isset($_GET['p_id'])) {
                    
                    $p_id = $_GET['p_id'];
                }
    
                $query = "SELECT * FROM posts WHERE post_id = {$p_id}";
                $selectAllPosts = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($selectAllPosts)) {
                    
                    $postId = $row['post_id'];
                    $postTitle = $row['post_title'];
                    $postAuthor = $row['post_author'];
                    $postDate = $row['post_date'];
                    $postImage = $row['post_image'];
                    $postContent = $row['post_content'];
                   
                    ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?source=<?php echo $postID ?>"><?php echo $postTitle ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $postAuthor ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $postDate ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $postImage ?>" alt="">
                <hr>
                <p><?php echo $postContent ?></p>

                <hr>
                
                <?php } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include"includes/sidebar.php" ?>

        </div>
        <!-- /.row -->


                <!-- Blog Comments -->

                <!-- Comments Form -->
                
        <?php
    
    
    if(isset($_POST['comment_submit'])) {
        
        $comment_post_id = $_GET['p_id'];
        $comment_author = $_POST['author_name'];
        $comment_email = $_POST['email'];
        $comment = $_POST['comment'];
        $comment_date = date('d-m-y');
        $comment_status = "Pending";
        
        if(empty($comment_author) && empty($comment_email) && empty($comment)) {
            
            echo"<script>alert('Fields cannot be empty!')</script>";
        }
        else {
            
            $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_date, comment_content, comment_status) VALUES({$comment_post_id},'{$comment_author}', '{$comment_email}', '{$comment_date}', '{$comment}', '{$comment_status}' )";

            $post_query = mysqli_query($connection, $query);
        }

        
        
    }
        
                
        ?>
                
                
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                       <div class="form-group">
                          <label for="author">Name</label>
                           <input type="text" class="form-control" name="author_name">
                       </div>
                       <div class="form-group">
                           <label for="Email">Email</label>
                           <input type="email" class="form-control" name="email">
                       </div>
                        <div class="form-group">
                           <label for="comment">Comment</label>
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="comment_submit">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                
                
                

                <!-- Comment -->
                <?php
        
        if(isset($_GET['p_id'])) {
            
            $comment_post_id = $_GET['p_id'];
            $query = "SELECT * FROM comments WHERE comment_post_id = {$comment_post_id} ORDER BY comment_id DESC";
            
            $comments_query = mysqli_query($connection, $query);
            
            while($comments_on_post = mysqli_fetch_assoc($comments_query)) {
                $comment_status = $comments_on_post['comment_status'];
                
                if($comment_status == "Approved") {
                
                    $comment_author = $comments_on_post['comment_author'];
                    $comment_content = $comments_on_post['comment_content'];
                    $comment_date = $comments_on_post['comment_date'];
                    
                    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = {$comment_post_id}";
                    $comment_count_query = mysqli_query($connection, $query);
                    
                
                ?>
                
            
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
                
                
                
        <?php } }
        } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->

                <!-- Blog Search Well -->
                

                <!-- Blog Categories Well -->


                <!-- Side Widget Well -->
                
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include"includes/footer.php" ?>
 
