<?php

//Ta emot id för den produkt som skall visas
$produktid = $_GET["produktid"];

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
$STH = $DBH->prepare("SELECT * FROM tbl_produkter WHERE id = :id");

// Koppla placeholder med ett variabelvärde.
$STH->bindParam(":id", $produktid);

// Utför databasfrågan.
$STH->execute();

// Stäng dbkoppling
$DBH = null;

// Hämtar värden
$result = $STH->fetch();

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1><?php echo $result["titel"];?> </h1><br>
<br>
    <?php echo $result["beskrivning"];?><br>
    <br>
    <br>
    <img src="<?php echo $result["bildfil"];?>" width="100" height="100">
    <br>
    Ingredienser: <?php echo $result["ingredienser"];?>
    <br>
    Recept: <?php echo $result["recept"];?>
</body>
</html>