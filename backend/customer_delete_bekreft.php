<?php

include '../frontend/connect.php';

if (isset($_GET['slett_firma']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $idfirma = $_GET['idfirma'];

    $sql = "DELETE FROM firma WHERE idfirma = :idfirma";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idfirma', $idfirma);
    $stmt->execute();

    $firma = $stmt->fetch(PDO::FETCH_ASSOC);
} 
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type="text/css">
    <title>Kontakt slettet</title>
</head>
<body>
    <?php include "../frontend/meny.php"; ?>
    <header>
        <p>Slett firma</p>
    </header>
    <main>
        <?php
        if ($stmt){
            echo '<p> Et firma er blitt slettet </p>';
        }
        else{
            echo '<p id="slett"> Det oppsto en feil! Firmet ble ikke slettet! </p>';
        }
        ?>
    </main>
</body>
</html>