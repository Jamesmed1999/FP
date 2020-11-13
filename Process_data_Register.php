<?php
session_start(); //session is being used for error sending to Register
include "DBconnect.php";

if(!isset($_POST['Submit'])){ //if they try to avoid clicking submit

		header('Location: Register.php'); 	
}
//sanatize the strings
$user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$pass = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
$con_pass = filter_var($_POST['Confirm_pass'],FILTER_SANITIZE_STRING);
$fnam = filter_var($_POST['Fnam'],FILTER_SANITIZE_STRING);
$lnam = filter_var($_POST['Lnam'],FILTER_SANITIZE_STRING);
$null = null;
$addDB = true; //if an error occours addDB is set to false


//hash the password
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

//if pasword bigger than 16
//session varible get's set to a certain number and printed in Register
if(strlen($pass) > 16){
	$addDB = false;
	$_SESSION['message'] = 1;
	header('Location: Register.php'); 	//go back to register with a error message
}
if(strlen($pass) < 8){ //if pass less than 8
	$addDB = false;
	$_SESSION['message'] = 2;
	header('Location: Register.php'); //go back to register with a error message
}
if(strlen($user)<5){ //if user is less than 5
	$addDB = false;
	$_SESSION['message'] = 3;
	header('Location: Register.php'); //go back to register with a error message
}
if(strlen($user)>20){ //if user is greater than 20
	$addDB = false;
	$_SESSION['message'] = 3; 
	header('Location: Register.php'); //go back to register with a error message
}

if ($pass != $con_pass){ //checks if password and confirm are the same
	$addDB = false;
	$_SESSION['message'] = 4; 
	header('Location: Register.php'); //go back to register with a error message
	
}



$checkUser = "SELECT USERNAME FROM USER"; //this checks if the user is in the database if it is it uses session to print the error because two users can't have the same user name
											//else addDB stays true and we go to the insert
$stmt = $connect->prepare($checkUser);
$stmt->execute();
$result = $stmt->get_result();


while ($row = $result->fetch_assoc()){
	$arr[] = $row;
}
//loop to iterate through data
for($i = 0;$i<$result->num_rows;$i++){
	foreach ($arr[$i] as $key => $value){
		if($value == $user){
			$addDB = false;
			$_SESSION['message'] = 5;
			header('Location: Register.php');
			break;
		}
	}
}


//if the addDB is true insert into USERS
if($addDB == true){
$insertQ = "INSERT INTO USER VALUES(?,?,?,?,?)";
$stmt1 = $connect->prepare($insertQ);
$stmt1->bind_param('issss',$null,$user,$hashed_pass,$fnam,$lnam);  //adds the hashed pass
$stmt1->execute();
header('Location: login.php');
}else{
	header('Location: Register.php'); ///if any other erros hapen go back to register
}
 


