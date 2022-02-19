<?php

class LivreManager{

    private $livres;

    public function ajouterLivre($livre) {
        $this->livres[] = $livre;
    }

    public function getLivres(){
        return $this->livres;
    }

}
