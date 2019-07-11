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

  <title>Sponsors</title>
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
          <li><a class="active" href="sponsors.php">Sponsors</a></li>
          <li><a href="order.php">Order</a></li>
          <?php
          if($userName == "admin")
          echo "<li><a href='participants.php'>Participants</a></li>";
          ?>
          <li><a href="logout.php">Sign Out</a></li>

        </ul>
    </nav>
<div class="container-fluid col-md-9 float-sm-right">
    <h1 class="m-header animated fadeIn text-center">S p o n s o r s</h1>
    <br>

    <form class="needs-validation" novalidate method="POST" action="" enctype="multipart/form-data">

  	<div class="form-group">
  		<label for="full_name_id" class="control-label">Sponsor's Name</label>
  		<input type="text" class="form-control" id="full_name" name="spons_name" placeholder="Sponsor name" required>
  	</div>

  	<div class="form-group">
  		<label for="full_name" class="control-label">Contribution</label>
  		<input type="text" class="form-control" id="budget" name="contribution" placeholder="$2000" required>
  	</div>

    <div class="form-group">
  		<label for="state_id" class="control-label">Status</label>
        <select name="status" class="form-control" id="state_id" required>
            <option value="" selected disabled>Choose</option>
            <option value="approved">Approved</option>
            <option value="not-approved">Not Approved</option>
        </select>
  	</div>

    <div class="form-group">
        <label for="state_id" class="control-label">Upload Logo</label>
      	<input type="hidden" name="size" value="1000000">
    	<div>
    	  <input type="file" name="image">
    	</div>
    </div>

    <div class="form-group text-center">
        <button name="submit" type="submit" class="btn btn-outline-primary">Submit</button>
    </div>
        <?php
        if(isset($_POST['submit']) && isset($_FILES['image']['name'])) {
        $name = $_REQUEST['spons_name'];
        $contribution = $_REQUEST['contribution'];
        $status = $_REQUEST['status'];
        $dbc = mysqli_connect("localhost", "root", "", "csc350") or die(mysql_error()); //connect to server
        if ($dbc) {
                    // Get image name
                    $image = $_FILES['image']['name'];

                    // image file directory
                    $target = "/opt/lampp/htdocs/hackathon/img/".basename($image);

                    $q = "INSERT INTO sponsors(sponsor_name,contribution,sponsor_status,admin_id,img_dir)
                      VALUES ('$name','$contribution','$status',(SELECT admin_id FROM admin WHERE username='$userName'),'$image')";
                    if(mysqli_query($dbc,$q)){
                        //move_uploaded_file($_FILES['image']['tmp_name'], $target);
                        echo '<p id="centered">Successful Updated</p>';
                      }else{
                        echo '<p>Failed</p>' . mysqli_error($dbc);
                     }
    mysqli_close($dbc);
    }
}
        ?>
  </form>

</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
