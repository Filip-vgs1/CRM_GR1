<?php

//Hente databasen
include '..\frontend\connect.php';


if (isset($_GET['idkontaktperson']) && ($_SERVER['REQUEST_METHOD'] == 'GET')) {
    $idkontaktperson  =   $_GET['idkontaktperson'];
    
    //ser om idkontaktperson finnes fra før
    $sql = "SELECT * FROM kontaktperson WHERE idkontaktperson = :idkontaktperson";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idkontaktperson",$idkontaktperson);
    $stmt->execute();

    $kontakt = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <title>Rediger kontaktperson</title>
</head>
<body>
    <section>
        <?php include '..\frontend\meny.php'; ?>
    </section>
    <header>
        <p>Rediger en kontaktperson</p>
    </header>
    <main>
        <form action="contact_update_bekreft.php" method="GET">
            <section>
                <label for="idkontaktperson">Id Kontaktperson</label><br>
                <input type="text" name="idkontaktperson" value="<?php echo htmlspecialchars($kontakt['idkontaktperson']); ?>" readonly>
            </section>
            <section>
                <label for="firma_idfirma">Id Firma</label><br>
                <input type="text" name="firma_idfirma" id="firma_idfirma" value="<?php echo htmlspecialchars($kontakt['firma_idfirma']); ?>" readonly>
            </section>
            <section>
                <label for="kontaktpersonStatus">Status</label><br>
                <input type="text" name="kontaktpersonStatus" id="kontaktpersonStatus" value="<?php echo htmlspecialchars($kontakt['kontaktpersonStatus']); ?>" required>
            </section>
            <section>
                <label for="kontaktpersonFornavn">Kontaktperson fornavn</label><br>
                <input type="text" name="kontaktpersonFornavn" id="kontaktpersonFornavn" value="<?php echo htmlspecialchars($kontakt['kontaktpersonFornavn']); ?>" required>
            </section>
            <section>
                <label for="kontaktpersonEtternavn">Kontaktperson etternavn</label><br>
                <input type="text" name="kontaktpersonEtternavn" id="kontaktpersonEtternavn" value="<?php echo htmlspecialchars($kontakt['kontaktpersonEtternavn']); ?>" required>
            </section>
            <section>
                <label for="kontaktpersonTlf">Telefonnummer</label><br>
                <input type="text" name="kontaktpersonTlf" id="kontaktpersonTlf" value="<?php echo htmlspecialchars($kontakt['kontaktpersonTlf']); ?>">
            </section>
            <section>
                <label for="kontaktpersonEpost">Epost</label><br>
                <input type="text" name="kontaktpersonEpost" id="kontaktpersonEpost" value="<?php echo htmlspecialchars($kontakt['kontaktpersonEpost']); ?>">
            </section>
            <section>
                <label for="kontaktpersonDatoLagtTil">Dato lagt til</label><br>
                <input type="date" name="kontaktpersonDatoLagtTil" id="kontaktpersonDatoLagtTil" value="<?php echo htmlspecialchars($kontakt['kontaktpersonDatoLagtTil']); ?>">
            </section>
    
            <input type="hidden" name="rediger_kontaktperson" value="1">
            <input type="submit" id="rediger_kontaktperson" value="Rediger">
        </form> 
    </main>
    
</body>
</html>