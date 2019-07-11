<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Register</title>
</head>

<body class="bg-color">
  <div class="container-fluid text-center">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <h1 class="header-top animated bounceInDown"><img id="dashboardLogo" src="img/DemaLogo.png"></h1>
        <div class="card card-signin my-5 bg-light animated fadeIn">
          <h2>Register</h2><br>
          <form action="" method="post">
            <div class="form-group">
              Username <input type="text" class="form-control" placeholder="Enter Username" name="user" required autofocus>
            </div>
            <div class="form-group">
              Password <input type="password" class="form-control" placeholder="Enter password" name="pswd" required>
            </div>
            <button type="submit" name="submit" class="btn btn-outline-success">Register</button><br>
            <br>
            <p>Already have an account? <a href="index.php">Sign In</a></p>
            <?php
            session_start();
            if(isset($_POST['submit'])) {
         $dbc = mysqli_connect("localhost", "root", "", "csc350") or die(mysql_error()); //connect to server
         if ($dbc) {
           $userName = $_REQUEST['user'];
           $passWord = $_REQUEST['pswd'];
           $key = "md5";
           $encrypt = hash($key,$passWord);
           $register = "INSERT INTO activity(user,type,time) VALUES('$userName','REGISTER',NOW())";
           $q = "INSERT INTO customers (id, pw) VALUES('$userName','$encrypt')";
           if(mysqli_query($dbc,$q) && mysqli_query($dbc,$register)){
             $_SESSION['username'] = $userName;
             $_SESSION['valid'] = true;
             header("Location: dashboard.php");
             echo '<p>Registration Successful</p>';
           }
         }
       } ?>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
