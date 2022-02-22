<?php ob_start()?>

<?= $msg; ?>

<?php
$content = ob_get_clean();
$titre = "error !";
require_once "template.php";
?>