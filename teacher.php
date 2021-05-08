<?php
echo "<button><a href='logout.php'><b>Log Out</b></a></button></br></br>";
session_start();
if(isset($_SESSION['user']))
{
	echo "I am a Teacher";
}
else
{
	header("location:login.php");
}