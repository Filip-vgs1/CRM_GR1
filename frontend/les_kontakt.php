<?php

include "connect.php";

$tillatteSorteringer = ['kontaktpersonFornavn', 'kontaktpersonEtternavn', 'kontaktpersonEpost', 'kontaktpersonStatus', 'firmaNavn'];
$sorterPa    = isset($_GET['sorter']) && in_array($_GET['sorter'], $tillatteSorteringer) ? $_GET['sorter'] : 'kontaktpersonEtternavn';
$retning     = isset($_GET['retning']) && $_GET['retning'] === 'DESC' ? 'DESC' : 'ASC';
$nestRetning = $retning === 'ASC' ? 'DESC' : 'ASC';

$sql = "
SELECT kontaktperson.*, firma.firmaNavn 
FROM kontaktperson
LEFT JOIN firma 
ON kontaktperson.firma_idfirma = firma.idfirma
ORDER BY $sorterPa $retning
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$kontakter = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Kontakter</title>
    <link rel="stylesheet" href="../frontend/style.css" type="text/css">
</head>
<body>
<?php include "meny.php"; ?>
    <header>
        <p>Vis alle kontakter</p>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th><?php echo sorteringslenke('firmaNavn', 'Firma', $sorterPa, $retning, $nestRetning); ?></th>
                    <th><?php echo sorteringslenke('kontaktpersonFornavn',  'Fornavn',   $sorterPa, $retning, $nestRetning); ?></th>
                    <th><?php echo sorteringslenke('kontaktpersonEtternavn','Etternavn', $sorterPa, $retning, $nestRetning); ?></th>
                    <th>Telefon</th>
                    <th><?php echo sorteringslenke('kontaktpersonEpost',    'E-post',    $sorterPa, $retning, $nestRetning); ?></th>
                    <th><?php echo sorteringslenke('kontaktpersonStatus',   'Status',    $sorterPa, $retning, $nestRetning); ?></th>
                    <th>Dato lagt til</th>
                    <th>Rediger</th>
                    <th>Slett</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kontakter as $kontakt): ?>
                <tr>
                    <td><?php echo htmlspecialchars($kontakt['idkontaktperson']); ?></td>
                    <td><?php echo htmlspecialchars($kontakt['firmaNavn'] ?? 'Ingen tilknytning'); ?></td>
                    <td><?php echo htmlspecialchars($kontakt['kontaktpersonFornavn']); ?></td>
                    <td><?php echo htmlspecialchars($kontakt['kontaktpersonEtternavn']); ?></td>
                    <td><?php echo htmlspecialchars($kontakt['kontaktpersonTlf']); ?></td>
                    <td><?php echo htmlspecialchars($kontakt['kontaktpersonEpost']); ?></td>
                    <td><?php echo htmlspecialchars($kontakt['kontaktpersonStatus']); ?></td>
                    <td><?php echo htmlspecialchars($kontakt['kontaktpersonDatoLagtTil']); ?></td>
                    <td><a href="..\backend\contact_update.php?idkontaktperson=<?php echo htmlspecialchars($kontakt['idkontaktperson']); ?>">Rediger</a></td>
                    <td><a id="slett" href="../backend/contact_delete.php?idkontaktperson=<?php echo htmlspecialchars($kontakt['idkontaktperson']); ?>">Slett</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>