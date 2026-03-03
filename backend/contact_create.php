
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
        <form action="contact_create_bekreft.php" method="get">
            <label for="idkontakt">ID:</label><br>
            <input type="text" id="idkontakt" name="idkontakt" required><br><br>
            <label for="firma_idfirma">Firma ID:</label><br>
            <input type="text" id="firma_idfirma" name="firma_idfirma" required><br><br>
            <label for="etternavn">Etternavn:</label><br>
            <input type="text" id="etternavn" name="etternavn" required><br><br>
            <label for="fornavn">Fornavn:</label><br>
            <input type="text" id="fornavn" name="fornavn" required><br><br>
            <label for="tlf">Telefon:</label><br>
            <input type="text" id="tlf" name="tlf" required><br><br>
            <label for="epost">E-post:</label><br>
            <input type="text" id="epost" name="epost" required><br><br>
            <label for="datoLagtTil">Dato lagt til:</label><br>
            <input type="date" id="datoLagtTil" name="datoLagtTil" required><br><br>
            <input type="submit" name="ny_contact" id ="ny_contact" value="Registrer">
        </form>
    </main>
</body>
</html>