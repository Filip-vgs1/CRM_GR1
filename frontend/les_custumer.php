<?php

include "connect.php";

$tillatteSorteringer = ['firmaNavn', 'firmaOrganisasjonsnummer', 'firmaAdresse', 'firmaPostnr', 'firmaStatus'];
$sorterPa    = isset($_GET['sorter']) && in_array($_GET['sorter'], $tillatteSorteringer) ? $_GET['sorter'] : 'firmaNavn';
$retning     = isset($_GET['retning']) && $_GET['retning'] === 'DESC' ? 'DESC' : 'ASC';
$nestRetning = $retning === 'ASC' ? 'DESC' : 'ASC';

$sql = "SELECT * FROM firma ORDER BY $sorterPa $retning";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$firmaer = $stmt->fetchAll(PDO::FETCH_ASSOC);

function sorteringslenke($kolonne, $label, $aktivKolonne, $aktivRetning, $nestRetning) {
    $erAktiv = $kolonne === $aktivKolonne;
    $pil = $erAktiv ? ($aktivRetning === 'ASC' ? ' ▲' : ' ▼') : '';
    $r = $erAktiv ? $nestRetning : 'ASC';
    return "<a class='sorter-lenke" . ($erAktiv ? ' aktiv' : '') . "' href='?sorter=$kolonne&retning=$r'>$label$pil</a>";
}

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firmaer</title>
    <link rel="stylesheet" href="../frontend/style.css" type="text/css">
</head>
<body>
<?php include "meny.php"; ?>
    <header>
        <p>Vis alle firmaer</p>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th><?php echo sorteringslenke('firmaStatus',              'Status',  $sorterPa, $retning, $nestRetning); ?></th>
                    <th><?php echo sorteringslenke('firmaOrganisasjonsnummer', 'Org.nr',  $sorterPa, $retning, $nestRetning); ?></th>
                    <th><?php echo sorteringslenke('firmaNavn',                'Navn',    $sorterPa, $retning, $nestRetning); ?></th>
                    <th><?php echo sorteringslenke('firmaAdresse',             'Adresse', $sorterPa, $retning, $nestRetning); ?></th>
                    <th>Telefon</th>
                    <th>Kunde siden</th>
                    <th><?php echo sorteringslenke('firmaPostnr',              'Postnr',  $sorterPa, $retning, $nestRetning); ?></th>
                    <th>Rediger</th>
                    <th>Slett</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($firmaer as $firma): ?>
                <tr>
                    <td><?php echo htmlspecialchars($firma['idfirma']); ?></td>
                    <td><?php echo htmlspecialchars($firma['firmaStatus']); ?></td>
                    <td><?php echo htmlspecialchars($firma['firmaOrganisasjonsnummer']); ?></td>
                    <td><?php echo htmlspecialchars($firma['firmaNavn']); ?></td>
                    <td><?php echo htmlspecialchars($firma['firmaAdresse']); ?></td>
                    <td><?php echo htmlspecialchars($firma['firmaTlf']); ?></td>
                    <td><?php echo htmlspecialchars($firma['firmaKundeSiden']); ?></td>
                    <td><?php echo htmlspecialchars($firma['firmaPostnr']); ?></td>
                    <td><a href="../backend/customer_update.php?idfirma=<?php echo htmlspecialchars($firma['idfirma']); ?>">Rediger</a></td>
                    <td><a id="slett" href="../backend/customer_delete.php?idfirma=<?php echo htmlspecialchars($firma['idfirma']); ?>">Slett</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>