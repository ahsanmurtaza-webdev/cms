<?php

function insert_category() {
    
    global $connection;

    if(isset($_POST['submit'])) {

        $cat_title = $_POST['categories_title'];

        if($cat_title == "" || empty($cat_title)) {

                echo "<h2>This field cannot be empty<h2>";
        }
        else {

                $query = "INSERT INTO categories(cat_title) ";
                $query .= " VALUE('$cat_title') ";

                $addCategory = mysqli_query($connection, $query);

                if(!$addCategory) {

                    die("Query Failed" . mysqli_error($connection));
                }
        }
    }
}

function delete_category() {
    
    global $connection;
    
    if(isset($_GET['delete'])) {
                                        
        $delete_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id} ";

        $deleteQuery = mysqli_query($connection, $query);

        header("Location: categories.php");
    }
}

function fetch_all_categories() {
    
    global $connection;
    
    $query = "SELECT * FROM categories";
    $fetchAllCategories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($fetchAllCategories)) {

        $categoryID = $row['cat_id'];
        $categoryTitle = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$categoryID}</td>";
        echo "<td>{$categoryTitle}</td>";
        echo "<td><a href='categories.php?delete={$categoryID}'>DELETE</a></td>";
        echo "<td><a href='categories.php?edit={$categoryID}'>EDIT</a></td>";
        echo "</tr>";
    }
}

function query_error($result) {
    
    global $connection;
    
    if(!$result) {
        
        die("QUERY FAILED, " . mysqli_error($connection));
    }
}

function delete_post() {
    
    global $connection;
    
    if(isset($_GET['delete_post'])) {
                                        
        $delete_post_id = $_GET['delete_post'];

        $query = "DELETE FROM posts WHERE post_id = {$delete_post_id} ";

        $deleteQuery = mysqli_query($connection, $query);

        header("Location: posts.php");
    }
    }

function delete_comment() {
    
    global $connection;
                                        
        $delete_comment_id = $_GET['comment_id'];

        $query = "DELETE FROM comments WHERE comment_id = {$delete_comment_id} ";

        $deleteQuery = mysqli_query($connection, $query);

        header("Location: comments.php");
    }

function approve_post() {
    
    global $connection;
    
    $approve_post_id = $_GET['p_id'];
    $query = "UPDATE posts SET post_status = 'Approved' WHERE post_id = {$approve_post_id}";
    $approve_query = mysqli_query($connection, $query);
    
    header("Location: posts.php");
}

function reject_post() {
    
    global $connection;
    
    $reject_post_id = $_GET['p_id'];
    $query = "UPDATE posts SET post_status = 'Rejected' WHERE post_id = {$reject_post_id}";
    $approve_query = mysqli_query($connection, $query);
    
    header("Location: posts.php");
}

function approve_comment() {
    
    global $connection;
    
    $approve_comment_id = $_GET['comment_id'];
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$approve_comment_id}";
    $approve_query = mysqli_query($connection, $query);
    
    header("Location: comments.php");
}

function reject_comment() {
    
    global $connection;
    
    $reject_comment_id = $_GET['comment_id'];
    $query = "UPDATE comments SET comment_status = 'Rejected' WHERE comment_id = {$reject_comment_id}";
    $reject_query = mysqli_query($connection, $query);
    
    header("Location: comments.php");
}


function add_post() {
    
    global $connection;

    if(isset($_POST['post_create'])) {
    
    $post_title = $_POST['title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['author'];
    $post_status = "Pending";
    
    $post_image = $_FILES['image']['name'];
    $temp_post_image = $_FILES['image']['tmp_name'];
    
    $post_tags = $_POST['tags'];
    $post_description = $_POST['content'];
    $post_date = date('d-m-y');
    $post_comment_count = 0;
    
    move_uploaded_file($temp_post_image, "../images/$post_image");
    
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES({$post_category_id}, '{$post_title}', '{$post_author}',  now() , '{$post_image}', '{$post_description}', '{$post_tags}', '{$post_comment_count}', '{$post_status}' ) ";
    
    $post_query = mysqli_query($connection, $query);
    
    query_error($post_query);
    }
}

function delete_user() {
    
    global $connection;
    
    if(isset($_GET['id'])) {
        
        $user_id = $_GET['id'];
        
        $query = "DELETE FROM users WHERE user_id = {$user_id}";
        
        $delete_user_query = mysqli_query($connection, $query);
    }
    
    header("Location: users.php");
}

function approve_user() {
    
    global $connection;
    
    if(isset($_GET['id'])) {
        
        $user_id = $_GET['id'];
        
        $query = "UPDATE users SET user_status = 'Approved' WHERE user_id = {$user_id}";
        $approve_user_query = mysqli_query($connection, $query);
    }
    
    header("Location: users.php");
}

function reject_user() {
    
    global $connection;
    
    if(isset($_GET['id'])) {
        
        $user_id = $_GET['id'];
        
        $query = "UPDATE users SET user_status = 'Rejected' WHERE user_id = {$user_id}";
        $reject_user_query = mysqli_query($connection, $query);
    }
    
    header("Location: users.php");
}

function edit_post() {
    
    global $connection;
    
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
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comments = $row['post_comment_count'];
            $post_date = $row['post_date'];
        }
}


?>