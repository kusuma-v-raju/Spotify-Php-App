<?php
$conn = mysqli_connect('localhost', 'root', '', 'spotify_db', '4306');

if ($conn) {
    // echo 'Connected successfully <br>';

    $query = 'SELECT title, poster, artists.name 
    FROM songs
    INNER JOIN artists ON songs.artist_id = artists.id
    ';

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

    <form method="POST">
        <input type="text" name="SongName" placeholder="Enter Song Name" value="">
        <input type="submit" name="Search">
    </form>

    <?php
    if (isset($_POST['Search'])) {
        $query = 'SELECT title, poster, artists.name 
        FROM songs
        INNER JOIN artists ON songs.artist_id = artists.id
        ';

        foreach ($songs as $element) {
            if ($_POST['SongName'] == $element['title']) {
                echo '<strong>Title : </strong>' . $element['title'] . '<br>' . '<strong>Name Of Artist : </strong>' . $element['name'] . '<br>';
                exit();
            }  
            if ($_POST['SongName'] != $element['title']){
                echo "Song not found";
                exit();
            }
            } 
        }
    ?>

    <form method="POST">
        <input type="submit" name="Sort" value="Sort">
    </form>

    <?php
    if(isset($_POST['Sort'])){
        $query = 'SELECT title, poster, artists.name 
        FROM songs
        INNER JOIN artists ON songs.artist_id = artists.id
        ORDER BY title DESC
        ';
    }
    ?>
    <?php foreach ($songs as $song) : ?>
        <p>
            <strong>Title : </strong>
            <?= $song['title']; ?>
        </p>
        <p>
            <strong>Name Of Artist : </strong>
            <?= $song['name']; ?>
        </p>
        <img src="./assets/images/<?= $song['poster']; ?>" height="250px">
        <hr>

    <?php endforeach; ?>

</body>

</html>