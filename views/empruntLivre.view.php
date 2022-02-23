<?php ob_start() ?>

<?php 
$content= ob_get_clean();
$titre = "Emprunter un livre ";
require_once "template.php";
?>
