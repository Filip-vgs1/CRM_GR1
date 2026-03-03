<?php


//Henter oppkoblingen til databasen
include 'connect.php';

if(isset($_GET['slett_contact']) and ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
    $idkontakt = $_GET['idkontakt'];


    // Sletter kontakt i databasen
    $sql = "DELETE FROM kontaktperson WHERE idkontakt = :idkontakt";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idkontakt",$idkontakt);
    $stmt->execute();
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
        <p>Slett kontakt</p>
    </header>

    <main>
        <?php 
        if ($stmt)
            {
                echo '<p>En kontakt er slettet</p>';
            }
            else 
                {
                    echo '<p id="slett">Det skjedde en feil, og kontakten kunne ikke slettes</p>';
                }
        ?>
    </main>
</body>
</html>