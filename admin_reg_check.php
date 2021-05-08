<?php

session_start();
if(isset($_SESSION['user']))
{
	//Select table name
	if(isset($_GET['value'])){
		if($_GET['value'] == 'admin'){
			$_SESSION['tbl'] = "admins";
			$_SESSION['user'] = "admin";
			//header('location: index.php');
		}
		if($_GET['value'] == 'teacher'){
			$_SESSION['tbl'] = "teachers";
			$_SESSION['user'] = "teacher";
		}
		if($_GET['value'] == 'student'){
			$_SESSION['tbl'] = "students";
			$_SESSION['user'] = "student";
		}
	}

	
	if (isset($_POST['reg_user'])) {

		//username and password sent from form
		$admin_id = $_POST['admin_id'];
		$admin_name = $_POST['admin_name'];
		$admin_email = $_POST['admin_email'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];

		$tbl_name = $_SESSION['tbl'];
		$user_name = $_SESSION['user']."_id";

		// connect to database
		include "connection.php"; 
	
		$sql ="SELECT * FROM $tbl_name WHERE $user_name='$admin_id'"; //AND LastName='$_POST[ln]'";

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

	}

}
else
{
	header("location:login.php");
}

?>