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
    <title>Rediger kontaktperson</title>
</head>
<body>
    <?php include "../frontend/meny.php"; ?>
    <header>
        <p>Rediger kontaktperson</p>
    </header>
    <main>
        <?php if (!empty($kontakt)): ?>
        <form action="contact_update_bekreft.php" method="get">
            <input type="hidden" name="idkontaktperson" value="<?php echo htmlspecialchars($kontakt['idkontaktperson']); ?>">

            <label for="fornavn">Fornavn:</label>
            <input type="text" id="fornavn" name="fornavn" value="<?php echo htmlspecialchars($kontakt['kontaktpersonFornavn']); ?>" required>

            <label for="etternavn">Etternavn:</label>
            <input type="text" id="etternavn" name="etternavn" value="<?php echo htmlspecialchars($kontakt['kontaktpersonEtternavn']); ?>" required>

            <label for="tlf">Telefon:</label>
            <input type="text" id="tlf" name="tlf" value="<?php echo htmlspecialchars($kontakt['kontaktpersonTlf']); ?>" required>

            <label for="epost">E-post:</label>
            <input type="text" id="epost" name="epost" value="<?php echo htmlspecialchars($kontakt['kontaktpersonEpost']); ?>" required>

            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="Aktiv" <?php echo $kontakt['kontaktpersonStatus'] === 'Aktiv' ? 'selected' : ''; ?>>Aktiv</option>
                <option value="Inaktiv" <?php echo $kontakt['kontaktpersonStatus'] === 'Inaktiv' ? 'selected' : ''; ?>>Inaktiv</option>
            </select>

            <br>
            <input type="submit" name="oppdater_kontakt" value="Se over endringer →">
        </form>
        <br>
        <a id="std_link" href="../frontend/les_kontakt.php">← Avbryt</a>
        <?php else: ?>
            <p style="background-color:#fde8e8; border-left-color:#e05c5c;">Kontaktpersonen ble ikke funnet.</p>
            <a id="std_link" href="../frontend/les_kontakt.php">← Tilbake til liste</a>
        <?php endif; ?>
    </main>
</body>
</html>