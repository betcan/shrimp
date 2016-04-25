<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <link href="css/main.css" rel="stylesheet" type="text/css">

</head>

<body>
<div class="banner">
    <a href="#"><h6>Mormors kokbok</h6> </a>
</div>
<center>
    <div class="meny">
        <nav>
            <ul>
                <li><a href="index.php">Startsida</a>
                </li>

                <li><a href="databas/index.php">Recept</a>
                </li>

                <li><a href="varukorg/index.php">Min kyl</a>
                </li>
                <?php
                session_start();
                include_once 'db/connect.php';

                if(!isset($_SESSION['user']))
                {
                    header("Location: login/index.php");
                }
                $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
                $userRow=mysql_fetch_array($res);
                ?>
                <?php
                if(isset($_POST['btn-login']))
                {
                $email = mysql_real_escape_string($_POST['email']);
                $upass = mysql_real_escape_string($_POST['pass']);

                $email = trim($email);
                $upass = trim($upass);

                $res=mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
                $row=mysql_fetch_array($res);

                $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row

                if($count == 1 && $row['user_pass']==md5($upass))
                {
                $_SESSION['user'] = $row['user_id'];
                header("Location: index.php");
                }
                else
                {
                ?>
                <script>alert('Fel användarnamn eller lösenord!');</script>
                <?php
                }

                }
                ?>
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>

                    <title>Welcome - <?php echo $userRow['user_email']; ?></title>

                    <div id="header">
                        <div id="left">

                        </div>

                            <div class="login">
                                hi <?php echo $userRow['user_name']; ?>&nbsp;<a class="loggout" href="login/logout.php?logout">Sign Out</a>

                        </div>
                    </div>





            </ul>
        </nav>
</center>
<center>
    <div class="search">
        <form action="http://www.recept.nu" method="">
            <input type="text" name="search" placeholder="Enter Keyword" />
            <input type="submit" value="Search" />
            <div class="box">

            </div>

        </form>
    </div>
</center>
<div class="fak">
    <img src="img/kycklingburgare-med-currymayo-och-bacon.jpg">
    <img src="img/stekt-tofu-med-gronsaker-och-kall-ortagardssas.jpg">
    <img src="img/saffrans-och-konjakszabaione.jpg">
    <img src="img/fiskgratang-med-rakor-2.jpg">
</div>

<footer>


</footer>

</body>

</html>

