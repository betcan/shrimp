<?php
mysql_connect("localhost","root","password") or die(mysql_error("tengu un grosse dase"))
mysql_select_db("te2l") or die("hitta inte databasen")
$output = '';

//capri diem

if isset($_POST['search'])) {
    $searchq = $_POST ['search'];
    $searchq = preg_replace("#[^-9a-z]#i","",$searchq);

    $query = mysql_query("SELECT * FROM members WHERE firstname LIKE '%$searchq%' OR lastname ''%$searchq%") or die("hitta inte din sökning");
    $count = mysql_num_rows($query);
    if($count == 0){
        $output = 'inga sökresultat';
    }else {
        while($row = mysql_fetch_array($query))   {
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $id = $row['id'];

            $output .= '<div>' '.$fname.' '.$lname.' '<div>';
        }

    }

}



?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset=""/>
    <title>search</title>

</head>
<body>

<form action="index.php" method="post">
    <input type="text" name="search" placeholder="sök här hora"/>
    <input type="sumbit" value="fresh"/>


</form>
</body>
</html>