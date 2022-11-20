<?php
 session_start();
 

 if($_SERVER['REQUEST_METHOD'] === "POST"){

 	$name = sanitize($_POST['name']);
 	$email = sanitize($_POST['email']);
 	$gender = sanitize($_POST['gender']);

 	$isValid = true;

 	if(empty($name)){
 		$_SESSION['name_error_msg'] = 'name required!';
 		$isValid = false;
 	}
 	elseif (empty($email)){
 		$_SESSION['email_error_msg'] = 'email required!';
 		$isValid = false;
 }
 elseif (empty($gender)){
 		$_SESSION['gender_error_msg'] = 'gender required!';
 		$isValid = false;
 	}
 	if($isValid === true){

 		$_SESSION['name_error_msg'] = "";
 		$_SESSION['email_error_msg'] = "";
 		$_SESSION['gender_error_msg'] = "";

 	}
 	else {

 		$_SESSION['global_error_msg'] = "error occured!";
 		header("location:registration.php");
 	}
 };

 function sanitize ($data){
 	$data=trim($data);
 	$data=stripcslashes($data);
 	$data= htmlspecialchars($data);
 	return $data;
 };

?>