
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name ="viewport" content="width=device-width, initial-scale=1.0">
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
        
        $psswd = PASSWORD_HASH($_POST["password"], PASSWORD_DEFAULT);
        

    $trn_date = date("Y-m-d H:i:s");
    
        $query = "INSERT into `users` (voornaam, achternaam, username, password, email, phone, bddd, bdmm, bdyy trn_date) VALUES ('$voornaam', '$achternaam','$username', '$psswd', '$email', '$phone', '$bddd', '$bdmm', '$bdyy' '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
          header('Location: index.php');
        }
    }else{
        echo "failed"

        
?>


<form id="regForm" action="index.php"  method="post">

<h1>Registreer:</h1>

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

<script>
  <?php
    include('scripts.js')
  ?>
</script>