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

  <title>Application</title>
</head>

  <div class="container-fluid col-md-9 float-sm-right animated fadeIn">
    <h1 class="m-header text-center">A p p l i c a t i o n</h1>
    <br>
    <form class="needs-validation" novalidate>

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
  		<select class="form-control" id="major_id" required>
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
      <select class="form-control" id="state_id" required>
        <option value="" selected disabled>Choose</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
        <option value="XXL">XXL</option>
      </select>
    </div>

    <div class="form-group">
      <label for="programs" class="control-label">What programs are you already familiar with?</label>
      <div class="form-check">
  <input class="form-check-input" type="checkbox" value="C++" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    C++
  </label>
  </div>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="Java" id="defaultCheck2">
  <label class="form-check-label" for="defaultCheck2">
    Java
  </label>
  </div>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="Python" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Python
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="JavaScript" id="defaultCheck2">
  <label class="form-check-label" for="defaultCheck2">
    JavaScript
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="HTML & CSS" id="defaultCheck2">
  <label class="form-check-label" for="defaultCheck2">
    HTML & CSS
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="Swift" id="defaultCheck2">
  <label class="form-check-label" for="defaultCheck2">
    Swift
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="Other" id="defaultCheck2">
  <label class="form-check-label" for="defaultCheck2">
    Other
  </label>
  <input type="text" class="form-control col-sm-4" id="other" name="other" placeholder="Other">
</div>
  </div>


    <div class="form-group text-center">
  		<button type="submit" class="btn btn-outline-success">Submit</button>
    </div>


  </form>
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
