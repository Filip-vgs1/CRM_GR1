<?php

// henter oppkobling til databasen 

include "connect.php";

// Prosedyre for å lese fra databasen 
$sql = "SELECT * FROM firma";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$firmaer = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firmaer</title>
    <link rel="stylesheet" href="../frontend/style.css" type ="text/css">
</head>
<body>
<?php include "meny.php"; ?>
    <header>
        <p>Vis alle firmaer</p>
    </header>
    <main>
        <table>
            <thead>
                <th>idfirma</th>
                <th>firmaStatus</th>
                <th>firmaOrganisasjonsnummer</th>
                <th>firmaNavn</th>
                <th>firmaAdresse</th>
                <th>firmaTlf</th>
                <th>firmaDatoLagtTil</th>
                <th>firmaPostnr</th>
                <th>Rediger</th>
                <th>slett</th>

            </thead>
            <tbody>
                <?php foreach ($firmaer as $firma)
                { ?>
                <tr>
                <td><?php echo htmlspecialchars($firma['idfirma']) ?></td>
                <td><?php echo htmlspecialchars($firma['firmaStatus']) ?></td>
                <td><?php echo htmlspecialchars($firma['firmaOrganisasjonsnummer']) ?></td>
                <td><?php echo htmlspecialchars($firma['firmaNavn']) ?></td>
                <td><?php echo htmlspecialchars($firma['firmaAdresse']) ?></td>
                <td><?php echo htmlspecialchars($firma['firmaTlf']) ?></td>
                <td><?php echo htmlspecialchars($firma['firmaKundeSiden']) ?></td>
                <td><?php echo htmlspecialchars($firma['firmaPostnr']) ?></td>
                <td><a href="rediger_firma.php?idfirma=<?php echo htmlspecialchars($firma['idfirma']) ?>">Rediger</a></td>
                <td><a id="slett" href="slett_firma.php?idfirma=<?php echo htmlspecialchars($firma['idfirma']) ?>">Slett</a></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </main>
</body>
</html>
