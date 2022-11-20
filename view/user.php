  <?php

@include '../model/config.php'; 
session_start();
if (!isset($_SESSION['user_name'])) {
	header('location:login.php');
}

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Page</title>
	<style><?php include "css/style.css" ?></style>

</head>
<body>

<div class = "container">
	
	<div class="content">
		<h3>Welcome to User Page</span></h3>
		<a href="login.php" class="btn">login</a>
		 <a href="registration.php" class="btn">Register</a>
		 <a href="logout.php" class ="btn">logout</a>
		</div>
</body>
</html>