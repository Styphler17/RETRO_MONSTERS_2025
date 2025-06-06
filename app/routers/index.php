<?php

// ROUTES DES MONSTERS
if (isset($_GET['monsters'])):
    include_once '../app/routers/monsters.php';
else:
    // ROUTE PAR DEFAUT
    // PATTERN: /
    // CTRL: monstersController
    // ACTION: index
    include_once '../app/controllers/monstersController.php';
    \App\Controllers\MonstersController\indexAction($connexion);
endif;
