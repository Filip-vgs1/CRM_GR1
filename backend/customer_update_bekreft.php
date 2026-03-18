<?php

//Henter oppkoblingen til databasen
include '../frontend/connect.php';

if (isset($_GET['rediger_firma']) && ($_SERVER['REQUEST_METHOD'] == 'GET')) {
    $idfirma   =   $_GET['idfirma'];
    $firmaStatus  =   $_GET['firmaStatus'];
    $firmaOrganisasjonsnummer   =   $_GET['firmaOrganisasjonsnummer'];
    $firmaNavn  =   $_GET['firmaNavn'];
    $firmaAdresse    =   $_GET['firmaAdresse'];
    $firmaPostnr    =   $_GET['firmaPostnr'];
    $firmaTlf    =   $_GET['firmaTlf'];
    $firmaKundeSiden    =   $_GET['firmaKundeSiden'];
    
    //Uppdaterer aktuelt kjeledyr
    $sql = "UPDATE firma SET firmaStatus = :firmaStatus, firmaOrganisasjonsnummer = :firmaOrganisasjonsnummer, firmaNavn = :firmaNavn, firmaAdresse = :firmaAdresse, firmaTlf = :firmaTlf, firmaKundeSiden = :firmaKundeSiden, firmaPostnr = :firmaPostnr WHERE idfirma  = :idfirma";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idfirma", $idfirma );
    $stmt->bindParam(":firmaStatus",$firmaStatus);
    $stmt->bindParam(":firmaOrganisasjonsnummer",$firmaOrganisasjonsnummer);
    $stmt->bindParam(":firmaNavn",$firmaNavn);
    $stmt->bindParam(":firmaAdresse",$firmaAdresse);
    $stmt->bindParam(":firmaTlf",$firmaTlf);
    $stmt->bindParam(":firmaKundeSiden",$firmaKundeSiden);
    $stmt->bindParam(":firmaPostnr",$firmaPostnr);
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
        <p>Rediger et firma</p>
    </header>
    <main>
        <?php
        if ($stmt){
            echo '<p> Et firma er blitt oppdatert </p>';
        }
        else{
            echo '<p id="slett"> Det oppsto en feil! Firmaet ble ikke oppdatert! (Skill Issue)</p>';
        }
        ?>
    </main>     
 
    
</body>
</html>