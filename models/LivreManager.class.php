<?php

require_once "Model.class.php";
require_once "Livre.class.php";

class LivreManager extends Model{

    private $livres;

    public function ajouterLivre($livre) {
        $this->livres[] = $livre;
    }

    public function getLivres(){
        return $this->livres;
    }

    public function getLivreById($id) {
        for ($i=0; $i < count($this->livres); $i++) { 
            if ($this->livres[$i]->getId() === $id) {
                return $this->livres[$i];
            }
        }
    }

    // Permet de recupérer les livres dans la base de données
    public function chargementLivres(){
        // Définir une requête
        $req = $this->getBdd()->prepare("select * from livres order by id desc");
        $req->execute(); // Exécution de la requête
        $resulat = $req->fetchAll(PDO::FETCH_ASSOC); // recuperer le resultat et PDO::FETCH_ASSOC permet d'éviter les doublons
        $req->closeCursor();

        // remplir la collection avec le resultat 
        foreach ($resulat as $livre) {
            $l = new Livre($livre['id'], $livre['titre'], $livre['image'], $livre['nbPages']);
            $this->ajouterLivre($l);
        }
    }

    // Ajouter un livre à la base de données
    public function ajouterLivreBD() {
        
    }
}

?>
