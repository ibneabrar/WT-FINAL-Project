<?php

@include '../model/config.php'; 
session_start();

if(isset($_POST['submit'])){

 $name = mysqli_real_escape_string($conn,$_POST['name']);
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $password = md5($_POST['password']);
 $cpassword = md5($_POST['cpassword']);
 $user_type = $_POST['user_type'];

 $select = "select * FROM user_form WHERE email='$email' && password = '$password'";

 $result = mysqli_query($conn, $select);

 if(mysqli_num_rows($result)>0){

 	$error[]='user already exist!';
 
}
else{
	
	if($password != $cpassword){
		$error[] = 'password not matched!';
	}
	else{
		$insert = "INSERT INTO user_form(name,email,password,user_type) VALUES('$name','$email','$password','$user_type')";
		mysqli_query($conn,$insert);
		header('location:login.php');
	}
 }
};  

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<style><?php include "css/style.css" ?></style>
</head>
<body>
	<div class="form-container">
		<form action="../controller/regAction.php" method = "post">
			<h3>Register here</h3>
		<?php
           if(isset($error)){
           	foreach($error as $error){
           		echo '<span class = "error-msg">'.$error.'</span>';
           	};
           };
        ?> 
	     <label for="fname">Name:</label><br>
  <input type="text" id="fname" name="fname" ><br>  
  <label for="email">Email:</label>
  <?php echo isset($_SESSION['name_error_msg']) ? ($_SESSION['name_error_msg']) : "" ?><br>
  <input type="text" id="email" name="email">
   <?php echo isset($_SESSION['email_error_msg']) ? ($_SESSION['email_error_msg']) : "" ?><br>
  <p>Select Your Gender :</p>
  <input type="radio" id="male" name="Gender" value="Male" >
  <label for="male">Male</label>
  <br>
  <input type="radio" id="female" name="Gender" value="Female" >
  <label for ="female">Female</label>
   <?php echo isset($_SESSION['gender_error_msg']) ? ($_SESSION['gender_error_msg']) : "" ?>
  <br><br> 
  <label for="password">Create New Password:</label><br>
  <input type="password" id="password" name="password" ><br>
  <label for="cpassword">Confirm Password:</label><br>
  <input type="password" id="cpassword" name="cpassword" ><br><br>
  <select name="user_type">
  <option value="user">user</option>
  <option value="admin">admin</option>
		</select>
	<input type="submit" name="submit" value="Register" class="form-btn">
		<p>Already have an account?<a href="login.php">login now</a></p>
        <a href="homepage.php" class="btn">Home</a>
</form>
 <?php echo isset($_SESSION['global_error_msg']) ? ($_SESSION['global_error_msg']) : "" ?>
</div>
</body>
</html>

