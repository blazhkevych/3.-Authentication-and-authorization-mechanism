<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add User</title>
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
<h1>Add User</h1>

<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validate if the required fields are filled
    if (!empty($username) && !empty($password) && !empty($email)) {
        // Check if the username already exists in the users.txt file
        $users = file('users.txt');
        $userExists = false;

        foreach ($users as $user) {
            $userData = explode(':', $user);
            $existingUsername = trim($userData[0]);

            if ($existingUsername === $username) {
                $userExists = true;
                break;
            }
        }

        if ($userExists) {
            echo "User already exists!";
        } else {
            // Hash the password using password_hash() function
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Append the new user's data (with hashed password) to the users.txt file
            $userRecord = $username . ': ' . $hashedPassword . ': ' . $email . "\n";
            file_put_contents('users.txt', $userRecord, FILE_APPEND);
            echo "User added successfully!";
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

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <input type="submit" value="Add User">

    <br>
    <a href="index.php">Back to Home</a>
</form>
</body>
</html>
