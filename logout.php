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
    $dbc = mysqli_connect("m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "ew33q2sqesuu10bz", "u7uhn2d28ofq7vn8", "c0a4ao6srswkd8yd") or die(mysql_error()); //connect to server
    $logout = "INSERT INTO activity(user,type,time) VALUES('$userName','LOG OUT',NOW())";
    mysqli_query($dbc,$logout);
    header("Location: index.php");
    session_destroy();
    ?>
  </body>
</html>
