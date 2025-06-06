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
    $sql = "SELECT m.*, t.name AS type_name FROM monsters m JOIN monster_types t ON m.type_id = t.id WHERE m.id = :id;";
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
