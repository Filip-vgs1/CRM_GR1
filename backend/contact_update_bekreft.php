<?php

//Hente databasen
include 'connect.php';


if (isset($_GET['idKjeledyr']) && ($_SERVER['REQUEST_METHOD'] == 'GET')) {
    $idKjeledyr  =   $_GET['idKjeledyr'];
    
    //ser om idKjeledyr finnes fra før
    $sql = "SELECT * FROM dyrene WHERE idKjeledyr = :idKjeledyr";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idKjeledyr",$idKjeledyr);
    $stmt->execute();

    $dyr = $stmt->fetch(PDO::FETCH_ASSOC);

    print_r($dyr);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type ="text/css">
    <title>Registrer ny contact</title>
</head>
<body>
    <?php include "../frontend/meny.php"; ?>
    <header>
        <p>legge til kontakt</p>
    </header>
    <main>
        <form action="contact_create_bekreft.php" method="get">
            <section>
                <label for="firma_idfirma">Firma ID:</label><br>
                <input type="text" id="firma_idfirma" name="firma_idfirma" required><br><br>
            </section>
            <section>
                <label for="etternavn">Etternavn:</label><br>
                <input type="text" id="etternavn" name="etternavn" required><br><br>
            </section>
            <section>
                <label for="fornavn">Fornavn:</label><br>
                <input type="text" id="fornavn" name="fornavn" required><br><br>
            </section>
            <section>
                <label for="tlf">Telefon:</label><br>
                <input type="text" id="tlf" name="tlf" required><br><br>
            </section>
            <section>
                <label for="epost">E-post:</label><br>
                <input type="text" id="epost" name="epost" required><br><br>
            </section>
            <section>
                <label for="datoLagtTil">Dato lagt til:</label><br>
                <input type="date" id="datoLagtTil" name="datoLagtTil" required><br><br>
            </section>
            <input type="submit" name="ny_contact" id ="ny_contact" value="Registrer">
        </form>
    </main>
</body>
</html>