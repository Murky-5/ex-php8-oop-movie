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
        $titolo = isset($this->Titolo) ? $this->Titolo : 'Titolo non disponibile';
        $genere  = isset($this->Genere) ? $this->Genere->Genere() : 'Non specificato';
        $stelle = isset($this->Stelle) ? $this->Stelle : 'N/A';

        echo "
         <details>
            <summary>
                <div class='title'>{$titolo}</div>
                <div class='arrow'>&#9660;</div>
            </summary>
        <div class='dropdown'>
        <p>{$titolo}</p>  
        <p><strong>Stelle:</strong> {$stelle}</p>
        <p><strong>Genere:</strong> {$genere}</p>
        </div>
      </details>
        ";
    }
}

?>