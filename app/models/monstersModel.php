<?php

namespace App\Models\MonstersModel;

use \PDO;

function findAll(PDO $connexion, int $page = 1, int $perPage = 3): array
{
    $offset = ($page - 1) * $perPage;
    $sql = "SELECT m.*, t.name AS type_name FROM monsters m JOIN monster_types t ON m.type_id = t.id ORDER BY m.created_at DESC LIMIT :perPage OFFSET :offset;";
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $connexion, int $id): array
{
    $sql = "SELECT m.*, t.name AS type_name, r.name as rarity_name 
            FROM monsters m 
            JOIN monster_types t ON m.type_id = t.id 
            JOIN rareties r ON m.rarety_id = r.id 
            WHERE m.id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function countAll(PDO $connexion): int
{
    $sql = "SELECT COUNT(*) as total FROM monsters;";
    $rs = $connexion->query($sql);
    $row = $rs->fetch(PDO::FETCH_ASSOC);
    return (int)$row['total'];
}

function findRandom(PDO $connexion): array
{
    $sql = "SELECT m.*, t.name AS type_name FROM monsters m JOIN monster_types t ON m.type_id = t.id ORDER BY RAND() LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function findAllLatest(PDO $connexion, int $page = 1, int $perPage = 3): array
{
    $offset = ($page - 1) * $perPage;
    error_log("Page: " . $page . ", PerPage: " . $perPage . ", Offset: " . $offset);
    
    $sql = "SELECT m.*, t.name AS type_name, r.name as rarity_name
            FROM monsters m 
            JOIN monster_types t ON m.type_id = t.id 
            JOIN rareties r ON m.rarety_id = r.id
            ORDER BY m.created_at DESC 
            LIMIT :perPage OFFSET :offset;";
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    error_log("Results count for page " . $page . ": " . count($results));
    return $results;
}

function countAllLatest(PDO $connexion): int
{
    $sql = "SELECT COUNT(*) as total FROM monsters;";
    $stmt = $connexion->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    error_log("Total monsters count: " . $row['total']);
    return (int)$row['total'];
}
