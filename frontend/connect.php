<?php

// Dette fila kobler til databasen


// Parametre for tilkobling
$host = "localhost";
$brukernavn = "root";
$passord = "";
$database = "crm_gr1";

// Sett opp forbindelsen med try ... catch
try 
{
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $brukernavn, $passord);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch (PDOException $e) 
{
    die("oppkobling til databasen feilet: " . $e->getMessage() . "</br>");
}