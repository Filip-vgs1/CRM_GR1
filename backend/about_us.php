<?php
// about_us.php
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type="text/css">
    <title>Om oss</title>

</head>
<body>
    <?php include "../frontend/meny.php"; ?>
    <header>
        <p>Om oss</p>
    </header>
    <main>

        <p class="intro-tekst">
            Dette er et <strong>CRM-system</strong> (Customer Relationship Management) utviklet som et skoleprosjekt.
            Systemet er laget for å holde oversikt over firmaer og kontaktpersoner på en enkel og ryddig måte.
        </p>

        <h2 class="seksjon-tittel">Hva systemet gjør</h2>
        <div class="om-grid">
            <div class="om-kort">
                <h2>Firmaer</h2>
                <p>Registrer, rediger og slett firmaer. Hver firma har navn, organisasjonsnummer, adresse, telefon og status.</p>
            </div>
            <div class="om-kort">
                <h2>Kontaktpersoner</h2>
                <p>Koble kontaktpersoner til firmaer. Lagre navn, e-post, telefon og status for hver kontakt.</p>
            </div>
            <div class="om-kort">
                <h2>Oversiktslister</h2>
                <p>Se alle firmaer og kontaktpersoner samlet i tabeller med mulighet for redigering og sletting direkte fra listen.</p>
            </div>
            <div class="om-kort">
                <h2>Bekreftelse ved endringer</h2>
                <p>Alle endringer og slettinger krever en bekreftelse før de lagres, slik at feil ikke skjer ved uhell.</p>
            </div>
        </div>

        <h2 class="seksjon-tittel">Teknologi</h2>
        <div class="om-grid">
            <div class="om-kort">
                <h2>Backend</h2>
                <p>PHP med PDO for sikker databasekommunikasjon. Alle spørringer bruker prepared statements.</p>
            </div>
            <div class="om-kort">
                <h2>Database</h2>
                <p>MySQL med to tabeller: <em>firma</em> og <em>kontaktperson</em>, koblet med fremmednøkkel.</p>
            </div>
            <div class="om-kort">
                <h2>Frontend</h2>
                <p>HTML og CSS med egendefinerte variabler for farger og stiler. Responsivt og ryddig design.</p>
            </div>
            <div class="om-kort">
                <h2>Sikkerhet</h2>
                <p>All brukerdata renses med <code>htmlspecialchars()</code> før visning for å hindre XSS-angrep.</p>
            </div>
        </div>

        <h2 class="seksjon-tittel">Gruppen</h2>
        <p class="intro-tekst">
            Prosjektet er utviklet av gruppe 1 som en del av IT-faget på videregående skole.
        </p>
        <ul class="gruppe-liste">
            <li>Gruppe 1</li>
            <li>Informasjonsteknologi</li>
            <li>VG2</li>
        </ul>

    </main>
</body>
</html>