<?php
include '../includes/config.php';
$users = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Users</title>
</head>
<body>
    <h1>User List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php while ($user = $users->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><a href="delete_user.php?id=<?php echo $user['id']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>