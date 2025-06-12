<?php

namespace App\Models\TypesModel;

use \PDO;

// Affiche la liste des types
function findAll(PDO $connexion): array
{
    $sql = "SELECT * FROM monster_types ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
} 