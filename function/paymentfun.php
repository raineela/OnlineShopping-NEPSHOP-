<?php
//session_start();

// initializing variables
 // $first_name = " ";
  //$last_name = 0;
  //$email =0;
  //$password = 0;
 // $address = 0;
 // $phone_no = 0;
 // $card_no =0;
 // $expires = 0;
 // $csc = 0; 
 // $errors   = array();

// connect to the database
include("includes/db.php");
//$db = mysqli_connect('localhost', 'root', '', 'shopping');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $phone_no = mysqli_real_escape_string($db, $_POST['phone_no']);
  $card_no = mysqli_real_escape_string($db, $_POST['card_no']);
  $expires = mysqli_real_escape_string($db, $_POST['expires']);
  $csc = mysqli_real_escape_string($db, $_POST['csc']);

 if (empty($first_name)) { 
 array_push($errors, "First name is required!"); 
                         }
 if (empty($email)) { 
 array_push($errors, "Email is required!"); 
                    }
 if(filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
	  array_push($errors, "Invalid email address!");
	                                                  }
 if (empty($address)) { 
 array_push($errors, "Address is required!"); 
                      }
 if(!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone_no)) { 
 array_push($errors, "Invalid phone number!");
                                                                                                   }
 if(strlen($password)<5) { 
 array_push($errors, "Password too short(make at least 5 digit long)!");
                         }
 
  $payment_check_query = "SELECT * FROM payment WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $payment_check_query);
  $user = mysqli_fetch_assoc($result);
 //if ($user) { // if user exists
  //    if ($user['email'] === $email) {
   //   array_push($errors, "email already exists");
   //                                  }
    //        }
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database
	$card_no = md5($card_no);
	$expires = md5($expires);
	$csc = md5($csc);
	$query = "INSERT INTO payment (first_name, last_name, email, password, address, phone_no, card_no, expires, csc) 
  			  VALUES('$first_name', '$last_name', '$email', '$password', '$address', '$phone_no', '$card_no', '$expires', '$csc')";
			  mysqli_query($db, $query);
  	//$_SESSION['email'] = $email;
  	//$_SESSION['success'] = "payment completed.";
	//header('location: thankyou.php');
	echo"<script>alert('$email your payment is successful!')</script>";
		echo"<script>window.open('index.php?my_account','_self');</script>";
                           }
}
	?>
  

