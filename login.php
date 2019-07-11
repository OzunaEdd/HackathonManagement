<?php
session_start();
$dbc = mysqli_connect("localhost", "root", "", "csc350") or die(mysql_error()); //connect to server
if ($dbc) {
  $userName = $_REQUEST['username'];
  $passWord = $_REQUEST['passw'];
  $encrypt = hash('md5',$passWord);
  $q = "SELECT * FROM admin WHERE username='$userName' AND passw='$encrypt'";
  $result = mysqli_query($dbc,$q);
  $row = mysqli_num_rows($result);
  $error = "Invalid username or password";
  if($row > 0){
    $_SESSION['username'] = $userName;
    $_SESSION['valid'] = true;
    mysqli_query($dbc,$login);
    header("Location: dashboard.php");
  }else{
    $_SESSION['error'] = $error;
    header("Location: index.php");
  }
}
?>
