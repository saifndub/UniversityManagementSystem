<?php 
	session_start();

	// variable declaration
	$tbl_name = "";
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

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

	/*echo $_SESSION['tbl'];
	$tbl_name = $_SESSION['tbl'];
	$user_id = $_SESSION['user']."_id";
	echo $user_id;*/
	 



	// LOGIN USER START
	if (isset($_POST['login_user'])) {

		$tbl_name = $_SESSION['tbl'];
		$user_name = $_SESSION['user']."_id";

		$user_id =  $_POST['user_id'];
		$password =  $_POST['password'];
	// connect to database
	include "connection.php"; 
		
		if (empty($user_id)) {
			array_push($errors, "User Id is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		//echo $username;
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM $tbl_name WHERE $user_name='$user_id' AND password='$password'";
			$results = mysqli_query($con, $query);
			$count = mysqli_num_rows($results);

			

			if ($count == 1) {
				$_SESSION['user'] = $user_id;
				$_SESSION['success'] = "You are now logged in";

			/*echo "Welcome  $tbl_name  !";
			echo "Welcome  $user_id  !";
			echo "Welcome  $user_name  !";
			//echo "Welcome  $admin_email  !";
			echo "Welcome  $password  !";*/

			switch($tbl_name){
    			case "admins":
        			header('location: admin.php');
        			break;
    			case "teachers":
        			header('location: teacher.php');
        			break;
        		case "students":
        			header('location: student.php');
        			break;
    			}
				//header('location: index.html');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}// LOGIN USER END





	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}
	}	// ...



?>