<?php

// henter oppkobling til databasen 

include "connect.php";

// Prosedyre for å lese fra databasen 
$sql = "SELECT * FROM kontaktperson";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$kontakter = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakter</title>
    <link rel="stylesheet" href="style.css" type ="text/css">
</head>
<body>
<?php include "meny.php"; ?>
    <header>
        <p>Vis alle kontakter</p>
    </header>
    <main>
        <table>
            <thead>
                <th>ID</th>
                <th>Fornavn</th>
                <th>Etternavn</th>
                <th>Telefon</th>
                <th>E-post</th>
                <th>Dato lagt til</th>
                <th>Rediger</th>
                <th>slett</th>

            </thead>
            <tbody>
                <?php foreach ($kontakter as $kontakt)
                { ?>
                <tr>
                <td><?php echo htmlspecialchars($kontakt['idkontakt']) ?></td>
                <td><?php echo htmlspecialchars($kontakt['kontaktpersonFornavn']) ?></td>
                <td><?php echo htmlspecialchars($kontakt['kontaktpersonEtternavn']) ?></td>
                <td><?php echo htmlspecialchars($kontakt['kontaktpersonTlf']) ?></td>
                <td><?php echo htmlspecialchars($kontakt['kontaktpersonEpost']) ?></td>
                <td><?php echo htmlspecialchars($kontakt['kontaktpersonDatoLagtTil']) ?></td>
                <td><a href="rediger_kontakt.php?idkontakt=<?php echo htmlspecialchars($kontakt['idkontakt']) ?>">Rediger</a></td>
                <td><a id="slett" href="slett_kontakt.php?idkontakt=<?php echo htmlspecialchars($kontakt['idkontakt']) ?>">Slett</a></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </main>
</body>
</html>