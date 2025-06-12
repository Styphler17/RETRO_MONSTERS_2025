<?php

// ROUTES DES MONSTERS
if (isset($_GET['monsters'])):
    include_once '../app/routers/monsters.php';
// ROUTE DE LA PAGE D'ACCUEIL
elseif (isset($_GET['page']) && $_GET['page'] === 'home'):
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
// ROUTE PAR DEFAUT (page d'accueil)
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;
