<?php

include '../frontend/connect.php';

if (isset($_GET['slett_kontakt']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $idkontaktperson = $_GET['idkontaktperson'];

    $sql = "DELETE FROM kontaktperson WHERE idkontaktperson = :idkontaktperson";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idkontaktperson', $idkontaktperson);
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
    <title>Kontakt slettet</title>
</head>
<body>
    <?php include "../frontend/meny.php"; ?>
    <header>
        <p>Slett kontaktperson</p>
    </header>
    <main>
        <?php if ($slettet): ?>
            <p>Kontaktpersonen er slettet.</p>
        <?php else: ?>
            <p style="background-color:#fde8e8; border-left-color:#e05c5c;">Det skjedde en feil - kontaktpersonen kunne ikke slettes.</p>
        <?php endif; ?>
        <a id="std_link" href="../frontend/les_kontakt.php">Tilbake til kontaktlisten</a>
    </main>
</body>
</html>