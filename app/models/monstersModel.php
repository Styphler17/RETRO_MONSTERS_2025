<?php

namespace App\Models\MonstersModel;

use \PDO;

// Affiche la liste des monstres
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

// Affiche un monstre en particulier
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

// Compte le nombre de monstres
function countAll(PDO $connexion): int
{
    $sql = "SELECT COUNT(*) as total FROM monsters;";
    $rs = $connexion->query($sql);
    $row = $rs->fetch(PDO::FETCH_ASSOC);
    return (int)$row['total'];
}

// Affiche un monstre aléatoire
function findOneByRand(PDO $connexion): array
{
    $sql = "SELECT m.*, t.name AS type_name 
            FROM monsters m 
            JOIN monster_types t ON m.type_id = t.id 
            ORDER BY RAND() LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);
}

// Affiche la liste des monstres paginés
function findAllLatest(PDO $connexion, int $page = 1, int $perPage = 3): array
{
    $offset = ($page - 1) * $perPage;
    
    $sql = "SELECT m.*, t.name AS type_name, r.name as rarity_name
            FROM monsters m 
            JOIN monster_types t ON m.type_id = t.id 
            JOIN rareties r ON m.rarety_id = r.id
            ORDER BY m.created_at DESC 
            LIMIT :perPage OFFSET :offset";
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Compte le nombre de monstres paginés
function countAllLatest(PDO $connexion): int
{
    $sql = "SELECT COUNT(*) as total FROM monsters";
    $stmt = $connexion->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return (int)$row['total'];
}

function findAllBySearch(PDO $connexion, string $term): array
{
    $sql = "SELECT m.*, t.name AS type_name, r.name as rarity_name
            FROM monsters m
            JOIN monster_types t ON m.type_id = t.id
            JOIN rareties r ON m.rarety_id = r.id
            WHERE m.name LIKE :term
               OR m.description LIKE :term
               OR t.name LIKE :term
               OR r.name LIKE :term";
    $stmt = $connexion->prepare($sql);
    $term = '%' . $term . '%';
    $stmt->bindValue(':term', $term, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByCriteria(PDO $connexion, array $criteria): array
{
    $conditions = [];
    $params = [];

    if (!empty($criteria['type'])) {
        $conditions[] = 'm.type_id = :type';
        $params[':type'] = (int)$criteria['type'];
    }
    if (!empty($criteria['rarety'])) {
        $conditions[] = 'm.rarety_id = :rarety';
        $params[':rarety'] = (int)$criteria['rarety'];
    }
    if (!empty($criteria['min_pv'])) {
        $conditions[] = 'm.pv >= :min_pv';
        $params[':min_pv'] = (int)$criteria['min_pv'];
    }
    if (!empty($criteria['max_pv'])) {
        $conditions[] = 'm.pv <= :max_pv';
        $params[':max_pv'] = (int)$criteria['max_pv'];
    }
    if (!empty($criteria['min_attack'])) {
        $conditions[] = 'm.attack >= :min_attack';
        $params[':min_attack'] = (int)$criteria['min_attack'];
    }
    if (!empty($criteria['max_attack'])) {
        $conditions[] = 'm.attack <= :max_attack';
        $params[':max_attack'] = (int)$criteria['max_attack'];
    }

    $where = $conditions ? 'WHERE ' . implode(' AND ', $conditions) : '';
    $sql = "SELECT m.*, t.name AS type_name, r.name as rarity_name
            FROM monsters m
            JOIN monster_types t ON m.type_id = t.id
            JOIN rareties r ON m.rarety_id = r.id
            $where";

    $stmt = $connexion->prepare($sql);
    foreach ($params as $key => $val) {
        $stmt->bindValue($key, $val, PDO::PARAM_INT);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findAllTypes(PDO $connexion): array
{
    $sql = "SELECT * FROM monster_types ORDER BY name";
    $stmt = $connexion->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findAllRarities(PDO $connexion): array
{
    $sql = "SELECT * FROM rareties ORDER BY name";
    $stmt = $connexion->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
