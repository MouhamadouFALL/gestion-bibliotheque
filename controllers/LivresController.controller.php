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

    public function afficherLivre($id) {
        $livre = $this->livreManager->getLivreById($id);
        require_once "views/afficherLivre.view.php";
    }

    public function ajouterLivre() {
        require_once "views/ajouterLivre.view.php";
    }
    
}

?>