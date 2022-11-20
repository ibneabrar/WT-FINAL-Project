  <?php

@include '../model/config.php'; 
session_start();
if (!isset($_SESSION['admin_name'])) {
	header('location:login.php');
}

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Page</title>
	<style><?php include "css/style.css" ?></style>
</head>
<body>
<div class = "container">
	<div class="content">
		<h3>Welcome<span><?php echo $_SESSION['admin_name']?></span>to admin page!</h3>
		<br><br>
		<a href="login.php" class="btn">login</a>
		 <a href="registration.php" class="btn">Register</a>
		 <a href="logout.php" class ="btn">logout</a>
		</div>
</body>
</html>