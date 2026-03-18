<?php

//Henter oppkoblingen til databasen
include '../frontend/connect.php';

if (isset($_GET['idfirma']) && ($_SERVER['REQUEST_METHOD'] == 'GET')) {
    $idfirma  =   $_GET['idfirma'];
    
    //ser om idfirma finnes fra før
    $sql = "SELECT * FROM firma WHERE idfirma = :idfirma";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":idfirma",$idfirma);
    $stmt->execute();

    $firma = $stmt->fetch(PDO::FETCH_ASSOC);
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type="text/css">
    <title>Rediger et firma</title>
</head>
<body>
    <section>
        <?php include '..\frontend\meny.php'; ?>
    </section>
    <header>
        <p>Rediger et firma</p>
    </header>
    <main>
        <form action="customer_delete_bekreft.php" method="GET">

            <input type="submit" id="slett_firma" value="Slett">
            
            <section>
                <label for="idfirma">Id Firma</label><br>
                <input type="text" name="idfirma" value="<?php echo htmlspecialchars($firma['idfirma']); ?>" readonly>
            </section>
            <section>
                <label for="firmaOrganisasjonsnummer">Organisasjonsnummer</label><br>
                <input type="text" name="firmaOrganisasjonsnummer" id="firmaOrganisasjonsnummer" value="<?php echo htmlspecialchars($firma['firmaOrganisasjonsnummer']); ?>" required>
            </section>
            <section>
                <label for="firmaNavn">Navn</label><br>
                <input type="text" name="firmaNavn" id="firmaNavn" value="<?php echo htmlspecialchars($firma['firmaNavn']); ?>" required>
            </section>
            <section>
                <label for="firmaStatus">Status</label><br>
                <input type="text" name="firmaStatus" id="firmaStatus" value="<?php echo htmlspecialchars($firma['firmaStatus']); ?>" required>
            </section>
            <section>
                <label for="firmaAdresse">Adresse</label><br>
                <input type="text" name="firmaAdresse" id="firmaAdresse" value="<?php echo htmlspecialchars($firma['firmaAdresse']); ?>">
            </section>
            <section>
                <label for="firmaPostnr">Post nummber</label><br>
                <input type="text" name="firmaPostnr" id="firmaPostnr" value="<?php echo htmlspecialchars($firma['firmaPostnr']); ?>">
            </section>
            <section>
                <label for="firmaTlf">Telefonnummer</label><br>
                <input type="text" name="firmaTlf" id="firmaTlf" value="<?php echo htmlspecialchars($firma['firmaTlf']); ?>">
            </section>
            <section>
                <label for="firmaKundeSiden">Kunde siden</label><br>
                <input type="date" name="firmaKundeSiden" id="firmaKundeSiden" value="<?php echo htmlspecialchars($firma['firmaKundeSiden']); ?>">
            </section>
    
            <input type="hidden" name="slett_firma" value="1">
            <input type="submit" id="slett_firma" value="Slett">
        </form> 
    </main>
    
</body>
</html>