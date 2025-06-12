<?php

use \App\Controllers\MonstersController;

include_once '../app/controllers/monstersController.php';

// Vérifie si monsters est un ID numérique
if (isset($_GET['monsters'])) {
    if (is_numeric($_GET['monsters'])) {
        MonstersController\showAction($connexion, (int)$_GET['monsters']);
    } elseif ($_GET['monsters'] === 'search') {
        MonstersController\searchAction($connexion, $_GET['search'] ?? '');
    } elseif ($_GET['monsters'] === 'filters') {
        MonstersController\filtersAction($connexion);
    } else {
        MonstersController\indexAction($connexion);
    }
} else {
    MonstersController\indexAction($connexion);
}
