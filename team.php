<?php
session_start();
$userName = $_SESSION['username'];
$valid = $_SESSION['valid'];

    if(!$valid){
      header("Location: index.php");
    }
?>
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

  <title>Teams</title>
</head>
<body>
<div class="wrapper col-md-3">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><a href="dashboard.php"><img id="dashboardLogo" src="img/DemaLogo.png"></a></h3>
        </div>
        <div class="container img-p"><div class="col-md-5 px-0">
          <img src="img\user.png" class="img-fluid">
      </div>
      </div>
        <div class="">
          <p class="user">Welcome <?php echo"$userName";?></p>
        </div>
        <ul class="list-unstyled components">
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="application.php">Application</a></li>
          <li><a class="active" href="team.php">Team</a></li>
          <?php
          if($userName == "admin")
          echo "<li><a href='participants.php'>Participants</a></li>";
          ?>
          <li><a href="logout.php">Sign Out</a></li>

        </ul>

    </nav>
  </div>
  <div class="container-fluid col-md-9 float-sm-right">
    <h1 class="m-header  animated fadeIn text-center">T e a m</h1>

  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
