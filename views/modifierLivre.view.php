<?php ob_start() ?>

<form method="POST" action="<?= URL?>livres/vm" enctype="multipart/form-data">
<fieldset>
    <legend>Bibliotheque Bone</legend>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" readonly="" class="form-control-plaintext" id="staticBibliothecaire" value="bibliotehcaire@bone.com">
      </div>
    </div>

    <div class="form-group">
      <label for="titre" class="form-label mt-4">titre</label>
      <input type="text" class="form-control" id="titre" name="titre"  value="<?= $livre->getTitre() ?>"">
    </div>
    <div class="form-group">
      <label for="nbPages" class="form-label mt-4">Nombre de Pages</label>
      <input type="number" class="form-control" id="nbPages" name="nbPages" value="<?= $livre->getNbPages() ?>">
    </div>
    <div>
        <h3>Image : </h3>
        <img src="<?= URL ?>public/images/<?= $livre->getImage(); ?>" class="img-thumbnail  img-fluid" />
    </div>
    <div class="form-group">
      <label for="image" class="form-label mt-4">Choisir une image</label>
      <input class="form-control" type="file" id="image" name="image">
    </div>
    <input type="hidden" name="identifiant" value="<?= $livre->getId(); ?>"/>
    <br/>
    <button type="submit" class="btn btn-primary">Valider</button>
</fieldset>   
</form>

<?php 
$content = ob_get_clean();
$titre = "Modifier le Livre : ".$livre->getId();
require_once "template.php";
?>