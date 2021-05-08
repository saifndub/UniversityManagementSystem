<?php
session_start();

if(isset($_SESSION['tbl'])){

	switch($_SESSION['tbl']){
    	case "admins":
        	$val = "admin";
        	break;
    	case "teachers":
        	$val = "teacher";
        	break;
        case "students":
        	$val = "student";
        	break;
    }
}
session_destroy();
header("location:login.php?value=$val");

?>