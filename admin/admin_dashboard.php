<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <a href="manage_users.php">Manage Users</a>
    <a href="logout.php">Logout</a>
</body>
</html>