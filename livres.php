<?php ob_start()?>

Livres

<?php
$content = ob_get_clean();
$titre = "Livres de la bibliothèque";
require "template.php";
?>