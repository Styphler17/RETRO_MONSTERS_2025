<?php

namespace App\Controllers\MonstersController;

use \App\Models\MonstersModel;
use \PDO;

function indexAction(PDO $connexion)
{
    include_once '../app/models/monstersModel.php';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 3;
    $monsters = \App\Models\MonstersModel\findAll($connexion, $page, $perPage);
    $total = \App\Models\MonstersModel\countAll($connexion);
    $totalPages = ceil($total / $perPage);
    $randomMonster = \App\Models\MonstersModel\findRandom($connexion);
    global $content;
    ob_start();
    include '../app/views/monsters/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $connexion, int $id)
{
    include_once '../app/models/monstersModel.php';
    $monster = MonstersModel\findOneById($connexion, $id);
    global $content;
    ob_start();
    include '../app/views/monsters/show.php';
    $content = ob_get_clean();
}
