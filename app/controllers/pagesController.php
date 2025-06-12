<?php

namespace App\Controllers\PagesController;

use \App\Models\MonstersModel;
use \PDO;

function homeAction(PDO $connexion)
{
    include_once '../app/models/monstersModel.php';
    
    // Get random monster for homepage
    $randomMonster = \App\Models\MonstersModel\findOneByRand($connexion);
    
    // Get latest monsters with pagination
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 3;
    $latestMonsters = \App\Models\MonstersModel\findAllLatest($connexion, $page, $perPage);
    $total = \App\Models\MonstersModel\countAllLatest($connexion);
    $totalPages = ceil($total / $perPage);
    
    global $content;
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}
