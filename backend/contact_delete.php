<?php


// henter oppkobling til databasen 

include "connect.php";

if(isset($_GET['idkontakt']) and $_SERVER['REQUEST_METHOD'] == 'GET') 
{
    $idkontakt = $_GET['idkontakt'];

    // Se om idkontakt finnes fra før  
    $sql = "SELECT * FROM kontaktperson WHERE idkontakt = :idkontakt";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idkontakt', $idkontakt);
    $stmt->execute();

    $kontakt = $stmt->fetch(PDO::FETCH_ASSOC);

    print_r($kontakt);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type ="text/css">
    <title>Kontakt</title>
</head>
<body>
    <?php include "meny.php"; ?>
    <header>
        <p>Slett kontakt</p>
    </header>
    <main>
        <form action="contact_delete_bekreft.php" method="get">
            <label for="idkontakt">ID:</label><br>
            <input type="text" id="idkontakt" name="idkontakt" value="<?php echo htmlspecialchars($kontakt['idkontakt']) ?>" readonly><br><br>
            <label for="firma_idfirma">Firma ID:</label><br>
            <input type="text" id="firma_idfirma" name="firma_idfirma" value="<?php echo htmlspecialchars($kontakt['firma_idfirma']) ?>" readonly><br><br>
            <label for="etternavn">Etternavn:</label><br>
            <input type="text" id="etternavn" name="etternavn" value="<?php echo htmlspecialchars($kontakt['kontaktpersonEtternavn']) ?>" readonly><br><br>
            <label for="fornavn">Fornavn:</label><br>
            <input type="text" id="fornavn" name="fornavn" value="<?php echo htmlspecialchars($kontakt['kontaktpersonFornavn']) ?>" readonly><br><br>
            <label for="tlf">Telefon:</label><br>
            <input type="text" id="tlf" name="tlf" value="<?php echo htmlspecialchars($kontakt['kontaktpersonTlf']) ?>" readonly><br><br>
            <label for="epost">E-post:</label><br>
            <input type="text" id="epost" name="epost" value="<?php echo htmlspecialchars($kontakt['kontaktpersonEpost']) ?>" readonly><br><br>
            <input type="submit" name="slett_kontakt" id ="slett" value="Slett">
        </form>
    </main>
</body>
</html>