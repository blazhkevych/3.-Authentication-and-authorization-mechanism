<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Management System</title>
</head>
<body>
<h1>User Management System</h1>
<ul>
    <li><a href="addUser.php">Add User</a></li>
    <li><a href="showUsers.php">Show Users</a></li>
</ul>

<?php
// Read the users.txt file and count the number of users
$users = file('users.txt');
$userCount = count($users);
echo "Total Users: " . $userCount;
?>
</body>
</html>
