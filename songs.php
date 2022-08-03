<?php
$conn = mysqli_connect('localhost', 'root', '', 'spotify_db', '4306');

if ($conn) {
    // echo 'Connected successfully <br>';

    $query = 'SELECT * FROM songs';

    $result = mysqli_query($conn, $query);

    $songs = mysqli_fetch_all($result, MYSQLI_ASSOC);

} else {
    echo 'Problem Connecting';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs Page</title>
</head>

<body>
    <?php include 'menu.html' ?>

    <?php foreach ($songs as $song) : ?>
        <p>
        <strong>Title :</strong>
        <?= $song['title']; ?>
        </p>
        <hr>
    <?php endforeach; ?>
</body>

</html>