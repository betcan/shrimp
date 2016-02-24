
<?php
/**
 * Created by PhpStorm.
 * User: michaelranstrand
 * Date: 15-01-12
 * Time: 13:48
 */
session_start();
?>

<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Lägg produkt i korg</title>
    <meta charset="utf-8">
</head>
<body>



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
// Loopa igenom produkter i varukorg
foreach ($_SESSION["cart"] as $product){
// Förbered databasfråga med placeholders (markerade med : i början)
    $STH = $DBH->prepare("SELECT * FROM tbl_produkter WHERE id = :id");
//Ersätt placeholders med värden från variabler
    $STH->bindParam(':id', $produkt["produkt_id"]);
//Utför frågan
    $STH->execute();
//Tar emot värden
    $row = $STH->fetch();
    ?>
    <?php echo $row["titel"]; ?>
Pris: <?php echo $row["pris"]; ?> kr.
    Antal: <?php echo $product["antal"]; ?> kr.
    </br></br>

<?php
}
//Stänger databaskopplingen
$DBH = null;
?>

<a href="../produkt/produktlista.php">Visa varulista</a>
<a href="checka_ut.php">Genomför köp.</a>
</body>

</html>
