<?php

//Henter oppkoblingen til databasen
include 'connect.php';

if(isset($_GET['ny_customer']) and ($_SERVER['REQUEST_METHOD'] == 'GET')) {
    $firmaNavn                  =   $_GET['firmaNavn'];
    $firmaOrganisasjonsnummer   =   $_GET['firmaOrganisasjonsnummer'];
    $firmaAdresse               =   $_GET['firmaAdresse'];
    $firmaPostnr                =   $_GET['firmaPostnr'];
    $firmaTlf                   =   $_GET['firmaTlf'];
    $firmaStatus                =   'Aktiv';
    $firmaKundeSiden            =   $_GET['firmaKundeSiden'];


    //ser om idfirma finnes fra før
    $sql = "SELECT * FROM firma WHERE idfirma =:idfirma";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idfirma");
    $stmt->execute();

    $dyr = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$firma){
        $sql = "INSERT INTO firma (firmaOrganisasjonsnummer, firmaAdresse, firmaPostnr, firmaTlf, firmaStatus, firmaKundeSiden)
                VALUES (:firmaOrganisasjonsnummer, :firmaAdresse, :firmaPostnr, :firmaTlf, :firmaStatus, :firmaKundeSiden)";

        $stmt = $pdo->prepare($sql);
        // $stmt->bindParam(":idKjeledyr",$idKjeledyr);
        $stmt->bindParam(":firmaOrganisasjonsnummer",$firmaOrganisasjonsnummer);
        $stmt->bindParam(":firmaAdresse",$firmaAdresse);
        $stmt->bindParam(":firmaPostnr",$firmaPostnr);
        $stmt->bindParam(":firmaTlf",$firmaTlf);
        $stmt->bindParam(":firmaStatus",$firmaStatus);
        $stmt->bindParam(":firmaKundeSiden",$firmaKundeSiden);
        $stmt->bindParam(":ny_custumer",$ny_custumer);
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
    <title>Registrer ny kunde</title>
</head>
<body>
    <?php include "../frontend/meny.php"; ?>
    <header>
        <p>Registrer ny kunde</p>
    </header>

    <main>
        <?php 
        if ($stmt)
            {
                echo '<p>En ny kunde er registrert</p>';
            }
            else 
                {
                    echo '<p id="slett">Det skjedde en feil, og kunden kunne ikke registreres</p>';
                }
        ?>
    </main>
</body>
</html>