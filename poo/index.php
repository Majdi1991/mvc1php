<?php 
class Voiture {
    public $marque;
    public $couleur;
    private $conducteur;
    private $annee;
    protected $papier;
     
    const NOMBRE_DE_ROUES = 4;
     
     function demarrer() {
        echo "La voiture {$this->marque} {$this->couleur} démarre.";
    }

     function arreter() {
        echo "La voiture {$this->marque} s'arrête.";
    }
     
    function __construct($marque,$couleur){
         $this->annee =date("Y");
         $this->marque =$marque;
         $this->couleur= $couleur;
         $this->demarrer();
     }

     function __destruct()
     {
        echo "Ta cassé la toto mobile de marque {$this->marque}.";
     }

     function setMarque($marque) {
        $this->marque = $marque;
        
    }

    function getMarque() {
        return $this->marque;
    }

    function setCouleur($Couleur) {
        $this->couleur= $Couleur;
        
    }
    function getCouleur() {
        return $this->couleur;
    }

    function setConducteur($conducteur) {
        $this->conducteur= $conducteur;
        
    }
    function getConducteur() {
        return $this->conducteur;
    }
    function getNombre_De_Roues(){
        return self::NOMBRE_DE_ROUES;
    }
}

$voiture = new Voiture("Toyota","Noire");



class Aixam extends Voiture{
    function __construct($couleur){
        $this->marque ="";
        $this->couleur= $couleur;
        $this->demarrer();
    }

}
$potDeyahourt = new Aixam ("Aixam", "rouge"); 
var_dump($potDeyahourt);

echo $potDeyahourt->getNombre_De_Roues();

// $voiture->setMarque("Toyota");
// $voiture->setCouleur("Noire");
// $voiture -> setConducteur("Wam");
// var_dump($voiture);

// $voiture->setConducteur("Diego");

// foreach($voiture as $prop => $value) {
//     echo $prop . "=>" . $value . "<br>";
// }

// var_dump($voiture);

// $voiture->arreter();
