<?php

include '../frontend/connect.php';

if (isset($_GET['slett_kontaktperson']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $idkontaktperson = $_GET['idkontaktperson'];

    $sql = "DELETE FROM kontaktperson WHERE idkontaktperson = :idkontaktperson";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idkontaktperson', $idkontaktperson);
    $stmt->execute();

    $kontaktperson = $stmt->fetch(PDO::FETCH_ASSOC);
    
    print_r($kontaktperson);
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
        <p>Slett kontaktperson</p>
    </header>
    <main>
        <?php
        if ($stmt){
            echo '<p> En kontaktperson er blitt slettet </p>';
        }
        else{
            echo '<p id="slett"> Det oppsto en feil! Kontaktpersonen ble ikke slettet! </p>';
        }
        ?>
    </main>
</body>
</html>