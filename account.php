<?php
session_start();

if (isset($_SESSION['email']) !== true) {
    echo 'Please log in first to see this page! <br>';
    header('Location: connection.php');
    exit();
} else {    
    echo 'Hello, you loggued-in successfuly with email address : ' . $_SESSION['email'] . '<br>';
}



$conn = mysqli_connect('localhost', 'root', '', 'spotify_db', '4306');

if ($conn) {
    echo 'Connected successfully <br>';

    $query = 'SELECT `username`, `email`, `password` 
    FROM users
   
    ';

    $result = mysqli_query($conn, $query);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


// logout
if (isset($_POST['resetBtn'])) {
    unset($_SESSION['email']);
    header('Location: connection.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php foreach ($users as $user) : ?>
        <p>
            <strong>User Name : </strong>
            <?= $user['username']; ?>
        </p>

        <p>
            <strong>email : </strong>
            <?= $user['email']; ?>
        </p>

        <hr>
    <?php endforeach; ?>
    <form method="POST">
        <input type="submit" name="resetBtn" value="Logout"><br>
    </form>
</body>

</html>