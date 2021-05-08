<?php

session_start();

	//Select table name
	if(isset($_GET['value'])){
		if($_GET['value'] == 'admin'){
			$_SESSION['tbl'] = "admin";
			$_SESSION['user'] = "admin";
			//header('location: index.php');
		}
		if($_GET['value'] == 'teacher'){
			$_SESSION['tbl'] = "teacher";
			$_SESSION['user'] = "teacher";
		}
		if($_GET['value'] == 'student'){
			$_SESSION['tbl'] = "student";
			$_SESSION['user'] = "student";
		}
	}

	//username and password sent from form
	$admin_id = "173120001";
	$admin_name = "father";
	$admin_email = "saif.ndub@gmail.com";
	$password_1 = "1234";
	$password_2 = "1234";
	

		$tbl_name = "admins";
		$user_id = $_SESSION['user']."_id";

		// connect to database
		include "connection.php"; 
	
		$sql ="SELECT * FROM $tbl_name WHERE $user_id='$admin_id'"; //AND LastName='$_POST[ln]'";

		$result = mysqli_query($con,$sql);

		//Mysql is counting tabel row
		$count = mysqli_num_rows($result);
		//echo $count;

		//if result matched $myusername and $mypassword, table row must be 1 row
		if(!$count==1){	
			$password = md5($password_1);//encrypt the password before saving in the database
			$sql = "Insert into $tbl_name(admin_id,admin_name,email,password)
				values('$admin_id','$admin_name','$admin_email','$password')";
			mysqli_query($con,$sql);
			//session_start();
			$_SESSION['user_name']=$myusername;
			$_SESSION['password']=$mypassword;
			header("location:admin.php");
			
			/*echo "Welcome  $tbl_name  !";
			echo "Welcome  $admin_id  !";
			echo "Welcome  $admin_name  !";
			echo "Welcome  $admin_email  !";
			echo "Welcome  $password  !";*/

		}else{
			echo "This Username or Password is used...</br>Try with another</br></br>";
			echo "<button type='submit'><a href='signup.php'>Back page</a></button>";
		}

?>