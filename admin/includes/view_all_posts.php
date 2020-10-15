<?php

if(isset($_POST['checkBoxArray'])) {
    
    foreach($_POST['checkBoxArray'] as $checkBoxValue) {
        
        $bulk_options = $_POST['bulk_options'];
        
        switch($bulk_options) {
                
            case 'Approved':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$checkBoxValue}";
                $update_status_query = mysqli_query($connection, $query);
                break;
                
            case 'Rejected':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$checkBoxValue}";
                $update_status_query = mysqli_query($connection, $query);
                break;
                
            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = {$checkBoxValue}";
                $delete_post_query = mysqli_query($connection, $query);
                break;
                
            default:
                echo "<h1>Select an option first</h1>";
        }
    }
}

?>
<form action="" method="post">
<table class="table table-bordered table-hover">
   <div id="bulkOptionsContainer" class="col-xs-4">
       <select class="form-control" name="bulk_options" id="">
           <option value="">Select Option</option>
           <option value="Approved">Approve</option>
           <option value="Rejected">Reject</option>
           <option value="delete">Delete</option>
       </select>
   </div>
   <div class="col-xs-4">
       <input type="submit" name="submit" class="btn btn-primary" value="Apply">
       <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
   </div>
    <thead>
        <tr>
            <th><input type="checkbox" id="checkAllBoxes"></th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Status</th>
            <th>Approve</th>
            <th>Reject</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>

         <?php

        $query = "SELECT * FROM posts ORDER BY post_id DESC";

        $fetch_all_posts  = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($fetch_all_posts)) {
            
            

            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            
            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
            $result = mysqli_query($connection, $query);
            
            query_error($result);
            
            while($val = mysqli_fetch_assoc($result)) {
                    
            $post_category = $val['cat_title'];
            }
            
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comments = $row['post_comment_count'];
            $post_date = $row['post_date'];

            echo "<tr>";
            ?>
               <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $post_id ?>"></td>
               <?php
                echo "<td>{$post_id}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_title}</td>";
                echo "<td>{$post_category}</td>";
                echo "<td><a href='../post.php?p_id={$post_id}'><img width='100' src='../images/$post_image' alt='image'></a></td>";
                echo "<td>{$post_tags}</td>";
                echo "<td>{$post_comments}</td>";
                echo "<td>{$post_date}</td>";
                echo "<td>{$post_status}</td>";
                echo "<td><a href='posts.php?source=approve_post&p_id={$post_id}'>Approve</a></td>";
                echo "<td><a href='posts.php?source=reject_post&p_id={$post_id}'>Reject</a></td>";
                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                echo "<td><a href='posts.php?delete_post={$post_id}'>Delete</a></td>";
            echo "</tr>";
        }
        
            delete_post();
            

            ?>

    </tbody>
</table>
</form>