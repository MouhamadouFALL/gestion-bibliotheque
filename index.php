<?php ob_start() ?>

Welcome

<?php
$content = ob_get_clean();
$titre = "Bibliothèque Bone";
require "template.php";
?>