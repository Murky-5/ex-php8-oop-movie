<?php 

require_once 'logic/generi.php';

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
        echo "  <div class='box'>
                    <div>
                        Titolo: " . $this->Titolo . "
                    </div>
                    </br>";
        echo "      <div>
                        Stelle: " . $this->Stelle . "
                    </div>
                    </br>";
        echo "      <div>
                        Genere: " . $this->Genere->Genere() . "
                    </div>
                </div>
                </br>
                </br>";
    }
}

?>