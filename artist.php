<?php
/*Artist list page ('/ artists') This page will list all artists. You will therefore have to query the database. At the end, you should have a list of Artists. For each artist, we will display the name, the first 20 characters of the bio, the genre and the number of music written.*/



$conn = mysqli_connect('localhost', 'root', '', 'spotify_db', '4306');
if ($conn) {
    //echo 'Connected successfully<br>';


    $query = '
    SELECT name, SUBSTRING(`bio`, 1, 20) as newbio, gender, COUNT(songs.id) as number
    FROM artists
    LEFT JOIN songs ON songs.artist_id = artists.id
    GROUP BY artists.id  

    ';

    $results = mysqli_query($conn, $query);

 
    $artists = mysqli_fetch_all($results, MYSQLI_ASSOC);

   // echo '<pre>';
    //var_dump($artists);
    //echo '</pre>';
} else {
    echo 'Problem connecting with the database';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist page</title>
</head>

<body>
<?php include 'menu.html' ?>

    <?php foreach ($artists as $artist) : ?>

        <p>
            <strong>name : </strong>
            <?= $artist['name']; ?>
        </p>

        <p>
            <strong>bio : </strong>
            <?= $artist['newbio']; ?>
        </p>
        <p>
            <strong>gender : </strong>
            <?= $artist['gender']; ?>
        </p>
        <p>
            <strong>number : </strong>
            <?= $artist['number']; ?>
        </p>

        <hr>

        <?php endforeach; ?>

        <img src="../" alt="">
</body>

</html>