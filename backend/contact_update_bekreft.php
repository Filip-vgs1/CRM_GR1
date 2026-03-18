<?php

//Henter oppkoblingen til databasen
include '../frontend/connect.php';

if (isset($_GET['rediger_kontaktperson']) && ($_SERVER['REQUEST_METHOD'] == 'GET')) {
    $idkontaktperson  =   $_GET['idkontaktperson'];
    $firma_idfirma  =   $_GET['firma_idfirma'];
    $kontaktpersonStatus   =   $_GET['kontaktpersonStatus'];
    $kontaktpersonEtternavn  =   $_GET['kontaktpersonEtternavn'];
    $kontaktpersonFornavn    =   $_GET['kontaktpersonFornavn'];
    $kontaktpersonTlf    =   $_GET['kontaktpersonTlf'];
    $kontaktpersonEpost    =   $_GET['kontaktpersonEpost'];
    $kontaktpersonDatoLagtTil    =   $_GET['kontaktpersonDatoLagtTil'];
    
    //Uppdaterer aktuelt kjeledyr
    $sql = "UPDATE kontaktperson SET firma_idfirma = :firma_idfirma, kontaktpersonStatus = :kontaktpersonStatus, kontaktpersonEtternavn = :kontaktpersonEtternavn, kontaktpersonFornavn = :kontaktpersonFornavn, kontaktpersonTlf = :kontaktpersonTlf, kontaktpersonEpost = :kontaktpersonEpost, kontaktpersonDatoLagtTil = :kontaktpersonDatoLagtTil WHERE idkontaktperson = :idkontaktperson";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idkontaktperson", $idkontaktperson);
    $stmt->bindParam(":firma_idfirma",$firma_idfirma);
    $stmt->bindParam(":kontaktpersonStatus",$kontaktpersonStatus);
    $stmt->bindParam(":kontaktpersonEtternavn",$kontaktpersonEtternavn);
    $stmt->bindParam(":kontaktpersonFornavn",$kontaktpersonFornavn);
    $stmt->bindParam(":kontaktpersonTlf",$kontaktpersonTlf);
    $stmt->bindParam(":kontaktpersonEpost",$kontaktpersonEpost);
    $stmt->bindParam(":kontaktpersonDatoLagtTil",$kontaktpersonDatoLagtTil);
    $stmt->execute();
}
else {
    $stmt = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type="text/css">
    <title>Rediger en kontaktperson</title>
</head>
<body>
    <section>
        <?php include '../frontend/meny.php'; ?>
    </section>
    <header>
        <p>Rediger en kontaktperson</p>
    </header>
    <main>
        <?php
        if ($stmt){
            echo '<p> En kontaktperson er blitt oppdatert </p>';
        }
        else{
            echo '<p id="slett"> Det oppsto en feil! Kontaktpersonen ble ikke oppdatert! (Skill Issue)</p>';
        }
        ?>
    </main>     
 
    
</body>
</html>