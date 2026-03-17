<?php

//Henter oppkoblingen til databasen
include "../frontend/connect.php";

if(isset($_GET['ny_custumer']) && ($_SERVER['REQUEST_METHOD'] == 'GET')) {
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
    $stmt->bindParam(":idfirma", $idfirma);
    $stmt->execute();

    $firma = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$firma){
        $sql = "INSERT INTO firma (firmaNavn, firmaOrganisasjonsnummer, firmaAdresse, firmaPostnr, firmaTlf, firmaStatus, firmaKundeSiden)
                VALUES (:firmaNavn, :firmaOrganisasjonsnummer, :firmaAdresse, :firmaPostnr, :firmaTlf, :firmaStatus, :firmaKundeSiden)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":firmaNavn",$firmaNavn);
        $stmt->bindParam(":firmaOrganisasjonsnummer",$firmaOrganisasjonsnummer);
        $stmt->bindParam(":firmaAdresse",$firmaAdresse);
        $stmt->bindParam(":firmaPostnr",$firmaPostnr);
        $stmt->bindParam(":firmaTlf",$firmaTlf);
        $stmt->bindParam(":firmaStatus",$firmaStatus);
        $stmt->bindParam(":firmaKundeSiden",$firmaKundeSiden);
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