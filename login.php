<?php
session_start(); //start session for errors
?>
<html>
<?php include "DBconnect.php" ?>
<head>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<h1 style="text-align:center "> <img src="img/Banner2.png" alt="Banner2" width="600" height="200"> </h1>
<form method = "POST" action="Process_data.php">
<fieldset>

<legend><h1>Log-In</h1></legend>	
<p>
	<label>Username: <input type="name" name="name" size="20" width="200" maxlength="30"> </label>
</p>

<p>
	<label>Password: <input type="Password" name="Password"	size="20"	maxlength="30"> </label>
</p>

<p> 
<?php 
//session varible is set in process_data and displays the error
if($_SESSION['wrong_info'] == 1){
	echo "The Username/Password is incorrect";
	$_SESSION['wrong_info'] = 0; 
}
else{
$_SESSION['wrong_info'] = 0;  
}
?>
 </p>
<p align = "center">
	<input type = "submit" name = "Submit" value = "Submit">	
</p>
<p align = "center">
	<input type = "submit" name = "Register" value = "Register">	
</p>
</fieldset>
</form>
</body>

</html>