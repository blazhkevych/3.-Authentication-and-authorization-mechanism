<!DOCTYPE html>
<html lang="en">
<head>
    <title>Show Users</title>
</head>
<body>
<h1>Show Users</h1>

<table>
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
    </tr>

    <?php
    // Read the users.txt file and display the user data in a table
    $users = file('users.txt');

    foreach ($users as $user) {
        $userData = explode(':', $user);
        $username = trim($userData[0]);
        $password = trim($userData[1]);
        $email = trim($userData[2]);

        echo "<tr>";
        echo "<td>$username</td>";
        echo "<td>$password</td>";
        echo "<td>$email</td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
<a href="index.php">Back to Home</a>
</body>
</html>
