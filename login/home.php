<?php
session_start();
include_once '../db/connect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Välkommen - <?php echo $userRow['user_email']; ?></title>

<div id="header">
	<div id="left">

    </div>
    <div id="right">
    	<div id="content">
        	Hej <?php echo $userRow['user_name']; ?>&nbsp;<a href="logout.php?logout">Logga Out</a>
        </div>
    </div>
</div>



</body>
</html>