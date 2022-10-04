<?php

if (isset($_POST['submitBtn'])) {
    $errors = false;

    if (empty($_POST['username'])) {
        echo 'User name is mandatory.<br>';
        $errors = true;
    }

    if (empty($_POST['email'])) {
        echo 'email  is mandatory.<br>';
        $errors = true;
    }

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors = true;
    } else {
        echo 'email is incorect.<br>';
    }

    if (empty($_POST['password'])) {
        echo 'password  is mandatory.<br>';
        $errors = true;
    }
    $conn = mysqli_connect('localhost', 'root', '', 'spotify_db', '4306');

    if ($conn) {
        echo 'Connected successfully<br>';

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        $query = "INSERT INTO users (username, email, password)
        VALUES('$username','$email','$password')";

        $result = mysqli_query($conn, $query);
        if ($result)
            echo 'Successfully inserted in the DB.';
    } else {
        echo 'Problem';
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register/Login Page</title>
</head>

<body>
    <?php include 'menu.html' ?>

    <form method="POST" action="">
        <input type="text" name="username" placeholder="User Name"><br>
        <input type="email" name="email" placeholder="Your Email"><br>
        <input type="password" name="password" placeholder="Enter a password"><br>
        <input type="submit" name="submitBtn" value="Submit">
    </form>

</body>

</html>