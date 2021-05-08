<?php
//echo "<button><a href='logout.php'><b>Log Out</b></a></button></br></br>";
session_start();
if(isset($_SESSION['user']))
{
	echo "I am an Admin";
}
else
{
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>University of NotreDame</title>
	<link rel="stylesheet" href="mystyle/style.css" />
</head>
<body>
	<div id="wrapper">
		<button><a href='logout.php'><b>Log Out</b></a></button></br></br>
	<div class="topnav" id="myTopnav">
                <a href="#" class="active">Home</a>
                <a href="#">See Result</a>
                <a href="#">Course Assigned</a>
                <a href="#">Upload Notice</a>
                <a href="#">Search</a>
            <div class="dropdown">
                <button class="dropbtn">Registration
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" style="z-index:100">
                    <a href="admin_reg_form.php?value=admin">Admin</a>
                    <a href="teacher_reg_form.php?value=teacher">Teacher</a>
                    <a href="student_reg_form.php?value=student">Student</a>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>