<?php
$dbc = mysqli_connect("localhost", "root", "", "csc350") or die(mysql_error()); //connect to server
$data = "SELECT * FROM HackathonInfo";
$result = mysqli_query($dbc,$data);
$info = mysqli_fetch_assoc($result);

$images = "SELECT img_dir FROM sponsors";
$r = mysqli_query($dbc,$images);

$i = mysqli_fetch_assoc($r);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/landingP.css">
  <title><?php echo $info['name'];?></title>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <section id="home" class="home">
    <div class="bg-color" , style="min-height: 650px">
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">


        <div class=" collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">ABOUT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sponsors">SPONSORS </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">CONTACT</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="home-info">
            <div class="home-logo text-center">
              <h1 class="white"><?php echo $info['name'];?></h1>
            </div>
            <div class="home-text text-center">
              <h1 class="white"><?php echo $info['dates'];?><br /><?php echo $info['times'];?></h1>
            </div>
            <div class="col-md-12 center-block">
              <div class="banner-text text-center">
                <a href="application.php" class="btn btn-lg btn-appoint">Register!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="about" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-10">
          <h2 class="ser-title">About</h2>
          <p><?php echo $info['description'];?></p>
        </div>

      </div>
    </div>
  </section>
  <section id="sponsors" class="section-padding cta-2">
    <div class="container">
      <div class="row">
        <h2 class="ser-title">Sponsors</h2>
        <div class="col-md-12 col-sm-8 col-xs-12">
          <div class="col-sm-9 more-features-box">


          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-title">
            <div class="row ml-5 pl-5">
            <?php
                  do {
                    echo "<div class='col-sm'><img src='img/" . $i['img_dir'] . "'" . "alt='a' height='200px' width='200px'></div>";
                  }while($i = mysqli_fetch_assoc($r)) ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-10">
          <h2 class="ser-title">Contact</h2>
        <p>Email: <?php echo $info['email']; ?></p>
        <p>Phone: <?php echo $info['phone_number']; ?></p>
        </div>
      </div>
    </div>
  </section>
  <footer class="page-footer font-small blue">

    <div>
      <div class="f-icon">



      </div>
      <div class="footer-copyright text-center py-3 white">
        <a href="#"> <img src='img/facebookIcon.svg' alt="Profile Picture" class="img-responsive img-rounded" style="max-height: 70px; max-width: 70px;"></a>

        © 2019 Copyright:
        <a href="#"><?php echo $info['name']?></a>
        <a href="#"><img src='img/instagramIcon.svg' alt="Profile Picture" class="img-responsive img-rounded" style="max-height: 70px; max-width: 70px;"></a>
      </div>
    </div>


  </footer>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
