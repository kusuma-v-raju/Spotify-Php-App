<?php
session_start();

if (isset($_POST['submitBtn'])) {
    $errors = false;

    if (empty($_POST['email'])) {
        echo 'email is mandatory <br>';
        $errors = true;
    }

    if (empty($_POST['password'])) {
        echo 'password is mandatory <br>';
        $errors =  true;
    }
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors = true;
    } else {
        echo 'email is incorect.<br>';
    }

    $conn = mysqli_connect('localhost', 'root', '', 'spotify_db', '4306');

    if ($conn) {
        echo 'Connected successfuly <br>';

        $email = $_POST['email'];
        $password = $_POST['password'];


        $selectemail = mysqli_query($conn, "
        SELECT email 
        FROM users 
        WHERE email = '" . $_POST['email'] . "'");
        if (mysqli_num_rows($selectemail)) {
            echo 'This email address is already exist! <br>';
        } else {
            echo 'You are not registrated';
        };

        $selectpass = mysqli_query($conn, "
        SELECT password 
        FROM users 
        WHERE password = '" . $_POST['password'] . "'");

        if (mysqli_num_rows($selectpass)) {
        } else {
            echo 'Incorrect password';
        };
      
        }
         if ($_SESSION['email'] = $email);
        
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
        <input type="email" name="email" placeholder="Your Email"><br>
        <input type="password" name="password" placeholder="Enter a password"><br>
        <input type="submit" name="submitBtn" value="Submit">
    </form>

</body>

</html>