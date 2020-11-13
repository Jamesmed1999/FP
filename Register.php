<?php
session_start();
?>

<html>
<?php include "DBconnect.php"
 ?>
<head> 
	<title> Register </title> 
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<h1 style="text-align:center "> <img src="img/Banner2.png" alt="Banner2" width="600" height="200"> </h1>
	<h1 style="text-align:center"> Register </h1>
<form action = "Process_data_Register.php" method = "POST">
	<fieldset>
		<legend>Register for a new account </legend>
	<p> 
		<label> First Name: <input type = "text" name = "Fnam" size = "20" required> </label> 
	</p>

	<p> 
		<label> Last Name: <input type = "text" name = "Lnam" size = "20" required> </label> 
	</p>

	<p> 
		<label> Username: <input type = "text" name = "username" size = "20" required> </label> 
		<p> Username must be between 5-20 characters </p>
	</p>

<p>
		<label> Password: <input type = "password" name = "password" size = "16" required> </label>
</p>

<p>

		<label> Confirm Password: <input type = "password" name = "Confirm_pass" size = "16" required> </label>
		<p> Password must be between 8-16 characters </p>
		<?php //session value is set in process_data_Register
		//this is so the user knows how they messed up
		//by default though it's 0 because there is no error
			if($_SESSION['message'] == 1){
				echo "Password too long";
				$_SESSION['message'] = 0;
			}
			else if($_SESSION['message'] == 2){
				echo "Password too short";
				$_SESSION['message'] = 0;
			}
			else if($_SESSION['message'] == 3){
				echo "username too long/short";
				$_SESSION['message'] = 0;
			}
			else if($_SESSION['message'] == 4){
				echo "passwords don't match";
				$_SESSION['message'] = 0;
			}
			else if($_SESSION['message'] == 5){
				echo "username taken";
				$_SESSION['message'] = 0;
			}
			else{
				$_SESSION['message'] = 0;
			}
		?>				                                     		 
</p>

<p align = "center">
	<input type = "submit" name = "Submit" value = "Submit">	
</p>
</fieldset>
</form>
</body>
</html>

