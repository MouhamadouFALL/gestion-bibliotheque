<?php

class Livre {

    private $id;
    private $titre;
    private $image;
    private $nbPages;

    // constructeur
    public function __construct($id, $titre, $image, $nbPages)
    {
        $this->id=$id;
        $this->titre=$titre;
        $this->nbPages=$nbPages;
        $this->image=$image;
    }

    public function getId() {return $this->id;}
    public function setId($id) { $this->id=$id;}

    public function getTitre() {return $this->titre;}
    public function setTitre($titre) { $this->titre=$titre;}

    public function getNbPages() {return $this->nbPages;}
    public function setNbPages($nbPages) { $this->nbPages=$nbPages;}

    public function getImage() {return $this->image;}
    public function setImage($image) { $this->image=$image;}

}