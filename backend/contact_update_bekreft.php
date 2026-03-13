<?php

include "../frontend/connect.php";

// Step 1: Show confirmation of changes before saving
if (isset($_GET['oppdater_kontakt']) && $_SERVER['REQUEST_METHOD'] == 'GET') {

    $idkontaktperson        = $_GET['idkontaktperson'];
    $fornavn                = $_GET['fornavn'];
    $etternavn              = $_GET['etternavn'];
    $tlf                    = $_GET['tlf'];
    $epost                  = $_GET['epost'];
    $status                 = $_GET['status'];

    // Fetch original values to show diff
    $sql = "SELECT * FROM kontaktperson WHERE idkontaktperson = :idkontaktperson";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idkontaktperson', $idkontaktperson);
    $stmt->execute();
    $gammel = $stmt->fetch(PDO::FETCH_ASSOC);

    $visBekreftelse = true;
    $lagret = false;

// Step 2: Save after user confirms
} elseif (isset($_GET['bekreft_oppdater']) && $_SERVER['REQUEST_METHOD'] == 'GET') {

    $idkontaktperson        = $_GET['idkontaktperson'];
    $fornavn                = $_GET['fornavn'];
    $etternavn              = $_GET['etternavn'];
    $tlf                    = $_GET['tlf'];
    $epost                  = $_GET['epost'];
    $status                 = $_GET['status'];

    $sql = "UPDATE kontaktperson SET
                kontaktpersonFornavn    = :fornavn,
                kontaktpersonEtternavn  = :etternavn,
                kontaktpersonTlf        = :tlf,
                kontaktpersonEpost      = :epost,
                kontaktpersonStatus     = :status
            WHERE idkontaktperson = :idkontaktperson";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fornavn',            $fornavn);
    $stmt->bindParam(':etternavn',          $etternavn);
    $stmt->bindParam(':tlf',                $tlf);
    $stmt->bindParam(':epost',              $epost);
    $stmt->bindParam(':status',             $status);
    $stmt->bindParam(':idkontaktperson',    $idkontaktperson);
    $stmt->execute();

    $visBekreftelse = false;
    $lagret = $stmt->rowCount() > 0;

} else {
    $visBekreftelse = false;
    $lagret = false;
}

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type="text/css">
    <title>Bekreft endringer</title>
</head>
<body>
    <?php include "../frontend/meny.php"; ?>

    <?php if ($visBekreftelse): ?>
    <header>
        <p>Bekreft endringer for kontaktperson</p>
    </header>
    <main>
        <p style="background-color:#fff8e1; border-left-color:#f5a623;">
            Se over endringene nedenfor og klikk <strong>Bekreft og lagre</strong> for å fortsette.
        </p>

        <table>
            <thead>
                <tr>
                    <th>Felt</th>
                    <th>Gammel verdi</th>
                    <th>Ny verdi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Fornavn</strong></td>
                    <td><?php echo htmlspecialchars($gammel['kontaktpersonFornavn']); ?></td>
                    <td><?php echo htmlspecialchars($fornavn); ?></td>
                </tr>
                <tr>
                    <td><strong>Etternavn</strong></td>
                    <td><?php echo htmlspecialchars($gammel['kontaktpersonEtternavn']); ?></td>
                    <td><?php echo htmlspecialchars($etternavn); ?></td>
                </tr>
                <tr>
                    <td><strong>Telefon</strong></td>
                    <td><?php echo htmlspecialchars($gammel['kontaktpersonTlf']); ?></td>
                    <td><?php echo htmlspecialchars($tlf); ?></td>
                </tr>
                <tr>
                    <td><strong>E-post</strong></td>
                    <td><?php echo htmlspecialchars($gammel['kontaktpersonEpost']); ?></td>
                    <td><?php echo htmlspecialchars($epost); ?></td>
                </tr>
                <tr>
                    <td><strong>Status</strong></td>
                    <td><?php echo htmlspecialchars($gammel['kontaktpersonStatus']); ?></td>
                    <td><?php echo htmlspecialchars($status); ?></td>
                </tr>
            </tbody>
        </table>

        <br>
        <form action="contact_update_bekreft.php" method="get" style="display:inline;">
            <input type="hidden" name="idkontaktperson"  value="<?php echo htmlspecialchars($idkontaktperson); ?>">
            <input type="hidden" name="fornavn"          value="<?php echo htmlspecialchars($fornavn); ?>">
            <input type="hidden" name="etternavn"        value="<?php echo htmlspecialchars($etternavn); ?>">
            <input type="hidden" name="tlf"              value="<?php echo htmlspecialchars($tlf); ?>">
            <input type="hidden" name="epost"            value="<?php echo htmlspecialchars($epost); ?>">
            <input type="hidden" name="status"           value="<?php echo htmlspecialchars($status); ?>">
            <input type="submit" name="bekreft_oppdater" value="✅ Bekreft og lagre">
        </form>
        &nbsp;&nbsp;
        <a id="std_link" href="contact_update.php?idkontaktperson=<?php echo htmlspecialchars($idkontaktperson); ?>">← Gå tilbake og endre</a>
    </main>

    <?php else: ?>
    <header>
        <p>Rediger kontaktperson</p>
    </header>
    <main>
        <?php if ($lagret): ?>
            <p>Kontaktpersonen er oppdatert.</p>
        <?php else: ?>
            <p style="background-color:#fde8e8; border-left-color:#e05c5c;">❌ Det skjedde en feil – kontaktpersonen kunne ikke oppdateres.</p>
        <?php endif; ?>
        <a id="std_link" href="../frontend/les_kontakt.php">← Tilbake til kontaktlisten</a>
    </main>
    <?php endif; ?>

</body>
</html>