<?php

    if(isset($_POST['post_create']) && empty($_POST['title'])) {
        
        echo "<h1>Empty Post cannot be uploaded</h1>";
    }
    else {
        
        add_post();
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
       <label for="title">Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    
    <div class="form-group">
        <label for="post_category">Category</label>
        <select class="form-control" name="post_category" id="post_category">
           <option value="">Selec Category</option>
            <?php 

                $query = "SELECT * FROM categories";
                $fetchCategories = mysqli_query($connection, $query);

                query_error($fetchCategories);

                while($row = mysqli_fetch_assoc($fetchCategories)) {

                    $categoryID = $row['cat_id'];
                    $categoryTitle = $row['cat_title'];

            ?>
                <option value='<?php echo $categoryID; ?>'><?php echo $categoryTitle; ?></option>

          <?php } ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author">
    </div>
    
    <div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Tags</label>
        <input type="text" class="form-control" name="tags">
    </div>
    
    <div class="form-group ">
        <label for="post_content">Description</label>
        <textarea class="form-control" name="content" id="body" cols="30" rows="10"></textarea>
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Create Post" name="post_create">
    </div>
</form>