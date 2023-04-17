<?php

$dsn = "mysql:host=localhost;dbname=lb_pdo_films";
$username = "root";
$pass = "";

try {
    $pdo = new PDO($dsn, $username, $pass);
} catch(PDOException $e) {
    echo $e->getMessage();
}
