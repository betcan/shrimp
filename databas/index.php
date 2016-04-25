<html>
<meta charset="utf-8">
<link href="../css/main.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="banner">
    <a href="#"><h6>Mormors kokbok</h6> </a>
</div>
<center>
    <div class="meny">
        <nav>
            <ul>
                <li><a href="../index.php">Startsida</a>
                </li>

                <li><a href="../databas/index.php">Recept</a>
                </li>

                <li><a href="../varukorg/index.php">Min kyl</a>
                </li>
</body>
</html>

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

<!DOCTYPE html>
<html>
<div class="boxar">
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
    foreach($results as $product){
        ?>
        <a href="produkt.php?produktid=<?php echo $product["id"]; ?>">
            <img src="<?php echo $product["bildfil"]?>" height="50" width="50">
            <?php echo $product["titel"]; ?></a><br>
        <?php
    }
?>

</div>
</body>
</html>