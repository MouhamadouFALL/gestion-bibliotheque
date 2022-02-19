<?php 

require_once "Livre.class.php";

// Creer quatre livres
$livre1 = new Livre(1, "Algorithme selon H2PROG", "algo.png", 250);
$livre2 = new Livre(2, "Virus Asiatique", "virus.png", 150);
$livre3 = new Livre(3, "La France du 19ème", "france.png", 100);
$livre4 = new Livre(4, "Le JavaScript client", "JS.png", 300);

ob_start();

?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de page</th>
        <th colspan="2">Actions</th>
    </tr>

    <?php for ($i=0; $i < count(Livre::$livres); $i++) : ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?= Livre::$livres[$i]->getImage(); ?>"  width="60px;"></td>
        <td class="align-middle"><?= Livre::$livres[$i]->getTitre(); ?></td>
        <td class="align-middle"><?= Livre::$livres[$i]->getNbPages(); ?></td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
    <?php endfor; ?>
</table>

<div><a href="" class="btn btn-success d-block">Ajouter</a></div>

<?php
$content = ob_get_clean();
$titre = "Livres de la bibliothèque";
require "template.php";
?>