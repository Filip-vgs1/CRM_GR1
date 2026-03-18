<?php

include "./frontend/connect.php";

$stmtFirma = $pdo->query("SELECT COUNT(*) AS total, SUM(firmaStatus='Aktiv') AS aktive FROM firma");
$firmaData = $stmtFirma->fetch(PDO::FETCH_ASSOC);

$stmtKontakt = $pdo->query("SELECT COUNT(*) AS total, SUM(kontaktpersonStatus='Aktiv') AS aktive FROM kontaktperson");
$kontaktData = $stmtKontakt->fetch(PDO::FETCH_ASSOC);

$stmtSiste = $pdo->query("SELECT firmaNavn, firmaStatus FROM firma ORDER BY idfirma DESC LIMIT 5");
$sisteFirmaer = $stmtSiste->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="no">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="./frontend/style.css">

<title>CRM – Oversikt</title>

</head>

<body>

<nav>
        <ul>
            <li><a href="index.php">Hjem</a></li>
            <li><a href="frontend/les_kontakt.php">Liste over kontakter</a></li>
            <li><a href="frontend/les_custumer.php">Liste over kunder</a></li>
            <li><a href="backend/contact_create.php">Legg Til Kontaktperson</a></li>
            <li><a href="backend/customer_create.php">Legg Til Kunde</a></li>
        </ul>
</nav>

<header>
<p>Velkommen til CRM-systemet</p>
</header>

<main>


<h2 class="seksjon-tittel">Oversikt</h2>

<div class="dashboard-grid">

<div class="stat-kort">
    <span class="tall"><?php echo $firmaData['total']; ?></span>
    <span class="under-tall">Firmaer totalt</span>
    <span class="aktiv-linje">&#10003; <?php echo $firmaData['aktive']; ?> aktive</span>
</div>

<div class="stat-kort">
    <span class="tall"><?php echo $kontaktData['total']; ?></span>
    <span class="under-tall">Kontaktpersoner totalt</span>
    <span class="aktiv-linje">&#10003; <?php echo $kontaktData['aktive']; ?> aktive</span>
</div>

<div class="stat-kort">
    <span class="tall"><?php echo $firmaData['total'] - $firmaData['aktive']; ?></span>
    <span class="under-tall">Inaktive firmaer</span>
</div>

<div class="stat-kort">
    <span class="tall"><?php echo $kontaktData['total'] - $kontaktData['aktive']; ?></span>
    <span class="under-tall">Inaktive kontakter</span>
</div>

</div>



<h2 class="seksjon-tittel">Sist registrerte firmaer</h2>

<table class="siste-tabell">

<thead>
<tr>
<th>Navn</th>
<th>Status</th>
</tr>
</thead>

<tbody>

<?php foreach ($sisteFirmaer as $f): ?>

<tr>

<td>
<?php echo htmlspecialchars($f['firmaNavn']); ?>
</td>

<td>
    <span class="badge <?php echo strtolower($f['firmaStatus']); ?>">
<?php echo htmlspecialchars($f['firmaStatus']); ?>
</span>
</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</main>

</body>
</html>