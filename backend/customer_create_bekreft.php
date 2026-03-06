<?php

//Henter oppkoblingen til databasen
include 'connect.php';

if(isset($_GET['ny_customer']) and ($_SERVER['REQUEST_METHOD'] == 'GET')) {
    $firmaNavn                  =   $_GET['firmaNavn'];
    $firmaOrganisasjonsnummer   =   $_GET['firmaOrganisasjonsnummer'];
    $firmaAdresse               =   $_GET['firmaAdresse'];
    $firmaPostnr                =   $_GET['firmaPostnr'];
    $firmaTlf                   =   $_GET['firmaTlf'];

    $firmaStatus = 'Aktiv'

    //ser om idfirma finnes fra før
    $sql = "SELECT * FROM firma WHERE idfirma;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idfirma",$idfirma);
    $stmt->execute();

    $dyr = $stmt->fetch(PDO::FETCH_ASSOC);
    
    print_r($dyr);
    
    if (!$dyr){
        $sql = "INSERT INTO dyrene (kjeledyrNavn, kjeledyrFarge, typeDyr, dyreRase, kjeledyrFodt, kjeledyrHoyde, kjeledyrVekt)
                VALUES (:kjeledyrNavn, :kjeledyrFarge, :typeDyr, :dyreRase, :kjeledyrFodt, :kjeledyrHoyde, :kjeledyrVekt)";

        $stmt = $pdo->prepare($sql);
        // $stmt->bindParam(":idKjeledyr",$idKjeledyr);
        $stmt->bindParam(":kjeledyrNavn",$kjeledyrNavn);
        $stmt->bindParam(":kjeledyrFarge",$kjeledyrFarge);
        $stmt->bindParam(":typeDyr",$typeDyr);
        $stmt->bindParam(":dyreRase",$dyreRase);
        $stmt->bindParam(":kjeledyrFodt",$kjeledyrFodt);
        $stmt->bindParam(":kjeledyrHoyde",$kjeledyrHoyde);
        $stmt->bindParam(":kjeledyrVekt",$kjeledyrVekt);
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