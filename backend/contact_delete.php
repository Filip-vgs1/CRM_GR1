<?php

include "../frontend/connect.php";

if (isset($_GET['idkontaktperson']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $idkontaktperson = $_GET['idkontaktperson'];

    $sql = "SELECT * FROM kontaktperson WHERE idkontaktperson = :idkontaktperson";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idkontaktperson', $idkontaktperson);
    $stmt->execute();
    $kontakt = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type="text/css">
    <title>Slett kontakt</title>
</head>
<body>
    <?php include "../frontend/meny.php"; ?>
    <header>
        <p>Bekreft sletting av kontaktperson</p>
    </header>
    <main>
        <?php if (!empty($kontakt)): ?>
            <p style="background-color:#fde8e8; border-left-color:#e05c5c;">
                Er du sikker på at du vil slette <strong><?php echo htmlspecialchars($kontakt['kontaktpersonFornavn'] . ' ' . $kontakt['kontaktpersonEtternavn']); ?></strong>? Dette kan ikke angres.
            </p>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fornavn</th>
                        <th>Etternavn</th>
                        <th>Telefon</th>
                        <th>E-post</th>
                        <th>Dato lagt til</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($kontakt['idkontaktperson']); ?></td>
                        <td><?php echo htmlspecialchars($kontakt['kontaktpersonFornavn']); ?></td>
                        <td><?php echo htmlspecialchars($kontakt['kontaktpersonEtternavn']); ?></td>
                        <td><?php echo htmlspecialchars($kontakt['kontaktpersonTlf']); ?></td>
                        <td><?php echo htmlspecialchars($kontakt['kontaktpersonEpost']); ?></td>
                        <td><?php echo htmlspecialchars($kontakt['kontaktpersonDatoLagtTil']); ?></td>
                    </tr>
                </tbody>
            </table>

            <br>
            <form action="contact_delete_bekreft.php" method="get" style="display:inline;">
                <input type="hidden" name="idkontaktperson" value="<?php echo htmlspecialchars($kontakt['idkontaktperson']); ?>">
                <input type="submit" name="slett_kontakt" id="slett" value="Slett kontakt">
            </form>
            &nbsp;&nbsp;
            <a id="std_link" href="../frontend/les_kontakt.php">Avbryt</a>

        <?php else: ?>
            <p style="background-color:#fde8e8; border-left-color:#e05c5c;">Kontaktpersonen ble ikke funnet.</p>
            <a id="std_link" href="../frontend/les_kontakt.php">Tilbake til liste</a>
        <?php endif; ?>
    </main>
</body>
</html>