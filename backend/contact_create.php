
<?php

// henter oppkobling til databasen 

// include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" type ="text/css">
    <title>Registrer ny contact</title>
</head>
<body>
    <?php include "meny.php"; ?>
    <header>
        <p>Registrer ny contact</p>
    </header>
    <main>
        <form action="ny_bekreft.php" method="get">
            <label for="regnr">Regnr:</label><br>
            <input type="text" id="regnr" name="regnr" required><br><br>
            <label for="merke">Merke:</label><br>
            <input type="text" id="merke" name="merke" required><br><br>
            <label for="type">Type:</label><br>
            <input type="text" id="type" name="type" required><br><br>
            <label for="farge">Farge:</label><br>
            <input type="text" id="farge" name="farge" required><br><br>
            <label for="aar">År:</label><br>
            <input type="number" id="aar" name="aar" required><br><br>
            <input type="submit" name="ny_bil" id ="ny_bil" value="Registrer">
        </form>
    </main>
</body>
</html>