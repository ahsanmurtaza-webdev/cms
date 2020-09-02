<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Content</th>
            <th>Email</th>
            <th>In Respone To</th>
            <th>Status</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Reject</th>
            <th>DELETE</th>
        </tr>
    </thead>

    <tbody>

         <?php

        $query = "SELECT * FROM comments ORDER BY comment_id DESC";

        $fetch_all_comments  = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($fetch_all_comments)) {
            
            

            $comment_id = $row['comment_id'];
            $comment_author = $row['comment_author'];
            $comment_post_id = $row['comment_post_id'];
            
//            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
//            $result = mysqli_query($connection, $query);
//            
//            query_error($result);
//            
//            while($val = mysqli_fetch_assoc($result)) {
//                    
//            $post_category = $val['cat_title'];
//            }
            
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];
            
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];

            echo "<tr>";
                echo "<td>{$comment_id}</td>";
                echo "<td>{$comment_author}</td>";
                echo "<td>{$comment_content}</td>";
                echo "<td>{$comment_email}</td>";
                
                $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
                
                $title_query = mysqli_query($connection, $query);
                while($result = mysqli_fetch_assoc($title_query)) {
                    
                    $commented_post_title = $result['post_title'];
                }
                
                echo "<td><a href='../post.php?p_id={$comment_post_id}'>$commented_post_title</a></td>";
            
                echo "<td>{$comment_status}</td>";
                echo "<td>{$comment_date}</td>";
                
                echo "<td><a href='./comments.php?source=approve_comment&comment_id={$comment_id}'>Approve</a></td>";
                echo "<td><a href='./comments.php?source=reject_comment&comment_id={$comment_id}'>Reject</a></td>";
    
                echo "<td><a href='./comments.php?source=delete_comment&comment_id={$comment_id}'>Delete</a></td>";
            echo "</tr>";
        }
        
        
            ?>

    </tbody>
</table>