<?php


require_once "models/LivreManager.class.php";

class LivresController{
    private $livreManager;

    public function __construct()
    {
        $this->livreManager = new LivreManager;
        $this->livreManager->chargementLivres();
    }

    public function afficherLivres(){
        $livres = $this->livreManager->getLivres();
        require_once "views/livres.view.php";
    }
    
}

?>