<?php

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
$STH = $DBH->prepare("SELECT * FROM tbl_produkter");

// Utför databasfrågan.
$STH->execute();

// Stäng dbkoppling
$DBH = null;

// Hämtar värden
$results = $STH->fetchAll();
//print_r($results);
?>

<html>
<head>
    <title>Lägg produkt i korg</title>
    <meta charset="utf-8">
</head>
<body>

Du lade till <?php echo $_POST["antal"]?> st. av produkten <?php echo $_GET["produkt_titel"]?>, med id: <?php echo $_GET["produkt_id"]?>

<a href="visa_korg.php">Visa varukorg</a>

</body>

</html>