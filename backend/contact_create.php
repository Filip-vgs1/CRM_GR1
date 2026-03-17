<?php
// Include database connection if needed for dynamic content (e.g., firma dropdown)
// include "../frontend/connect.php";
?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/style.css" type="text/css">
    <title>Legg til kontaktperson</title>
</head>
<body>
    <?php include "../frontend/meny.php"; ?>
    <header>
        <h1>Legge til kontaktperson</h1>
    </header>
    <main>
        <form action="contact_create_bekreft.php" method="post">
            <section>
                <label for="firma_idfirma">Firma ID:</label><br>
                <input type="text" id="firma_idfirma" name="firma_idfirma" required><br><br>
            </section>
            <section>
                <label for="kontaktpersonEtternavn">Etternavn:</label><br>
                <input type="text" id="kontaktpersonEtternavn" name="kontaktpersonEtternavn" required><br><br>
            </section>
            <section>
                <label for="kontaktpersonFornavn">Fornavn:</label><br>
                <input type="text" id="kontaktpersonFornavn" name="kontaktpersonFornavn" required><br><br>
            </section>
            <section>
                <label for="kontaktpersonTlf">Telefon:</label><br>
                <input type="text" id="kontaktpersonTlf" name="kontaktpersonTlf" required><br><br>
            </section>
            <section>
                <label for="kontaktpersonEpost">E-post:</label><br>
                <input type="email" id="kontaktpersonEpost" name="kontaktpersonEpost" required><br><br>
            </section>
            <section>
                <label for="kontaktpersonDatoLagtTil">Dato lagt til:</label><br>
                <input type="date" id="kontaktpersonDatoLagtTil" name="kontaktpersonDatoLagtTil" required><br><br>
            </section>
            <input type="submit" name="ny_contact" value="Registrer kontaktperson">
        </form>
    </main>
</body>
</html>