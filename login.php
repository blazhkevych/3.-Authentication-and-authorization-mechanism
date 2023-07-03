<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <style>
        /* Add indent to the labels */
        label {
            margin-bottom: 10px;
        }

        /* Add indent to the input fields */
        input {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<h1>Login</h1>

<?php
// Define the function to check login credentials
function checkLogin($username, $password)
{
    // Read the users.txt file and check if the user exists
    $users = file('users.txt');

    foreach ($users as $user) {
        $userData = explode(':', $user);
        $existingUsername = trim($userData[0]);
        $hashedPassword = trim($userData[1]);

        if ($existingUsername === $username && password_verify($password, $hashedPassword)) {
            return true; // Login successful
        }
    }

    return false; // Login unsuccessful
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate if the required fields are filled
    if (!empty($username) && !empty($password)) {
        // Call the checkLogin function to verify the credentials
        if (checkLogin($username, $password)) {
            // Redirect to the index.php page
            header('Location: index.php');
        } else {
            echo "Access denied. Invalid username or password.";
        }
    } else {
        echo "Please fill all the required fields!";
    }
}
?>

<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <input type="submit" value="Login">
</form>
</body>
</html>
