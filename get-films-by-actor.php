<?php
require_once 'db-connection.php';

$actor_name = $_GET['actor-name'];

$query = "SELECT film.name
          FROM film
          INNER JOIN film_actor ON film.ID_FILM = film_actor.FID_Film
          INNER JOIN actor ON film_actor.FID_Actor = actor.ID_Actor
          WHERE actor.name = :actor_name";

$stmt = $pdo->prepare($query);

$stmt->bindParam(":actor_name", $actor_name);

$stmt->execute();

$result = $stmt->fetchAll();

echo '<ul>';
foreach($result as $row)
{
    echo "<li>$row[0]</li>";
}
echo '</ul>';

$pdo = null;
