<?php

namespace App\Controllers\MonstersController;

use \App\Models\MonstersModel;
use \PDO;

function indexAction(PDO $connexion)
{
    include_once '../app/models/monstersModel.php';
    
    // Get paginated monsters
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 3;
    $latestMonsters = \App\Models\MonstersModel\findAllLatest($connexion, $page, $perPage);
    $total = \App\Models\MonstersModel\countAllLatest($connexion);
    $totalPages = ceil($total / $perPage);
    $randomMonster = \App\Models\MonstersModel\findOneByRand($connexion);
    
    global $content;
    ob_start();
    include '../app/views/monsters/index.php';
    $content = ob_get_clean();
}

// Affiche un monstre en particulier
function showAction(PDO $connexion, int $id)
{
    include_once '../app/models/monstersModel.php';
    $monster = MonstersModel\findOneById($connexion, $id);
    global $content;
    ob_start();
    include '../app/views/monsters/show.php';
    $content = ob_get_clean();
}

function searchAction(PDO $connexion, string $search = ''): void
{
    include_once '../app/models/monstersModel.php';
    $results = \App\Models\MonstersModel\findAllBySearch($connexion, $search);

    global $content;
    ob_start();
    include '../app/views/monsters/search.php';
    $content = ob_get_clean();
}

function filtersAction(PDO $connexion): void
{
    include_once '../app/models/monstersModel.php';

    // Get types and rarities for the filter dropdowns
    $types = \App\Models\MonstersModel\findAllTypes($connexion);
    $rareties = \App\Models\MonstersModel\findAllRarities($connexion);

    $criteria = [
        'type' => $_GET['type'] ?? null,
        'rarety' => $_GET['rarety'] ?? null,
        'min_pv' => $_GET['min_pv'] ?? null,
        'max_pv' => $_GET['max_pv'] ?? null,
        'min_attack' => $_GET['min_attack'] ?? null,
        'max_attack' => $_GET['max_attack'] ?? null,
    ];

    $results = \App\Models\MonstersModel\findAllByCriteria($connexion, $criteria);

    global $content;
    ob_start();
    include '../app/views/monsters/filters.php';
    $content = ob_get_clean();
}
