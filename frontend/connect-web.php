<?php

// Dette fila kobler til databasen


// Parametre for tilkobling
$host = "localhost:3306";
$brukernavn = "db_im24jak3007";
$passord = "naUoG0#uPnbzr7^4";
$database = "db_im24jak3007";

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