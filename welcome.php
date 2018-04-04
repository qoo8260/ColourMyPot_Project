

<html>
<body>
<?php 
    session_start();
if($_SESSION['login'] != "yes")
{
         header("Location: http://localhost/login.php");
}
echo "welcome : ".$_SESSION['login_user'];

?>
    <a href="logoff.php">log off</a>

    </body>
</html>
