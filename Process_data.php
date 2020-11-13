<?php
session_start();
include "DBconnect.php";
if(!isset($_POST['Submit'])){ //if they try to avoid clicking submit or register
	if(!isset($_POST['Register'])){ 
		header('Location: login.php'); 
	}
}
if(isset($_POST['Register'])){ //send them to register
	header('Location: Register.php');
}
//sanatize
$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
$pass = filter_var($_POST['Password'],FILTER_SANITIZE_STRING);
$valid = true; 



if($valid == true){


$finalQuery = "SELECT PASSWORD FROM user WHERE USERNAME = ?"; //cecks to see if inputed username has inputed password
$stmt2 = $connect->prepare($finalQuery);
$stmt2->bind_param('s',$name);
$stmt2->execute();
$result2 = $stmt2->get_result();

echo $result2->num_rows;

while ($row = $result2->fetch_assoc())
{
    $arr1[] = $row;
}

if($result2->num_rows == 1){ //if username has that password do this
	for($i =0; $i<$result2->num_rows;$i++){
		foreach($arr1[$i] as $key => $value){
			if(password_verify($pass, $value)){ //verify the hash
				setcookie('user',$name, time()+60*60*24); //set a cookie for user
				header("Location: index.php"); ///go to index
			}	
			else{ //row does not exist
				$_SESSION['wrong_info'] = 1;  //print out error
				header("Location: login.php");
			}
		}
	}

}
else if ($result2->num_rows == 0){
	$_SESSION['wrong_info'] = 1;
	header("Location: login.php");
}
}