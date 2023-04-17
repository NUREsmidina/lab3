<!DOCTYPE html>
<html>
<head>
    <title>lb3</title>
</head>
<body>
<h1>Список фільмів обраного жанру</h1>
<form action="get-films-by-genre.php" method="get">
    <label for="genre">Виберіть жанр:</label>
    <select id="genre" name="genre">
        <?php
        include('db-connection.php');

        $sqlSelect = "SELECT title FROM genre";
        foreach ($pdo->query($sqlSelect) as $row) {
            echo "<option value=$row[0]>$row[0]</option>";
        }
        $pdo = null;
        ?>
    </select>
    <input type="submit" value="Пошук">
</form>

<h1>Список фільмів з обраним актором</h1>
<form action="get-films-by-actor.php" method="get">
    <label for="actor-name">Виберіть актора:</label>
    <select id="actor-name" name="actor-name">
        <?php
        include('db-connection.php');

        $sqlSelect = "SELECT name FROM actor";
        foreach ($pdo->query($sqlSelect) as $row) {
            echo "<option value='$row[0]'>$row[0]</option>";
        }
        $pdo = null;
        ?>
    </select>
    <input type="submit" value="Пошук">
</form>

<h2>Список фільмів за вказаний часовий інтервал</h2>
<form action="get-films-by-time.php" method="get">
    <label for="start-date">Час початку:</label>
    <input type="date" id="start-date" name="start-date" required>

    <label for="end-date">Час закінчення:</label>
    <input type="date" id="end-date" name="end-date" required>

    <input type="submit" value="Пошук">
</form>
</body>
</html>