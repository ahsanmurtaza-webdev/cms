<?php

include"DB.php";
session_start();

if(isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    
    $query = "SELECT * FROM users WHERE user_username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_assoc($select_user_query)) {
        
        $db_username = $row['user_username'];
        $db_password = $row['user_password'];
        $db_firstname = $row['user_firstname'];
        $db_lastname = $row ['user_lastname'];
        $db_role = $row['user_role'];
        $db_user_id = $row['user_id'];
    }
    
    if($username === $db_username && $password === $db_password) {
        
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_firstname;
        $_SESSION['lastname'] = $db_lastname;
        $_SESSION['user_role'] = $db_role;
        $_SESSION['user_id'] = $db_user_id;
        
        header("Location: ../Admin");
    }
    
    else {
        
        header("Location: ../index.php");
    }
}

?>