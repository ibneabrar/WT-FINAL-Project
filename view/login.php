<?php

@include '../model/config.php'; 

session_start();

if(isset($_POST['submit']) ||isset($_POST['name'])||isset($_POST['email'])||isset($_POST['password'])||isset($_POST['cpassword'])||isset($_POST['user_type'])){

 $name = mysqli_real_escape_string($conn,$_POST['name']);
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $password = md5($_POST['password']);
 $cpassword = md5($_POST['cpassword']);
 $user_type = $_POST['user_type'];

 $select = "select * FROM user_form WHERE email='$email' && password = '$password'";

 $result = mysqli_query($conn, $select);

 if(mysqli_num_rows($result)>0){

$row = mysqli_fetch_array($result);
if($row['user_type'] == 'admin'){

	$_SESSION['admin_name'] = $row['name'];
	header('location:admin.php');
}
elseif ($row['user_type'] == 'user'){

	$_SESSION['user_name'] = $row['name'];
	header('location:user.php');
}
else
{
	$error[] = 'Incorrect email or password';
}
	
}
 	
};  
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<style><?php include "css/style.css" ?></style>
</head>
<body>
	<div class="form-container">
		<form action="" method = "post">
			<h3>Login here</h3>
	<?php
           if(isset($error)){
           	foreach($error as $error){
           		echo '<span class = "error-msg">'.$error.'</span>';
           	};
           };
        ?> 
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" ><br>
<br>
 <input type="submit" name="submit" value="Login" class="form-btn">
		<p>Don't have an account?<a href="registration.php">Register now</a></p>
		<a href="homepage.php" class="btn">Home</a>
</form>
</div>
</body>
</html>