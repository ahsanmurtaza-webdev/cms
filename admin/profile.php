<!DOCTYPE html>
<html lang="en">

<?php include"includes/admin_header.php"; ?>
    
<?php 
    
    if(isset($_SESSION['username'])) {
        
    $query = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";
    $fetch_user_data = mysqli_query($connection, $query);
    
    if(!$fetch_user_data) {
        
        die("QUERY FAILED" . mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_assoc($fetch_user_data)) {
        
        
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
        $user_username = $row['user_username'];
        $user_role = $row['user_role'];
    }
    }
    
    if(isset($_POST['user_update']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = date('d-m-y');
    $role = $_POST['role'];
    $status = "Approved";
        
        $_SESSION['firstname'] = $first_name;
        $_SESSION['lastname'] = $last_name;
        $_SESSION['username'] = $username;
    
    $query = "UPDATE users SET user_firstname = '{$first_name}', ";
    $query .= "user_lastname = '{$last_name}', ";
    $query .= "user_username = '{$username}', ";
    $query .= "user_email = '{$email}', ";
    $query .= "user_password = '{$password}', ";
    $query .= "user_date = now(), ";
    $query .= "user_role = '{$role}' ";
    $query .= "WHERE user_id = {$_SESSION['user_id']}";
    
    $edit_user_query = mysqli_query($connection, $query);
    
    if(!$edit_user_query) {
        
        die("QUERY FAILED" . mysqli_error($connection));
    }
    
    header("Location: index.php");
}
    
    ?>

    <div id="wrapper">

       <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <h1 class="page-header">
                       Profile
                        <small>Admin</small>
                    </h1>
                    <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
       <label for="title">First Name</label>
        <input type="text" class="form-control" name="first_name" value="<?php echo $user_firstname; ?>">
    </div>
    
    <div class="form-group">
        <label for="post_category">Last Name</label>
        <input type="text" class="form-control" name="last_name" value="<?php echo $user_lastname; ?>">
    </div>
    
    <div class="form-group">
        <label for="author">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $user_username; ?>">
    </div>
    
    <div class="form-group">
       <label for="role">Role</label>
        <select class="form-control" name="role" id="">
           <?php
            
            if($user_role == "admin") { ?>
                "<option value="admin">Admin</option>";
                "<option value="subscriber">Subscriber</option>";
            <?php }
            if($user_role == "subscriber") { ?>
                echo "<option value="subscriber">Subscriber</option>";
                echo "<option value="admin">Admin</option>";
        <?php    }
            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="post_tags">Email</label>
        <input value="<?php echo $user_email; ?>" type="Email" class="form-control" name="email">
    </div>
    
    <div class="form-group">
        <label for="post_image">Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $user_password; ?>">
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Update User" name="user_update">
    </div>
</form>
                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include"includes/admin_footer.php"; ?>