<?php
class Fruit{
    public static $couleur = "rouge";

    public static function manger(){
        echo "Miam miam";
    }
    public function __construct(){
        self::manger();
        // $this->manger();
    }
}
echo Fruit::$couleur;
