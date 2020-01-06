
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script>"scripts.js"</script>
<title>Registration</title>
<link href="css4.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php
        include("navbar.php");
    ?>


<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['voornaam'])){
        $voornaam = stripslashes($_REQUEST['voornaam']);
        $voornaam = mysqli_real_escape_string($con,$voornaam);
        $achternaam = stripslashes($_REQUEST['achternaam']);
        $achternaam = mysqli_real_escape_string($con,$achternaam);
		$username = stripslashes($_REQUEST['username']); // removes backslashes
        $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
		$email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con,$email);
        $phone = stripslashes($_REQUEST['phone']);
        $phone= mysqli_real_escape_string($con,$phone);
		
        
        
        $bddd = stripslashes($_REQUEST['bddd']);
        $bddd = mysqli_real_escape_string($con,$bddd);
        $bdmm = stripslashes($_REQUEST['bdmm']);
        $bdmm = mysqli_real_escape_string($con,$bdmm);
        $bdyy= stripslashes($_REQUEST['bdyy']);
		$bdyy = mysqli_real_escape_string($con,$bdyy);
        

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (voornaam, achternaam, username, password, email, phone, bddd, bdmm, bdyy trn_date) VALUES ('$voornaam', '$achternaam','$username', '".md5($password)."', '$email', '$phone', '$bddd', '$bdmm', '$bdyy' '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "SUCCES";
        }
    }else{
        echo "FAILED"

        
?>


<form id="regForm" action=""  method="post">

<h1>Register:</h1>

<!-- One "tab" for each step in the form: -->
<div class="tab">Name:
  <p><input type="text" name="voornaam" placeholder="Voornaam..."  oninput="this.className = ''"></p>
  <p><input type="text" name="achternaam" placeholder="Achternaam..."  oninput="this.className = ''"></p>
</div>

<div class="tab">Contact Info:
  <p><input type="email" name="email" placeholder="E-mail..."  oninput="this.className = ''"></p>
  <p><input type="text" name="phone" placeholder="Telefoon..."  oninput="this.className = ''"></p>
</div>

<div class="tab">Birthday:
  <p><input type="text" name="bddd" placeholder="dd"  oninput="this.className = ''"></p>
  <p><input type="text" name="bdmm" placeholder="mm"  oninput="this.className = ''"></p>
  <p><input type="text" name="bdyy" placeholder="yyyy"  oninput="this.className = ''"></p>
</div>

<div class="tab">Login Info:
  <p><input type="text" name="username"  placeholder="Username..."  oninput="this.className = ''"></p>
  <p><input type="password" name="password" placeholder="Password..."  oninput="this.className = ''"></p>
</div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

</form>




<script>var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>











<!--<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
<br /><br />

</div>
    -->
<?php } ?>
</body>
</html>
