<?php 

require_once 'logic/generi.php';
require_once 'logic/movies.php';

$json = file_get_contents('models/movies.json');
$movies = json_decode($json, true);

?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Film con Dropdown (senza JS)</title>
  <style>
    body {
      background-color: #f8f8f8;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 40px; /* Spaziatura orizzontale maggiore tra le box */
      justify-content: center;
    }
    details {
      position: relative;
      background-color: #fff;
      border: 1px solid #ddd;
      padding: 10px;
      width: calc(fit-content + 40px);
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      border-top-right-radius: 10px;   /* nuovo */
      border-bottom-right-radius: 10px; /* nuovo */
    }
    /* Nascondi il marker predefinito */
    summary {
      list-style: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 0;
    }
    summary::-webkit-details-marker {
      display: none;
    }
    /* Titolo in verticale */
    .title {
      writing-mode: vertical-rl;
      text-orientation: mixed;
      font-weight: bold;
      margin: 0;
      max-height: 130px;       /* Altezza massima uniforme */
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      height: 100%;
      text-align: center;
    }
    /* Freccetta custom */
    .arrow {
      transition: transform 0.3s;
      font-size: 20px;
      transform: rotate(90deg);

    }
    details[open] .arrow {
      transform: rotate(-90deg);
    }
    /* Dropdown posizionato a destra */
    .dropdown {
      position: absolute;
      left: 100%;      /* Appende il dropdown a destra del box */
      top: 0;
      width: 200px;
      background-color: #fff;
      border: 1px solid #ddd;
      padding: 10px;
      box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
      z-index: 10;
      display: none;   
    }
    details[open] .dropdown {
      display: block;
    }
    /* Responsive */
    @media (max-width: 1024px) {
      details {
        width: calc(fit-content + 40px);
      }
    }
    @media (max-width: 768px) {
      details {
        width: calc(fit-content + 40px);
      }
      .dropdown {
        left: auto;
        top: 100%;
        width: 100%;
      }
    }
    @media (max-width: 480px) {
      details {
        width: 100%;
      }
      .dropdown {
        left: auto;
        top: 100%;
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <?php 
      foreach ($movies as $movie) {
        $genere = new Genere($movie['genere']); 
        $film = new Movie($movie['titolo'], $movie['stelle'], $genere);
        $film->Elenco();
      }
    ?>
  </div>
</body>
</html>