<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $userName = $_SESSION['username'];
    $dbc = mysqli_connect("localhost", "root", "", "csc350") or die(mysql_error()); //connect to server
    $logout = "INSERT INTO activity(user,type,time) VALUES('$userName','LOG OUT',NOW())";
    mysqli_query($dbc,$logout);
    header("Location: index.php");
    session_destroy();
    ?>
  </body>
</html>
