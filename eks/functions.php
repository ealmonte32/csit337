<?php 
session_start();

//connect to database
$db = mysqli_connect('localhost', 'root', '', 'eks');

// variable declaration
$email    = "";
$password = "";
$errors   = array(); 

//login button
if (isset($_POST['login_button'])) {
	login();
}

//login user
function login(){
	global $db, $email, $errors;

	// grap form values
	$user = $_POST['Email'];
	$pass = $_POST['Password'];
	// make sure form is filled properly
	if (empty($user)) {
		array_push($errors, "Email is required");
	}
	if (empty($pass)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {

		$query = 'SELECT * FROM employees WHERE Email="'.$user.'" AND Password="'.$pass.'" LIMIT 1';
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or regular user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header("location: manager.php");		  
			}
			elseif ($logged_in_user['user_type'] == 'finance') {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header("location: loansmanager.php");
			}
			else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header("location: salesperson.php");
			}
		}else {
			echo  "User Not Found.";
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = 'SELECT * FROM employees WHERE Personid=' . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}
	
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>