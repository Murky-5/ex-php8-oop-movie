<?php 

require_once 'logic/generi.php';
require_once 'logic/movies.php';

$json = file_get_contents('models/movies.json');
$movies = json_decode($json, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film</title>
</head>
<body>
    <?php 
    $genere = new Genere("fantasy");
    foreach($movies as $movie) {
        $resoult = new Movie($movie['titolo'], $movie['stelle'], new Genere($movie['genere']));
        $resoult->Elenco();
    }
    ?>
</body>
</html>