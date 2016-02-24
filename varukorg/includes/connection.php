<?php


$dbhost     = "localhost";
$dbname     = "te2l";
$dbuser     = "root";
$dbpass     = "";

// connect to mysql

mysql_connect($dbhost, $dbuser, $dbpass) or die("Sorry, can't connect to the mysql.");

// select the db

mysql_select_db($dbname) or die("Sorry, can't select the database.");

?>