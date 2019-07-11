<?php
session_start();
$dbc = mysqli_connect("localhost", "root", "", "csc350") or die(mysql_error()); //connect to server
        $data = "SELECT * FROM HackathonInfo";
        $result = mysqli_query($dbc,$data);
        $info = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<!--  <link rel="stylesheet" href="css/landingP.css">-->
  <link rel="stylesheet" href="css/application.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Application</title>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <section id="" class="">

      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
         <?php echo $info['name'];?>
        </a>
        <div class=" collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="participantsL.php">HOME <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>
</section>
<section id="" class="section-padding application-body">
  <div class="container-fluid col-md-9 float-sm-right animated fadeIn">
      <br>
    <h1 class="m-header text-center">P a r t i c i p a n t &nbsp; A p p l i c a t i o n</h1>
    <br>
    <form class="needs-validation" novalidate method="post" action="">

  	<div class="form-group">
  		<label for="full_name_id" class="control-label">Email</label>
  		<input type="Email" class="form-control" id="email" name="email" placeholder="Email" required>
  	</div>

  	<div class="form-group">
  		<label for="full_name" class="control-label">Name (First and Last Name) </label>
  		<input type="text" class="form-control" id="full_name" name="fullname" placeholder="Full Name" required>
  	</div>

  	<div class="form-group">
  		<label for="phone_number" class="control-label">Phone Number</label>
  		<input type="text" class="form-control" id="phone_number" name="phonenumber" placeholder="123-123-1234" required>
  	</div>

  	<div class="form-group">
  		<label for="major" class="control-label" required>Major</label>
  		<select name="major" class="form-control" id="major_id" required>
        <option value="" selected disabled>Choose</option>
        <option value="Academic Literacy and Linguistics">Academic Literacy and Linguistics</option>
        <option value="Accounting">Accounting</option>
        <option value="Allied Health Sciences">Allied Health Sciences</option>
        <option value="Business Management">Business Management</option>
        <option value="Center for Ethnic Studies">Center for Ethnic Studies</option>
        <option value="Computer Information Systems">Computer Information Systems</option>
        <option value="Computer Science">Computer Science</option>
        <option value="English">English</option>
        <option value="Health Education">Health Education</option>
        <option value="Mathematics">Mathematics</option>
        <option value="Media Arts and Technology">Media Arts and Technology</option>
        <option value="Modern Languages">Modern Languages</option>
        <option value="Music and Art">Music and Art</option>
        <option value="Nursing">Nursing</option>
        <option value="Science">Science</option>
        <option value="Social Sciences, Human Services and Criminal Justice">Social Sciences, Human Services and Criminal Justice</option>
        <option value="Speech, Communications, and Theatre Arts">Speech, Communications, and Theatre Arts</option>
        <option value="Teacher Education">Teacher Education</option>
  		</select>
  	</div>

    <div class="form-group">
      <label for="state_id" class="control-label">T-Shirt Size</label>
      <select name="tshirt" class="form-control" id="state_id" required>
        <option value="" selected disabled>Choose</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
        <option value="XXL">XXL</option>
      </select>
    </div>

    <div class="form-group">
        <label for="state_id" class="control-label">Food preference</label>
        <select name="food" class="form-control" id="state_id" required>
            <option value="" selected disabled>Choose</option>
            <option value="no">No preferences</option>
            <option value="veggie">Vegetarian</option>
            <option value="vegan">Vegan</option>
            <option value="gf">Gluten Free</option>
        </select>
    </div>

    <h4>Do you already have a team?</h4>
  <div>
    <div>
      <input type="radio" name="choice-animals" id="choice-animals-dogs" required>
      <label for="choice-animals-dogs">Yes</label>

      <div class="reveal-if-active">
        <label for="which-dog">Which is your team?</label>
          <select name="exsisting_team" class="form-control require-if-active" id="state_id" data-require-pair="#choice-animals-dogs">
              <?php
                $q = "SELECT team_name FROM teams";
                $result = mysqli_query($dbc,$q);
                $info = mysqli_fetch_assoc($result);
                  do {
                      echo "<option value=" . $info['team_name'] . ">" . $info['team_name'] . "</option>";
                      }while ($info = mysqli_fetch_assoc($result));
          ?>
          </select>
      </div>
    </div>

    <div>
      <input type="radio" name="choice-animals" id="choice-animals-cats">
      <label for="choice-animals-cats">No</label>

      <div class="reveal-if-active">
        <label for="which-cat">Create a new team.</label>
          <input type="text" class="form-control require-if-reveal" id="team_name" name="new_team" placeholder="Team Name" data-require-pair="#choice-animals-cats">
      </div>
    </div>
  </div>

        <div class='form-group text-center'>
        <br>
        <button name='submit' type='submit' class='btn btn-outline-primary'>Submit</button>

       <?php
        if(isset($_POST['submit'])) {
            $email = $_REQUEST['email'];
            $name = $_REQUEST['fullname'];
            $phone = $_REQUEST['phonenumber'];
            $major = $_REQUEST['major'];
            $tshirt = $_REQUEST['tshirt'];
            $food = $_REQUEST['food'];
            $team = $_REQUEST['exsisting_team'];
            $newTeam = $_REQUEST['new_team'];
            $teamName = "";

            if ($dbc) {
                $teamRow  = 0;
                $partiRow = 0;
                $checkParti = "SELECT email FROM participants WHERE email = '$email'";
                $result = mysqli_query($dbc,$checkParti);
                $partiRow = mysqli_num_rows($result);
                if($newTeam == ""){
                    $teamName = $team;
                }else{
                    $teamName = $newTeam;
                    $checkTeam = "SELECT team_id FROM teams WHERE team_name = '$teamName'";
                    $result = mysqli_query($dbc,$checkTeam);
                    $teamRow = mysqli_num_rows($result);
                    if($teamRow <= 0){
                        $q = "INSERT INTO teams(team_name) values('$newTeam')";
                        mysqli_query($dbc,$q) or die('<p id="content">Query failed: </p>' . mysqli_error($dbc));
                    }
                }
                        if(($teamRow <= 0 || $newTeam != "") && $partiRow <= 0){

                            $r = "INSERT INTO participants(participant_name,email,phone,major,tshirt_size,food_preference,team_id)
                            VALUES ('$name','$email','$phone','$major','$tshirt','$food',(SELECT team_id FROM teams WHERE team_name = '$teamName'))";
                      }
                    }
                    if($partiRow > 0){
                        echo '<p>Participant is already Registered with that email!</p>';
                    }else if($teamRow > 0){
                      echo '<p>Team Name Already exist! <br> Choose a different Name</p>';
                    }else{
                    if(mysqli_query($dbc,$r)){
                      echo '<p>Successful Register</p>';
                    }else{
                      echo '<p>Failed</p>' . mysqli_error($dbc);
                    }
                  }
                  }
                    mysqli_close($dbc);
        ?>
    </div>

  </form>

</div>

<script>

var FormStuff = {

  init: function() {
    // kick it off once, in case the radio is already checked when the page loads
    this.applyConditionalRequired();
    this.bindUIActions();
  },

  bindUIActions: function() {
    // when a radio or checkbox changes value, click or otherwise
    $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
  },

  applyConditionalRequired: function() {
    // find each input that may be hidden or not
    $(".require-if-active").each(function() {
      var el = $(this);
      // find the pairing radio or checkbox
      if ($(el.data("require-pair")).is(":checked")) {
        // if its checked, the field should be required
        el.prop("required", true);
      } else {
        // otherwise it should not
        el.prop("required", false);
      }
    });
  }

};

FormStuff.init();


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

</section>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
