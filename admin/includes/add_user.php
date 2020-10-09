<?php 

if(isset($_POST['user_create']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    $image = $_FILES['image']['name'];
    $temp_image = $_FILES['image']['tmp_name'];
    move_uploaded_file($temp_image, "../images/$image");
    
    
    $query = "INSERT INTO users(user_firstname, user_lastname, user_username, user_email, user_password,  user_role, user_status, user_image) ";
    $query .= "VALUES('{$first_name}','{$last_name}', '{$username}', '{$email}', '{$password}', now(), '{$role}', '{$image}')";
    
    $add_user_query = mysqli_query($connection, $query);
    
    if(!$add_user_query) {
        
        die("QUERY FAILED" . mysqli_error($connection));
    }
    else {
        
        echo "User Created: " . " " . "<a href='users.php'>View Users</a>";
    }
}

?>
   

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
       <label for="title">First Name</label>
        <input type="text" class="form-control" name="first_name">
    </div>
    
    <div class="form-group">
        <label for="post_category">Last Name</label>
        <input type="text" class="form-control" name="last_name">
    </div>
    
    <div class="form-group">
        <label for="author">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
       <label for="role">Role</label>
        <select class="form-control" name="role" id="">
            <option value="subscriber">Select Option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="Email" class="form-control" name="email">
    </div>
    
    <div class="form-group">
        <label for="post_image">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    
    <div class="form-group">
        <label for="post_content">Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Create User" name="user_create">
    </div>
</form>