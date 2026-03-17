<?php
// Henter oppkoblingen til databasen
include '../frontend/connect.php';

if (isset($_POST['ny_contact']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $firma_idfirma = $_POST['firma_idfirma'];
    $kontaktpersonEtternavn = $_POST['kontaktpersonEtternavn'];
    $kontaktpersonFornavn = $_POST['kontaktpersonFornavn'];
    $kontaktpersonTlf = $_POST['kontaktpersonTlf'];
    $kontaktpersonEpost = $_POST['kontaktpersonEpost'];
    $kontaktpersonDatoLagtTil = $_POST['kontaktpersonDatoLagtTil'];


    //ser om idkontaktperson finnes fra før
    $sql = "SELECT * FROM kontaktperson WHERE idkontaktperson = :idkontaktperson";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idkontaktperson", $idkontaktperson);
    $stmt->execute();

    $kontakt = $stmt->fetch(PDO::FETCH_ASSOC);



    // Basic validation (add more as needed)
if (!$kontakt) {
        $sql = "INSERT INTO kontaktperson (firma_idfirma, kontaktpersonStatus, kontaktpersonEtternavn, kontaktpersonFornavn, kontaktpersonTlf, kontaktpersonEpost, kontaktpersonDatoLagtTil)
                VALUES (:firma_idfirma, 'Aktiv', :kontaktpersonEtternavn, :kontaktpersonFornavn, :kontaktpersonTlf, :kontaktpersonEpost, :kontaktpersonDatoLagtTil)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":firma_idfirma", $firma_idfirma);
        $stmt->bindParam(":kontaktpersonEtternavn", $kontaktpersonEtternavn);
        $stmt->bindParam(":kontaktpersonFornavn", $kontaktpersonFornavn);
        $stmt->bindParam(":kontaktpersonTlf", $kontaktpersonTlf);
        $stmt->bindParam(":kontaktpersonEpost", $kontaktpersonEpost);
        $stmt->bindParam(":kontaktpersonDatoLagtTil", $kontaktpersonDatoLagtTil);
        $stmt->execute();
    } else {
        $message = "Det skjedde en feil, og kontakten kunne ikke registreres";
    }
}

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type="text/css">
    <title>Registrer kontaktperson</title>
</head>
<body>

    <?php include "../frontend/meny.php"; ?>

    <header>
        <h1>Registrert ny kontaktperson</h1>
    </header>

    <main>
        <?php 
        if ($stmt)
            {
                echo '<p>En ny kontakt er registrert</p>';
            }
            else 
                {
                    echo '<p id="slett">Det skjedde en feil, og kontaktpersonen kunne ikke registreres</p>';
                }
        ?>
    </main>
</body>
</html>