<?php
	//echo "<button><a href='logout.php'><b>Log Out</b></a></button></br></br>";
	//include('server.php');
session_start();
if(isset($_SESSION['user']))
{
	//echo "I am an Admin";
}
else
{
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2> Teachers Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php //include('errors.php'); ?>
		<div class="input-group">
		<label>Teacher Id</label>
			<input type="number" name="teacher_id" value="">
		</div>
		<div class="input-group">
			<label>Teacher Name</label>
			<input type="text" name="teacher_name" value="<?php //echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Phone No</label>
			<input type="number" name="teacher_number" value="">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="teacher_email" value="<?php //echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>