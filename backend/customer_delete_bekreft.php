<?php

include '../frontend/connect.php';

if (isset($_GET['slett_kunde']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $idfirma = $_GET['idfirma'];

    $sql = "DELETE FROM firma WHERE idfirma = :idfirma";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idfirma', $idfirma);
    $stmt->execute();
    $slettet = $stmt->rowCount() > 0;
} else {
    $slettet = false;
}

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type="text/css">
    <title>Kunde slettet</title>
</head>
<body>
    <?php include "../frontend/meny.php"; ?>
    <header>
        <p>Slett kunde</p>
    </header>
    <main>
        <?php if ($slettet): ?>
            <p>Kunden er slettet.</p>
        <?php else: ?>
            <p style="background-color:#fde8e8; border-left-color:#e05c5c;">Det skjedde en feil - kunden kunne ikke slettes.</p>
        <?php endif; ?>
        <a id="std_link" href="../frontend/les_custumer.php">Tilbake til kundelisten</a>
    </main>
</body>
</html>