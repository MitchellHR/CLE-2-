<?php
	include('session.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name ="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<link href="css4.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	</head>

	<body>


	<?php
        include("navbar.php");
    ?>


		<?php
			require('db.php');
			if (isset($_POST['username'])){
				
				$username = stripslashes($_REQUEST['username']);
				$username = mysqli_real_escape_string($con,$username);
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($con,$password);
				
				$query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
				$result = mysqli_query($con,$query) or die(mysql_error());
				$rows = mysqli_num_rows($result);
					if($rows==1){
						$_SESSION['username'] = $username;
						header("Location: index.php");
					}else{
						echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
					}
			}else{
		?>

			<div class="signup">
				<h1>Log In</h1>
				<form class ="form_login" action="" method="post" name="login">
				<input  type="text" name="username" placeholder="Username" required /></br>
				<input type="password" name="password" placeholder="Password" required />
				<input name="submit" type="submit" value="Login" />
				</form>
				<p>Not registered yet? <a href='registration.php'>Register Here</a></p>

				<br /><br />
			
			</div>
		<?php } ?>
	</body>
</html>
