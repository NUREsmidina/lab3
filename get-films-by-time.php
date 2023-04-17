<?php
require_once 'db-connection.php';

$start_date = $_GET['start-date'];
$end_date = $_GET['end-date'];

$query = "SELECT name
          FROM film
          WHERE date BETWEEN :start_date AND :end_date";

$stmt = $pdo->prepare($query);

$stmt->bindParam(":start_date", $start_date);
$stmt->bindParam(":end_date", $end_date);

$stmt->execute();

$result = $stmt->fetchAll();

echo '<ul>';
foreach($result as $row)
{
    echo "<li>$row[0]</li>";
}
echo '</ul>';

$pdo = null;
