<?php ob_start() ?>

<div class="row">
    <div class="col-6">
        <img src="<?= URL ?>public/images/<?= $livre->getImage() ?>"/>
    </div>
    <div class="col-6">
        <p>Titre du livre : <?= $livre->getTitre();?></p>
        <p>Nombre de page du livre : <?= $livre->getnbPages(); ?></p>
    </div>
</div>

<?php 
$content = ob_get_clean();
$titre = $livre->getTitre();
require_once "template.php";
?>