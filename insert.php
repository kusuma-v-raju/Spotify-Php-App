<?php
/*Create a page to insert a new artist. You need to use a form.*/

if (isset($_POST['insertBtn'])) {
    $errors = false;

    if (empty($_POST['name'])) {
        echo 'name is mandatory.<br>';
        $errors = true;
    }

    if (empty($_POST['bio'])) {
        echo 'bio is mandatory.<br>';
        $errors = true;
    }

    if (empty($_POST['gender'])) {
        echo 'gender is mandatory.<br>';
        $errors = true;
    }
    if (empty($_POST['birth_year'])) {
        echo 'birth_year is mandatory.<br>';
        $errors = true;
    }

    $conn = mysqli_connect('localhost', 'root', 'root', 'spotify_db');
    if ($conn) {
        echo 'Connected successfully<br>';

$name = $_POST['name'];
$bio = $_POST['bio'];
$gender = $_POST['gender'];
$birth_year = $_POST['birth_year'];

$query = "INSERT INTO artists (name, bio, gender, birth_year)
        VALUES('$name','$bio','$gender','$birth_year')";
   
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
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Name"><br>
        <input type="text" name="bio" placeholder="bio"><br>
        <input type="text" name="gender" placeholder="gender"><br>
        <input type="text" name="birth_year" placeholder="birth_year"><br>
        <input type="submit" name="insertBtn" value="Insert">
    </form>


</body>

</html>