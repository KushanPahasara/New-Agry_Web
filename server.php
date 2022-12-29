<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$Fname ="";
$Lname = "";
$age = "";
$email = "";
$Contact_No = "";
$gender = "";
$Utype = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'agryweb3');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $Fname = mysqli_real_escape_string($db, $_POST['Fname']);
  $Lname = mysqli_real_escape_string($db, $_POST['Lname']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $Contact_No = mysqli_real_escape_string($db, $_POST['Contact_No']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $Utype = mysqli_real_escape_string($db, $_POST['Utype']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($Fname)) { array_push($errors, "First name is required"); }
  if (empty($Lname)) { array_push($errors, "Last name is required"); }
  if (empty($age)) { array_push($errors, "age is required"); }
  if (empty($Contact_No)) { array_push($errors, "Contact Number is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($Utype)) { array_push($errors, "type of the user is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (strlen($Contact_No) != 10) { array_push($errors, "Contact Number should have 10 numbers"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (Fname, Lname, username, age, email, Contact_No, gender, Utype, password) 
  			  VALUES('$Fname', '$Lname', '$username', '$age', '$email', '$Contact_No', '$gender', '$Utype', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";

    
      header('location: login.php');
  	
  }
}



// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";

      
      $details = mysqli_fetch_all($results, MYSQLI_ASSOC); 
      foreach($details as $detail); 
      $type = htmlspecialchars( $detail['uType']); 
    
     if ($type === "Farmer"){ 
      header('location:farmerpage.php'); 
      }else{ 
      header('location:officerpage.php'); 
      }
      //clear the memory 
      mysqli_free_result($result); 
      mysqli_close($db); 
      session_destroy();
      
      
  	} else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>