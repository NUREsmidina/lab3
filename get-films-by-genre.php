<?php
require_once 'db-connection.php';

$genre = $_GET['genre'];

$query = "SELECT film.name
          FROM film
          INNER JOIN film_genre ON film.ID_FILM = film_genre.FID_Film
          INNER JOIN genre ON film_genre.FID_Genre = genre.ID_Genre
          WHERE genre.title = :genre";

$stmt = $pdo->prepare($query);

$stmt->bindParam(":genre", $genre);

$stmt->execute();

$result = $stmt->fetchAll();

echo '<ul>';
foreach($result as $row)
{
    echo "<li>$row[0]</li>";
}
echo '</ul>';

$pdo = null;
