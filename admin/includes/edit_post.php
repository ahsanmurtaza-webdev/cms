<?php 

if(isset($_GET['p_id'])) {

    $p_id = $_GET['p_id'];
}

    $query = "SELECT * FROM posts WHERE post_id = {$p_id}";

    $fetch_post_by_id  = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($fetch_post_by_id)) {

        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_imagee = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comments = $row['post_comment_count'];
        $post_date = $row['post_date'];
    }

if(isset($_POST['post_update'])) {
    
    $post_title = $_POST['post_title'];
    $post_category = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = "Pending";
    $post_tags = $_POST['post_tags'];
    $post_description = $_POST['post_content'];
    $post_date = date('d-m-y');
    
    $post_image = $_FILES['post_image']['name'];
    $temp_post_image = $_FILES['post_image']['tmp_name'];
    
    if(empty($post_image)) {
        
        $post_image = $post_imagee;
    }
    
    move_uploaded_file($temp_post_image, "../images/$post_image");
    
    $query = "UPDATE posts SET post_category_id = {$post_category}, post_title = '{$post_title}', post_author = '{$post_author}', post_date = now(), post_image = '{$post_image}', post_content = '{$post_description}', post_tags = '$post_tags', post_status = '{$post_status}' WHERE post_id = {$post_id}";
    
    $post_query = mysqli_query($connection, $query);
    
    query_error($post_query);
    
    echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$p_id}'>View Post</a> or <a href='./posts.php'>Edit More Posts</a>";
}

?>
  
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
       <label for="title">Title</label>
        <input value="<?php echo $post_title ?>" type="text" class="form-control" name="post_title">
    </div>
    
    <div class="form-group">
        <label for="post_category">Category</label>
        <select class="form-control" name="post_category" id="post_category">
            
<?php 

    $query = "SELECT * FROM categories WHERE cat_id = {$post_category}";
    $fetchCategories = mysqli_query($connection, $query);
               
    query_error($fetchCategories);

    while($row = mysqli_fetch_assoc($fetchCategories)) {
        
            $categoryID = $row['cat_id'];
            $categoryTitle = $row['cat_title'];
            
            echo "<option value='$categoryID'>$categoryTitle</option>";
        
    }
               
               $query = "SELECT * FROM categories WHERE NOT cat_id = {$post_category}";
               $fetchCategories = mysqli_query($connection, $query);
               
               query_error($fetchCategories);
               
               while($row = mysqli_fetch_assoc($fetchCategories)) {
                   
                   $categoryID = $row['cat_id'];
                   $categoryTitle = $row['cat_title'];
                   
                   echo "<option value='$categoryID'>$categoryTitle</option>";
               }
            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="author">Author</label>
        <input value="<?php echo $post_author ?>" type="text" class="form-control" name="post_author">
    </div>
    
    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
        <input type="file" class="form-control" name="post_image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Tags</label>
        <input value="<?php echo $post_tags ?>" type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="form-group">
        <label for="post_content">Description</label>
        <textarea class="form-control" name="post_content" id="body" cols="30" rows="10"><?php echo $post_content ?></textarea>
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Update Post" name="post_update">
    </div>
</form>