<?php


//Henter oppkoblingen til databasen
include 'connect.php';

if(isset($_GET['ny_contact']) and ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
    $idkontakt = $_GET['idkontakt'];
    $firma_idfirma = $_GET['firma_idfirma'];
    $kontaktpersonEtternavn = $_GET['etternavn'];
    $kontaktpersonFornavn = $_GET['fornavn'];
    $kontaktpersonTlf = $_GET['tlf'];
    $kontaktpersonEpost = $_GET['epost'];
    $kontaktpersonDatoLagtTil = $_GET['datoLagtTil'];

    // Ser om regnr finnes fra før
    $sql = "SELECT * FROM kontaktperson WHERE idkontakt = :idkontakt";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idkontakt",$idkontakt);
    $stmt->execute();

    $kontaktperson = $stmt->fetch(PDO::FETCH_ASSOC);

    print_r($kontaktperson);

    if (!$kontaktperson)
        {

        $sql = "INSERT INTO kontaktperson (idkontakt, firma_idfirma, kontaktpersonEtternavn, kontaktpersonFornavn, kontaktpersonTlf, kontaktpersonEpost, kontaktpersonDatoLagtTil)
                VALUES (:idkontakt, :firma_idfirma, :kontaktpersonEtternavn, :kontaktpersonFornavn, :kontaktpersonTlf, :kontaktpersonEpost, :kontaktpersonDatoLagtTil)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":idkontakt",$idkontakt);
        $stmt->bindParam(":firma_idfirma",$firma_idfirma);
        $stmt->bindParam(":kontaktpersonEtternavn",$kontaktpersonEtternavn);
        $stmt->bindParam(":kontaktpersonFornavn",$kontaktpersonFornavn);
        $stmt->bindParam(":kontaktpersonTlf",$kontaktpersonTlf);
        $stmt->bindParam(":kontaktpersonEpost",$kontaktpersonEpost);
        $stmt->bindParam(":kontaktpersonDatoLagtTil",$kontaktpersonDatoLagtTil);
        $stmt->execute();
        }
    else
        {
    $stmt = 0;    
        }
    }    
else
    {
    $stmt = 0;    
    }            


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type ="text/css">
    <title>kontakt</title>
</head>
<body>
<?php include "meny.php"; ?>
    <header>
        <p>Registrert ny kontakt</p>
    </header>

    <main>
        <?php 
        if ($stmt)
            {
                echo '<p>En ny kontakt er registrert</p>';
            }
            else 
                {
                    echo '<p id="slett">Det skjedde en feil, og kontakten kunne ikke registreres</p>';
                }
        ?>
    </main>
</body>
</html>