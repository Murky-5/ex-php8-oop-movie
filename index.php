<?php 
class Genere {
    protected $Genere;

    public function __construct($_genere)
    {
        if ($_genere == "fantasy") 
        {
            $this->Genere = $_genere;
        }
        else
        {
            $this->Genere = "riprova più tardi";
        };
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
    foreach((array)$film as $key => $value) 
    {
        if (is_object($value)) 
        {
        foreach((array)$value as $brother => $child) 
        {
                echo "$brother: $child </br>";
        }
    } else {
        echo "$key: $value </br>";
    }
    };

    ?>
</body>
</html>