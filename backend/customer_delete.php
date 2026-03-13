<?php

include "../frontend/connect.php";

if (isset($_GET['idfirma']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $idfirma = $_GET['idfirma'];

    $sql = "SELECT * FROM firma WHERE idfirma = :idfirma";
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
    <title>Slett kunde</title>
</head>
<body>
    <?php include "../frontend/meny.php"; ?>
    <header>
        <p>Bekreft sletting av kunde</p>
    </header>
    <main>
        <?php if (!empty($firma)): ?>
            <p style="background-color:#fde8e8; border-left-color:#e05c5c;">
                Er du sikker på at du vil slette <strong><?php echo htmlspecialchars($firma['firmaNavn']); ?></strong>? Dette kan ikke angres.
            </p>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Navn</th>
                        <th>Org.nr</th>
                        <th>Adresse</th>
                        <th>Postnr</th>
                        <th>Telefon</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($firma['idfirma']); ?></td>
                        <td><?php echo htmlspecialchars($firma['firmaNavn']); ?></td>
                        <td><?php echo htmlspecialchars($firma['firmaOrganisasjonsnummer']); ?></td>
                        <td><?php echo htmlspecialchars($firma['firmaAdresse']); ?></td>
                        <td><?php echo htmlspecialchars($firma['firmaPostnr']); ?></td>
                        <td><?php echo htmlspecialchars($firma['firmaTlf']); ?></td>
                        <td><?php echo htmlspecialchars($firma['firmaStatus']); ?></td>
                    </tr>
                </tbody>
            </table>

            <br>
            <form action="customer_delete_bekreft.php" method="get" style="display:inline;">
                <input type="hidden" name="idfirma" value="<?php echo htmlspecialchars($firma['idfirma']); ?>">
                <input type="submit" name="slett_kunde" id="slett" value="Slett kunde">
            </form>
            &nbsp;&nbsp;
            <a id="std_link" href="../frontend/les_custumer.php">Avbryt</a>

        <?php else: ?>
            <p style="background-color:#fde8e8; border-left-color:#e05c5c;">Kunden ble ikke funnet.</p>
            <a id="std_link" href="../frontend/les_custumer.php">Tilbake til liste</a>
        <?php endif; ?>
    </main>
</body>
</html>