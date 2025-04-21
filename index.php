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
      position: relative; /* Per posizionare il dropdown relativamente al box */
      background-color: #fff;
      border: 1px solid #ddd;
      padding: 10px;
      width: calc(fit-content + 40px); /* 4 box per riga con il nuovo gap */
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    /* Nascondi il marker predefinito */
    summary {
      list-style: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      /* Imposto un gap nullo per non avere spazio tra titolo e freccetta */
      gap: 0;
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
    }
    /* Freccetta custom */
    .arrow {
      transition: transform 0.3s;
      font-size: 20px;
    }
    details[open] .arrow {
      transform: rotate(180deg);
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
    ?>
      <details>
        <summary>
          <div class="title"><?php echo isset($movie['titolo']) ? $movie['titolo'] : 'Titolo non disponibile'; ?></div>
          <div class="arrow">&#9660;</div>
        </summary>
        <div class="dropdown">
        <p><?php echo isset($movie['titolo']) ? $movie['titolo'] : 'N/A'; ?></p>  
        <p><strong>Stelle:</strong> <?php echo isset($movie['stelle']) ? $movie['stelle'] : 'N/A'; ?></p>
          <p><strong>Genere:</strong> <?php echo isset($movie['genere']) ? $movie['genere'] : 'Non specificato'; ?></p>
        </div>
      </details>
    <?php 
      } 
    ?>
  </div>
</body>
</html>