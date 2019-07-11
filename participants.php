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

  <title>Participants</title>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="animated fadeInLeft">
            <div class="sidebar-header">
                <h3><a href="dashboard.php"><img id="dashboardLogo" src="img/DemaLogo.png"></a></h3>
            </div>
            <div class="container img-p"><div class="col-md-5 px-0">
                <img src="img\user.png" class="img-fluid">
            </div>
      </div>
        <div>
          <p class="user">Welcome <?php echo"$userName";?></p>
        </div>
        <ul class="list-unstyled components">
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="sponsors.php">Sponsors</a></li>
          <li><a href="order.php">Order</a></li>
          <?php
          if($userName == "admin")
          echo "<li><a class='active' href='participants.php'>Participants</a></li>";
          ?>
          <li><a href="logout.php">Sign Out</a></li>

        </ul>
    </nav>
<div class="container-fluid col-md-9 float-sm-right">
    <h1 class="m-header animated fadeIn text-center">P a r t i c i p a n t s</h1>
    <br>
    <?php
    $dbc = mysqli_connect("localhost", "root", "", "csc350") or die(mysql_error()); //connect to server
    $q = "SELECT * FROM participants INNER JOIN teams on participants.team_id = teams.team_id";
  $result = mysqli_query($dbc,$q);
  $info = mysqli_fetch_assoc($result);
  echo "<table id='partic_table' border='1'>";
  echo "<tr>
    <th>Participants Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Major</th>
    <th>Tshirt Size</th>
    <th>Food Preference</th>
    <th>Team Name</th>
  </tr>";
  do {
  echo "<tr><td>".$info["participant_id"]."
        </td><td>".$info["participant_name"]."
        </td><td>".$info["email"]."
        </td><td>".$info["phone"]."
        </td><td>".$info["major"]."
        </td><td>".$info["tshirt_size"]."
        </td><td>".$info["food_preference"]."
        </td><td>".$info["team_name"]."
        </td></tr>";
  }while ($info = mysqli_fetch_assoc($result));
  echo "</table>";
       ?>
       <form action="" method="post">
           Participants Id<br> <input type="text" name="id" placeholder="Enter Id"><br><br>
           <input type="submit" name="submit" value="Remove">
           <?php
           if (isset($_POST['submit'])){
           $dbc = mysqli_connect("localhost", "root", "", "csc350") or die(mysql_error()); //connect to server
          $numberId = $_REQUEST['id'];
           $data = "DELETE FROM participants where participant_id = '$numberId'";
           if ($dbc) {
             if(mysqli_query($dbc,$data)){
               echo '<p>Successful Delete</p>';
                 echo "<meta http-equiv='refresh' content='0'";
             }else{
               echo '<p>Failed</p>' . mysqli_error($dbc);
             }
           }
         }
           ?>
        </form>

</div>
</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
