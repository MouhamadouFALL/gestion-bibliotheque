<?php

require_once "controllers/LivresController.controller.php";
$livreController = new LivresController;

if (empty($_GET['page'])) {
    require "views/accueil.view.php";
}
else {
    switch ($_GET['page']) {
        case 'accueil': require "views/accueil.view.php";
            break;
        case 'livres': $livreController->afficherLivres();
            break;
        
        default:
            # code...
            break;
    }
}

?>