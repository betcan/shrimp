<?php

//Ta emot värden för registrering
$titel = $_POST["titel"];
$beskrivning = $_POST["beskrivning"];
$ingredienser = $_POST["ingredienser"];
$bildfil = $_POST["bildfil"];
$recept = $_POST["recept"];

//Variabler för databaskoppling
$dbhost     = "localhost";
$dbname     = "te2l";
$dbuser     = "root";
$dbpass     = "";

//Koppla till databasen
$DBH = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

// Välj felhantering (här felsökningsläge)
$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

// Förbered databasfråga med placeholders (markerade med : i början)
$STH = $DBH->prepare("INSERT INTO tbl_produkter
(titel, beskrivning, bildfil, ingredienser,recept) VALUES
(:titel, :beskrivning, :bildfil, :ingredienser, :recept)");

// Koppla placeholder med ett variabelvärde.
$STH->bindParam(":titel", $titel);
$STH->bindParam(":beskrivning", $beskrivning);
$STH->bindParam(":ingredienser", $ingredienser);
$STH->bindParam(":bildfil", $bildfil);
$STH->bindParam(":recept", $recept);
// Utför databasfrågan.
$STH->execute();

// Stäng dbkoppling
$DBH = null;

?>
