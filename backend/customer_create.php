<?php

// henter oppkobling til databasen 

// include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type ="text/css">
    <title>Registrer ny kunde</title>
</head>
<body>
    <?php include "../frontend/meny.php"; ?>
    <header>
        <p>Registrer ny kunde</p>
    </header>
    <main>
        <form action="customer_create_bekreft.php" method="get">
            <section>
                <label for="firmaNavn">Navn:</label><br>
                <input type="text" id="firmaNavn" name="firmaNavn" required><br><br>
            </section>
            <section>
                <label for="firmaOrganisasjonsnummer">Organisasjonsnummer:</label><br>
                <input type="text" id="firmaOrganisasjonsnummer" name="firmaOrganisasjonsnummer" required><br><br>
            </section>
            <section>
                <label for="firmaAdresse">Adresse:</label><br>
                <input type="text" id="firmaAdresse" name="firmaAdresse" required><br><br>
            </section>
            <section>
                <label for="firmaPostnr">Postnr:</label><br>
                <input type="text" id="firmaPostnr" name="firmaPostnr" required><br><br>
            </section>
            <section>
                <label for="firmaTlf">Telefon nummer:</label><br>
                <input type="text" id="firmaTlf" name="firmaTlf" required><br><br>
            </section>
            <section>
                <label for="firmaStatus">Firma Status:</label><br>
                <input type="text" id="firmaStatus" name="firmaStatus" required><br><br>
            </section>
            <section>
                <label for="firmaKundeSiden">Dato Lagt Til:</label><br>
                <input type="date" id="firmaKundeSiden" name="firmaKundeSiden" required><br><br>
            </section>
            <input type="submit" name="ny_custumer" id ="ny_custumer" value="Registrer">
        </form>
    </main>
</body>
</html>