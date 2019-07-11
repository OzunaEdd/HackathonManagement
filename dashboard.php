<?php
session_start();
$dbc = mysqli_connect("localhost", "root", "", "csc350") or die(mysql_error()); //connect to server
$data = "SELECT * FROM participants";
$result = mysqli_query($dbc,$data);
$part_count = mysqli_num_rows($result);

$data = "SELECT * FROM judges";
$result = mysqli_query($dbc,$data);
$judge_count = mysqli_num_rows($result);

$data = "SELECT * FROM teams";
$result = mysqli_query($dbc,$data);
$teams_count = mysqli_num_rows($result);

$data = "SELECT contribution FROM sponsors";
$result = mysqli_query($dbc,$data);
$budget_count = mysqli_fetch_assoc($result);
$totalBudget = 0;
do {
  $totalBudget += (int)$budget_count['contribution'];
}while($budget_count= mysqli_fetch_assoc($result));


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

  <title>Dashboard</title>
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
          <li><a class="active" href="dashboard.php">Dashboard</a></li>
          <li><a href="sponsors.php">Sponsors</a></li>
          <li><a href="order.php">Order</a></li>
          <?php
          if($userName == "admin")
          echo "<li><a href='participants.php'>Participants</a></li>";
          ?>
          <li><a href="logout.php">Sign Out</a></li>

        </ul>
    </nav>
<div class="container-fluid col-md-9 float-sm-right">
    <h1 class="m-header animated fadeIn text-center">D a s h b o a r d</h1>
    <br>
      <table>
      <tr>
          <td>
            <div>
                <button id="button" type="button" class="badge badge-pill badgeImg" onclick="location.href = 'participants.php';">Participants
                <span class="badge badge-light"><?php echo $part_count; ?></span>
                </button>
            </div>
          </td>
          <td>
            <div>
                <button id="button" type="button" class="badge badge-pill badgeImg">Teams
                <span class="badge badge-light"><?php echo $teams_count; ?></span>
                </button>
            </div>
          </td>
          <td>
            <div>
                <button id="button" type="button" class="badge badge-pill badgeImg">Judges
                <span class="badge badge-light"><?php echo $judge_count; ?></span>
                </button>
            </div>
          </td>
          <td>
            <div>
                <button id="button" type="button" class="badge badge-pill badgeImg">Budget
                <span class="badge badge-light"><?php echo "$$totalBudget"; ?></span>
                </button>
            </div>
          </td>
        </tr>
      </table>
    <div class="accordion" id="accordionExample">
        <br><br>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    General Information
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <form action="" method="post">
                        <p id="centered">Hi <?php echo "$userName"; ?>, you can edit your hackathon information here.</p><br>
                        Name<br> <input type="text" name="Name" placeholder="Hackathon Name"><br><br>
                        Location<br> <input type="text" name="Location" placeholder="Hackathon Location"><br><br>
                        Date<br> <input type="date" id="start" name="Date" value="yyyy-mm-dd" min="2019-01-01" max="2020-12-31">
                        <br><br>
                        Time<br> <input type="time" name="Time" value="hh:mm:ss"><br><br>
                        Brief description<br> <textarea class="form-control input-lg" id="inputlg" type="text"  name="Description"></textarea><br>
                        <br>
                        <p id="centered">Contact information here.</p>
                        Phone number<br> <input type="phone" id="start" name="Phone" placeholder="123 123 1234">
                        <br><br>
                        Email<br> <input type="email" name="Email" placeholder="example@yahoo.com"><br><br>

                        <input type="submit" name="submit" value="Send">
                        <?php
                        if (isset($_POST['submit'])){
                        $dbc = mysqli_connect("localhost", "root", "", "csc350") or die(mysql_error()); //connect to server
                        $name = $_REQUEST['Name'];
                        $location = $_REQUEST['Location'];
                        $date = $_REQUEST['Date'];
                        $converted_date = date("F j, Y", strtotime($date));
                        $time = $_REQUEST['Time'];
                        $converted_time = date("h:i A", strtotime($time));
                        $description = $_REQUEST['Description'];
                        $email = $_REQUEST['Email'];
                        $phone = $_REQUEST['Phone'];
                        $data = "SELECT name From HackathonInfo";
                        if ($dbc) {
                          $result = mysqli_query($dbc,$data);
                          $row = mysqli_num_rows($result);
                            if($row <= 0){
                              $info = "INSERT INTO HackathonInfo (name,location,dates,times,description,email,phone_number) VALUES('$name','$location','$converted_date','$converted_time','$description','$email','$phone')";
                            }else{
                            $data = mysqli_fetch_object($result);
                            $info = "UPDATE HackathonInfo SET name = COALESCE(NULLIF('$name',''), name),location = COALESCE(NULLIF('$location',''), location),
                              dates = COALESCE(NULLIF('$converted_date',''), dates),times = COALESCE(NULLIF('$converted_time',''), times),description = COALESCE(NULLIF('$description',''), description),email = COALESCE(NULLIF('$email',''), email),phone_number = COALESCE(NULLIF('$phone',''), phone_number)
                             where name = '$data->name'";
                          }
                          if(mysqli_query($dbc,$info)){
                            echo '<p>Successful Updated</p>';
                          }else{
                            echo '<p>Failed</p>' . mysqli_error($dbc);
                          }
                        }


                      }
                        ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Orders
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                Your order has been ......
              </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Sponsors
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <p id="centered">
                    Those are a few sponsors available for you
                    </p>
                    <div class="container">
                      <div class="row">
                        <div class="col-sm">
                          <img class="sponsor_logo" src="img/google.png">
                        </div>
                        <div class="col-sm">
                          <img class="sponsor_logo" src="img/amazon.png">
                        </div>
                        <div class="col-sm">
                          <img class="sponsor_logo" src="img/whole_foods.png">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm">
                          <img class="sponsor_logo" src="img/apple.png">
                        </div>
                        <div class="col-sm">
                          <img class="sponsor_logo" src="img/chase.png">
                        </div>
                        <div class="col-sm">
                          <img class="sponsor_logo" src="img/microsoft.png">
                        </div>
                      </div>
                    </div>
                    <br>
                    <p id="centered">
                    <a href="sponsors.php">Edit sponsor information</a>
                    </p>
                </div>
            </div>
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
