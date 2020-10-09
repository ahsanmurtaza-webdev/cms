<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Approve</th>
            <th>Reject</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>

    <tbody>

         <?php

        $query = "SELECT * FROM users ORDER BY user_id DESC";

        $fetch_all_users  = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($fetch_all_users)) {
            
            

            $user_id = $row['user_id'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_username = $row['user_username'];
            $user_role = $row['user_role'];

            echo "<tr>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$user_firstname}</td>";
                echo "<td>{$user_lastname}</td>";
                echo "<td>{$user_username}</td>";
                echo "<td>{$user_email}</td>";
                echo "<td>{$user_role}</td>";
                echo "<td><a href='users.php?source=approve_user&id={$user_id}'>Approve</a></td>";
                echo "<td><a href='users.php?source=reject_user&id={$user_id}'>Reject</a></td>";
                echo "<td><a href='./users.php?source=delete_user&id={$user_id}'>Delete</a></td>";
                echo "<td><a href='./users.php?source=edit_user&id={$user_id}'>Edit</a></td>";
                
            echo "</tr>";
        }
            

            ?>

    </tbody>
</table>