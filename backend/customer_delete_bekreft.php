<?php

include '../frontend/connect.php';

if (isset($_GET['slett_firma']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $idfirma = $_GET['idfirma'];

    // Sjekk om firmaet har tilknyttede kontaktpersoner
    $checkSql = "SELECT COUNT(*) AS antall FROM kontaktperson WHERE firma_idfirma = :firma_idfirma";
    $checkStmt = $pdo->prepare($checkSql);
    $checkStmt->bindParam(':firma_idfirma', $idfirma, PDO::PARAM_INT);
    $checkStmt->execute();
    $antallKontakt = $checkStmt->fetch(PDO::FETCH_ASSOC)['antall'];

    if ($antallKontakt > 0) {
        $stmt = false;
        $errorMessage = 'Kan ikke slette firma-et, det har kontaktperson tilknyttet.';
    } else {
        $sql = "DELETE FROM firma WHERE idfirma = :idfirma";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idfirma', $idfirma);

        try {
            $stmt->execute();
            $errorMessage = '';
        } catch (PDOException $e) {
            $stmt = false;
            $errorMessage = 'Det oppsto en feil ved sletting: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        }
    }
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
        if (isset($stmt) && $stmt && empty($errorMessage)) {
            echo '<p>Et firma er blitt slettet.</p>';
        } elseif (isset($errorMessage) && $errorMessage !== '') {
            echo '<p id="slett">' . htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') . '</p>';
        } else {
            echo '<p id="slett">Det oppsto en feil! Firmaet ble ikke slettet.</p>';
        }
        ?>
    </main>
</body>
</html>