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

    public function ajouterLivreValider() {
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $nomImage = $this->ajouterImager($file, $repertoire); // charger ou upload de l'image
        $this->livreManager->ajouterLivreBD();
    }


    private function ajouterImager($file, $dir) {
        // vérifier si le nom du ficher est défini ou s'il est vide
        if (!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image.");

        // vérifier est ce que le répertoire existe
        if (!file_exists($dir)) 
            mkdir($dir, 0777);

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)); // recupérer l'extension du fichier
        $random = rand(0, 99999);
        $target_file = $dir.$random."_".$file['name'];

        if (!getimagesize($file['tmp_name']))
            throw new Exception("Le fichier n'est pas une image");
        if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu.");
        if (file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if ($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros.");
        if (!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout d'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
        
    }
    
}

?>