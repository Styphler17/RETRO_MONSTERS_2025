<?php

try {
    $connexion = new PDO('mysql:host=' . 'localhost' . ';dbname=' . 'retro_monsters_2025', 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
    // echo "C'est bien balot mais y a un stuut !";
}
