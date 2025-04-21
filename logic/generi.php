<?php 

trait Pick {
    protected $found;
    
    public function Genere() {
        return $this->Genere;
    }
}

class Genere {
    protected $Genere;
    private $ListaGeneri;
    
    use Pick;

    public function __construct($_genere)
    {   
        $json = file_get_contents('models/generi.json');
        $this->ListaGeneri = json_decode($json, true);
        
        
        foreach($this->ListaGeneri as $record) {
            
            if (isset($record['genre'])) {
                if (strtolower($_genere) == strtolower($record['genre'])) {
                    $this->Genere = $_genere;
                    $this->found = true;
                    break;
                }
            }
            
            if (isset($record['subgenres']) && is_array($record['subgenres'])) {
                foreach($record['subgenres'] as $subgenre) {
                    if (strtolower($_genere) == strtolower($subgenre)) {
                        $this->Genere = $_genere;
                        $this->found = true;
                        break 2;
                    }
                }
            }
        }
        
        if (!$this->found) {
            $this->Genere = "$_genere (Questo genere non è riconosciuto)";
        }
    }
    
    
};

?>