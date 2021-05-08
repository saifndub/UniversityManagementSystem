<?php
$host="localhost";
$db_username = "root";
$db_password = "";
$db_name = "ums";

//Connect to server and select database
$con = mysqli_connect("$host","$db_username","$db_password");
mysqli_select_db($con,$db_name);

/*to protect MYSQL injection 
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password);*/

?>