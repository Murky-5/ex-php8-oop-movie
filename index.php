<?php 
class Genere {
    protected $Genere;
    private $ListaGeneri;

    public function __construct($_genere)
    {   
        $json = file_get_contents('generi.json');
        $this->ListaGeneri = json_decode($json, true);

        $found = false;

        foreach($this->ListaGeneri as $record) {

            if (isset($record['genre'])) {
                if (strtolower($_genere) == strtolower($record['genre'])) {
                    $this->Genere = $_genere;
                    $found = true;
                    break;
                }
            }
            
            if (isset($record['subgenres']) && is_array($record['subgenres'])) {
                foreach($record['subgenres'] as $subgenre) {
                    if (strtolower($_genere) == strtolower($subgenre)) {
                        $this->Genere = $_genere;
                        $found = true;
                        break 2;
                    }
                }
            }
        }

        if (!$found) {
            $this->Genere = "$_genere (Questo genere non è riconosciuto)";
        }
    }
    
    public function Genere() {
        return $this->Genere;
    }
};

class Movie {
    private $Titolo;
    private $Stelle;
    private $Genere;

    public function __construct($_titolo, $_stelle, Genere $_genere)
    {
        $this->Titolo = $_titolo;
        $this->Stelle = $_stelle;
        $this->Genere = $_genere;
    }
    
    public function Elenco() {
        echo "Titolo: " . $this->Titolo . "</br>";
        echo "Stelle: " . $this->Stelle . "</br>";
        echo "Genere: " . $this->Genere->Genere() . "</br>";
    }
}

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
    $film = new Movie("Pippo nel paese dell meraviglie", 5, $genere);
    $film->Elenco();
    ?>
</body>
</html>