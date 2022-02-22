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

        throw new Exception("Le livre n'existe pas.");
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
    public function ajouterLivreBD($titre, $nbPages, $image) {
        $req = "insert into livres (titre, nbPages, image) values(:titre, :nbPages, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbPages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $livre = new Livre($this->getBdd()->lastInsertId(), $titre, $nbPages, $image);
            $this->ajouterLivre($livre);
        }
    }

    public function supprimerLivreBD($id) {
        $req = "delete from livres where id = :idLivre";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idLivre", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $livre = $this->getLivreById($id);
            unset($livre);
        }
    }

    public function modifierLivreBD($id, $titre, $nbPages, $image) {
        $req = "
        update livres
        set titre = :titre, nbPages = :nbPages, image = :image
        where id = :id";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbPages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $this->getLivreById($id)->setTitre($titre);
            $this->getLivreById($id)->setNbPages($nbPages);
            $this->getLivreById($id)->setImage($image);
        }
    }
}

?>
