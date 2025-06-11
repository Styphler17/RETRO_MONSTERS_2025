<?php

namespace App\Controllers\MonstersController;

use \App\Models\MonstersModel;
use \PDO;

function indexAction(PDO $connexion)
{
    include_once '../app/models/monstersModel.php';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 3;
    
    // Get paginated latest monsters
    $latestMonsters = \App\Models\MonstersModel\findAllLatest($connexion, $page, $perPage);
    $total = \App\Models\MonstersModel\countAllLatest($connexion);
    $totalPages = ceil($total / $perPage);
    
    // Debug: Log pagination info
    error_log("Current page: " . $page);
    error_log("Total monsters: " . $total);
    error_log("Total pages: " . $totalPages);
    error_log("Monsters on current page: " . count($latestMonsters));
    
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
